<?php
/* Comandos para executar em shell
Carga da CPU #uptime | cut -d":" -f5 | cut -d"," -f1 -> mutiplicar por 100 para apresentar o percentual
Memória do sistema #free | grep Mem | cut -d':' -f2 | tr -s ' ' | sed 's/.//' -> aplicar o explode e recuperar os dois primeiros valores em MB para fazer o cálculo de memória livre
Uso do disco
#sudo fdisk -l | grep "Disk /dev" | cut -d"," -f2 | sed 's/.//' | cut -d" " -f1 -> retorna o tamanho do disco em bytes
#sudo du -s 2>/dev/null | tr -d "."-> retorna espaço em disco utilizado em KiB
*/
/* $cpu_load = shell_exec('"uptime | cut -d":" -f4 | cut -d"," -f1"');
22:15:59 up 51 min,  1 user,  load average: 0,17, 0,25, 0,27

 */
/* $cpu_load = (float)shell_exec("uptime | cut -d':' -f4 | cut -d',' -f1")*100; */
$cpu_load = number_format(((float)shell_exec("uptime | cut -d':' -f5 | cut -d',' -f1")*100),2);
/* var_dump($cpu_load); */

list($mem_total, $mem_use) = explode(' ',shell_exec("free | grep Mem | cut -d':' -f2 | tr -s ' ' | sed 's/.//'"));
$mem_load = number_format(((int)$mem_use / (int)$mem_total * 100),2);
/* var_dump($mem_load); */

/* $disk_total = (int)shell_exec("sudo fdisk -l | grep 'Disk /dev' | cut -d',' -f2 | sed 's/.//' | cut -d' ' -f1")/* /1024 */;
$disk_load = number_format((int)shell_exec("df -h | grep '/dev/' | tr -s ' ' | cut -d' ' -f5 | tr -d [:punct:]"),2);
/* var_dump($disk_load); */

/* 
[
    {
        "label": "Utilização do CPU",
        "value": "66.65"
    },
    {
        "label": "Utilização da Memória",
        "value": "9"
    },
    {
        "label": "Utilização de Disco",
        "value": "14"
    }
] */

$pro_bar_status = array(
                        array(
                            "label"=>"Utilização do CPU",
                            "value"=>$cpu_load
                        ),
                        array(
                            "label"=>"Utilização da Memória",
                            "value"=>$mem_load
                        ),
                        array(
                            "label"=> "Utilização de Disco",
                            "value"=> $disk_load
                        )
                        );
$json_pro_bar_status = json_encode($pro_bar_status);
/* var_dump($json_pro_bar_status); */
echo $json_pro_bar_status;
?>