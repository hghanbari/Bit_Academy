<?php
require_once 'db.php';


$score = 0;
$user = $_POST["user"];
$email = $_POST["email"];
$score = 0;

$s = "SElECT * FROM aanmelden WHERE name = '$user' AND email = '$email'";
$result = mysqli_query($db, $s);
$num = mysqli_num_rows($result);

if ($num == 1) {
        //save game
    $_SESSION["loggedin"] = $email;
    header('location: ../schoolTileDemoo.json-master/index.html');
}

$check = mysqli_query($db, "SElECT * FROM aanmelden WHERE email = '$email'");
$emailCheck =mysqli_num_rows($check);

if ($emailCheck == 0) {
        //new account
    $reg = "INSERT INTO aanmelden(name, email,score) values ('$user','$email','$score') ";
    mysqli_query($db, $reg);
    header('location: ../schoolTileDemoo.json-master/index.html');
    } else {
    echo "error";
}












?>