<?php
declare(strict_types=1);

require_once __DIR__ . "/square-client.php";

function redirect_with_status(string $page, string $status, string $message): never
{
    $query = http_build_query([
        "status" => $status,
        "message" => $message,
    ]);

    header("Location: " . $page . "?" . $query);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    echo "Method Not Allowed";
    exit;
}

$formType = trim((string) ($_POST["form_type"] ?? ""));
$targetPage = $formType === "application" ? "artist-application.php" : "reservations.php";

$name = trim((string) ($_POST["name"] ?? ""));
$email = trim((string) ($_POST["email"] ?? ""));

if ($name === "" || $email === "") {
    redirect_with_status($targetPage, "error", "Please fill in your name and email.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    redirect_with_status($targetPage, "error", "Please enter a valid email address.");
}

try {
    $cfg = square_config();

    if ($formType === "application") {
        $role = trim((string) ($_POST["role"] ?? ""));
        $portfolio = trim((string) ($_POST["portfolio"] ?? ""));
        $bio = trim((string) ($_POST["bio"] ?? ""));

        $note = "Artist application";
        $note .= "\nRole: " . ($role !== "" ? $role : "Not specified");
        $note .= "\nPortfolio: " . ($portfolio !== "" ? $portfolio : "Not provided");
        $note .= "\nBio: " . ($bio !== "" ? $bio : "Not provided");

        $payload = [
            "given_name" => $name,
            "email_address" => $email,
            "note" => $note,
            "reference_id" => "artist-application",
        ];

        $result = square_request("POST", "/v2/customers", $payload);
        if ($result["status"] >= 200 && $result["status"] < 300) {
            redirect_with_status($targetPage, "success", "Application sent successfully to Square.");
        }

        $errorText = $result["data"]["errors"][0]["detail"] ?? "Square API rejected the request.";
        redirect_with_status($targetPage, "error", $errorText);
    }

    $service = trim((string) ($_POST["service"] ?? ""));
    $date = trim((string) ($_POST["date"] ?? ""));
    $notes = trim((string) ($_POST["notes"] ?? ""));

    $note = "Reservation request";
    $note .= "\nService: " . ($service !== "" ? $service : "Not specified");
    $note .= "\nPreferred date: " . ($date !== "" ? $date : "Not specified");
    $note .= "\nNotes: " . ($notes !== "" ? $notes : "None");

    $payload = [
        "given_name" => $name,
        "email_address" => $email,
        "note" => $note,
        "reference_id" => "reservation",
    ];

    $result = square_request("POST", "/v2/customers", $payload);
    if ($result["status"] >= 200 && $result["status"] < 300) {
        redirect_with_status($targetPage, "success", "Reservation sent successfully to Square.");
    }

    $errorText = $result["data"]["errors"][0]["detail"] ?? "Square API rejected the request.";
    redirect_with_status($targetPage, "error", $errorText);
} catch (Throwable $e) {
    redirect_with_status($targetPage, "error", $e->getMessage());
}
