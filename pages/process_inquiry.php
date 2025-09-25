<?php
include('../includes/db.php');
// include('../includes/auth_check.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['adopter_name']);
    $contact = $conn->real_escape_string($_POST['contact_info']);
    $child = $conn->real_escape_string($_POST['preferred_child']);
    $date = $conn->real_escape_string($_POST['appointment_date']);
    $message = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO adoption_inquiries 
            (adopter_name, contact_info, preferred_child, appointment_date, message)
            VALUES ('$name', '$contact', '$child', '$date', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "<p class='success'>✅ Inquiry submitted successfully!</p>";
    } else {
        echo "<p class='error'>❌ Error: " . $conn->error . "</p>";
    }
}
?>
<p><button onclick="loadPage('pages/view_inquiries.php')">View Inquiries</button></p>
