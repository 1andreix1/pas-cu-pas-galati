<?php
// documents.php - Script PHP pentru afișarea listei de documente disponibile pe server

$targetDirectory = "uploads/"; // Directorul în care sunt stocate fișierele încărcate

// Obțineți lista fișierelor din director
$files = glob($targetDirectory . "*");

// Afișați lista de fișiere ca linkuri
foreach ($files as $file) {
    if (is_file($file)) {
        echo "<li><a href='" . $file . "' download>" . basename($file) . "</a></li>";
    }
}
?>
