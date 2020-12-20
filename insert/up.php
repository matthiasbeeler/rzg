<?php
include_once '../db.php';

$data = [
    'was' => $_POST['was'],
    'von' => $_POST['von'],
    'zeit' => $_POST['zeit'],
    'dist' => $_POST['distanz'],
    'staat' => $_POST['staat'],
    'gruend' => $_POST['gruend'],
    'aufent' => $_POST['aufenthalt'],
    'dat' => $_POST['dat'],
];

$sql = "INSERT INTO orte (was, von, zeit, dist, staat, gruend ,aufenthalt, dat) VALUES (:was, :von, :zeit, :dist, :staat, :gruend, :aufent, :dat)";
$stmt= $dbh->prepare($sql);
$res = $stmt->execute($data);

?>