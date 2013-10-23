<?php
	session_start();
	include ("../config/config.php");
	include ("../functions/functions.php");

	// Vérification des données
	if(!empty($_POST['delDocument_idDocument']))
	{
		$idDocument = $_POST['delDocument_idDocument'];
		// On crée une instance de User
		$document = new Document();
		// Et on envoie les données dans sa fonction d'ajout dans la BDD
		$result = $document->remove($idDocument);
		// Si les données ont été ajoutées, on affiche un message de succès
		echo $result[2];
		if($result[2]) {
			$info[] = $result[2];
		}
		else {
			$info[] = "Document effacé.";
		}
	}

	$_SESSION['info'] = $info; // Met les messages d'erreurs dans une variable de session

	// On redirige sur la page précédente
	header("location: ../index.php?".$_SERVER['QUERY_STRING']);
?>