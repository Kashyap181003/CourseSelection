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

  <!-- Remove header and move "Results" to navigation bar -->
  <main>
    <table class="results-table">
      <thead>
        <tr>
          <th>Course ID</th>
          <th>Topic</th>
          <th>Number of Attendees</th>
          <th>Modality</th>
          <th>Credits</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $searchtype = $_POST['searchtype'] ?? '';
          $searchterm = trim($_POST['searchterm'] ?? '');

          if (empty($searchtype) || empty($searchterm)) {
             echo '<tr><td colspan="5">You have not entered search details. Please go back and try again.</td></tr>';
             exit;
          }

          $db = new mysqli('localhost', 'root', '', 'shahk6_coursemanagement');

          if ($db->connect_errno) {
             echo '<tr><td colspan="5">Error: Could not connect to database. Please try again later.</td></tr>';
             exit;
          }

          $query = "SELECT course_id, topic, number_of_attendees, modality, credits FROM courses WHERE $searchtype LIKE '%$searchterm%'";
          $result = $db->query($query);

          if (!$result) {
            echo '<tr><td colspan="5">No courses found matching the search criteria.</td></tr>';
          } else {
            while ($row = $result->fetch_assoc()) {
              echo '<tr>';
              echo '<td>' . htmlspecialchars($row['course_id']) . '</td>';
              echo '<td>' . htmlspecialchars($row['topic']) . '</td>';
              echo '<td>' . htmlspecialchars($row['number_of_attendees']) . '</td>';
              echo '<td>' . htmlspecialchars($row['modality']) . '</td>';
              echo '<td>' . htmlspecialchars($row['credits']) . '</td>';
              echo '</tr>';
            }
            $result->free();
          }

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
