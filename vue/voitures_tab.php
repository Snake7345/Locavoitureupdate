<section>
	<h2>Table des voitures</h2>
	<?php 
		echo Vue::rtv_Table($voitures,"RECH_FICH",'ID',"../control/voitures_fich.php", 'Louee');	 //affiche la table des voitures
	?>
</section>
	