FusionCharts.ready(function() {
  var myChart = new FusionCharts({
    id: "mychart",
    type: 'realtimeline',
    renderAt: 'graphKelembaban',
    width: '650',
    height: '400',
    dataFormat: 'json',
    dataSource: {
      "chart": {
        "caption": "Grafik Kelembaban Real-Time",
        "dataStreamURL": "streamURL2.php",
        "refreshInterval": "5",
        "pYAxisNameFontSize": "10",
        "yaxismaxvalue": "90",
        "numdisplaysets": "8",
        "numbersuffix": " %",
        "showlabels": "1",
        "showValues": "1",
        "showRealTimeValue": "0",
        "theme": "fusion"
      },
      "categories": [{
        "category": [{
          "label": "Mulai"
        }]
      }],
      "dataset": [{
        "seriesname": "Kelembaban",
        "alpha": "100",
        "data": [{
          "value": "0"
        }]
      }]
    }
  }).render();
});
