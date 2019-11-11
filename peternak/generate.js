$(document).ready(function () {
	var time;
	$("select").change(function() {
	var id_kepemilikan = $(this).val();
	function generate () {
		var max = 100;
		var min = 50;
		var Sval = 37; //nilai awal suhu
		var Kval = 75; //nilai awal kelembaban
		var val = (Math.floor(Math.random() *min) / max + Sval ) + Math.floor( Math.random()*5)+1 ;
		var val2 = (Math.floor(Math.random() *min) / max + Kval) + Math.floor(Math.random()*5)+1;

		$.ajax({
			url: 'insert.php',
			type: 'post',
			data: {'rand_val1': val,'rand_val2':val2,'id_kepemilikan' : id_kepemilikan},
			dataType: 'json',
			beforeSend: function () {
				//$('#loading').html('Loading...');
			},
			success: function (data) {
				$('#riwayat').html(data);

				//generate();
			}
		});
		
	}

	$('#status_sensor').click(function () {
		if($(this).html() == 'ON') {
			$(this).html('OFF');

			var delay = 5000;

			//time = setTimeout(generate, delay);
			time = setInterval(generate, delay);
		}
		else {
			$(this).html('ON');

			clearTimeout(time);
		}
	});
});
});