<?php
	session_start();
	include ("../config/config.php");
	include ("../functions/functions.php");

	// Vérification des données
	if(!empty($_POST['addDocument_submit']))
	{
		if(!empty($_POST['addDocument_titre'])) {
			$titre = $_POST['addDocument_titre'];
		}
		else
		{
			$info[] = "Veuillez entrer un titre, brigand.";
		}

		if(!empty($_POST['addDocument_type'])) {
			$idTypeDocument = $_POST['addDocument_type'];
		}
		else
		{
			$info[] = "Veuillez choisir un type de document, misérable.";
		}

		if(!empty($_POST['addDocument_code'])) {
			$code = $_POST['addDocument_code'];
		}
		else
		{
			$info[] = "Veuillez entrer un code, maroufle.";
		}

		if(isset($_POST['addDocument_aEmporter'])) {
			$aEmporter = $_POST['addDocument_aEmporter'];
		}
		else {
			$aEmporter = 0;
		}

		if(!empty($_POST['addDocument_documentRef'])) {
			$documentRef = $_POST['addDocument_documentRef'];
		}
		else {
			$documentRef = NULL;
		}

		// S'il n'y a pas de message suite à la vérification des champs, on se prépare à envoyer les données
		if (empty($info)) {
			$data['titre'] = $titre;
			$data['code'] = $code;
			$data['aEmporter'] = $aEmporter;
			$data['documentRef'] = $documentRef;
			$data['idTypeDocument'] = $idTypeDocument;
			// On crée une instance de User
			$document = new Document();
			// Et on envoie les données dans sa fonction d'ajout dans la BDD
			$result = $document->insert($data);
			// Si les données ont été ajoutées, on affiche un message de succès
			if($result) {
				$info[] = "Document ajouté à la base de données.";
			}
		}
	}

	$_SESSION['info'] = $info; // Met les messages d'erreurs dans une variable de session

	// On redirige sur la page précédente
	header("location: ../index.php?".$_SERVER['QUERY_STRING']);
?>