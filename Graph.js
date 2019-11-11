FusionCharts.ready(function(){
    var suhu = new FusionCharts(
        {
            "type":"line",
            "renderAt":"grafSuhu",
            "width":"800",
            "height":"350",
            "dataFormat":"jsonurl",
            "dataSource": "getDataSuhu.php",
            "showBorder":"1",
            "borderColor": "#FFFFFF",
            "borderThickness": "4",
            "borderAlpha": "80"
        }
    )

    var kelembaban = new FusionCharts(
        {
            "type":"line",
            "renderAt":"grafKelembaban",
            "width":"800",
            "height":"350",
            "dataFormat":"jsonurl",
            "dataSource": "getDataKelembaban.php",
            "bgAlpha": "0,0",
            "canvasbgalpha": "0"
        }
    )


var dataSuhu = new FusionCharts({
type: 'angulargauge',
renderAt: 'TampilSuhu',
width: '800',
height: '350',
dataFormat: 'json',
dataSource: {
"chart": {
"lowerLimit": "0",
"upperLimit": "100",
"showValue": "1",
"valueBelowPivot": "1",
"majorTMNumber": "10",
"majorTMColor": "#333333",
"majorTMAlpha": "100",
"majorTMHeight": "15",
"majorTMThickness": "2",
"minorTMNumber": "4",
"minorTMColor": "#666666",
"minorTMAlpha": "100",
"minorTMHeight": "12",
"minorTMThickness": "1",
"gaugeFillMix": "{dark-40},{light-40},{dark-20}",
"theme": "fusion"
},
"colorRange": {
"color": [{
"minValue": "0",
"maxValue": "35",
"code": "#e44a00"
},
{
"minValue": "36",
"maxValue": "38",
"code": "#f8bd19"
},
{
"minValue": "39",
"maxValue": "100",
"code": "#e44a00"
}
]
},
"dials": {
"dial": [{
"value": "37"
}]
}
}
})


var dataKelembaban = new FusionCharts({
type: 'angulargauge',
renderAt: 'TampilKelembaban',
width: '800',
height: '350',
dataFormat: 'json',
dataSource: {
"chart": {
"lowerLimit": "0",
"upperLimit": "100",
"showValue": "1",
"valueBelowPivot": "1",
"majorTMNumber": "10",
"majorTMColor": "#333333",
"majorTMAlpha": "100",
"majorTMHeight": "15",
"majorTMThickness": "2",
"minorTMNumber": "4",
"minorTMColor": "#666666",
"minorTMAlpha": "100",
"minorTMHeight": "12",
"minorTMThickness": "1",
"gaugeFillMix": "{dark-40},{light-40},{dark-20}",
"theme": "fusion"
},
"colorRange": {
"color": [{
"minValue": "0",
"maxValue": "54",
"code": "#e44a00"
},
{
"minValue": "55",
"maxValue": "65",
"code": "#f8bd19"
},
{
"minValue": "66",
"maxValue": "100",
"code": "#e44a00"
}
]
},
"dials": {
"dial": [{
"value": "60"
}]
}
}
})    

    suhu.render();
    kelembaban.render();
    dataSuhu.render();
    dataKelembaban.render();
    suhu.setTransparent(true);
    kelembaban.setTransparent(true);
    dataSuhu.setTransparent(true);
    dataKelembaban.setTransparent(true);
    }
)