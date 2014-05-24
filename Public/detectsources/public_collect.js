var BrowserScanHostDetails = {};

var iconsource = "/Public/detectsources/icons/";

var names = {
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

var IEdescription = {
	"AdobeReader":"Adobe Reader在线ActiveX控件",
	"DevalVR":"DevalVR Player在线ActiveX控件",
	"Flash":"Flash Player在线ActiveX控件",
	"Java":"Java Runtime Script Plug-in Library Deploy",
	"QuickTime":"QuickTime Player在线ActiveX控件",
	"RealPlayer":"RealPlayer在线ActiveX控件",
	"Shockwave":"Shockwave Player在线ActiveX控件",
	"SilverLight":"SilverLight在线ActiveX控件",
	"WMP":"Windows Media Player在线ActiveX控件",
	"VLC":"VLC在线ActiveX控件",
	"Xunlei":"",
	"Alipay":"支付宝在线支付密码控件iTrusPTA的ActiveX控件",
	"QQmail":"",
	"UPEditor":"",
	"Baofeng":"暴风影音Web插件",
	"Kugou":"酷狗音乐Web插件"
};

var nonIEdescription = {
	"AdobeReader":"Adobe Reader Web插件 For Firefox and Netscape",
	"DevalVR":"DevalVR Player Web插件",
	"Flash":"Flash Player Web插件",
	"Java":"Java Runtime Script Plug-in Library Deploy",
	"QuickTime":"QuickTime媒体播放器Web插件",
	"RealPlayer":"RealPlayer媒体播放器Web插件",
	"Shockwave":"Shockwave Player Web插件",
	"SilverLight":"SilverLight Web插件",
	"WMP":"Windows Media Player Web插件",
	"VLC":"VLC媒体播放器Web插件",
	"Xunlei":"迅雷脚本插件",
	"Alipay":"支付宝在线支付密码控件iTrusPTA For Firefox",
	"QQmail":"QQ邮箱插件 for WebKit",
	"UPEditor":"银联在线支付密码控件",
	"Baofeng":"",
	"Kugou":""
};

var links = {
	"AdobeReader":"http://www.adobe.com/downloads.html?promoid=JZEFW",
	"DevalVR":"http://www.devalvr.com/",
	"Flash":"http://get.adobe.com/tw/flashplayer/",
	"Java":"http://www.java.com/zh_CN/",
	"QuickTime":"http://www.apple.com/quicktime/",
	"RealPlayer":"http://www.realplayer.cn/",
	"Shockwave":"http://get.adobe.com/shockwave/",
	"SilverLight":"http://www.microsoft.com/silverlight/",
	"WMP":"http://windows.microsoft.com/en-us/windows/download-windows-media-player",
	"VLC":"http://www.videolan.org/",
	"Xunlei":"http://dl.xunlei.com/",
	"Alipay":"https://110.alipay.com/sc/aliedit/intro.htm",
	"QQmail":"http://service.mail.qq.com/cgi-bin/help?subtype=1&id=11&no=140",
	"UPEditor":"http://online.unionpay.com/static/help/detail_41.html",
	"Baofeng":"http://www.baofeng.com/",
	"Kugou":"http://www.kugou.com/"
};

function CollectOS(){
	var operatingSystems = ["","Windows","Macintosh","Linux"];
	BrowserScanHostDetails["os"] = operatingSystems[PluginDetect.OS];

	var icon = document.createElement("img");
	icon.setAttribute("src",iconsource + operatingSystems[PluginDetect.OS] + ".png");
	icon.setAttribute("alt","icon");
	icon.setAttribute("id","os_icon");
	icon.setAttribute("width",40);
	icon.setAttribute("height",40);

	if(document.getElementById("os_icon")){
		document.getElementById("os_info").parentNode.removeChild(document.getElementById("os_icon"));
	}
	document.getElementById("os_info").parentNode.insertBefore(icon,document.getElementById("os_info"));
	document.getElementById("os_info").innerHTML = (operatingSystems[PluginDetect.OS]);
	return("os=" + operatingSystems[PluginDetect.OS] + "&");
}

function CollectTID(){
	return("tid=2a135987f6169c36d2bcf570&");
}
	
function CollectTimestamp(){
	Date.prototype.Format = function(fmt)   
	{ //author: meizz   
	  var o = {   
	    "M+" : this.getMonth()+1,                 //月份   
	    "d+" : this.getDate(),                    //日   
	    "h+" : this.getHours(),                   //小时   
	    "m+" : this.getMinutes(),                 //分   
	    "s+" : this.getSeconds(),                 //秒   
	    "q+" : Math.floor((this.getMonth()+3)/3), //季度   
	    "S"  : this.getMilliseconds()             //毫秒   
	  };   
	  if(/(y+)/.test(fmt))   
	    fmt=fmt.replace(RegExp.$1, (this.getFullYear()+"").substr(4 - RegExp.$1.length));   
	  for(var k in o)   
	    if(new RegExp("("+ k +")").test(fmt))   
	  fmt = fmt.replace(RegExp.$1, (RegExp.$1.length==1) ? (o[k]) : (("00"+ o[k]).substr((""+ o[k]).length)));   
	  return fmt;   
	}  
	var d = new Date().Format("yyyy-MM-dd hh:mm:ss");    
	return ("timestamp=" + d + "&");
}

function CollectBrowser(){
	if (PluginDetect.browser.isChrome){
	BrowserScanHostDetails["br"] = "Chrome";
	BrowserScanHostDetails["br_v"] = PluginDetect.browser.verChrome;
	document.getElementById("browser_info").innerHTML = ("Google Chrome Version: "+PluginDetect.browser.verChrome);
	return ("br=Chrome&br_v=" + PluginDetect.browser.verChrome + "&");
	
	}
	else if (PluginDetect.browser.isIE){
	BrowserScanHostDetails["br"] = "IE";
	BrowserScanHostDetails["br_v"] = PluginDetect.browser.verIE;
	document.getElementById("browser_info").innerHTML = ("Internet Explorer Version: "+PluginDetect.browser.verIE);
	return ("br=IE&br_v=" + PluginDetect.browser.verIE + "&");
	
	}
	else if (PluginDetect.browser.isGecko){
	BrowserScanHostDetails["br"] = "Firefox";
	BrowserScanHostDetails["br_v"] = PluginDetect.browser.verGecko;
	document.getElementById("browser_info").innerHTML = ("Mozilla Firefox Version: "+PluginDetect.browser.verGecko);
	return ("br=Firefox&br_v=" + PluginDetect.browser.verGecko + "&");
	
	}
	else if (PluginDetect.browser.isSafari){
	BrowserScanHostDetails["br"] = "Safari";
	BrowserScanHostDetails["br_v"] = PluginDetect.browser.verSafari;		
	document.getElementById("browser_info").innerHTML = ("Apple Safari Version: "+PluginDetect.browser.verSafari);
	return ("br=Safari&br_v=" + PluginDetect.browser.verSafari + "&");
	}
	else if (PluginDetect.browser.isOpera){
	BrowserScanHostDetails["br"] = "Opera";
	BrowserScanHostDetails["br_v"] = PluginDetect.browser.verOpera;
	document.getElementById("browser_info").innerHTML = ("Opera Version: "+PluginDetect.browser.verOpera);
	return ("br=Opera&br_v=" + PluginDetect.browser.verOpera + "&");
	
	}
	else if (PluginDetect.browser.isMaxthon){
    BrowserScanHostDetails["br"] = "Maxthon";
    BrowserScanHostDetails["br_v"] = PluginDetect.browser.verMaxthon;
    document.getElementById("browser_info").innerHTML = ("Maxthon Version: "+PluginDetect.browser.verMaxthon);
    return ("br=Maxthon&br_v=" + PluginDetect.browser.verMaxthon + "&");  
  	}
}

   
function CollectPlugins(){
	var plugins = ["AdobeReader","DevalVR","Flash","Java","QuickTime","RealPlayer","Shockwave","SilverLight","WMP","VLC","Xunlei","Alipay","QQmail","UPEditor","Baofeng","Kugou"];
	for (var i in plugins){
	 	if (PluginDetect.getVersion(plugins[i]) != null){
	       CollectHostData(plugins[i],PluginDetect.getVersion(plugins[i]))
	    }
	}
}

function CollectHostData(software,version){
	BrowserScanHostDetails[software] = version;
}

function CollectParams(update){
    CollectPlugins();
    var params = "";
    var ao = ["AdobeReader","DevalVR","Flash","Java","QuickTime","RealPlayer","Shockwave","SilverLight","WMP","VLC","Xunlei","Alipay","QQmail","UPEditor","Baofeng","Kugou"];
    var plugins = {
        "AdobeReader":"reader",
        "DevalVR":"dvr",
        "Flash":"flash",
        "Java":"java",
        "QuickTime":"qt",
        "RealPlayer":"rp",
        "Shockwave":"shock",
        "SilverLight":"silver",
        "WMP":"wmp",
        "VLC":"vlc",
        "Xunlei":"xunlei",
        "Alipay":"alipay",
        "QQmail":"qqmail",
        "UPEditor":"upeditor",
        "Baofeng":"baofeng",
        "Kugou":"kugou"
        };
	
	var pluginStatus = {};
    var table = document.getElementById("tablebody");
	for (var i in ao){
		if (BrowserScanHostDetails[ao[i]] != undefined){
			var status = "info";
			if(update[ao[i]]){
				//alert(update[ao[i]]['windows']);
				if(isUpdated(BrowserScanHostDetails[ao[i]],update[ao[i]]['windows'])){
					pluginStatus[ao[i]] = "最新";
					status = "success";
				}
				else{
					pluginStatus[ao[i]] = "漏洞";
					status = "danger";
				}
			}
			
			params += plugins[ao[i]] + "=" + encrypt(BrowserScanHostDetails[ao[i]]) + "&";
			var tr = document.createElement("tr");
			tr.setAttribute("class",status);
			var td = document.createElement("td");

			var icon = document.createElement("img");
			icon.setAttribute("src",iconsource + ao[i] + ".png");
			icon.setAttribute("alt","icon");
			icon.setAttribute("width",30);
			icon.setAttribute("height",30);
			td.appendChild(icon);

			var node = document.createTextNode(names[ao[i]]);
			td.appendChild(node);
			td.setAttribute("valign","baseline");
			tr.appendChild(td);
			
			var td_v = document.createElement("td");
			var node_v = document.createTextNode(BrowserScanHostDetails[ao[i]]);
			td_v.appendChild(node_v);
			tr.appendChild(td_v);
			

			if(PluginDetect.browser.isIE){
				var td_info = document.createElement("td");
				var node_info = document.createTextNode(IEdescription[ao[i]]);
				td_info.appendChild(node_info);
				tr.appendChild(td_info);
			}
			else{
				var td_info = document.createElement("td");
				var node_info = document.createTextNode(nonIEdescription[ao[i]]);
				td_info.appendChild(node_info);
				tr.appendChild(td_info);
			}
			
			var td_status = document.createElement("td");
			var node_status = document.createTextNode(pluginStatus[ao[i]]);
			td_status.appendChild(node_status);
			tr.appendChild(td_status);

			var td_operation = document.createElement("td");
			var btn_operation = document.createElement("a");
			btn_operation.setAttribute("href",links[ao[i]]);
			if(status == "success"){
				btn_operation.setAttribute("class","btn btn-success");
				var node_operation = document.createTextNode("安全");
				btn_operation.appendChild(node_operation);
			}
			else if(status == "danger"){
				btn_operation.setAttribute("class","btn btn-danger");
				var node_operation = document.createTextNode("更新");
				btn_operation.appendChild(node_operation);
			}
			else if(status == "info"){
				btn_operation.setAttribute("class","btn btn-info");
				var node_operation = document.createTextNode("查验");
				btn_operation.appendChild(node_operation);
			}

			td_operation.appendChild(btn_operation);
			tr.appendChild(td_operation);

			table.appendChild(tr);
		}
	}
	
	params += CollectOS();
	params += CollectBrowser();

	var icon = document.createElement("img");
	icon.setAttribute("src",iconsource + BrowserScanHostDetails["br"] + ".png");
	icon.setAttribute("alt","icon");
	icon.setAttribute("id","br_icon");
	icon.setAttribute("width",40);
	icon.setAttribute("height",40);

	if(document.getElementById("br_icon")){
		document.getElementById("browser_info").parentNode.removeChild(document.getElementById("br_icon"));
	}
	document.getElementById("browser_info").parentNode.insertBefore(icon,document.getElementById("browser_info"));
	//alert(CollectBrowser());
	params += CollectTimestamp();
	//params += CollectTID();
	return params;
}

function encrypt(Message)
{
	var encrypted = CryptoJS.AES.encrypt(Message,"yeruby");
	//alert(encrypted);
	return encrypted;
	
}

function decrypt(encrypted){
	var decrypted = CryptoJS.AES.decrypt(encrypted,"yeruby");
	//alert(decrypted.toString(CryptoJS.enc.Utf8));
	return decrypted.toString(CryptoJS.enc.Utf8);
}

function info_parseDecrypt(plugininfo){
	var plugins = {
	        "AdobeReader":"reader=",
	        "DevalVR":"dvr=",
	        "Flash":"flash=",
	        "Java":"java=",
	        "QuickTime":"qt=",
	        "RealPlayer":"rp=",
	        "Shockwave":"shock=",
	        "SilverLight":"silver=",
	        "WMP":"wmp=",
	        "VLC":"vlc=",
	        "Xunlei":"xunlei=",
	        "Alipay":"alipay=",
	        "QQmail":"qqmail=",
	        "UPEditor":"upeditor=",
	        "Baofeng":"baofeng=",
	        "Kugou":"kugou="
	        };
	var result = "";
	for(var i in plugins){
		var start = plugininfo.indexOf(plugins[i]);
		if(start!=-1){
			var end = plugininfo.indexOf("&");
			var crypttext = plugininfo.substring(start,end+1);
			plugininfo = plugininfo.replace(crypttext,"");
			crypttext = crypttext.replace(plugins[i],"");
			crypttext = crypttext.replace(/&/,"");
			var plaintext = decrypt(crypttext);
			result = result + i + " " + plaintext + " ";
		}
		
	}
	return result;
}

function createRequest(){
	var xmlHttp;
	if (window.XMLHttpRequest){
	    xmlHttp = new XMLHttpRequest();
	}
	else if (window.ActiveXObject)
	{
	    try{
	        xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
	    }
	    catch (e)
	    {
	        try{
	            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
	        }
	        catch (e) {}
	    }
	}
	return xmlHttp;
}

function request(xmlHttp,data,url)
{
	xmlHttp.open("POST",url, false);
	xmlHttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');	
	xmlHttp.send(data);

	//alert(xmlHttp.responseText);
}

function isUpdated(present,update)
{
	var a = present.split(",");
	//alert(update);
	var b = PluginDetect.formatNum(update).split(",");
	for(i in a){
		if(a[i]<b[i]) return false;
	}
	return true;
}

function CollectBrowserOnly(){
	if (PluginDetect.browser.isChrome){
	BrowserScanHostDetails["br"] = "Chrome";
	BrowserScanHostDetails["br_v"] = PluginDetect.browser.verChrome;
	return ("br=Chrome&br_v=" + PluginDetect.browser.verChrome + "&");
	}
	else if (PluginDetect.browser.isIE){
	BrowserScanHostDetails["br"] = "IE";
	BrowserScanHostDetails["br_v"] = PluginDetect.browser.verIE;
	return ("br=IE&br_v=" + PluginDetect.browser.verIE + "&");
	}
	else if (PluginDetect.browser.isGecko){
	BrowserScanHostDetails["br"] = "Firefox";
	BrowserScanHostDetails["br_v"] = PluginDetect.browser.verGecko;
	return ("br=Firefox&br_v=" + PluginDetect.browser.verGecko + "&");
	
	}
	else if (PluginDetect.browser.isSafari){
	BrowserScanHostDetails["br"] = "Safari";
	BrowserScanHostDetails["br_v"] = PluginDetect.browser.verSafari;		
	return ("br=Safari&br_v=" + PluginDetect.browser.verSafari + "&");
	}
	else if (PluginDetect.browser.isOpera){
	BrowserScanHostDetails["br"] = "Opera";
	BrowserScanHostDetails["br_v"] = PluginDetect.browser.verOpera;
	return ("br=Opera&br_v=" + PluginDetect.browser.verOpera + "&");
	}
	else if (PluginDetect.browser.isMaxthon){
    BrowserScanHostDetails["br"] = "Maxthon";
    BrowserScanHostDetails["br_v"] = PluginDetect.browser.verMaxthon;
    return ("br=Maxthon&br_v=" + PluginDetect.browser.verMaxthon + "&");  
  	}
}

function CollectOSOnly(){
	var operatingSystems = ["","Windows","Macintosh","Linux"];
	BrowserScanHostDetails["os"] = operatingSystems[PluginDetect.OS];
	return("os=" + operatingSystems[PluginDetect.OS] + "&");
}

function CollectInfoOnly(){
	CollectPlugins();
    var params = "";
    var ao = ["AdobeReader","DevalVR","Flash","Java","QuickTime","RealPlayer","Shockwave","SilverLight","WMP","VLC","Xunlei","Alipay","QQmail","UPEditor","Baofeng","Kugou"];
    var plugins = {
        "AdobeReader":"reader",
        "DevalVR":"dvr",
        "Flash":"flash",
        "Java":"java",
        "QuickTime":"qt",
        "RealPlayer":"rp",
        "Shockwave":"shock",
        "SilverLight":"silver",
        "WMP":"wmp",
        "VLC":"vlc",
        "Xunlei":"xunlei",
        "Alipay":"alipay",
        "QQmail":"qqmail",
        "UPEditor":"upeditor",
        "Baofeng":"baofeng",
        "Kugou":"kugou"
        };
	
	for (var i in ao){
		if (BrowserScanHostDetails[ao[i]] != undefined){
			params += plugins[ao[i]] + "=" + encrypt(BrowserScanHostDetails[ao[i]]) + "&";
		}
	}
	
	params += CollectOSOnly();
	params += CollectBrowserOnly();
	//alert(CollectBrowser());
	params += CollectTimestamp();
	//params += CollectTID();
	return params;
}

function createContentTable(plugin,info,latest_list){
    var info_table = $("<table></table>").addClass("table");

    var plugins = {
      "AdobeReader":"reader=",
      "DevalVR":"dvr=",
      "Flash":"flash=",
      "Java":"java=",
      "QuickTime":"qt=",
      "RealPlayer":"rp=",
      "Shockwave":"shock=",
      "SilverLight":"silver=",
      "WMP":"wmp=",
      "VLC":"vlc=",
      "Xunlei":"xunlei=",
      "Alipay":"alipay=",
      "QQmail":"qqmail=",
      "UPEditor":"upeditor=",
      "Baofeng":"baofeng=",
      "Kugou":"kugou="
      };

    for(var i in plugins){
      var start = plugin.indexOf(plugins[i]);
      if(start!=-1){
        var end = plugin.indexOf("&");
        var crypttext = plugin.substring(start,end+1);
        plugin = plugin.replace(crypttext,"");
        crypttext = crypttext.replace(plugins[i],"");
        crypttext = crypttext.replace(/&/,"");
        var plaintext = decrypt(crypttext);
        
        var plugin_tag = $("<td></td>");
        var icon = $("<img></img>");
		icon.attr("src",iconsource + i + ".png");
		icon.attr("alt","icon");
		icon.attr("width",40);
		icon.attr("height",40);
		plugin_tag.append(icon);
		plugin_tag.append(names[i]);
		//plugin_tag.text(names[i]);

        var version_tag = $("<td></td>").text(plaintext);

        if(info.indexOf("IE")!=-1){
          var description_tag = $("<td></td>").text(IEdescription[i]);
        }
        else{
          var description_tag = $("<td></td>").text(nonIEdescription[i]);
        }

        if(latest_list[i]){
          var latest_tag = $("<td></td>").text(latest_list[i]['windows']);
        }
        else{
          var latest_tag = $("<td></td>").text("Unknown");
        }

        var info_row = $("<tr></tr>").append(plugin_tag);
        info_row.append(version_tag);
        info_row.append(description_tag);
        info_row.append(latest_tag);

        info_table.append(info_row);

      }
      
    }
    return info_table;
}

function createPanel(plugin,info,latest,accordion){
  for(i in info){
  	var index = info.length-i-1;
    var panel = $("<div></div>").addClass("panel panel-default");
    var heading_div = $("<div></div>").addClass("panel-heading");
    var heading_h = $("<h4></h4>").addClass("panel-title");
    var heading_href = $("<a></a>").text("#"+i+" "+info[index]['timestamp']+" "+info[index]["ip"]+" "+info[index]['os']+" "+info[index]['browser']);
    heading_href.attr("data-toggle","collapse");
    heading_href.attr("data-parent","#accordion");
    heading_href.attr("data-target","#collapse"+info[index]['id']);
    heading_href.attr("href","#collapse"+info[index]['id']);
    heading_href.addClass("collapsed");

    heading_h.append(heading_href);
    heading_div.append(heading_h);
    panel.append(heading_div);

    var content = $("<div></div>").attr("id","collapse"+info[index]['id']);
    content.addClass("panel-collapse collapse");
    content.attr("style","height: 0px;");

    var content_body = $("<div></div>").addClass("panel-body");
    content_body.append(createContentTable(plugin[index]['plugininfo'],info[index]['browser'],latest));

    content.append(content_body);
    panel.append(content);

    $("#"+accordion).append(panel);
  }
}