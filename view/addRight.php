<form method="POST" id="addRight" action="model/addRight_processing.php?<?=$_SERVER['QUERY_STRING']?>">
	<fieldset>
		<legend>Ajouter un droit d'accès</legend>
		<div class="inputs">
			<div class="inputContainer">
				<input type="text" class="input" placeholder="Libelle" name="addRight_label" >
			</div>
			<input type="submit" class="button" value="Ajouter le droit d'accès" name="addRight_submit">
		</div>
		<?php showInfo(); ?>
	</fieldset>
</form>