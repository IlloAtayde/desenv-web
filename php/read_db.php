<?php

const DB = 'mysql';
const DBHOST = '127.0.0.1';
const DBNAME = 'iptables_rules_db';
const DBUSER = 'root';
const DBPWD = '';

function connect(){
  $dsn = DB.":dbname=".DBNAME.";host=".DBHOST;
  try {
    return new PDO($dsn, DBUSER, DBPWD);
  } catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
  }
}

$connection = connect();

    function readAll() {
        global $connection;
        $sql = "SELECT * FROM rules";
        $pdoStm = $connection->query($sql);
        return $pdoStm ? $pdoStm->fetchAll(PDO::FETCH_ASSOC) : null;
      }
    
    echo json_encode(readAll());
?>