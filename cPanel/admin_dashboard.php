<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
    <?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
  ?>
</head>
<body>
  <h1>Admin Dashboard</h1>

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

  <!-- Insert Course -->
  <h2>Insert New Course</h2>
  <form action="insert_course.php" method="post">
    Course ID: <input type="text" name="course_id"><br>
    Topic: <input type="text" name="topic"><br>
    Number of Attendees: <input type="number" name="number_of_attendees"><br>
    Modality: <input type="text" name="modality"><br>
    Credits: <input type="number" name="credits"><br>
    Feedback: <input name="feedback"></input><br>
    <input type="submit" value="Insert Course">
  </form>
  
    <!-- Search for User Information -->
  <h2>Search for User Information</h2>
  <form action="display_user_info.php" method="post">
    User ID or Username: <input type="text" name="user_identifier"><br>
    <input type="submit" value="Search">
  </form>

</body>
</html>
