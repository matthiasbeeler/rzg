<?php
include_once 'db.php';

$id = $_POST['sub'];

$stmt = $dbh->prepare("SELECT * FROM orte WHERE id=?");
$stmt->execute([$id]); 
$user = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="infos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3><a href="index.php">Back</a></h3>
    <center><h1><?php echo $user['von']; ?> - <?php echo $user['was']; ?></h1></center>
    <h2>Fahrt: <?php echo $user['zeit']; ?>h</h2>
    <h2>Distanz: <?php echo $user['dist']; ?>km</h2>
    <img src="routes/<?php echo $user['was']; ?>.png" alt="">
    <center><h1><?php echo $user['was']; ?></h1>
        <h3><?php echo $user['dat']; ?></h3></center>
    <h2>Staat: <?php echo $user['staat']; ?></h2>
    <h2>Gründung: <?php echo $user['gruend']; ?></h2>
    <h2>Aufenthaltszeit: <?php echo $user['aufenthalt']; ?></h2>
</body>
</html>