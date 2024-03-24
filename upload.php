<?php

if (isset($_FILES['document'])) {

  $allowedTypes = array('application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/pdf');
  if (!in_array($_FILES['document']['type'], $allowedTypes)) {
    echo "<p>Tipul fisierului nu este permis.</p>";
    exit;
  }


  if ($_FILES['document']['size'] > 1048576) {
    echo "<p>Fisierul este prea mare.</p>";
    exit;
  }


  $fileName = uniqid() . '.' . pathinfo($_FILES['document']['name'], PATHINFO_EXTENSION);
  move_uploaded_file($_FILES['document']['tmp_name'], 'documents/' . $fileName);


  echo "<p>Fisierul a fost incarcat cu succes!</p>";
}

?>
