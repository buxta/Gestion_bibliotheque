	<form method"get" action="model/search_processing.php">
		<fieldset>
			<legend>Rechercher un Document</legend>  
			<div class="inputs">
				<div class="inputContainer">
	       			<input name="search_content" class="input" type="text">
	       		</div>  		
				<input class="button" type="submit" value="rechercher" name="search_submit">
			</div>
		</fieldset>
		<?php showinfo(); ?>
	</form>