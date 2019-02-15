/* Funções para alternar gráfico
Primeira renderização */

$.getJSON("../data/pacotes-filtrados.json", function (json) {
    Morris.Bar({
        element: 'morris-bar-chart',
        data: json,
        xkey: 'hora',
        ykeys: ['packets_a', 'packets_b'],
        barColors: ['#37de31', '#ec1313'],
        labels: ['Permitidos', 'Bloqueados'],
        parseTime: false
    });
});

/* Funções para alternar gráfico
Exibir ambos */
function ambos() {
    $('#morris-bar-chart').empty();
    $.getJSON("../data/pacotes-filtrados.json", function (json) {
        Morris.Bar({
            element: 'morris-bar-chart',
            data: json,
            xkey: 'hora',
            ykeys: ['packets_a', 'packets_b'],
            barColors: ['#37de31', '#ec1313'],
            labels: ['Permitidos', 'Bloqueados'],
            parseTime: false
        });
    });
}

/* Funções para alternar gráfico
Exibir bloqueados */
function bloqueado() {
    $('#morris-bar-chart').empty();
    $.getJSON("../data/pacotes-filtrados.json", function (json) {
        Morris.Bar({
            element: 'morris-bar-chart',
            data: json,
            xkey: 'hora',
            ykeys: ['packets_b'],
            barColors: ['#ec1313'],
            labels: ['Bloqueados'],
            parseTime: false
        });
    });

}
/* Funções para alternar gráfico
Exibir permitidos */
function permitido() {
    $('#morris-bar-chart').empty();
    $.getJSON("../data/pacotes-filtrados.json", function (json) {
        Morris.Bar({
            element: 'morris-bar-chart',
            data: json,
            xkey: 'hora',
            ykeys: ['packets_a'],
            barColors: ['#37de31'],
            labels: ['Permitidos'],
            parseTime: false
        });
    });
}


/* INÍCIO
    Primeira renderização dos CARDS do dashboard
*/


/* const topData = document.querySelector('#cards')

fetch('../php/iptables.php')
    .then(res => res.json())
    .then(json => showData(json))

function showData(data) {
    console.log(data)
    total = 0
    for (const data of datas) {
        total += data.Packets
        const view = `<div class="col-xs-9 text-right">
        <div class="huge">${data.Chain}</div>
        <div class="lead">${data.Policy}</div>
        <div class="lead">${data.Packets}</div>
        <div class="lead">${total}</div>
        </div>`
        topCard.insertAdjacentHTML('beforeend', view)
    }
} */

const topCard = document.querySelector('#cards')

fetch('../php/iptables.php')
    .then(res => res.json())
    .then(json => showCard(json))


function showCard(card) {
    console.log(card)
    i = 0
    for (const cards of card) {
        if (cards.policy == "DROP") {
            color = "panel-red"
        } else {
            color = "panel-green"
        }
        if (cards.chain == "INPUT") {
            icon = "fa fa-sign-in"
        } else if (cards.chain == "OUTPUT") {
            icon = "fa fa-sign-out"
        } else {
            icon = "fa fa-exchange"
        }
        const view = `<div class="col-lg-4 col-md-4">
        <div id="card_color${i}" class="panel ${color}">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class=" ${icon} fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div id="packtes${i}" class="huge">${cards.packets}</div>
                        <div id="chain_policy${i}" class="lead">${cards.chain} ${cards.policy}</div>
                    </div>
                </div>
            </div>
            <!-- Link comentado
            <a href=" ">
                <div class="panel-footer">
                    <span class="pull-left">Detalhes</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
            -->
        </div>
    </div>`
        i++
        topCard.insertAdjacentHTML('beforeend', view)
    }

}
/* FIM
    Primeira renderização dos CARDS do dashboard
*/


/* INÍCIO
    Primeira renderização da tabela de Regras
*/

const topTable = document.querySelector('#tabregras')

fetch('../php/iptables_rules.php')
    .then(res => res.json())
    .then(json => showTable(json))

function showTable(rules) {
    i = 0;
    for (const rule of rules) {
        const viewTable =
            `<tr> 
       <td>
          <input type="checkbox">
      </td>
      <td id="td_rule_protocol${i}">
          ${rule.protocol}<br>
          <div id="td_rule_icmptype${i}"><small>${rule.icmptype}</small></div>
      </td>
      <td id="td_rule_source${i}">
          ${rule.source}</td>
      <td id="td_rule_s_port${i}">
          ${rule.s_port}</td>
      <td id="td_rule_destination${i}">
          ${rule.destination}</td>
      <td id="td_rule_d_port${i}">
          ${rule.d_port}</td>
      <td id="td_rule_action${i}">
          ${rule.action}</td>
      <td id="td_rule_chain${i}" style="display:none;">
          ${rule.chain}</td>
      <td id="td_rule_order${i}" style="display:none;">
          ${rule.rule_order}</td>
      <td class="action-icons">
          <!-- disable -->
          <a href="#" class="fa fa-pencil" title="Editar"></a>
          <a href="firewall_rules_edit.php?dup=${i}" class="fa fa-clone" title="Copiar"></a>
          <a href="?act=toggle&amp;if=wan&amp;id=${i}" class="fa fa-ban" title="Desabilitar"
              usepost=""></a>
          <a href="../php/firewall_rules_del.php?chain=${rule.chain}&id=${rule.rule_order}" class="fa fa-trash" title="Excluir esta regra"
              usepost=""></a>
      </td>
    </tr>`

        topTable.insertAdjacentHTML('beforeend', viewTable)
        i++;
    }

}
/* FIM
    Primeira renderização da tabela de Regras
*/

/* Marcas ou desmarca todos os ítens (CheckBox) da página de regras*/

$('#selectAll:checkbox').change(function () {
    if ($(this).is(':checked')) {
        $('input[type=checkbox]').prop('checked', true);
    } else {
        $('input[type=checkbox]').prop('checked', false);
    }
});

/* Deleta as regras com o CheckBox marcado da página de regras*/

$("#rem_checked").on("click", function () {
    $('tbody tr').has('input:checked').remove()
    $('#selectAll:checkbox').prop('checked', false);
})


/* FIM - Página reggras.php */


/* INÍCIO
    Primeira renderização da tabela de informações do sistema
    Hora do sistema e tempo de atividade
*/

const sysTable = document.querySelector('#sysusage')

fetch('../php/sysinfo.php')
    .then(res => res.json())
    .then(json => showSysInfo(json))

function showSysInfo(tables) {
    var i = 0;
    for (const table of tables) {
        const viewTable =
            `<tr>
        <th>${table.label}</th>
        <td id=sys_value${i}>${table.value}</td>
    </tr>
    `
        i++;
        sysTable.insertAdjacentHTML('afterbegin', viewTable)
    }

}
/* FIM
    Primeira renderização da tabela de informações do sistema
    Hora do sistema e tempo de atividade
*/



/* INÍCIO
    Primeira renderização da tabela de carga do sistema
    Carga da CPU, Memória e Uso do disco
*/

const sysTableProBar = document.querySelector('#sysusage')

fetch('../php/sysinfo_probar.php')
    .then(res => res.json())
    .then(json => showSysInfoProBar(json))

function showSysInfoProBar(table) {
    var i = 0;
    for (const tables of table) {
        const viewTable =
            `<tr>
        <th>${tables.label}</th>
        <td>
            <div class="progress">
                <div id="load_meter${i}" class="progress-bar progress-bar-striped" role="progressbar"
                aria-valuenow="4" aria-valuemin="0" aria-valuemax="100" style="width: ${tables.value}%;">
                </div>
            </div>
            <span id="load_percent${i}">${tables.value}%</span>
        </td>
    </tr>`
        i++;
        sysTableProBar.insertAdjacentHTML('beforeend', viewTable)
    }

}
/* FIM
    Primeira renderização da tabela de carga do sistema
    Carga da CPU, Memória e Uso do disco
*/

/* INÍCIO
    Primeira renderização da tabela de Histórico das Regras
*/

const historyTable = document.querySelector('#historytabregras')

fetch('../php/read_db.php')
    .then(res => res.json())
    .then(json => showHistoryRules(json))

function showHistoryRules(rules) {
    i = 0;
    for (const rule of rules) {
        const viewTable =
                        `<tr>
                            <td>${rule.id}</td>
                            <td>${rule.protocol}</td>
                            <td>${rule.ip_src}</td>
                            <td>${rule.ip_src_mask}</td>
                            <td>${rule.src_port}</td>
                            <td>${rule.ip_dst}</td>
                            <td>${rule.ip_dst_mask}</td>
                            <td>${rule.dst_port}</td>
                            <td>${rule.action}</td>
                            <td>${rule.chain}</td>
                        </tr>`

        historyTable.insertAdjacentHTML('beforeend', viewTable)
        i++;
    }

}
/* FIM
    Primeira renderização da tabela de Histórico das Regras
*/