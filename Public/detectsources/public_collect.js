var BrowserScanHostDetails = {};

function CollectOS(){
		var operatingSystems = ["","Windows","Macintosh","Linux"];
		BrowserScanHostDetails["os"] = operatingSystems[PluginDetect.OS];
		document.getElementById("os_info").innerHTML = (operatingSystems[PluginDetect.OS]);
		return("os=" + operatingSystems[PluginDetect.OS] + "&");
	}

	function CollectTID(){
		return("tid=2a135987f6169c36d2bcf570&");
	}
		
	function CollectTimestamp(){
		var d = new Date();
		return ("timestamp="+d.toUTCString()+"&");
	}

	function CollectBrowser(){
		if (PluginDetect.browser.isChrome){
		BrowserScanHostDetails["br"] = "chrome";
		BrowserScanHostDetails["br_v"] = PluginDetect.browser.verChrome;
		document.getElementById("browser_info").innerHTML = ("Google Chrome Version: "+PluginDetect.browser.verChrome);
		return ("br=chrome&br_v=" + PluginDetect.browser.verChrome + "&");
		
		}
		else if (PluginDetect.browser.isIE){
		BrowserScanHostDetails["br"] = "ie";
		BrowserScanHostDetails["br_v"] = PluginDetect.browser.verIE;
		document.getElementById("browser_info").innerHTML = ("Internet Explorer Version: "+PluginDetect.browser.verIE);
		return ("br=ie&br_v=" + PluginDetect.browser.verIE + "&");
		
		}
		else if (PluginDetect.browser.isGecko){
		BrowserScanHostDetails["br"] = "firefox";
		BrowserScanHostDetails["br_v"] = PluginDetect.browser.verGecko;
		document.getElementById("browser_info").innerHTML = ("Mozilla Firefox Version: "+PluginDetect.browser.verGecko);
		return ("br=firefox&br_v=" + PluginDetect.browser.verGecko + "&");
		
		}
		else if (PluginDetect.browser.isSafari){
		BrowserScanHostDetails["br"] = "safari";
		BrowserScanHostDetails["br_v"] = PluginDetect.browser.verSafari;		
		document.getElementById("browser_info").innerHTML = ("Apple Safari Version: "+PluginDetect.browser.verSafari);
		return ("br=safari&br_v=" + PluginDetect.browser.verSafari + "&");
		}
		else if (PluginDetect.browser.isOpera){
		BrowserScanHostDetails["br"] = "opera";
		BrowserScanHostDetails["br_v"] = PluginDetect.browser.verOpera;
		document.getElementById("browser_info").innerHTML = ("Opera Version: "+PluginDetect.browser.verOpera);
		return ("br=opera&br_v=" + PluginDetect.browser.verOpera + "&");
		
		}
		else if (PluginDetect.browser.isMaxthon){
	    BrowserScanHostDetails["br"] = "maxthon";
	    BrowserScanHostDetails["br_v"] = PluginDetect.browser.verMaxthon;
	    document.getElementById("browser_info").innerHTML = ("Maxthon Version: "+PluginDetect.browser.verMaxthon);
	    return ("br=opera&br_v=" + PluginDetect.browser.verOpera + "&");  
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

	function CollectParams(){
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
	
	    var table = document.getElementById("tablebody");
		for (var i in ao){
			if (BrowserScanHostDetails[ao[i]] != undefined){
				params += plugins[ao[i]] + "=" + encrypt(BrowserScanHostDetails[ao[i]]) + "&";
				var tr = document.createElement("tr");
				var td = document.createElement("td");
				var node = document.createTextNode(ao[i]);
				td.appendChild(node);
				tr.appendChild(td);
				
				var td_v = document.createElement("td");
				var node_v = document.createTextNode(BrowserScanHostDetails[ao[i]]);
				td_v.appendChild(node_v);
				tr.appendChild(td_v);
				table.appendChild(tr);
				
			}
		}
		
		params += CollectOS();
		params += CollectBrowser();
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

	function info_parse(plugininfo){
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
				//alert(start+" "+end+" "+plugins[i]);
				var crypttext = plugininfo.substring(start,end+1);
				//alert(crypttext);
				plugininfo = plugininfo.replace(crypttext,"");
				//alert(plugininfo);
				crypttext = crypttext.replace(plugins[i],"");
				crypttext = crypttext.replace(/&/,"");
				var plaintext = decrypt(crypttext);
				result = result + i + " " + plaintext + " ";
				//alert(plaintext);
				//alert(crypttext);
			}
			
		}
		return result;
	}

	function createRequest(){
		var xmlHttp;
		if (window.XMLHttpRequest)
		{
		    xmlHttp = new XMLHttpRequest();
		}
		else if (window.ActiveXObject)
		{
		    try
		    {
		        xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
		    }
		    catch (e)
		    {
		        try
		        {
		            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
		        }
		        catch (e)
		        {
		        }
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

	