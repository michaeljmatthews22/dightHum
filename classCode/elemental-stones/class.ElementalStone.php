<?php
	class ElementalStone extends Stone {
		public	$color = array("",""),
				$valid_colors = array("red", "blue", "yellow");

		public function getColor() {
			$color = implode(" ", $this->color);
			
			return $color;
		}

		public function setColor($new_color = "") {
			array_push($this->color, $new_color);
			
			if ( count($this->color) > 2 ):
				array_shift($this->color);
			endif;
		}

		public function displayStone() {
			echo '<p class="stone-'.$this->getSize().' '.$this->getColor().'"></p>';
		}

		public function displayAction($action) {
			switch ( $action ):
				case "red":
				case "yellow":
				case "blue":
					echo '<p class="magic '.$action.'"></p>';
					break;

				case "potion":
					echo '<p class="potion"></p>';
					break;

				default:
					echo '<p class="unknown">X</p>';
					break;
			endswitch;
		}

		public function useMagic($type) {
			if ( in_array($type, $this->valid_colors) ):
				$this->displayAction($type);

				$this->setColor($type);
				$this->displayStone();
			else:
				$this->displayAction();

				$this->setColor();
				$this->displayStone();
			endif;
		}

		public function randomAction() {
			$random = rand(0,3);
			
			switch ($random):
				case 3:
					$this->usePotion();
					break;
					
				default:
					$this->useMagic($this->valid_colors[$random]);
					break;
			endswitch;
		}
	}
?>