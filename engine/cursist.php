<?php


$user = "root";
$pass = "0010345000";

try {
    $dbh = new PDO('mysql:host=localhost;dbname=school', $user, $pass);
    foreach($dbh->query('SELECT * from cursist') as $row) {
        print_r($row);
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>