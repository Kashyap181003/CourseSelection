<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password']; 

    $db = new mysqli('localhost', 'shahk6', 'Montclair_18', 'shahk6_UserInfo');

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    $stmt = $db->prepare("SELECT password, role FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($hashed_password, $role);

    if ($stmt->num_rows == 1) {
        $stmt->fetch();

        // Verify the hashed password
        if (password_verify($password, $hashed_password)) {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;

            if ($role === 'admin') {
                header("Location: admin_dashboard.php"); // Redirect to the admin dashboard
                exit;
            } else {
                header("Location: user_dashboard.php"); // Redirect to the user dashboard
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
