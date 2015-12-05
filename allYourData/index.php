<html>
<head>
	<meta charset="utf-8" />
			<title> All Your Data </title>
		<link rel="stylesheet" href="css/label.css">
</head>
	<body>
		<h1> All Your Data </h1>
	</body>
	<section>

	<h2> Books </h2>
	<table border="1">
		<tr>
			<th>UniqueIdentifier</th><th>Name</th><th>Stock</th>
		</tr>
		<tr>
			<td>1</td><td>Why Witches Melt</td><td>2</td>
		</tr>
		<tr>
			<td>2</td><td>The Doom of Middle Earth</td><td>104</td>
		</tr>
		<tr>
			<td>3</td><td>Warts, Frogs, and Soup</td><td>0</td>
		</tr>
	</table>
	<br>
	CREATE TABLE Books (
		UniqueIdentifier INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		Name VARCHAR(30) NOT NULL,
		Stock INT(30)
	);
	<br>
	<br>
	INSERT INTO Books (Name, Stock)
	VALUES ("Why Witches Melt", 2);
	<br>
	<br>
	INSERT INTO Books (Stock, Name)
	VALUES (104, "The Doom of Middle Earth");
	<br>
	<h2> Magical Items </h2>
	<table border="1">
		<tr>
			<th>UniqueIdentifier</th><th>Name</th><th>Stock</th><th>Perks</th>
		</tr>
		<tr>
			<td>1</td><td>Magic Cloak</td><td>24</td><td>Turn Invisible</td>
		</tr>
		<tr>
			<td>2</td><td>Time Clock</td><td>66</td><td>Go back in time</td>
		</tr>

	</table>
	<br>
	CREATE TABLE MagicalItems (
		UniqueIdentifier INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		Name VARCHAR(30) NOT NULL,
		Stock INT(30),
		Perks VARCHAR(60)
	);
	<br>
	<br>
	INSERT INTO MagicalItems (Name, Stock, Perks)
	VALUES ("Magic Cloak", 24, "Turn Invisible");
	<br>
	<br>
	INSERT INTO MagicalItems (Perks, Name, Stock)
	VALUES ("Go back in time", "Time Clock", 66);
	<br>
	<h2> Potions </h2>
	<table border="1">
		<tr>
			<th>id</th><th>Title</th><th>Stock</th><th>Effects</th>
		</tr>
		<tr>
			<td>1</td><td>Love Potion</td><td>98</td><td>Has anyone fall in love</td>
		</tr>
		<tr>
			<td>2</td><td>Strength Potion</td><td>14</td><td>Gives you super strength</td>
		</tr>

	</table>
	<br>
	CREATE TABLE Potions (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		Title VARCHAR(30) NOT NULL,
		Stock INT(30),
		Effects VARCHAR(90)
	);
	<br>
	<br>
	INSERT INTO Potions (Title, Stock, Effects)
	VALUES ("Love Potion", 98, "Has anyone fall in love");
	<br>
	<br>
	INSERT INTO Potions (Stock, Title, Effects)
	VALUES (14, "Strength Potion", "Gives you super strength");
	<br>

</section>
</html>