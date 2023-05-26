<?php
    require 'connect_bdd.php';

    // Perform SELECT query
    $query = "SELECT * FROM artiste";
    $result = $connection->query($query);

    // Check if the query was successful
    if ($result) {
        // Fetch data and process it
        while ($row = $result->fetch_assoc()) {
            // Access individual columns using the column name
            $id = $row['id'];
            $type = $row['type'];
            $style = $row['style'];
            $special = $row['special'];
            $name = $row['name'];

            $artistes["$id"]['id'] = $id;
            $artistes["$id"]['style'] = $style; 
            $artistes["$id"]['special'] = $special; 
            $artistes["$id"]['name'] = $name; 

            $artistesJSON = json_encode($artistes);
        }
        // Free the result set
        $result->free();
    } else {    }

    // Close the connection
    $connection->close();       
?>