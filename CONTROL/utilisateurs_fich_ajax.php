<?php
	require_once('../control/core.php');	
	$utilisateurs=Model::load("utilisateurs");
	//--------------------------------------------------------------------

	if(isset($_POST['FormFiche'])&&isset($_POST['MODE'])){
		if($_POST['MODE']=="MODIF"){
			if($utilisateurs->update($_POST)){
				echo '<script>alert("Modification effectuée")</script>';
				require_once('../control/utilisateurs_tab.php');
			}
			$_POST['RECH_FICH']=$_POST['Login'];
		}
		else{
			if($utilisateurs->insert($_POST)){
				echo '<script>alert("Ajout effectué")</script>';
				require_once('../control/utilisateurs_tab.php');
			}
		}
	}
	else{
		if(isset($_POST['FormFicheAjout'])){
			$_POST['RECH_FICH']='';
			$utilisateurs->data[0]['Login']='';
			$utilisateurs->data[0]['Code'	]='';
			$utilisateurs->data[0]['Nom']='';
			$utilisateurs->data[0]['Prenom']='';
			$utilisateurs->data[0]['Admin']='';
			$utilisateurs->data[0]['Actif']='';
	
			echo vue::rtv_fiche($utilisateurs,"../control/utilisateurs_fich.php"," ","AJOUT");
		}
		else{
				if(!(isset($_POST['FormModeAjax']) && $_POST['FormModeAjax'] == "1")){
					$utilisateurs->id[0]=$_POST['RECH_FICH'];	
					$utilisateurs->read('utilisateur "Login", code "Code", nom "Nom" , prenom "Prenom", admin "Admin", actif "Actif" ');
					echo vue::rtv_fiche($utilisateurs,"../CONTROL/utilisateurs_fich.php","Login");
				}
		}
	}

?> 
