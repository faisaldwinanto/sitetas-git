FusionCharts.ready(
				function(){
					var theme = window.document.getElementById('theme'); 
					var type =  window.document.getElementById('type');

					function renderChart(theme,type){
						var chart = new FusionCharts(
							 {
								type: type,
								dataFormat:'jsonurl',
								renderAt:'chart1',
								dataSource: 'dataRange.php?theme=' + theme,
								events:{
									rendered: function(evt,arg){
										var chartRef = evt.sender;
									
 										function updateData(){
											var max = 30;
											var min = 0;
											var val = Math.floor(Math.random()*(max-min)) +min;
											strData = "&value="+val;
											chartRef.feedData(strData);
										}
										chartRef.intervalUpdateId = setInterval(updateData,1000);
									 },	
									disposed: function(evt,arg){
										clearInterval(evt.sender,intervalUpdateId);
									}
								}
							 }  	 
							);
						chart.render();
					}

					theme.onchange = function(){
						renderChart(theme.value,type.value);
					}
					type.onchange = function(){
						theme.onchange();
					}
					theme.onchange();
				}
			);