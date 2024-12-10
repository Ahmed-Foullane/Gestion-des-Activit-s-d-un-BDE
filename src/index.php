<?php
$host = 'db';  // Use 'db' as it's the service name in docker-compose.yml
$user = 'root';  // Use root credentials from docker-compose.yml
$password = 'root';

try {
    // Check if PDO MySQL driver is available
    if (!extension_loaded('pdo_mysql')) {
        throw new Exception("PDO MySQL driver is not installed");
    }
    
    $pdo = new PDO("mysql:host=$host", $user, $password);  // Removed dbname
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected to MySQL successfully!";
} catch (PDOException $e) {
    echo "PDO Exception: " . $e->getMessage();
} catch (Exception $e) {
    echo "General Exception: " . $e->getMessage();
}

// Verify extension is loaded
if (extension_loaded('pdo_mysql')) {
    echo "\nPDO MySQL driver is installed.";
} else {
    echo "\nPDO MySQL driver is NOT installed.";
}
?>