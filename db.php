<?php
try {
   $dbh = new PDO('mysql:host=REDACTED_HOST;dbname=REDACTED_DB','REDACTED_USER', 'REDACTED_PASS');
} catch (PDOException $e) {
   print "Error!: " . $e->getMessage() . "<br/>";
   die();
}
?>