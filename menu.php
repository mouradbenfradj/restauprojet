<div class="art-vmenublock clearfix">
  <div class="art-vmenublockcontent">
    <ul class="art-vmenu">

      <?php if($_SESSION['poste']!='admin'){ 
	  if($_SESSION['poste']!='client'){?>
      <li><a href="administration22.php" class="active">Connexion</a></li>
      <?php }else{ ?>
      <li><a href="deconnexion.php" >Deconnexion</a></li>
	<?php } ?>
      <li><a href="accueil.php">Accueil</a></li>
      <li><a href="new-page-2.php">Menu</a>
        <ul>
          <li><a href="new-page-2/new-page-4.php">Plat et dessert du jour</a></li>
        </ul>
      </li>
      <li><a href="reservation.php">Reservation</a></li>
      <li><a href="new-page-2-2.php">Evennement</a></li>
      <li><a href="new-page-6.php">Galerie</a></li>
      <li><a href="directions.php">Directions</a></li>
      <?php }else{ ?>
      <li><a href="deconnexion.php" >Deconnexion</a></li>

      <li><a href="administration.php" class="active">Administration</a></li>
      <li><a href="demande-de-reservation.php">Demande de reservation</a></li>
      <li><a href="new-page-2-3.php">Menu administration</a></li>
      <li><a href="new-page-6-2.php">Galerie administration</a></li>
      <li><a href="new-page-2-2-2.php">Evennement administration</a></li>
      <li><a href="directions-2.php">Directions administration</a></li>
      <?php } ?>
    </ul>
  </div>
</div>
