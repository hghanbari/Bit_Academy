<?php
$id = $_GET['id'];

$db = new PDO('mysql:host=localhost;dbname=school', "root", "0010345000");

if ($id && !isset($_POST['update'])) {
    $stm = $db->prepare('SELECT * FROM broodlist WHERE id = ?');
    $stm->execute([$id]);
    $result = $stm->fetchAll()[0];
} else if ($id && isset($_POST['update'])) {
    $Omschrijving = $_POST["Omschrijving"];
    $Uitvoering = $_POST["Uitvoering"];
    $Categorie = $_POST["Categorie"];
    $stm = $db->prepare("UPDATE broodlist SET Omschrijving= '$Omschrijving' , Uitvoering ='$Uitvoering', Categorie= '$Categorie' WHERE id='$id'");
    $stm->execute();
    header('location:OverzichtBroodjes.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update</title>
    <link rel="stylesheet" href="BroodjesToevoegen.css">
</head>
<body>
<div class="logo">
    <img src="img/broodLogo.jpg">
    <h1>Bakkerij Vlecht Beheer</h1>
</div>

<form action="Update.php?id=<?= $id ?>" method="post" enctype="multipart/form-data" id="form" onsubmit="">
    <a href="OverzichtBroodjes.php">Overzicht broodjes</a>
    <a href="BroodjesToevoegen.html">Broodjes toevoegen</a>
    <div>
        <label>Bestanden:</label>
        <input type="file" name="Bestanden" multiple="multiple">
    </div>
    <div>
        <label>Omschrijving:</label>
        <input type="text" name="Omschrijving" value="<?= $result['Omschrijving'] ?>">
    </div>
    <div>
        <label>Uitvoering:</label>
        <input type="text" name="Uitvoering" value="<?= $result['Uitvoering'] ?>">
    </div>
    <div>
        <label>Categorie:</label>
        <input type="text" name="Categorie" value="<?= $result['Categorie'] ?>">
    </div>
    <div>
        <button name="update" type="submit">submit</button>
    </div>
</form>
</body>
</html>





