<?php

session_start();
session_unset();
session_destroy();

$response = [
    "status" => 0,
    "error" => 0,
    "message" => "Signing you out..."
];

echo json_encode($response);

?>