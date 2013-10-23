<form method="POST" id="addUser" action="model/addUser_processing.php?<?=$_SERVER['QUERY_STRING']?>">
	<fieldset>
		<legend>Ajouter un lecteur</legend>
		<div class="inputs">
			<div class="inputContainer">
				<input type="text" class="input" placeholder="Nom" name="addUser_lastName" >
			</div>
			<div class="inputContainer">
				<input type="text" class="input" placeholder="Prénom" name="addUser_firstName" >
			</div>
			<br>
			<div class="inputContainer">
				<input type="text" class="input" placeholder="Profession" name="addUser_profession" >
			</div>
			<div class="inputContainer">
				<input type="text" class="input" placeholder="Employeur" name="addUser_employer" >
			</div>
			<br>
			<div class="inputContainer">
				<label for="addUser_admin">Possède les droits d'administrations</label><input class="block" type="checkbox" name="addUser_admin" id="addUser_admin" value="1">
			</div>
			<input type="submit" class="button" value="Ajouter un lecteur" name="addUser_submit">
			<br>
			<div class="formInfo">Tous les champs sont obligatoires</div>
		</div>
		<?php showInfo(); ?>
	</fieldset>
</form>