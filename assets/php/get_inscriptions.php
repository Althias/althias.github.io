<?php
    require 'connect_bdd.php';

    // Perform SELECT query
    $query = "SELECT * FROM inscription_2023";
    $result = $connection->query($query);

    // Check if the query was successful
    echo 'prenom,nom,pseudo,email,billet,conso,repasSS,repasDM,repasDS,repasLM,total_cost';
    
    if ($result) {
        // Fetch data and process it
        while ($row = $result->fetch_assoc()) {
            // Access individual columns using the column name
            $nom = $row['nom'];
            $prenom = $row['prenom'];
            $pseudo = $row['pseudo'];
            $email = $row['email'];
            $billet = $row['billet'];
            $conso = $row['conso'];
            $repasSS = $row['repas1'];
            $repasDM = $row['repas2'];
            $repasDS = $row['repas3'];
            $repasLM = $row['repas4'];
            $total_cost = $row['total_cost'];

            // Do something with the retrieved data
            echo "<br>$prenom,$nom,$pseudo,$email,$billet,$conso,$repasSS,$repasDM,$repasDS,$repasLM,$total_cost";
        }

        // Free the result set
        $result->free();
    } else {
        echo 'Error executing SELECT query: ' . $connection->error;
    }

    // Close the connection
    $connection->close();
?>