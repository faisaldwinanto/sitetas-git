<?php

	date_default_timezone_set('Asia/Jakarta');

	$chart = array(
		 'caption'=>'Grafik Ketinggian Air',
		 'subCaption'=>'Bendungan Katulampa',
		 'numdisplaysets'=>'10',
		 'labeldisplay'=>'rotate',
		 'showRealTimeValue'=>'1',
		 'theme'=>$_GET['theme'],
		 'plotToolText'=>'$label<br>Ketinggian Air:$dataValue',
		 'setAdaptiveYMin'=>'1'
		);

	$categories = array(
		 array(
		 	 'category'=>array(
		 	 	array('label'=>date('H:i:s')))
		 	)
		);
	$dataset  = array(
					array(
						'data'=>array(
							array('value'=>0)
							)
						)
				);

	echo json_encode(array('chart'=>$chart,'categories'=>$categories, 'dataset'=>$dataset)) ;

?>