<?php session_start(); if(empty($_SESSION['poste'])){$_SESSION['poste']='';}?>
<!DOCTYPE html>
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
                <?php if(!isset($_POST['psudo'])){ ?>
                <form action="" method="post">
                <table class="art-article" style="width: 100%; "><tbody><tr><td style="width: 50%; ">psudo</td><td style="width: 50%; "><input type="text" name="psudo"></td></tr><tr><td style="width: 50%; ">Mot de passe</td><td style="width: 50%; "><input type="password" name="pass"></td></tr><tr><td style="width: 50%; "></td><td style="width: 50%; "><input type="submit" value="Confirmer"></td></tr></tbody></table>
                </form>
                <?php }else { 
				include_once('class/Administrateur.class.php');
				include_once('class/connexion.class.php');
				$base= new Connexion();
				$user=new Administration($base->getBdd());
				$user->setPsudo($_POST['psudo']);
				$user->setPass($_POST['pass']);
				$user->identification();
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