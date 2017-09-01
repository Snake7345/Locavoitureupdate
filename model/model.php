<?php
class Model{
	protected  	$connection;
	protected  	$dbMapArray;
	protected 		$schema ;
	protected  	$table ;	
	protected  	$id= array() ; 
	protected  	$PK= array(); 
	protected		$Rech=array();
	public    		$data ;
	public 			$pRech;
	
	function __construct() {  /* constructeur de la class*/
		
		try {
			$this->schema = 'locavoitures';
			$dns = 'mysql:host=127.0.0.1:3306;dbname='.$this->schema;
			$utilisateur = "root";
			$motDePasse = '';

		  // Options de connection
			$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

		  // Initialisation de la connection
			$this->connection = new PDO( $dns, $utilisateur, $motDePasse, $options );
			$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


		} catch ( Exception $e ) {
			echo "Connection à MySQL impossible : ", $e->getMessage();
			die();
		}
		
	}
//-------------------------------------------------------------------------------------------------------------
	static function load($name){
		require_once (__DIR__ . '/'.$name.'.php');
		return new $name($name);
	}
//-------------------------------------------------------------------------------------------------------------	
	public function read($fields=null,$pRech=null){
		$where="";
		
		if($fields==null){
			$fields = '*';
		}
		if($pRech==null){
			if (count($this->id) == 0){
				$sql= 'SELECT '.$fields.' from '.$this->table ;
			}
			else{
				$sql= 'SELECT '.$fields.' from '.$this->table .'  where ';
				$sql.= $this->PK[0] .'='. $this->connection->quote($this->id[0]);
			}	
		}
		else{ //création de la requête SQL qui permet la recherche sur les éléments prédéfinis.
				$sql= 'SELECT * FROM '.$this->table.' WHERE';
				$sql .=' upper(concat('.$this->Rech[0].', '.$this->Rech[1].', '.$this->Rech[2].'))';
				$sql .=' LIKE upper('.$this->connection->quote('%'.trim($pRech).'%').')';	
		}
		try {
		  	// On envois la requête
			$select = $this->connection->query($sql);
			
		  	// On indique que nous utiliserons les résultats en tant qu'objet
			$select->setFetchMode(PDO::FETCH_OBJ);
			$this->data = new stdClass();
			$this->data = $select->fetchAll();
			

		} catch ( PDOException $e ) {
			echo 'Erreur lors de l\' exécution de la requête : '.$sql.'==========='.$e->getMessage(); ;
		}
	}
//---------------------------------------------------------------------------------------------------------------------------------------
// Fonction spécifique pour la'affichage du tableau "réservations".
	public function InnerJoinDB($pRech=null,$pFiche=null){
		
		$sql= 'SELECT id_reserv,DateDebut,DateFin, nomclient,prenomclient, marque, modele, plaque ';
		$sql.='FROM reservations ';
		$sql.='INNER JOIN voitures,clients ';
		
		if($pRech==null){		
			$sql.='WHERE id_voiture=voitureID AND id_client=idclients';
		}
		else{
			if($pFiche!=null){
				$sql.='WHERE id_reserv="'.$pRech.'" AND id_voiture=voitureID AND id_client=idclients';
			}
			else{
			$sql .='WHERE upper(concat('.$this->Rech[0].', '.$this->Rech[1].', '.$this->Rech[2].')) ';		
			$sql .=' LIKE upper('.$this->connection->quote('%'.trim($pRech).'%').')';	
			$sql .=' AND id_voiture=voitureID AND id_client=idclients';
			}
		}
		try {
		  // On envois la requête
			$select = $this->connection->query($sql);
			
		  // On indique que nous utiliserons les résultats en tant qu'objet
			$select->setFetchMode(PDO::FETCH_OBJ);
			$this->data = new stdClass();
			$this->data = $select->fetchAll();
			

		} catch ( PDOException $e ) {
			echo 'Erreur lors de l\' exécution de la requête : '.$sql.'==========='.$e->getMessage(); ;
		}
	}
//-------------------------------------------------------------------------------------------------------------------------------------------------
}
?>
