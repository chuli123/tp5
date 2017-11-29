<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/12
 * Time: 18:19
 */
namespace app\index\controller;

use think\Controller;
use think\Db;


//读操作都使用 query 方法，写操作使用 execute 方法  query 方法用于查询   execute 方法的返回值是影响的行数
class Curd extends Controller{
    public function create(){
//        $result = Db::execute('insert into think_data(data) values("thinkphp")');
//        $result = Db::execute('insert into think_data(data) values(?)',['tpLink']);
        $result = Db::table('think_data')->insert(['data'=>'TPLINK']);
        var_dump($result);
    }

    public function update(){
//        $result = Db::execute('update think_data set data="TPLINK" where id=4');
        $result = Db::table('think_data')->where('id',6)->update(['data'=>'tenda']);
        var_dump($result);
    }

    public function read(){
        $result = Db::query('select * from think_data');
        var_dump($result);
    }

    public function delete(){
        $result = Db::execute('delete from think_data where id=4');
        var_dump($result);
    }

    public function trans(){
        Db::startTrans();
        try{
            Db::table('think_data')->delete(5);
            Db::table('think_data')->insert(['data'=>'Tenda']);
            Db::commit();
        }catch (\Exception $e){
            Db::rolllback();
        }
    }
}