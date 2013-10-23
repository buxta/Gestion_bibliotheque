<?php
	session_start();
	include ("../config/config.php");
	include ("../functions/functions.php");

	// Vérification des données
	if(!empty($_POST['delTypeDocument_idTypeDocument']))
	{
		$idTypeDocument = $_POST['delTypeDocument_idTypeDocument'];
		// On crée une instance de User
		$typeDocument = new TypeDocument();
		// Et on envoie les données dans sa fonction d'ajout dans la BDD
		$result = $typeDocument->remove($idTypeDocument);
		// Si les données ont été ajoutées, on affiche un message de succès
		if($result) {
			$info[] = "Type de document effacé.";
		}
	}

	$_SESSION['info'] = $info; // Met les messages d'erreurs dans une variable de session

	// On redirige sur la page précédente
	header("location: ../index.php?".$_SERVER['QUERY_STRING']);
?>