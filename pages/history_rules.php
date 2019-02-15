<?php
    /* session_start(); */
    /* if(!isset($_SESSION['auth']) || $_SESSION['auth'] === false){
        header('Location: login.php');
    }
    header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past */
    
?>



<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Histórico das Regras</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="panel-title">Regras registradas</h2>
                        </div>
                        <div id="mainarea" class="table-responsive panel-body">
                            <table id="ruletable" class="table table-hover table-striped table-condensed" style="overflow-x: 'visible'">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Protocolo</th>
                                        <th>Origem</th>
                                        <th>Máscara</th>
                                        <th>Porta</th>
                                        <th>Destino</th>
                                        <th>Máscara</th>
                                        <th>Porta</th>
                                        <th>Ações</th>
                                        <th>Chain</th>
                                        <!-- <th>Sequência</th> -->
                                    </tr>
                                </thead>
                                <tbody id="historytabregras" class="user-entries ui-sortable" style="display: table-row-group;">
                                    <!-- Tabela renderizada pela função showTable em main.js -->
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <nav class="action-buttons nav navbar-nav navbar-right" style="margin-right:0%">
                <a href="clear_db.php" role="button" class="btn btn-danger btn-sm" title="Excluir regras selecionadas">Apagar Histórico</a>
            </nav>


<script>
/* Função para atualizar os dados da carga e informações do sistema a cada 1000ms
    setInterval(() => {
        $.getJSON( "../php/iptables_rules.php", function( rules ) {
            i = 0;
            for (const rule of rules) {
                $('#td_rule_protocol'+i).text(rule[i].protocol);
                $('#td_rule_icmptype'+i).text(rule[i].icmptype);
                $('#td_rule_source'+i).text(rule[i].source);
                $('#td_rule_s_port'+i).text(rule[i].s_port);
                $('#td_rule_destination'+i).text(rule[i].destination);
                $('#td_rule_d_port'+i).text(rule[i].d_port);
                $('#td_rule_action'+i).text(rule[i].action);
                $('#td_rule_chain'+i).text(rule[i].chain);
                $('#td_rule_order'+i).text(rule[i].order);               
            }
        });      
    }, 1000);*/

</script>