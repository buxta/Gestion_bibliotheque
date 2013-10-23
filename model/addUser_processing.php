<?php
	session_start();
	include ("../config/config.php");
	include ("../functions/functions.php");

	// Vérification des données
	if(!empty($_POST['addUser_submit']))
	{
		if(!empty($_POST['addUser_lastName'])) {
			$lastName = $_POST['addUser_lastName'];
		}
		else
		{
			$info[] = "Veuillez entrer ton nom de famille, manant";
		}

		if(!empty($_POST['addUser_firstName'])) {
			$firstName = $_POST['addUser_firstName'];
		}
		else
		{
			$info[] = "Veuillez entrer ton prénom, vaurien";
		}

		if(!empty($_POST['addUser_profession'])) {
			$profession = $_POST['addUser_profession'];
		}
		else
		{
			$info[] = "Veuillez entrer ta profession, galopin";
		}

		if(!empty($_POST['addUser_employer'])) {
			$employer = $_POST['addUser_employer'];
		}
		else
		{
			$info[] = "Veuillez entrer ta employeur, malandrin";
		}

		if(isset($_POST['addUser_admin'])) {
			$admin = $_POST['addUser_admin'];
		}
		else {
			$admin = 0;
		}

		// S'il n'y a pas de message suite à la vérification des champs, on se prépare à envoyer les données
		if (empty($info)) {

			$data['nom'] = $lastName;
			$data['prenom'] = $firstName;
			$data['profession'] = $profession;
			$data['employeur'] = $employer;
			$data['admin'] = $admin;

			// On crée une instance de User
			$user = new User();
			// Et on envoie les données dans sa fonction d'ajout dans la BDD
			$result = $user->insert($data);
			// Si les données ont été ajoutées, on affiche un message de succès
			if($result) {
				$info[] = "Lecteur ajouté à la base de données.";
			}
		}
	}

	$_SESSION['info'] = $info; // Met les messages d'erreurs dans une variable de session

	// On redirige sur la page précédente
	header("location: ../index.php?".$_SERVER['QUERY_STRING']);
?>