<?php

session_start();
class LabelGenerator {

	//randomize whether it is a dictator or artist based on user input
	public function randomizeType($type){
		if ($type == "artist"){

			$artistType = array(
				array(" Claude Monet!", " His speciality was depicting contemporary subject"),
                array(" Camille Pissarro!", " His speciality was using comma-like brush-strokes"),
                array(" Eugene Delacroix!"," His speciality was creating an optical effects of colour"),
                array(" John Constable!"," His speciality was showing natural tones and vibrant greens"),
                array(" Diego Velazquez!"," His speciality was demonstrating mastery of perspective"),
                array(" Adriaen Brouwer!", " His speciality was the ability to recreate psychological important moments")
			);

			$random = rand(0,5);
			$return = $artistType[$random][0];
			$return2 = $artistType[$random][1];

			$_SESSION["pastHistory"] .= $return;
			$_SESSION["pastHistory"] .= $return2;
			$_SESSION["pastHistory"] .= "<br>";
			echo $return;
			echo $return2;
		}
		else
		{
			$rulerType = array(
		
			array(" Fidel Castro ", " Fidel Castro is one of the two faces of the Cuban Revolution which started around the year 1953. He went on to become the President and the Prime Minister of Cuba in the years after the Cuban Revolution. He devised and put into action the entire Cuban Revolution during which he had to face many problems, crisis and also many attempts of assassination. His vision, courage and strategic analytic reasoning has gotten Cuba where it stands today. He has proved to be, over the years, a great leader and a great Commander."),
			array(" Che Guevara ",  " Ernesto ‘Che’ Guevara, better known as El Che or Che Guevara was an Argentine revolutionary who was, along with Castro, the main man of the Cuban Revolution. He was a trained doctor and a guerilla warfare leader. After finishing his education as a doctor, he took a trip across South America with his friend and it was on the trip that he thought of a revolution, having seen the sorry state of the people in every country. His compassion, charisma, and the love for doing good for others is what attracted so many people towards him. Today, he has become a symbol of rebellion and he right deserves to be so. "),
			array(" Alexander, The Great ", " Known as the Man Who Conquered The World, Alexander the Great is often said to be the greatest military leader of all time. He was born in 356 BC and by the age of 33, he had the largest empire in the history which stretched from Greece to Egypt to India. He was the king of the Kingdom of Macedonia and perhaps, he was the greatest military commander to have ever lived. He did the noble deed of unifying many Greek city states. He was undefeated in battle and succumbed to malaria and died in 323 BC. His fortes were his foresight, vision and military capabilities. "),
			array(" Winston Churchill ", " The most crucial and the most important time for a leader to show their true worth is in the face of adversity and Winston Churchill managed to shine at the task. He was the British Prime Minister and leader during the WW II. He was an able leader, an emotional man but his greatest victory was in his motivation for others to defend themselves against the Nazis. His determination, perseverance and the patriotic devotion towards the nation motivated the Britishers to go forward and win the war with the help of the Allies. ‘Keep Calm And Carry On’, he said, and won the war and the hearts. "),
			array(" George Washington ", " The Founding father of The United States Of America, George Washington, is till date one of the greatest leaders that we have ever seen. He led the American Revolution and later, led USA into the first few years of it’s independence as the First President of USA. He was a visionary and he had immense vision for America which has led America to become the super power it is today. His tenacity, steadfastness, his ability to make decisions during difficult times made him a great leader and he led many people to success. "),
			array(" Nelson Mandela", " No one needs an introduction for this great man. Nelson Mandela was the first democratically elected President of South Africa. He was the leader and the face of the Anti- Apartheid movement and all through his life, he relentlessly fought against racial discrimination. For his actions, he served a long prison sentence but even that did not deter him. He came out as a hero and led the country into a free, equal future. His determination, focus and will-power were tremendous that even after serving almost 30 years in jail, he got out and worked again for what was right.")
			);

			$random = rand(0,5);
			$return = $rulerType[$random][0];
			$return2 = $rulerType[$random][1];
			echo $return;
			echo $return2;


			$_SESSION["pastHistory"] .= $return;
			?><br><br><?
			$_SESSION["pastHistory"] .= $return2;
			$_SESSION["pastHistory"] .= "<br>";
		}
	}

	//randomizing whether what country the potion was made in
	public function randomizeLocation($location){
		if ($location == "North America"){

			$northAmerica = array(
			array (" USA"),
			array (" Canada"),
			array (" Mexico")
		);

			$random = rand(0,2);
			$return = $northAmerica[$random][0];
			$_SESSION["pastHistory"] .= $return;
			$_SESSION["pastHistory"] .= "<br>";
			$_SESSION["pastHistory"] .= "<br>";
			echo $return;
		
		}
		elseif ($location == "South America"){

			$southAmerica = array(
				array(" Brazil"),
				array(" Chile"),
				array(" Argentina"),
				array(" Peru"),
				array(" Colombia")
		
		);
			$random = rand(0,4);
			$return = $southAmerica[$random][0];
			echo $return;
	
			$_SESSION["pastHistory"] .= $return;
			$_SESSION["pastHistory"] .= "<br>";
			$_SESSION["pastHistory"] .= "<br>";


		}

	}

}


?>
