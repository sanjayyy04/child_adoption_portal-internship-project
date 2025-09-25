<?php
include('../includes/db.php');

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $child = $conn->query("SELECT * FROM children WHERE id=$id")->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Print Child Profile</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #e0eafc, #cfdef3);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 40px;
        }

        .print-card {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            width: 400px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
            text-align: center;
        }

        .print-card img {
           width: 211px;
             height: 331px;
            object-fit: cover;
            border-radius: 20px;
            margin-bottom: 20px;
            border: 3px solid rgba(255, 255, 255, 0.5);
        }

        .print-card h2 {
            margin: 0;
            color: #333;
        }

        .info {
            margin: 12px 0;
            font-size: 16px;
            color: #333;
        }

        button {
            margin-top: 20px;
            padding: 10px 20px;
            background: #4CAF50;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }

        button:hover {
            background: #45a049;
        }

        /* Clean print view */
        @media print {
            body {
                background: white;
                padding: 0;
                margin: 0;
            }

            .print-card {
                box-shadow: none;
                width: 100%;
                border-radius: 0;
                background: white;
                padding: 20px;
            }

            button {
                display: none;
            }

            .print-card img {
                border: none;
            }
        }
    </style>
</head>
<body>

<div class="print-card">
    <img src="../assets/images/<?php echo $child['photo']; ?>" alt="<?php echo $child['name']; ?>">

    <h2><?php echo $child['name']; ?>'s Profile</h2>

    <div class="info"><strong>Age:</strong> <?php echo $child['age']; ?></div>
    <div class="info"><strong>Gender:</strong> <?php echo $child['gender']; ?></div>
    <div class="info"><strong>Health Status:</strong> <?php echo $child['health_status']; ?></div>

    <button onclick="window.print()">🖨️ Print this profile</button>
</div>

</body>
</html>
