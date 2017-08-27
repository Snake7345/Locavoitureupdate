<?php
class reservations extends Model{

	var $table = "reservations";	
	var $id ;
	var $PK=array("id_reserv");
	var $data ; 
	var $Rech=array("nomclient", "DateDebut", "modele"); // colonne sur lesquelles on va faire des recherches	
	
//------------------------------------------------------------------------------------------------------------------
	public function update($pTB){
		
		$sql= " UPDATE ".$this->table;
		$sql.=" SET ";
		$sql.=" id_reserv=".$this->connection->quote($pTB["Idreserve"]);
		$sql.=", id_voiture=".$this->connection->quote($pTB["IdVoiture"]); 
		$sql.=", DateDebut=".$this->connection->quote($pTB["Datedeb"]);
		$sql.=", DateFin=".$this->connection->quote($pTB["Datefin"]);
		$sql.=", id_client 	=".$this->connection->quote($pTB["Idclient"]); 

		$sql.=" WHERE ".$this->PK[0]." =  ".$this->connection->quote($pTB["Idreserve"]); 
		return $this->connection->query($sql);
	}
//-------------------------------------------------------------------------------------------------------------		
	public function insert($pTable){
		$valRetour="False";
		
		$sql= " INSERT INTO ".$this->table;
		$sql.=" (id_reserv, id_voiture, DateDebut, DateFin, id_client) ";
		$sql.=" VALUES ( ";
		$sql.=" 	".$this->connection->quote($pTable["Idreserve"]);
		$sql.=" 	,".$this->connection->quote($pTable["IdVoiture"]);
		$sql.=" 	,".$this->connection->quote($pTable["Datedeb"]);
		$sql.=" 	,".$this->connection->quote($pTable["Datefin"]); 
		$sql.=" 	,".$this->connection->quote($pTable["Idclient"]); 
		$sql.=" ) ";

		$valRetour=$this->connection->query($sql);
		if($valRetour==true){
			$this->id[0]=$this->connection->lastInsertId();
		}else{
			$this->id[0]="";
		}
		return $valRetour;
	}
//---------------------------------------------------------------------------------------------------------------

}
?>