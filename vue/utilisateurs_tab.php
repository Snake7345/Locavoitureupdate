<section>
	<h2>Table des utilisateurs</h2>
	<?php 
		echo Vue::rtv_Table($utilisateurs,"RECH_FICH",'Login',"../CONTROL/utilisateurs_fich.php", 'Actif');	 //affiche la table des utilisateurs
	?>
</section>
	