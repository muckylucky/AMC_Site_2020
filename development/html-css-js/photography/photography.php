<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Photography</title>
<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Cuprum' rel='stylesheet' type='text/css' />
<script type="text/javascript" src="../scripts/jquery.js"></script>
<style>
html,
body,
.section-images {
  height: 100%;
  margin: 0;
}
.photo_viewer {
  margin: auto 2em;
  text-align: center;
}
img#main_img {
  display: block;
  width: 100%;
  height: 100vh;
  object-fit: cover; 
}

</style>
</head>

<body>
	<?php include_once("../includes/analyticstracking.php") ?>

	<div id="wrapper"><!-- END CONTENT -->
        <div id="nav_left">
        	<a href="index.php"><img src="images/logo_header_grey.png" alt="Logo of Andrew McCluckie" width="210" height="72" /></a>
        	<ul>
            	<li><a href="#">About</a></li>
            	<li><a href="#">Work</a></li>
            	<li><a href="#">Photography</a></li>
            	<li><a href="#">Contact</a></li>
            </ul>
        </div><!--End nav_left-->
        
        <div id="header">
        	<ul id="header_links">
            	<li><a href="#">linky</a></li>
            	<li><a href="#">linky</a></li>
            	<li><a href="#">linky</a></li>
            </ul>
        </div>  <!--End header-->

      <div id="content">
   		<h1>Photography</h1>
        <?php include("build_links.php");?>

        
    	<div id="photo_viewer">
        	
            

				<?php

                	$set = "December"; // Value set as default for intial load
					$defaultMainImage = "001.jpg"; // See above ^
					$thumbs_folder = '/img_thumb/';
					$main_folder = '/img_main/';
					$defaultMainImage = "001.jpg"; // Get full image url
                    $imgArray = array();
                    echo $defaultMainImagePath ;
					$defaultImageSize = getimagesize($set . $main_folder . $defaultMainImage 	); // Get dimensions of main image - saves on browser 'painting' time
					
					/* Check to see if set variable has been defined - it won't have on initial load */
					if (isset($_GET['set']) ) {
						$set = $_GET['set'];
						$defaultMainImagePath = $set . $set . $main_folder . $defaultMainImage; // Construct full image path
						$defaultImageSize = getimagesize($defaultMainImagePath); // Get image dimensions
					} 
										
					echo '<div id="photo_thumbs_wrapper">'; // Open the thumbnail wrapper.
					
                    /* Open aspecified directory, and proceed to read its contents to generate the thumbnails
					   Will grab all images of jpg or gif type
					*/
					
                    foreach(glob($set . $thumbs_folder . "{*.jpg,*.gif}", GLOB_BRACE) as $image)
                    {
                        $split = explode('/', $image); // Split image path to get filename
                        $img = $split[2];
                        array_push($imgArray, $set . '/img_thumb/' . $image); // Store images in an array in case needed for later development/refinement
                        $size = getimagesize($set . '/img_thumb/' . $img); // Get each thumbnails size. Should all be same but you never know
                        echo '<a href="photography/' . $set . $main_folder . $img . '" target="blank"><img src="' . $set . $thumbs_folder . $img . '" class="photo_thumbs" alt="image thumbnail" width="' . $size[0] . '" height="' . $size[1] . '"/></a>'; //Output the html for thumbnail
                    }
                	echo '</div><!--END THUMBS WRAPPER-->';					
					
					echo '<img id="main_photo" src="' . $set . $main_folder . $defaultMainImage . '" width="' . $defaultImageSize[0] . '" height="' . $defaultImageSize[1] . '" alt="Main image" />'; // Display main image


                ?>
		</div><!--END PHOT VIEWER-->
      </div><!--END CONTENT-->
	</div><!--END WRAPPER -->

<script>
    $(function(){
        function photography($target,$image) {
        	var $target = $target || $('#main_photo');
        	var $links = $('#photo_thumbs_wrapper').find('a');
        	$links.click(function(e){
        		e.preventDefault();
        		var $URLstring = $(this).attr('href').split('/').slice(-1)[0];
        		console.log($URLstring);
        	});
        	console.log($target);
        }
        photography();
    })
</script>
</body>
</html>