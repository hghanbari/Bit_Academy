<?php
require_once '../engine/db.php';

$Bestanden = $_POST["Bestanden"];
$Omschrijving = $_POST["Omschrijving"];
$Uitvoering = $_POST["Uitvoering"];
$Categorie = $_POST["Categorie"];

$s = "INSERT INTO broodlist  (Bestanden , Omschrijving , Uitvoering , Categorie)  values ('$Bestanden', '$Omschrijving','$Uitvoering','$Categorie')";

mysqli_query($db, $s);