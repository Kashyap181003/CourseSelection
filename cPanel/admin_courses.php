<?php
// Include the database connection file
include 'db_connection.php';

// Include the encryption functions
include 'encryption_functions.php';

// Include the encryption key (replace "encryption_key.php" with your actual file path)
include 'encryption_key.php';

// Start the session
session_start();

// Handle delete action if course_id is provided via GET request
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['course_id'])) {
    $courseId = $_GET['course_id'];
    // Perform delete operation (you need to implement this)
    $deleteQuery = "DELETE FROM courses WHERE course_id = '$courseId'";
    if ($db->query($deleteQuery)) {
        echo "<script>alert('Course deleted successfully');</script>";
        // Redirect back to admin courses page after deletion
        header("Location: admin_courses.php");
        exit();
    } else {
        echo "<script>alert('Error deleting course');</script>";
    }
}

// Handle edit action if form is submitted with POST data
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_course'])) {
    $courseId = $_POST['course_id'];
    $updatedTopic = $_POST['topic'];
    $updatedAttendees = $_POST['attendees'];
    $updatedModality = $_POST['modality'];
    $updatedCredits = $_POST['credits'];

    // Perform update operation (you need to implement this)
    $updateQuery = "UPDATE courses SET topic = '$updatedTopic', number_of_attendees = '$updatedAttendees', modality = '$updatedModality', credits = '$updatedCredits' WHERE course_id = '$courseId'";
    if ($db->query($updateQuery)) {
        echo "<script>alert('Course updated successfully');</script>";
        // Redirect back to admin courses page after update
        header("Location: admin_courses.php");
        exit();
    } else {
        echo "<script>alert('Error updating course');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Courses</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<main class="dashboard-background">
    <div class='navbar'>Welcome, <?php echo $_SESSION['username']; ?></div>

    <h2 class='title-above-content'>Available Courses:</h2>
    <div class="table-container">
        <table class='results-table'>
            <thead>
            <tr>
                <th>Course ID</th>
                <th>Topic</th>
                <th>Number of Attendees</th>
                <th>Modality</th>
                <th>Credits</th>
                <th>Actions</th> <!-- Add a column for actions (edit/delete) -->
            </tr>
            </thead>
            <tbody>
            <?php
            // Fetch and display courses from the database
            $query = "SELECT * FROM courses";
            $result = $db->query($query);
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['course_id'] . "</td>";
                echo "<td>";
                if (isset($_GET['action']) && $_GET['action'] === 'edit' && $_GET['course_id'] == $row['course_id']) {
                    // Show editable text box for topic
                    echo "<form method='POST' action='admin_courses.php'>";
                    echo "<input type='hidden' name='course_id' value='" . $row['course_id'] . "' />";
                    echo "<input type='text' name='topic' value='" . $row['topic'] . "' />";
                } else {
                    echo $row['topic'];
                }
                echo "</td>";
                echo "<td>";
                if (isset($_GET['action']) && $_GET['action'] === 'edit' && $_GET['course_id'] == $row['course_id']) {
                    // Show editable text box for attendees
                    echo "<input type='text' name='attendees' value='" . $row['number_of_attendees'] . "' />";
                } else {
                    echo $row['number_of_attendees'];
                }
                echo "</td>";
                echo "<td>";
                if (isset($_GET['action']) && $_GET['action'] === 'edit' && $_GET['course_id'] == $row['course_id']) {
                    // Show editable text box for modality
                    echo "<input type='text' name='modality' value='" . $row['modality'] . "' />";
                } else {
                    echo $row['modality'];
                }
                echo "</td>";
                echo "<td>";
                if (isset($_GET['action']) && $_GET['action'] === 'edit' && $_GET['course_id'] == $row['course_id']) {
                    // Show editable text box for credits
                    echo "<input type='text' name='credits' value='" . $row['credits'] . "' />";
                } else {
                    echo $row['credits'];
                }
                echo "</td>";
                echo "<td>";
                if (isset($_GET['action']) && $_GET['action'] === 'edit' && $_GET['course_id'] == $row['course_id']) {
                    echo "<a href='admin_courses.php'>Cancel</a>";
                } else {
                    echo "<a href='admin_courses.php?action=edit&course_id=" . $row['course_id'] . "'>Edit</a> | ";
                }
                echo "<a href='admin_courses.php?action=delete&course_id=" . $row['course_id'] . "' onclick=\"return confirm('Are you sure you want to delete this course?');\">Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
    <?php
    // Add the Save button here, outside the table
    if (isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['course_id'])) {
        echo "<input type='submit' name='edit_course' value='Save' />";
        echo "</form>";
    }
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
