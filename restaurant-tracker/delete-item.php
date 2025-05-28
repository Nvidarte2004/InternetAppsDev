<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM menu_items WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: menu.php");
        exit();
    } else {
        echo "❌ Error: " . $stmt->error;
    }
} else {
    echo "Invalid request.";
}
?>
