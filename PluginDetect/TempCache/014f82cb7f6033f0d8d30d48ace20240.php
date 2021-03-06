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
		<style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 40px;
      }

      /* Main marketing message and sign up button */
       .container-narrow {
        margin: 0 auto;
        max-width: 1200px;
      }
      .container-narrow > hr {
        margin: 30px 0;
      }

      table,
      h4,
      h6,
      span
       {
      	font-family: Microsoft YaHei,Georgia;
      }
	  
	  table,
	  span {
		font-size:13px;
	  }
    </style>
</head>

<body>
	<div class="container">
		<div class="masthead">
			<img src="__PUBLIC__/detectsources/browserscan.png" alt="BrowserScan"></img>
		</div>

		<hr>

		<h4 class="muted">IP地址：<a href="http://ip138.com/ips138.asp?ip=<?php echo ($data["ip"]); ?>&action=2" class="text-warning"><?php echo ($data["ip"]); ?></a></h4>
		<h6 class="muted"><?php echo ($data["timestamp"]); ?></h6>

		<div class="row-fluid marketing">
			<div class="row">
	          <div class="col-md-2">
	            <span>操作系统:</span>
	          </div>
	          <div class="col-md-3">
	            <span id="os_info"></span>
	          </div>
	        </div>

	        <div class="row">
	          <div class="col-md-2">
	            <span>浏览器:</span>
	          </div>
	          <div class="col-md-6">
	            <span id="browser_info"></span>
	          </div>
	        </div>

	        <div class="row">
	          <div class="col-md-3">
	            <span>插件列表:</span>
	          </div>
	        </div>
	                
	    </div>

		<div id="table_area">
		</div>
	</div>

	
</body>
<script src="__PUBLIC__/detectsources/plugindetect(revised).js"></script>
<script src="__PUBLIC__/detectsources/public_collect.js"></script>
<script src="__PUBLIC__/detectsources/aes.js"></script>
<script>
	showTaginfo("os_info","<?php echo ($data["os"]); ?>","<?php echo ($data["os"]); ?>","os_icon");
	showTaginfo("browser_info","<?php echo ($data["browser"]); ?> <?php echo ($data["browserversion"]); ?>","<?php echo ($data["browser"]); ?>","br_icon");
	
	if(<?php echo ($plugin); ?>){
		var table = createContentTable(<?php echo ($plugin); ?>,"<?php echo ($data["browser"]); ?>");
		$("#table_area").append(table);
	}
	else{
		$("#table_area").append($("<span>无</span>"));
	}
	
</script>
</html>