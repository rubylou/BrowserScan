<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
        header('Content-Type: text/html; charset=gbk');
        $url ="http://rj.baidu.com/";
        $lines_string= file_get_contents($url);//read entire web file into array
        echo($lines_string);
        //echo "hello";

        sleep(8);

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

            $Form = M('results');
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
            $Form = M('results');
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
            $this->json = json_encode($plugin);
            $this->vo = $data;
            $this->assign('list',$data);
            $this->display();
            //crawler();
        }
        else{
            $this->error("Checkin Error","__URL__/login");
        }
        
    }

}