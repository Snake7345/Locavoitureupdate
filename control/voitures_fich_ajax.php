<?php
	require_once('../control/core.php');	
	$voitures=Model::load("voitures");
	//--------------------------------------------------------------------

	if(isset($_POST['FormFiche'])&&isset($_POST['MODE'])){
		if($_POST['MODE']=="MODIF"){
			if($voitures->update($_POST)){
				echo '<script>alert("Modification effectuée")</script>';
				require_once('../control/voitures_tab.php');
			}			
			$_POST['RECH_FICH']=$_POST['ID'];
		}
		else{
			if($voitures->insert($_POST)){
				echo '<script>alert("Ajout effectué")</script>';
				require_once('../control/voitures_tab.php');
			}
		}
	}
	else{
		if(isset($_POST['FormFicheAjout'])){
			$_POST['RECH_FICH']='';
			$voitures->data[0]['ID']='';
			$voitures->data[0]['Marque'	]='';
			$voitures->data[0]['Modele'	]='';
			$voitures->data[0]['Couleur']='';
			$voitures->data[0]['Plaque']='';
			$voitures->data[0]['Louee']='';
			$voitures->data[0]['Actif']='';
	
			echo vue::rtv_fiche($voitures,"../control/voitures_fich.php"," ","AJOUT");
		}
		else{
				if(!(isset($_POST['FormModeAjax']) && $_POST['FormModeAjax'] == "1")){
					$voitures->id[0]=$_POST['RECH_FICH'];	
					$voitures->read('voitureID "ID", marque "Marque ", modele "Modele" , couleur "Couleur", plaque "Plaque", louee "Louee" ');

					echo vue::rtv_fiche($voitures,"../control/voitures_fich.php","ID");
					
					if($voitures->data[0]->Louee == 0)
					{
						echo vue::rtv_Show_Action_Button("Louer", "Louer");
					}
					else
					{
						echo vue::rtv_Show_Action_Button("Retour", "Retour");
					}
				}
		}
	}

?> 
