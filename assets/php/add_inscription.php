<?php  
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $billet  = $_POST['billet'];
    $carte_conso = $_POST['conso'];
    $repas1 = empty($_POST['repasSS'])?0:1;
    $repas2 = empty($_POST['repasDM'])?0:1;
    $repas3 = empty($_POST['repasDS'])?0:1;
    $repas4 = empty($_POST['repasLM'])?0:1;
    $total_cost = empty($_POST['total_cost'])?0:$_POST['total_cost'];
    $prix_repas = ($repas1 + $repas2 + $repas3)*4;
    
    // Calculate repas string
    $repas = '';
    if($repas1 == 1){
        $repas .= 'Samedi soir';
    }
    if($repas2 == 1){
        if(!empty($repas)){
            $repas .= ', ';
        }
        $repas .= 'Dimanche midi';
    }
    if($repas3 == 1){
        if(!empty($repas)){
            $repas .= ', ';
        }
        $repas .= 'Dimanche soir';
    }
    if($repas4 == 1){
        if(!empty($repas)){
            $repas .= ', ';
        }
        $repas .= 'Lundi midi';
    }
    

    require 'connect_bdd.php';

    // Perform SELECT query
    $query = "INSERT INTO inscription_2023 (nom, prenom, pseudo, email, billet, conso, repas1, repas2, repas3, repas4, total_cost) VALUES ('$nom', '$prenom', '$pseudo', '$email', $billet, $carte_conso, $repas1, $repas2, $repas3, $repas4, $total_cost)";
    $result = $connection->query($query);
    
    if ($result) {
    } else {
        echo 'Error executing SELECT query: ' . $connection->error;
    }

    // Close the connection
    $connection->close();

    include 'send_email.php';
?>