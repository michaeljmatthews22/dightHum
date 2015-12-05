<?php
	class Stone {
		public $size;
		
		
		public function __construct(){
		
			$random = rand(1,4);
			
			echo "<h3>A new "._CLASS_." has been intiliazed.</h3>";
			
			$this->setSize($random);
			$this->displayStone();
		
		}
		
		public function __destruct(){
		
		
			echo "<h3> A size ".$this->getSize()." has been destroyed.</h3>";
		
		}
		
		

		public function getSize() {
			return $this->size;
		}

		public function setSize($new_size = 1) {
			if ( $new_size > 4 ):
				$this->size = 1;
			else:
				$this->size = $new_size;
			endif;
		}

		public function displayStone() {
			echo '<p class="stone-'.$this->getSize().'"></p>';
		}

		public function displayAction($action) {
			switch ( $action ):
				case "potion":
					echo '<p class="potion"></p>';
					break;

				default:
					echo '<p class="unknown">X</p>';
					break;
			endswitch;
		}

		public function usePotion() {
			$new_size = $this->getSize() + 1;

			$this->displayAction("potion");

			$this->setSize($new_size);

			$this->displayStone();
		}
	}
?>