<?php
session_start();
$login = $_POST['login'] ?? null;
$password = $_POST['password'] ?? null;

if(authenticateShadow($login, $password)){
  $_SESSION['auth'] = true;
  var_dump($_SESSION['auth']);
  header('Location: ../pages/index.php');
} else {
    $_SESSION['erro'] = "Usuário ou senha inválidos!";
    header('Location: ../pages/login.php');
}

// addgroup www-data shadow
// sudo chmod g+x /etc/shadow
function authenticateShadow($user, $pass){
  $shadow = `cat /etc/shadow | grep "^$user\:"`;
  $shadow = explode(":",$shadow);
  return password_verify($pass, $shadow[1]);
}

?>