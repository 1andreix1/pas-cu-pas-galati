<?php
$uploadDirectory = 'uploads/'; // Directorul în care sunt salvate fișierele încărcate

$documents = scandir($uploadDirectory);
foreach ($documents as $document) {
    if ($document != '.' && $document != '..') {
        echo "<li><a href='$uploadDirectory$document'>$document</a></li>";
    }
}
?>
