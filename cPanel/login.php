<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password']; 

    // Include database connection or initialization
    include 'db_connection.php';

    $stmt = $db->prepare("SELECT id, password, role, name FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $hashed_password, $role, $name);

    if ($stmt->num_rows == 1) {
        $stmt->fetch();

        // Verify the hashed password
        if (password_verify($password, $hashed_password)) {
            $_SESSION['id'] = $id;
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;
            $_SESSION['name'] = $name; // Fetch and store the user's name

            if ($role === 'admin') {
                header("Location: admin_dashboard.php?username=" . urlencode($username)); // Redirect to the admin dashboard
                exit;
            } else {
                header("Location: user_dashboard.php?username=" . urlencode($username)); // Redirect to the user dashboard
                exit;
            }
        } else {
            // Redirect back to login.html with error message
            header("Location: login.html?error=Invalid+username+or+password");
            exit;
        }
    } else {
        // Redirect back to login.html with error message
        header("Location: login.html?error=Invalid+username+or+password");
        exit;
    }

    $stmt->close();
    $db->close();
}
?>
