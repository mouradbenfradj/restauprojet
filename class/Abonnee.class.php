<?php
class Abonnee
{
	private $base;
	private $numero;
	private $pass;
	private $poste;
	private $req;
	private $ident;
	private $ajout;
	private $recherche;
	private $mod;
	
	public function getNumero()    
	{        
		return $this->numero;
	}            
	public function setNumero($numero)    
	{                  
		$this->numero = $numero;            
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
		$this->req = $this->base->prepare('SELECT * FROM abonnee'); 
		$this->ident = $this->base->prepare('SELECT * FROM abonnee WHERE numero = :numero AND pass = :pass'); 
		$this->recherche = $this->base->prepare('SELECT * FROM administration WHERE psudo = :psudo');
  		$this->ajout = $this->base->prepare('INSERT INTO abonnee VALUES(:numero, :pass)'); 
		$this->mod = $this->base->prepare('UPDATE administration SET psudo = :psudo, pass = :pass, poste = :poste  WHERE psudo = :psudoo');  

	}
	
	public function identification()
	{
		$this->ident->execute(array(    
			'numero' => $this->numero,    
			'pass' => $this->pass)); 
		$resultat = $this->ident->fetch(); 
		if (!$resultat) 
		{    
			echo 'Mauvais identifiant ou mot de passe !'; 
		} 
		else 
		{    
			$_SESSION['psudo'] = $this->numero; 
			$_SESSION['pass'] = $this->pass; 
			$_SESSION['poste'] = 'client';    
			header('Location: reservation.php');
			
  
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
			'numero' => $this->numero,    
			'pass'  => $this->pass));
		echo "succer";
	}
	
	public function supUser($numero)
	{
		$this->base->query("DELETE FROM abonnee WHERE numero='$numero'");

	}
	
}