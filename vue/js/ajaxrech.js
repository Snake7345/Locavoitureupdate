
//call ajax:
var AjaxRech = function() 
{
	$input=$(this); //this = élément courant: dans ce cas c'est la zone de recherche
	$form=$input.parent("form");
	$formAction = $form.attr("action");
	$formValeur = $input.val(); //valeur de la zone de recherche 'contenu'
	$zoneResult = '#RESULT_'+$input.attr("name");  //on prépare la sélection

	$formAction = $formAction.replace('.php', '_ajax.php'); //on ajoute _ajax car dans l'attribut action on ne pointe pas sur la page ajax

	$.post( $formAction, { RECH_AJAX : $formValeur })
  		.done(function( data ) {$($zoneResult).replaceWith(data);});   
		//data est un paramètre qui va recevoir le retour du call ajax, ce que le serveur a produit

};

$( '.RECH' ).on("keyup", AjaxRech );