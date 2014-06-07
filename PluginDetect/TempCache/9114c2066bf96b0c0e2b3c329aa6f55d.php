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
	  html {   
		min-height: 100%;   
		_height:100%;   
	  }  
      body {
        padding-top: 20px;
        padding-bottom: 40px;
		min-height: 100%;   
		_height:100%;   
      }

      /* Main marketing message and sign up button */
       .container-narrow {
        margin: 0 auto;
        max-width: 1200px;
      }
      .container-narrow > hr {
        margin: 30px 0;
      }
	  
	  .container {
		min-height: 100%;   
		_height:100%;   
	  }

      img {
      	vertical-align: bottom;
      }

      a,
      h6,
      table,
      .text-center
      {
      	font-family: Microsoft Yahei;
      }
	  
	  table,
	  .text-center
	  {
		font-size:13px;
	  }
	</style>
</head>

<body>
	<div class="container">
		<div class="masthead">
			<ul class="nav nav-pills pull-right">
				<li><a href="__URL__/index">退出</a></li>
			</ul>
			<img src="__PUBLIC__/detectsources/browserscan.png" alt="BrowserScan"></img>
			<img src="__PUBLIC__/detectsources/admin.png" alt="Admin"></img>
		</div>

		<hr>

		<h6 class="muted">记录查看</h6>

		<div style="height:600px;">
			<table class="table table-hover table-striped table-condensed table-responsive" style="white-space: nowrap;">
				<tr class="success">
					<th>时间</th>
					<th>IP地址</th>
					<th>操作系统</th>
					<th>浏览器</th>
					<th>插件</th>
				</tr>
				
				
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
						<td><?php echo ($vo["timestamp"]); ?></td>
						<td><a href="http://ip138.com/ips138.asp?ip=<?php echo ($vo["ip"]); ?>&action=2" class="text-danger"><?php echo ($vo["ip"]); ?></a></td>
						<td><?php echo ($vo["os"]); ?></td>
						<td><?php echo ($vo["browser"]); ?></td>
						<td><input type="submit" class="btn btn-info" value="详细信息" onclick="javascript:window.open('__URL__/detail?id=<?php echo ($vo["id"]); ?>');"></input></td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</table>
			<div class="text-center">
				<div id="page"><<?php echo ($page); ?>></div>
			</div>
		</div>
	</div>
	
</body>
<script src="__PUBLIC__/detectsources/plugindetect(revised).js"></script>
<script src="__PUBLIC__/detectsources/public_collect.js"></script>
<script src="__PUBLIC__/detectsources/aes.js"></script>
<script>
	function mySubmit(){
		window.open("__URL__/detail?id=189");
	} 
</script>

</html>