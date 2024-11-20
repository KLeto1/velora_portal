<?php
header("Content-Type: application/json");

$data = [
    "intel_id" => 12345,
    "details" => "Confidential troop movements have been logged.",
    "encrypted_hint" => base64_encode("Rolling Tide Operation Key: 0xdeadbeef"),
];

echo json_encode($data);
