<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Web Projects</title>
<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Cuprum' rel='stylesheet' type='text/css' />

<!--[if lte IE 7]>
<link rel="stylesheet" type="text/css" href="ie7.css" />
<![endif]-->
<!--[if lte IE 6]>
<link rel="stylesheet" type="text/css" href="ie7.css" />
<![endif]-->
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
        
        <ul id="phot_links">
    		<li><a href="lot_1">Lot one</a></li>
    		<li><a href="lot_2">Lot two</a></li>
            <li><a href="lot_3">Lot three</a></li>
            <li><a href="lot_4">Lot four</a></li>
            <li><a href="lot_5">Lot five</a></li>
            <li><a href="lot_6">Lot six</a></li>
            <li><a href="lot_7">Lot seven</a></li>
            <li><a href="lot_8">Lot eight</a></li>
            <li><a href="lot_9">Lot nine</a></li>
            <li><a href="lot_10">Lot ten</a></li>
            <li><a href="lot_11">Lot eleven</a></li>
            <li><a href="lot_12">Lot twelve</a></li>
            <li><a href="lot_13">Lot thirteen</a></li>
        </ul>
        
    	<div id="photo_viewer">
        	
            

				<?php
                	$set = "lot_1"; // Value set as default for intial load
					$defaultMainImage = "001.jpg"; // See above ^
					$defaultMainImagePath = $set . "/large/001.jpg"; // Get full image url
                    $imgArray = array();
					$defaultImageSize = getimagesize($defaultMainImagePath); // Get dimensions of main image - saves on browser 'painting' time
					
					/* Check to see if set variable has been defined - it won't have on initial load */
					if (isset($_GET['set']) ) {
						$set = $_GET['set'];
						$defaultMainImagePath = $set . "/large/001.jpg"; // Construct full image path
						$defaultImageSize = getimagesize($defaultMainImagePath); // Get image dimensions
					} 
										
					echo '<div id="photo_thumbs_wrapper">'; // Open the thumbnail wrapper.
					
                    /* Open aspecified directory, and proceed to read its contents to generate the thumbnails
					   Will grab all images of jpg or gif type
					*/
                    foreach(glob($set . "/thumb/{*.jpg,*.gif}", GLOB_BRACE) as $image)
                    {
                        $split = explode('/', $image); // Split image path to get filename
                        $img = $split[2];
                        array_push($imgArray, $set . '/thumb/' . $image); // Store images in an array in case needed for later development/refinement
                        $size = getimagesize($set . '/thumb/' . $img); // Get each thumbnails size. Should all be same but you never know
                        echo '<a href="photography/' . $set . '/large/' . $img . '" target="blank"><img src="photography/' . $set . '/thumb/' . $img . '" class="photo_thumbs" alt="image thumbnail" width="' . $size[0] . '" height="' . $size[1] . '"/></a>'; //Output the html for thumbnail
                    }
                	echo '</div><!--END THUMBS WRAPPER-->';					
					
					echo '<img id="main_photo" src="photography/' . $defaultMainImagePath . '" width="' . $defaultImageSize[0] . '" height="' . $defaultImageSize[1] . '" alt="Main image" />'; // Display main image


                ?>
		</div><!--END PHOT VIEWER-->
      </div><!--END CONTENT-->
	</div><!--END WRAPPER -->
</body>
</html>