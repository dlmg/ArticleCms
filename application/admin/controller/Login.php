<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\User;
use think\captcha\Captcha;
class Login extends Controller
{

    public function index()
    {
        return $this->fetch();
    }

    /**
     * 登录验证逻辑
     * 首先判断是不是post提交 如果不是 提示 请求不合法
     * 如果是post提交 组织数据 进行验证 判断 都通过之后 信息存到session 跳转到后台首页
     */
    public function check() {
        if(request()->isPost()) {
            $data = input('post.');



                // 判定 username password
                // validate机制   这边的配置我另外说
                if (empty($data)) {
                    $this->error('未知错误', 'login/index');
                }
                try {
                    $user = model('User')->get(['username' => $data['username']]);
                } catch (\Exception $e) {
                    $this->error($e->getMessage());
                }

                if (!$user) {
                    $this->error('该用户不存在');
                }

                // 再对密码进行校验
                if (($data['password']) != $user['password']) {
                    $this->error('密码不正确');
                }
                // 1 更新数据库 登录时间 登录ip
                $udata = [
                    'logintime' => time(),
                ];

                try {
                    model('User')->save($udata, ['id' => $user->id]);
                } catch (\Exception $e) {
                    $this->error($e->getMessage());
                }

                session('adminUser', $user);
                $this->success('登录成功', 'index/articleList');

        }else {
            $this->error('请求不合法');
        }
    }


    /**
     * 退出登录的逻辑
     * 1、清空session
     * 2、 跳转到登录页面
     */
    public function logout(){
        session(null);
        // 跳转
        $this->success('退出成功','login/index');
    }

    public function verify(){
        $captcha = new Captcha();
        return $captcha->entry();
    }

}
