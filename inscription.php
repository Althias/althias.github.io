<!DOCTYPE html>
<html lang="fr">
  <?php include './assets/html/head.html';?>


  <body class="pac-man">    
    <?php include './assets/html/header.html';?>
      
    <main>
      <!-- Inscriptions -->
      <section>
        <div class="container-inscription">
          <form method="post" action="" id="form-inscription">
            <div class="grid-2">
              <div class="form-control">
                <label for="prenom">Prenom</label>
                <input type="text" id="prenom" name="prenom" required>
              </div>
              <div class="form-control">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" required>
              </div>
            </div>
            <div class="form-control">
              <label for="pseudo">pseudo</label>
              <input type="text" id="pseudo" name="pseudo">
            </div>
            <div class="form-control">
              <label for="email">Email</label>
              <input type="email" id="email" name="email" required>
            </div>
            <div class="form-control">
              <label for="billet">Billet</label>
              <div class="container-box grid-3">
                <label><input type="radio" name="billet" value="25" required><span> 25$</span></label>
                <label><input type="radio" name="billet" value="30" required><span> 30$</span></label>
                <label><input type="radio" name="billet" value="35" required><span> 35$</span></label>
              </div>
            </div>
            <div class="form-control">
              <label for="conso">Carte 10 conso</label>
              <input type="number" min="0" max="10" id="conso" name="conso" value="0"></input>
            </div>
            <div class="form-control">
              <label for="repas">Repas (100% vege)</label>
              <div class="container-box grid-2">
                <label><input type="checkbox" name="repasSS" value="4"><span>  Sam. soir</span></label>
                <label><input type="checkbox" name="repasDM" value="4"><span>  Dim. midi</span></label>
                <label><input type="checkbox" name="repasDS" value="4"><span>  Dim. soir</span></label>
                <label><input type="checkbox" name="repasLM" value="1"><span>  Lun. midi</span></label>
              </div>
            </div>
            
            <div class="form-submit grid-2">
              <div class="form-control submit-element">
                <label for="message">SCORE </label>
                <span style="padding-left: 1em;" name='total_cost' id="total_cost">0</span><span>$</span>
              </div>
              <div class="form-control">
                <button type="submit" class="btn btn-border neon-text neon-border">PLAY</button>
              </div>
            </div>
          </form>

          <div style="justify-content: center;" id="result"></div>
        </div>
      </section>
      <div id="confirmationModal" class="modal">
        <div class="modal-content">
          <h2>Inscription OK</h2>
          <button type="submit" class="close btn btn-border neon-text neon-border">fermer</button>
        </div>
      </div>
    </main>
    
    <?php include './assets/html/footer.html';?>
  </body>

  <!-- TOTAL COST -->
  <script>      
    function calculateTotal() {
      const radioButtons = document.getElementsByName('billet');
      let billet;
      radioButtons.forEach(function(button) {
        if (button.checked) {
          billet = parseInt(button.value);
        }
      });
      if (isNaN(billet)) {
        billet = 0;
      }

      let carteConso = parseInt(document.querySelector("#conso").value);
      if (isNaN(carteConso)) {
        carteConso = 0;
      }
      
      let repasField = document.querySelector('input[name="repasSS"]');
      let repasSS = (repasField.checked) ? parseInt(repasField.value) : 0;
      
      repasField = document.querySelector('input[name="repasDM"]');
      let repasDM = (repasField.checked) ? parseInt(repasField.value) : 0;
      
      repasField = document.querySelector('input[name="repasDS"]');
      let repasDS = (repasField.checked) ? parseInt(repasField.value) : 0;
      
      let totalCost = billet + (carteConso * 10) + repasSS + repasDM + repasDS;
      
      document.querySelector("#total_cost").innerHTML = totalCost;     
    }  
    window.onload = calculateTotal;
    document.querySelector("form").addEventListener("change", calculateTotal);
  </script>

  <!-- FORM -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var form = document.getElementById('form-inscription');
      form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent form submission
        var totalCost = document.getElementById("total_cost").innerText;
        console.error('total cost ' + totalCost);

        // Get form data
        var formData = new FormData(form);
        formData.append('total_cost', totalCost);
        
        // Send AJAX request
        fetch('./assets/php/add_inscription.php', {
          method: 'POST',
          body: formData
        })
          .then(function(response) {
            return response.text();
          })
          .then(function(responseText) {
            // Handle the response from the PHP script
            var resultElement = document.getElementById('result');
            form.reset();
            resultElement.innerHTML = "INSCRIPTION OK - " + totalCost;
            
            // Show the modal        
            var modal = document.getElementById("confirmationModal");
            modal.style.display = "block";
            modal.style.opacity = "1";
          })
          .catch(function(error) {
            console.error('Error:', error);
          });
      });
    });
  </script>

  <script>
    // Get the modal element
    var modal = document.getElementById("confirmationModal");

    // Get the <span> element that closes the modal
    var closeBtn = document.getElementsByClassName("close")[0];


    // Close the modal when the user clicks on the close button or outside the modal
    closeBtn.onclick = function() {
      modal.style.display = "none";
      modal.style.opacity = "0";
    };

    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      modal.style.opacity = "0";
      }
    };
  </script>
</html>

