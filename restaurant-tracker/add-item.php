<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];

    $sql = "INSERT INTO menu_items (name, category, price) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssd", $name, $category, $price); // s = string, d = double

    if ($stmt->execute()) {
        header("Location: menu.php");
        exit();
    } else {
        echo "❌ Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add New Menu Item</title>
</head>
<body>
  <h1>➕ Add a New Menu Item</h1>
  <form action="add-item.php" method="POST">
    <label>Item Name:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Category:</label><br>
    <input type="text" name="category"><br><br>

    <label>Price ($):</label><br>
    <input type="number" step="0.01" name="price" required><br><br>

    <button type="submit">Add Item</button>
  </form>
  <br>
  <a href="menu.php">⬅️ Back to Menu</a>
</body>
</html>
