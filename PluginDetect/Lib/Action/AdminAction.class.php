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