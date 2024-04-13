<!DOCTYPE html>
<html>
<head>
  <title>Search Results</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <nav class="navbar">
    <div class="navbar-container">
      <a href="#" class="navbar-brand">Course Management System</a>
      <div class="navbar-links">
        <a href="index.php">Home</a>
        <a href="courses.php">Courses</a>
        <a href="profile.php">Profile</a>
        <a href="logout.php">Logout</a>
      </div>
    </div>
  </nav>

  <header>
    <h1>Search Results</h1>
  </header>

  <main>
    <table class="results-table">
      <thead>
        <tr>
          <th>Course ID</th>
          <th>Topic</th>
          <th>Number of Attendees</th>
          <th>Modality</th>
          <th>Credits</th>
          <th>Feedback</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $searchtype = $_POST['searchtype'];
          $searchterm = trim($_POST['searchterm']);

          if (!$searchtype || !$searchterm) {
             echo '<tr><td colspan="6">You have not entered search details. Please go back and try again.</td></tr>';
             exit;
          }

          @ $db = new mysqli('localhost', 'shahk6', 'Montclair_18', 'shahk6_CourseManagement');

          if (mysqli_connect_errno()) {
             echo '<tr><td colspan="6">Error: Could not connect to database. Please try again later.</td></tr>';
             exit;
          }

          $query = "SELECT * FROM courses WHERE ".$searchtype." LIKE '%".$searchterm."%'";
          $result = $db->query($query);

          $num_results = $result->num_rows;

          if ($num_results === 0) {
            echo '<tr><td colspan="6">No courses found matching the search criteria.</td></tr>';
          } else {
            while ($row = $result->fetch_assoc()) {
              echo '<tr>';
              echo '<td>' . htmlspecialchars($row['course_id']) . '</td>';
              echo '<td>' . htmlspecialchars($row['topic']) . '</td>';
              echo '<td>' . htmlspecialchars($row['number_of_attendees']) . '</td>';
              echo '<td>' . htmlspecialchars($row['modality']) . '</td>';
              echo '<td>' . htmlspecialchars($row['credits']) . '</td>';
              echo '<td>' . htmlspecialchars($row['Description']) . '</td>';
              echo '</tr>';
            }
          }

          $result->free();
          $db->close();
        ?>
      </tbody>
    </table>
  </main>

  <footer>
    <p>&copy; <?php echo date("Y"); ?> Course Management System. All rights reserved.</p>
  </footer>
</body>
</html>
