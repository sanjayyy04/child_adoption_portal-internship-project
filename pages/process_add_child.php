<?php
include('../includes/db.php');
// include('../includes/auth_check.php');
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $age  = (int)$_POST['age'];
    $gender = $conn->real_escape_string($_POST['gender']);
    $health_status = $conn->real_escape_string($_POST['health_status']);

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $photo = basename($_FILES['photo']['name']);
        $targetDir = "../assets/images/";
        $targetFile = $targetDir . $photo;

        if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetFile)) {
            $sql = "INSERT INTO children (name, age, gender, health_status, photo)
                    VALUES ('$name', '$age', '$gender', '$health_status', '$photo')";

            if ($conn->query($sql) === TRUE) {
                echo "<p class='success'>✅ Child profile added successfully!</p>";
            } else {
                echo "<p class='error'>❌ Database Error: " . $conn->error . "</p>";
            }
        } else {
            echo "<p class='error'>❌ Failed to upload photo.</p>";
        }
    } else {
        echo "<p class='error'>❌ No photo uploaded.</p>";
    }
} else {
    echo "<p>Invalid request.</p>";
}
?>
