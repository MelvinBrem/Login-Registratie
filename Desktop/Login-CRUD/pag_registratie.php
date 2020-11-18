<?php

include('static/static_top.php');

?>

<div class="content-container">

  <div class="content">

    <h3>Registreer uzelf bij Systeemarbitrage</h3>

    <a class="button" href="/pag_login.php" style="width: max-content; margin-bottom: 20px;">Bent u al geregistreerd?</a>

    <form class="form" action="/pag_registratie_2.php" method="post">

      <div class="categorie">

        <h4 class="categorietitel">Persoonlijke informatie</h4>

        <div class="inputveld">

          <div class="label">Voornaam:</div>
          <input type="text" name="voornaam" value="<?php if(isset($_SESSION['voornaam'])){ echo($_SESSION['voornaam']); }else{} ?>" required>

        </div>

        <div class="inputveld">

          <div class="label">Tussenvoegsel:</div>
          <input type="text" name="tussenvoegsel" value="<?php if(isset($_SESSION['tussenvoegsel'])){ echo($_SESSION['tussenvoegsel']); }else{} ?>">

        </div>

        <div class="inputveld">

          <div class="label">Achternaam:</div>
          <input type="text" name="achternaam" value="<?php if(isset($_SESSION['achternaam'])){ echo($_SESSION['achternaam']); }else{} ?>" required>

        </div>

        <div class="inputveld">

          <div class="label">Email-adres:</div>
          <input type="email" name="email" value="<?php if(isset($_SESSION['email'])){ echo($_SESSION['email']); }else{} ?>" required>

        </div>

        <div class="inputveld">

          <div class="label">Telefoonnummer ( Zakelijk ):</div>
          <input type="number" name="telefoonnummerzakelijk" value="<?php if(isset($_SESSION['telefoonnummerzakelijk'])){ echo($_SESSION['telefoonnummerzakelijk']); }else{} ?>" required>

        </div>

        <div class="inputveld">

          <div class="label">Telefoonnummer ( Mobiel ):</div>
          <input type="number" name="telefoonnummermobiel" value="<?php if(isset($_SESSION['telefoonnummermobiel'])){ echo($_SESSION['telefoonnummermobiel']); }else{} ?>" required>

        </div>

      </div>

      <div class="categorie">

        <div class="inputveld">

          <div class="label">Werkzaam bij ( KVK nummer ):</div>
          <input type="number" name="werkzaam_bij" value="<?php if(isset($_SESSION['werkzaam_bij'])){ echo($_SESSION['werkzaam_bij']); }else{} ?>">

        </div>

      </div>

      <div class="categorie">

        <div class="inputveld">

          <div class="label">Rol(tijdelijk)</div>
          <select name="rol" value="" size="1">
            <option value="0">Beheerder</option>
            <option value="1">Gedaagde</option>
            <option value="2">Advocaat</option>
          </select>

        </div>

      </div>

      <input class="button" type="submit" name="registreren" value="Registreren">

    </form>

  </div>

</div>

<?php

include('static/static_bottom.php');

?>
