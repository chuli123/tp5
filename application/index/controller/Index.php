<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;

class Index extends Controller
{
    use \traits\controller\Jump;
    public function index($name = "THINKPHP")
    {
        $data = Db::name('data')->find();
        $this->assign('result',$data);
        return $this->fetch();
    }

    public function hello($name = "THINKPHP"){
        return $name;
    }

    public function read($id){
        return "查看ID=".$id."的内容";
    }

    public function request(){
        $request = Request::instance();
        var_dump($request);
    }

    public function jump($name=''){
        if($name == 'thinkphp'){
            $this->success('welcome','thinkphp');
        }else{
            $this->error('error','guest');
        }
    }

    public function jump1($name=''){
        if($name == 'thinkphp'){
            $this->redirect('http://www.thinkphp.cn/');
        }else{
            $this->success('welcome','hello');
        }
    }

}
