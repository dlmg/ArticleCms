<?php
namespace app\admin\controller;

use think\Controller;
use think\Exception;

/**
 * 后台基础类库
 * Class Base
 * @package app\admin\controller
 */
class Base extends Controller
{
    /**
     * 初始化的方法  这个方法存在于Controller 可以到Controller中去看 如果有定义这个方法
     * 就走这个方法 我们在这个方法中 进行判断用户是否登陆
     * 简而言之 我判断是否登陆 如果没有登陆 就退出到后台登录页
     */
    public function initialize() {

        // 判定用户是否登录
       if(!session('adminUser')){
           $this->redirect('login/index');
       }
    }
}
