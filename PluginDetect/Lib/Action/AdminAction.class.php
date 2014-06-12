<?php
// 本类由系统自动生成，仅供测试用途
class AdminAction extends Action {
    public function index(){
        session("user",null);
        session("pwd",null);
        $this->display();
    }

    public function login(){
        //dump($_REQUEST);
        session("user",$_REQUEST['user']);
        session("pwd",$_REQUEST['pwd']);
        //header("location: resultview"); 
    }

    public function resultUI(){
        $model = new Model();
        $windows = $model->query("select browser, os, count(*) from scanrecord 
            where os like '%Windows%' group by browser");
        $mac = $model->query("select browser,os,count(*) from scanrecord where
            os like '%Macintosh%' group by browser");
        $linux = $model->query("select browser,os,count(*) from scanrecord where
            os like '%Linux%' group by browser");

        //dump($windows);
        //dump($mac);
        //dump($linux);

        $browserlist = array('IE','Chrome','Firefox','Safari','Opera','Maxthon');
        for($i=0;$i<count($browserlist);$i++){
            $os_count[$i]['browser'] = $browserlist[$i];
            $os_count[$i]['Windows'] = 0;
            $os_count[$i]['Macintosh'] = 0;
            $os_count[$i]['Linux'] = 0;

        }

        for($i=0;$i<count($windows);$i++){
            $index = array_search($windows[$i]['browser'], $browserlist);
            $os_count[$index]['Windows'] = $windows[$i]['count(*)'];
            
        }

        for($i=0;$i<count($mac);$i++){
            $index = array_search($mac[$i]['browser'], $browserlist);
            $os_count[$index]['Macintosh'] = $mac[$i]['count(*)'];
            
        }

        for($i=0;$i<count($linux);$i++){
            $index = array_search($linux[$i]['browser'], $browserlist);
            $os_count[$index]['Linux'] = $linux[$i]['count(*)'];
            
        }

        if($os_count){
            $this->os = json_encode($os_count);
        }
        else {
            $this->os = json_encode(null);
        }
        

        $day_count = $model->query("select DATE(TIMESTAMP) AS 'date', 
            COUNT(DATE(TIMESTAMP)) AS 'sum' FROM scanrecord GROUP BY DATE(TIMESTAMP)");
        //dump($day_count);
        if($day_count){
            $this->day = json_encode($day_count);
        }
        else {
            $this->day = json_encode(null);
        }

        $pluginlist = array("reader","dvr","flash","java","qt","rp","shock",
        "silver","wmp","vlc","xunlei","alipay","qqmail","upeditor","baofeng","kugou");
        foreach($pluginlist as $key => $value){
            $plugin = $model->query("select count(*) from scanrecord where plugininfo like '%".$pluginlist[$key]."%'");
            $plugin_count[$key] = $plugin[0]['count(*)'];
        }
        if($plugin_count){
            $this->plugin = json_encode($plugin_count);
        }
        else {
            $this->plugin = json_encode(null);
        }
        //dump($plugin_count);
        $this->display();
    }
    public function resultview(){
        //unset($cache->user); // 删除缓存
        //unset($cache->pwd); // 删除缓存

        /*$user = I('post.user');
        $pwd = I('post.pwd');

        if(session("user")==null){
            session("user",$user);
        }
       
        if(session("pwd")==null){
            session("pwd",$pwd);
        }*/

        if(session("user")=="admin" && session("pwd")=="yeruby"){
            import('ORG.Util.Page');// 导入分页类
            $Form = M('scanrecord');
            $count = $Form->count();
            $Page  = new Page($count,12,1);// 实例化分页类 传入总记录数
            $show  = $Page->show();// 分页显示输出
            $data = $Form->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();

            //$data = $Form->select();
            foreach($data as $key=>$value){
                $data[$key]['browser'] = $data[$key]['browser']." ".$data[$key]['browserversion'];
                //$plugin[$key]['plugininfo'] = $data[$key]['plugininfo'];
                $plugin[$key]['id'] = $data[$key]['id'];
                array_remove($data[$key],3);
                array_remove($data[$key],3);
            }
            //dump($data);
            //dump($plugin);
            //$this->plugin = json_encode($plugin);
            $this->vo = ($data);
            $this->assign("list",$data);
            $this->assign('page',$show);
            $this->info = json_encode($data);
            $this->display();
        }
        else{
            login_alert();
        }
        
    }

    public function detail(){
        //dump($_POST);
        //dump($_SESSION);
        //dump($_GET);
        if(session("user")=="admin" && session("pwd")=="yeruby"){
            $id = I('get.id');
            $Form = M('scanrecord');
            $data = $Form->where('id="'.$id.'"')->select();
            
            if($data){
                $plugin = $data[0]['plugininfo'];

                $result['id'] = $data[0]['id'];
                $result['ip'] = $data[0]['ip'];
                $result['browser'] = $data[0]['browser'];
                $result['browserversion'] = $data[0]['browserversion'];
                $result['os'] = $data[0]['os'];
                $result['timestamp'] = $data[0]['timestamp'];
            }
            
            if($result){
                //dump($result);
                $this->data = $result;
            }
            
            if($plugin){
                $this->plugin = json_encode($plugin);
            }
            else{
                $this->plugin = json_encode(null);
            }

            $this->display();        
        }
        else{
            login_alert();
        }
    }

}