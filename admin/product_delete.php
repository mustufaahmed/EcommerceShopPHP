<?php 
    // Include database file
    include '../config/dbconn.php';
    // get database class instance
    $instance = DatabaseConnection::getDbInstance();
    // get database connection
    $conn = $instance->getDbConnection();
    // Update delete flag with selected id
    $query = $conn->prepare("UPDATE products SET del_flg = 1 WHERE id = ?");
    $query->execute([$_GET['pid']]);
    // redirect to product page
    header("Location: ./products.php");