<?php
class utilisateurs extends Model{
	var $table = "utilisateurs";	
	var $id ;
	var $PK=array("utilisateur");
	var $data ; 
	var $Rech=array("utilisateur","nom","prenom"); // colonne sur lesquelles on va faire des recherches

//------------------------------------------------------------------------------------------------------------------
	public function update($pTB){
		
		$sql= " UPDATE ".$this->table;
		$sql.=" SET ";
		$sql.=" utilisateur =".$this->connection->quote($pTB["Login"]);
		$sql.=", code		=".$this->connection->quote($pTB["Code"]); 
		$sql.=", nom  		=".$this->connection->quote($pTB["Nom"]);
		$sql.=", prenom 	=".$this->connection->quote($pTB["Prenom"]);
		$sql.=", admin 	=".$this->connection->quote($pTB["Admin"]); 
		$sql.=", actif 		=".$this->connection->quote($pTB["Actif"]); 
		$sql.=" WHERE ".$this->PK[0]." =  ".$this->connection->quote($pTB["Login"]); 
		return $this->connection->query($sql);
	}
//-------------------------------------------------------------------------------------------------------------		
	public function insert($pTable){
		$valRetour="False";
		
		$sql= " INSERT INTO ".$this->table;
		$sql.=" (utilisateur, code, nom, prenom, admin, actif) ";
		$sql.=" VALUES ( ";
		$sql.=" 	".$this->connection->quote($pTable["Login"	]);
		$sql.=" 	,".$this->connection->quote($pTable["Code"]);
		$sql.=" 	,".$this->connection->quote($pTable["Nom"]);
		$sql.=" 	,".$this->connection->quote($pTable["Prenom"]); 
		$sql.=" 	,".$this->connection->quote($pTable["Admin"]); 
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
		$sql.=" WHERE ".$this->PK[0]." =  ".$this->connection->quote($pTable["utilisateur"]);
		return $this->connection->query($sql);
	}
//----------------------------------------------------------------------------------------------------------------
    function Employees_activ($Utilisateur){
        $sql= "call Employees_activ ('".$Utilisateur."') ";
        return $this->connection->query($sql);
    }

    function Employees_desactiv($Utilisateur){
        $sql= "call Employees_desactiv ('".$Utilisateur."') ";
        return $this->connection->query($sql);
    }


}
?>