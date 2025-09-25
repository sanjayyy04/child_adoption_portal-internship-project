<?php
include('../includes/db.php');
// include('../includes/auth_check.php');

$result = $conn->query("SELECT * FROM adoption_inquiries ORDER BY id DESC");

if ($result->num_rows > 0) {
    echo "<div class='card-grid'>";
    while($row = $result->fetch_assoc()) {
        echo "<div class='child-card'>
        <h3>{$row['adopter_name']}</h3>
        <p><strong>Contact:</strong> {$row['contact_info']}</p>
        <p><strong>Preferred Child:</strong> {$row['preferred_child']}</p>
        <p><strong>Date:</strong> {$row['appointment_date']}</p>
        <p><strong>Message:</strong> {$row['message']}</p>
        <p><strong>Status:</strong> {$row['status']}</p>";

if ($row['status'] == 'Pending') {
    echo "<button class='approve-btn' onclick='updateStatus({$row['id']}, \"Approved\")'>✅ Approve</button>
          <button class='reject-btn' onclick='updateStatus({$row['id']}, \"Rejected\")'>❌ Reject</button>";
}

echo "<button class='delete-btn' onclick='deleteInquiry({$row['id']})'>🗑 Delete</button>
      </div>";

    }
    echo "</div>";
} else {
    echo "<p>No inquiries found.</p>";
}
?>

<?php
include('../includes/db.php');

$where = "";
if (isset($_GET['filter'])) {
    $status = $conn->real_escape_string($_GET['filter']);
    $where = "WHERE status='$status'";
}

$result = $conn->query("SELECT * FROM adoption_inquiries $where ORDER BY id DESC");

