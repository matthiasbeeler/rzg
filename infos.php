<?php
include_once 'db.php';

$id = $_POST['sub'];

$stmt = $dbh->prepare("SELECT * FROM orte WHERE id=?");
$stmt->execute([$id]); 
$user = $stmt->fetch();
echo $user['was'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3><a href="index.php">Back</a></h3>
    <center><h1><?php echo $user['was']; ?></h1></center>
    <h2>Fahrt: <?php echo $user['zeit']; ?></h2>
    <h2>Distanz: <?php echo $user['dist']; ?></h2>
    <img src="routes/<?php echo $user['was']; ?>.png" alt="">
</body>
</html>