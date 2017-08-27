<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Location de voitures</title>
	<link rel="stylesheet" href="../vue/css/page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
</head>

<body>
	<header id="header" class="header">
		<p class="Style3">Location de voiture <br>
			- Projet de développement web -</p>
		<?php 
		if(isset($_SESSION['NOM'])){ 
			echo 'Bonjour Mr. '.$_SESSION['NOM'];
		} 
		if (Control::user_connected()){
			require_once('../vue/aside.php');
		}
		?>
	</header>
