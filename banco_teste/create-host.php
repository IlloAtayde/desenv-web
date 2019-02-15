<?php
require_once('database.php');

$connection = connect();

function create($name, $address) {
  global $connection;

  $sql = "INSERT INTO host (name, address) VALUES ('${name}', '${address}');";
  
  try {
    $connection->beginTransaction();
    $connection->exec($sql);
    $connection->commit();
    return $connection->lastInsertId();
  } catch(PDOExecption $e) { 
    $connection->rollback(); 
    print "Error!: " . $e->getMessage(); 
    return null;
  } 
}
