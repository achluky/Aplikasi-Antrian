<<<<<<< HEAD
<?php 
	session_start();
	if (!isset($_SESSION["loket"])) {
		$_SESSION["loket"] = NULL;
	}
?>
=======
>>>>>>> 70f35c8a2fe26c4fea1c887f15f597731f08f4cb
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
<<<<<<< HEAD
      	<div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation"><a href="#">ABOUT</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Queue Apps</h3>
      	</div>

      	<div class="jumbotron">
=======
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="#">
            	<form>
	            	<label for="exampleInputEmail1">NOMOR LOKET</label> 
	            	<input type="text" class="form-control loket" placeholder="Nomor Loket">
            	</form>
            </a></li>
            <li role="presentation"><a href="#">ABOUT</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Queue apps</h3>
      </div>

      <div class="jumbotron">
>>>>>>> 70f35c8a2fe26c4fea1c887f15f597731f08f4cb
        <h1>
        	0
        </h1>
        <p>
<<<<<<< HEAD
	        <a class="btn btn-lg btn-primary try_queue" href="#" role="button">
	        	Ulangi Panggilan &nbsp;<span class="glyphicon glyphicon-volume-up"></span>
	        </a>
	        <a class="btn btn-lg btn-success next_queue" href="#" role="button">
	        	Next &nbsp;<span class="glyphicon glyphicon-chevron-right"></span>
	        </a>
        </p>

      	</div>

    	<form>
        	<label for="exampleInputEmail1">NOMOR LOKET</label> 
        	<input type="text" class="form-control loket" placeholder="Nomor Loket">
        	<br/>
        	<div class="alert alert-danger peringatan" role="alert">
        		<strong>WARNING !!</strong>  Masukan Nomor Loket Anda. Jangan diisi NOL (0) yahh!!.
        	</div>
    	</form>

      	<footer class="footer">
        <p>&copy; ITERA <?php echo date("Y");?></p>
      	</footer>
=======
	        <a class="btn btn-lg btn-success next_queue" href="#" role="button">
	        	Next <span class="glyphicon glyphicon-chevron-right"></span>
	        </a>
        </p>
      </div>

      <footer class="footer">
        <p>&copy; ITERA <?php echo date("Y");?></p>
      </footer>
>>>>>>> 70f35c8a2fe26c4fea1c887f15f597731f08f4cb
    </div>
  	</body>

  	<script type="text/javascript">
	$("document").ready(function(){
<<<<<<< HEAD

		// SET EXSIST session LOKET
		<?php if ($_SESSION["loket"] != NULL) { ?>
			$(".loket").val("<?php echo $_SESSION["loket"];?>");
		<?php if($_SESSION["loket"] != 0){?>
	    	$(".peringatan").hide();
	    <?php }?>

		<?php } ?>
		
		// GET LAST COUNTER
=======
>>>>>>> 70f35c8a2fe26c4fea1c887f15f597731f08f4cb
		var data = {"loket": $(".loket").val()};
		$.ajax({
			type: "POST",
			dataType: "json",
			url: "../apps/last_stage.php",//request
			data: data,
			success: function(data) {
				$(".jumbotron h1").html(data["next"]);
			}
		});

<<<<<<< HEAD
		// NUMBER LOKET
	    $('form input').data('val',  $('form input').val() );
	    $('form input').change(function() {
	    	//set seassion or save
	    	var data = {"loket": $(".loket").val()};
	    	if ( $(".loket").val() || $(".loket").val() != 0 ) {
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
=======
	    $('form input').data('val',  $('form input').val() );
	    $('form input').change(function() {
	    	//set seassion or save
>>>>>>> 70f35c8a2fe26c4fea1c887f15f597731f08f4cb
	    });
	    $('form input').keyup(function() {
	        if( $('form input').val() != $('form input').data('val') ){
	            $('form input').data('val',  $('form input').val() );
	            $(this).change();
	        }
	    });

<<<<<<< HEAD
	    // GET NEXT COUNTER
		$(".next_queue").click(function(){
			var loket = $(".loket").val();
			var counter = $(".jumbotron h1").val();
			var data = {"loket" : loket, "counter": counter};
=======
		$(".next_queue").click(function(){
			var loket = $(".loket").val();
			var data = {"loket": loket};
>>>>>>> 70f35c8a2fe26c4fea1c887f15f597731f08f4cb
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
<<<<<<< HEAD

=======
>>>>>>> 70f35c8a2fe26c4fea1c887f15f597731f08f4cb
	});
	</script>
</html>

