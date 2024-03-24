<?php
// upload.php - Script PHP pentru încărcarea fișierelor pe server

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["file"])) {
    $targetDirectory = "uploads/"; // Directorul în care să fie salvate fișierele încărcate
    $targetFile = $targetDirectory . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Verificați dacă fișierul există deja
    if (file_exists($targetFile)) {
        echo "Fișierul există deja.";
        $uploadOk = 0;
    }

    // Verificați dimensiunea fișierului (aici am setat o limită de 5 MB)
    if ($_FILES["file"]["size"] > 5 * 1024 * 1024) {
        echo "Fișierul este prea mare.";
        $uploadOk = 0;
    }

    // Permiteți anumite formate de fișiere (aici, pdf, doc și docx)
    if ($fileType !== "pdf" && $fileType !== "doc" && $fileType !== "docx") {
        echo "Sunt permise doar fișiere PDF, DOC și DOCX.";
        $uploadOk = 0;
    }

    // Încărcați fișierul dacă nu există erori
    if ($uploadOk === 0) {
        echo "Fișierul nu a fost încărcat.";
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
            echo "Fișierul " . htmlspecialchars(basename($_FILES["file"]["name"])) . " a fost încărcat.";
        } else {
            echo "A apărut o eroare la încărcarea fișierului.";
        }
    }
}
?>
