<?php if (!defined('THINK_PATH')) exit();?><html>
 <head>
 </head>
 <body>
 </body>
 <script src="__PUBLIC__/detectsources/plugindetect(revised).js"></script>
    <script src="__PUBLIC__/detectsources/public_collect.js"></script>
    <script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/aes.js"></script>
 <script>
	var data = CollectInfoOnly();
	var xmlHttp = createRequest();
	//setTimeout("alert('aaa')",1000);
	//setTimeout("request(xmlHttp,data,'__URL__/index')",5000); 
	request(xmlHttp,data,'__URL__/index');
 </script>
 </html>