<?php
	// On génère la liste des documents de référence
	$document = new Document;
	$documents = $document->getList();

?>
<form method="POST" id="borrowDocument" action="model/borrowDocument_processing.php">
	<fieldset>
		<legend>Emprunter un document</legend>
		<div class="inputs">
			<div class="inputContainer">
				<select type="text" class="input" placeholder="Code" name="borrowDocument_idDocument" >
					<option value="">Extrait de (facultatif)</option>
					<?php
						foreach ($documents as $document) {
							if($document->)
					?>
					<option value="<?=$document->getIdDocument()?>"><?=$document->getTitre()?></option>
					<?php
						}
					?>
				</select>
			</div>
			<br>			
			<div class="inputContainer">
				<label for="addDocument_aEmporter">Peut être emporté à domicile</label><input class="block" type="checkbox" name="addDocument_aEmporter" id="addDocument_aEmporter" value="1">
			</div>
			<input type="submit" class="button" value="Ajouter un document" name="addDocument_submit">
			<br>
			<div class="formInfo">Tous les champs sont obligatoires</div>
		</div>
	<?php showInfo(); ?>
	</fieldset>
</form>