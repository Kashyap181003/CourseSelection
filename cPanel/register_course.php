<?php
  session_start();
  if (!isset($_SESSION['username'])) {
    echo "You must be logged in to register for a course.";
    exit;
  }

  $course_id = $_POST['course_id'];
  $username = $_SESSION['username'];

  $db = new mysqli('localhost', 'root', '', 'shahk6_coursemanagement');

  if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
  }

  // Check if the user is already registered for this course
  $check_stmt = $db->prepare("SELECT * FROM course_registrations WHERE username = ? AND course_id = ?");
  $check_stmt->bind_param("ss", $username, $course_id);
  $check_stmt->execute();
  $check_stmt->store_result();

  if ($check_stmt->num_rows > 0) {
    echo "You are already registered for this course.";
  } else {
    // Proceed with registration
    $stmt = $db->prepare("INSERT INTO course_registrations (username, course_id) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $course_id);
    $stmt->execute();

    if ($stmt->affected_rows === 1) {
        echo "You have successfully registered for the course.";
    } else {
        echo "An error has occurred. The registration was not successful.";
    }

    $stmt->close();
  }

  $check_stmt->close();
  $db->close();
?>
