<?php


$iterator = new DirectoryIterator('../photography/');

echo '<ul id="phot_links">';
foreach ($iterator as $fileinfo) {
    if ($fileinfo->isDir() && $fileinfo != '.' && $fileinfo != '..' && $fileinfo != '_notes') {
        echo '<li><a href="photography.php?set=' . $fileinfo->getFilename() .'" >' . $fileinfo . '</a></li>';
    }
}
echo '</ul>';
?>