<?php

session_start();

// Log a successful logout
logEvent("SUCCESS: User logged out successfully", "OK");

// Unset and destroy the session
session_unset();
session_destroy();

// Going back to root
header("location: ../index.php?error=none");

// Function to log events with severity indicators
function logEvent($message, $severity = "INFO") {
    $logFile = "../log/login_log.txt";
    $timestamp = date("Y-m-d H:i:s");

    // Define ASCII characters for severity indicators
    $severityIcons = [
        "OK" => "✅",
        "WARNING" => "⚠️",
        "ERROR" => "❌",
    ];

    // Check if the specified severity exists in the array, otherwise default to "INFO"
    $severityIcon = isset($severityIcons[$severity]) ? $severityIcons[$severity] : $severityIcons["INFO"];

    $logMessage = "[$timestamp] $severityIcon $message" . PHP_EOL;

    // Append the log message to the log file
    file_put_contents($logFile, $logMessage, FILE_APPEND);
}

