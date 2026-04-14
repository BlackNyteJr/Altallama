<?php
declare(strict_types=1);

require_once __DIR__ . "/env-loader.php";
load_env_file(__DIR__ . "/.env");

/*
 * Fill these values with your Square credentials.
 * You can also set env vars SQUARE_APPLICATION_ID, SQUARE_ACCESS_TOKEN, SQUARE_ENVIRONMENT.
 */
const SQUARE_APPLICATION_ID = "";
const SQUARE_ACCESS_TOKEN = "";
const SQUARE_ENVIRONMENT = "sandbox"; // sandbox or production
const SQUARE_API_VERSION = "2026-03-18";


function square_config(): array
{
    $appId = trim((string) (getenv("SQUARE_APPLICATION_ID") ?: SQUARE_APPLICATION_ID));
    $accessToken = trim((string) (getenv("SQUARE_ACCESS_TOKEN") ?: SQUARE_ACCESS_TOKEN));
    $environment = strtolower(getenv("SQUARE_ENVIRONMENT") ?: SQUARE_ENVIRONMENT);
    $apiVersion = trim((string) (getenv("SQUARE_API_VERSION") ?: SQUARE_API_VERSION));

    // Application ID is only required for frontend Web Payments SDK usage.
    // Server-to-server API calls (like /v2/customers, /v2/locations) only require the access token.
    if ($accessToken === "" || $accessToken === "REPLACE_WITH_YOUR_SQUARE_ACCESS_TOKEN") {
        throw new RuntimeException("Set your Square access token in square-config.php or env var SQUARE_ACCESS_TOKEN.");
    }

    if (!in_array($environment, ["sandbox", "production"], true)) {
        throw new RuntimeException("SQUARE_ENVIRONMENT must be sandbox or production.");
    }

    $baseUrl = $environment === "production"
        ? "https://connect.squareup.com"
        : "https://connect.squareupsandbox.com";

    return [
        "application_id" => $appId,
        "access_token" => $accessToken,
        "environment" => $environment,
        "api_version" => $apiVersion,
        "base_url" => $baseUrl,
    ];
}
