<?php
class Administration
{
	private $base;
	private $psudo;
	private $pass;
	private $poste;
	private $req;
	private $ident;
	private $ajout;
	private $recherche;
	private $mod;
	
	public function getPsudo()    
	{        
		return $this->psudo;
	}            
	public function setPsudo($psudo)    
	{                  
		$this->psudo = $psudo;            
	}
	public function getPass()    
	{        
		return $this->pass;    
	}            
	public function setPass($pass)    
	{                  
		$this->pass = $pass;            
	}
	public function getPoste()    
	{        
		return $this->poste;    
	}            
	public function setPoste($poste)    
	{                  
		$this->poste = $poste;            
	} 	
	
	public function __construct($base)   
	{
		$this->base =$base;
		$this->req = $this->base->prepare('SELECT * FROM administrateur'); 
		$this->ident = $this->base->prepare('SELECT * FROM administrateur WHERE psudo = :psudo AND pass = :pass'); 
		$this->recherche = $this->base->prepare('SELECT * FROM administration WHERE psudo = :psudo');
  		$this->ajout = $this->base->prepare('INSERT INTO administrateur VALUES(:psudo, :pass)'); 
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
	
	
	public function modUser() 
	{    extract($_GET);
		$this->mod->execute(array( 'psudo' => $psudo, 'pass' => $pass, 'poste' => $poste, 'psudoo' => $psudoo ));
	}
	
	public function get_user() 
	{    
		$this->req->execute();    
		$utilisateur = $this->req->fetchAll();            
		return $utilisateur; 
	}
	
	public function addUser()
	{
		$this->ajout->execute(array(    
			'psudo' => $this->psudo,    
			'pass'  => $this->pass));
		echo "succer";
	}
	
	public function supUser($id)
	{
		$this->base->query("DELETE FROM administrateur WHERE psudo='$id'");

	}
	
}