<?php 
    session_start();
    if (!isset($_SESSION["loket_client"])) {
        $_SESSION["loket_client"] = NULL;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <meta charset="utf-8">
    <meta name="description" content="sqlite file viewer">
    <meta name="keywords" content="sqlite,viewer,db,database,online">
    <meta name="author" content="Juraj Novák">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQLite Viewer</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/select2.css" rel="stylesheet">
    <link href="css/select2-bootstrap.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/ribbons.min.css" rel="stylesheet">
    <link rel="image_src" href="img/icon.png"/>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="main-container" class="container">
    <div id="header">
        <h3>SQLite Viewer</h3>
    </div>
    <form>
        <div class="alert alert-info alert-dismissible peringatan" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Info !</strong> Jumlah loket berhasil disave
        </div>
        <label for="exampleInputEmail1">Jumlah Loket</label> 
        <input type="text" class="form-control loket" placeholder="Jumlah Loket">
        <br/>
        <label for="exampleInputEmail1">Database</label> 
    </form>
    <div id="compat-error" class="alert alert-danger" style="display: none">
        <div class="clearfix">
            <img src="img/seriously.png" class="img-responsive pull-left"/>
            <p>Sorry but your browser does not support some of new HTML5 features! Try using latest version of Google Chrome or Firefox.</p>
        </div>
    </div>
    <div class="panel panel-info" id="dropzone" onclick="dropzoneClick(this)">
        <div id="drop-text" class="panel-body">
            <b>Drop file here</b> to load content or click on this box to open file dialog.<br/>
            <div class="nouploadinfo small">No file will be uploaded - uses only JavaScript HTML5 FileReader.<br/><br/>
            </div>
        </div>
        <div id="drop-loading" class="panel-body" style="display: none">
            <span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> <b>Processing file ...</b>
        </div>
    </div>
    <div id="output-box" class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <select id="tables" class="form-control select2" title="Table"></select><br />
            </div>
            <div class="col-md-11">
                <div id="sql-editor" class="panel panel-default form-control"></div>
            </div>
            <div class="col-sm-1">
                <button class="btn btn-sm btn-primary" id="sql-run" type="submit" onclick="executeSql(this)">Execute</button>
            </div>
            <div class="col-md-12">
                <div style="overflow-x: auto">
                    <table id="data" class="table table-condensed table-bordered table-hover table-striped">
                        <thead>
                        <tr></tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="alert alert-danger box" id="error" style="display: none"></div>
            </div>
        </div>
    </div>
    <div class="alert alert-danger box" style="display: none"></div>
    <div class="alert alert-warning box" style="display: none"></div>
    <div class="alert alert-info box" style="display: none"></div>
</div>
<div id="bottom-bar" class="text-center">
    <div class="inline">
        <button class="btn btn-default btn-sm " id="page-prev" type="submit" onclick="setPage(this, false)"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></button>
        <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" onclick="setPage(this)" id="pager"></a>
        <button class="btn btn-default btn-sm " id="page-next" type="submit" onclick="setPage(this, true)"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button>
    </div>
</div>
<div class="container">
    <footer class="footer">
    <p>&copy; ITERA <?php echo date("Y");?></p>
    </footer>
</div>
<input type="file" id="dropzone-dialog" style="opacity: 0;display:none">
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/filereader.js"></script>
<script src="js/sql.js"></script>
<script src="js/select2.min.js"></script>
<script src="js/ace/ace.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/mindmup-editabletable.js"></script>
<script src="js/main.js?v=7"></script>
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
    });
</script>
</body>
</html>