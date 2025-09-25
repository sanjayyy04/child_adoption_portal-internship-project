<?php
session_start();
include('includes/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin_users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION['admin_loggedin'] = true;
        $_SESSION['admin_username'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid login details!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>

<body>
  <div class="container">
    <h2>Admin Login</h2>
    <form method="POST" action="">
      <label>Username:</label>
      <input type="text" name="username" required placeholder="Enter username">

      <label>Password:</label>
      <input type="password" name="password" required placeholder="Enter password">

      <button type="submit">Login</button>
    </form>

    <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>
  </div>
</body>

</html>
