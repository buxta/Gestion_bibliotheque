<?php
	session_start();
	include ("../config/config.php");
	include ("../functions/functions.php");

	// Vérification des données
	if(!empty($_POST['delUser_idUsager']))
	{
		$idUsager = $_POST['delUser_idUsager'];
		// On crée une instance de User
		$user = new User();
		// Et on envoie les données dans sa fonction d'ajout dans la BDD
		$result = $user->remove($idUsager);
		// Si les données ont été ajoutées, on affiche un message de succès
		if($result) {
			$info[] = "Usager... Supprimé.";
		}
	}

	$_SESSION['info'] = $info; // Met les messages d'erreurs dans une variable de session

	// On redirige sur la page précédente
	header("location: ../index.php?".$_SERVER['QUERY_STRING']);
?>