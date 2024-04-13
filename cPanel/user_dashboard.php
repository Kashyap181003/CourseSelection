<!DOCTYPE html>
<html>
<head>
  <title>User Dashboard</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <nav class="navbar">
    <div class="navbar-container">
      <a href="#" class="navbar-brand">User Dashboard</a>
      <div class="navbar-links">
        <a href="#">Home</a>
        <a href="#">Courses</a>
        <a href="#">Profile</a>
        <a href="#">Logout</a>
      </div>
    </div>
  </nav>

  <div class="header">
    <div class="search-boxes">
      <!-- Course Search -->
      <form action="results.php" method="post" class="search-form">
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
      <form action="register_course.php" method="post" class="register-form">
        Course ID: <input type="text" name="course_id"><br>
        <input type="submit" value="Register">
      </form>
    </div>
  </div>

 <?php
$db = new mysqli('localhost', 'shahk6', 'Montclair_18', 'shahk6_CourseManagement');

if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
}

$query = "SELECT * FROM courses";
$result = $db->query($query);

echo "<h2>Available Courses:</h2>";
echo "<table border='1'>";
echo "<tr><th>Course ID</th><th>Topic</th><th>Number of Attendees</th><th>Modality</th><th>Credits</th></tr>";
while($row = $result->fetch_assoc()) {
  echo "<tr>";
  echo "<td>" . $row['course_id'] . "</td>";
  echo "<td>" . $row['topic'] . "</td>";
  echo "<td>" . $row['number_of_attendees'] . "</td>";
  echo "<td>" . $row['modality'] . "</td>";
  echo "<td>" . $row['credits'] . "</td>";
  echo "</tr>";
}
echo "</table>";

$db->close();
?>


</body>
</html>