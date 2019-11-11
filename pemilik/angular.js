FusionCharts.ready(function () {
  var cSatScoreChart = new FusionCharts({
    type: 'angulargauge',
    renderAt: 'angularReal',
    id: 'cs-angular-gauge',
    width: '650',
    height: '400',
    dataFormat: 'json',
    dataSource: {
      "chart": {
        "caption": "Nilai Suhu RealTime",
        "lowerLimit": "0",
        "upperLimit": "100",
        "numberSuffix": " C",
        "showValue": "1",
        "dataStreamUrl": "streamSuhu.php",
        "refreshInterval": "5",
        "theme": "fusion"
      },
      "colorRange": {
        "color": [{
          "minValue": "0",
          "maxValue": "38",
          "label": "Low",
          "code": "#c02d00",
        }, {
          "minValue": "38",
          "maxValue": "40",
          "label": "Ideal",
          "code": "#1aaf5d"
        }, {
          "minValue": "39",
          "maxValue": "100",
          "label": "High",
          "code": "#c02d00"
        }]
      },
      "dials": {
        "dial": [{
          "id": "fd_dial",
          "value": "0",
          "tooltext": "Suhu : $value"
        }]
      }
    }
  }).render();
});
