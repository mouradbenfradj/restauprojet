<?php session_start(); if(empty($_SESSION['poste'])){$_SESSION['poste']='';}
include_once("class/connexion.class.php");
include_once("class/evennement.class.php");
$base=new Connexion();
$evennement=new Evennement($base->getBdd());

?><!DOCTYPE html>
<html dir="ltr" lang="en-US"><head><!-- Created by Artisteer v4.2.0.60559 -->
    <meta charset="utf-8">
    <title>Administration</title>
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
                                <h2 class="art-postheader">Administration</h2>
                                                
                <div class="art-postcontent art-postcontent-0 clearfix">
                <?php if(!isset($_POST['titre'])){ $evennement->setId($_POST['mod']); $evennement->findEvennement();?>
    			<form enctype="multipart/form-data" action="" method="post">
                <table class="art-article" style="width: 100%; "><tbody>
                <tr>
                	<td style="width: 50%; ">titre</td>
                    <td style="width: 50%; "><input type="hidden" name="id" value="<?php echo $_POST['mod']; ?>"><input type="text" name="titre" value="<?php echo $evennement->getTitre(); ?>"></td>
               	</tr>
                <tr>
                	<td style="width: 50%; ">contenu</td>
                    <td style="width: 50%; "><input type="text" name="contenu" value="<?php echo $evennement->getContenu(); ?>"></td>
               	</tr>
                <tr>
                	<td style="width: 50%; ">date debut</td>
                    <td style="width: 50%; "><input type="date" name="datedeb" value="<?php echo $evennement->getDatedeb(); ?>"></td>
               	</tr>
                <tr>
                	<td style="width: 50%; ">date fin</td>
                    <td style="width: 50%; "><input type="date" name="datefin" value="<?php echo $evennement->getDatefin(); ?>"></td>
               	</tr>
                <tr>
                	<td style="width: 50%; ">photo</td>
                    <td style="width: 50%; "><input type="hidden" name="anphoto" value="<?php echo $evennement->getPhoto(); ?>"><input type="file" name="photo"></td>
               	</tr>
                <tr>
                	<td style="width: 50%; "></td>
                    <td style="width: 50%; "><input type="submit" value="Confirmer"></td>
               	</tr>
                </tbody></table>
                </form>
                <?php }else { 
				extract($_POST);
				$evennement->setId($id);
				$evennement->setTitre($titre);
				$evennement->setContenu($contenu);
				$evennement->setDatedeb($datedeb);
				$evennement->setDatefin($datefin);
				$evennement->modMenu();
				?><p>
</p></div>
<?php } ?>

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