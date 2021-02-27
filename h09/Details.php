<?php?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Details</title>
    <link rel="stylesheet" href="OverzichtBroodjes.css">
</head>
<body>
<div class="logo">
    <img src="img/broodLogo.jpg">
    <h1>Bakkerij Vlecht Beheer</h1>
</div>
<div class="form">
    <a href="OverzichtBroodjes.php">Overzicht broodjes</a>
    <a href="BroodjesToevoegen.html">Broodjes toevoegen</a>
    <h2>Details van een broodje</h2>
    <p>Alle gegevens van dit heerlijke broodje</p>
</div>
<div class="list">
    <?php

    $user = "root";
    $pass = "0010345000";

    try {
        $dbh = new PDO('mysql:host=localhost;dbname=school', $user, $pass);
        foreach ($dbh->query('SELECT * FROM broodlist') as $row) { ?>
            <tr class="list">
                <td><?= print_r($row[0]) ?></td>
            </tr>
        <?php
        }
        $dbh = null;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
    ?>
</div>
</body>
</html>