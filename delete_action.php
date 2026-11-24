<?php
include 'config.php';

if (!isset($_POST['id'])) {
    echo "error";
    exit;
}

$id = intval($_POST['id']);

// Get image URL
$res = $conn->query("SELECT image_url FROM paintings WHERE id = $id");
if ($res->num_rows == 0) {
    echo "error";
    exit;
}

$row = $res->fetch_assoc();
$image = $row['image_url'];

// Build absolute file path
$fullPath = $_SERVER['DOCUMENT_ROOT'] . "/" . $image;

// Delete image file
if (file_exists($fullPath)) {
    unlink($fullPath);
}

// Delete DB row
$conn->query("DELETE FROM paintings WHERE id = $id");

// Reorder IDs automatically (auto numbering)
$conn->query("SET @num = 0");
$conn->query("UPDATE paintings SET id = (@num := @num + 1) ORDER BY id");
$conn->query("ALTER TABLE paintings AUTO_INCREMENT = 1");

echo "success";
?>
