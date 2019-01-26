google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

      var data = google.visualization.arrayToDataTable([
        ['評価', '評価者数',],
        ["★☆☆☆☆", star1],
        ["★★☆☆☆", star2],
        ["★★★☆☆", star3],
        ["★★★★☆", star4],
        ["★★★★★", star5]
      ]);

      var options = {
        chartArea: {width: '50%'},
        hAxis: {
          minValue: 0,
          gridlines:{color: 'none'},
        //   ticks: [10,20,30,40,50],
          format: '###人'
        },
      };

      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

      chart.draw(data, options);
    }