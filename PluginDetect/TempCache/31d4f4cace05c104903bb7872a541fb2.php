<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<meta charset="utf-8">
    <title>Browser &middot; Scan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<link href="__PUBLIC__/detectsources/bootstrap.css" rel="stylesheet">
	<link href="__PUBLIC__/detectsources/flat-ui.css" rel="stylesheet">
</head>

<body>
	<div class="container">
		<div class="masthead">
			<ul class="nav nav-pills pull-right">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="__URL__/scanme">Sign Up</a></li>
				<li><a href="#">Contact</a></li>
			</ul>
			<h3 class="muted">Detection Monitor</h3>
		</div>

		<hr>

		<h6 class="muted">Log View</h6>
		<div class="row">
			<div style="height:500px; overflow:scroll;">
				<table class="table table-hover table-bordered table-condensed table-responsive" style="white-space: nowrap;">
					<tr class="success">
						<th>IP地址</th>
						<th>浏览器</th>
						<th>操作系统</th>
						<th>时间戳</th>
						<th>插件</th>
					</tr>
					
					<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr id="record<?php echo ($vo["id"]); ?>">
							<td><?php echo ($vo["ip"]); ?></td>
							<td><?php echo ($vo["browser"]); ?></td>
							<td><?php echo ($vo["os"]); ?></td>
							<td><?php echo ($vo["timestamp"]); ?></td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>	
				</table>
			</div>
		</div>
</body>

<script src="__PUBLIC__/detectsources/public_collect.js"></script>
<script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/aes.js"></script>
<script>

//alert(a[0]['plugininfo']);
var a = <?php echo ($json); ?>;
for(var i in a){
	var x = document.getElementById('record'+a[i]['id']);
	var text = document.createTextNode(info_parse(a[i]['plugininfo']));
	var node = document.createElement("td");
	node.appendChild(text);
	x.appendChild(node);
	//alert(x.id);
}

//x=document.getElementsByTagName("tr");
//alert(x.length);
</script>
</html>