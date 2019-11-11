FusionCharts.ready(function() {
  var myChart = new FusionCharts({
    id: "mychart",
    type: 'realtimeline',
    renderAt: 'graphSuhu',
    width: '650',
    height: '400',
    dataFormat: 'json',
    dataSource: {
      "chart": {
        "caption": "Grafik Suhu Real-Time",
        "dataStreamURL": "streamURL.php",
        "refreshInterval": "5",
        "pYAxisNameFontSize": "12",
        "yaxismaxvalue": "45",
        "numdisplaysets": "8",
        "numbersuffix": " C",
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
        "seriesname": "Suhu",
        "alpha": "100",
        "data": [{
          "value": "15"
        }]
      }]
    }
  }).render();
});
