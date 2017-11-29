<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/26
 * Time: 17:00
 */
namespace app\index\controller;
use app\index\model\User as UserModel;
use app\index\model\Profile;
use app\index\model\Book;
class User{
    //新增数据
    public function add(){
//        $user = new UserModel();
//        $user->nickname = '流年';
//        $user->email = 'thinkphp@qq.com';
//        $user->birthday = strtotime('1977-03-05');
//        if($user->save()){
//            return '用户[ ' . $user->nickname . ':' . $user->id . ' ]新增成功';
//        }else{
//            return $user->getError();
//        }
//        $user['nickname'] = '看云';
//        $user['email'] = 'kancloud@qq.com';
//        $user['birthday'] = strtotime('2015-04-02');
//        if($result = UserModel::create($user)){
//            return '用户[ ' . $result->nickname . ':' . $result->id . ' ]新增成功';
//        }else{
//            return '新增出错';
//        }

//        $user = new UserModel();
//        if($user->allowField(true)->validate(true)->save(input('post.'))){
//            return '用户[ ' . $user->nickname . ':' . $user->id . ' ]新增成功';
//        }else{
//            return $user->getError();
//        }

        $user = new UserModel();
        $user->name = 'thinkphp';
        $user->password = '123456';
        $user->nickname = '流年11';
        if($user->save()){
            $profile = new Profile;
            $profile->truename = '刘晨';
            $profile->birthday = '1977-03-05';
            $profile->address = '中国上海';
            $profile->email = 'thinkphp@qq.com';
            $user->profile()->save($profile);
            return '用户新增成功';
        }else{
            return $user->getError();
        }
    }

    //批量新增
    public function addList(){
        $user = new UserModel();
        $list = [
            ['nickname' => '张三', 'email' => 'zhanghsan@qq.com', 'birthday' => strtotime('1988-01-15')],
            ['nickname' => '李四', 'email' => 'lisi@qq.com', 'birthday' => strtotime('1990-09-19')],
        ];
        if($user->saveAll($list)){
            return '用户批量新增成功';
        }else{
            return $user->getError();
        }
    }

    //查询数据
    public function read($id=5){
        $user = UserModel::get($id,'profile');
//        echo $user->nickname . '<br/>';
//        echo $user->email . '<br/>';
//        echo date('Y/m/d', $user->birthday) . '<br/>';
//        $user = UserModel::getByEmail('thinkphp@qq.com');
//        $user = UserModel::get(['nickname'=>'流年']);
//        $user = UserModel::where('nickname', '流年')->find();
//        echo $user['nickname'] . '<br/>';
//        echo $user['email'] . '<br/>';
//        echo date('Y/m/d', $user['birthday']) . '<br/>';
        echo $user->name . '<br/>';
        echo $user->nickname . '<br/>';
        echo $user->profile->truename . '<br/>';
        echo $user->profile->email . '<br/>';

    }

    //数据列表
    public function index(){
//        $list = UserModel::all();
//        $list = UserModel::all(['status'=>1]);
        $list = UserModel::where('id','<',3)->select();
        foreach($list as $user){
            echo $user->nickname . '<br/>';
            echo $user->email . '<br/>';
            echo date('Y/m/d', $user->birthday) . '<br/>';
            echo '----------------------------------<br/>';
        }
    }

    //更新数据
    public function update($id=5){
        $user = UserModel::get($id);
//        $user->nickname = '刘晨';
//        $user->email = 'liu21st@gmail.com';
//        if(false !==$user->save()){
//            return '更新用户成功';
//        } else {
//            return $user->getError();
//        }
        $user->name = 'framework';
        if($user->save()){
            $user->profile->email = 'liu21st@gmail.com';
            $user->profile->save();
            return '用户[ ' . $user->name . ' ]更新成功';
        }else{
            return $user->getError();
        }
    }

    //删除数据
    public function delete($id=3){
//        $user = UserModel::get($id);
//        if($user){
//            $user->delete();
//            return '删除用户成功';
//        }else{
//            return '删除的用户不存在';
//        }
//        $result = UserModel::destroy($id);
//        if ($result) {
//            return '删除用户成功';
//        } else {
//            return '删除的用户不存在';
//        }

        $user = UserModel::get($id);
        if($user->delete()){
            $user->profile->delete();
            return "success";
        }else{
            return $user->getError();
        }

    }

    public function addBook(){
        $user = UserModel::get(1);
        $book = new Book;
        $book->title = 'ThinkPHP5快速入门';
        $book->publish_time = '2016-05-06';
        $user->book()->save($book);
        return '添加Book成功';
    }

    public function addBooks(){
        $user = UserModel::get(1);
        $books = [
            ['title' => 'ThinkPHP5快速入门', 'publish_time' => '2016-05-06'],
            ['title' => 'ThinkPHP5开发手册', 'publish_time' => '2016-03-06'],
        ];
        $user->books()->saveAll($books);
        return '添加Book成功';
    }

    public function readBook(){
        $user = UserModel::get(1);
        $books = $user->books()->toArray();
        var_dump($books);
    }

}