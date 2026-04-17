<?php
declare(strict_types=1);

require_once __DIR__ . "/square-client.php";

header("Content-Type: application/json; charset=utf-8");

try {
    $cfg = square_config();
    $result = square_request("GET", "/v2/locations");

    echo json_encode([
        "environment" => $cfg["environment"],
        "application_id" => $cfg["application_id"],
        "status" => $result["status"],
        "data" => $result["data"],
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode([
        "error" => $e->getMessage(),
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
}



