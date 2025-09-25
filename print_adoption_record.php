<?php
include('includes/db.php');

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $result = $conn->query("SELECT * FROM adopted_children WHERE id=$id");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        die("Adoption record not found.");
    }
} else {
    die("No record ID provided.");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Print Adoption Record</title>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      padding: 30px;
      color: #333;
    }
    h1 {
      text-align: center;
      font-size: 28px;
      text-transform: uppercase;
      margin-bottom: 20px;
    }
    .record-box {
      border: 1px solid #999;
      padding: 20px;
      border-radius: 8px;
      max-width: 700px;
      margin: 0 auto;
    }
    .record-box img {
      max-width: 160px;
      border-radius: 8px;
      margin-bottom: 20px;
      display: block;
      margin-left: auto;
      margin-right: auto;
    }
    .record-box h2 {
      font-size: 22px;
      margin-bottom: 10px;
      text-align: center;
    }
    .record-box p {
      font-size: 16px;
      margin: 6px 0;
    }
    .footer-section {
      display: flex;
      justify-content: space-between;
      margin-top: 50px;
    }
    .footer-section p {
      font-size: 16px;
      margin: 10px 0;
    }
    .stamp-box {
      width: 120px;
      height: 80px;
      border: 1px dashed #333;
      margin-top: 10px;
    }
    .print-btn {
      padding: 10px 20px;
      background: #1a1a1a;
      color: #fff;
      border: none;
      border-radius: 5px;
      /* margin: 20px 0; */
      cursor: pointer;
      position: absolute;
      top: 74%;
      left: 44%;
    }
    @media print {
      .print-btn {
        display: none;
      }
    }
  </style>
</head>
<body>

  <h1>Child Adoption Welfare Center</h1>

  <button class="print-btn" onclick="window.print()">🖨 Print This Record</button>

  <div class="record-box">
    <img src='../assets/images/<?php echo $row['child_photo']; ?>' alt='<?php echo $row['child_name']; ?>'>

    <h2><?php echo $row['child_name']; ?> (Age: <?php echo $row['child_age']; ?>)</h2>

    <p><strong>Gender:</strong> <?php echo $row['child_gender']; ?></p>
    <p><strong>Health Status:</strong> <?php echo $row['child_health']; ?></p>
    <p><strong>Adopter Name:</strong> <?php echo $row['adopter_name']; ?></p>
    <p><strong>Contact:</strong> <?php echo $row['contact_info']; ?></p>
    <p><strong>Adopted On:</strong> <?php echo $row['adoption_date']; ?></p>
    <p><strong>Message:</strong> <?php echo $row['message']; ?></p>

    <div class="footer-section">
      <div>
        <p>Adopter's Name: ____________________</p>
        <p>Signature: __________________________</p>
      </div>
      <div>
        <p>Organization Stamp:</p>
        <div class="stamp-box"></div>
      </div>
    </div>
  </div>

</body>
</html>
