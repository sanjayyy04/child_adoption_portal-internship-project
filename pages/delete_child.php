<?php
include('../includes/db.php');

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    // Check if child is adopted
    $check = $conn->query("SELECT status FROM children WHERE id=$id");
    if ($check->num_rows > 0) {
        $child = $check->fetch_assoc();
        if ($child['status'] === 'Adopted') {
            echo "adopted";
            exit();
        }
    }

    // Delete child
    $conn->query("DELETE FROM children WHERE id=$id");
    echo "success";
}
?>
