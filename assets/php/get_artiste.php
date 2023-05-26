<?php
    require 'connect_bdd.php';

    $id = $_SERVER['QUERY_STRING'];

    // Manage empty param
    if(empty($id)){
        header("Location: http://www.alambik-festival.fr/artistes.php");
        exit();
    }

    // Perform SELECT query
    $query = "SELECT * FROM artiste WHERE id='$id'";
    $result = $connection->query($query);

    // Check if the query was successful
    if ($result) {
        // Fetch data and process it
        while ($row = $result->fetch_assoc()) {
            // Access individual columns using the column name
            $name = $row['name'];
            $description = $row['description'];
            $special = $row['special'];
            $style = $row['style'];
            $instagram = $row['instagram'];
            $spotify = $row['spotify'];
            $soundcloud = $row['soundcloud'];
            $youtube = $row['youtube'];
            $facebook = $row['facebook'];
        }
        // Free the result set
        $result->free();
    } 

    // Close the connection
    $connection->close();       
    
    // redirect if no information fetch
    if(empty($name)){    
        header("Location: http://www.alambik-festival.fr/artistes.php");
        exit();
    }
?>