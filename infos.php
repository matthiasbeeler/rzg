<?php
include_once 'db.php';

$id = $_POST['sub'];

$stmt = $pdo->query("SELECT * FROM orte WHERE id = $id");
$user = $stmt->fetch();
echo $user['was'];