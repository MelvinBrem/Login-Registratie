<?php
if (!isset($_SESSION)) { session_start(); }

//including the connection to the db
include('dbConnect.php');

//setting the data gotten from the form
$email = $_POST['email'];
$wachtwoord = $_POST['wachtwoord'];

if(mysqli_connect_error()){

  die('Connectie error(' . mysqli_connect_errno() .  ')' . mysqli_connect_error());

} else {

  //creating and executing the select query to get the user with the corrosponding email and password
  $query = "SELECT * FROM gebruikers WHERE Geb_Email='" . $email . "' AND Geb_Wachtwoord='" . $wachtwoord . "'";
  $exec = mysqli_query($dbconnect, $query);
  $result = mysqli_fetch_array($exec);

  if(empty($result)){

    $_SESSION['message_error']  = "Geen account gevonden met deze login gegevens";
    $_SESSION['signed_in'] = False;

    header('Location: ../pag_login.php');

  } else {

    $name = $result['Voornaam'] + " " + $result['Achternaam'];

    $_SESSION['user_id'] = $result['Geb_ID'];
    $_SESSION['user_name'] = ucfirst($result['Geb_Voornaam']) . " " . ucfirst($result['Geb_Achternaam']);

    $_SESSION['message_succes']  = "Succesvol ingelogd";
    $_SESSION['signed_in'] = True;

    header('Location: ../index.php');

  }
}

?>
