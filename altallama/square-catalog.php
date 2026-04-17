<?php
declare(strict_types=1);

require_once __DIR__ . "/square-client.php";

function square_catalog_escape(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, "UTF-8");
}

function square_catalog_parse_bool(string $value): bool
{
    $normalized = strtoupper(trim($value));
    return in_array($normalized, ["Y", "YES", "TRUE", "1"], true);
}

function square_catalog_parse_price_to_cents(string $price): ?int
{
    $raw = trim($price);
    if ($raw === "") {
        return null;
    }

    $normalized = str_replace([",", " "], [".", ""], $raw);
    if (!is_numeric($normalized)) {
        return null;
    }

    return (int) round(((float) $normalized) * 100);
}

function square_catalog_extract_primary_category(string $rawCategories, string $rawReportingCategory = ""): string
{
    $candidates = [$rawCategories, $rawReportingCategory];

    foreach ($candidates as $raw) {
        $value = trim($raw);
        if ($value === "") {
            continue;
        }

        $firstCsv = explode(",", $value)[0] ?? "";
        $firstBranch = explode(">", (string) $firstCsv)[0] ?? "";
        $category = trim((string) $firstBranch);

        if ($category !== "") {
            return $category;
        }
    }

    return "Uncategorized";
}

function square_catalog_slugify(string $value): string
{
    $value = strtolower(trim($value));
    $value = preg_replace('/[^a-z0-9]+/', '-', $value) ?? "";
    $value = trim($value, '-');

    return $value === "" ? "uncategorized" : $value;
}

function square_catalog_find_csv_file(): ?string
{
    $configured = trim((string) getenv("CATALOG_CSV_PATH"));
    if ($configured !== "") {
        if (is_file($configured) && is_readable($configured)) {
            return $configured;
        }

        $localConfigured = __DIR__ . DIRECTORY_SEPARATOR . ltrim($configured, "\\/");
        if (is_file($localConfigured) && is_readable($localConfigured)) {
            return $localConfigured;
        }
    }

    $rootDir = dirname(__DIR__);
    $pattern = $rootDir . DIRECTORY_SEPARATOR . "*_catalog-*.csv";
    $matches = glob($pattern);
    if (!is_array($matches) || $matches === []) {
        return null;
    }

    usort($matches, static function (string $a, string $b): int {
        return filemtime($b) <=> filemtime($a);
    });

    foreach ($matches as $match) {
        if (is_file($match) && is_readable($match)) {
            return $match;
        }
    }

    return null;
}

function square_catalog_load_from_csv(?int $limit = null): array
{
    $csvPath = square_catalog_find_csv_file();
    if ($csvPath === null) {
        return [];
    }

    $handle = fopen($csvPath, "rb");
    if ($handle === false) {
        return [];
    }

    $headers = fgetcsv($handle);
    if (!is_array($headers) || $headers === []) {
        fclose($handle);
        return [];
    }

    $headerMap = [];
    foreach ($headers as $index => $header) {
        $headerMap[trim((string) $header)] = $index;
    }

    $requiredColumns = ["Item Name", "Description", "Price", "Archived"];
    foreach ($requiredColumns as $column) {
        if (!array_key_exists($column, $headerMap)) {
            fclose($handle);
            return [];
        }
    }

    $products = [];

    while (($row = fgetcsv($handle)) !== false) {
        $name = trim((string) ($row[$headerMap["Item Name"]] ?? ""));
        if ($name === "") {
            continue;
        }

        $archivedRaw = (string) ($row[$headerMap["Archived"]] ?? "");
        if (square_catalog_parse_bool($archivedRaw)) {
            continue;
        }

        $priceRaw = (string) ($row[$headerMap["Price"]] ?? "");
        $amount = square_catalog_parse_price_to_cents($priceRaw);

        $description = trim((string) ($row[$headerMap["Description"]] ?? ""));
        if ($description === "") {
            $description = "Alta Llama catalog item.";
        }

        $rawCategories = (string) ($row[$headerMap["Categories"]] ?? "");
        $rawReportingCategory = (string) ($row[$headerMap["Reporting Category"]] ?? "");
        $category = square_catalog_extract_primary_category($rawCategories, $rawReportingCategory);

        $products[] = [
            "name" => $name,
            "description" => $description,
            "price" => square_catalog_format_money($amount, "EUR"),
            "image_url" => "https://images.unsplash.com/photo-1503602642458-232111445657?auto=format&fit=crop&w=900&q=80",
            "category" => $category,
        ];

        if (is_int($limit) && $limit > 0 && count($products) >= $limit) {
            break;
        }
    }

    fclose($handle);

    return $products;
}

function square_catalog_format_money(?int $amount, string $currency): string
{
    if ($amount === null) {
        return "Price on request";
    }

    $currency = strtoupper($currency);
    $zeroDecimalCurrencies = ["JPY", "KRW", "VND", "CLP", "MGA"];
    $fractionDigits = in_array($currency, $zeroDecimalCurrencies, true) ? 0 : 2;
    $divider = $fractionDigits === 0 ? 1 : 100;

    $formattedAmount = number_format($amount / $divider, $fractionDigits, ".", ",");

    if ($currency === "USD") {
        return "$" . $formattedAmount;
    }

    return $currency . " " . $formattedAmount;
}

function square_catalog_collect_image_urls(array $objects): array
{
    $imageUrls = [];

    foreach ($objects as $object) {
        if (!is_array($object) || ($object["type"] ?? "") !== "IMAGE") {
            continue;
        }

        $objectId = (string) ($object["id"] ?? "");
        $url = trim((string) ($object["image_data"]["url"] ?? ""));

        if ($objectId !== "" && $url !== "") {
            $imageUrls[$objectId] = $url;
        }
    }

    return $imageUrls;
}

function square_catalog_extract_products(array $objects, array $imageUrls): array
{
    $products = [];

    foreach ($objects as $object) {
        if (!is_array($object) || ($object["type"] ?? "") !== "ITEM") {
            continue;
        }

        $itemData = $object["item_data"] ?? null;
        if (!is_array($itemData)) {
            continue;
        }

        $name = trim((string) ($itemData["name"] ?? ""));
        if ($name === "") {
            continue;
        }

        $description = trim((string) ($itemData["description"] ?? ""));
        if ($description === "") {
            $description = "Limited-run product from the Alta Llama studio catalog.";
        }

        $category = "Uncategorized";

        $amount = null;
        $currency = "USD";
        $variations = $itemData["variations"] ?? [];

        if (is_array($variations)) {
            foreach ($variations as $variation) {
                if (!is_array($variation)) {
                    continue;
                }

                $priceMoney = $variation["item_variation_data"]["price_money"] ?? null;
                if (!is_array($priceMoney)) {
                    continue;
                }

                $rawAmount = $priceMoney["amount"] ?? null;
                if (is_numeric($rawAmount)) {
                    $amount = (int) $rawAmount;
                    $currency = (string) ($priceMoney["currency"] ?? "USD");
                    break;
                }
            }
        }

        $imageId = "";
        if (isset($itemData["image_ids"][0])) {
            $imageId = (string) $itemData["image_ids"][0];
        }

        $imageUrl = $imageUrls[$imageId] ?? "https://images.unsplash.com/photo-1512436991641-6745cdb1723f?auto=format&fit=crop&w=900&q=80";

        $products[] = [
            "name" => $name,
            "description" => $description,
            "price" => square_catalog_format_money($amount, $currency),
            "image_url" => $imageUrl,
            "category" => $category,
        ];
    }

    return $products;
}

function square_catalog_fetch(int $limit = 24): array
{
    $products = [];
    $message = "";
    $environment = "unknown";

    $csvProducts = square_catalog_load_from_csv($limit);
    if ($csvProducts !== []) {
        return [
            "products" => $csvProducts,
            "message" => "Catalog loaded from local CSV import.",
            "environment" => "csv",
        ];
    }

    try {
        $cfg = square_config();
        $environment = (string) ($cfg["environment"] ?? "unknown");

        $result = square_request("POST", "/v2/catalog/search", [
            "object_types" => ["ITEM"],
            "include_related_objects" => true,
            "limit" => $limit,
        ]);

        if ($result["status"] >= 200 && $result["status"] < 300) {
            $objects = is_array($result["data"]["objects"] ?? null) ? $result["data"]["objects"] : [];
            $relatedObjects = is_array($result["data"]["related_objects"] ?? null) ? $result["data"]["related_objects"] : [];

            $imageUrls = square_catalog_collect_image_urls($relatedObjects);
            $products = square_catalog_extract_products($objects, $imageUrls);
        }

        if ($products === []) {
            $listResult = square_request("GET", "/v2/catalog/list?types=ITEM,IMAGE");
            if ($listResult["status"] >= 200 && $listResult["status"] < 300) {
                $objects = is_array($listResult["data"]["objects"] ?? null) ? $listResult["data"]["objects"] : [];
                $imageUrls = square_catalog_collect_image_urls($objects);
                $products = square_catalog_extract_products($objects, $imageUrls);
            }
        }

        if ($products === []) {
            $message = "No catalog items were found in Square for the " . $environment . " environment. If your products are in the other environment, switch SQUARE_ENVIRONMENT in .env.";
        }
    } catch (Throwable $e) {
        $message = $e->getMessage();
    }

    return [
        "products" => $products,
        "message" => $message,
        "environment" => $environment,
    ];
}

function square_catalog_category_links(array $products): array
{
    $labels = [];

    foreach ($products as $product) {
        if (!is_array($product)) {
            continue;
        }

        $label = trim((string) ($product["category"] ?? "Uncategorized"));
        if ($label === "") {
            $label = "Uncategorized";
        }

        $labels[$label] = true;
    }

    $categoryLabels = array_keys($labels);
    natcasesort($categoryLabels);

    $links = [];
    foreach ($categoryLabels as $label) {
        $links[] = [
            "label" => $label,
            "slug" => square_catalog_slugify((string) $label),
        ];
    }

    return $links;
}

function square_catalog_group_by_category(array $products): array
{
    $grouped = [];

    foreach ($products as $product) {
        if (!is_array($product)) {
            continue;
        }

        $label = trim((string) ($product["category"] ?? "Uncategorized"));
        if ($label === "") {
            $label = "Uncategorized";
        }

        if (!array_key_exists($label, $grouped)) {
            $grouped[$label] = [];
        }

        $grouped[$label][] = $product;
    }

    uksort($grouped, 'strnatcasecmp');

    return $grouped;
}



