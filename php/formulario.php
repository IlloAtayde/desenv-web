<?php

    /* if(!isset($_SESSION['auth']) || $_SESSION['auth'] === false){
        header('Location: login.php');
    } */
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Inserir Regras</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <form action="../php/firewall_rules_add.php" method="post">
        <div class="col-lg-12" class="container static">

            <div class="alert alert-danger text-center"><strong>ATENÇÃO:</strong> As regras só terão efeito
                caso sejam
                salvas.
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">Editar Regra do Firewall</h2>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">
                            <span class="element-required">Ação</span>
                        </label>
                        <div class="col-lg-10">
                            <select class="form-control" name="action" id="action" style="width: calc(50% - 15px)">
                                <option value="ACCEPT" selected>Selecione uma ação</option>
                                <option value="ACCEPT">Aceitar(ACCEPT)</option>
                                <option value="DROP">Descartar(DROP)</option>
                                <option value="REJECT">Rejeitar(REJECT)</option>
                                <option value="LOG">Registrar(LOG)</option>
                            </select>

                            <span class="help-block">Escolha o que fazer com pacotes que correspondem aos critérios especificados abaixo.<br>Rejeitar: O pacote é descartado em seguida envia um pacote TCP RST(Protocolo TCP) ou uma mensagem ICMP porta inacessível (Protocolo UDP) ao remetente. Descartar: O pacote é descartado sem que o remetente tome conhecimento.<br>Em ambos os casos, o pacote original é descartado.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">
                            <span class="element-required">Chain</span>
                        </label>
                        <div class="col-lg-10">
                            <select class="form-control" name="chain" id="chain" style="width: calc(50% - 15px)">
                                <option value="INPUT" selected>Selecione uma Chain</option>
                                <option value="INPUT">INPUT</option>
                                <option value="OUTPUT">OUTPUT</option>
                                <option value="FORWARD">FORWARD</option>
                            </select>

                            <span class="help-block">Selecione a chain que conterá a regra.</span>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">
                            <span class="element-required">Protocolo</span>
                        </label>
                        <div class="col-lg-10">
                            <select class="form-control" name="protocol" id="protocol" style="width: calc(50% - 15px)">
                                <option value="tcp"selected>Selecione o protocolo</option>
                                <option value="tcp">TCP</option>
                                <option value="udp">UDP</option>
                                <option id="icmp_protocol" value="icmp">ICMP</option>
                            </select>

                            <span class="help-block">Escolha qual protocolo IP essa regra deve
                                corresponder.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">
                            <span class="element-required">Mensagem ICMP</span>
                        </label>
                        <div class="col-lg-10">
                            <select class="form-control" name="icmp_type" id="icmp_type" style="width: calc(50% - 15px)">
                                <option value=""selected>mensagem ICMP</option>
                                <option value="8">echo-request</option>
                                <option value="0">echo-reply</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!--
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">Edereço de origem</h2>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-lg-4 control-label">
                            <span class="element-required">Origem</span>
                        </label>
                        <div class="col-sm-4">
                            <select class="form-control" name="srctype" id="srctype">
                                <option value="any" selected="">qualquer</option>
                                <option value="wan">WAN</option>
                                <option value="lan">LAN</option>
                                <option value="single">Host único ou alias</option>
                                <option value="network">Rede</option>
                            </select>


                        </div>
                        <div class="col-lg-4">
                            <div class="input-group">
                                <input class="form-control ui-autocomplete-input" name="src" id="src" title="Endereço IPv4 como 1.2.3.4"
                                    value="0" placeholder="Origem Address" autocomplete="off" type="text">
                                <span class="input-group-addon input-group-inbetween pfIpMask">/</span>
                                <select class="form-control pfIpMask" name="srcmask" id="srcmask">
                                    <option value="32">32</option>
                                    <option value="31">31</option>
                                    <option value="30">30</option>
                                    <option value="29">29</option>
                                    <option value="28">28</option>
                                    <option value="27">27</option>
                                    <option value="26">26</option>
                                    <option value="25">25</option>
                                    <option value="24">24</option>
                                    <option value="23">23</option>
                                    <option value="22">22</option>
                                    <option value="21">21</option>
                                    <option value="20">20</option>
                                    <option value="19">19</option>
                                    <option value="18">18</option>
                                    <option value="17">17</option>
                                    <option value="16">16</option>
                                    <option value="15">15</option>
                                    <option value="14">14</option>
                                    <option value="13">13</option>
                                    <option value="12">12</option>
                                    <option value="11">11</option>
                                    <option value="10">10</option>
                                    <option value="9">9</option>
                                    <option value="8">8</option>
                                    <option value="7">7</option>
                                    <option value="6">6</option>
                                    <option value="5">5</option>
                                    <option value="4">4</option>
                                    <option value="3">3</option>
                                    <option value="2">2</option>
                                    <option value="1">1</option>
                                </select>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">Endereçamento de rede</h2>
                </div>
                <div class="panel-body">
                    <div class="form-group" style="margin-bottom: 75px">
                            <div class="col-lg-12">
                                <div class="col-lg-4">
                                    <label class="col-lg-4 control-label">
                                        <span class="element-required">Origem</span>
                                    </label>
                                    <input class="element-required form-control ui-autocomplete-input" name="ip_src" id="ip_src" title="Endereço IPv4 como 1.2.3.4" value="" placeholder="endereço IP" required autocomplete="off" type="text">
                                </div>
                                <div class="col-lg-4">
                                    <label class="col-lg-4 control-label">
                                        <span class="element-required">Máscara</span>
                                    </label>
                                    <select required class="form-control pfIpMask" name="ip_src_mask" id="ip_src_mask">
                                        <option value="" selected>Máscara de origem</option>
                                        <option value="32">32</option>
                                        <option value="31">31</option>
                                        <option value="30">30</option>
                                        <option value="29">29</option>
                                        <option value="28">28</option>
                                        <option value="27">27</option>
                                        <option value="26">26</option>
                                        <option value="25">25</option>
                                        <option value="24">24</option>
                                        <option value="23">23</option>
                                        <option value="22">22</option>
                                        <option value="21">21</option>
                                        <option value="20">20</option>
                                        <option value="19">19</option>
                                        <option value="18">18</option>
                                        <option value="17">17</option>
                                        <option value="16">16</option>
                                        <option value="15">15</option>
                                        <option value="14">14</option>
                                        <option value="13">13</option>
                                        <option value="12">12</option>
                                        <option value="11">11</option>
                                        <option value="10">10</option>
                                        <option value="9">9</option>
                                        <option value="8">8</option>
                                        <option value="7">7</option>
                                        <option value="6">6</option>
                                        <option value="5">5</option>
                                        <option value="4">4</option>
                                        <option value="3">3</option>
                                        <option value="2">2</option>
                                        <option value="1">1</option>
                                        <option value="0">0</option>
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label class="col-lg-4 control-label">
                                        <span class="element-required">Porta</span>
                                    </label>
                                    <input class="form-control ui-autocomplete-input" name="src_port" id="src_port" title="Porta de Origem" value="" placeholder="Porta de origem" autocomplete="off" type="text">
                                    <!-- <select class="form-control" name="src_port" id="src_port">
                                        <option value="" selected>Porta de origem</option>
                                        <option value="5999">CVSup (5999)</option>
                                        <option value="53">DNS (53)</option>
                                        <option value="21">FTP (21)</option>
                                        <option value="3000">HBCI (3000)</option>
                                        <option value="80">HTTP (80)</option>
                                        <option value="443">HTTPS (443)</option>
                                        <option value="5190">ICQ (5190)</option>
                                        <option value="113">IDENT/AUTH (113)</option>
                                        <option value="143">IMAP (143)</option>
                                        <option value="993">IMAP/S (993)</option>
                                        <option value="4500">IPsec NAT-T (4500)</option>
                                        <option value="500">ISAKMP (500)</option>
                                        <option value="1701">L2TP (1701)</option>
                                        <option value="389">LDAP (389)</option>
                                        <option value="1755">MMS/TCP (1755)</option>
                                        <option value="7000">MMS/UDP (7000)</option>
                                        <option value="445">MS DS (445)</option>
                                        <option value="3389">MS RDP (3389)</option>
                                        <option value="1512">MS WINS (1512)</option>
                                        <option value="1863">MSN (1863)</option>
                                        <option value="119">NNTP (119)</option>
                                        <option value="123">NTP (123)</option>
                                        <option value="138">NetBIOS-DGM (138)</option>
                                        <option value="137">NetBIOS-NS (137)</option>
                                        <option value="139">NetBIOS-SSN (139)</option>
                                        <option value="1194">OpenVPN (1194)</option>
                                        <option value="110">POP3 (110)</option>
                                        <option value="995">POP3/S (995)</option>
                                        <option value="1723">PPTP (1723)</option>
                                        <option value="1812">RADIUS (1812)</option>
                                        <option value="1813">RADIUS accounting (1813)</option>
                                        <option value="5004">RTP (5004)</option>
                                        <option value="5060">SIP (5060)</option>
                                        <option value="25">SMTP (25)</option>
                                        <option value="465">SMTP/S (465)</option>
                                        <option value="161">SNMP (161)</option>
                                        <option value="162">SNMP-Trap (162)</option>
                                        <option value="22">SSH (22)</option>
                                        <option value="3478">STUN (3478)</option>
                                        <option value="587">SUBMISSION (587)</option>
                                        <option value="3544">Teredo (3544)</option>
                                        <option value="23">Telnet (23)</option>
                                        <option value="69">TFTP (69)</option>
                                        <option value="5900">VNC (5900)</option>
                                    </select>  -->                               
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="col-lg-4">
                                    <label class="col-lg-4 control-label">
                                        <span class="element-required">Destino</span>
                                    </label>
                                    <input class="element-required form-control ui-autocomplete-input" name="ip_dst" id="ip_dst" title="Endereço IPv4 como 1.2.3.4" value="" placeholder="endereço IP" required autocomplete="off" type="text">
                                </div>
                                <div class="col-lg-4">
                                    <label class="col-lg-4 control-label">
                                        <span class="element-required">Máscara</span>
                                    </label>
                                    <select required class="form-control pfIpMask" name="ip_dst_mask" id="ip_dst_mask">
                                        <option value="" selected="0">Máscara de destino</option>
                                        <option value="32">32</option>
                                        <option value="31">31</option>
                                        <option value="30">30</option>
                                        <option value="29">29</option>
                                        <option value="28">28</option>
                                        <option value="27">27</option>
                                        <option value="26">26</option>
                                        <option value="25">25</option>
                                        <option value="24">24</option>
                                        <option value="23">23</option>
                                        <option value="22">22</option>
                                        <option value="21">21</option>
                                        <option value="20">20</option>
                                        <option value="19">19</option>
                                        <option value="18">18</option>
                                        <option value="17">17</option>
                                        <option value="16">16</option>
                                        <option value="15">15</option>
                                        <option value="14">14</option>
                                        <option value="13">13</option>
                                        <option value="12">12</option>
                                        <option value="11">11</option>
                                        <option value="10">10</option>
                                        <option value="9">9</option>
                                        <option value="8">8</option>
                                        <option value="7">7</option>
                                        <option value="6">6</option>
                                        <option value="5">5</option>
                                        <option value="4">4</option>
                                        <option value="3">3</option>
                                        <option value="2">2</option>
                                        <option value="1">1</option>
                                        <option value="0">0</option>
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label class="col-lg-4 control-label">
                                        <span class="element-required">Porta</span>
                                    </label>
                                    <input class="form-control ui-autocomplete-input" name="dst_port" id="dst_port" title="Porta de Destino" value="" placeholder="Porta de destino" autocomplete="off" type="text">
                                    <!-- <select class="form-control" name="dst_port" id="dst_port">
                                        <option value="" selected>Porta de destino</option>
                                        <option value="5999">CVSup (5999)</option>
                                        <option value="53">DNS (53)</option>
                                        <option value="21">FTP (21)</option>
                                        <option value="3000">HBCI (3000)</option>
                                        <option value="80">HTTP (80)</option>
                                        <option value="443">HTTPS (443)</option>
                                        <option value="5190">ICQ (5190)</option>
                                        <option value="113">IDENT/AUTH (113)</option>
                                        <option value="143">IMAP (143)</option>
                                        <option value="993">IMAP/S (993)</option>
                                        <option value="4500">IPsec NAT-T (4500)</option>
                                        <option value="500">ISAKMP (500)</option>
                                        <option value="1701">L2TP (1701)</option>
                                        <option value="389">LDAP (389)</option>
                                        <option value="1755">MMS/TCP (1755)</option>
                                        <option value="7000">MMS/UDP (7000)</option>
                                        <option value="445">MS DS (445)</option>
                                        <option value="3389">MS RDP (3389)</option>
                                        <option value="1512">MS WINS (1512)</option>
                                        <option value="1863">MSN (1863)</option>
                                        <option value="119">NNTP (119)</option>
                                        <option value="123">NTP (123)</option>
                                        <option value="138">NetBIOS-DGM (138)</option>
                                        <option value="137">NetBIOS-NS (137)</option>
                                        <option value="139">NetBIOS-SSN (139)</option>
                                        <option value="1194">OpenVPN (1194)</option>
                                        <option value="110">POP3 (110)</option>
                                        <option value="995">POP3/S (995)</option>
                                        <option value="1723">PPTP (1723)</option>
                                        <option value="1812">RADIUS (1812)</option>
                                        <option value="1813">RADIUS accounting (1813)</option>
                                        <option value="5004">RTP (5004)</option>
                                        <option value="5060">SIP (5060)</option>
                                        <option value="25">SMTP (25)</option>
                                        <option value="465">SMTP/S (465)</option>
                                        <option value="161">SNMP (161)</option>
                                        <option value="162">SNMP-Trap (162)</option>
                                        <option value="22">SSH (22)</option>
                                        <option value="3478">STUN (3478)</option>
                                        <option value="587">SUBMISSION (587)</option>
                                        <option value="3544">Teredo (3544)</option>
                                        <option value="23">Telnet (23)</option>
                                        <option value="69">TFTP (69)</option>
                                        <option value="5900">VNC (5900)</option>
                                    </select> -->                                
                                </div>
                            </div>  
                    </div>
                </div>
            </div>
            <div class="col-sm-10 col-sm-offset-2">
                <button type="submit" class="btn btn-primary navbar-right">Salvar</button>
            </div>

        </div>
    </form>
</div>
<!-- /.row -->