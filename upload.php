<?php

// Directorul în care se vor salva fișierele încărcate
$uploadDirectory = 'uploads/';

// Verifică dacă fișierul a fost încărcat cu succes
if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
    // Generează un nume de fișier unic
    $filename = uniqid() . '_' . basename($_FILES['file']['name']);
    // Muta fișierul încărcat în directorul de încărcare
    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadDirectory . $filename)) {
        // Returnează URL-ul și numele fișierului pentru a fi utilizate în JavaScript
        echo json_encode(['url' => $uploadDirectory . $filename, 'name' => basename($_FILES['file']['name'])]);
    } else {
        // Încărcarea a eșuat
        http_response_code(500);
    }
} else {
    // Încărcarea a eșuat
    http_response_code(500);
}

?>
