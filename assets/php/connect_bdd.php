<?php
    $host = 'alambioadmin.mysql.db';
    $dbName = 'alambioadmin';
    $username = 'alambioadmin';
    $password = 'Jasima082026';
    $connection = new mysqli($host, $username, $password, $dbName);

    // Check connection
    if ($connection->connect_error) {
        die('Connection failed: ' . $connection->connect_error);
    }
       
    // Use the constants or variables to establish your database connection
    /*
    require_once('/config.php');
    $connection = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
    */
?>