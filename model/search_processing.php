<?php 
	session_start();
	include ("../config/config.php");
	include ("../functions/functions.php");

	$document = new Document;

	// Vérification des données

	if(!empty($_GET['search_submit']))
	{
		if(!empty($_GET['search_content'])) 
		{
			$recherche = $_GET['search_content'];
			$data = $_GET['search_content'];
		}
		else
		{
			$info[] = "Veuillez entrer un titre, pleutre.";
		}
		// Si y'a pas d'erreurs...
		if(empty($info)) {

			$result = $document->search($data);
			var_dump($result);
			if($result) {
				$_SESSION['searchResults'] = serialize($result);
			}
			else {
				$info[] = "Erreur quelconque";
			}
		}
	}

	$_SESSION['info'] = $info; // Met les messages d'erreurs dans une variable de session

	// On redirige sur la page précédente
	header("location: ../index.php?p=listResult");
 ?>