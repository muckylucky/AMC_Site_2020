<?php

/*
$path = realpath('photography/');

$objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::SELF_FIRST);
foreach($objects as $name => $object){
    echo "$name\n";
}*/

$scan = scandir('photography/');
var_dump($scan);

echo '<ul>';
foreach($scan as $file) {
	echo 'Type: ' . filetype($file);
   if (is_dir($file)) {
      echo '<li><a href="photography/"' . $file. '" >' . $file . '</a></li>';
   } else if (!is_dir($file)) {
   		echo '<li>Dir: ' . $file.'</li>';
   }
   
}
echo '<ul>';

if (is_dir("photography/jquery.js")) {
	echo 'TRUE';
} else {
	echo 'FALSE';
}

/*
foreach (new DirectoryIterator('photography/') as $fileInfo) {
    if($fileInfo->isDot()) continue;
    if (is_dir($fileInfo)) {
    	echo $fileInfo->getFilename() . "<br>\n";
    }
}*/

$iterator = new DirectoryIterator('photography/');

echo '<ul>';
foreach ($iterator as $fileinfo) {
    if ($fileinfo->isDir() && $fileinfo != '.' && $fileinfo != '..' && $fileinfo != '_notes') {
        echo '<li><a href="photography/photography.php?set=' . $fileinfo->getFilename() .'" >' . $fileinfo . '</a></li>';
    }
}
echo '</ul>';
?>