<?php
	// On génère la liste de types de documents
	$typeDocument = new TypeDocument;
	$listTypesDocument = $typeDocument->getList();

	// On génère la liste des documents de référence
	$document = new Document;
	$documents = $document->getList();

?>
<form method="POST" id="addDocument" action="model/addDocument_processing.php?<?=$_SERVER['QUERY_STRING']?>">
	<fieldset>
		<legend>Ajouter un document</legend>
		<div class="inputs">
			<div class="inputContainer">
				<input type="text" class="input" placeholder="Titre" name="addDocument_titre" >
			</div>
			<div class="inputContainer">
				<input type="text" class="input" placeholder="Code" name="addDocument_code" >
			</div>
			<br>
			<div class="inputContainer">
				<select type="text" class="input" placeholder="Code" name="addDocument_type" >
					<option value="">Type de document</option>
					<?php
						foreach ($listTypesDocument as $typeDocument) {
					?>
					<option value="<?=$typeDocument->getIdTypeDocument()?>"><?=$typeDocument->getLibelle()?></option>
					<?php
						}
					?>
				</select>
			</div>
			<div class="inputContainer">
				<select type="text" class="input" placeholder="Code" name="addDocument_documentRef" >
					<option value="">Extrait de (facultatif)</option>
					<?php
						foreach ($documents as $document) {
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