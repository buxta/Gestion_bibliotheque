<form method="POST" id="addTypeDocument" action="model/addTypeDocument_processing.php?<?=$_SERVER['QUERY_STRING']?>">
	<fieldset>
		<legend>Ajouter un type de document</legend>
		<div class="inputs">
			<div class="inputContainer">
				<input type="text" class="input" placeholder="Libelle" name="addTypeDocument_label" >
			</div>
			<div class="inputContainer">
				<select type="text" class="input" placeholder="Libelle" name="addTypeDocument_nbJourEmprunt" >
					<option value="">Durée maximum d'emprunt</option>
					<?php
						for ($i=1; $i < 16; $i++) { 
					?>
						<option value="<?=$i?>"><?=$i?> jours</option>
					<?php
						}
					?>
				</select>
			</div>
			<br>
			<div class="inputContainer">
			</div>
			<input type="submit" class="button" value="Ajouter le type de document" name="addTypeDocument_submit">
		</div>
		<?php showInfo(); ?>
	</fieldset>
</form>