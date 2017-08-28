var visuPopup = function(event){
	/* Je récupère l'élément sur lequel j'ai cliqué*/
	var elem=$( this ).closest(".POPUPFORM");

	/*Je récupère l'ID ainsi que l'ACTION du formulaire */
	$formValeur = $("input[name='RECH_FICH']",elem).attr("value");
	$formAction = $("form",elem).attr("action");
	$formAction = $formAction.replace('.php', '_ajax.php');

	/*Je fais mon call AJAX et j'affiche le POPUP*/
	$.post( $formAction, { RECH_FICH : $formValeur })
  		.done(function( data ) {

			var monHTML="\
						<div id=\"popup1\" class=\"overlay\"> \
							<div class=\"popup\"> \
								<h2>Description</h2> \
								<a class=\"close\" href=\"#\">&times;</a> \
								<div class=\"content\"> \
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

var clicActive = function(){
	var elem = this;

	var destination;
    if(elem.checked){
        destination='control_utilisateur_active.php';
    }else{
        destination='control_utilisateur_desactive.php';
    };
    $.post( destination, { utilisateur : $(this).closest('tr').attr('id') } )
        .done(function( data ) {

                elem.empty();
                elem.html(data);
            }
        );
};
//--------------------------------------------------------
$('#RESULT_RECH_FICH .Actif').on('change',clicActive);


var clicActive2 = function(){
    var elem2 = this;

    var destination2;
    if(elem2.checked){
        destination2='control_voiture_louee.php';
    }else{
        destination2='control_voiture_nlouee.php';
    };
    $.post( destination2, { voiture : $(this).closest('tr').attr('id') } )
        .done(function( data ) {

                elem2.empty();
                elem2.html(data);
            }
        );
};

$('#RESULT_RECH_FICH .Louee').on('change',clicActive2());
