<?php
  /* if(!isset($_SESSION['auth']) || $_SESSION['auth'] === false){
    header('Location: login.php');
  }
  header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past  */ 
  $connection = ssh2_connect('127.0.0.1', 22);
  ssh2_auth_password($connection, 'vagrant', 'vagrant');

  $stream = ssh2_exec($connection, "sudo iptables -L -v -n  > /var/www/html/php/iptables_list");
  $iptables_list_file = file_get_contents('./iptables_list');

  /* $testeArray = [];
  $testeArray[] = explode("\n",$iptables_list_file);
  var_dump($testeArray); */
    

  function iptables_parse($iptables_list_file) {
    $iptablesListArray = [];
    $testArray = ["INPUT", "FORWARD", "OUTPUT"];
    /* echo '<pre>'; */
    $regex = "/Chain ([[:upper:]]+) \(policy ([[:upper:]]+) ([[:digit:]]+) packets/";
    foreach (explode("\n", $iptables_list_file) as $iptableLine) {
        /* echo "$iptableLine\n"; */
        preg_match($regex, $iptableLine, $matches);
        /* print_r($matches); */
        if (!isset($matches[1])){
            $matches[1] = NULL;
        }
        if (in_array($matches[1],$testArray)) {
          $iptablesListArray[] = [
            "chain" => $matches[1],
            "policy" => $matches[2],
            "packets" => $matches[3],
          ];
        }
    }
    return $iptablesListArray;
  }
  $json_iptables_list_policy = json_encode(iptables_parse($iptables_list_file));
/* var_dump($json_pro_bar_status); */
  echo $json_iptables_list_policy;
/*   var_dump(iptables_parse($iptables_list_file)); */

?>
