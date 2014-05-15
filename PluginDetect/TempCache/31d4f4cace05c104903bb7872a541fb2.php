<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<link href="__PUBLIC__/detectsources/bootstrap.css" rel="stylesheet">
</head>

<body>
</body>

<script src="__PUBLIC__/detectsources/public_collect.js"></script>
<script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/aes.js"></script>
<script>

//alert(a[0]['plugininfo']);
var a = <?php echo ($json); ?>;
for(var i in a){
	document.write("IP address: " + a[i]['ip']);
	document.write(" Browser: " + a[i]['browser']);
	document.write(" " + a[i]['browserversion']);
	document.write(" OS: " + a[i]['os']);
	document.write(" Timestamp: " + a[i]['timestamp']);
	document.write(" Plugins: ");
	document.write(info_parse(a[i]['plugininfo']));
	document.write("</br>");
}


</script>
</html>