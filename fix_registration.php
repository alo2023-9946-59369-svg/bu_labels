<?php
require_once 'includes/config.php';
$conn = getDBConnection();

echo "Fixing user registration...<br>";

// Turn off foreign key checks
$conn->query("SET FOREIGN_KEY_CHECKS = 0");

// Add auto_increment back
$sql = "ALTER TABLE users MODIFY id INT AUTO_INCREMENT";
if ($conn->query($sql)) {
    echo "✓ Fixed users table<br>";
} else {
    echo "✗ Error: " . $conn->error . "<br>";
}

// Turn foreign key checks back on
$conn->query("SET FOREIGN_KEY_CHECKS = 1");

echo "Done! Registration should work now.<br>";
?>