<?php
	session_start();
	include ("../config/config.php");
	include ("../functions/functions.php");

	// Vérification des données
	if(!empty($_POST['addTypeDocument_submit']))
	{
		if(!empty($_POST['addTypeDocument_label'])) {
			$label = $_POST['addTypeDocument_label'];
		}
		else
		{
			$info[] = "Veuillez entrer un libellé, voyou";
		}

		if(!empty($_POST['addTypeDocument_nbJourEmprunt'])) {
			$nbJourEmprunt = $_POST['addTypeDocument_nbJourEmprunt'];
		}
		else
		{
			$info[] = "Veuillez entrer une durée d'emprunt maximale, mec";
		}

		// S'il n'y a pas de message suite à la vérification des champs, on se prépare à envoyer les données
		if (empty($info)) {
			$data['libelle'] = $label;
			$data['nbJourEmprunt'] = $nbJourEmprunt;

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