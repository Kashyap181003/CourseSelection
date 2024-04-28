<?php
// Include the database connection file
include 'db_connection.php';

// Include the encryption functions
include 'encryption_functions.php';

// Include the encryption key (replace "encryption_key.php" with your actual file path)
include 'encryption_key.php';

// Start the session
session_start();

// Check if the username is passed as a URL parameter
if (isset($_GET['username'])) {
    $_SESSION['username'] = $_GET['username'];
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>User Dashboard</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<main class="dashboard-background">
  <?php
  // Output the username in the navbar
  echo "<div class='navbar'>Welcome, ".$_SESSION['username']."</div>";

  $query = "SELECT * FROM courses";
  $result = $db->query($query);

  echo "<h2 class='title-above-content'>Available Courses:</h2>";
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
</main>

<footer>
  &copy; <?php echo date("Y"); ?> Course Management System
</footer>

<?php
// Include the navbar.php file
include 'navbar.php';
?>
</body>
</html>