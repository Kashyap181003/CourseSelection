<?php
include 'db_connection.php';
session_start();

$username = $_SESSION['username'];

// Handle Registration
if (isset($_POST['register'])) {
    $course_id = $_POST['register'];

    // Check if already registered
    $check_stmt = $db->prepare("SELECT * FROM course_registrations WHERE username = ? AND course_id = ?");
    $check_stmt->bind_param("ss", $username, $course_id);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        $_SESSION['message'] = "You are already registered for this course.";
    } else {
        // Register the student
        $db->begin_transaction();
        $insert_stmt = $db->prepare("INSERT INTO course_registrations (username, course_id) VALUES (?, ?)");
        $insert_stmt->bind_param("ss", $username, $course_id);
        $insert_stmt->execute();

        // Decrement the number of attendees
        $update_stmt = $db->prepare("UPDATE courses SET number_of_attendees = number_of_attendees - 1 WHERE course_id = ?");
        $update_stmt->bind_param("s", $course_id);
        $update_stmt->execute();

        if ($insert_stmt->affected_rows > 0 && $update_stmt->affected_rows > 0) {
            $db->commit();
            $_SESSION['message'] = "Registration successful!";
        } else {
            $db->rollback();
            $_SESSION['message'] = "Failed to register.";
        }

        $insert_stmt->close();
        $update_stmt->close();
    }

    $check_stmt->close();
}

// Handle Unregistration
if (isset($_POST['unregister'])) {
    $course_id = $_POST['unregister'];

    $db->begin_transaction();
    // Unregister the student
    $delete_stmt = $db->prepare("DELETE FROM course_registrations WHERE username = ? AND course_id = ?");
    $delete_stmt->bind_param("ss", $username, $course_id);
    $delete_stmt->execute();

    // Increment the number of attendees
    $update_stmt = $db->prepare("UPDATE courses SET number_of_attendees = number_of_attendees + 1 WHERE course_id = ?");
    $update_stmt->bind_param("s", $course_id);
    $update_stmt->execute();

    if ($delete_stmt->affected_rows > 0 && $update_stmt->affected_rows > 0) {
        $db->commit();
        $_SESSION['message'] = "Unregistration successful!";
    } else {
        $db->rollback();
        $_SESSION['message'] = "Failed to unregister.";
    }

    $delete_stmt->close();
    $update_stmt->close();
}

$db->close();

// Redirect back to the dashboard
header('Location: user_dashboard.php');
exit;
?>
