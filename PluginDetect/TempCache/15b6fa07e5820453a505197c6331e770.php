<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
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

      /* Custom container */
      .container-narrow {
        margin: 0 auto;
        max-width: 700px;
      }
      .container-narrow > hr {
        margin: 30px 0;
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

      /* Supporting marketing content */
      .marketing {
        margin: 60px 0;
      }
      .marketing p + h4 {
        margin-top: 28px;
      }
      table {  
        border: 1px solid #B1CDE3;  
        padding:0;   
        margin:0 auto;  
        border-collapse: collapse;  
      }  
          
      td {  
        border: 1px solid #B1CDE3;  
        background: #fff;  
        font-size:14px;  
        padding: 3px 3px 3px 8px;  
        color: #4f6b72; 
        font-weight: bold; 
      }  
    </style>
  </head>

  <body>

    <div class="container-narrow">

      <div class="masthead">
        <ul class="nav nav-pills pull-right">
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
        <h3 class="muted">Browser Scan</h3>
      </div>

      <hr>

      <div class="jumbotron">
        <h1>Scan and protect your browser!</h1>
        <p class="lead">We are trying to figure out your browser environment including your browser's version and plugins' version. Then show you the result of the scanning and suggestion for your browser protection.</p>
        <input type="submit" value="Scan Now" class="btn btn-success" onclick="display()"/>
    	
      </div>

      <hr>
      
      <div class="container-fluid">
        <div class="row-fluid">
          <div class="span12">
            <table class="table table-hover table-striped">
              <thead>
                <tr>
                  <th>Plugin</th>
                  <th>Version</th>
                  <th>Description</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody id="tablebody">
                
              </tbody>
            </table>
          </div>
        </div>
      </div>  
       
      <div class="row-fluid marketing">
        <div class="span6">
          <span>Browser Information</span>
          <p id="browser_info"></p>
        </div>
        
        <div class="span6">
          <span>OS Information</span>
          <p id="os_info"></p>
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
  	function display(){
  		var table = document.getElementById("tablebody");
  		var parent = table.parentNode;
  		parent.removeChild(table);
  		var table_new = document.createElement("tbody");
  		table_new.setAttribute("id", "tablebody");
  		parent.appendChild(table_new);
  		var data = CollectParams();
  		
  		//document.getElementById("browser_info").innerHTML = CollectBrowser();
  		//document.getElementById("os_info").innerHTML = CollectOS();

  		var xmlHttp = createRequest();
  		request(xmlHttp,data,"__URL__/scanme");
  		//window.location.href="__URL__/scanme"; 
  	}

    
    </script>

  </body>
</html>