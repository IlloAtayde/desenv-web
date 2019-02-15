<?php
    /* header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past */
    $chain = $_GET['chain'];
    $rule_order = $_GET['id'];


    $connection = ssh2_connect('127.0.0.1', 22);
    ssh2_auth_password($connection, 'vagrant', 'vagrant');

    $stream = ssh2_exec($connection, "sudo iptables -D $chain $rule_order");

    /* header( "refresh:5;url=../pages/index.php?page=regras" ); */

    header('Location: ../pages/index.php?page=regras');

    ?>
    <!-- <script language= "JavaScript">
        location.href = "../pages/index.php?page=regras";
    </script> -->