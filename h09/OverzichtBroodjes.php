<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Overzicht broodjes</title>
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
    <h2>Broodjes weergeven</h2>
    <p>Globale informatie van de verschillende broodjes</p>
</div>
<div class="list">
    <table>
    <?php

    $user = "root";
    $pass = "0010345000";

    try {
        $db = new PDO('mysql:host=localhost;dbname=school', $user, $pass);
        $stm = $db->query('SELECT * FROM broodlist');
        $result = $stm->fetchAll();
        foreach ($result as $row) { ?>
            <tr class="list">
                <td><?= $row[2] ?></td>
                <td><?= $row[3] ?></td>
                <td><?= $row[4] ?></td>
                <td><a href="Details.php?id=<?= $row[0] ?>">Details</a></td>
            </tr>
        <?php
        }
        $dbh = null;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
    ?>
    </table>
</div>
</body>
</html>