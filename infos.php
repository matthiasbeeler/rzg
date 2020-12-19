<?php
include_once 'db.php';

$id = $_POST['sub'];

$stmt = $pdo->prepare("SELECT * FROM orte WHERE id=?");
$stmt->execute([$id]); 
$user = $stmt->fetch();
