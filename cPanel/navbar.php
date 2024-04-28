<?php
// Include database connection or initialization
include 'db_connection.php';

// Assuming the user's username is stored in a session variable named $_SESSION['username']
$username = $_SESSION['username'];

// Query to fetch the user's role and name based on username
$query = "SELECT role, name FROM users WHERE username = '$username'";
$result = $db->query($query);

// Check if the query was successful and if a row is returned
if ($result && $result->num_rows > 0) {
    // Fetch the role and name from the result set
    $row = $result->fetch_assoc();
    $userRole = $row['role'];
    $userName = $row['name'];
} else {
    // Default to normal user role and empty name if the query fails or no row is returned
    $userRole = 'user';
    $userName = '';
}

// Close the database connection
$db->close();
?>

<nav class="navbar">
  <div class="navbar-container">
    <?php
    // Set the home link based on the user's role
    $homeLink = ($userRole === 'admin') ? 'admin_dashboard.php' : 'user_dashboard.php';
    $courseLink = ($userRole === 'admin') ? 'admin_courses.php' : 'user_dashboard.php';
    ?>
    <a href="<?php echo $homeLink; ?>" class="navbar-brand">Course Management System</a>
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
      <span>Welcome, <?php echo $userName; ?></span> <!-- Display the user's name -->
      <a href="<?php echo $homeLink; ?>">Home</a>
      <a href="<?php echo $courseLink; ?>">Courses</a>
      <a href="profile.php?userid=<?php echo urlencode($encryptedUserId); ?>">Profile</a>
      <a href="logout.php">Logout</a>
    </div>
  </div>
</nav>
