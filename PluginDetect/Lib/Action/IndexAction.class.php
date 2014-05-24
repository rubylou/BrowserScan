<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
        header('Content-Type: text/html; charset=gbk');
        $url ="http://rj.baidu.com/";
        $lines_string= file_get_contents($url);//read entire web file into array
        echo($lines_string);
        //echo "hello";

        sleep(5);

        $raw = file_get_contents('php://input'); 
        $os_pos = strpos($raw,"os");
        $plugin = substr($raw,0,$os_pos);

        if($_REQUEST['timestamp']!=null){
            $ip = $_SERVER["REMOTE_ADDR"];
            $timestamp = $_REQUEST['timestamp'];
            $os = $_REQUEST['os'];
            $br = $_REQUEST['br'];
            $br_v = $_REQUEST['br_v'];

            $data['ip'] = $ip;
            $data['browser'] = $br;
            $data['browserversion'] = $br_v;
            $data['plugininfo'] = $plugin;
            $data['os'] = $os;
            $data['timestamp'] = $timestamp;

            $Form = M('scanrecord');
            $temp = $Form->create($data);
            $result = $Form->add($temp);
        }
	    $this->display();
    }

    public function scanme(){
        $Form = M('spider');
        $result = $Form->select();
        //dump($result);
        foreach($result as $key=>$value){
            $temp['windows'] = $result[$key]['windows'];
            $temp['macos'] = $result[$key]['macos'];
            $temp['linux'] = $result[$key]['linux'];
            $update[$result[$key]['plugin']] = $temp;
        }
        //dump($update);
        $this->json = json_encode($update);

        $raw = file_get_contents('php://input'); 
        $os_pos = strpos($raw,"os");
        $plugin = substr($raw,0,$os_pos);
        //echo $plugin;

        if($_REQUEST['timestamp']!=null){
            $ip = $_SERVER["REMOTE_ADDR"];
            $timestamp = $_REQUEST['timestamp'];
            $os = $_REQUEST['os'];
            $br = $_REQUEST['br'];
            $br_v = $_REQUEST['br_v'];

            $data['ip'] = $ip;
            $data['browser'] = $br;
            $data['browserversion'] = $br_v;
            $data['plugininfo'] = $plugin;
            $data['os'] = $os;
            $data['timestamp'] = $timestamp;

            $Form = M('scanrecord');
            $temp = $Form->create($data);
            $result = $Form->add($temp);
        }	
        $this->display();	
    }

    public function resultview(){
        $user = I('post.user');
        $pwd = I('post.pwd');
        if($user=="admin" && $pwd=="yeruby"){
            $Form = M('spider');
            $result = $Form->select();
            //dump($result);
            foreach($result as $key=>$value){
                $temp['windows'] = $result[$key]['windows'];
                $temp['macos'] = $result[$key]['macos'];
                $temp['linux'] = $result[$key]['linux'];
                $update[$result[$key]['plugin']] = $temp;
            }
            //dump($update);
            $this->json = json_encode($update);

            $Form = M('scanrecord');
            $data = $Form->select();
            foreach($data as $key=>$value){
                $data[$key]['browser'] = $data[$key]['browser']." ".$data[$key]['browserversion'];
                $plugin[$key]['plugininfo'] = $data[$key]['plugininfo'];
                $plugin[$key]['id'] = $data[$key]['id'];
                array_remove($data[$key],3);
                array_remove($data[$key],3);
            }
            //dump($data);
            //dump($plugin);
            $this->plugin = json_encode($plugin);
            $this->info = json_encode($data);
            $this->display();
        }
        else{
            echo('<html><head><meta charset="utf-8">
                  <title>Browser &middot; Scan</title>
                  <meta name="viewport" content="width=device-width, initial-scale=1.0">
                  <meta name="description" content="">
                  <meta name="author" content="">');
            echo('<link type="text/css" href="/Public/detectsources/bootstrap.css" rel="stylesheet">
                  <link type="text/css" href="/Public/detectsources/flat-ui.css" rel="stylesheet">
                  <script type="text/javascript" src="/Public/detectsources/jquery.js"></script>
                  <script type="text/javascript" src="/Public/detectsources/bootstrap.js"></script></head>');
            echo('<body><div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">');
            echo('<div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">');
            echo('<button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="login()">&times;</button>');
            echo('<h4 class="modal-title" id="myModalLabel">Login Error</h4>
                </div>
                <div class="modal-body">None User Or Wrong Password!</div>');
            echo('<div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="login()">确认</button>
                </div>');
            echo('</div></div></div></body>');
            echo("<script>$('#myModal').modal('toggle');function login(){window.location.href='login'}</script></html>");
        }
        
    }

    public function resultUI(){
        $Form = M('spider');
        $result = $Form->select();
        //dump($result);
        foreach($result as $key=>$value){
            $temp['windows'] = $result[$key]['windows'];
            $temp['macos'] = $result[$key]['macos'];
            $temp['linux'] = $result[$key]['linux'];
            $update[$result[$key]['plugin']] = $temp;
        }
        //dump($update);
        $this->json = json_encode($update);

        $Form = M('scanrecord');
        $data = $Form->select();
        foreach($data as $key=>$value){
            $data[$key]['browser'] = $data[$key]['browser']." ".$data[$key]['browserversion'];
            $plugin[$key]['plugininfo'] = $data[$key]['plugininfo'];
            $plugin[$key]['id'] = $data[$key]['id'];
            array_remove($data[$key],3);
            array_remove($data[$key],3);
        }
        //dump($data);
        //dump($plugin);
        $this->plugin = json_encode($plugin);
        $this->info = json_encode($data);
        $this->display();
    }

}