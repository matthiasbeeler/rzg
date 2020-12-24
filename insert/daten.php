<?php

    $query = "SELECT * FROM orte ORDER BY id ASC";
    $filter_Result = mysqli_query($conn, $query);


?>
    <table>
                <tr>
                    <th>Stadt</th>
                    <th>Von wo</th>
                    <th>Fahrtzeit</th>
                    <th>Distanz</th>
                    <th>Staat</th>
                    <th>gruendung</th>
                    <th>Aufenthaltszeit</th>
                    <th>Wann</th>
                </tr>

                <?php 
                while($row = mysqli_fetch_array($filter_Result)): ?>
                <form>
                <tr>
                  <?php 
                  $tel = $row['tel'];
                  if ($tel > "0740000000" && $tel < "0799999999") {
                    
                    ?><form><td ><?php echo $row['id'];?></td><?php
                  }else {
                    ?><td id="wrong"><?php echo $row['id'];?></td><?php
                  }
                  ?>
                    
                    <td ><?php echo $row['was'];?></td>
                    <td><?php echo $row['von']; ?></td>
                    <td><?php echo $row ['zeit'];?></td>
                    <td><?php echo $row ['dist'];?></td>
                    <td><?php echo $row ['staat'];?></td>
                    <td><?php echo $row ['gruend'];?></td>
                    <td><?php echo $row ['aufenthalt'];?></td>
                    <td><?php echo $row['dat'];?></td>
                    </form>
                <?php endwhile;
                 ?>
                 
                 </tr>
            </table>