<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    '__pattern__' => [
        'id' => '\d+',
    ],
//    '[hello]'     => [
//        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
//        ':name' => ['index/hello', ['method' => 'post']],
//    ],
    // 添加路由规则 路由到 index控制器的hello操作方法

    // 路由参数name为必选
//    'hello/:name' => 'index/index/hello',

    // 路由参数name为可选
//    'hello/[:name]' => 'index/hello',

//    定义闭包
//    'test/[:name]' => function ($name) {
//        return 'Hello,' . $name . '!';
//    },

//    当传的值id不为数字时,会报模块不存在:read
//    'read/:id' => ['index/read',['method'=>'get'],['id'=>'\d+']],
//    'user/index' => 'index/user/index',
//    'user/create' => 'index/user/create',
//    'user/add' => 'index/user/add',
//    'user/addList' => 'index/user/addList',
//    'user/update/:id' => 'index/user/update',
//    'user/delete/:id' =>'index/user/delete',
//    'user/:id' => 'index/user/read',

];
