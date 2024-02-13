<!DOCTYPE html>
<html>
<head>
  <title>User Dashboard</title>
</head>
<body>
  <h1>User Dashboard</h1>

  <!-- Course Search -->
  <h2>Search for a Course</h2>
  <form action="results.php" method="post">
    Choose Search Type:<br />
    <select name="searchtype">
      <option value="course_id">Course ID</option>
      <option value="topic">Topic</option>
      <option value="modality">Modality</option>
    </select>
    <br />
    Enter Search Term:<br />
    <input name="searchterm" type="text" size="40">
    <br />
    <input type="submit" name="submit" value="Search">
  </form>

  <!-- Course Registration -->
  <h2>Register for a Course</h2>
  <form action="register_course.php" method="post">
    Course ID: <input type="text" name="course_id"><br>
    <input type="submit" value="Register">
  </form>

  <?php
    $db = new mysqli('localhost', 'shahk6', 'Montclair_18', 'shahk6_CourseManagement');

    if ($db->connect_error) {
      die("Connection failed: " . $db->connect_error);
    }

    $query = "SELECT * FROM courses";
    $result = $db->query($query);

    echo "<h2>Available Courses:</h2>";
    while($row = $result->fetch_assoc()) {
      echo "Course ID: " . $row['course_id'] . "<br>";
      echo "Topic: " . $row['topic'] . "<br>";
      echo "Number of Attendees: " . $row['number_of_attendees'] . "<br>";
      echo "Modality: " . $row['modality'] . "<br>";
      echo "Credits: " . $row['credits'] . "<br><br>";
    }

    $db->close();
  ?>

</body>
</html>
