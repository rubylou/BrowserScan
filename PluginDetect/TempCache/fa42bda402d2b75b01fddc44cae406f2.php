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
    <script src="__PUBLIC__/detectsources/Chart.js"></script>
    <script src="__PUBLIC__/detectsources/aes.js"></script>

    <style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 40px;
      }

      /* Main marketing message and sign up button */
       .container-narrow {
        margin: 0 auto;
        max-width: 700px;
      }
      .container-narrow > hr {
        margin: 30px 0;
      }

      .chart-legend ul {
          list-style: none;
          width: 100%;
          margin: 30px auto 0;
      }

      .chart-legend li {
          text-indent: 16px;
          line-height: 24px;
          position: relative;
          font-weight: 200;
          display: block;
          float: left;
          width: 50%;
          font-size: 0.8em;
      }
      .chart-legend  li:before {
          display: block;
          width: 10px;
          height: 16px;
          position: absolute;
          left: 0;
          top: 3px;
          content: "";
      }
      .Windows:before { background-color: rgba(151,187,205,0.5); }
      .Macintosh:before { background-color: rgba(220,220,220,0.5); }
      .Linux:before { background-color: #7D4F6D; }

      .AdobeReader:before { background-color: #3498DB; }
      .DevalVR:before { background-color: #66CCFF; }
      .Flash:before { background-color: #99CCFF; }
      .Java:before { background-color: #9B59B6; }
      .QuickTime:before { background-color: #FF99CC; }
      .RealPlayer:before { background-color: #F1C40F; }
      .Shockwave:before { background-color: #F39C12; }
      .SilverLight:before { background-color: #D35400; }
      .WMP:before { background-color: #E74C3C; }
      .VLC:before { background-color: #C0392B; }
      .Xunlei:before { background-color: #34495E; }
      .Alipay:before { background-color: #7F8C8D; }
      .QQmail:before { background-color: #BDC3C7; }
      .UPEditor:before { background-color: #99CC99; }
      .Baofeng:before { background-color: #2ECC71; }
      .Kugou:before { background-color: #1ABC9C; }

    </style>
	</head>

	<body>
    <div class="container">
      <div class="masthead">
          <img src="__PUBLIC__/detectsources/browserscan.png" alt="BrowserScan"></img>
      </div>
    </div>

	<div class="container-narrow">

    <hr>
      <!--<div class="panel-group" id="accordion">
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
      </div>-->
      <h4 class="muted">浏览器类型分布</h4>
      <canvas id="osChart" height="300px" width="600px"></canvas>

      <div class="row">
        <div class="chart-legend">
            <ul>
                <li class="Windows">Windows</li>
                <li class="Macintosh">Macintosh</li>
                <li class="Linux">Linux</li>
            </ul>
        </div>
      </div>
      <h4 class="muted">时间线</h4>
      <canvas id="dayChart" height="300px" width="600px"></canvas>
      <h4 class="muted">插件类型分布</h4>
      <canvas id="pluginChart" height="300px" width="600px"></canvas>
      <div class="row">
        <div class="chart-legend">
            <ul id = "plugin_ul">
            </ul>
        </div>
      </div>
	</div>
	
	</body>
	<script>
      //CollectOthers();
      drawBarChart(<?php echo ($os); ?>);
      drawLineChart(<?php echo ($day); ?>);
      drawDoughnutChart(<?php echo ($plugin); ?>);

      function drawBarChart(data){
        if(data){
          var a = data;
          var length = a.length;
          var canvas = document.getElementById("osChart");
          canvas.setAttribute("width",length*100+"px");
          var ctx = document.getElementById("osChart").getContext("2d");
          var label = new Array();
          var datalabel_windows = new Array();
          var datalabel_mac = new Array();
          var datalabel_linux = new Array();

          for(var i in a){
            label[i] = a[i]['browser'];
            datalabel_windows[i] = parseInt(a[i]['Windows']);
            datalabel_mac[i] = parseInt(a[i]['Macintosh']);
            datalabel_linux[i] = parseInt(a[i]['Linux']);
          }

          var data = {
            labels : label,
            datasets : [
              {
                fillColor : "rgba(151,187,205,0.5)",
                strokeColor : "rgba(151,187,205,1)",
                data : datalabel_windows
              },
              {
                fillColor : "rgba(220,220,220,0.5)",
                strokeColor : "rgba(220,220,220,1)",
                data : datalabel_mac
              },
              {
                fillColor : "#7D4F6D",
                strokeColor : "rgba(220,220,220,1)",
                data : datalabel_linux
              }
            ]
          }
          var myNewChart = new Chart(ctx).Bar(data,null);
        }
      }
      
      function drawLineChart(data){
        if(data){
          var a = data;
          var length = a.length;
          var canvas = document.getElementById("dayChart");
          canvas.setAttribute("width",length*100+"px");
          var ctx = document.getElementById("dayChart").getContext("2d");
          
          var label = new Array();
          var datalabel = new Array();

          for(var i in a){
            label[i] = a[i]['date'];
            datalabel[i] = parseInt(a[i]['sum']);
          }

          var data = {
          labels : label,
          datasets : [
            {
              fillColor : "#C7604C",
              strokeColor : "rgba(151,187,205,1)",
              pointColor : "#C7604C",
              pointStrokeColor : "#fff",
              data : datalabel
            }
          ]
        }
          var myNewChart = new Chart(ctx).Line(data,null);
        }
      }

      
      function drawDoughnutChart(data){
        if(data){
        var a = data;
        //var length = a.length;
        //var canvas = document.getElementById("pluginChart");
        //canvas.setAttribute("width",length*100+"px");
        var ctx = document.getElementById("pluginChart").getContext("2d");
        var label = {
          "AdobeReader":"Adobe Reader",
          "DevalVR":"DevalVR",
          "Flash":"Adobe Flash",
          "Java":"Oracle Java",
          "QuickTime":"Apple QuickTime",
          "RealPlayer":"RealPlayer",
          "Shockwave":"Shockwave",
          "SilverLight":"Microsoft Silverlight",
          "WMP":"Windows Media Player",
          "VLC":"VLC",
          "Xunlei":"迅雷",
          "Alipay":"支付宝",
          "QQmail":"QQ邮箱",
          "UPEditor":"银联",
          "Baofeng":"暴风影音",
          "Kugou":"酷狗音乐"
        };
        var datalabel = new Array();

        for(var i in label){
          var plugin_li = $("<li></li>").text(label[i]);
          plugin_li.addClass(i);
          $("#plugin_ul").append(plugin_li);
        }
       
        for(var j = 0; j<a.length;j++){
          datalabel[j] = parseInt(a[j]);
        }

        var data = [
          {
            value: datalabel[0],
            color:"#3498DB"
          },
          {
            value : datalabel[1],
            color : "#66CCFF"
          },
          {
            value : datalabel[2],
            color : "#99CCFF"
          },
          {
            value : datalabel[3],
            color : "#9B59B6"
          },
          {
            value : datalabel[4],
            color : "#FF99CC"
          },
           {
            value: datalabel[5],
            color:"#F1C40F"
          },
          {
            value : datalabel[6],
            color : "#F39C12"
          },
          {
            value : datalabel[7],
            color : "#D35400"
          },
          {
            value : datalabel[8],
            color : "#E74C3C"
          },
          {
            value : datalabel[9],
            color : "#C0392B"
          }, 
          {
            value: datalabel[10],
            color:"#34495E"
          },
          {
            value : datalabel[11],
            color : "#7F8C8D"
          },
          {
            value : datalabel[12],
            color : "#BDC3C7"
          },
          {
            value : datalabel[13],
            color : "#99CC99"
          },
          {
            value : datalabel[14],
            color : "#2ECC71"
          },
          {
            value : datalabel[15],
            color : "#1ABC9C"
          }
        ];
        var myNewChart = new Chart(ctx).Doughnut(data,null);
      }
    }
      
	</script>
</html>