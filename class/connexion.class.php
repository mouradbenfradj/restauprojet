<?php
class Connexion
{
	private $bdd;
	public function __construct()
	{
		try
		{
			$this->bdd = new PDO('mysql:host=localhost;dbname=reservrestau', 'root', '');
		}catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	}

	
	
	public function getBdd()
	{
		return $this->bdd;
	}

}
?>