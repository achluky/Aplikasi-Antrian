<?php
	session_start();
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
      	<div class="row">
      		<div class="col-md-4">
			      <div class="satu jumbotron">
			        <p>
				        <a class="btn btn-lg btn-primary next_queue" href="#" role="button">
				        	Loket 1
				        </a>
			        </p>
			        <h1>0</h1>
			      </div>
      		</div>
	    </div>

	    <div class="audio">
		  	<audio id="in" src="../audio/in.wav" ></audio>
		  	<audio id="out" src="../audio/out.wav" ></audio>
		  	<audio id="suarabel" src="../audio/Airport_Bell.mp3" ></audio>
			<audio id="suarabelnomorurut" src="../audio/nomor-urut.wav" ></audio> 
			<audio id="suarabelsuarabelloket" src="../audio/loket.wav" ></audio> 
			<audio id="belas" src="../audio/belas.wav"  ></audio> 
			<audio id="sebelas" src="../audio/sebelas.wav"  ></audio> 
		    <audio id="puluh" src="../audio/puluh.wav"  ></audio> 
		    <audio id="sepuluh" src="../audio/sepuluh.wav"  ></audio> 
		    <audio id="ratus" src="../audio/ratus.wav"  ></audio> 
		    <audio id="seratus" src="../audio/seratus.wav"  ></audio> 
		    <audio id="suarabelloket1" src="../audio/1.wav"  ></audio> 
		    <audio id="suarabelloket2" src="../audio/2.wav"  ></audio> 
		    <audio id="loket" src="../audio/loket.wav"  ></audio> 
       	</div>

      <footer class="footer">
        <p>&copy; ITERA <?php echo date("Y");?></p>
      </footer>
    </div>
  	</body>

  	<script type="text/javascript">
	$("document").ready(function(){
		<?php if ($_SESSION['counter'] != NULL) { ?>
			$(".satu h1").html(<?php echo $_SESSION['counter'] ?>);
		<?php } ?>
		setInterval(function() {
			$.post("../apps/monitoring-daemon.php", function( data ){
				$(".satu h1").html(data["next"]);
				if (data["next"]) {
					var angka = data["next"];
					for (var i = 0 ; i < angka.toString().length; i++) {
						$(".audio").append('<audio id="suarabel'+i+'" src="../audio/'+angka.toString().substr(i,1)+'.wav" ></audio>');
					};
					mulai(data["next"],data["counter"]);
				}else{
					$(".satu h1").html(data["next"]);
				};
			}, "json"); 
		}, 1000);
		//change
	});
	
	function mulai(urut, loket){
		
		var totalwaktu = 0.0;
		document.getElementById('in').pause();
		document.getElementById('in').currentTime=0;
		document.getElementById('in').play();

		totalwaktu=document.getElementById('in').duration*1000;	
		console.log(totalwaktu);
		
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

		}else{
			//
		}


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

