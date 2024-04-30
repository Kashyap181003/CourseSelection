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
    <title>Search Results</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<main>
    <section class="dashboard-background">
        <h2 class='title-above-content' style="text-align: center;">Search Results:</h2>
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

                if ($result->num_rows === 0) {
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
                }
                $db->close();
                ?>
            </tbody>
        </table>
    </section>
</main>

<footer>
    <p>&copy; <?php echo date("Y"); ?> Course Management System. All rights reserved.</p>
</footer>

<?php
// Include the navbar.php file
include 'navbar.php';
?>
</body>
</html>
