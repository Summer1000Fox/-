<?php
//后台网点控制器
namespace Ht\Controller;
use Think\Controller;
class OfficeController extends CommonController {


    //网点查询分权展示
    public function index(){

        //接收数据,准备分权所需变量
        $masknum = $_SESSION['admin']['masknum'];
        $mcode = $_SESSION['admin']['admincode'];
        $mcodelen = strlen($mcode);
        $mcodelike = substr($mcode,0,$mcodelen-$masknum);
        $adminmrank = $_SESSION['admin']['mrank'];
        $adminid = $_SESSION['admin']['id'];
        $office = D('office');

        //条件搜索
        if($_GET['oname']){
            $oname = '%'.$_GET['oname'].'%';
            $map = " AND oname like '".$oname."' ";
        }

        //分页相关
        $count = $office->query("SELECT COUNT(*) AS tp_count FROM office left join website on office.id = website.officeid where (mcode like '".$mcodelike."%')".$map); 
        $count = $count['0']['tp_count'];
        $page = new \Think\Page($count,10);
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $p = $_GET['p'];
        $pp = ($p-1)*10;
        if($pp == '-10'){
            $pp = 1;
        }

        //好使的sql
        $officelist = $office->query("select * from office left join website on office.id = website.officeid where (mcode like '".$mcodelike."%')".$map." order by mcode limit ".$pp.",10");

        //当存在搜索条件时,有limit会boom
        if($_GET['oname']){
            $officelist = $office->query("select * from office left join website on office.id = website.officeid where (mcode like '".$mcodelike."%')".$map." order by mcode ");
        }else{

        }
        if($_SESSION['admin']['mrank']=='3'){
            $officelist = $office->query("select * from office left join website on office.id = website.officeid where (mcode like '".$mcodelike."%')");
        }
        foreach($officelist as &$row){
            $row['zhihang'] = substr($row['mcode'],0,4);
        }

        $pageButton = $page->show();
        $this->assign('officelist',$officelist);
        $this->assign('pageButton',$pageButton);
        $this->display();
    }


    //查询并展示网点信息
    public function editinfo(){
        $info = D('office');
        $id = $_GET['id'];
        $info = $info->where('id='.$id)->select();
        $this->assign('oinfolist',$info);
        $this->display();
    }


    //编辑网点信息
    public function oinfochange(){
        $id = $_POST['id'];
        $data['phone'] = $_POST['phone'];
        $data['address'] = $_POST['address'];
        $data['postalcode'] = $_POST['postalcode'];
        $office = D('office');
        $result = $office->where('id='.$id)->save($data);
        if($result==1){
            $this->success('成功修改信息', 'index');
        }else{
            $this->error('未修改任何信息');
        }
    }


    //创建微站展示模板
    public function createwebsite(){

        $_SESSION['xql']['website']['officeid'] = $_GET['id'];
        $officeid = $_GET['id'];

        //选择模板后传来模板id来执行一系列操作来以创建微站
        if($_GET['templateid']!=NULL){
            $websitedata['templateid'] = $_GET['templateid'];
            $websitedata['officeid'] = $_GET['officeid'];
            $website = D('website');
            $template = D('template');
            $bitmap = D('bitmap');
            $maxwid = $website->query("select max(wid)+1 as wid from website");
            $websitedata['wid'] = intval($maxwid['0']['wid']);
            $wid = $websitedata['wid'];
            $tid = $websitedata['templateid'];
            if ($wid!=NULL) {
                $_SESSION['createwebsite']['wid'] = $wid;
            }

            /*2017年7月12日16:17:14//夏千狸与2017年7月11日10:14:59为优化逻辑添加开始
            
            //准备分权展示管理员所需要的变量
            $masknum = $_SESSION['admin']['masknum'];
            $admincode = $_SESSION['admin']['admincode'];
            $admincodelen = strlen($admincode);
            $adminlike = substr($admincode,0,$admincodelen-$masknum);
            $adminmrank = $_SESSION['admin']['mrank'];
            $adminid = $_SESSION['admin']['id'];
            
            //查询这个管理员有权利使用的轮播图
            $resource = D('resource');
            $slideshowlist = $resource
                        ->join("left join admin on resource.rcode = admin.admincode")
                        ->where("(resource.type=2) and(resource.isaudit=1) and ((resource.rcode like '".$adminlike."%' and admin.mrank!='".$adminmrank."') or admin.id='".$adminid."')")
                        ->group('resource.rid')
                        ->order('resource.priority asc')
                        ->select();

            //轮播图数量 slideshowlist count
            $sc = count($slideshowlist,0);
            
            //查询这个管理员有权利使用的按钮
            $buttonlist = $resource
                        ->join("left join admin on resource.rcode = admin.admincode")
                        ->where("(resource.type=1) and(resource.isaudit=1) and ((resource.rcode like '".$adminlike."%' and admin.mrank!='".$adminmrank."') or admin.id='".$adminid."')")
                        ->group('resource.rid')
                        ->order('resource.priority asc')
                        ->select();

            //按钮数量 button count
            $bc = count($buttonlist,0);
            
            //设置页面编码格式,不然die出来的中文是乱码
            header("Content-type: text/html; charset=utf-8"); 

            //拦截不符合条件的创建微站的意图
            if($sc<$_GET['sn']){
                die("<h1>已通过审核的轮播图数量不足".$_GET['sn']."张,请及时<a href='http://wx.china-yubo.cn/TP/pf/Ht/Resource/slideshow.html'>添加轮播图</a>并联系上级管理员通过审核</h1>");
            }
            if($bc<$_GET['bn']){
                die("<h1>已通过审核的按钮数量不足".$_GET['bn']."张,请及时<a href='http://wx.china-yubo.cn/TP/pf/Ht/Resource/addbutton.html'>添加按钮</a>并联系上级管理员通过审核</h1>");
            }

            //夏千狸与2017年7月11日10:14:59为优化逻辑添加结束*/
            
            
            //在website表中插入记录
            $websiteresult = $website->add($websitedata);
            $websiteurl = "服务器地址/wid/".$websitedata['wid'];
            $urldata['url'] = $websiteurl;
            $websiteurlresult = $website->where('wid='.$wid)->save($urldata);
            $this->redirect('Office/selectresource', array('tid' => $tid), 0, '正在加载选择资源的页面...');

            //获得用户选择模板的按钮数和轮播图数
            $templateinfo = $template->where('id='.$tid)->find();
            $bnum = $templateinfo['buttonnum'];
            $snum = $templateinfo['slideshownum'];

            /*//在bitmap中循环插入数据
            for($bi=1;$bi<$bnum+1;$bi++){
                //echo '执行第'.$bi.'次开始'.'<br>';
                //var_dump($wid);
                //echo '执行第'.$bi.'次结束'.'<br><br>';
            }*/
            
        }

        //实例化模板表并
        $template = D('template');
        $templatelist = $template->select();

        //传送数据
        $this->assign('officeid',$officeid);
        $this->assign('templatelist',$templatelist);

        //显示 创建 微站 选择 模板create website select template
        $this->display('cwst');
    }


    //创建微站选择资源
    public function selectresource(){
        
        //实例化需要用到的对象
        $website = D('website');
        $template = D('template');
        $bitmap = D('bitmap');
        $resource = D('resource');

        //获得用户选择模板的按钮数和轮播图数
        if($_GET['tid']!=NULL){
            $_SESSION['xql']['createwebsite']['tid']=$_GET['tid'];
        }
        if($_GET['tid']==NULL){
            $_GET['tid']=$_SESSION['xql']['createwebsite']['tid'];
        }
        $tid = $_GET['tid'];
        $templateinfo = $template->where('id='.$tid)->find();
        $bnum = $templateinfo['buttonnum'];
        $snum = $templateinfo['slideshownum'];
        $selectinfo = 'Hi,这套模板需要您选择'.$snum.'张轮播图,'.$bnum.'个按钮.';

        //准备分权展示管理员所需要的变量
        $masknum = $_SESSION['admin']['masknum'];
        $admincode = $_SESSION['admin']['admincode'];
        $admincodelen = strlen($admincode);
        $adminlike = substr($admincode,0,$admincodelen-$masknum);
        $adminmrank = $_SESSION['admin']['mrank'];
        $adminid = $_SESSION['admin']['id'];

        //查询这个管理员有权利使用的轮播图
        $slideshowlist = $resource
                    ->join("left join admin on resource.rcode = admin.admincode")
                    ->where("(resource.type=2) and(resource.isaudit=1) and ((resource.rcode like '".$adminlike."%' and admin.mrank!='".$adminmrank."') or admin.id='".$adminid."')")
                    ->group('resource.rid')
                    ->order('resource.priority asc')
                    ->select();

        //查询这个管理员有权利使用的按钮
        $buttonlist = $resource
                    ->join("left join admin on resource.rcode = admin.admincode")
                    ->where("(resource.type=1) and(resource.isaudit=1) and ((resource.rcode like '".$adminlike."%' and admin.mrank!='".$adminmrank."') or admin.id='".$adminid."')")
                    ->group('resource.rid')
                    ->order('resource.priority asc')
                    ->select();

        //在bitmap中循环插入数据
        if(IS_POST){
            $snuminfo = count($_POST['rids']);
            $bnuminfo = count($_POST['ridb']);

            /*2017年7月12日16:16:56//对提交条件进行限制
            if($snuminfo<$snum){
                $this->error('请最少选择'.$snum.'张轮播图');
            }
            if($bnuminfo<$bnum){
                $this->error('请最少选择'.$bnum.'个按钮');
            }*/

            //接收传来的资源id
            $resourceidlist[] = array_merge($_POST['rids'],$_POST['ridb']);
            $resourceidlist = $resourceidlist['0'];
            $resourceidcount = count($resourceidlist);
            $wid = $_SESSION['createwebsite']['wid'];

            //在点位表中用循环加入数据
            for($i=1;$i<$resourceidcount+1;$i++){
                $bitmapdata['websiteid'] = $wid;
                $bitmapdata['resourceid'] = $resourceidlist[$i-1];
                $bitmapresult = $bitmap->add($bitmapdata);
            }

            $this->redirect('Office/index');

        }

        $this->assign('selectinfo',$selectinfo);
        $this->assign('slideshowlist',$slideshowlist);
        $this->assign('buttonlist',$buttonlist);
        $this->display();

    }


    //夏千狸添加于2017年5月28日23:54:13
    //添加网点
    public function officeadd(){

        //一波约束
        if($_POST['onum']===''){

            $this->error('机构编号不能为空');

        }

        //添加网点数据
        if(IS_POST){

            $office = D('office');

            if($office->create()){

                $result = $office->add();

                if($result){

                    $insertId = $result;
                    $this->success('创建网点成功,网点的id是'.$insertId.'<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>');

                }

            }

        }

        $this->display();

    }



    //夏千狸添加于2017年5月29日01:09:40
    //处理网点csv相关
    public function officecsv(){

        //实例化网点表并解析模板也传来的意图
        $office = D('office');
        $action = $_GET['action']; 

        //导入CSV  
        if ($action == 'import'){

            //csv处理函数  
            function input_csv($csv_file) {
                $result_arr = array ();
                $i = 0;
                while ($data_line = fgetcsv($csv_file, 10000)){
                    if($i == 0){
                        $GLOBALS['csv_key_name_arr'] = $data_line;
                        $i++;
                        continue;
                    }
                    foreach($GLOBALS['csv_key_name_arr'] as $csv_key_num=>$csv_key_name){
                        $result_arr[$i][$csv_key_name] = $data_line[$csv_key_num];
                    }
                    $i++;
                }
                return $result_arr;
            }

            //导入数据 
            $filename = $_FILES['file']['tmp_name'];  

            //一波约束 
            if(empty ($filename)){   
                echo '请选择要导入的CSV文件！';   
                exit;   
            }  

            //获取文件内容 
            $handle = fopen($filename, 'r');  

            //解析csv 
            $result = input_csv($handle); 

            //获取条数
            $len_result = count($result); 

            //又一波约束
            if($len_result==0){   
                echo '没有任何数据！';   
                exit;   
            }

            //循环获取各字段值
            for($i = 1; $i <= $len_result; $i++){

                //扔到咱们祖传的服务器上可能需要转码,下面是转码示例
                //$name = iconv('gb2312', 'utf-8', $result[$i][0]); 
                   
                //拼装需要插入的数据 
                $officedata['id'] = $result[$i][id];
                $officedata['onum'] = $result[$i][onum];
                $officedata['mcode'] = $result[$i][mcode];
                $officedata['place'] = $result[$i][place];
                $officedata['oname'] = $result[$i][oname];
                $officedata['phone'] = $result[$i][phone];
                $officedata['address'] = $result[$i][address];
                $officedata['postalcode'] = $result[$i][postalcode];
                $officedata['superior'] = $result[$i][superior];

                //逐条插入,如果数据量巨大,导致超时插入失败,可考虑更改i的值以控制插入的条数
                $result['i'] = $office->add($officedata);
                    
            } 

            //去掉最后一个逗号
            //$data_values = substr($data_values,0,-1); 
             
            //关闭指针 
            fclose($handle); 
            echo '<h1>导入成功!</h1>';   
             
        //导出CSV   
        }elseif($action=='export'){   
            //用于参考
            /*
            global $_GPC,$_W,$_POST;

            $ql_csv_path = "/www/web/www_qihe_tech_com/public_html/output";

            $ql_csv_file = "huafei_record_".time()."_".rand(100,999).".csv";

            $ql_csv_url = $ql_csv_path.$ql_csv_file;

            $ql_csv_dbname = tablename('huafei_record');

            $result = pdo_fetchall('SELECT jpzl,tel,card_cast,orderid,FROM_UNIXTIME(createtime),commitcode,errorcode,errorinfo,FROM_UNIXTIME(returntime),openid,FROM_UNIXTIME(callback_time),Request_time FROM '.$ql_csv_dbname." INTO OUTFILE '".$ql_csv_url."' FIELDS TERMINATED BY ',' ENCLOSED BY '\"' LINES TERMINATED BY '\r\n'");

            $newfile = "../addons/xql_hf2/csv/".$ql_csv_file;

            copy($ql_csv_url,$newfile);

            header("Location: http:".$newfile); 
            */
            
            

            /*//echo "1111111";die();
            
            //重定义头部信息
            function export_csv($filename,$data){   
                header("Content-type:text/csv");   
                header("Content-Disposition:attachment;filename=".$filename);   
                header('Cache-Control:must-revalidate,post-check=0,pre-check=0');   
                header('Expires:0');   
                header('Pragma:public');   
                echo $data;   
            } 

            
            //$result = mysql_query("select * from office order by id asc");  
            $result = $office->select();
            //var_dump($result);
            //die; 
            $str = "ID,机构编号,管理码,城市地区,机构名称,固定电话,地址,邮政编码,支行\n";   
            $str = iconv('utf-8','gb2312',$str);   

            while($row=$result){   

                $id = $row['id'];
                $onum = $row['onum'];
                $mcode = $row['mcode'];
                $place = iconv('utf-8','gb2312',$row['place']);
                $oname = iconv('utf-8','gb2312',$row['oname']);
                $phone = iconv('utf-8','gb2312',$row['phone']);
                $address = iconv('utf-8','gb2312',$row['address']);
                $postalcode = iconv('utf-8','gb2312',$row['postalcode']);
                $superior = iconv('utf-8','gb2312',$row['superior']);

                $str .= $name.",".$sex.",".$row['age']."\n"; //用引文逗号分开   

            }  
            var_dump($str);
            die();

            //设置文件名 
            $filename = date('Ymd').'.csv';

            //导出   
            export_csv($filename,$str);     */

        }  

        //显示模板
        $this->display();

    }


    
}