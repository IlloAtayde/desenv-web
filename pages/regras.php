<?php

if(!isset($_SESSION['auth']) || $_SESSION['auth'] === false)
    header('Location: login.php');
?>


<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Regras</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="panel-title">Regras cadastradas</h2>
                        </div>
                        <div id="mainarea" class="table-responsive panel-body">
                            <table id="ruletable" class="table table-hover table-striped table-condensed" style="overflow-x: 'visible'">
                                <thead>
                                    <tr>
                                        <th>
                                            <input id="selectAll" name="selectAll" type="checkbox">
                                        </th>
                                        <th>Protocolo</th>
                                        <th>Origem</th>
                                        <th>Porta</th>
                                        <th>Destino</th>
                                        <th>Porta</th>
                                        <th>Gateway</th>
                                        <th>Descrição</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody id="tabregras" class="user-entries ui-sortable" style="display: table-row-group;">
                                    <!-- <tr>
                                        <td>
                                            <input type="checkbox">
                                        </td>
                                        <td>
                                            IPv4 ICMP<br>
                                            <div><small>echoreq</small></div>
                                        </td>
                                        <td>
                                            * </td>
                                        <td>
                                            * </td>
                                        <td>
                                            * </td>
                                        <td>
                                            * </td>
                                        <td>
                                            * </td>
                                        <td>
                                            nenhum </td>
                                        <td class="action-icons">
                                            <a href="firewall_rules_edit.php?id=0" class="fa fa-pencil" title="Editar"></a>
                                            <a href="firewall_rules_edit.php?dup=0" class="fa fa-clone" title="Copiar"></a>
                                            <a href="?act=toggle&amp;if=wan&amp;id=0" class="fa fa-ban" title="Desabilitar"
                                                usepost=""></a>
                                            <a href="?act=del&amp;if=wan&amp;id=0" class="fa fa-trash" title="Excluir esta regra"
                                                usepost=""></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox">
                                        </td>
                                        <td>
                                            IPv4 ICMP<br>
                                            <div><small>echorep</small></div>
                                        </td>
                                        <td>
                                            * </td>
                                        <td>
                                            * </td>
                                        <td>
                                            * </td>
                                        <td>
                                            * </td>
                                        <td>
                                            * </td>
                                        <td>
                                            nenhum </td>
                                        <td class="action-icons">
                                            <a href="firewall_rules_edit.php?id=1" class="fa fa-pencil" title="Editar"></a>
                                            <a href="firewall_rules_edit.php?dup=1" class="fa fa-clone" title="Copiar"></a>
                                            <a href="?act=toggle&amp;if=wan&amp;id=1" class="fa fa-ban" title="Desabilitar"
                                                usepost=""></a>
                                            <a href="?act=del&amp;if=wan&amp;id=1" class="fa fa-trash" title="Excluir esta regra"
                                                usepost=""></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox">
                                        </td>
                                        <td>
                                            IPv4 TCP </td>
                                        <td>
                                            * </td>
                                        <td>
                                            * </td>
                                        <td>
                                            192.168.1.1 </td>
                                        <td>
                                            443 (HTTPS) </td>
                                        <td>
                                            * </td>
                                        <td>
                                            NAT redirecionamento_externo </td>
                                        <td class="action-icons">
                                            <a href="firewall_rules_edit.php?id=2" class="fa fa-pencil" title="Editar"></a>
                                            <a href="firewall_rules_edit.php?dup=2" class="fa fa-clone" title="Copiar"></a>
                                            <a href="?act=toggle&amp;if=wan&amp;id=2" class="fa fa-ban" title="Desabilitar"
                                                usepost=""></a>
                                            <a href="?act=del&amp;if=wan&amp;id=2" class="fa fa-trash" title="Excluir esta regra"
                                                usepost=""></a>
                                        </td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <nav class="action-buttons nav navbar-nav navbar-right" style="margin-right:0%">
                <a href="index.php?page=formulario" role="button" class="btn btn-sm btn-success" title="Incluir regra">
                    <!-- <i class="fa fa-level-down icon-embed-btn"></i> -->
                    Incluir </a>
                <button name="del_x" type="submit" class="btn btn-danger btn-sm" value="Excluir regras selecionadas"
                    title="Excluir regras selecionadas">
                    <!-- <i class="fa fa-trash icon-embed-btn"></i> -->
                    Excluir </button>
                <button type="submit" id="order-store" name="order-store" class="btn btn-sm btn-primary" value="store changes"
                    disabled="" title="Salvar">
                    <!-- <i class="fa fa-save icon-embed-btn"></i> -->
                    Salvar </button>
            </nav>