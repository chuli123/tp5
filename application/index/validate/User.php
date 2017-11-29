<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/30
 * Time: 17:31
 */
namespace app\index\validate;
use think\validate;
class User extends Validate{
    protected $rule = [
        'nickname' => 'require|min:5|token',
        'email' => 'require|email',
        'birthday' => 'dateFormat:Y-m-d',
    ];
}