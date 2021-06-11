<?php
class Galerie
{
	private $base;
	private $id;
	private $photo;
	private $req;
	private $ident;
	private $ajout;
	private $recherche;
	private $mod;
	
	public function getId()    
	{        
		return $this->id;
	}            
	public function setId($id)    
	{                  
		$this->id = $id;            
	}
	public function getPhoto()    
	{        
		return $this->photo;    
	}            
	public function setPhoto($photo)    
	{                  
		$this->photo = $photo;            
	}

	public function __construct($base)   
	{
		$this->base =$base;
		$this->req = $this->base->prepare('SELECT * FROM galerie'); 
		$this->recherche = $this->base->prepare('SELECT * FROM galerie WHERE id = :id');
  		$this->ajout = $this->base->prepare('INSERT INTO galerie VALUES(:id, :photo)'); 
		$this->mod = $this->base->prepare('UPDATE administration SET psudo = :psudo, pass = :pass, poste = :poste  WHERE psudo = :psudoo');  

	}
	
	public function identification()
	{
		$this->ident->execute(array(    
			'psudo' => $this->psudo,    
			'pass' => $this->pass)); 
		$resultat = $this->ident->fetch(); 
		if (!$resultat) 
		{    
			echo 'Mauvais identifiant ou mot de passe !'; 
		} 
		else 
		{    
			$_SESSION['psudo'] = $this->psudo; 
			$_SESSION['pass'] = $this->pass; 
			$_SESSION['poste'] = 'admin';    
			header('Location: administration.php');
			
  
		}
	}
	
	public function findUser()
	{
		$this->recherche->execute(array(    
			'psudo' => $this->psudo));    
		$utilisateur = $this->recherche->fetchAll();            
		$this->psudo=$utilisateur[0]['psudo'];
		$this->pass=$utilisateur[0]['pass'];
		$this->poste=$utilisateur[0]['poste']; 
	}
	
	
	public function modPhoto() 
	{
		$this->mod->execute(array('photo' => $this->photo, 'id' => $this->id ));
	}
	
	public function get_galerie() 
	{    
		$this->req->execute();    
		$utilisateur = $this->req->fetchAll();            
		return $utilisateur; 
	}
	
	public function addPhoto()
	{
	$dossier = 'images/';
$fichier = basename($_FILES['photoa']['name']);
$this->photo=$fichier;
$extensions = array('.png', '.gif', '.jpg', '.jpeg');
$extension = strrchr($_FILES['photoa']['name'], '.'); 
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
     if(move_uploaded_file($_FILES['photoa']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     {
          echo 'Upload effectué avec succès !';

		$this->ajout->execute(array(    
			'id' =>NULL,    
			'photo'  => $this->photo));
		echo "succer";
		

     }
     else //Sinon (la fonction renvoie FALSE).
     {
          echo 'Echec de l\'upload !';
     }
	}
	}
	public function supGalerie()
	{
		$this->base->query("DELETE FROM galerie WHERE id='$this->id'");
				unlink("images/$this->photo");

	}
	
}