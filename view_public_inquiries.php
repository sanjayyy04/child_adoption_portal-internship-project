<?php
include('includes/db.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Public Inquiries</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #e0eafc, #cfdef3);
      margin: 0;
      padding: 0;
    }

    .inquiry-container {
      max-width: 1000px;
      margin: 60px auto;
      padding: 30px;
      background: rgba(255, 255, 255, 0.3);
      border-radius: 20px;
      backdrop-filter: blur(10px);
      box-shadow: 0 8px 24px rgba(0,0,0,0.2);
    }

    h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #333;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      overflow-x: auto;
    }

    table th, table td {
      padding: 14px;
      text-align: left;
      border-bottom: 1px solid rgba(0,0,0,0.1);
    }

    table th {
      background: rgba(255, 255, 255, 0.4);
      backdrop-filter: blur(8px);
      color: #333;
    }

    table tr:nth-child(even) {
      background: rgba(255, 255, 255, 0.2);
    }

    table tr:hover {
      background: rgba(0,0,0,0.05);
    }

    .no-data {
      text-align: center;
      color: #555;
      padding: 20px;
    }

  </style>
</head>
<body>

<div class="inquiry-container">
  <h2>Public Inquiries</h2>

  <?php
  $result = $conn->query("SELECT * FROM public_inquiries ORDER BY id DESC");

  if ($result->num_rows > 0) {
      echo "<table>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Message</th>
                <th>Submitted At</th>
              </tr>";
      while($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td>{$row['id']}</td>
                  <td>{$row['name']}</td>
                  <td>{$row['email']}</td>
                  <td>{$row['contact']}</td>
                  <td>{$row['message']}</td>
                  <td>{$row['submitted_at']}</td>
                </tr>";
      }
      echo "</table>";
  } else {
      echo "<p class='no-data'>No public inquiries found.</p>";
  }
  ?>

</div>

</body>
</html>
