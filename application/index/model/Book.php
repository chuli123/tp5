<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/8
 * Time: 17:47
 */
namespace app\index\model;
use think\Model;
class Book extends Model{
    public function user(){
        return $this->belongsTo('user');
    }
}