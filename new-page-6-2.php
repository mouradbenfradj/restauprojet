<?php session_start(); if(empty($_SESSION['poste'])){$_SESSION['poste']='';}
include_once("class/connexion.class.php");
include_once("class/galerie.class.php");
$base=new Connexion();
$galerie=new Galerie($base->getBdd());
if(isset($_POST['sup'])){
	$galerie->setId($_POST['sup']);
	$galerie->setPhoto($_POST['supf']);
	$galerie->supGalerie();
}


?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head><!-- Created by Artisteer v4.2.0.60559 -->
    <meta charset="utf-8">
    <title>Galerie</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="style.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="style.responsive.css" media="all">


    <script src="jquery.js"></script>
    <script src="script.js"></script>
    <script src="script.responsive.js"></script>



<style>.art-content .art-postcontent-0 .layout-item-0 { padding-right: 10px;padding-left: 10px;  }
.ie7 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
.ie6 .art-post .art-layout-cell {border:none !important; padding:0 !important; }

</style></head>
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
                                <h2 class="art-postheader">Galerie</h2>
                                                
                <div class="art-postcontent art-postcontent-0 clearfix"><div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-0" style="width: 100%" >
        <p><span style="font-weight: bold;">Ajoutez<?php if(isset($_POST['ajouter'])){
	$galerie->addPhoto();
}
 ?> <form enctype="multipart/form-data" action="" method="post">
 <input type="file" name="photoa">
 <input type="submit"name="ajouter" value="ajouter">
 </form>
</span></p>
    </div>
    </div>
</div>
    <?php
	if(isset($_POSET['modifier'])){
		$galerie->setId($_POST['id']);
		$galerie->setPhoto($_POST['photo']);
		$galerie->modPhoto();
	}
	
	  foreach($galerie->get_galerie() as $valeur){  
	?>
<div class="art-content-layout">
    <div class="art-content-layout-row">
    <div class="art-layout-cell layout-item-0" style="width: 50%" >
        <p style="text-align: center;"><img alt="" src="images/<?php echo $valeur['photo']; ?>" width="280" height="187"><table class="art-article" style="width: 100%; "><tbody><tr><td style="width: 50%; "><form action="" method="post"><input type="hidden" name="mod" value="<?php echo $valeur['id']; ?>"><input type="hidden" name="modf" value="<?php echo $valeur['photo']; ?>"><input type="submit" name="modifier" value="Modifier"></form></td><td style="width: 50%; "><form action="" method="post"><input type="hidden" name="sup" value="<?php echo $valeur['id']; ?>"><input type="hidden" name="supf" value="<?php echo $valeur['photo']; ?>"><input type="submit" value="Supprimer"></form></td></tr></tbody></table></p>

    </div>
 
    </div>
</div>
<?php } ?>
</div>

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