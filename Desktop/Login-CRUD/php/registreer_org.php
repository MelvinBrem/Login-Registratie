<?php

if (!isset($_SESSION)) { session_start(); }

include('dbConnect.php');

$kvk_nummer = $_POST['kvknummer'];
$naam = $_POST['naam'];
$website = $_POST['website'];
$algemail = $_POST['algemail'];
$plaats = $_POST['plaats'];
$straat = $_POST['straat'];
$huisnr = $_POST['huisnr'];
$postcode = $_POST['postcode'];
$locatie = $_POST['locatie'];

if(mysqli_connect_error()){

  die('Connectie error(' . mysqli_connect_errno() .  ')' . mysqli_connect_error());

} else {

  $check_kvk = mysqli_query($dbconnect, "SELECT * FROM organisaties WHERE Org_KVK='" . $kvk_nummer . "';");

  if (!$check_kvk) {
    printf("Error: %s\n", mysqli_error($dbconnect));
    exit();
  }

  if(mysqli_num_rows($check_kvk)==0){

    $query = "INSERT Into organisaties (Org_Naam, Org_KVK, Org_Straat, Org_Huisnr, Org_Postcode, Org_Plaats, Org_Website, Org_AlgEmail) VALUES ('" . $naam . "', '" . $kvk_nummer . "', '" . $straat ."', '" . $huisnr ."', '" . $postcode ."', '" . $plaats ."', '" . $website ."', '" . $algemail ."');";
    mysqli_query($dbconnect, $query);
    $_SESSION['message_succes'] = "Succesvol geregistreerd";

    header('Location: ../pag_organisaties.php');

  } else {

    $_SESSION['message_error']  = "Er bestaat al een organisatie met dit KVK nummer";

    header('Location: ../pag_org_registratie.php');

  }
}


?>
