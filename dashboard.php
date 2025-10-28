<?php
session_start();
if (!isset($_SESSION['admin_loggedin'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>

<div class="dashboard-container">

  <div class="dashboard-sidebar">
    <h2>Adoption Portal</h2><hr>
    <a href="#" onclick="loadPage('pages/home.php')">🏠 Dashboard</a>
    <a href="#" onclick="loadPage('pages/add_child.php')">➕ Add Child</a>
    <a href="#" onclick="loadPage('pages/view_children.php')">👶 View Children</a>
    <a href="#" onclick="loadPage('pages/appointments.php')">📅 Appointments</a>
    <a href="#" onclick="loadPage('pages/add_inquiry.php')">📄 Add Inquiry</a>
    <a href="#" onclick="loadPage('pages/view_inquiries.php')">📋 View Inquiries</a>
    <a href="view_public_inquiries.php" target = "_blank">View Public Inquiries</a>
    <a href="#" onclick="loadPage('pages/view_adopted_children.php')">🏠 Adopted Children</a>

    <hr>
    <a href="logout.php">🚪 Logout</a>
  </div>

  <div class="dashboard-main">
    <div class="dashboard-header">
      <h1>Welcome, <?php echo $_SESSION['admin_username']; ?></h1>
    </div>
    <div class="content-area" id="content-area">
      <h2>Dashboard Overview</h2>
      <p>Select an operation from the left sidebar to manage child profiles, inquiries, or appointments.</p>
    </div>
  </div>

</div>

<script>
function loadPage(pageUrl) {
  const area = document.getElementById('content-area');
  area.style.opacity = '0';
  setTimeout(() => {
    if (pageUrl === 'home') {
      area.innerHTML = `<h2>Dashboard Overview</h2><p>Select an operation from the left sidebar to manage child profiles, inquiries, or appointments.</p>`;
    } else {
      fetch(pageUrl)
      .then(response => response.text())
      .then(data => area.innerHTML = data)
      .catch(() => area.innerHTML = "<p style='color: #f44336;'>Failed to load content.</p>");
    }
    area.style.opacity = '1';
  }, 300);
}
function deleteChild(id) {
  if (confirm("Are you sure you want to delete this child's profile?")) {
    fetch(`pages/delete_child.php?id=${id}`)
      .then(response => response.text())
      .then(data => {
        if (data.trim() === "success") {
          loadPage('pages/view_children.php');  // reload child list after delete
        } else if (data.trim() === "adopted") {
          alert("Cannot delete: This child has already been adopted.");
        } else {
          alert("Failed to delete child profile.");
        }
      });
  }
}


// function editChild(id) {
//   loadPage(`pages/edit_child.php?id=${id}`);
// }

function editChild(id) {
  loadPage('pages/edit_child.php?id=' + id);
}


function deleteInquiry(id) {
  if (confirm("Are you sure you want to delete this inquiry?")) {
    fetch(`pages/delete_inquiry.php?id=${id}`)
      .then(response => response.text())
      .then(data => {
        if (data.trim() === "success") {
          loadPage('pages/view_inquiries.php');
        } else {
          alert("Failed to delete inquiry.");
        }
      });
  }
}

function updateStatus(id, status) {
  if (confirm(`Confirm to mark as ${status}?`)) {
    fetch(`pages/update_inquiry_status.php?id=${id}&status=${status}`)
      .then(response => response.text())
      .then(data => {
        if (data.trim() === "success") {
          loadPage('pages/view_inquiries.php');
        } else {
          alert("Failed to update status.");
        }
      });
  }
}

function printChild(id) {
  window.open('pages/print_child.php?id=' + id, '_blank');
}


</script>

</body>
</html>
