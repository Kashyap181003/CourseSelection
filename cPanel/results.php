<!DOCTYPE html>
<html>
<head>
  <title>Search Results</title>
</head>
<body>
<h1>Search Results</h1>
<?php
  $searchtype = $_POST['searchtype'];
  $searchterm = trim($_POST['searchterm']);

  if (!$searchtype || !$searchterm) {
     echo 'You have not entered search details. Please go back and try again.';
     exit;
  }

  @ $db = new mysqli('localhost', 'shahk6', 'Montclair_18', 'shahk6_CourseManagement');

  if (mysqli_connect_errno()) {
     echo 'Error: Could not connect to database. Please try again later.';
     exit;
  }

  $query = "SELECT * FROM courses WHERE ".$searchtype." LIKE '%".$searchterm."%'";
  $result = $db->query($query);

  $num_results = $result->num_rows;

  echo "<p>Number of courses found: ".$num_results."</p>";

  for ($i = 0; $i < $num_results; $i++) {
     $row = $result->fetch_assoc();
     echo "<p><strong>".($i + 1).". Course ID: ";
     echo htmlspecialchars($row['course_id']);
     echo "</strong><br />Topic: ";
     echo htmlspecialchars($row['topic']);
     echo "<br />Number of Attendees: ";
     echo htmlspecialchars($row['number_of_attendees']);
     echo "<br />Modality: ";
     echo htmlspecialchars($row['modality']);
     echo "<br />Credits: ";
     echo htmlspecialchars($row['credits']);
     echo "<br />Feedback: ";
     echo htmlspecialchars($row['feedback']);
     echo "</p>";
  }

  $result->free();
  $db->close();
?>
</body>
</html>
