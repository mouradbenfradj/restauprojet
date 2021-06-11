<?php session_start(); if(empty($_SESSION['poste'])){$_SESSION['poste']='';}
include_once("class/connexion.class.php");
include_once("class/administration.class.php");
include_once("class/menu.class.php");
$base=new Connexion();
$adm=new Administration($base->getBdd());
$menu=new Menu($base->getBdd());
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head><!-- Created by Artisteer v4.2.0.60559 -->
    <meta charset="utf-8">
    <title>Reservation</title>
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
        <?php include_once('menug.php');
		if(isset($_POST['temps']))
{
					include_once('class/connexion.class.php');
					$bdd=new Connexion();
					extract($_POST);
					include_once('class/Reservation.class.php');
					$abonn=new Reservation($bdd->getBdd());
					$abonn->addReservation();
}

		 ?>
</div></div>
                        <div class="art-layout-cell art-content"><article class="art-post art-article">
                                <h2 class="art-postheader">Reservation</h2>
                                                
                <div class="art-postcontent art-postcontent-0 clearfix">
                <?php 
				if((!isset($_POST['numero']))&&($_SESSION['poste']!='client'))
				{ 
				?>
	                <form action="" method="post"><table class="art-article" style="width: 100%; "><tbody><tr><td style="width: 50%; ">Numero de carte d'abonnement</td><td style="width: 50%; "><input type="number" required name="numero"></td></tr><tr><td style="width: 50%; ">Mot de passe</td><td style="width: 50%; "><input type="text" name="pass" required></td></tr><tr><td style="width: 50%; "><br></td><td style="width: 50%; "><input type="submit" value="se connecter"></td></tr></tbody></table></form>
				<?php 
				}
				else 
				{
					if($_SESSION['poste']!='client')
					{
					include_once('class/connexion.class.php');
					include_once('class/abonnee.class.php');
					$bdd=new Connexion();
					$abonn=new Abonnee($bdd->getBdd());
					$abonn->setNumero($_POST['numero']);
					$abonn->setPass($_POST['pass']);
					$abonn->identification();
					echo"rrrrrrrrrrr";
					}
					else
					{
					 ?><form action="" method="post" oninput="x.value=parseInt(nombreh.value)*<?php echo $adm->getCoutheur(); ?>">
                <table class="art-article" style="width: 100%; "wwidth="100%">
                	<tbody>
                    	<tr>
                        	<td><ul><li>Date et heur de votre reservation</li></ul></td>
                			<td>Nombre de place a reserver</td>
                            <td>Menu a preparer</td><td>Facturation</td>
                      	</tr>
                        <tr>
                        	<td>Vous arrivez a :
                            	<table class="art-article" style="width: 100%; ">
                                	<tbody>
                                    	<tr>
                                        	<td>date</td>
                                            <td><input type="date" required name="dates"></td>
                                       	</tr>
                                        <tr>
                                        	<td>temps</td>
                                            <td><input type="time" required name="temps"></td>
                                        </tr>
                                  	</tbody>
                              	</table>
                                <ul>
                                	<li>nombre d'heur a reserver
                                		<input type="number" name="nbhres" id="nombreh" value="0" required>
                                    	mettez 0 si indefinit
                                    </li>
                                    <li>Notez bien que chaque heur de table vous coutera <?php echo $adm->getCoutheur(); ?>dt</li>
                               	</ul>
                                <br><br>
                          	</td>
                            <td>
                                nombre de place disponible <?php echo $adm->getNbplace(); ?>
                            	<input type="number" name="nbplace" required>
                           	</td>
                            <td>
                            <input type="hidden" name="chh" id="chh"> 
                                	<select name="prepare" id="ch">
                                    <?php
                                    $menu->get_menu();
									foreach($tab as $valeur){ 
									?>
									<option value="<?php echo $valeur['titre'].",".$valeur['prix']; ?>"><?php echo $valeur['titre'].":".$valeur['prix']; ?></option>
									<?php } ?></select><br>
                                    nombre<input type="number" name="nbr" id="nb">
									<input type="button" id="choix" value="preparer">

                            <ul id="c">
                            
       	                       	<script>
       								$(document).ready(function(){
    
					    				var $ch = $('#ch');
					    				var $nb = $('#nb');
					    				var $chh = $('#chh');
					    				var $chh2 ="";
										var $choix=$('#choix');
										$choix.click(function(e){
    									e.preventDefault(); 
										prendre($ch,$nb);
										});
										
									function prendre(champ,champs){
										if(champs.val()==''){
										$nn=0;}else{$nn=champs.val();}
										if($chh2==''){
										$chh2=champ.val()+" : "+$nn;}else{$chh2=champ.val()+" : "+$nn+";"+$chh2;}
										
			    						$('#c').append("<li>"+champ.val()+" : "+$nn+"</li>");
										$('#chh').val($chh2);
										}
									});
   								</script>
								</ul>
                                    </td>
                                    <td><input type="hidden" value="<output name='x'></output>" name="facture">
                                    <output name="x"></output>
<input type="submit" name="confirmer" value="confirmer"></td></tr></tbody></table></form>
<?php } 
} 
?></div>


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