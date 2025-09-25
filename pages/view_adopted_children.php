<?php
include('../includes/db.php');

$result = $conn->query("SELECT * FROM adopted_children ORDER BY adoption_date DESC");

if ($result->num_rows > 0) {
    echo "<div class='card-grid'>";
    while($row = $result->fetch_assoc()) {
        echo "<div class='child-card'>
                <img src='assets/images/{$row['child_photo']}' alt='{$row['child_name']}'>
                <h3>{$row['child_name']} (Age: {$row['child_age']})</h3>
                <p><strong>Gender:</strong> {$row['child_gender']}</p>
                <p><strong>Health:</strong> {$row['child_health']}</p>
                <p><strong>Adopted By:</strong> {$row['adopter_name']}</p>
                <p><strong>Contact:</strong> {$row['contact_info']}</p>
                <p><strong>Adopted On:</strong> {$row['adoption_date']}</p>
                <p><strong>Message:</strong> {$row['message']}</p>

                <a href='print_adoption_record.php?id={$row['id']}' target='_blank'>
                <button class='print-btn2'>🖨 Print Record</button>
                </a>
              </div>";
    }
    echo "</div>";
} else {
    echo "<p>No adoptions yet.</p>";
}
?>
