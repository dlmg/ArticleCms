<?php

namespace app\admin\controller;

use think\Db;
use app\admin\model\Article as Art;
use think\db\Where;
use app\admin\model\Category;
use think\Request;
use app\admin\model\User;
use think\Validate;
class Index extends Base
{
    public function index()
    {
        $data = session('adminUser');
        $this->assign('data', $data);
        $this->assign('menu1', '首页');
        $this->assign('menu2', '空白页');
        $this->assign('action', 'article');
        return $this->fetch();
    }

    public function save()
    {
        if (request()->isPost()) {
            $art = new Art;
            $result = input('post.');
            $data['title'] = $result['title'];
            $data['content'] = $result['content'];
            $data['keywords'] = $result['keywords'];
            $data['date'] = time();
            $data['description'] = $result['description'];
            $data['category'] = $result['category'];
            if ($art->create($data)) {
                $this->success('发布成功，正在跳转到首页', 'index/articleList');
            } else {
                $this->error('发布失败，请重新发送');
            }
        }
    }

    public function articleCate()
    {
        $data = Category::all();
        $this->assign('data', $data);
        $this->assign('menu1', '文章');
        $this->assign('menu2', '文章列表');
        $this->assign('action', 'article');
        return $this->fetch();
    }

    public function categoryEdit()
    {
        $id = input('id');
        $data = Category::find($id);
        //var_dump($data);
        $this->assign('data', $data);
        $this->assign('menu1', '文章');
        $this->assign('menu2', '编辑分类');
        $this->assign('action', 'article');
        return $this->fetch();
    }

    public function doCateEdit()
    {
        $category = input('category');
        $id = input('id');
        $data = Category::get($id);
        $data->category = $category;
        if ($data->save()) {
            $msg = array(
                "status" => 200,
                "info" => "编辑成功！",
            );
            return json($msg);
        }
    }

    public function categoryAdd()
    {
        $this->assign('menu1', '文章');
        $this->assign('menu2', '添加分类');
        $this->assign('action', 'article');
        return $this->fetch();
    }

    public function doAdd()
    {
        $category = input('category');
        $cate = new Category;
        $cate->category = $category;
        if ($cate->save()) {
            $msg = array(
                "status" => 200,
                "info" => "添加成功！",
            );
            return json($msg);
        }
    }

    public function articleAdd()
    {
        $data = Db::name('category')->where('id', '>', 0)->select();
        $this->assign('data', $data);
        $this->assign('menu1', '文章');
        $this->assign('menu2', '添加文章');
        $this->assign('action', 'article');
        return $this->fetch();
    }

    public function articleList()
    {
        $data = Db::name('article')->where('status', 1)->order('id desc')->paginate(8);
        $category = Db::name('category')->where('id','>','0')->field('category')->select();
        $page = $data->render();
        $this->assign('page', $page);
        $this->assign('data', $data);
        $this->assign('menu1', '文章');
        $this->assign('menu2', '文章列表');
        $this->assign('action', 'article');
        $this->assign('category',$category);
        //dump($category);
        return $this->fetch();

    }

    public function articleEdit()
    {
        $id = input('id');
        $data = Art::find($id);
        //var_dump($data);
        $result = Db::name('category')->where('id', '=', $data['category'])->find();
        $category = Db::name('category')->where('id', '<>', $data['category'])->select();
        $this->assign('category', $category);
        $this->assign('data', $data);
        $this->assign('result', $result);
        $this->assign('menu1', '文章');
        $this->assign('menu2', '编辑文章');
        $this->assign('action', 'article');
        return $this->fetch();
    }

    public function articleUpdate()
    {
        $id = input('id');
        $article = new Art;
        $data['title'] = input('title');
        $data['content'] = input('content');
        $data['date'] = time();
        $data['category'] = input('category');
        $article->startTrans();
        $where = ['id' => $id];
        //var_dump($id);
        if ($article->save($data, $where))
            $this->success('文章保存成功', 'index/articleList');
        else {
            $article->rollback();
            $this->error('文章保存失败', 'index/articleList');
        }
        $article->commit();
    }

    public function articleDelete()
    {
        $id = input('id');
        $article = new Art;
        $data = $article->get($id);
        if ($data) {
            $data->delete();
            $this->redirect('articleList');

        } else {
            die('删除失败');
        }
    }

    public function articleSearch(Request $request)
    {
        $param = $request->param();
        unset($param['page']);
        $whereMap = new Where;
        foreach ($param as $k => $v)
            $whereMap[$k] = ['like', '%' . $v . '%'];
        $data = Db::name('article')->where($whereMap)->order('id', 'asc')->paginate(2, false, ['query' => $request->param()]);

        $page = $data->render();
        $this->assign(['data' => $data, 'page' => $page]);
        return $this->fetch('article_list');
    }

    public function articlePreview()
    {
        $id = input('id');
        $data = Db::name('article')->where('id', '=', $id)->find();
        $this->assign('data', $data);
        return $this->fetch();
    }

    public function siteMap()
    {
        $article = new Art;
        $today = date("Y-m-d", time());
        $where = [['status', '=', '1']];
        $yesterdayArr = $article->where($where)->field('id')->order('id', 'asc')->select();
        //var_dump($yesterdayArr);
        unset($where);

        //首页
        $content = '<?xml version="1.0" encoding="UTF-8"?>' . chr(13) . '';
        $content .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <url>
        <loc>' . SITE_URL . '</loc>
        <lastmod>' . $today . '</lastmod>
        <changefreq>always</changefreq>
        <priority>1.0</priority>
    </url>' . chr(10) . chr(10);

        //头部静态页
        $content .= '    <url>
        <loc>' . SITE_URL . '/pages/btb.html</loc>
        <lastmod>' . $today . '</lastmod>
        <changefreq>always</changefreq>
        <priority>1.0</priority>
    </url>' . chr(10) . chr(10);
        $content .= '    <url>
        <loc>' . SITE_URL . '/pages/wallet.html</loc>
        <lastmod>' . $today . '</lastmod>
        <changefreq>always</changefreq>
        <priority>1.0</priority>
    </url>' . chr(10) . chr(10);
        $content .= '    <url>
        <loc>' . SITE_URL . '/pages/contact.html</loc>
        <lastmod>' . $today . '</lastmod>
        <changefreq>always</changefreq>
        <priority>1.0</priority>
    </url>' . chr(10) . chr(10);
        $content .= '    <url>
        <loc>' . SITE_URL . '/pages/anli.html</loc>
        <lastmod>' . $today . '</lastmod>
        <changefreq>always</changefreq>
        <priority>1.0</priority>
    </url>' . chr(10) . chr(10);
        $content .= '    <url>
        <loc>' . SITE_URL . '/pages/runSub.html</loc>
        <lastmod>' . $today . '</lastmod>
        <changefreq>always</changefreq>
        <priority>1.0</priority>
    </url>' . chr(10) . chr(10);

        //登录页面
        $content .= '    <url>
        <loc>' . SITE_URL . '/admin/login/index.html</loc>
        <lastmod>' . $today . '</lastmod>
        <changefreq>always</changefreq>
        <priority>1.0</priority>
    </url>' . chr(10) . chr(10);

        //文章详情页
        $url = SITE_URL . "/index/index/showdetail/id/";
        foreach ($yesterdayArr as $k => $v) {
            $data_array[$k]['loc'] = $url . $v['id'] . '.html';
            $data_array[$k]['lastmod'] = $today;
            $data_array[$k]['changefreq'] = 'always';
            $data_array[$k]['priority'] = '1.0';
        }

        foreach ($data_array as $data) {
            $content .= $this->create_item($data);
        }
        $content .= '</urlset>';
        $fp = fopen('sitemap.xml', 'w+');
        if (fwrite($fp, $content)) {
            $this->success('生成成功', 'index/articleList');
        } else {
            $this->error('生成失败', 'index/articleList');
        }

        fclose($fp);
    }

    private function create_item($data)
    {
        $item = "    <url>\n";
        $item .= "        <loc>" . $data['loc'] . "</loc>\n";
        $item .= "        <lastmod>" . $data['lastmod'] . "</lastmod>\n";
        $item .= "        <changefreq>" . $data['changefreq'] . "</changefreq>\n";
        $item .= "        <priority>" . $data['priority'] . "</priority>\n";
        $item .= "    </url>\n\n";
        return $item;
    }

    public function editPwd()
    {
        if (request()->isGet()) {
            $this->assign('menu1', '个人资料');
            $this->assign('menu2', '修改密码');
            $this->assign('action', 'article');
            return $this->fetch();
        } elseif (request()->isPost()) {
            $rule = [
                'old_password' => 'require|length:5,60',
                'new_password'  => 'require|length:6,60|confirm:con_password',
                'con_password' => 'require|length:6,60',
            ];

            $msg = [
                'old_password.require' => '原密码为必填项',
                'old_password.length' => '密码长度要在6~60之间',
                'new_password.require' => '新密码为必填项',
                'new_password.length' => '密码长度要在6~60之间',
                'new_password.confirm' => '两次输入新密码不一致！',
                'con_password.require' => '确认密码为必填项',
                'con_password.length' => '密码长度要在6~60之间',
            ];

            $old_password = input('old_password');
            $new_password = input('new_password');
            $con_password = input('con_password');

            $data = [
                'old_password' => $old_password,
                'new_password' => $new_password,
                'con_password' => $con_password,
            ];

            $validate = Validate::make($rule, $msg);
            $result = $validate->check($data);

            if(!$result){
                $info = $validate->getError();
                $msg = array(
                    'status' => 201,
                    'info' => $info,
                );
                return json($msg);
            }

            $user_id = session('adminUser')['id'];
            $user = Db::name('user')->where('id',$user_id)->find();
            if($user['password'] != $old_password){
                $msg = array(
                    'status' => 201,
                    'info' => '原密码不正确'
                );
                return json($msg);
            }

            $flag = Db::name('user')->where('id',$user_id)->update(['password'=>$data['new_password']]);
            if($flag){
                $msg = array(
                    'status' => 200,
                    'info' => '密码修改成功'
                );
                return json($msg);
            }else{
                $msg = array(
                    'status' => 201,
                    'info' => '密码修改失败'
                );
                return json($msg);
            }
        }
    }

}
