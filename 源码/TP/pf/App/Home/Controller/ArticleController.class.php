<?php
namespace Home\Controller;
use Think\Controller;

class ArticleController extends CommonController {
    //查看图文:文章标题,作者,发布时间,封面图片,点击量,内容
    public function seearticle(){

        $rid = $_GET['id'];
        $aid = $_GET['adminid'];
        $article = D('resource');
        $seearticlelist = $article
                        ->table('resource,article,admin')
                        ->where('admin.id='.$aid.' and resource.rid = article.raid and resource.rid='.$rid)
                        ->field('resource.title,admin.aname,article.addtime,resource.pic,article.hits,article.content')
                        ->find();
        $this->assign('seearticlelist',$seearticlelist);
        $this->display();

    }
    
}