<?php
declare(strict_types=1);

require_once __DIR__ . "/square-config.php";

function square_request(string $method, string $path, ?array $payload = null): array
{
    $cfg = square_config();

    $ch = curl_init($cfg["base_url"] . $path);
    if ($ch === false) {
        throw new RuntimeException("Could not initialize cURL.");
    }

    $headers = [
        "Authorization: Bearer " . $cfg["access_token"],
        "Content-Type: application/json",
        "Square-Version: " . $cfg["api_version"],
    ];

    $opts = [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => strtoupper($method),
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_TIMEOUT => 20,
    ];

    if ($payload !== null) {
        $opts[CURLOPT_POSTFIELDS] = json_encode($payload, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    curl_setopt_array($ch, $opts);
    $raw = curl_exec($ch);

    if ($raw === false) {
        $err = curl_error($ch);
        curl_close($ch);
        throw new RuntimeException("Square request failed: " . $err);
    }

    $status = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    $decoded = json_decode($raw, true);
    if (!is_array($decoded)) {
        $decoded = ["raw" => $raw];
    }

    return [
        "status" => $status,
        "data" => $decoded,
    ];
}



