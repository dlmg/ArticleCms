<?php

namespace app\index\controller;
use think\Controller;
use think\Db;
use app\index\model\article as Art;

class Index extends Controller
{
    public function index()
    {
        $article = new Art;
        //查找签约新闻
        $where[] = ['status', '=', 1];
        $where[] = ['category', '=', 1];
        $qyList = $article->where($where)->select();
        $qyFirst = $qyList[0];
        //查找行业新闻
        unset($where);
        $where[] = ['status', '=', 1];
        $where[] = ['category', '=', 2];
        $hyList = $article->where($where)->select();
        $hyFirst = $hyList[0];
        //查找测试新闻
        unset($where);
        $where[] = ['status', '=', 1];
        $where[] = ['category', '=', 3];
        $csList = $article->where($where)->select();
        $csFirst = $csList[0];

        $this->assign('csFirst',$csFirst);
        $this->assign('hyFirst',$hyFirst);
        $this->assign('qyFirst',$qyFirst);
        $this->assign('qyList', $qyList);
        $this->assign('hyList', $hyList);
        $this->assign('csList', $csList);

        return $this->fetch();
    }

    public function showDetail()
    {
        $article = new Art;
        $id = input('id');
        $data = $article->where('status', '1')->find($id);
        $this->assign('data', $data);
        return $this->fetch();
    }

    public function articleList(){
        $categoryid = input('categoryid');
        $where = [['status','=',1],['category','=',$categoryid]];
        $result = Db::name('category')->select();
        $data = Db::name('article')->where($where)->order('id asc')->paginate(5);
        $page = $data->render();
        $this->assign('result',$result);
        $this->assign('page',$page);
        $this->assign('data',$data);
        return $this->fetch();
    }

    public function pages(){
        return $this->fetch();
    }

    public function category(){
        $category = input('category');
        //URL::build('index/index/category',);
        return $this->fetch("$category");
    }

}
