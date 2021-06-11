<?php
class Menu
{
	private $base;
	private $id;
	private $titre;
	private $contenu;
	private $description;
	private $prix;
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
	public function getTitre()    
	{        
		return $this->titre;    
	}            
	public function setTitre($titre)    
	{                  
		$this->titre = $titre;            
	}
	public function getContenu()    
	{        
		return $this->contenu;    
	}            
	public function setContenu($contenu)    
	{                  
		$this->contenu = $contenu;            
	} 	
	public function getDescription()    
	{        
		return $this->description;    
	}            
	public function setDescription($description)    
	{                  
		$this->description = $description;            
	} 	
	
	public function getPrix()    
	{        
		return $this->prix;    
	}            
	public function setPrix($prix)    
	{                  
		$this->prix = $prix;            
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
		$this->req = $this->base->prepare('SELECT * FROM menu ORDER BY (id) DESC'); 
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
		 if($_POST['anphoto']!=$this->photo)
		 unlink("images/".$_POST['anphoto']);
          echo 'Upload effectué avec succès !';    
		$this->mod->execute(array( 'titre' => $this->titre, 
		'contenu' => $this->contenu,
		 'description' => $this->description,
		  'prix' => $this->prix,
		   'photo' => $this->photo,
		    'id' => $this->id ));

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