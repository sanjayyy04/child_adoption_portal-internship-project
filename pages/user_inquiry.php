<?php
include('../includes/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = $conn->real_escape_string($_POST['name']);
    $email   = $conn->real_escape_string($_POST['email']);
    $contact = $conn->real_escape_string($_POST['contact']);
    $message = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO public_inquiries (name, email, contact, message)
            VALUES ('$name', '$email', '$contact', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Inquiry submitted successfully!'); window.location.href='../index.php';</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "'); window.history.back();</script>";
    }
}
?>
