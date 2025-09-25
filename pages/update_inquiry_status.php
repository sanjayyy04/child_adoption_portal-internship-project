<?php
include('../includes/db.php');

if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = (int)$_GET['id'];
    $status = $conn->real_escape_string($_GET['status']);

    // Update inquiry status
    $conn->query("UPDATE adoption_inquiries SET status='$status' WHERE id=$id");

    if ($status === 'Approved') {
        // Fetch inquiry details
        $inq = $conn->query("SELECT * FROM adoption_inquiries WHERE id=$id")->fetch_assoc();
        $childName = $conn->real_escape_string($inq['preferred_child']);
        $adopterName = $inq['adopter_name'];
        $contact = $inq['contact_info'];
        $appointment = $inq['appointment_date'];
        $message = $inq['message'];
        $adoptionDate = date('Y-m-d');

        // Find child's details from children table
        $childResult = $conn->query("SELECT * FROM children WHERE name='$childName' LIMIT 1");

        if ($childResult->num_rows > 0) {
            $child = $childResult->fetch_assoc();
            $childId = $child['id'];
            $childAge = $child['age'];
            $childGender = $child['gender'];
            $childHealth = $child['health_status'];
            $childPhoto = $child['photo'];

            // Add child & adopter info into adopted_children
            $conn->query("INSERT INTO adopted_children 
            (child_id, adopter_name, contact_info, appointment_date, message, adoption_date, child_name, child_age, child_gender, child_health, child_photo)
            VALUES 
            ($childId, '$adopterName', '$contact', '$appointment', '$message', '$adoptionDate', '$childName', '$childAge', '$childGender', '$childHealth', '$childPhoto')");

            // Delete child from children table
            $conn->query("DELETE FROM children WHERE id=$childId");
        }
    }

    echo "success";
}
?>
