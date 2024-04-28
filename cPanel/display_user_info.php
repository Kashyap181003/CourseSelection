<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

// Check if the user is an admin
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    echo "You must be an admin to access this page.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_identifier = $_POST['user_identifier'];

    // Create database connections
      $db = new mysqli('localhost', 'root', '', 'shahk6_coursemanagement');
    // Check for database connection errors
    if ($db_user_info->connect_error || $db_course_management->connect_error) {
        die("Connection failed: " . $db_user_info->connect_error . $db_course_management->connect_error);
    }

    // Fetch user information
    if (is_numeric($user_identifier)) {
        // Search by id in shahk6_UserInfo database
        $stmt = $db_user_info->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $user_identifier);
    } else {
        // Search by username in shahk6_UserInfo database
        $stmt = $db_user_info->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $user_identifier);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    // Display user information
    if ($row = $result->fetch_assoc()) {
        echo "Name: " . htmlspecialchars($row['name']) . "<br>";
        echo "Address: " . htmlspecialchars($row['address']) . "<br>";
        echo "Interested Topics: " . htmlspecialchars($row['interested_topics']) . "<br>";
        echo "Courses Completed: " . htmlspecialchars($row['courses_completed']) . "<br>";
        echo "Credits Earned: " . htmlspecialchars($row['credits_earned']) . "<br>";
        echo "In person / Online: " . htmlspecialchars($row['demographics']) . "<br>";
        echo "Description: " . htmlspecialchars($row['Description']) . "<br>";

        // Query to get the names of the courses the user is registered for
        $course_stmt = $db_course_management->prepare("SELECT c.topic FROM course_registrations cr JOIN courses c ON cr.course_id = c.course_id WHERE cr.username = ?");
        $course_stmt->bind_param("s", $user_identifier);
        $course_stmt->execute();
        $course_result = $course_stmt->get_result();

        echo "Courses Currently Registered:<br>";
        while ($course_row = $course_result->fetch_assoc()) {
            echo htmlspecialchars($course_row['topic']) . "<br>";
        }
        $course_stmt->close();
    } else {
        echo "No user found with that identifier.";
    }

    // Close database connections
    $db_user_info->close();
    $db_course_management->close();
}
?>
