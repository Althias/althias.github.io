<!DOCTYPE html>
<html lang="fr">
  <head>
  <?php include './assets/html/head.html';?>
  
  <body class="pac-man">       
    <?php include './assets/html/header.html';?>

    <?php include './assets/php/get_artiste_prog.php';?>     

    <!-- Section Programmation -->
    <main>
      <section class="container-programmation">
        <div>
          <!--
          <h2 class="text-center">Programmation</h2>
          <p class="text-center">Découvrez les artistes qui se produiront lors de notre festival</p>
          -->
        </div>
        <div class="container-cards">
          <?php
            foreach ($artistes as $key => $value) {
              $id = $artistes[$key]['id'];
              $name = $artistes[$key]['name'];
              echo "<div>";
              echo "<a href='/artiste.php?$id'>";
              echo "<div class='card card-container' id='$id'>";
              echo "<div class='card-img img-$id img-prog'></div>";
              echo "<div class='card-title'>";
              echo str_replace("&EACUTE;", "&Eacute;",mb_strtoupper($name, 'HTML-ENTITIES'));
              echo "</div>";
              echo "</div>";
              echo "</a>";
              echo "</div>";
            }
          ?>
        </div>
        <div class="select-container" id="select-container">
          <div class="select-img-border">
            <div class="select-icon" id="select-icon">N/A</div>
            <div class="select-img select-img-default" id="select-img"></div>
            <div class="select-img-title" id="select-img-title"></div>
          </div>
          <div class="select-details">
            <p class="special" id="special">COUP SPECIAL : -</p>
            <p class="separator"></p>
            <p class="level">STYLE</p>
            <p class="difficulty" id="difficulty">-</p>
            <div class="score">
              <p>HIGH SCORE <span id="high_score">0000000000</span></p>
              <p>TOTAL HIGH SCORE <span id="total_high_score">0000000000</span></p>
            </div>
            <p class="insert-coin">INSERT COIN</p>
          </div>
        </div>
      </section>
    </main>

    <?php include './assets/html/footer.html';?>
  </body>


  <script>
      let elements = document.querySelectorAll('.card-container');
      
      let programmationContainer = document.querySelector('.container-programmation');
      
      let selectContainer = document.querySelector('#select-container');             
      let selectSpecial = selectContainer.querySelector('#special');      
      let selectIcon = selectContainer.querySelector('#select-icon');
      let selectDifficulty = selectContainer.querySelector('#difficulty');
      let selectTitle = selectContainer.querySelector('#select-img-title');
      let selectImg = selectContainer.querySelector('#select-img');
      let selectScore = selectContainer.querySelector('#high_score');
      let selectTotalScore = selectContainer.querySelector('#total_high_score');


      var artistesJSON = '<?php echo $artistesJSON; ?>';
      var artistes = new Map(Object.entries(JSON.parse(artistesJSON)));

      elements.forEach((element) => {
        element.addEventListener('mouseenter', function() {

          var artiste_id = element.id;
          
          let img = "img-" + artiste_id;
          let title = element.querySelector('.card-title').innerHTML;
          selectContainer.classList.add('selected')
          

          if (artistes.has(artiste_id)){          
            var artiste = artistes.get(artiste_id);
            selectDifficulty.innerHTML = artiste.style;
            selectSpecial.innerHTML =  "COUP SPECIAL : " + artiste.special;
          } else {
            selectDifficulty.innerHTML = "-";
            selectSpecial.innerHTML =  "COUP SPECIAL : -";
          }

          selectTitle.innerHTML = title;
          selectIcon.innerHTML = "HMN";
          selectImg.className = "";
          selectImg.classList.add("select-img");
          selectImg.classList.add(img);
          selectImg.classList.add("img-select");
        
          var score = Math.floor(Math .random() * (9999 + 1));
          selectScore.innerHTML = "0".repeat(10 - score.toString().length) + score;

          var Totalscore = Math.floor(Math .random() * (9999999 - score + 1)) + score;
          selectTotalScore.innerHTML ="0".repeat(10 - Totalscore.toString().length) + Totalscore;
        });          
      });

      programmationContainer.addEventListener('mouseleave', function() {
          selectContainer.classList.remove('selected')
          selectIcon.innerHTML = "N/A" ;
          selectDifficulty.innerHTML = "-";
          selectTitle.innerHTML = "";

          selectImg.className = "";
          selectImg.classList.add("select-img");
          selectImg.classList.add("select-img-default");
        
          selectScore.innerHTML = "0000000000";
          selectTotalScore.innerHTML ="0000000000";
      });
  </script>
</html>
