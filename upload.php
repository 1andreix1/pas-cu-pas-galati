<?php
$uploadDirectory = 'uploads/'; // Directorul în care vor fi salvate fișierele încărcate

if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $fileName = $_FILES['file']['name'];
    $tempFile = $_FILES['file']['tmp_name'];
    
    // Verificăm dacă fișierul există deja
    if (!file_exists($uploadDirectory . $fileName)) {
        move_uploaded_file($tempFile, $uploadDirectory . $fileName);
        echo 'Fișierul a fost încărcat cu succes!';
    } else {
        echo 'Fișierul există deja.';
    }
} else {
    echo 'Eroare la încărcarea fișierului.';
}
?>
