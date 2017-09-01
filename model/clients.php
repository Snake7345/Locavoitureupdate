<?php
class clients extends Model{
	var $table = "clients";	
	var $id ;
	var $PK=array("idclients");
	var $data ; 
	var $Rech=array("idclients", "nomclient" , "numpermis");
//--------------------------------------------------------------------------------------------------------------	
	public function update($pTB){
		
		$sql= " UPDATE ".$this->table;
		$sql.=" SET ";
		$sql.="idclients =".$this->connection->quote($pTB["CID"]);
		$sql.=", nomclient	=".$this->connection->quote($pTB["Nom"]); 
		$sql.=", prenomclient  =".$this->connection->quote($pTB["Prenom"]);
		$sql.=", adresse 	=".$this->connection->quote($pTB["Adresse"]);
		$sql.=", cp 	=".$this->connection->quote($pTB["CP"]); 
		$sql.=", localite 	=".$this->connection->quote($pTB["Localite"]); 
		$sql.=", niss		=".$this->connection->quote($pTB["Niss"]); 
		$sql.=", datnais	=".$this->connection->quote($pTB["Datenaiss"]);
		$sql.=", numpermis  =".$this->connection->quote($pTB["Numpermis"]);
		$sql.=" WHERE ".$this->PK[0]." =  ".$this->connection->quote($pTB["CID"]); 
		return $this->connection->query($sql);
	}
//-------------------------------------------------------------------------------------------------------------		
	public function insert($pTable){
		$valRetour="False";
		
		$sql= " INSERT INTO ".$this->table;
		$sql.=" (idclients, nomclient, prenomclient, adresse, cp, localite, niss, datnaiss, numpermis) ";
		$sql.=" VALUES ( ";
		$sql.=" 	".$this->connection->quote($pTable["CID"]);
		$sql.=" 	,".$this->connection->quote($pTable["Nom"]);
		$sql.=" 	,".$this->connection->quote($pTable["Prenom"]);
		$sql.=" 	,".$this->connection->quote($pTable["Adresse"]); 
		$sql.=" 	,".$this->connection->quote($pTable["CP"]); 
		$sql.=" 	,".$this->connection->quote($pTable["Localite"]); 
		$sql.=" 	,".$this->connection->quote($pTable["Niss"]); 
		$sql.=" 	,".$this->connection->quote($pTable["Datenaiss"]); 
		$sql.=" 	,".$this->connection->quote($pTable["Numpermis"]); 
		$sql.=" ) ";
		$valRetour=$this->connection->query($sql);
		if($valRetour==true){
			$this->id[0]=$this->connection->lastInsertId();
		}else{
			$this->id[0]="";
		}
		return $valRetour;
	}
//-----------------------------------------------------------------------------------------------------------------
	public function delete($pTable){
		$sql="";
		
		$sql = " UPDATE ".$this->table." SET actif = 0";
		$sql.=" WHERE ".$this->PK[0]." =  ".$this->connection->quote($pTable["idclients"]);
		return $this->connection->query($sql);
	}
//----------------------------------------------------------------------------------------------------------------
}
?>