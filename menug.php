<div class="art-blockcontent">
<?php include_once("class/connexion.class.php");
include_once("class/menu.class.php");
$base=new Connexion();
$menu=new Menu($base->getBdd());
$i=0;
$tab=$menu->get_menu(); 
foreach($tab as $valeur){
$i++;
if($i>3){break;}
?>
<p><img alt="" width="88" height="88" src="images/<?php echo $valeur['photo']; ?>" style="float:left;margin-right:10px;" class=""></p><p><?php echo $valeur['description']; ?></p><p><br><span style="font-weight:bold;"><?php echo $valeur['prix']; ?> dt</span></p></p><br><br />
<?php } ?>
</div>