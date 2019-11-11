FusionCharts.ready(function() {
    var cSatScoreChart = new FusionCharts({
      type: 'angulargauge',
      renderAt: 'angularReal2',
      id: 'cs-angular-gauge',
      width: '650',
      height: '400',
      dataFormat: 'json',
      dataSource: {
        "chart": {
          "caption": "Nilai Kelembaban",
          "lowerLimit": "0",
          "upperLimit": "100",
          "numberSuffix": " %",
          "showValue": "1",
          "dataStreamUrl": "streamKelembaban.php",
          "refreshInterval": "5",
          "theme": "fusion"
        },
        "colorRange": {
          "color": [{
            "minValue": "0",
            "maxValue": "75",
            "label": "Low",
            "code": "#c02d00"
          }, {
            "minValue": "75",
            "maxValue": "80",
            "label": "Moderate",
            "code": "#1aaf5d"
          }, {
            "minValue": "81",
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
  