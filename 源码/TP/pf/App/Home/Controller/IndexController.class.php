<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends CommonController {
    public function index(){
    	$websiteid = $_SESSION['client']['websiteid'];
    	$website = D('website');
    	$resource = D('resource');
		$bitmap = D('bitmap');
    	$office = D('office');
    	$websiteresult = $website->where("wid={$websiteid}")->select();
    	$tid = $websiteresult['0']['templateid'];
    	//var_dump($tid);

    	
    	$oid = $websiteresult['0']['officeid'];
    	$officelist = $office->where("id={$oid}")->find();
        $websitewid = $_SESSION['client']['websiteid'];
    	//var_dump($websitewid);

    	$slideshowlist = $resource->query("select * from website,bitmap,resource where bitmap.websiteid={$websitewid} and website.wid=bitmap.websiteid and bitmap.resourceid=resource.rid and resource.type=2 and resource.isaudit=1 order by resource.priority asc,resource.rid desc");
    	//var_dump($slideshowlist);

    	$buttonlist = $resource->query("select * from website,bitmap,resource where bitmap.websiteid={$websitewid} and website.wid=bitmap.websiteid and bitmap.resourceid=resource.rid and resource.type=1 and resource.isaudit=1 order by resource.priority,resource.rid");
        //var_dump($buttonlist);

    	//var_dump($_SESSION);
    	$this->assign('officelist',$officelist);
    	$this->assign('slideshowlist',$slideshowlist);
    	$this->assign('buttonlist',$buttonlist);
        $this->display('index'.$tid);
    }

    public function deldata(){
    	//var_dump($_SESSION);
    	$client = D('client');
    	$openid = $_SESSION['clientopenid'];
    	$clientresult = $client->where("openid='{$openid}'")->delete();
    	//var_dump($clientresult);
    	unset($_SESSION['client']);
    	$this->redirect('Index/index');
    }

    public function seearticle(){
        $rid = $_GET['id'];
        $aid = $_GET['adminid'];

        $hits = D('article');
        $hitsnum = $hits
                ->where('raid ='.$rid)
                ->find();
        $newhits = intval($hitsnum['hits']);
        $newhits1 = $newhits+1;
        $newhits2 = (string)$newhits1;
        $data['hits'] = $newhits2;
        $hits->where('raid ='.$rid)->save($data);

        $article = D('resource');
        $seearticlelist = $article
                        ->table('resource,article,admin')
                        ->where('admin.id='.$aid.' and resource.rid = article.raid and resource.rid='.$rid)
                        //->where('resource.rid = article.raid and resource.rid='.$rid)
                        ->field('resource.title,admin.aname,article.addtime,resource.pic,article.hits,article.content')
                        //->field('resource.title,article.addtime,resource.pic,article.hits,article.content')
                        ->find();
        $this->assign('seearticlelist',$seearticlelist);
        $this->display('Seearticle/seearticle');
    }
}