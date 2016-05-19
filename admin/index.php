<?php 
	session_start();
	if (!isset($_SESSION["loket_client"])) {
		$_SESSION["loket_client"] = NULL;
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
	    <title>Admin : Queue</title>
	    <link href="../assert/css/bootstrap.min.css" rel="stylesheet">
	    <link href="../assert/css/jumbotron-narrow.css" rel="stylesheet">
		<script src="../assert/js/jquery.min.js"></script>
	</head>

  	<body>
    <div class="container">
      	<div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation"><a href="#">ABOUT</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Admin : Queue Apps</h3>
      	</div>


    	<form>
    		<div class="alert alert-info alert-dismissible peringatan" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Info !</strong> Jumlah loket berhasil disave
			</div>
        	<label for="exampleInputEmail1">Jumlah Loket</label> 
        	<input type="text" class="form-control loket" placeholder="Jumlah Loket">
    	</form>

      	<footer class="footer">
        <p>&copy; ITERA <?php echo date("Y");?></p>
      	</footer>
    </div>
  	</body>

  	<script type="text/javascript">
	$("document").ready(function()
	{
		$('.peringatan').hide();

		// GET JUMLAH LOKET
	    $.post( "../apps/admin_server.php", function( data ) {
			$(".loket").val(data['jumlah_loket']);
		},"json");


		// NUMBER LOKET
	    $('form input').data('val',  $('form input').val() );
	    $('form input').change(function() {
	    	//set seassion or save
	    	var data = {"jmlloket": $(".loket").val()};
			$.ajax({
				type: "POST",
				dataType: "json",
				url: "../apps/admin_server.php",//request
				data: data,
				success: function(data) {
					if (data["status"])
					{
						$('.peringatan').show();
					}
				}
			});
	    });
	    $('form input').keyup(function() {
	        if( $('form input').val() != $('form input').data('val') ){
	            $('form input').data('val',  $('form input').val() );
	            $(this).change();
	        }
	    });


	    // GET NEXT COUNTER
		// $(".next_queue").click(function(){
		// 	var loket = $(".loket").val();
		// 	var data = {"loket" : loket};
		// 	$.ajax({
		// 		type: "POST",
		// 		dataType: "json",
		// 		url: "../apps/daemon.php",//request
		// 		data: data,
		// 		success: function(data) {
		// 			$(".jumbotron h1").html(data["next"]);
		// 		}
		// 	});
		// 	return false;
		// });

	});
	</script>
</html>

