<?php
include('../includes/db.php');

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $conn->query("DELETE FROM adoption_inquiries WHERE id=$id");
    echo "success";
}
?>
