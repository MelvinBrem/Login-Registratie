<?php

if (!isset($_SESSION)) { session_start();}

include('dbConnect.php');
include('generatePassword.php');

$voornaam =       $_SESSION['voornaam'];
if($_SESSION['tussenvoegsel'] != ""){$tussenvoegsel = $_SESSION['tussenvoegsel'];} else {$tussenvoegsel = "NULL";};
$achternaam =     $_SESSION['achternaam'];
$email =          $_SESSION['email'];
$telzakelijk =    $_SESSION['telefoonnummerzakelijk'];
$telmobiel =      $_SESSION['telefoonnummermobiel'];
$rol =            $_SESSION['rol'];

$afdeling = $_POST['afdeling'];

$wachtwoord = genWachtwoord(8);

$query = "INSERT INTO gebruikers (Geb_ID, Geb_Afd, Geb_Email, Geb_Wachtwoord, Geb_Achternaam, Geb_Voornaam, Geb_Tussenvoegsel, Geb_TelZakelijk, Geb_TelMobiel, Geb_Rol) VALUES (NULL, '" . $afdeling . "', '" . $email . "', '" . $wachtwoord . "', '" . $achternaam . "', '" . $voornaam . "', '" . $tussenvoegsel . "', '" . $telzakelijk . "', $telmobiel , $rol);";
echo("<script>console.log('" . $query . "');</script>");
mysqli_query($dbconnect, $query);

mail($email, 'Wachtwoord Systeemarbitrage', 'Uw wachtwoord voor uw Systeemarbitrage account is: ' . $wachtwoord, "From: Systeemarbitrage <melvinbrem2020@gmail.com>");

$_SESSION['message_succes'] = "Succesvol geregistreerd";

unset($_SESSION['voornaam'],$_SESSION['tussenvoegsel'],$_SESSION['achternaam'],$_SESSION['email'],$_SESSION['telefoonnummermobiel'],$_SESSION['telefoonnummerzakelijk'],$_SESSION['afdeling'],$_SESSION['werkzaam_bij'],$_SESSION['rol']);

header('Location: ../index.php');

?>
