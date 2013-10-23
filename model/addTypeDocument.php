<?php
	session_start();
	include ("../config/config.php");
	include ("../functions/functions.php");

	// Vérification des données
	if(!empty($_POST['addtypeDocument_submit']))
	{
		if(!empty($_POST['addtypeDocument_label'])) {
			$label = $_POST['addtypeDocument_label'];
		}
		else
		{
			$info[] = "Veuillez entrer un libellé, voyou";
		}

		if(!empty($_POST['addtypeDocument_nbJourEmprunt'])) {
			$nbJourEmprunt = $_POST['addtypeDocument_nbJourEmprunt'];
		}
		else
		{
			$info[] = "Veuillez entrer une durée d'emprunt maximale, mec";
		}

		if(isset($_POST['addTypeDocument_subDocument'])) {
			$subDocument = $_POST['addTypeDocument_subDocument'];
		}


		// S'il n'y a pas de message suite à la vérification des champs, on se prépare à envoyer les données
		if (empty($info)) {

			$data['libelle'] = $_POST['addtypeDocument_label'];
			$data['nbJourEmprunt'] = $_POST['addtypeDocument_nbJourEmprunt'];
			$data['genereSousDocument'] = $_POST['addtypeDocument_nbJourEmprunt'];

			// On crée une instance de typeDocument
			$typeDocument = new TypeDocument();
			// Et on envoie les données dans sa fonction d'ajout dans la BDD
			$result = $typeDocument->insert($data);
			// Si les données ont été ajoutées, on affiche un message de succès
			if($result) {
				$info[] = "Type de document ajouté à la base de données.";
			}
		}
	}

	$_SESSION['info'] = $info; // Met les messages d'erreurs dans une variable de session

	// On redirige sur la page précédente
	header("location: ../index.php?".$_SERVER['QUERY_STRING']);
?>