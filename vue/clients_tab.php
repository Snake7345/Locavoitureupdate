<section>
	<h2>Table des clients</h2>
	<?php 
		echo Vue::rtv_Table($clients,"RECH_FICH",'CID',"../control/clients_fich.php");	 //affiche la table des clients
	?>
</section>