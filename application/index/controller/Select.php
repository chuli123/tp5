<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/17
 * Time: 17:09
 */
namespace app\index\controller;
use think\Controller;
use think\Db;
class Select extends Controller{
    public function find1(){
        $res = Db::table('think_data')->where('id','=','1')->find();
        var_dump($res);
    }

    public function find2(){
        $res = Db::table('think_data')
               ->where([
                   'id'=>['between','6,7'],
                   'data' => ['like','%da%'],
               ])->select();
        var_dump($res);
    }

    public function find3(){
        $res = Db::view('user','name')
            ->view('data','data','data.id=user.user_id')
            ->select();
        var_dump($res);
    }

    public function find4(){
        $res = Db::name('data')->select(function($query){
            $query->where('data','like','%da%');
        });
        var_dump($res);
    }

    public function find5(){
        $res = Db::name('data')
            ->where('id','=','6')
            ->value('data');
        var_dump($res);
    }

    public function find6(){
        $res = Db::name('data')
            ->column('data','id');
        var_dump($res);
    }

    public function find7(){
        $res = Db::name('data')
            ->count();
        echo $res;
    }

    public function find8(){
        $res = Db::name('data')
            ->where('id>:id',['id'=>3])
            ->select();
        var_dump($res);
    }
}