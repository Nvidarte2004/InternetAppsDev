<?php
include 'db.php';

// Total Revenue
$sqlRevenue = "SELECT SUM(mi.price * oi.quantity) AS total_revenue
               FROM order_items oi
               JOIN menu_items mi ON oi.item_id = mi.id";
$revenueResult = $conn->query($sqlRevenue);
$totalRevenue = $revenueResult->fetch_assoc()['total_revenue'] ?? 0;

// Number of Orders
$sqlOrders = "SELECT COUNT(*) AS total_orders FROM orders";
$ordersResult = $conn->query($sqlOrders);
$totalOrders = $ordersResult->fetch_assoc()['total_orders'] ?? 0;

// Top Selling Items
$sqlTop = "SELECT mi.name, SUM(oi.quantity) AS total_sold
           FROM order_items oi
           JOIN menu_items mi ON oi.item_id = mi.id
           GROUP BY oi.item_id
           ORDER BY total_sold DESC
           LIMIT 5";
$topItems = $conn->query($sqlTop);
?>

<!DOCTYPE html>
<html>
<head>
  <title>📊 Sales Report</title>
</head>
<body>
  <h1>📊 Restaurant Sales Report</h1>

  <p><strong>Total Revenue:</strong> $<?= number_format($totalRevenue, 2) ?></p>
  <p><strong>Total Orders:</strong> <?= $totalOrders ?></p>

  <h2>🔥 Top Selling Items</h2>
  <table border="1" cellpadding="10">
    <tr>
      <th>Item</th>
      <th>Quantity Sold</th>
    </tr>
    <?php while ($row = $topItems->fetch_assoc()): ?>
      <tr>
        <td><?= $row['name'] ?></td>
        <td><?= $row['total_sold'] ?></td>
      </tr>
    <?php endwhile; ?>
  </table>

  <br>
  <a href="menu.php">⬅️ Back to Menu</a>
</body>
</html>
