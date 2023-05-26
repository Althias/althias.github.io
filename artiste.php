<!DOCTYPE html>
<html lang="fr">
  <?php include './assets/html/head.html';?>

  <body>      
    <?php include './assets/php/get_artiste.php';?>

    <?php include './assets/html/header_artiste.html';?>

    <main>

      <!-- Section  -->
      <section>
        <div class="prog-container">
          <p>
            <h2 class="text-center"><?php echo $name;?></h2>  
          </p>
          <div class="separator"></div>
          <p class="text-center"><?php echo $style;?></p>     
          <br>  
          <p><?php echo $description;?></p>  
          <br>
          <ul class="text-center" style="display: flex;align-items: center;justify-content: center;gap:2em">
            <?php 
              if(!empty($instagram)){
                echo "<li><a class='icon icon-instagram' target='_blank' href='$instagram'></a></li>";
              }
              if(!empty($spotify)){
                echo "<li><a class='icon icon-spotify' target='_blank' href='$spotify'></a></li>";
              }
              if(!empty($youtube)){
                echo "<li><a class='icon icon-youtube' target='_blank' href='$youtube'></a></li>";
              }
              if(!empty($facebook)){
                echo "<li><a class='icon icon-facebook' target='_blank' href='$facebook'></a></li>";
              }
              if(!empty($soundcloud)){
                echo "<li><a class='icon icon-soundcloud' target='_blank' href='$soundcloud'></a></li>";
              }
            ?>
          </ul>
          <br>
        </div>
      </section>
      <section class="img img-<?php echo $id;?> img-artiste"></section>
    </main>

    <?php include './assets/html/footer.html';?>

  </body>s
</html>
