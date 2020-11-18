<?php

include('static/static_top.php');

?>

<div class="content-container">

  <div class="content">

    <h3>Login</h3>

    <form class="form" action="php/login.php" method="post">

      <div class="inputveld">

        <div class="label">Email-adres:</div>
        <input type="text" name="email" value="" required>

      </div>

      <div class="inputveld">

        <div class="label">Wachtwoord:</div>
        <input type="password" name="wachtwoord" value="" required>

      </div>

      <input class="button" type="submit" name="" value="Inloggen">

    </form>

    <a class="button" href="/pag_registratie.php" style="width: max-content; margin-top: 20px;">Bent u nog niet geregistreerd?</a>

  </div>

</div>

<?php

include('static/static_bottom.php');

?>
