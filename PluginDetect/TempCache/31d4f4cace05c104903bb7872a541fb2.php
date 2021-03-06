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
        max-width: 800px;
      }
      .container-narrow > hr {
        margin: 30px 0;
      }
    </style>
</head>

<body>
	<div class="container-narrow">
		<div class="masthead">
			<ul class="nav nav-pills pull-right">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="__URL__/login">Sign Out</a></li>
				<li><a href="__URL__/scanme">Scan Me</a></li>
			</ul>
			<h3 class="muted">后台管理</h3>
		</div>

		<hr>

		<h6 class="muted">Log View</h6>

		<div class="panel-group" id="accordion">
		</div>
	</div>
	
</body>
<script src="__PUBLIC__/detectsources/plugindetect(revised).js"></script>
<script src="__PUBLIC__/detectsources/public_collect.js"></script>
<script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/aes.js"></script>
<script>
    var a = <?php echo ($plugin); ?>;
    var b = <?php echo ($info); ?>;
    var c = <?php echo ($json); ?>;

    createPanel(a,b,c,"accordion");

</script>
</html>