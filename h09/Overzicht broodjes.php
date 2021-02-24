<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Overzicht broodjes</title>
    <link href="OverzichtBroodjes.css">
</head>
<body>
<div class="logo">
    <img src="img/broodLogo.jpg">
    <h1>Bakkerij Vlecht Beheer</h1>
</div>
<a href="Overzicht%20broodjes.php">Overzicht broodjes</a>
<a href="BroodjesToevoegen.html">Broodjes toevoegen</a>
<h1>Broodjes weergeven</h1>
<h3>Globale informatie van de verschillende broodjes</h3>
<div class="list">
    <?php


    $user = "root";
    $pass = "0010345000";

    try {
        $dbh = new PDO('mysql:host=localhost;dbname=school', $user, $pass);
        foreach ($dbh->query('SELECT * from broodlist') as $row) {
            print_r($row);
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