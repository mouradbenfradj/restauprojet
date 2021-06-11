<?php
class Administration
{
	private $base;
	private $coutheur;
	private $nbplace;

	private $req;
	private $ident;
	private $ajout;
	private $recherche;
	private $mod;
	
	public function getCoutheur()    
	{        
		$this->coutheur->execute();
		$cout = $this->coutheur->fetch();            
		return $cout['coutheur']; 
	}            
	public function setCoutheur($coutheur)    
	{                  
		$this->coutheur = $coutheur;            
	}
	public function getNbplace()    
	{        
		$this->nbplace->execute();
		$cout = $this->nbplace->fetch();            
		return $cout['nbplace']; 
	}            
	public function setNbplace($nbplace)    
	{                  
		$this->nbplace = $nbplace;            
	}


	public function __construct($base)   
	{
		$this->base =$base;
		$this->coutheur = $this->base->prepare('SELECT coutheur FROM administration');
		$this->nbplace = $this->base->prepare('SELECT nbplace FROM administration');
		
		$this->recherche = $this->base->prepare('SELECT * FROM menu WHERE id = :id');
  		$this->ajout = $this->base->prepare('INSERT INTO menu VALUES(:id, :titre, :contenu, :description, :prix, :photo)'); 
		$this->mod = $this->base->prepare('UPDATE menu SET titre = :titre, contenu = :contenu, description = :description, prix = :prix, photo = :photo  WHERE id = :id');  

	}
	
	
	public function findMenu()
	{
		$this->recherche->execute(array(    
			'id' => $this->id));    
		$utilisateur = $this->recherche->fetchAll();            
		$this->titre=$utilisateur[0]['titre'];
		$this->contenu=$utilisateur[0]['contenu'];
		$this->description=$utilisateur[0]['description']; 
		$this->prix=$utilisateur[0]['prix']; 
		$this->photo=$utilisateur[0]['photo']; 
	}
	
	
	public function modMenu() 
	{
	}	
	public function get_menu() 
	{    
		$this->req->execute();    
		$utilisateur = $this->req->fetchAll();            
		return $utilisateur; 
	}
	
	public function addMenu()
	{
$dossier = 'images/';
$fichier = basename($_FILES['photo']['name']);
$this->photo=$fichier;
$extensions = array('.png', '.gif', '.jpg', '.jpeg');
$extension = strrchr($_FILES['photo']['name'], '.'); 
//Début des vérifications de sécurité...
if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
     $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
}
if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
{
     //On formate le nom du fichier ici...
     $fichier = strtr($fichier, 
          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
     $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
	 $this->photo=$fichier;
     if(move_uploaded_file($_FILES['photo']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     {
          echo 'Upload effectué avec succès !';
		  	$this->ajout->execute(array(    
			'id' => NULL,    
			'titre' => $this->titre,    
			'contenu' => $this->contenu,    
			'description' => $this->description,    
			'prix'  => $this->prix, 
			'photo' => $this->photo));
			

     }
     else //Sinon (la fonction renvoie FALSE).
     {
          echo 'Echec de l\'upload !';
     }
}
else
{
     echo $erreur;
}
	}
	
	public function supMenu()
	{
		$this->base->query("DELETE FROM menu WHERE id='$this->id'");
		unlink("images/$this->photo");
	}
	
}