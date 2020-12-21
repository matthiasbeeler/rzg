<?php
include_once '../db.php';


$was = $_POST['ws'];
$von = $_POST['von'];
$zeit = $_POST['zeit'];
$dist = $_POST['distanz'];
$staat = $_POST['staat'];
$gruend = $_POST['gruend'];
$aufent = $_POST['aufenthalt'];
$dat = $_POST['dat'];
$was_mach = $_POST['was'];
$geld = $_POST['geld'];


$data = [
    'was' => $was,
    'von' => $von,
    'zeit' => $zeit,
    'dist' => $dist,
    'staat' => $staat,
    'gruend' => $gruend,
    'aufent' => $aufent,
    'dat' => $dat,
    'was_m' => $was_mach,
    'geld' => $geld,
];

        $sql = "INSERT INTO orte (was, von, zeit, dist, staat, gruend, auenthalt, dat, was_machen) VALUES (:was, :von, :zeit, :dist, :staat, :gruend, :aufent, :dat, :was_m)";
        $stmt= $dbh->prepare($sql);
        $stmt->execute($data);
        header('Refresh: 0; URL =   index.html');
?>