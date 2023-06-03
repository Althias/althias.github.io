<?php
   require '../../PHPMailer-master/src/PHPMailer.php';
   require '../../PHPMailer-master/src/SMTP.php';
   require '../../PHPMailer-master/src/Exception.php';

   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;

   try {
      echo "test";
      $mail = new PHPMailer(true);

      echo "test";
      $mail->isSMTP();
      $mail->isHTML(true);
      $mail->Host = 'ssl0.ovh.net';
      $mail->SMTPAuth = true;
      $mail->Username = 'contact@alambik-festival.fr';
      $mail->Password = 'contactjasima082026';
      $mail->SMTPSecure = 'tls';
      $mail->Port = 587;

      $mail->setFrom('contact@alambik-festival.fr', 'Alambik\' Festival');
      $mail->addAddress($email);
      $mail->Subject = 'Finalisation Inscription Alambik\' Festival';

// Construct the HTML email body
      $body ='   
         <html>
         <head> 
            <style>
               body {
                  color: #151515 !important;
               }
            </style>
         </head>
         <body>
            <p>Salut,</p>
            <p>Merci ' . $prenom . ' de t\'être inscrit.e.</p>
            <p>Voici les détails de ta place :</p>
            <ul>
               <li>Billet : ' . $billet .  '€</li>
               <li>Carte(s) conso : ' . $carte_conso . ' (' . $carte_conso*10 . '€)</li>
               <li>Repas : ' . $repas . ' (' . $prix_repas . '€)</li>
               <li><strong>Coût total : ' . $total_cost . '€</strong></li>
            </ul>
            <p><strong>Une dernière étape pour finaliser ton inscription : le paiement.</strong> Merci de nous le faire parvenir par un des moyens suivants (en précisant le nom/prenom/pseudo de l\'inscription pour la traçabilité):</p>
            <ul>
               <li><strong>IBAN (Hello Bank!) :</strong> FR76 3000 4031 6600 0021 9532 628 (à privilégier si possible)</li>
               <li><strong>Lydia :</strong> https://lydia-app.com/collect/15654-alambik-corbiere-2022/fr</li>
               <li><strong>Paypal :</strong> paypal.me/alambikfestival</li>
            </ul>
            <p>On a hâte de te retrouver !</p>
            <p>Si tu as des questions (ou que tu veux modifier ton inscription) n\'hésite pas à nous contacter.</p>
            <p>L\'équipe de Alambik\' Festival</p>
            <img src="https://www.alambik-festival.fr/assets/images/affiche_alambik.jpg" style="display:inline-block;max-width:400px;vertical-align:middle;width:auto" width="400">
         </body>
         </html>   
         ';
         
      $mail->Body = $body;

      if ($mail->send()) {
         echo 'Email sent successfully!';
      } else {
         echo 'Error sending email: ' . $mail->ErrorInfo;
      }
   } catch (Exception $e) {
      echo 'Error sending email: ' . $e->getMessage();
   }
?>


