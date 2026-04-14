<?php
declare(strict_types=1);

require_once __DIR__ . "/square-client.php";

function square_catalog_escape(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, "UTF-8");
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
        ];
    }

    return $products;
}

function square_catalog_fetch(int $limit = 24): array
{
    $products = [];
    $message = "";
    $environment = "unknown";

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
