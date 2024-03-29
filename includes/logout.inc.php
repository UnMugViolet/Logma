<?php
session_start();
// Log a successful logout
logEvent("SUCCESS: User ".$_SESSION["useruid"] ." logged out successfully", "LOGOUTOK");

// Unset and destroy the session
session_unset();
session_destroy();

// Going back to root
header("location: /?error=none");

// Function to log events with severity indicators
function logEvent($message, $severity = "LOGOUTOK") {
    $logFile = __DIR__ . "/../log/login_log.txt";
    
    $parisTimezone = new DateTimeZone('Europe/Paris');
    $dateTime = new DateTime('now', $parisTimezone);
    $timestamp = $dateTime->format("Y-m-d H:i:s");  

    // Define ASCII characters for severity indicators
    $severityIcons = [
        "LOGOUTOK" => "🌠",
        "WARNING" => "⚠️",
        "ERROR" => "❌",
    ];

    // Check if the specified severity exists in the array, otherwise default to "INFO"
    $severityIcon = isset($severityIcons[$severity]) ? $severityIcons[$severity] : $severityIcons["LOGOUTOK"];

    $logMessage = "[$timestamp] $severityIcon $message" . PHP_EOL;

    // Append the log message to the log file
    file_put_contents($logFile, $logMessage, FILE_APPEND);
}

