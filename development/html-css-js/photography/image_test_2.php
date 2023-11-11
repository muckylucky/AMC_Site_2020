<?php
function getImages($dir) {
    $images = array();

    $iterator = new DirectoryIterator($dir);

    foreach ($iterator as $fileInfo) {
        if ($fileInfo->isFile() && in_array($fileInfo->getExtension(), ['gif', 'jpg', 'png'])) {
            $images[] = $fileInfo->getFilename();
        }
    }

    return $images;
}

$baseDirectory = 'December/';

$imagesArray = getImages($baseDirectory);

$jsArray = json_encode($imagesArray);

$html = '<!DOCTYPE html>
<html>
<head>
    <title>Image List</title>
</head>
<body>
    <h1>Image List x</h1>
    <ul>';

foreach ($imagesArray as $imageName) {
    $html .= '<li><img src="' . $baseDirectory . $imageName . '" alt="' . $imageName . '" width="200"></li>';
}
echo $baseDirectory;
$html .= '   </ul>
    <script>
        var imagesArray = ' . $jsArray . ';
        console.log(imagesArray);
    </script>

</body>
</html>';

echo($html);

/*
$file = fopen('image_list.html', 'w');
fwrite($file, $html);
fclose($file);
*/
echo 'Array of image filenames and image list have been written to image_list.html';

?>