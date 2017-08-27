<?php 
class Vue{
	public static function rtv_Table($pTable,$pNom='', $pColID='', $pAction= '', $pCheckboxColumName =''){
		$out  = "";
		$formNouveau="";
		$formRetour="";
		$formSupprim="";
		//change l'étiquette du bouton d'ajout d'un nouvel enregistrement	
		if (strstr($pAction, "utilisateurs") ||strstr($pAction, "voitures") ||strstr($pAction, "clients") ){
			$labelButton = "Nouvelle Fiche";
		}
		else{
			$labelButton = "Nouvelle Réservation";
		}
		//Création du bouton pour un nouveau record
		$formNouveau .= '<form action="'.$pAction.'" method="post" accept-charset="utf-8">';
		$formNouveau .= '<input type="hidden" name="FormFicheAjout" value="1" >';
		$formNouveau .= '<input type="submit" name="" value="'.$labelButton.'">';
		$formNouveau .= '</form>';
		
		//Création du bouton de retour
		$pAction2 = str_replace("fich","tab",$pAction);
		$formRetour .= '<form action="'.$pAction2.'" method="post" accept-charset="utf-8">';
		$formRetour .= '<input type="submit" name="" value="Retour">';
		$formRetour .= '</form>';
		
		$titre = '<tr>';
		$titre_trt = false;
		
		foreach($pTable->data as $key => $element){
			$out .= '<tr class="POPUPFORM" id="'.Utilities::first($element).'">';
			$colForm = '';
			$colDel="";
			foreach($element as $subkey => $subelement){
				if($titre_trt==false){
					$titre .= '<th>'.$subkey.'</th>' ;					
				}
				if (strstr($pAction, "reservations")){$pColID='id_reserv';}
				if (strstr($pAction, "clients")){$pColID='CID';}
				if ($pColID != '' && $pAction != '' && $subkey == $pColID){	
							
					$colForm .= '<form action="'.$pAction.'" method="post" accept-charset="utf-8">';
					$colForm .= '<button type="button" class="Voir"><i class="fa fa-eye" aria-hidden="true"></i> Voir</button>';
					$colForm .= '<input type="hidden" name="RECH_FICH" value="'.$subelement.'" >';
					$colForm .= '</form>';
					$colForm = '<td>'.$colForm.'</td>';
				}
				if(!empty($pCheckboxColumName) && ($pCheckboxColumName === $subkey))
				{
				    $checked = $subelement ? " checked" : "";

                    $out .= '<td><input id="checkbox" type="checkbox" class="'.$subkey.'"'.$checked.'></td>';
				}
				else
                {
                    $out .= '<td>'.$subelement.'</td>' ;
                }
			}
			if($titre_trt==false){
				$titre.= '</tr>';
			}
			$titre_trt= true;
			$out .= $colForm."</tr>";
		}
		$out = '<section ID="RESULT_'.$pNom.'"><table>'.$titre.$out.'</table><br>'.$formNouveau.$formRetour.'</section>';
		return $out;
	}
//-----------------------------------------------------------------------------------------------------	

	public static function rtv_Fiche($pParam,$pAction="",$pPK="",$pMode="MODIF"){
		$out ="";
	
		$out .= '<form method="post" action="'.$pAction.'">';
		$out .= '<input type="hidden" name="FormFiche" value="1">';
		$out .= '<input type="hidden" name="FormModeAjax" value="0">';
		$out .= '<input type="hidden" name="MODE" value="'.$pMode.'">';
		
		//affichage de la table
		foreach($pParam ->data as $key => $element){		
			foreach($element as $subkey => $subelement){
				$varReadOnly="";
				if ($subkey==$pPK) {
					$varReadOnly="readonly";
				}				
				$out .= '<p ><label for="'.$subkey.'" class="FormFiche">'.$subkey.'</label> :';
				$out .='<input id="alignForm" type="text" name="'.$subkey.'"  value="'.$subelement.'"/>';	
				$out .='<input id="designForm" type="text" name=""  value="'.$varReadOnly.'"/>';		
				$out .='</p>';
			}
		}
		$out .= '<input type="submit" name="VALIDER" value="Valider">';
		$out .= '</form>';
		
		//création du bouton d'annulation.		
		$pAction = str_replace("fich","tab",$pAction);
		$out .= '<form action="'.$pAction.'" method="post">';
		$out .= '<input type="submit" value="Annuler" />';
		$out .= '</form>';		
		return $out;
	}

//----------------------------------------------------------------------------------------------------
	public static function rtv_Zone_Rech($pAction,$pNom,$pRechVal,$pPlaceHolder){

		$ValRetour = '<section id="recherche">';
		$ValRetour .= '<form action= " '.$pAction.' " method="post" accept-charset="utf-8">';
		$ValRetour .= '<input type="text" name="'.$pNom.'" value="'.$pRechVal.'" placeholder="'.$pPlaceHolder.'">';
		$ValRetour .= '<input type="submit" name="" value="Rechercher">';
		$ValRetour .= '</form></br>';
		
		if (strstr($pAction, "utilisateurs")) {$ValRetour .='La recherche se fait sur Login, nom et prénom.';}
		if (strstr($pAction, "voitures")){$ValRetour .='La recherche se fait sur Marque, Modèle et Plaque.';}
		if (strstr($pAction, "reservations") ){$ValRetour .='La recherche se fait sur Date de début, nom du client et modèle de la voiture.';}
		if (strstr($pAction, "clients") ){$ValRetour .='La recherche se fait sur ID Client, nom du client et N° du permis.';}	
		$ValRetour .= ' ';
		$ValRetour .= '</section>';
		return $ValRetour;
	
	}
//----------------------------------------------------------------------------------------------------	
}
?>
