<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/26
 * Time: 16:52
 */
namespace app\index\model;
use think\Model;
class User extends Model{
    // 开启自动写入时间戳
    protected $autoWriteTimestamp = true;
    // 定义自动完成的属性
    protected $insert = ['status' => 1];
    // 设置完整的数据表（包含前缀）
    protected $table = 'think_user';
    public function profile(){
        //hasOne('关联模型名','关联外键','主键','别名定义','join类型')
        //默认的外键是：当前模型名_id，主键则是自动获取，如果你的表设计符合这一规范的话，只需要设置关联的模型名即可.
        return $this->hasOne('Profile','user_id','id');
    }

    public function books(){
        return $this->hasMany('Book');
    }

}