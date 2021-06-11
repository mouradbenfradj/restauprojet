<?php
class Reservation
{
	private $base;
	private $id;
	private $numabonnee;
	private $datearr;
	private $nbrheur;
	private $nbrplace;
	private $menu;
	private $facture;
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
	public function getNumabonnee()    
	{        
		return $this->numabonnee;    
	}            
	public function setNumabonnee($numabonnee)    
	{                  
		$this->numabonnee = $numabonnee;            
	}
	public function getDatearr()    
	{        
		return $this->datearr;    
	}            
	public function setDatearr($datearr)    
	{                  
		$this->datearr = $datearr;            
	} 	
	public function getNbrheur()    
	{        
		return $this->nbrheur;    
	}            
	public function setNbrheur($nbrheur)    
	{                  
		$this->nbrheur = $nbrheur;            
	} 	
	
	public function getNbrplace()    
	{        
		return $this->nbrplace;    
	}            
	public function setNbrplace($nbrplace)    
	{                  
		$this->nbrplace = $nbrplace;            
	} 	
	
	public function getMenu()    
	{        
		return $this->menu;    
	}            
	public function setMenu($menu)    
	{                  
		$this->menu = $menu;            
	} 	
	
	public function getFacture()    
	{        
		return $this->facture;    
	}            
	public function setFacture($facture)    
	{                  
		$this->facture = $facture;            
	} 	
	
	public function __construct($base)   
	{
		$this->base =$base;
		$this->req = $this->base->prepare('SELECT * FROM reservation ORDER BY (id) DESC'); 
		$this->recherche = $this->base->prepare('SELECT * FROM menu WHERE id = :id');
  		$this->ajout = $this->base->prepare('INSERT INTO reservation VALUES(:id, :numabonnee, :datearr, :nbrheur, :nbrplace, :menu, :facture)'); 
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
	
	public function get_reservation() 
	{    
		$this->req->execute();    
		$utilisateur = $this->req->fetchAll();            
		return $utilisateur; 
	}
	
	public function addReservation()
	{					
		$this->ajout->execute(array(    
			'id' => NULL,    
			'numabonnee' => $_SESSION['psudo'],    
			'datearr' => $_POST['dates'].":".$_POST['temps'],    
			'nbrheur' => $_POST['nbhres'],    
			'nbrplace'  => $_POST['nbplace'], 
			'menu'  => $_POST['chh'], 
			'facture' => 0));
	}
	
	public function supMenu()
	{
		$this->base->query("DELETE FROM menu WHERE id='$this->id'");
		unlink("images/$this->photo");
	}
	
}