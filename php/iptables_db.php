<?php
require_once('iptables_config_db.php');//Arquivo de inclusão onde estão localizadas as CONSTANTES

function connect(){
  $dsn = DB.":dbname=".DBNAME.";host=".DBHOST;
  try {
    return new PDO($dsn, DBUSER, DBPWD);
  } catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
  }
}
