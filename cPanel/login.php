<?php
  session_start();

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password']; 

    $db = new mysqli('localhost', 'shahk6', 'Montclair_18', 'shahk6_UserInfo');

    if ($db->connect_error) {
      die("Connection failed: " . $db->connect_error);
    }

    $stmt = $db->prepare("SELECT role FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($role);

    if ($stmt->num_rows == 1) {
      $stmt->fetch();
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
      echo "Invalid username or password";
    }

    $stmt->close();
    $db->close();
  }
?>
