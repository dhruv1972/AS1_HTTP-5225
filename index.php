<?php
$host = 'localhost';
$username = 'root';
$password = ''; 
$database = 'walmart';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM walmart_inventory ORDER BY date_added DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Walmart Inventory</title>
   
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Roboto', Arial, sans-serif;
        background: linear-gradient(135deg, #e0eafc 0%, #cfdef3 100%);
        margin: 0;
        padding: 0;
        min-height: 100vh;
    }

    h1 {
        text-align: center;
        color: #1a237e;
        margin-top: 30px;
        letter-spacing: 2px;
        font-weight: 700;
    }

    .container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 30px;
        padding: 40px 5vw;
        max-width: 1200px;
        margin: 0 auto;
    }

    .item-card {
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 8px 24px rgba(30, 34, 90, 0.08);
        padding: 28px 22px 22px 22px;
        transition: transform 0.18s, box-shadow 0.18s;
        position: relative;
        overflow: hidden;
    }

    .item-card:hover {
        transform: translateY(-6px) scale(1.03);
        box-shadow: 0 16px 32px rgba(30, 34, 90, 0.16);
    }

    .item-card h2 {
        color: #1976d2;
        margin-bottom: 12px;
        font-size: 1.4em;
        font-weight: 700;
    }

    .item-card p {
        margin: 7px 0;
        color: #333;
        font-size: 1em;
    }

    .item-card strong {
        color: #1a237e;
    }

    .low-stock {
        color: #d32f2f;
        font-weight: bold;
        background: #fff3e0;
        padding: 6px 12px;
        border-radius: 8px;
        display: inline-block;
        margin-top: 10px;
        font-size: 1em;
    }

    @media (max-width: 600px) {
        .container {
            padding: 20px 2vw;
            gap: 16px;
        }
        .item-card {
            padding: 16px 10px 14px 10px;
        }
    }
</style>
</head>
<body>
    <h1>Walmart Inventory Dashboard</h1>
    <div class="container">
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="item-card">
                <h2><?= htmlspecialchars($row['name']) ?></h2>
                <p><strong>Category:</strong> <?= htmlspecialchars($row['category']) ?></p>
                <p><strong>Price:</strong> $<?= $row['price'] ?></p>
                <p><strong>Stock:</strong> <?= $row['stock_quantity'] ?></p>
                <p><strong>Supplier:</strong> <?= htmlspecialchars($row['supplier']) ?></p>
                <p><strong>Date Added:</strong> <?= $row['date_added'] ?></p>
                <?php if ($row['stock_quantity'] < 10): ?>
                    <p class="low-stock">⚠ Low Stock</p>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
