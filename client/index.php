<?php 
	session_start();
	if (!isset($_SESSION["loket_client"])) 
	{
		$_SESSION["loket_client"] = 0;
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
	    <title>Client : Queue</title>
	    <link href="../assert/css/bootstrap.min.css" rel="stylesheet">
	    <link href="../assert/css/jumbotron-narrow.css" rel="stylesheet">
		<script src="../assert/js/jquery.min.js"></script>
	</head>

  	<body>
    <div class="container">
      	<div class="jumbotron">
        <h1 class="counter">
        	0
        </h1>
        <p>
	        <a class="btn btn-lg btn-primary try_queue" href="#" role="button">
	        	Ulangi Panggilan &nbsp;<span class="glyphicon glyphicon-volume-up"></span>
	        </a>
	        <a class="btn btn-lg btn-success next_queue" href="#" role="button">
	        	Next &nbsp;<span class="glyphicon glyphicon-chevron-right"></span>
	        </a>
        </p>
      	</div>

        <!-- style="width: 370px; margin-left: auto; margin-right: auto;" -->
    	<form>
        	<label for="exampleInputEmail1" style="text-align: left;"><span class="glyphicon glyphicon-credit-card">&nbsp;</span>NOMOR LOKET</label> 
        	<select class="form-control loket" name="loket" required>
        		<option value="0">-PILIH NOMOR LOKET-</option>
			</select>
        	<br/>
        	<div class="alert alert-danger peringatan" role="alert">
        		<strong>WARNING !!</strong>  Masukan Nomor Loket Anda.
        	</div>
    	</form>

      	<footer class="footer">
        <p>&copy; ITERA <?php echo date("Y");?></p>
      	</footer>
    </div>
  	</body>

  	<script type="text/javascript">
	$("document").ready(function()
	{
		// LIST LOKET
		$.post("../apps/admin_init.php", function( data ){
			for (var i = 1; i <= data['client']; i++) { 					
				if ( i == <?php echo $_SESSION["loket_client"];?>)
				$('.loket').append('<option value="'+i+'" selected>'+i+'</option>');
				else
				$('.loket').append('<option value="'+i+'">'+i+'</option>');
			}
		}, "json"); 

		// SET EXSIST session LOKET
		<?php if ($_SESSION["loket_client"] != 0) { ?>
		    	$(".peringatan").hide();
		<?php } else {?>
		    	$(".peringatan").show();
		<?php } ?>
		
		// GET LAST COUNTER
		var data = {"loket": <?php echo $_SESSION["loket_client"];?>};
		$.ajax({
			type: "POST",
			dataType: "json",
			url: "../apps/last_stage.php",//request
			data: data,
			success: function(data) {
				$(".jumbotron h1").html(data["next"]);
			}
		});

		// NUMBER LOKET
	    $('form select').data('val',  $('form select').val() );
	    $('form select').change(function() {
	    	//set seassion or save
	    	var data = {"loket": $(".loket").val()};
	    	if ( $(".loket").val() != 0 ) {
	    		$(".peringatan").hide();
	    	}else{
	    		$(".peringatan").show();
	    	}
			$.ajax({
				type: "POST",
				dataType: "json",
				url: "../apps/set_loket.php",//request
				data: data,
				success: function(data) {
					$(".jumbotron h1").html(data["next"]);
				}
			});
	    });
	    $('form select').keyup(function() {
	        if( $('form select').val() != $('form select').data('val') ){
	            $('form select').data('val',  $('form select').val() );
	            $(this).change();
	        }
	    });

	    // GET NEXT COUNTER
		$(".next_queue").click(function()
		{
			var loket = $(".loket").val();
			var data = {"loket" : loket};
			$.ajax({
				type: "POST",
				dataType: "json",
				url: "../apps/daemon.php",//request
				data: data,
				success: function(data) {
					$(".jumbotron h1").html(data["next"]);
				}
			});
			return false;
		});

		// TRY CALL
		$(".try_queue").click(function(){
			var loket = $(".loket").val();
			if (loket==0) {
	    		$(".peringatan").show();
			}else{
				var counter = $(".counter").text();
				$.post("../apps/daemon_try.php", { loket : loket, counter : counter } ); //request
				return false;	
			}
		});		
	});
	</script>
</html>

