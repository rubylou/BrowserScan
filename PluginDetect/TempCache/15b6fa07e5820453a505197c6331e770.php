<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Browser &middot; Scan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="__PUBLIC__/detectsources/bootstrap.css" rel="stylesheet">
    <link href="__PUBLIC__/detectsources/flat-ui.css" rel="stylesheet">
    <script scr="__PUBLIC__/detectsources/bootstrap.js"></script>
    

    <style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 40px;
      }

      /* Main marketing message and sign up button */
      .jumbotron {
        margin: 60px 0;
        text-align: center;
      }
      .jumbotron h1 {
        font-size: 72px;
        line-height: 1;
      }
      .jumbotron .btn {
        font-size: 21px;
        padding: 14px 24px;
      }
    </style>
  </head>

  <body>

    <div class="container">

      <div class="masthead">
        <ul class="nav nav-pills pull-right">
          <li class="active"><a href="#">Home</a></li>
          <li><a href="__URL__/login">Sign in</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
        <h3 class="muted">Browser Scan</h3>
      </div>

      <hr>

      <div class="jumbotron">
        <h1>Scan and protect your browser!</h1>
        <p class="lead">We are trying to figure out your browser environment including your browser's version and plugins' version. Then show you the result of the scanning and suggestion for your browser protection.</p>
        <button type="submit" href="#" class="btn btn-success" onclick="display()">Scan Now</button>
    	
      </div>

      <hr>
      
      <div class="container-fluid">
        <div class="row-fluid">
          <div class="span12">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Plugin</th>
                  <th>Version</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Operation</th>
                </tr>
              </thead>
              <tbody id="tablebody">
                
              </tbody>
            </table>
          </div>
        </div>
      </div>  
       
      <hr>
      
      <div class="row-fluid marketing">
        <div class="row">
          <div class="col-md-3">
            <span>Browser Information</span>
          </div>
          <div class="col-md-6">
            <span id="browser_info"></span>
          </div>
        </div>
        
        <hr>
        
        <div class="row">
          <div class="col-md-3">
            <span>OS Information</span>
          </div>
          <div class="col-md-3">
            <span id="os_info"></span>
          </div>
        </div>
               
      </div>
      
      <hr>

      <div class="footer">
        <p>&copy; Company 2014</p>
      </div>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="__PUBLIC__/detectsources/plugindetect(revised).js"></script>
    <script src="__PUBLIC__/detectsources/public_collect.js"></script>
    <script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/aes.js"></script>
    <script>
    var a = <?php echo ($json); ?>;
    //alert(a[0]['windows']);

  	function display(){
  		var table = document.getElementById("tablebody");
  		var parent = table.parentNode;
  		parent.removeChild(table);
  		var table_new = document.createElement("tbody");
  		table_new.setAttribute("id", "tablebody");
  		parent.appendChild(table_new);
  		var data = CollectParams(a);
  		
  		//document.getElementById("browser_info").innerHTML = CollectBrowser();
  		//document.getElementById("os_info").innerHTML = CollectOS();

  		var xmlHttp = createRequest();
  		request(xmlHttp,data,"__URL__/scanme");
  		//window.location.href="__URL__/scanme"; 
      //alert(CollectInfoOnly());
  	}

    </script>
  </body>
</html>