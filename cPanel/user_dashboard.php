<?php
// Start the session at the very beginning
session_start();

// Include the database connection file
include 'db_connection.php';  // Make sure this file correctly assigns the $db variable

// Include the encryption functions and keys
include 'encryption_functions.php';
include 'encryption_key.php';

// Check if the username is passed as a URL parameter and set it to session
if (isset($_GET['username'])) {
    $_SESSION['username'] = $_GET['username'];
}

// Check if session username exists
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';

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
    echo "<div class='navbar'>Welcome, " . htmlspecialchars($username) . "</div>";

    // Ensure $db is defined and connected
    if ($db) {
        $query = "SELECT * FROM courses";
        $result = $db->query($query);
    
        echo "<h2 class='title-above-content'>Available Courses:</h2>";
        echo "<div class='table-container'>";
        echo "<form method='POST' action='register_course.php'>";
        echo "<table class='results-table'>";
        echo "<thead><tr><th>Course ID</th><th>Topic</th><th>Number of Attendees</th><th>Modality</th><th>Credits</th><th>Register</th><th>Unregister</th></tr></thead>";
        echo "<tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['course_id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['topic']) . "</td>";
            echo "<td>" . htmlspecialchars($row['number_of_attendees']) . "</td>";
            echo "<td>" . htmlspecialchars($row['modality']) . "</td>";
            echo "<td>" . htmlspecialchars($row['credits']) . "</td>";
            echo "<td><button type='submit' name='register' value='" . $row['course_id'] . "'>Register</button></td>";
            echo "<td><button type='submit' name='unregister' value='" . $row['course_id'] . "'>Unregister</button></td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</form>";
        echo "</div>"; // Close the table container

        $db->close();
    } else {
        echo "Database connection error. Please check your settings.";
    }
    ?>
</main>
<script>
window.onload = function() {
    <?php if (isset($_SESSION['message'])) { ?>
        alert("<?php echo $_SESSION['message']; ?>");
        <?php unset($_SESSION['message']); ?>
    <?php } ?>
};
</script>


<footer>
    &copy; <?php echo date("Y"); ?> Course Management System
</footer>

<?php
// Include the navbar.php file
include 'navbar.php';
?>
</body>
</html>
