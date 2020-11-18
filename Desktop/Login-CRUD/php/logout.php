<?php
session_start();
session_unset();
session_destroy();

session_start();

$_SESSION['signed_in'] = False;
$_SESSION['message_succes'] = "Succesvol uitgelogd";

header('Location: ../index.php');
?>
