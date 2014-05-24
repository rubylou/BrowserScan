<?php if (!defined('THINK_PATH')) exit();?><html>
	<head>
		<meta charset="utf-8">
	    <title>Browser &middot; Scan</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="description" content="">
	    <meta name="author" content="">
		<link href="__PUBLIC__/detectsources/bootstrap.css" rel="stylesheet">
		<link href="__PUBLIC__/detectsources/flat-ui.css" rel="stylesheet">
		<script src="__PUBLIC__/detectsources/jquery.js"></script>
		<script src="__PUBLIC__/detectsources/bootstrap.js"></script>
    <script src="__PUBLIC__/detectsources/plugindetect(revised).js"></script>
    <script src="__PUBLIC__/detectsources/public_collect.js"></script>
    <script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/aes.js"></script>
	</head>

	<body>

	<div class="container">
      <div class="panel-group" id="accordion">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-target="#collapseOne" data-parent="#accordion" class="collapsed" href="#collapseOne">
                Collapsible Group Item #1
              </a>
            </h4>
          </div>
          <div id="collapseOne" class="panel-collapse collapse" >
            <div class="panel-body">
              <table class="table" width="784">
        				<tr>
        				  <td width="119">Plugin</td>
        				  <td width="141">Version</td>
        				  <td width="208">Description</td>
        				  <td width="151">Latest Version</td>
        				  <td width="131">Status</td>
        				</tr>
        			</table>
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed">
                Collapsible Group Item #2
              </a>
            </h4>
          </div>
          <div id="collapseTwo" class="panel-collapse collapse" style="height: 0px;">
            <div class="panel-body">
              <table class="table" width="753">
				<tr>
				  <td width="141">Timestamp</td>
				  <td width="139">IP address</td>
				  <td width="124">OS</td>
				  <td width="205">Browser</td>
				</tr>
			  </table>
            </div>
          </div>
        </div>
        
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed">
                Collapsible Group Item #3
              </a>
            </h4>
          </div>
          <div id="collapseThree" class="panel-collapse collapse" style="height: 0px;">
            <div class="panel-body">
              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            </div>
          </div>
        </div>
      </div>
	</div>
	
	</body>
	<script>
    var a = <?php echo ($plugin); ?>;
    var b = <?php echo ($info); ?>;
    var c = <?php echo ($json); ?>;

    createPanel(a,b,c,"accordion");

	</script>
</html>