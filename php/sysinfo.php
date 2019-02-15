<?php
    /* if(!isset($_SESSION['auth']) || $_SESSION['auth'] === false){
        header('Location: ../pages/login.php');
    }
    header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past */
/* Comandos para executar em shell

Tempo que o sistema está ligado:
~$ uptime -p | cut -d' ' -f1 --complement

Data e hora do sistema:
~$ date

 */
/* [
    {
        "label": "Tempo de atividade",
        "value": "02 Hours 22 Minutes 03 Seconds"
    },
    {
        "label": "Data/hora atuais",
        "value": "Thu Dec 6 16: 15: 23 UTC 2018"
    },
    {
        "label": "Última alteração de configuração",
        "value": "Mon Dec 3 15:16:15 UTC 2018"
    }
] */

$up_time = shell_exec("uptime -p | cut -d' ' -f1 --complement");
$sys_date = shell_exec("date");


$sys_info = array(
    array(
        "label"=>"Tempo de atividade",
        "value"=>$up_time
    ),
    array(
        "label"=>"Data/hora atuais",
        "value"=>$sys_date
    ),
    array(
        "label"=> "Última alteração de configuração",
        "value"=> "Capturar do banco!!!"
    )
    );
$json_sys_info = json_encode($sys_info);
/* var_dump($json_sys_info); */
echo $json_sys_info;

?>