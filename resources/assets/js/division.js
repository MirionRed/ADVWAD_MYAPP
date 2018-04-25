(function(){
  window.$ = window.jQuery = require('jquery');

  function renderDivisions(wrapper){
    $.ajax({
      url: __props.url,
      success: function(divisions){
        if(divisions.length){
          var table = $('<table>')
            .addClass('table')
            .addClass('table-striped');
          var headings = $('<thead>')
            .append(
              $('tr')
                .append($('<th>').text('No.'))
                .append($('<th>').text('Code'))
                .append($('<th>').text('Name'))
                .append($('<th>').text('City'))
                .append($('<th>').text('State'))
                .append($('<th>').text('Created'))
                .append($('<th>').text('Actions'))
            );
            var tbody = $('<tbody>');

            table.append(headings)
              .append(tbody);

            $.each(divisions, function(i, division) {
              var tr = $('<tr>')
                .append($('<td>').text(i + 1))
                .append($('<td>').text(division.code))
                .append($('<td>').text(division.name))
                .append($('<td>').text(division.city))
                .append($('<td>').text(division.state_name))
                .append($('<td>').text(division.created_at))
                .append($('<td>').text('Edit'));

              tbody.append(tr);
            });

            wrapper.append(table);
        } else {
          //wrapper.append(
            //$('div').text('No records found')
          //);
        }
      },
    });
  }

  function renderDivision(wrapper){
    $.ajax({
      url: __props.url,
      success: function(division){
        var table = $('<table>')
          .addClass('table')
          .addClass('table-striped');
        var headings = $('<thead>')
          .append(
            $('<tr>')
              .append($('<th>').text('Attribute'))
              .append($('<th>').text('Value'))
          );
        var tbody = $('<tbody>');

        table
          .append(headings)
          .append(tbody);

        tbody
          .append(
            $('<tr>')
              .append($('<td>').text('Code'))
              .append($('<td>').text(division.code))
          )
          .append(
            $('<tr>')
              .append($('<td>').text('Name'))
              .append($('<td>').text(division.name))
          )
          .append(
            $('<tr>')
              .append($('<td>').text('Address'))
              .append($('<td>').text(division.address))
          )
          .append(
            $('<tr>')
              .append($('<td>').text('Postcode'))
              .append($('<td>').text(division.postcode))
          )
          .append(
            $('<tr>')
              .append($('<td>').text('City'))
              .append($('<td>').text(division.city))
          )
          .append(
            $('<tr>')
              .append($('<td>').text('City'))
              .append($('<td>').text(division.state_name))
          )
          .append(
            $('<tr>')
              .append($('<td>').text('Created'))
              .append($('<td>').text(division.created_at))
          );
        wrapper.append(table);
      },
    });
  }
  if($('#division-index')){
    renderDivisions($('#division-index'));
  }
  if($('#division-show')){
    renderDivision($('#division-show'));
  }
})();
