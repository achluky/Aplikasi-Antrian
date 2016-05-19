<?php
	session_start();
	if (!isset($_SESSION["counter_server"])) {
		$_SESSION["counter_server"][1] = 0;
		$_SESSION["counter_server"][2] = 0;
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">
	    <title>Monitoring : Queue</title>
	    <link href="../assert/css/bootstrap.min.css" rel="stylesheet">
	    <link href="../assert/css/jumbotron-narrow-monitoring.css" rel="stylesheet">
		<script src="../assert/js/jquery.min.js"></script>
	</head>

  	<body>
    <div class="container">

      	<div class="row loket">
      	</div>

	    <div class="audio">
		  	<audio id="in" src="../audio/in.wav" ></audio>
		  	<audio id="out" src="../audio/out.wav" ></audio>
		  	<audio id="suarabel" src="../audio/Airport_Bell.mp3" ></audio>
			<audio id="suarabelnomorurut" src="../audio/nomor-urut.wav" ></audio> 
			<audio id="suarabelsuarabelloket" src="../audio/new/di_konter.MP3" ></audio> 
			<audio id="belas" src="../audio/new/belas.MP3"  ></audio> 
			<audio id="sebelas" src="../audio/new/sepuluh.MP3"  ></audio> 
		    <audio id="puluh" src="../audio/new/puluh.MP3"  ></audio> 
		    <audio id="sepuluh" src="../audio/new/sepuluh.MP3"  ></audio> 
		    <audio id="ratus" src="../audio/new/ratus.MP3"  ></audio> 
		    <audio id="seratus" src="../audio/new/seratus.wav"  ></audio> 
		    <audio id="suarabelloket1" src="../audio/new/1.MP3"  ></audio> 
		    <audio id="suarabelloket2" src="../audio/new/2.MP3"  ></audio> 
		    <audio id="loket" src="../audio/loket.wav"  ></audio> 
       	</div>

      <footer class="footer">
        <p>&copy; ITERA <?php echo date("Y");?></p>
      </footer>
    </div>
  	</body>

  	<script type="text/javascript">
	$("document").ready(function(){
		<?php if ($_SESSION['counter_server'][1] == 1) { ?>
		$(".1 h1").html(<?php echo $_SESSION['next_server'][1] ?>);
		<?php } ?>
		<?php if ($_SESSION['counter_server'][2] == 2) { ?>
		$(".2 h1").html(<?php echo $_SESSION['next_server'][2] ?>);
		<?php } ?>

		var tmp_loket=0;

		setInterval(function() {
			$.post("../apps/monitoring-daemon.php", function( data ){
				if(tmp_loket!=data['jumlah_loket']){
					$(".col-md-3").remove();
					tmp_loket=0;
				}
				if (tmp_loket==0) {
					for (var i = 1; i<= data['jumlah_loket']; i++) {
						loket = '<div class="col-md-3">'+
									'<div class="'+ i +
									 ' jumbotron">'+
										'<button class="btn btn-danger" type="button">LOKET '+ i +'</button><h1>0</h1></button>'
									'</div>'+
								'</div>';
						$(".loket").append(loket);
					}

					tmp_loket = data['jumlah_loket'];
				}

				for (var i = 1; i <= data['jumlah_loket']; i++) { 					
					if (data["counter"]==i) {
						$("."+i+" h1").html(data["next"]);
					}
				}

				if (data["next"]) {
					var angka = data["next"];
					for (var i = 0 ; i < angka.toString().length; i++) {
						$(".audio").append('<audio id="suarabel'+i+'" src="../audio/'+angka.toString().substr(i,1)+'.wav" ></audio>');
					};
					mulai(data["next"],data["counter"]);
				}else{
					<?php for ($i=1; $i <= count($_SESSION["counter_server"]); $i++) { ?>
						$(".<?php echo $i;?> h1").html(<?php echo $_SESSION['next_server'][$i] ?>);	
					<?php } ?>
				};

			}, "json"); 
		}, 1000);
		//change
	});
	
	function mulai(urut, loket){
		
		var totalwaktu = 8568.163;
		document.getElementById('in').pause();
		document.getElementById('in').currentTime=0;
		document.getElementById('in').play();

		totalwaktu=document.getElementById('in').duration*1000;	
		
		setTimeout(function() {
				document.getElementById('suarabelnomorurut').pause();
				document.getElementById('suarabelnomorurut').currentTime=0;
				document.getElementById('suarabelnomorurut').play();
		}, totalwaktu);
		totalwaktu=totalwaktu+1000;

		if(urut<10){
			
			setTimeout(function() {
					document.getElementById('suarabel0').pause();
					document.getElementById('suarabel0').currentTime=0;
					document.getElementById('suarabel0').play();
				}, totalwaktu);
			totalwaktu=totalwaktu+1000;
			
			setTimeout(function() {
					document.getElementById('loket').pause();
					document.getElementById('loket').currentTime=0;
					document.getElementById('loket').play();
				}, totalwaktu);
			totalwaktu=totalwaktu+1000;

			setTimeout(function() {
					document.getElementById('suarabelloket'+loket+'').pause();
					document.getElementById('suarabelloket'+loket+'').currentTime=0;
					document.getElementById('suarabelloket'+loket+'').play();
				}, totalwaktu);
			totalwaktu=totalwaktu+1000;

			setTimeout(function() {
					for (var i = 0 ; i < urut.toString().length; i++) {
						$("#suarabel"+i+"").remove();
					};
				}, totalwaktu);
			totalwaktu=totalwaktu+1000;

		}else if(urut==10){

				setTimeout(function() {
						document.getElementById('sepuluh').pause();
						document.getElementById('sepuluh').currentTime=0;
						document.getElementById('sepuluh').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;


				setTimeout(function() {
						document.getElementById('loket').pause();
						document.getElementById('loket').currentTime=0;
						document.getElementById('loket').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;

				setTimeout(function() {
						document.getElementById('suarabelloket'+loket+'').pause();
						document.getElementById('suarabelloket'+loket+'').currentTime=0;
						document.getElementById('suarabelloket'+loket+'').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;

				setTimeout(function() {
						for (var i = 0 ; i < urut.toString().length; i++) {
							$("#suarabel"+i+"").remove();
						};
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;

		}else if(urut ==11){

				setTimeout(function() {
						document.getElementById('sebelas').pause();
						document.getElementById('sebelas').currentTime=0;
						document.getElementById('sebelas').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;


				setTimeout(function() {
						document.getElementById('loket').pause();
						document.getElementById('loket').currentTime=0;
						document.getElementById('loket').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;

				setTimeout(function() {
						document.getElementById('suarabelloket'+loket+'').pause();
						document.getElementById('suarabelloket'+loket+'').currentTime=0;
						document.getElementById('suarabelloket'+loket+'').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;

				setTimeout(function() {
						for (var i = 0 ; i < urut.toString().length; i++) {
							$("#suarabel"+i+"").remove();
						};
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;

		}else if(urut < 20){
							
				setTimeout(function() {
						document.getElementById('suarabel1').pause();
						document.getElementById('suarabel1').currentTime=0;
						document.getElementById('suarabel1').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				setTimeout(function() {
						document.getElementById('belas').pause();
						document.getElementById('belas').currentTime=0;
						document.getElementById('belas').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;

				setTimeout(function() {
						document.getElementById('loket').pause();
						document.getElementById('loket').currentTime=0;
						document.getElementById('loket').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;

				setTimeout(function() {
						document.getElementById('suarabelloket'+loket+'').pause();
						document.getElementById('suarabelloket'+loket+'').currentTime=0;
						document.getElementById('suarabelloket'+loket+'').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;

				setTimeout(function() {
						for (var i = 0 ; i < urut.toString().length; i++) {
							$("#suarabel"+i+"").remove();
						};
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;

		}else if(urut < 100){
				
				setTimeout(function() {
						document.getElementById('suarabel0').pause();
						document.getElementById('suarabel0').currentTime=0;
						document.getElementById('suarabel0').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				
				setTimeout(function() {
						document.getElementById('puluh').pause();
						document.getElementById('puluh').currentTime=0;
						document.getElementById('puluh').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;
				
				setTimeout(function() {
						document.getElementById('suarabel1').pause();
						document.getElementById('suarabel1').currentTime=0;
						document.getElementById('suarabel1').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;

				setTimeout(function() {
						document.getElementById('loket').pause();
						document.getElementById('loket').currentTime=0;
						document.getElementById('loket').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;

				setTimeout(function() {
						document.getElementById('suarabelloket'+loket+'').pause();
						document.getElementById('suarabelloket'+loket+'').currentTime=0;
						document.getElementById('suarabelloket'+loket+'').play();
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;

				setTimeout(function() {
						for (var i = 0 ; i < urut.toString().length; i++) {
							$("#suarabel"+i+"").remove();
						};
					}, totalwaktu);
				totalwaktu=totalwaktu+1000;

		}else{}

		setTimeout(function() {
			document.getElementById('out').pause();
			document.getElementById('out').currentTime=0;
			document.getElementById('out').play();
		}, totalwaktu);
		totalwaktu=totalwaktu+1200;
		
		setTimeout(function() {
			
			$.post("../apps/monitoring-daemon-result.php", { id : urut } );
			
		}, totalwaktu);
		totalwaktu=totalwaktu+1000;
	}
	</script>
</html>

