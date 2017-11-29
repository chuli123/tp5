<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/30
 * Time: 18:04
 */
namespace app\index\model;
use think\Model;
class Profile extends Model{
    public function user(){
        return $this->belongsTo('user','id','user_id');
    }
}