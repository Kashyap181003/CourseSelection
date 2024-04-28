<?php
// Include the database connection file
include 'db_connection.php';

// Include the encryption functions
include 'encryption_functions.php';

// Include the encryption key (replace "encryption_key.php" with your actual file path)
include 'encryption_key.php';

// Start the session
session_start();

include 'navbar.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
  header('Location: login.php');
  exit;
}

// Handle form submissions for searching courses
if (isset($_POST['submit']) && $_POST['submit'] == 'Search') {
  // Sanitize input data
  $searchtype = $_POST['searchtype'];
  $searchterm = $_POST['searchterm'];

  // Query the database based on search type and term
  // Assuming you have a function to handle database queries
  $results = searchCourses($searchtype, $searchterm);

  // Display the results or handle them as needed
}

// Handle form submissions for inserting a new course
if (isset($_POST['submit']) && $_POST['submit'] == 'Insert Course') {
  // Sanitize and validate input data
  $course_id = $_POST['course_id'];
  $topic = $_POST['topic'];
  $number_of_attendees = $_POST['number_of_attendees'];
  $modality = $_POST['modality'];
  $credits = $_POST['credits'];

  // Insert the new course into the database
  // Assuming you have a function to handle database insertions
  $inserted = insertCourse($course_id, $topic, $number_of_attendees, $modality, $credits);

  // Display success or handle errors
}

// Handle form submissions for searching user information
if (isset($_POST['submit']) && $_POST['submit'] == 'Search User') {
  // Sanitize input data
  $user_identifier = $_POST['user_identifier'];

  // Query the database for user information
  // Assuming you have a function to handle user info queries
  $user_info = getUserInfo($user_identifier);

  // Display user information or handle it as needed
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

  <main>
    <!-- Sections for Search, Insert, and User Information -->
    <section class="dashboard-background">
      <div class="list">
        <h2 class="button">Search Courses</h2>
        <div class="panel">
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            Choose Search Type:<br />
            <select name="searchtype" class="input-field">
              <option value="course_id">Course ID</option>
              <option value="topic">Topic</option>
              <option value="modality">Modality</option>
            </select>
            <br />
            Enter Search Term:<br />
            <input name="searchterm" type="text" size="40" class="input-field">
            <br />
            <input type="submit" name="submit" value="Search" class="search-button">
          </form>
        </div>
      </div>
      <hr class="separator">
      <div class="list">
        <h2 class="button">Insert New Course</h2>
        <div class="panel">
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            Course ID: <input type="text" name="course_id" class="input-field"><br>
            Topic: <input type="text" name="topic" class="input-field"><br>
            Attendees: <input type="number" name="number_of_attendees" class="input-field"><br>
            Modality: <input type="text" name="modality" class="input-field"><br>
            Credits: <input type="number" name="credits" class="input-field"><br>
            <input type="submit" value="Insert Course" class="search-button">
          </form>
        </div>
      </div>
      <hr class="separator">
      <div class="list">
        <h2 class="button">Search for User Information</h2>
        <div class="panel">
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            User ID or Username: <input type="text" name="user_identifier" class="input-field"><br>
            <input type="submit" value="Search User" class="search-button">
          </form>
        </div>
      </div>
    </section>
  </main>

  <footer>
    <p>&copy; 2024 Course Registration Website. All rights reserved.</p>
  </footer>
  
  <script src="scripts.js"></script>
</body>
</html>
