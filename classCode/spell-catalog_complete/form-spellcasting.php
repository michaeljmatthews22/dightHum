<form id="spell_casting" name="spell_casting" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	<fieldset>
		<legend>Cast a spell&hellip;</legend>
		<p>
			<?php echo $catalog->showTypes(); ?>
		</p>
		<p>
			<select id="spell_element" name="spell_element">
				<option value="">-- Select an Element --</option>
				<?php echo $catalog->showElements(); ?>
			</select>
		</p>
		<p><button id="cast_spell" name="cast_spell">Cast!</button></p>
		<p><button id="random_cast" name="random_cast">Random!</button></p>
	</fieldset>
</form>