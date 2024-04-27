<!DOCTYPE html>
<html>
<head>
  <title>Course Entry Results</title>
</head>
<body>
<h1>Course Entry Results</h1>
<?php
  $course_id = $_POST['course_id'];
  $topic = $_POST['topic'];
  $number_of_attendees = $_POST['number_of_attendees'];
  $modality = $_POST['modality'];
  $credits = $_POST['credits'];
  $feedback = $_POST['Description'];

  if (!$course_id || !$topic || !$number_of_attendees || !$modality || !$credits) {
     echo "You have not entered all the required details.<br />"
          . "Please go back and try again.";
     exit;
  }

  $db = new mysqli('localhost', 'root', '', 'shahk6_coursemanagement');

  if ($db->connect_errno) {
     echo "Error: Could not connect to database. Please try again later.";
     exit;
  }

  $query = "INSERT INTO courses (course_id, topic, number_of_attendees, modality, credits, Description) VALUES (?, ?, ?, ?, ?, ?)";
  $stmt = $db->prepare($query);
  $stmt->bind_param("ssisis", $course_id, $topic, $number_of_attendees, $modality, $credits, $Description);
  $stmt->execute();

  if ($stmt->affected_rows === 1) {
      echo $stmt->affected_rows . " course inserted into database.";
  } else {
      echo "An error has occurred. The item was not added.";
  }

  $stmt->close();
  $db->close();
?>
</body>
</html>
