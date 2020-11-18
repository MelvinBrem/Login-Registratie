<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/style.css">

    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;700&display=swap" rel="stylesheet">

    <title>Systeem arbitrage</title>

  </head>

  <body>

    <?php

    if (!isset($_SESSION)) { session_start();}

    if(isset($_SESSION['signed_in'])){}else{
      $_SESSION['signed_in'] = False;
    }

    ?>

    <div class="background"></div>

    <div class="container"></div>

    <header class="header">

      <a href="index.php" class="titel">Systeemarbitrage</a>

      <?php

      //when not logged in

      if($_SESSION['signed_in']==False){

      ?>

      <a class="headerbutton" id="login" href="/pag_login.php">
        Inloggen
      </a>

      <a class="headerbutton" id="registreren" href="/pag_registratie.php">
        Registreren
      </a>

      <?php

      //when logged in

      } else if($_SESSION['signed_in']==True){

      ?>

      <div class="user">

        <?php

        echo($_SESSION['user_name']);

        ?>

      </div>

      <a class="headerbutton" id="logout" href="php/logout.php">
        Uitloggen
      </a>

      <a class="headerbutton" id="logout" href="pag_organisaties.php">
        Mijn organisaties
      </a>

      <a class="headerbutton" id="logout" href="pag_vorderingen.php">
        Mijn vorderingen
      </a>

      <?php

      }

      ?>

    </header>

    <?php
    if(isset($_SESSION['message_error'])){
    ?>
    <div class="error">

      <?php
        echo($_SESSION['message_error']);
        unset($_SESSION['message_error']);
      ?>
    </div>
    <?php
    }
    ?>

    <?php
    if(isset($_SESSION['message_succes'])){
    ?>
    <div class="succes">

      <?php
        echo($_SESSION['message_succes']);
        unset($_SESSION['message_succes']);
      ?>
    </div>
    <?php
    }
    ?>

    <!--/-->
