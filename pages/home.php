<?php
include('../includes/db.php');
// include('../includes/auth_check.php');

// Total children
$totalChildren = $conn->query("SELECT COUNT(*) as total FROM children")->fetch_assoc()['total'];

// Total inquiries
$totalInquiries = $conn->query("SELECT COUNT(*) as total FROM adoption_inquiries")->fetch_assoc()['total'];

// Appointments today
$today = date('Y-m-d');
$appointmentsToday = $conn->query("SELECT COUNT(*) as total FROM adoption_inquiries WHERE appointment_date='$today'")->fetch_assoc()['total'];

// Approved inquiries
$approved = $conn->query("SELECT COUNT(*) as total FROM adoption_inquiries WHERE status='Approved'")->fetch_assoc()['total'];

// Pending inquiries
$pending = $conn->query("SELECT COUNT(*) as total FROM adoption_inquiries WHERE status='Pending'")->fetch_assoc()['total'];
?>

<h2>Dashboard Overview</h2>

<div class="dashboard-cards">
  <div class="card">
    <h3>👶 Total Children</h3>
    <p><?= $totalChildren ?></p>
  </div>
  <div class="card">
    <h3>📋 Total Inquiries</h3>
    <p><?= $totalInquiries ?></p>
  </div>
  <div class="card">
    <h3>📅 Appointments Today</h3>
    <p><?= $appointmentsToday ?></p>
  </div>

    <div class="card link-card" onclick="loadPage('pages/view_approved_inqueries.php')">
    <h3>🟢 Approved</h3>
    <p><?= $approved ?></p>
    </div>


  <div class="card">
    <h3>🟡 Pending</h3>
    <p><?= $pending ?></p>
  </div>
</div>
