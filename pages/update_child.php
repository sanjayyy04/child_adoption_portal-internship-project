<?php
include('../includes/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = (int)$_POST['id'];
    $name = $_POST['name'];
    $age  = $_POST['age'];
    $gender = $_POST['gender'];
    $health_status = $_POST['health_status'];

    // Check if new photo uploaded
    if (!empty($_FILES['photo']['name'])) {
        $photo = $_FILES['photo']['name'];
        $target = "../assets/images/" . basename($photo);
        move_uploaded_file($_FILES['photo']['tmp_name'], $target);

        $conn->query("UPDATE children SET 
            name='$name',
            age=$age,
            gender='$gender',
            health_status='$health_status',
            photo='$photo'
            WHERE id=$id");
    } else {
        $conn->query("UPDATE children SET 
            name='$name',
            age=$age,
            gender='$gender',
            health_status='$health_status'
            WHERE id=$id");
    }

    echo "success";
}
?>
