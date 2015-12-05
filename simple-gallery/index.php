<?php
	# Making sure that we bring in our Gallery class
	require "class.Gallery.php";

	# Checking to see if the form was completed and a file was selected
	if ( !empty($_POST) && !empty($_FILES) ):
		# Check for a valid file type
		if ( Gallery::filetypeCheck($_FILES["uploadImage"]["type"]) ):
			# Upload the image and indicate success
			Gallery::newGalleryImage($_FILES["uploadImage"]);
			$status = "success";
		else:
			# Bad file type or other failure
			$status = "failure";
		endif;

		# Redirect to same page; trigger page refresh
		header("location: index.php?status=$status");
	endif;
?><!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="gallery.css">
	<title>Simple Gallery</title>
</head>
<body>
	<div class="clearfix">
		<?php 
			switch($_GET["status"]):
				case "success":
					echo "<p class='success'>Image upload completed</p>";
					break;

				case "failure":
					echo "<p class='error'>Image upload failed</p>";
					break;

				default:
					break;
			endswitch;
		?>
		<section id="gallery">
			<?php Gallery::galleryDisplay(); ?>
		</section>
		<form id="galleryAddition" name="galleryAddition" method="post" enctype="multipart/form-data">
			<fieldset>
				<p>
					<label for="uploadImage">Image to upload:</label>
					<input id="uploadImage" name="uploadImage" type="file" required />
				</p>

				<p><input id="btn_submit" name="btn_submit" type="submit" value="Add Image" /></p>
			</fieldset>
		</form>
	</div>
</body>
</html>