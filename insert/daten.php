<a href="index.html">Back</a><br>
<?php
    include_once '../db.php';
    $stmt = $dbh->query("SELECT * FROM orte ORDER BY id DESC");

    $res = $dbh->prepare("SELECT SUM(geld) AS money FROM orte");
    $res->execute();
    while ($row = $res->fetch(PDO::FETCH_ASSOC))
    {
        echo $row['money']." CHF ausgegeben";
    }
?>

<style>
    th,td {
        border: none;
        border-top: 2px dotted black;
        border-left: 2px dotted black;
}
</style>

    <table>
                <tr>
                    <th>Stadt</th>
                    <th>Von wo</th>
                    <th>Fahrtzeit</th>
                    <th>Distanz</th>
                    <th>Staat</th>
                    <th>gruendung</th>
                    <th>Aufenthaltszeit</th>
                    <th width="20%">Datum</th>
                </tr>

                <?php 
                while ($row = $stmt->fetch()) { ?>
                <form>
                <tr>
                  <?php 
                  ?>
                    
                    <td ><?php echo $row['was'];?></td>
                    <td><?php echo $row['von']; ?></td>
                    <td><?php echo $row ['zeit'];?></td>
                    <td><?php echo $row ['dist'];?></td>
                    <td><?php echo $row ['staat'];?></td>
                    <td><?php echo $row ['gruend'];?></td>
                    <td><?php echo $row ['auenthalt'];?></td>
                    <td><?php echo $row['dat'];?></td>
                    </form>
                <?php }
                 ?>
                 
                 </tr>
            </table>

                <meta name="viewport" content="width=device-width, initial-scale=1.0">