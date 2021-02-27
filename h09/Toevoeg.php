<?php

require_once '../engine/db.php';


$Omschrijving = $_POST["Omschrijving"];
$Uitvoering = $_POST["Uitvoering"];
$Categorie = $_POST["Categorie"];

//print_r($_FILES);
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["Bestanden"]["name"]);
if (move_uploaded_file($_FILES["Bestanden"]["tmp_name"], $target_file)) {
    $s = "INSERT INTO broodlist  (Bestanden , Omschrijving , Uitvoering , Categorie)  values ('$target_file', '$Omschrijving','$Uitvoering','$Categorie')";
    mysqli_query($db, $s);
    header('location:OverzichtBroodjes.php');
} else {
    echo "Sorry, there was an error uploading your file.";
}




