<form id="spellCasting" name="spellCasting" action="" method="">
	<fieldset>
		<legend>Cast a spell&hellip;</legend>
		<p>
			<input id="type_offensive" name="spellType" type="radio" value="offensive" /> Offensive
			<br />
			<input id="type_defensive" name="spellType" type="radio" value="defensive" /> Defensive
		</p>
		<p>
			<select id="spell_element" name="spell_element">
				<option value="">-- Select an Element --</option>
				<option>Air</option>
				<option>Darkness</option>
				<option>Earth</option>
				<option>Fire</option>
				<option>Light</option>
				<option>Lunar</option>
				<option>Nature</option>
				<option>Water</option>
			</select>
		</p>
		<p>
			<button>Cast away!</button>
		</p>
	</fieldset>
</form>