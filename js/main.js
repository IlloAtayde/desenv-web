
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



const topCard = document.querySelector('#cards')

fetch('../data/dashboard.json')
    .then(res => res.json())
    .then(json => showCard(json))

function showCard(card) {
    for (const cards of card) {
        const view = `<div class="col-lg-6 col-md-6">
        <div class="panel ${cards.color}">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa ${cards.icon} fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">${cards.value}</div>
                        <div class="lead">${cards.name}</div>
                    </div>
                </div>
            </div>
            <a href="${cards.url}">
                <div class="panel-footer">
                    <span class="pull-left">Detalhes</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>`

        topCard.insertAdjacentHTML('beforeend', view)
    }

}

/* INÍCIO - Página reggras.php */

const topTable = document.querySelector('#tabregras')

fetch('../data/regras.json')
    .then(res => res.json())
    .then(json => showTable(json))

function showTable(table) {
    i = 0;
    for (const tables of table) {
        const viewTable =
            `<tr> 
       <td>
          <input type="checkbox">
      </td>
      <td>
          ${tables.protocol}<br>
          <div><small>${tables.type}</small></div>
      </td>
      <td>
          ${tables.source}</td>
      <td>
          ${tables.sport}</td>
      <td>
          ${tables.destination}</td>
      <td>
          ${tables.dport}</td>
      <td>
          ${tables.gateway}</td>
      <td>
      ${tables.description}</td>
      <td class="action-icons">
          <!-- disable -->
          <a href="firewall_rules_edit.php?id=${i}" class="fa fa-pencil" title="Editar"></a>
          <a href="firewall_rules_edit.php?dup=${i}" class="fa fa-clone" title="Copiar"></a>
          <a href="?act=toggle&amp;if=wan&amp;id=${i}" class="fa fa-ban" title="Desabilitar"
              usepost=""></a>
          <a href="?act=del&amp;if=wan&amp;id=${i}" class="fa fa-trash" title="Excluir esta regra"
              usepost=""></a>
      </td>
    </tr>`

        topTable.insertAdjacentHTML('beforeend', viewTable)
        i++;
    }

}

$('#selectAll:checkbox').change(function () {
    if ($(this).is(':checked')) {
        $('input[type=checkbox]').prop('checked', true);
    } else {
        $('input[type=checkbox]').prop('checked', false);
    }
});


/* FIM - Página reggras.php */


const sysTable = document.querySelector('#sysusage')

fetch('../data/sysinfo.json')
    .then(res => res.json())
    .then(json => showSysInfo(json))

function showSysInfo(table) {
    for (const tables of table) {
        const viewTable =
            `<tr>
        <th>${tables.label}</th>
        <td>${tables.value}</td>
    </tr>
    `

        sysTable.insertAdjacentHTML('afterbegin', viewTable)
    }

}

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

