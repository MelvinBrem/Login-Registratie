<?php
//Use this template to build a new page

//Loading static_top.html

include('static/static_top.php');
include('php/dbConnect.php');

if(isset($_SESSION['user_id'])){} else{
  $_SESSION['message_error'] = "U moet ingelogd zijn om deze actie uit te voeren";
  header('Location: ../index.php');
}

?>

<!-- Page content -->

<div class="content-container">

  <div class="content">

    <h3>Organisatie overzicht</h3>

    <!--<div class="categorie">

      <h4 class="categorietitel">Uw organisaties</h4>

      <?php
        //De organisaties ophalen waarvan deze user de eigenaar is

        /*$query = "SELECT * FROM organisaties WHERE Eigenaar='" . $user_id . "';";
        $result = mysqli_query($dbconnect, $query);
        $resultcheck = mysqli_num_rows($result);

        if($resultcheck > 0){

          while ($row = mysqli_fetch_assoc($result)) {

            ?>

            <a class="organisatie" href="#">

              <div class="orgnaam"><?php echo $row['Naam']; ?></div>

              <table class="org">

                <tr>
                  <td>KVK nummer</td>
                  <td><?php echo $row['KVK_nummer'] ?></td>
                </tr>

                <tr>
                  <td>BTW Nummer</td>
                  <td><?php echo $row['BTW_nummer'] ?></td>
                </tr>

                <tr>
                  <td>Locatie</td>
                  <td><?php echo $row['Locatie'] ?></td>
                </tr>

              </table>

            </a>

            <?php

          }

        } else {

          echo "U bent geen eigenaar van een organisatie";

        }

        */?>

    </div>-->

    <div class="categorie">

      <div class="ca">

        <h4 class="categorietitel">werkzaam bij</h4>

        <?php

          //Gebruiker data ophalen
          $query_geb = "SELECT * FROM gebruikers WHERE Geb_ID =  " . $_SESSION['user_id'] . ";";
          $result_geb = mysqli_query($dbconnect, $query_geb) or die(mysqli_error($dbconnect));
          $data_geb = $result_geb->fetch_assoc();

          //Afdeling data ophalen
          $query_afd = "SELECT * FROM Afdelingen WHERE Afd_ID =  " . $data_geb['Geb_Afd'] . ";";
          $result_afd = mysqli_query($dbconnect, $query_afd) or die(mysqli_error($dbconnect));
          $data_afd = $result_afd->fetch_assoc();

          //Organisatie data ophalen
          $query_org = "SELECT * FROM organisaties WHERE Org_KVK =  " . $data_afd['Afd_Org'] . ";";
          $result_org = mysqli_query($dbconnect, $query_org) or die(mysqli_error($dbconnect));
          $data_org = $result_org->fetch_assoc();
        ?>

        <a class="organisatie" href="#">

          <div class="orgnaam"><?php echo($data_org['Org_Naam']); ?></div>

          <table class="org">

            <tr>
              <td>KVK</td>
              <td><?php echo $data_org['Org_KVK'] ?></td>
            </tr>

            <tr>
              <td>Straat</td>
              <td><?php echo $data_org['Org_Straat'] ?></td>
            </tr>

            <tr>
              <td>Huisnr.</td>
              <td><?php echo $data_org['Org_Huisnr'] ?></td>
            </tr>

            <tr>
              <td>Postcode</td>
              <td><?php echo $data_org['Org_Postcode'] ?></td>
            </tr>

            <tr>
              <td>Plaats</td>
              <td><?php echo $data_org['Org_Plaats'] ?></td>
            </tr>

            <tr>
              <td>Website</td>
              <td><a href="<?php echo $data_org['Org_Website'] ?>"><?php echo $data_org['Org_Website'] ?></a></td>
            </tr>

          </table>

        </a>

    </div>

  </div>

  <a class="button" href="/pag_org_registratie.php" style="width: max-content; margin-top: 20px;">Registreer een organisatie</a>


</div>

<?php
//Loading static_bottom.php
include('static/static_bottom.php');
?>
