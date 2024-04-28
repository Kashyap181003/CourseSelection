<?php
// Database connection parameters
$dbHost = 'localhost';
$dbUser = 'root';
$dbPassword = '';
$dbName = 'shahk6_coursemanagement';

// Create database connection
$db = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>
