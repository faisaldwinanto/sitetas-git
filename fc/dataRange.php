<?php
	$chart = array(
		 'caption'=>'Grafik Ketinggian Air',
		 'subCaption'=>'Bendungan Katulampa',
		 'showValue'=>'1',
		 'theme'=>$_GET['theme'],
		 'lowerLimit'=>'0',
		 'upperLimit'=>'30',
		 'lowerLimitDisplay'=>'Min',
		 'upperLimitDisplay'=>'Max'
		);

	$colorRange = array(
			'color'=> array(
				array('minValue'=>'0','maxValue'=>'10','code'=>'#62B58f'),
				array('minValue'=>'10','maxValue'=>'20','code'=>'#FFC533'),
				array('minValue'=>'20','maxValue'=>'30','code'=>'#F2726F')
			)
		);

	echo json_encode(array('chart'=>$chart,'colorRange'=>$colorRange, 'value'=>5)) ;

?>