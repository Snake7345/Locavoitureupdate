var visuPopup = function(event){
	/* Je récupère l'élément sur lequel j'ai cliqué*/
	var elem=$( this ).closest(".POPUPFORM");

	/*Je récupère l'ID ainsi que l'ACTION du formulaire */
	id = $("input[name='RECH_FICH']",elem).attr("value");
	$formAction = $("form",elem).attr("action");
	$formAction = $formAction.replace('.php', '_ajax.php');

    /*Je fais mon call AJAX et j'affiche le POPUP*/
	$.post( $formAction, { RECH_FICH : id })
  		.done(function( data ) {
			var monHTML="\
						<div id=\"popup1\" class=\"overlay\"> \
							<div class=\"popup\"> \
								<h2>Description</h2> \
								<a class=\"close\" href=\"#\">&times;</a> \
								<div class=\"content\" id=\"popup_"+id+"\"> \
									"+data+" \
								</div> \
							</div>\
						</div>";
						
			$('body'	).append(monHTML);

			$('.close').on("click",function(event) {
				$('#popup1').remove();
			});
  		});
};
//------------------------------------------------------------------------------------------
$( '.Voir' ).each(function(index) { $(this).on("click", visuPopup); });

var toggleUtilisateurActive = function(){
	var elem = this;

	var destination;
    if(elem.checked){
        destination='control_utilisateur_active.php';
    }else{
        destination='control_utilisateur_desactive.php';
    };
    $.post(
        destination,
        {
            utilisateur : $(this).closest('tr').attr('id')
        }
    ).done(function( data ) {
        this.checked = data.value;
    });
};
//--------------------------------------------------------
$('#RESULT_RECH_FICH .Actif').on('change', toggleUtilisateurActive);


var toggleVoitureLouee = function(){
    var elem = this;

    var destination;
    if(elem.checked){
        destination='control_voiture_louee.php';
    }else{
        destination='control_voiture_nlouee.php';
    };
    $.post( 
        destination, 
        { 
            voitureID : $(this).closest('tr').attr('id') 
        } 
    ).done(function( data ) {
        this.checked = data.value;
    });
};

$('#RESULT_RECH_FICH .Louee').on('change',toggleVoitureLouee);

var changeButtonVoiture = function(){
    var elem = $(this);
    
    var destination;
    if(elem.attr('id') == 'Louer'){
        destination='control_voiture_louee.php';
    }else{
        destination='control_voiture_nlouee.php';
    };
    // divId  string   "popup_1001"
    //    id  ******   "1001"
    var divId = $(this).closest('div').attr('id');
    var id = divId.substring(6);
    $.post( 
        destination, 
        { 
            voitureID : id
        } 
    ).done(function( data ) {
        if(data.value)
        {
            alert("La voiture est louée.");
        }
        else
        {
            alert("La voiture est à nouveau disponible.");
        }
    });
};

$('#Louer').bind('click', changeButtonVoiture);
$('#Retour').bind('click', changeButtonVoiture);
