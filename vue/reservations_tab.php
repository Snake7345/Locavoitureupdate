<section>
	<h2>Table des réservations</h2>
	<?php 

		echo Vue::rtv_Table($reservations,"RECH_FICH",'Idreserv',"../control/reservations_fich.php");	 //affiche la table des réservations
		
	?>
</section>
	