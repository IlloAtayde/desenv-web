$.getJSON("../data/pacotes-filtrados.json", function (json) {
  Morris.Line({
    element: 'morris-line-chart',
    data: json,
    xkey: 'hora',
    ykeys: ['packets'],
    labels: ['Pacotes'],
    parseTime: false
  });
});

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

const topTable = document.querySelector('#tabregras')

fetch('../data/regras.json')
  .then(res => res.json())
  .then(json => showTable(json))

function showTable(table) {
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
          <a href="firewall_rules_edit.php?id=0" class="fa fa-pencil" title="Editar"></a>
          <a href="firewall_rules_edit.php?dup=0" class="fa fa-clone" title="Copiar"></a>
          <a href="?act=toggle&amp;if=wan&amp;id=0" class="fa fa-ban" title="Desabilitar"
              usepost=""></a>
          <a href="?act=del&amp;if=wan&amp;id=0" class="fa fa-trash" title="Excluir esta regra"
              usepost=""></a>
      </td>
    </tr>`

    topTable.insertAdjacentHTML('beforeend', viewTable)
  }

}

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

    sysTable.insertAdjacentHTML('beforebegin', viewTable)
  }

}

