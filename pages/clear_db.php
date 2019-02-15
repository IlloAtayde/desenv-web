<?php


$connection = ssh2_connect('127.0.0.1', 22);
  ssh2_auth_password($connection, 'vagrant', 'vagrant');

  $stream = ssh2_exec($connection, "sudo mysql < /var/www/html/php/clear_db.sql");

  header("Location: ./index.php?page=history_rules");

?>