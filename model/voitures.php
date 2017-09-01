<?php
class voitures extends Model{
	var $table = "voitures";	
	var $id ;
	var $PK=array("voitureID");
	var $data ; 
	var $Rech=array("marque", "modele" , "plaque");
//--------------------------------------------------------------------------------------------------------------	
	public function update($pTB){
		
		$sql= " UPDATE ".$this->table;
		$sql.=" SET ";
		$sql.="voitureID =".$this->connection->quote($pTB["ID"]);
		$sql.=", marque	=".$this->connection->quote($pTB["Marque"]); 
		$sql.=", modele  =".$this->connection->quote($pTB["Modele"]);
		$sql.=", couleur 	=".$this->connection->quote($pTB["Couleur"]);
		$sql.=", plaque 	=".$this->connection->quote($pTB["Plaque"]); 
		$sql.=", louee 	=".$this->connection->quote($pTB["Louee"]); 
		$sql.=", actif 		=".$this->connection->quote($pTB["Actif"]); 
		$sql.=" WHERE ".$this->PK[0]." =  ".$this->connection->quote($pTB["ID"]); 
		return $this->connection->query($sql);
	}
//-------------------------------------------------------------------------------------------------------------		
	public function insert($pTable){
		$valRetour="False";
		
		$sql= " INSERT INTO ".$this->table;
		$sql.=" (voitureID, marque, modele, couleur, plaque, louee, actif) ";
		$sql.=" VALUES ( ";
		$sql.=" 	".$this->connection->quote($pTable["ID"]);
		$sql.=" 	,".$this->connection->quote($pTable["Marque"]);
		$sql.=" 	,".$this->connection->quote($pTable["Modele"]);
		$sql.=" 	,".$this->connection->quote($pTable["Couleur"]); 
		$sql.=" 	,".$this->connection->quote($pTable["Plaque"]); 
		$sql.=" 	,".$this->connection->quote($pTable["Louee"]); 
		$sql.=" 	,".$this->connection->quote($pTable["Actif"]); 
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
		$sql.=" WHERE ".$this->PK[0]." =  ".$this->connection->quote($pTable["voitureID"]);
		return $this->connection->query($sql);
	}
//----------------------------------------------------------------------------------------------------------------
    function Voitures_louee($Voiture){
        $sql= "call Voitures_louee (".$Voiture.") ";
        return $this->connection->query($sql);
    }

    function Voitures_nlouee($Voiture){
        $sql= "call Voitures_nlouee (".$Voiture.") ";
        return $this->connection->query($sql);
    }

}

?>