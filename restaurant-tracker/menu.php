<?php
include 'db.php';

// Get all menu items
$sql = "SELECT * FROM menu_items";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Menu</title>
</head>
<body>
  <h1>Restaurant Menu</h1>
  <a href="report.php">📊 View Sales Report</a>
  <a href="add-item.php">➕ Add New Item</a>
  <table border="1" cellpadding="10" cellspacing="0">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Category</th>
    <th>Price</th>
    <th>Actions</th> <!-- NEW COLUMN -->
  </tr>

  <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?= $row['id'] ?></td>
      <td><?= $row['name'] ?></td>
      <td><?= $row['category'] ?></td>
      <td>$<?= $row['price'] ?></td>
      <td>
        <a href="edit-item.php?id=<?= $row['id'] ?>">✏️ Edit</a> |
        <a href="delete-item.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?');">🗑 Delete</a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>


  </table>
</body>
</html>
