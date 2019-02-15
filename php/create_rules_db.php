<?php
require_once('iptables_db.php');

$connection = connect();

function create($action, $chain, $protocol, $ip_src, $ip_src_mask, $src_port, $ip_dst, $ip_dst_mask, $dst_port) {
  global $connection;

  $sql = "INSERT INTO rules (action, chain, protocol, ip_src, ip_src_mask, src_port, ip_dst, ip_dst_mask, dst_port) VALUES ('${action}', '${chain}', '${protocol}', '${ip_src}', '${ip_src_mask}', '${src_port}', '${ip_dst}', '${ip_dst_mask}', '${dst_port}');";
  
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
