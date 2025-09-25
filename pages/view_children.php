<?php
include('../includes/db.php');
// include('../includes/auth_check.php');

$result = $conn->query("SELECT * FROM children ORDER BY id DESC");

if ($result->num_rows > 0) {
    echo "<div class='card-grid'>";
    while($row = $result->fetch_assoc()) {
        echo "<div class='child-card'>
                <img src='assets/images/{$row['photo']}' alt='{$row['name']}'>
                <h3>{$row['name']}</h3>
                <p><strong>Age:</strong> {$row['age']}</p>
                <p><strong>Gender:</strong> {$row['gender']}</p>
                <p><strong>Health:</strong> {$row['health_status']}</p>
                <button class='delete-btn' onclick='deleteChild({$row['id']})'>🗑 Delete</button>
                <button class='edit-btn' onclick='editChild({$row['id']})'>✏️ Edit</button>
                
                <button class='print-btn' onclick='printChild({$row['id']})'>🖨️ Print</button>

              </div>";
    }
    echo "</div>";
} else {
    echo "<p>No child profiles found.</p>";
}
?>
