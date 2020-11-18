<?php

include('static/static_top.php');
include('php/dbConnect.php');

$_SESSION['voornaam'] = $_POST['voornaam'];
$_SESSION['tussenvoegsel'] = $_POST['tussenvoegsel'];
$_SESSION['achternaam'] = $_POST['achternaam'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['telefoonnummerzakelijk'] = $_POST['telefoonnummerzakelijk'];
$_SESSION['telefoonnummermobiel'] = $_POST['telefoonnummermobiel'];
$_SESSION['werkzaam_bij'] = $_POST['werkzaam_bij'];
$_SESSION['rol'] = $_POST['rol'];

if(mysqli_connect_error()){

  die('Connectie error(' . mysqli_connect_errno() .  ')' . mysqli_connect_error());

} else {

  $check_kvk = mysqli_query($dbconnect, "SELECT * FROM organisaties WHERE Org_KVK=" . $_SESSION['werkzaam_bij'] . ";");

  if(mysqli_num_rows($check_kvk)==0){

    $_SESSION['message_error']  = "Geen organisatie gevonden met dit kvk nummer";
    unset($_SESSION['werkzaam_bij']);
    header('Location: ../pag_registratie.php');

  } else { ?>

  <div class="content-container">

    <div class="content">

      <form class="form" action="php/registreer.php" method="post">

        <div class="categorie">

          <div class="inputveld">

            <div class="label">Kies een afdeling:</div>
            <select name="afdeling" value="" size="1" required>
              <?php
              $query = "SELECT * FROM afdelingen WHERE Afd_Org='" . $_SESSION['werkzaam_bij'] . "';";
              $result = mysqli_query($dbconnect, $query) or die(mysqli_error());
              if (!$result) {
                printf("Error: %s\n", mysqli_error($dbconnect));
                exit();
              }

              while ($row = mysqli_fetch_assoc($result)) {

              ?>

              <option value="<?php echo $row['Afd_ID']; ?>"><?php echo $row['Afd_Naam']; ?></option>

              <?php
              }
              ?>

            </select>

          </div>

        </div>

        <input class="button" type="submit" name="" value="Registreren">

      </form>

    </div>

  </div>

  <?php

  }
}

include('static/static_bottom.php');

?>
