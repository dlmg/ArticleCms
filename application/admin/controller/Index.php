<?php
namespace app\admin\controller;
use think\Db;
use app\admin\model\Article as Art;
use think\db\Where;
use think\Request;

class Index extends Base
{
    public function index()
    {
        $data = session('adminUser');
        $this->assign('data',$data);
        return $this->fetch();
    }

    public function save(){
        if(request()->isPost()) {
            $art = new Art;
            $result = input('post.');
            $data['title'] = $result['title'];
            $data['content'] = $result['content'];
            $data['keywords'] = $result['keywords'];
            $data['date'] = time();
            $data['description'] = $result['description'];
            $data['category'] = $result['category'];
            if($art->create($data)){
                $this->success('发布成功，正在跳转到首页','index/index');
            }else{
                $this->error('发布失败，请重新发送');
            }
        }
    }

    public function articleAdd(){
        $data = Db::name('category')->where('id','>',0)->select();
        $this->assign('data',$data);
        return $this->fetch();
    }

    public function articleList(){
        $data = Db::name('article')->where('status',1)->order('id asc')->paginate(8);
        $page = $data->render();
        $this->assign('page',$page);
        $this->assign('data',$data);
        return $this->fetch();

    }

    public function articleEdit(){
        $id = input('id');
        $data = Art::find($id);
        //var_dump($data);
        $result = Db::name('category')->where('id','=',$data['category'])->find();
        $category = Db::name('category')->where('id','<>',$data['category'])->select();
        $this->assign('category',$category);
        $this->assign('data',$data);
        $this->assign('result',$result);
        return $this->fetch();
    }

    public function articleUpdate(){
        $id = input('id');
        $article = new Art;
        $data['title'] = input('title');
        $data['content'] = input('content');
        $data['date'] = time();
        $data['category'] = input('category');
        $article->startTrans();
        $where = ['id'=>$id];
        //var_dump($id);
        if($article->save($data,$where))
            $this->success('文章保存成功','index/articleList');
        else{
            $article->rollback();
            $this->error('文章保存失败','index/articleList');
        }
        $article->commit();
    }

    public function articleDelete(){
        $id = input('id');
        $article = new Art;
        $data = $article->get($id);
        if($data){
            $data->delete();
            $this->redirect('articleList');

        }else{
            die('删除失败');
        }
    }

    public function articleSearch(Request $request){
        $param = $request->param();
        unset($param['page']);
        $whereMap = new Where;
        foreach($param as $k=>$v)
            $whereMap[$k] = ['like','%'.$v.'%'];
        $data = Db::name('article')->where($whereMap)->order('id','asc')->paginate(2,false,['query'=>$request->param()]);
        $page = $data->render();
        $this->assign(['data'=>$data,'page'=>$page]);
        return $this->fetch('article_list');
    }

    public function articlePreview(){
        $id = input('id');
        $data = Db::name('article')->where('id','=',$id)->find();
        $this->assign('data',$data);
        return $this->fetch();
    }

    public function siteMap()
    {
        $article = new Art;
        $today = date("Y-m-d", time());
        $yesterday = mktime(0, 0, 0, date("m"), date("d") - 1, date("Y"));
        $lastweek = strtotime("-1 week");
        $where = [['status','=','1'],['date','<',$yesterday]];
        $yesterdayArr = $article->where($where)->order('id','asc')->select();
        //var_dump($yesterdayArr);
        unset($where);
        $where = [['status','=','1'],['date','>',$lastweek]];
        $lastweekArr = $article->where($where)->select();//上周

        //首页
        $content='<?xml version="1.0" encoding="UTF-8"?>'.chr(13).'';
        $content.='<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <url>
        <loc>'.SITE_URL.'</loc>
        <lastmod>'.$today.'</lastmod>
        <changefreq>always</changefreq>
        <priority>1.0</priority>
    </url>'.chr(10).chr(10);

        //头部静态页
        $content.='    <url>
        <loc>'.SITE_URL.'/pages/btb.html</loc>
        <lastmod>'.$today.'</lastmod>
        <changefreq>always</changefreq>
        <priority>1.0</priority>
    </url>'.chr(10).chr(10);
        $content.='    <url>
        <loc>'.SITE_URL.'/pages/wallet.html</loc>
        <lastmod>'.$today.'</lastmod>
        <changefreq>always</changefreq>
        <priority>1.0</priority>
    </url>'.chr(10).chr(10);
        $content.='    <url>
        <loc>'.SITE_URL.'/pages/contact.html</loc>
        <lastmod>'.$today.'</lastmod>
        <changefreq>always</changefreq>
        <priority>1.0</priority>
    </url>'.chr(10).chr(10);
        $content.='    <url>
        <loc>'.SITE_URL.'/pages/anli.html</loc>
        <lastmod>'.$today.'</lastmod>
        <changefreq>always</changefreq>
        <priority>1.0</priority>
    </url>'.chr(10).chr(10);
        $content.='    <url>
        <loc>'.SITE_URL.'/pages/runSub.html</loc>
        <lastmod>'.$today.'</lastmod>
        <changefreq>always</changefreq>
        <priority>1.0</priority>
    </url>'.chr(10).chr(10);

        //登录页面
        $content.='    <url>
        <loc>'.SITE_URL.'/admin/login/index.html</loc>
        <lastmod>'.$today.'</lastmod>
        <changefreq>always</changefreq>
        <priority>1.0</priority>
    </url>'.chr(10).chr(10);

        //文章详情页
        $url = SITE_URL."/index/index/showdetail/id/";
        foreach($yesterdayArr as $k=>$v){
            $data_array[$k]['loc'] = $url.$v['id'].'.html';
            $data_array[$k]['lastmod'] = $today;
            $data_array[$k]['changefreq'] = 'always';
            $data_array[$k]['priority'] = '1.0';
        }

        foreach($data_array as $data){
            $content.=$this->create_item($data);
        }
        $content.='</urlset>';
        $fp=fopen('sitemap.xml','w+');
        if(fwrite($fp,$content)){
            $this->success('生成成功','index/articleList');
        }else{
            $this->error('生成失败','index/articleList');
        }

        fclose($fp);
    }

    private function create_item($data){
        $item="    <url>\n";
        $item.="        <loc>".$data['loc']."</loc>\n";
        $item.="        <lastmod>".$data['lastmod']."</lastmod>\n";
        $item.="        <changefreq>".$data['changefreq']."</changefreq>\n";
        $item.="        <priority>".$data['priority']."</priority>\n";
        $item.="    </url>\n\n";
        return $item;
    }

}
