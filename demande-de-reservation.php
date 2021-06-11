<?php session_start(); if(empty($_SESSION['poste'])){$_SESSION['poste']='';}
include_once("class/connexion.class.php");
include_once("class/Reservation.class.php");
$base=new Connexion();
$evennement=new Reservation($base->getBdd());

?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head><!-- Created by Artisteer v4.2.0.60559 -->
    <meta charset="utf-8">
    <title>Demande de reservation</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="style.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="style.responsive.css" media="all">


    <script src="jquery.js"></script>
    <script src="script.js"></script>
    <script src="script.responsive.js"></script>



</head>
<body>
<div id="art-main">
<header class="art-header">

    <div class="art-shapes">
        
            </div>

<h1 class="art-headline">
    <a href="#">Resto-TN</a>
</h1>
<h2 class="art-slogan">Votre satisfaction est notre priorité</h2>





                
                    
</header>
<div class="art-sheet clearfix">
            <div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-sidebar1"><?php include_once('menu.php'); ?><div class="art-block clearfix">
        <?php include_once('menug.php'); ?>
</div></div>
                        <div class="art-layout-cell art-content"><article class="art-post art-article">
                                <h2 class="art-postheader">Demande de reservation</h2>
                                                
                <div class="art-postcontent art-postcontent-0 clearfix"><table class="art-article" style="width: 100%; "><tbody>    <tr><td style="width: 20%; ">Client</td><td style="width: 20%; ">Date de reservation</td><td style="width: 20%; ">&nbsp;Nombre de place a reservé</td><td style="width: 20%; "><table class="art-article"><tbody><tr><td style="width: 125px; ">Menu demandé</td></tr><tr></tr></tbody></table><br></td><td style="width: 20%; ">Payement</td></tr>
                <?php $tab=$evennement->get_reservation(); foreach($tab as $valeur){ ?><tr><td style="width: 20%; "><?php echo $valeur['numabonnee']; ?></td><td style="width: 20%; "><?php echo $valeur['datearr']; ?><br>nombre d'heur a reservez = <?php echo $valeur['nbrheur']; ?></td><td style="width: 20%; "><?php echo $valeur['nbrplace']; ?></td><td style="width: 20%; "><?php echo $valeur['menu']; ?></td><td style="width: 20%; "><?php echo $valeur['facture']; ?></td></tr> <?php } ?></tbody></table></div>


</article></div>
                    </div>
                </div>
            </div>
    </div>
<footer class="art-footer">
  <div class="art-footer-inner">
<div style="position:relative;display:inline-block;padding-left:42px;padding-right:42px"><p>Et commodo sem lacus felis sed phasellus cras sit sit.</p></div>
    <p class="art-page-footer">
        <span id="art-footnote-links"><a href="http://www.artisteer.com/" target="_blank">Web Template</a> created with Artisteer.</span>
    </p>
  </div>
</footer>

</div>


</body></html>