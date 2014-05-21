<?php
//删除数组指定元素
function array_remove(&$arr, $offset) 
{ 
array_splice($arr, $offset, 1); 
} 

function spider($url,$keywords,$value){
	header('Content-Type: text/html; charset=gbk');
	//$url ="http://www.jj59.com/qingganwenzhang/093750.html";
	$lines_string= file_get_contents($url);//read entire web file into array
	//echo($lines_string);
	$count=count($lines_string);
	for($i=0;$i<$count;$i++){
	 if(preg_match($keywords,$lines_string,$title)){//标题
	  	$title=$title[$value];
	 	//dump($title);
	  }
	}
	return $title;
}

function updatePlugin($pluginName,$newVersion){
	$Form = M("spider");

	$Existed = $Form->select($pluginName);

	if($Existed){
		$data['plugin'] = $pluginName;
        $data['windows'] = $newVersion;
        $result = $Form->save($data);
	}
	else{
		$data['plugin'] = $pluginName;
        $data['windows'] = $newVersion;
        $temp = $Form->create($data);
        $result = $Form->add($temp);
	}
}

function crawler(){
        /*$flash = spider("https://pfs.mozilla.org/plugins/PluginFinderService.php?mimetype=application/x-shockwave-flash&appID={ec8030f7-c20a-464f-9b0e-13a3a9e97384}&appVersion=20140314220517&clientOS=Windows%20NT%206.2&chromeLocale=en-US","/<pfs:version>(.*)<\/pfs:version>/i",1);
        echo $flash."</br>";
        updatePlugin('Flash',$flash);

        $wmp = spider("https://pfs.mozilla.org/plugins/PluginFinderService.php?mimetype=application/x-mplayer2&appID={ec8030f7-c20a-464f-9b0e-13a3a9e97384}&appVersion=20140314220517&clientOS=Windows%20NT%206.2&chromeLocale=en-US","/<pfs:version>(.*)<\/pfs:version>/i",1);
        echo $wmp."</br>";
        updatePlugin('WMP',$wmp);

        $realplayer = spider("https://pfs.mozilla.org/plugins/PluginFinderService.php?mimetype=audio/x-pn-realaudio-plugin&appID={ec8030f7-c20a-464f-9b0e-13a3a9e97384}&appVersion=20140314220517&clientOS=Windows%20NT%206.2&chromeLocale=en-US","/<pfs:version>(.*)<\/pfs:version>/i",1);
        echo $realplayer."</br>";
        updatePlugin('RealPlayer',$realplayer);

        $shockwave = spider("https://pfs.mozilla.org/plugins/PluginFinderService.php?mimetype=application/x-director&appID={ec8030f7-c20a-464f-9b0e-13a3a9e97384}&appVersion=20140314220517&clientOS=Windows%20NT%206.2&chromeLocale=en-US","/<pfs:version>(.*)<\/pfs:version>/i",1);
        echo $shockwave."</br>";
        updatePlugin('Shockwave',$shockwave);

        $vlc = spider("http://www.videolan.org/vlc/download-windows.html","/<h1>Download\s*latest\s*VLC\s*-\s*\d+\.\d+\.\d+<\/h1>/i",0);
        if(preg_match("/\d+\.\d+\.\d+/i",$vlc,$value)){
            $vlc=$value[0];
        }
        echo $vlc."</br>";
        updatePlugin('VLC',$vlc);*/

        $quicktime = spider("https://swdlp.apple.com/iframes/81/en_us/81_en_us.html","/QuickTime\s*\d+\.\d+\.\d+/i",0);
        if(preg_match("/\d+\.\d+\.\d+/i",$quicktime,$value)){
            $quicktime=$value[0];
        }
        echo $quicktime."</br>";
        updatePlugin('QuickTime',$quicktime);

        $silverlight = spider("http://rj.baidu.com/soft/detail/11097.html?ald","/<span\s*class=\"mInfo\">(.*)<\/span>/i",0);
        if(preg_match("/\d+\.\d+\.\d+\.\d+/i",$silverlight,$value)){
            $silverlight=$value[0];
        }
        echo $silverlight."</br>";
        updatePlugin('SilverLight',$silverlight);

        $adobereader = spider("http://www.adobe.com/support/downloads/product.jsp?product=10&platform=Windows","/Version\s*\d+\.\d+\.\d+/i",0);
        if(preg_match("/\d+\.\d+\.\d+/i",$adobereader,$value)){
            $adobereader=$value[0];
        }
        echo $adobereader."</br>";
        updatePlugin('AdobeReader',$adobereader);


    }
?>