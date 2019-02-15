<?php
    header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

if(!isset($_SESSION['auth']) || $_SESSION['auth'] === false)
    header('Location: login.php');
?>


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dashboard</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div id="cards" class="row">
    <!-- Elementos gerados pela função showCard em main.js -->
</div>
<!-- /.row -->
<div class="row">
    <!-- Linha do Gráfico -->
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> Pacotes Filtrados
                <div class="pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                            Exibir
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li><a href="#" onclick="bloqueado();">Bloqueados</a>
                            </li>
                            <li><a href="#" onclick="permitido();">Permitidos</a>
                            </li>
                            <li><a href="#" onclick="ambos();">Ambos</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <!-- Corpo do Gráfico -->
                <div id="morris-bar-chart"></div>
            </div>
            <!-- /.panel-body -->

            <!-- /.panel -->
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->



<script>
    /* Função para atualizar os dados das politicas, chains e pacotes a cada 1000ms */
    setInterval(() => {
        $.getJSON( "../php/iptables.php", function( data ) {
                for (let i = 0; i < 3; i++) {
                    if (data[i].policy == "DROP") {                        
                        $('#card_color'+i).removeClass("panel-green").addClass("panel-red");
                    } else {
                        $('#card_color'+i).removeClass("panel-red").addClass("panel-green");
                    }
                $('#packtes'+i).text(data[i].packets);
                $('#chain_policy'+i).text(data[i].chain +' '+ data[i].policy);        
            }
        });      
    }, 1000);

</script>