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

    	<form>
        	<label for="exampleInputEmail1">Jumlah Loket</label>

    		<div class="alert alert-info alert-dismissible peringatan" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Info !</strong> Jumlah loket berhasil disave
			</div>
        	
        	<input type="text" class="form-control loket" placeholder="Jumlah Loket">
        	<br/>
        	<label for="exampleInputEmail1">Reset DB</label>
        	<div class="reset_status">
			</div> 
        	<button type="button" class="btn btn-primary reset">Reset</button>
			<br/>
        	<br/>
        	<label for="exampleInputEmail1">Real-time Database</label> 
        	<div class="highlight">
        		<pre>
        			<code class="language-html" data-lang="html">
					</code>
				</pre>
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

	    // RESET 
		$(".reset").click(function(){
			$.post( "../apps/admin_reset.php", function( data ) {
			var alert = '<div class="alert alert-info alert-dismissible reset_status" role="alert">'+data['status']+'</div>';
			$(".reset_status").html(alert);
			},"json");
		});

	});
	</script>
</html>

