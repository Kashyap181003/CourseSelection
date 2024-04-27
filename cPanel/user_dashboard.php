<!DOCTYPE html>
<html>
<head>
  <title>User Dashboard</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <nav class="navbar">
    <div class="navbar-container">
      <a href="#" class="navbar-brand">Course Management System</a>
      <!-- Move "Results" and add search form -->
      <form action="results.php" method="POST" class="search-form">
        <input type="text" name="searchterm" placeholder="Enter search term" value="<?php echo htmlspecialchars($searchterm ?? ''); ?>">
        <select name="searchtype">
          <option value="course_id">Course ID</option>
          <option value="topic">Topic</option>
          <option value="modality">Modality</option>
        </select>
        <input type="submit" value="Search">
      </form>
      <!-- End of search form -->
      <div class="navbar-links">
        <a href="index.php">Home</a>
        <a href="courses.php">Courses</a>
        <a href="profile.php">Profile</a>
        <a href="logout.php">Logout</a>
      </div>
    </div>
  </nav>

  <!-- Register Search Bar as Title -->
  <h2 class="register-search-title">Course Registration Search</h2>
  <div class="header">
    <div class="search-boxes">
      <!-- Course Registration -->
      <form action="register_course.php" method="post" class="search-form">
        Course ID: <input type="text" name="course_id"><br>
        <input type="submit" value="Register">
      </form>
    </div>
  </div>

  <?php
  $db = new mysqli('localhost', 'root', '', 'shahk6_coursemanagement');

  if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
  }

  $query = "SELECT * FROM courses";
  $result = $db->query($query);

  echo "<h2>Available Courses:</h2>";
  echo "<table class='results-table'>";
  echo "<thead><tr><th>Course ID</th><th>Topic</th><th>Number of Attendees</th><th>Modality</th><th>Credits</th></tr></thead>";
  echo "<tbody>";
  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['course_id'] . "</td>";
    echo "<td>" . $row['topic'] . "</td>";
    echo "<td>" . $row['number_of_attendees'] . "</td>";
    echo "<td>" . $row['modality'] . "</td>";
    echo "<td>" . $row['credits'] . "</td>";
    echo "</tr>";
  }
  echo "</tbody>";
  echo "</table>";

  $db->close();
  ?>
</body>
</html>
