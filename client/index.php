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
        <h1>
        	0
        </h1>
        <p>
	        <a class="btn btn-lg btn-success next_queue" href="#" role="button">
	        	Next <span class="glyphicon glyphicon-chevron-right"></span>
	        </a>
        </p>
      </div>

      <footer class="footer">
        <p>&copy; ITERA <?php echo date("Y");?></p>
      </footer>
    </div>
  	</body>

  	<script type="text/javascript">
	$("document").ready(function(){
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

	    $('form input').data('val',  $('form input').val() );
	    $('form input').change(function() {
	    	//set seassion or save
	    });
	    $('form input').keyup(function() {
	        if( $('form input').val() != $('form input').data('val') ){
	            $('form input').data('val',  $('form input').val() );
	            $(this).change();
	        }
	    });

		$(".next_queue").click(function(){
			var loket = $(".loket").val();
			var data = {"loket": loket};
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
	});
	</script>
</html>

