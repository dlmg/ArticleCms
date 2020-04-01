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

        $category = Db::name('category')->where('id','>',0)->column('id');
        $cate = Db::name('category')->where('id','>',0)->column('category');
        $where[] = ['status', '=', 1];
        $where[] = ['category', '=', $category[0]];
        $qyList = $article->where($where)->select();
        if(count($qyList)>0)
            $qyFirst = $qyList[0];
        else
            $qyFirst = '暂无相关内容';


        unset($where);
        $where[] = ['status', '=', 1];
        $where[] = ['category', '=', $category[1]];
        $hyList = $article->where($where)->select();
        if(count($hyList)>0)
            $hyFirst = $hyList[0];
        else
            $hyFirst = '暂无相关内容';


        unset($where);
        $where[] = ['status', '=', 1];
        $where[] = ['category', '=', $category[2]];
        $csList = $article->where($where)->select();
        if(count($csList)>0)
            $csFirst = $csList[0];
        else
            $csFirst = '暂无相关内容';
        $this->assign('cate',$cate);
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
        $date = Db::name('article')->where('id',$id)->field('date,category')->find();
        //dump($date);
        $where = [['category','=',$date['category']],['date','>',$date['date']]];
        $front = $article->where($where)->limit(1)->find();
        unset($where);
        $where = [['category','=',$date['category']],['date','<',$date['date']]];
        $after = $article->where($where)->limit(1)->find();
        $result = Db::name('category')->select();
        $this->assign('result',$result);
        $this->assign('front',$front);
        $this->assign('after',$after);
        $this->assign('data', $data);
        return $this->fetch();
    }

    public function articleList(){
        $categoryid = input('categoryid');
        $where = [['status','=',1],['category','=',$categoryid]];
        $title = Db::name('category')->where('id',$categoryid)->value('category');
        $result = Db::name('category')->select();
        $data = Db::name('article')->where($where)->order('date desc')->paginate(5,false,['fragment'=>'comments']);
        $page = $data->render();
        if(count($data)>0)
            $this->assign('data',$data);
        else
            $this->assign('data','暂无相关内容');
        $this->assign('title',$title);
        $this->assign('result',$result);
        $this->assign('page',$page);

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
