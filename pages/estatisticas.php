<?php
    /* if(!isset($_SESSION['auth']) || $_SESSION['auth'] === false){
        header('Location: login.php');
    }
    header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past */

?>


<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Estatísticas</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <!-- Gráfico -->
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
                                        <li><a href="#">Bloqueados</a>
                                        </li>
                                        <li><a href="#">Permitidos</a>
                                        </li>
                                        <li><a href="#">Ambos</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="morris-bar-chart"></div>
                        </div>
                        <!-- /.panel-body -->

                        <!-- /.panel -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- Info. do Sistema -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-tasks fa-fw"></i> Informações do Sistema
                        </div>
                        <!-- /.panel-heading -->
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-condensed">
                                <tbody id="sysusage">
                                    <!-- campos gerados pelas funções showSysInfo e showSysInfoProBar em main.js -->
                                </tbody>
                            </table>
                        </div>
                        <!-- /.panel-body -->

                        <!-- /.panel -->
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

<script>
    /* Função para atualizar os dados da carga e informações do sistema a cada 1000ms*/
    setInterval(() => {
        $.getJSON( "../php/sysinfo_probar.php", function( data ) {
            for (let i = 0; i < 3; i++) {
                $('#load_meter'+i).css('width',data[i].value +'%');
                $('#load_percent'+i).text(data[i].value +'%');                
            }
        }); 
        $.getJSON( "../php/sysinfo.php", function( sysdata ) {
            for (let i = 0; i < 3; i++) {
                $('#sys_value'+i).text(sysdata[i].value);                
            }
        });       
    }, 1000);

</script>