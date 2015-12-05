<?php
	class SpellCatalog {
		private $current_spell;
		
		private $spell_list = array(
			"offensive" => array(
				"air" => array("name" => "thunderbolt", "icon" => "thunderbolt.gif"),
				"earth" => array("name" => "mud slide", "icon" => "mud-slide.gif"),
				"fire" => array("name" => "fireball", "icon" => "fireball.gif"),
				"lunar" => array("name" => "change form", "icon" => "change-form.gif"),
				"nature" => array("name" => "sleep flower", "icon" => "sleep-flower.gif"),
				"darkness" => array("name" => "evil gate", "icon" => "evil-gate.gif"),
				"water" => array("name" => "freeze", "icon" => "freeze.gif")
			),
			"defensive" => array(
				"air" => array("name" => "analyzer", "icon" => "analyzer.gif"),
				"earth" => array("name" => "speed up", "icon" => "speed-up.gif"),
				"fire" => array("name" => "blaze wall", "icon" => "blaze-wall.gif"),
				"light" => array("name" => "barrier", "icon" => "barrier.gif"),
				"lunar" => array("name" => "lunar boost", "icon" => "lunar-boost.gif"),
				"nature" => array("name" => "revive", "icon" => "revive.gif"),
				"water" => array("name" => "cure", "icon" => "water-cure.gif")
			)
		);
		
		private $element_list = array(
			"air",
			"darkness",
			"earth",
			"fire",
			"light",
			"lunar",
			"nature",
			"water"
		);
		
		private $type_list = array(
			"defensive", 
			"offensive"
		);

		# Selects a random spell
		public function randomSpell() {
			$spell_type = $this->type_list[array_rand($this->type_list)];
			$spell_element = $this->element_list[array_rand($this->element_list)];

			return array(
				"type" => $spell_type,
				"element" => $spell_element
			);
		}
		
		# Gets the information for a specific spell
		public function getSpell($spell_info) {
			$spell_type = $spell_info["type"];
			$spell_element = $spell_info["element"];

			$this->current_spell = $this->spell_list[$spell_type][$spell_element];
		}
		
		# Gets and displays a spell's information as well as saving to the $_SESSION
		public function castSpell($requested_spell) {
			$this->getSpell($requested_spell);

			if( empty($this->current_spell) ):
				echo $this->spellError();
			else:
				$spell = $this->current_spell;

				$_SESSION["spell_history"][] = $spell;

				echo "<h2>";
					for ($i=0;$i<3;$i++):
						echo "<img src='img/".$spell["icon"]."' alt='".$spell["name"]."' />";
					endfor;
					
					echo "&nbsp;&nbsp;".strtoupper($spell["name"])."!&nbsp;&nbsp;";
				
					for ($i=0;$i<3;$i++):
						echo "<img src='img/".$spell["icon"]."' alt='".$spell["name"]."' />";
					endfor;
				echo "</h2>";
			endif;
		}
		
		# Output for the recorded spell history
		public function showSpellHistory() {
			if ( !empty($_SESSION["spell_history"]) ):
				echo "<h3>Spell history:</h3><p id='btn_reset'><a href='?reset'>Reset History</a></p>";
				$flipped_history = array_reverse($_SESSION["spell_history"]);
				foreach($flipped_history as $cast_spell):
					echo "
							<div>
								<img src='img/".$cast_spell["icon"]."' alt='".$cast_spell["name"]."' />
								<h4>".ucwords($cast_spell["name"])."</h4>
							</div>
						";
				endforeach;
			endif;
		}
		
		# Simple error messaging
		public function spellError() {
			return "<h3 class='error'>Bad spell combo. Please try again.</h3>";
		}
		
		# Output all of the elements as options in a <select>
		public function showElements() {
			$element_options = "";

			foreach ( $this->element_list as $element ):
				$element_options .= "<option>".ucfirst($element)."</option>\n";
			endforeach;

			return $element_options;
		}
		
		# Output available spell types to choose from
		public function showTypes() {
			$type_options = "";
			
			foreach ( $this->type_list as $type ):
				$type_options .= "<label><input id='type_{$type}' name='spell_type' type='radio' value='{$type}' /> ".ucfirst($type)."</label>";
			endforeach;

			return $type_options;
		}

		# Empty out the spell history and refresh the page
		public function clearSpellHistory() {
			unset($_SESSION["spell_history"]);
			header("location: index.php");
		}
	}
?>