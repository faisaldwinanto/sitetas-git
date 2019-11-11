FusionCharts.ready(
				function(){
					var theme = window.document.getElementById('theme'); 
					var type =  window.document.getElementById('type2');

					function renderChart(theme,type){
						var chart = new FusionCharts(
							 {
								type: type,
								dataFormat:'jsonurl',
								renderAt:'chart',
								dataSource: 'dataSeries.php?theme=' + theme,
								events:{
									initialized: function(evt,arg){
										var chartRef = evt.sender;
									
 										function updateData(){
 											var t = new Date();
 											var date = t.getHours()+":"+t.getMinutes()+":"+t.getSeconds();
											var max = 999;
											var min = 0;
											var val = Math.floor(Math.random()*(max-min)) +min;
											strData = "&label="+date+"&value="+val;
											chartRef.feedData(strData);
										}
										chartRef.intervalUpdateId = setInterval(updateData,3000);
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