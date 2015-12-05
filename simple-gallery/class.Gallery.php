<?php
	class Gallery {
		# List of acceptable image types and extensions
		private static $imageTypes = array(
			'image/jpeg' => "jpeg",
			'image/gif' => "gif",
			'image/png' => "png"
			);

		# T/F check if current image upload file type is valid
		static function filetypeCheck($filetype) {
			if ( array_key_exists($filetype, self::$imageTypes) ):
				return true;
			else:
				return false;
			endif;
		}

		# New image upload w/ thumbnail creation
		static function newGalleryImage($image) {
			# Grab filename and image type from upload
			$file_ext = self::$imageTypes[$image['type']];
			$filename = $image['name'];

			# Upload of image
			copy($image['tmp_name'],"gallery_images/".$filename);

			# Grabs file suffix for variable function calls
			$function_suffix = strtoupper($file_ext);

			# Variable read/write functions for image creation
			$function_to_read = 'ImageCreateFrom' . $function_suffix;     
			$function_to_write = 'Image' . $function_suffix;

			# Determine the file size and create a proportionally sized thumbnail
			$size = GetImageSize("gallery_images/" . $filename);
			if($size[0] > $size[1]):
				$thumbnail_width = 200;
			$thumbnail_height = (int)(200 * $size[1] / $size[0]);
			else:
				$thumbnail_width = (int)(200 * $size[0] / $size[1]);    
			$thumbnail_height = 200;    
			endif;

			$source_handle = $function_to_read("gallery_images/" . $filename);
			if ($source_handle):
				$destination_handle =     
			ImageCreateTrueColor($thumbnail_width, $thumbnail_height);     

			ImageCopyResampled($destination_handle, $source_handle,     
				0, 0, 0, 0, $thumbnail_width, $thumbnail_height, $size[0], $size[1]);     
			endif;     

			$function_to_write($destination_handle, "gallery_images/tb/" . $filename);
		}

		static function galleryDisplay() {
			$files = glob("gallery_images/tb/*.*");

			if(count($files)):
				for ($i=0, $ii = count($files); $i<$ii; $i++):
					$image = $files[$i];

					echo "<figure><img src='$image'></figure>";
				endfor;
			else:
				echo "<p>No images in the gallery</p>";
			endif;
		}
	}
?>