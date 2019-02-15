<?php
  /* if(!isset($_SESSION['auth']) || $_SESSION['auth'] === false){
    header('Location: login.php');
  }
  header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past */

$connection = ssh2_connect('127.0.0.1', 22);
  ssh2_auth_password($connection, 'vagrant', 'vagrant');

  $stream = ssh2_exec($connection, "sudo iptables -L -n --line-numbers | tr -s ' ' > /var/www/html/php/iptables_rules");
  $iptables_list_file = file_get_contents('./iptables_rules');
    

  function iptables_parse($iptables_list_file) {
    $iptablesListArray = [];
    $testProtocol = ["tcp", "udp"];
    $testChain = ["INPUT", "OUTPUT", "FORWARD"];
    $testPort = "spt";
    $chain;
    
    $reTeste="/Chain\s([[:upper:]]{5,7})|(\d{1,3})\s{1}([[:upper:]]{3,6})\s{1}([[:lower:]]{3,4})\s{1}--\s{1}((\d{0,3}\.{1}){3}\d{0,3}|(\d{0,3}\.{1}){3}\d{0,3}\/\d{0,2})\s{1}((\d{0,3}\.{1}){3}\d{0,3}|(\d{0,3}\.{1}){3}\d{0,3}\/\d{0,2})(\s([[:lower:]]{3}\s{1}([[:lower:]]{3})\:(\d{0,5})|[[:lower:]]{8}\s{1}\d{0,3})|\n|\s)/m";
    foreach (explode("\n", $iptables_list_file) as $iptableLine) {

        /* echo "$iptableLine\n"; */
        preg_match($reTeste, $iptableLine, $matches);
        if (!isset($matches[0])){
          continue;
        }
        if (in_array($matches[1],$testChain)){
          $chain = $matches[1];
          continue;
        }
        /* print_r($matches); */
        if ($matches[4] == "icmp"){
          $iptablesListArray[] = [
            "chain" => $chain,
            "rule_order" => $matches[2],
            "action" => $matches[3],
            "protocol" => $matches[4],
            "source" => $matches[5],
            "destination" => $matches[8],
            "icmptype" => $matches[12],
            "s_port" => NULL,
            "d_port" => NULL, 
          ];
          continue;
        }
        if (in_array($matches[4],$testProtocol) && (!isset($matches[13]))) {
          $iptablesListArray[] = [
            "chain" => $chain,
            "rule_order" => $matches[2],
            "action" => $matches[3],
            "protocol" => $matches[4],
            "source" => $matches[5],
            "destination" => $matches[8],
            "icmptype" => NULL,
            "s_port" => '*',
            "d_port" => '*', 
          ];
          continue;
        } 
        if (in_array($matches[4],$testProtocol) && ($matches[13] == "spt")) {
          $iptablesListArray[] = [
            "chain" => $chain,
            "rule_order" => $matches[2],
            "action" => $matches[3],
            "protocol" => $matches[4],
            "source" => $matches[5],
            "destination" => $matches[8],
            "icmptype" => NULL,
            "s_port" => $matches[14],
            "d_port" => '*', 
          ];
          continue;
        }else {
            $iptablesListArray[] = [
              "chain" => $chain,
            "rule_order" => $matches[2],
            "action" => $matches[3],
            "protocol" => $matches[4],
            "source" => $matches[5],
            "destination" => $matches[8],
            "icmptype" => NULL,
              "s_port" => '*',
              "d_port" => $matches[14], 
            ];
            continue;
          }
    }
    return $iptablesListArray;
  }
  $json_iptables_list_policy = json_encode(iptables_parse($iptables_list_file));
/* var_dump($json_pro_bar_status); */
  echo $json_iptables_list_policy;
/*   var_dump(iptables_parse($iptables_list_file)); */













?>