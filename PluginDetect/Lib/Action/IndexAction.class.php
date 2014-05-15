<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
	    $this->name = 'thinkphp'; // 进行模板变量赋值
	    $this->display();
    }

    public function scanme(){
        $raw = file_get_contents('php://input'); 
        $os_pos = strpos($raw,"os");
        $plugin = substr($raw,0,$os_pos);
        //echo($plugin);

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

    public function crawler(){
        main();
        $this->display();
    }

    public function resultview(){
        $Form = M('scanrecord');
        $data = $Form->select();
        $this->json = json_encode($data);
        $this->display();
    }

}