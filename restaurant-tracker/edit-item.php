<?php
include 'db.php';

if (!isset($_GET['id'])) {
    die("Item ID missing.");
}

$id = $_GET['id'];
$sql = "SELECT * FROM menu_items WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$item = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];

    $update = "UPDATE menu_items SET name = ?, category = ?, price = ? WHERE id = ?";
    $stmt = $conn->prepare($update);
    $stmt->bind_param("ssdi", $name, $category, $price, $id);

    if ($stmt->execute()) {
        header("Location: menu.php");
        exit();
    } else {
        echo "❌ Error updating item: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Item</title>
</head>
<body>
  <h1>✏️ Edit Menu Item</h1>
  <form method="POST">
    <label>Item Name:</label><br>
    <input type="text" name="name" value="<?= $item['name'] ?>" required><br><br>

    <label>Category:</label><br>
    <input type="text" name="category" value="<?= $item['category'] ?>"><br><br>

    <label>Price ($):</label><br>
    <input type="number" step="0.01" name="price" value="<?= $item['price'] ?>" required><br><br>

    <button type="submit">💾 Save Changes</button>
  </form>
  <br>
  <a href="menu.php">⬅️ Back to Menu</a>
</body>
</html>
