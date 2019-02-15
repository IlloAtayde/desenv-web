<?php
    /* header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past */
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