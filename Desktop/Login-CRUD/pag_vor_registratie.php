<?php

include('static/static_top.php');

if(isset($_SESSION['user_id'])){} else{
  $_SESSION['message_error'] = "U moet ingelogd zijn om deze actie uit te voeren";
  header('Location: ../index.php');
}

?>

<div class="content-container">

  <div class="content">

    <h3>Registreer een vordering</h3>

    <form class="form" action="php/registreer_vor.php" method="post">

      <div class="categorie">

        <h4 class="categorietitel">Organisatie informatie</h4>

        <div class="inputveld">

          <div class="label">KVK nummer:</div>
          <input type="number" name="kvknummer" value="" required>

        </div>

        <div class="inputveld">

          <div class="label">Organisatie naam:</div>
          <input type="text" name="naam" value="" required>

        </div>

        <div class="inputveld">

          <div class="label">Website:</div>
          <input type="text" name="website" value="" required>

        </div>

        <div class="inputveld">

          <div class="label">Algemene email:</div>
          <input type="email" name="algemail" value="" required>

        </div>

      </div>

      <div class="categorie">

        <h4 class="categorietitel">Organisatie Locatie</h4>

        <div class="inputveld">

          <div class="label">Plaats:</div>
          <input type="text" name="plaats" value="" required>

        </div>

        <div class="inputveld">

          <div class="label">Straat:</div>
          <input type="text" name="straat" value="" required>

        </div>

        <div class="inputveld">

          <div class="label">Huisnummer:</div>
          <input type="number" name="huisnr" value="" required>

        </div>

        <div class="inputveld">

          <div class="label">Postcode:</div>
          <input type="text" name="postcode" value="" required>

        </div>

      </div>

      <input class="button" type="submit" name="" value="Registreren">

    </form>

  </div>

</div>

<?php

include('static/static_bottom.php');

?>
