<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password']; 
    $name = $_POST['name'];
    $address = $_POST['address'];
    $interested_topics = $_POST['interested_topics'];
    $application_description = $_POST['application_description'];
    $courses_completed = $_POST['courses_completed'];
    $credits_earned = $_POST['credits_earned'];
    $demographics = $_POST['demographics'];
    $feedback = $_POST['feedback'];

    $db = new mysqli('localhost', 'shahk6', 'Montclair_18', 'shahk6_UserInfo');

    if ($db->connect_error) {
      die("Connection failed: " . $db->connect_error);
    }

    $stmt = $db->prepare("INSERT INTO users (username, password, name, address, interested_topics, application_description, courses_completed, credits_earned, demographics, feedback) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssiis", $username, $password, $name, $address, $interested_topics, $application_description, $courses_completed, $credits_earned, $demographics, $feedback);
    $stmt->execute();

    if ($stmt->affected_rows === 1) {
      echo "User registered successfully.";
    } else {
      echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $db->close();
  }
?>
