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
dataFormat: 'jsonurl',
dataSource: "getSuhu.php"
})


var dataKelembaban = new FusionCharts({
type: 'angulargauge',
renderAt: 'TampilKelembaban',
width: '800',
height: '350',
dataFormat: 'jsonurl',
dataSource: "getKelembaban.php"
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