<?php
    session_start();
    require_once('iptables_db.php');//Arquivo de inclusão onde se está localizada a função connect()
    require_once('create_rules_db.php');//Arquivo de inclusão onde se está localizada a função create()

    if(isset($_SESSION['rule_add_err'])){ 
        unset($_SESSION['rule_add_err']);
    }
    $connection = connect(); //Conexão com o banco de dados

    $connection_ssh2 = ssh2_connect('127.0.0.1', 22);
    ssh2_auth_password($connection_ssh2, 'vagrant', 'vagrant');


    $action = $_POST['action'];
    $chain = $_POST['chain'];
    $protocol = $_POST['protocol'];
    $ip_src = $_POST['ip_src'];
    $ip_src_mask = $_POST['ip_src_mask'];
    $src_port_ = $_POST['src_port'];
    $ip_dst = $_POST['ip_dst'];
    $ip_dst_mask = $_POST['ip_dst_mask'];
    $dst_port_ = $_POST['dst_port'];
    $src_port = "--sport ";
    $dst_port = "--dport ";
    $icmptype_ = $_POST['icmp_type'];
    $icmptype = "--icmp-type ";
    /* var_dump($_POST); */
    
    if ($dst_port_ == ""){
        $dst_port = " ";
    }else {
        $dst_port .= "$dst_port_";
    }
    if ($src_port_ == ""){
        $src_port = " ";
    }else {
        $src_port .= "$src_port_";
    }
    if (isset($icmptype_)){
        $icmptype .= $icmptype_;
        $stdout_stream = ssh2_exec($connection_ssh2, "sudo iptables -A $chain -p $protocol $icmptype -s $ip_src/$ip_src_mask -d $ip_dst/$ip_dst_mask -j $action");
        /* echo "sudo iptables -A $chain -p $protocol $icmptype -s $ip_src/$ip_src_mask -d $ip_dst/$ip_dst_mask -j $action"; */
    }else{
    /* echo "sudo iptables -A $chain -p $protocol -s $ip_src/$ip_src_mask $src_port -d $ip_dst/$ip_dst_mask $dst_port -j $action"; */
    $stdout_stream = ssh2_exec($connection_ssh2, "sudo iptables -A $chain -p $protocol -s $ip_src/$ip_src_mask $src_port -d $ip_dst/$ip_dst_mask $dst_port -j $action");
    }
    $err_stream = ssh2_fetch_stream($stdout_stream, SSH2_STREAM_STDERR);
    $dio_stream = ssh2_fetch_stream($stdout_stream, SSH2_STREAM_STDIO);
    
    stream_set_blocking($err_stream, true);
    stream_set_blocking($dio_stream, true);
    
    $result_err = stream_get_contents($err_stream);
    $result_dio = stream_get_contents($dio_stream);
    
    if ($result_err){
        $_SESSION['rule_add_err'] = "ERRO AO INSERIR REGRA!";
    }else{
        $teste = create($action, $chain, $protocol, $ip_src, $ip_src_mask, $src_port_, $ip_dst, $ip_dst_mask, $dst_port_);
    }
    header("Location: ../pages/index.php?page=regras");
    ?>