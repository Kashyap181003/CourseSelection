<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_id = $_POST['course_id'];
    $topic = $_POST['topic'];
    $number_of_attendees = $_POST['number_of_attendees'];
    $modality = $_POST['modality'];
    $credits = $_POST['credits'];

    $db = new mysqli('localhost', 'root', '', 'shahk6_coursemanagement');

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    $stmt = $db->prepare("INSERT INTO courses (course_id, topic, number_of_attendees, modality, credits) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiss", $course_id, $topic, $number_of_attendees, $modality, $credits);

    if ($stmt->execute()) {
        // Course inserted successfully
        header("Location: admin_dashboard.php?success=Course+inserted+successfully");
        exit;
    } else {
        // Error in inserting course
        header("Location: admin_dashboard.php?error=Error+inserting+course");
        exit;
    }

    $stmt->close();
    $db->close();
} else {
    // Redirect if accessed directly without POST request
    header("Location: admin_dashboard.php");
    exit;
}
?>
