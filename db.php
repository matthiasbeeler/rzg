<?php
try {
   $dbh = new PDO(
      'mysql:host=' . getenv('DB_HOST') . ';dbname=' . getenv('DB_NAME'),
      getenv('DB_USER'),
      getenv('DB_PASS')
   );
} catch (PDOException $e) {
   print "Error!: " . $e->getMessage() . "<br/>";
   die();
}
?>
