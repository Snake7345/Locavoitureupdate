<section id="login_page">
	<article id="article_login">
		<form action="../control/login_control.php" method="post" accept-charset="utf-8">
			<input type="text" name="UTILISATEUR" value="" placeholder="Login" required>
			<input type="password" name="CODE" value="" placeholder="Mot de passe" required>
			<input type="submit" name="" value="Go">
		</form>
        <div id="erreur_login">
		<?php if (isset($_SESSION['ERROR_LOGIN'])){
			echo "<p>".$_SESSION['ERROR_LOGIN']."</p>";
		} ?>
        </div>
	</article>
</section>