<?php
include_once '../db.php';



$sql = "INSERT INTO orte (was, von, zeit, dist, staat, gruend ,aufenthalt, dat) VALUES (:was, :von, :zeit, :dist, :staat, :gruend, :aufent, :dat)";
$stmt= $dbh->prepare($sql);
$res = $stmt->execute();

?>