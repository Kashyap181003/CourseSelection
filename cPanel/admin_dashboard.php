<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <nav class="navbar">
    <div class="navbar-container">
      <a href="#" class="navbar-brand">Admin Dashboard</a>
      <div class="navbar-links">
        <a href="#">Home</a>
        <a href="user_dashboard.php">Courses</a>
        <a href="#">Profile</a>
        <a href="logout.php">Logout</a>
      </div>
    </div>
  </nav>

  <main>
    <!-- Sections for Search, Insert, and User Information -->
    <section class="dashboard-background">
      <div class="list">
        <h2 class="button">Search Courses</h2>
        <div class="panel">
          <form action="results.php" method="post">
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
          <form action="insert_course.php" method="post">
            Course ID: <input type="text" name="course_id" class="input-field"><br>
            Topic: <input type="text" name="topic" class="input-field"><br>
            Number of Attendees: <input type="number" name="number_of_attendees" class="input-field"><br>
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
          <form action="display_user_info.php" method="post">
            User ID or Username: <input type="text" name="user_identifier" class="input-field"><br>
            <input type="submit" value="Search" class="search-button">
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
