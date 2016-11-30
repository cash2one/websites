<?php 
/**
 *
 * ━━━━━━神兽出没━━━━━━
 * 　　　┏┓　　　┏┓
 * 　　┏┛┻━━━┛┻┓
 * 　　┃　　　　　　　┃
 * 　　┃　　　━　　　┃
 * 　　┃　┳┛　┗┳　┃
 * 　　┃　　　　　　　┃
 * 　　┃　　　┻　　　┃
 * 　　┃　　　　　　　┃
 * 　　┗━┓　　　┏━┛Code is far away from bug with the animal protecting
 * 　　　　┃　　　┃    神兽保佑,代码无bug
 * 　　　　┃　　　┃
 * 　　　　┃　　　┗━━━┓
 * 　　　　┃　　　　　　　┣┓
 * 　　　　┃　　　　　　　┏┛
 * 　　　　┗┓┓┏━┳┓┏┛
 * 　　　　　┃┫┫　┃┫┫
 * 　　　　　┗┻┛　┗┻┛
 *
 * ━━━━━━感觉萌萌哒━━━━━━
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header("Content-type: text/html; charset=utf-8"); 

class Cms_contentMan extends Base_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->model('sys_cms_content');
            $this->load->model('sys_cms_category');
            $this->load->model('sys_cms_class');
            $this->config->load('config_site', TRUE);
        }

        public function index()
        {
            $_like = array();
            $_where = array();
            $_order_by = array('id' => 'desc');
            $_keywords = $this->input->get_post('keywords');
            $cid = $this->input->get_post('cid');
            if(notBlank($_keywords)){
               $_like['title'] = $_keywords;
            }

            if($cid){
                $_like['cid'] = $cid;
            }
            //print_r($this->sys_cms_content->getCount());
            $this->put("cid",$cid);
            $this->put("keywords",$_keywords);
            $this->put("group_list",$this->sys_cms_category->getCateList());
            $page = $this->sys_cms_content->getListByPage($this->page_offset, $_where, $_like,$_order_by,$cols=array('*'),$join=array(),18);

            $this->put("pagerbar", $this->getPageBar('index.php?c=cms_contentMan&m=index&keywords='.$_keywords.'&cid='.$cid.'', $page['total']));

            $this->put("list", $page['list']);
            $this->put("total",$page['total']);
            $this->render('sys_cms_content.html');
        }

    public function sysadd()
    {

        if(IS_POST){
            $content_data = array();
            $_data = $this->parseData(array('class_id','title','catname','cid','editorValue','openid','newsdate','description','headimage','2weima','logourl','isrecommend','isfirsttitle'));
            $_data['title'] = str_replace(" ", "", $_data['title']);
            if(empty($_data['title'])){
                echo "标题不能为空";
                exit;
            }

            //内容模型，对应模板
            #$_data['model'] = 0;

            //判断标题是否重复
            $_checktitle = $this->sys_cms_content->getCount(array(
                'title'=>$_data['title']
            ));
            if($_checktitle>0){
                echo "The title to repeat";
                exit;
            }

            if(isset($_POST['headimage2']))
            {
                $_headimage2 = $_POST['headimage2'];
            }
            
            if(!empty($_headimage2)){
                $_data['headimage'] = empty($_data['headimage']) ? $_headimage2 : $_data['headimage'];
            }
            
            //没有公众号添加公众号
            $_check = $this->sys_cms_category->getCount(array(
                'catname'=>$this->input->post('catname')
            ));
            if($_check==0){
                $_data_cat = $this->parseData(array('catname','openid','logourl','2weima','class_id'));
                $_data_cat['description'] = $_data_cat['catname'];
                if($_data_cat['catname']){
                    $this->handleResult($this->sys_cms_category->addEntity($_data_cat));
                }
            }

            //根据openid来判断真实的栏目id
            $arr_cat = $this->sys_cms_category->checkCatByCatname($_data['catname']);
            // $arr_cat = $this->sys_cms_category->checkCatByOpenid($_data['openid']);
            if(count($arr_cat)>0){
                $_data['cid'] = $arr_cat[0]['id'];
                $_data['catname'] = $arr_cat[0]['catname'];
                $_data['class_id'] = $arr_cat[0]['class_id'];
                $_data['2weima'] = $arr_cat[0]['2weima'];
                $_data['logourl'] = $arr_cat[0]['logourl'];
                $_data['openid'] = $arr_cat[0]['openid'];
                
            }else{
                //没有找到对应公众号就随机取一个
                $arr_cat = $this->sys_cms_category->catmap('all');
                $rand_keys =  array_rand($arr_cat);
                $_data['cid'] = $arr_cat[$rand_keys]['id'];
                $_data['catname'] = $arr_cat[$rand_keys]['catname'];
                $_data['class_id'] = $arr_cat[$rand_keys]['class_id'];
                $_data['2weima'] = $arr_cat[$rand_keys]['2weima'];
                $_data['logourl'] = $arr_cat[$rand_keys]['logourl'];
                $_data['openid'] = $arr_cat[$rand_keys]['openid'];
            }


            if($_checktitle==0){
                //$_data['id'] = get_rnd_id();
                // $_data['content'] =  $_data['editorValue'];
                $content_data['cid'] =  $_data['cid'];
                $content_data['content'] =  $_data['editorValue'];
                //关键词替换添加链接
                $config_site = $this->config->item('config_site');
                $filename = dirname(__FILE__).'/../../upload/keyword.txt';
                if(file_exists($filename)){
                    $keyword_arr = $this->getTitleArr($filename);
                    if(count($keyword_arr)>1){
                        $word_arr = array();
                        $repl_arr = array();
                        $word_url = "";
                        foreach ($keyword_arr as $key => $value) {
                            if(strlen($value)>0){
                                $keyword = str_replace(" ", "", $value);
                                $keyword = str_replace("\r\n", "", $keyword);
                                //根据关键词查找链接
                                $url_arr = $this->sys_cms_content->getUrlByKeyword($keyword);
                                if(count($url_arr)>0){
                                    $word_url = $config_site['domainname']."/view-".$url_arr['id'].".html";
                                }else{
                                    $word_url = $config_site['domainname'];
                                }
                                $word_arr[] = "/".$keyword."/";
                                $repl_arr[] = "<a href = \"".$word_url."\">".$keyword."</a>";
                            }
                        }

                        //替换词不为空时替换
                        if(count($word_arr)>0){
                            $content_data['content'] = preg_replace($word_arr, $repl_arr, $content_data['content'],1);
                        }

                    }
                    
                }else{
                    //echo "not exists";
                }
                unset($_data['editorValue']);
                if(empty($_data['newsdate'])){
                    $_data['newsdate'] = strtotime("now"); 
                }
                //事务
                $this->db->trans_start();
                $content_id = $this->sys_cms_content->addEntity($_data);
                //事务结束
                $this->db->trans_complete();
                //插入内容
                if($content_id){
                    $content_data['id'] =  $content_id ;
                    $tableindex = $this->get_hash_table($content_id);
                    $content_data['content'] = str_replace("'", '"', $content_data['content']);
                    $sql = "INSERT INTO sys_cms_content_data_".$tableindex."(id,cid,content) VALUES ('".$content_data['id']."','".$content_data['cid']."','".$content_data['content']."')";
                    //事务
                    $this->db->trans_start();
                    $this->db->query($sql);
                    $result=$this->db->insert_id();
                    //事务结束
                    $this->db->trans_complete();
                }
                //更新tags
                $tagname = isset($_POST['tags']) ? $_POST['tags'] : '';
                $this->updatetags($tagname,$content_id);



                //发送百度ping指令
                // $val = $this->sys_cms_content->getContentById($insert_id);
                $listurl = $config_site['domainname']."/list-".$_data['cid'].".html";
                $conurl = $config_site['domainname']."/view-". $content_id .".html";
                $params = "<params>".
                                "<param><value><string>".$_data['title']."</string></value></param>".
                                "<param><value><string>".$config_site['domainname']."</string></value></param>".
                                "<param><value><string>".$listurl."</string></value></param>".
                                "<param><value><string>".$conurl."</string></value></param>".
                            "</params>";
                $baiduXML = "
                    <?xml version=\"1.0\" encoding=\"UTF-8\"?>
                    <methodCall>
                    <methodName>weblogUpdates.extendedPing</methodName>".$params."
                    </methodCall>";
                $res = $this->postUrl('http://ping.baidu.com/ping/RPC2', $baiduXML);

                //下面是返回成功与否的判断（根据百度ping的接口说明）
                //if (strpos($res, "<int>0</int>"))
                //echo "PING成功--------------->".$val['title']."</br>";
                //else
                //echo "PING失败-->".$val['title']."</br>";

                //实时推送
                // $siteurl = str_replace("http://", "", $config_site['domainname']);
                // $siteurl = str_replace("/", "", $siteurl);
                // if($conurl){
                //     $urls = array(
                //        $conurl,
                //     );
                //     $api = 'http://data.zz.baidu.com/urls?site='. $siteurl.'&token=vQxpmiwgV2WVN0UU';
                //     $ch = curl_init();
                //     $options =  array(
                //         CURLOPT_URL => $api,
                //         CURLOPT_POST => true,
                //         CURLOPT_RETURNTRANSFER => true,
                //         CURLOPT_POSTFIELDS => implode("\n", $urls),
                //         CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
                //     );
                //     curl_setopt_array($ch, $options);
                //     $result = curl_exec($ch);
                // }

                $this->handleResult($result);

            }else{
                if($_data['isfirsttitle']){
                     $this->sys_cms_content->updateFirsttitle($_data['title']);
                     echo "update firsttitle";
                     exit;
                }
            }
        }
        //echo '操作成功';
        //exit;
        $this->put("group_list",$this->sys_cms_category->getCateList());
        $this->render('sys_cms_content_edit.html');
    } 

    public function add()
    {

        if(IS_POST){
            $content_data = array();
            $_data = $this->parseData(array('class_id','title','catname','cid','editorValue','openid','newsdate','description','headimage','2weima','logourl','isrecommend','isfirsttitle'));
            $_data['title'] = str_replace(" ", "", $_data['title']);
            if(empty($_data['title'])){
                echo "标题不能为空";
                exit;
            }

            //内容模型，对应模板
            #$_data['model'] = 0;

            //判断标题是否重复
            $_checktitle = $this->sys_cms_content->getCount(array(
                'title'=>$_data['title']
            ));
            if($_checktitle>0){
                echo "The title to repeat";
                exit;
            }

            if(isset($_POST['headimage2']))
            {
                $_headimage2 = $_POST['headimage2'];
            }
            
            if(!empty($_headimage2)){
                $_data['headimage'] = empty($_data['headimage']) ? $_headimage2 : $_data['headimage'];
            }
            
            //查找大栏目拼音
            $infoclass = $this->sys_cms_class->infoclass($_data['class_id']);
            if(count($infoclass)){
                $_data['classename'] = $infoclass[0]['ename'];
            }
            //没有公众号添加公众号
            $_check = $this->sys_cms_category->getCount(array(
                'catname'=>$this->input->post('catname')
            ));
            if($_check==0){
                $_data_cat = $this->parseData(array('catname','openid','logourl','2weima','class_id'));
                $_data_cat['description'] = $_data_cat['catname'];
                if($_data_cat['catname']){
                    $this->handleResult($this->sys_cms_category->addEntity($_data_cat));
                }
            }

            //根据openid来判断真实的栏目id
            $arr_cat = $this->sys_cms_category->checkCatByCatname($_data['catname']);
            // $arr_cat = $this->sys_cms_category->checkCatByOpenid($_data['openid']);
            if(count($arr_cat)>0){
                $_data['cid'] = $arr_cat[0]['id'];
                $_data['catname'] = $arr_cat[0]['catname'];
                $_data['class_id'] = $arr_cat[0]['class_id'];
                $_data['2weima'] = $arr_cat[0]['2weima'];
                $_data['logourl'] = $arr_cat[0]['logourl'];
                $_data['openid'] = $arr_cat[0]['openid'];
                
            }else{
                //没有找到对应公众号就随机取一个
                // $arr_cat = $this->sys_cms_category->catmap('all');
                // $rand_keys =  array_rand($arr_cat);
                $arr_cat = $this->sys_cms_category->getCatByClassid($_data['class_id']);
                $rand_keys =  0;
                $_data['cid'] = $arr_cat[$rand_keys]['id'];
                $_data['catname'] = $arr_cat[$rand_keys]['catname'];
                $_data['class_id'] = $arr_cat[$rand_keys]['class_id'];
                $_data['2weima'] = $arr_cat[$rand_keys]['2weima'];
                $_data['logourl'] = $arr_cat[$rand_keys]['logourl'];
                $_data['openid'] = $arr_cat[$rand_keys]['openid'];
            }


            if($_checktitle==0){
                //$_data['id'] = get_rnd_id();
                // $_data['content'] =  $_data['editorValue'];
                $content_data['cid'] =  $_data['cid'];
                $content_data['content'] =  $_data['editorValue'];
                //关键词替换添加链接
                $config_site = $this->config->item('config_site');
                $filename = dirname(__FILE__).'/../../upload/keyword.txt';
                if(file_exists($filename)){
                    $keyword_arr = $this->getTitleArr($filename);
                    if(count($keyword_arr)>1){
                        $word_arr = array();
                        $repl_arr = array();
                        $word_url = "";
                        foreach ($keyword_arr as $key => $value) {
                            if(strlen($value)>0){
                                $keyword = str_replace(" ", "", $value);
                                $keyword = str_replace("\r\n", "", $keyword);
                                //根据关键词查找链接
                                $url_arr = $this->sys_cms_content->getUrlByKeyword($keyword);
                                if(count($url_arr)>0){
                                    $word_url = $config_site['domainname']."/view-".$url_arr['id'].".html";
                                }else{
                                    $word_url = $config_site['domainname'];
                                }
                                $word_arr[] = "/".$keyword."/";
                                $repl_arr[] = "<a href = \"".$word_url."\">".$keyword."</a>";
                            }
                        }

                        //替换词不为空时替换
                        if(count($word_arr)>0){
                            $content_data['content'] = preg_replace($word_arr, $repl_arr, $content_data['content'],1);
                        }

                    }
                    
                }else{
                    //echo "not exists";
                }
                unset($_data['editorValue']);
                if(empty($_data['newsdate'])){
                    $_data['newsdate'] = strtotime("now"); 
                }
                //事务
                $this->db->trans_start();
                $content_id = $this->sys_cms_content->addEntity($_data);
                //事务结束
                $this->db->trans_complete();
                //插入内容
                if($content_id){
                    $content_data['id'] =  $content_id ;
                    $tableindex = $this->get_hash_table($content_id);
                    $content_data['content'] = str_replace("'", '"', $content_data['content']);
                    $sql = "INSERT INTO sys_cms_content_data_".$tableindex."(id,cid,content) VALUES ('".$content_data['id']."','".$content_data['cid']."','".$content_data['content']."')";
                    //事务
                    $this->db->trans_start();
                    $this->db->query($sql);
                    $this->db->insert_id();
                    //事务结束
                    $this->db->trans_complete();
                }
                //更新tags
                $tags = isset($_POST['tags']) ? $_POST['tags'] : '';
                $tagname = $_POST['tags'];
                $this->updatetags($tagname,$content_id);



                //发送百度ping指令
                /**$listurl = $config_site['domainname']."/list-".$_data['cid'].".html";
                $conurl = $config_site['domainname']."/view-". $content_id .".html";
                $params = "<params>".
                                "<param><value><string>".$_data['title']."</string></value></param>".
                                "<param><value><string>".$config_site['domainname']."</string></value></param>".
                                "<param><value><string>".$listurl."</string></value></param>".
                                "<param><value><string>".$conurl."</string></value></param>".
                            "</params>";
                $baiduXML = "
                    <?xml version=\"1.0\" encoding=\"UTF-8\"?>
                    <methodCall>
                    <methodName>weblogUpdates.extendedPing</methodName>".$params."
                    </methodCall>";
                $res = $this->postUrl('http://ping.baidu.com/ping/RPC2', $baiduXML);**/
                $this->handleResult($result);

            }else{
                if($_data['isfirsttitle']){
                     $this->sys_cms_content->updateFirsttitle($_data['title']);
                     echo "update firsttitle";
                     exit;
                }
            }
        }
        echo '操作成功';
        exit;

    }

    public function addkb()
    {

        if(IS_POST){
            $content_data = array();
            $_data = $this->parseData(array('url','class_id','title','catname','cid','editorValue','openid','newsdate','description','headimage','2weima','logourl','isrecommend','isfirsttitle'));
            $_data['title'] = str_replace(" ", "", $_data['title']);
            $kbid = $_POST['kbid'];
            if(empty($_data['title']) || empty($kbid) ){
                echo "标题不能为空";
                exit;
            }

            //内容模型，对应模板
            #$_data['model'] = 0;

            //判断标题是否重复
            $_checktitle = $this->sys_cms_content->getCount(array(
                'title'=>$_data['title']
            ));
            if($_checktitle>0){
                echo "The title to repeat";
                exit;
            }

            //获取内容
            $content = $this->getkbcontent($kbid);
            if(empty($content)){
                echo "内容不能为空";
                exit;
            }

            if(isset($_POST['headimage2']))
            {
                $_headimage2 = $_POST['headimage2'];
            }
            
            if(!empty($_headimage2)){
                $_data['headimage'] = empty($_data['headimage']) ? $_headimage2 : $_data['headimage'];
            }
            
            //没有公众号添加公众号
            $_check = $this->sys_cms_category->getCount(array(
                'catname'=>$this->input->post('catname')
            ));
            if($_check==0){
                $_data_cat = $this->parseData(array('catname','openid','logourl','2weima','class_id'));
                $_data_cat['description'] = $_data_cat['catname'];
                if($_data_cat['catname']){
                    $this->handleResult($this->sys_cms_category->addEntity($_data_cat));
                }
            }

            //根据openid来判断真实的栏目id
            $arr_cat = $this->sys_cms_category->checkCatByCatname($_data['catname']);
            // $arr_cat = $this->sys_cms_category->checkCatByOpenid($_data['openid']);
            if(count($arr_cat)>0){
                $_data['cid'] = $arr_cat[0]['id'];
                $_data['catname'] = $arr_cat[0]['catname'];
                $_data['class_id'] = $arr_cat[0]['class_id'];
                $_data['2weima'] = $arr_cat[0]['2weima'];
                $_data['logourl'] = $arr_cat[0]['logourl'];
                $_data['openid'] = $arr_cat[0]['openid'];
                
            }else{
                //没有找到对应公众号就随机取一个
                // $arr_cat = $this->sys_cms_category->catmap('all');
                // $rand_keys =  array_rand($arr_cat);
                $arr_cat = $this->sys_cms_category->getCatByClassid($_data['class_id']);
                $rand_keys =  0;
                $_data['cid'] = $arr_cat[$rand_keys]['id'];
                $_data['catname'] = $arr_cat[$rand_keys]['catname'];
                $_data['class_id'] = $arr_cat[$rand_keys]['class_id'];
                $_data['2weima'] = $arr_cat[$rand_keys]['2weima'];
                $_data['logourl'] = $arr_cat[$rand_keys]['logourl'];
                $_data['openid'] = $arr_cat[$rand_keys]['openid'];
            }


            if($_checktitle==0){
                //$_data['id'] = get_rnd_id();
                // $_data['content'] =  $_data['editorValue'];
                $content_data['cid'] =  $_data['cid'];
                $content_data['content'] =  $_data['editorValue'];
                //关键词替换添加链接
                $config_site = $this->config->item('config_site');
                $filename = dirname(__FILE__).'/../../upload/keyword.txt';
                if(file_exists($filename)){
                    $keyword_arr = $this->getTitleArr($filename);
                    if(count($keyword_arr)>1){
                        $word_arr = array();
                        $repl_arr = array();
                        $word_url = "";
                        foreach ($keyword_arr as $key => $value) {
                            if(strlen($value)>0){
                                $keyword = str_replace(" ", "", $value);
                                $keyword = str_replace("\r\n", "", $keyword);
                                //根据关键词查找链接
                                $url_arr = $this->sys_cms_content->getUrlByKeyword($keyword);
                                if(count($url_arr)>0){
                                    $word_url = $config_site['domainname']."/view-".$url_arr['id'].".html";
                                }else{
                                    $word_url = $config_site['domainname'];
                                }
                                $word_arr[] = "/".$keyword."/";
                                $repl_arr[] = "<a href = \"".$word_url."\">".$keyword."</a>";
                            }
                        }

                        //替换词不为空时替换
                        if(count($word_arr)>0){
                            $content_data['content'] = preg_replace($word_arr, $repl_arr, $content_data['content'],1);
                        }

                    }
                    
                }else{
                    //echo "not exists";
                }
                unset($_data['editorValue']);
                if(empty($_data['newsdate'])){
                    $_data['newsdate'] = strtotime("now"); 
                }
                //事务
                $this->db->trans_start();
                $content_id = $this->sys_cms_content->addEntity($_data);
                //事务结束
                $this->db->trans_complete();
                //插入内容
                if($content_id){
                    $content_data['id'] =  $content_id ;

                    $tableindex = $this->get_hash_table($content_id);
                    $content = str_replace("'", '"', $content);
                    $sql = "INSERT INTO sys_cms_content_data_".$tableindex."(id,cid,content) VALUES ('".$content_data['id']."','".$content_data['cid']."','".$content."')";
                    //事务
                    $this->db->trans_start();
                    $this->db->query($sql);
                    $this->db->insert_id();
                    //事务结束
                    $this->db->trans_complete();
                }
                //更新tags
                $tagname = $_POST['tags'];
                $this->updatetags($tagname,$content_id);



                //发送百度ping指令
                // $val = $this->sys_cms_content->getContentById($insert_id);
                $listurl = $config_site['domainname']."/list-".$_data['cid'].".html";
                $conurl = $config_site['domainname']."/view-". $content_id .".html";
                $params = "<params>".
                                "<param><value><string>".$_data['title']."</string></value></param>".
                                "<param><value><string>".$config_site['domainname']."</string></value></param>".
                                "<param><value><string>".$listurl."</string></value></param>".
                                "<param><value><string>".$conurl."</string></value></param>".
                            "</params>";
                $baiduXML = "
                    <?xml version=\"1.0\" encoding=\"UTF-8\"?>
                    <methodCall>
                    <methodName>weblogUpdates.extendedPing</methodName>".$params."
                    </methodCall>";
                $res = $this->postUrl('http://ping.baidu.com/ping/RPC2', $baiduXML);
                //下面是返回成功与否的判断（根据百度ping的接口说明）
                //if (strpos($res, "<int>0</int>"))
                //echo "PING成功--------------->".$val['title']."</br>";
                //else
                //echo "PING失败-->".$val['title']."</br>";

                //实时推送
                // $siteurl = str_replace("http://", "", $config_site['domainname']);
                // $siteurl = str_replace("/", "", $siteurl);
                // if($conurl){
                //     $urls = array(
                //        $conurl,
                //     );
                //     $api = 'http://data.zz.baidu.com/urls?site='. $siteurl.'&token=vQxpmiwgV2WVN0UU';
                //     $ch = curl_init();
                //     $options =  array(
                //         CURLOPT_URL => $api,
                //         CURLOPT_POST => true,
                //         CURLOPT_RETURNTRANSFER => true,
                //         CURLOPT_POSTFIELDS => implode("\n", $urls),
                //         CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
                //     );
                //     curl_setopt_array($ch, $options);
                //     $result = curl_exec($ch);
                // }
                //$this->handleResult($result);

                //http://city.china-7.net/kb.html?id=ENT2015120200201301&cid=007&aid=1 获取kb内容
                //$this->load->view($config_site['skin'].'/kb.html',$data_kb);
                // $this->showkb($kbid,$content_id,$content_data['cid']);
                // $content = $this->getkbcontent($kbid);
                // exit;

            }else{
                if($_data['isfirsttitle']){
                     $this->sys_cms_content->updateFirsttitle($_data['title']);
                     echo "update firsttitle";
                     exit;
                }
            }
        }
        echo '操作成功';
        exit;

    }

    public function updatekbcontent(){
        
        if(IS_POST){
            $content = $_POST['content'];
            $content_id = $_POST['id'];
            $content_cid = $_POST['cid'];
            echo "contentid:".$content_id;
            echo "content_cid:".$content_cid;
            exit;
            //插入内容
            if($content_id){
                $content_data['id'] =  $content_id ;
                $content_data['cid'] = $content_cid;
                $tableindex = $this->get_hash_table($content_id);
                $content_data['content'] = str_replace("'", '"', $content);
                $sql = "INSERT INTO sys_cms_content_data_".$tableindex."(id,cid,content) VALUES ('".$content_data['id']."','".$content_data['cid']."','".$content_data['content']."')";
                //事务
                $this->db->trans_start();
                $this->db->query($sql);
                $this->db->insert_id();
                //事务结束
                $this->db->trans_complete();
                echo '操作成功';
                exit;
            }
            }else{

            }
    }

    public function getkbcontent($kbid=0){

        require_once(dirname(__FILE__) . '/../libraries/Snoopy.class.php');
        // header("Content-Type: text/html; charset=utf-8");
        // set_time_limit(0);
        $snoopy = new Snoopy;
        // $kbid = isset($_GET['kbid']) ? $_GET['kbid'] : $kbid;
        // 20151204C00BP500
        if($kbid){
            $kburl = 'http://openapi.kuaibao.qq.com/getSubNewsContent?callback=responseData&appver=8.4_qnreading_1.0.0&screen_width=320&screen_height=568&devid=D5126D83-6E2F-4C7F-8BEF-3D81E34C4387&device_model=iPhone&screen_scale=2&id='.$kbid.'&alg_version=0&chlid=news_news_dailyhot&media_id=2240&seq_no=&isShowTitle=1&_=1448979895357';

        }else{
            exit;
        }

        $content = "";
        if($kburl){
            $snoopy->fetch($kburl); 
            
            //判断连接状态
            $snoopy_status = $snoopy->status;
            if($snoopy_status==200){
                $result = $snoopy->results;
                
                $result = str_replace('responseData(', '', $result);
                $result = substr($result,0,-1);

                $kb_json = json_decode($result,TRUE);
                $content = $kb_json['content']['text'];
                $attribute = $kb_json['attribute'];
                $imghtml = array();
                $videohtml = array();
                $i=0;
                $j=0;
                foreach ($attribute as $key => $img ) {
                    if(substr($key,0,1)=='I'){
                        // 图片 IMG
                        $imghtml[]= ''.
                        '<div style="width:'.$img['width'].'px;height:'.$img['height'].'px;" class="article-img">'.
                            '<p style="text-align:center;">'.
                                '<img src="'.$img['url'].'" width='.$img['width'].' height='.$img['height'].'>'.
                            '</p>'.
                        '</div>';
                        $i++;

                    }elseif(substr($key,0,1)=='V'){
                        // 视频VIDEO
                        $videohtml[]= '<div class="videobox" id="'.$j.'"></div>'.
                        '<script type="text/javascript">'.
                            '(function () {'.
                            'var video = new tvp.VideoInfo();'.
                            'video.setVid("'.$img['vid'].'");'.
                            'var player =new tvp.Player();'.
                            'player.create({'.
                                'width:'.$img['width'].','.
                                'height:'.$img['height'].','.
                                'video:video,'.
                                'modId:"'.$j.'",'.
                                'autoplay:true'.
                            '});'.
                        '})()'.
                        '</script>';
                        $j++;
                    }
                         
                }

                //替换图片
                foreach ($imghtml as $i => $value) {
                    $pattern = '/<P id\=\"TextMark_(\d+)\"><!--IMG_'.$i.'--><\/P>/';
                    $replacement = $imghtml[$i];
                    $content = preg_replace($pattern, $replacement, $content);
                }

                // 替换视频
                //print_r($videohtml);
                foreach ($videohtml as $i => $value) {
                    $pattern = '/<!--VIDEO_'.$i.'-->/';
                    $replacement = $videohtml[$i];
                    $content = preg_replace($pattern, $replacement, $content);
                }

                //添加视频播放js
                if(sizeof($videohtml)>0){
                    $content = '<script type="text/javascript" src="http://imgcache.gtimg.cn/tencentvideo_v1/tvp/js/tvp.player_v2.js" charset="utf-8"></script>'.$content;
                }
                
            }
        }
        return $content;


    }

    public function showkb($kbid,$aid,$cid){
        echo "kbid:".$kbid;
        echo "aid:".$aid;
        echo "cid:".$cid;
 
        // $kbid = isset($_GET['kbid']) ? $_GET['kbid'] : $kbid;
        // $aid = isset($_GET['aid']) ? $_GET['aid'] : $aid;
        // $cid= isset($_GET['cid']) ? $_GET['cid'] : $cid;
        $data_kb  = array(
            'kbid' => $kbid, 
            'aid' => $aid, 
            'cid' => $cid, 
            );
        $this->load->view('skin/city/kb.html',$data_kb);
    }

    public function addvideo()
    {

        if(IS_POST){
            $content_data = array();
            //url 采集源地址  videoimg 视频图片  catname 微信号  openid 开放号 source 来源
            $_data = $this->parseData(array('editorValue','source','videoimg','videourl','url','class_id','title','catname','cid','openid','newsdate','description','headimage','isrecommend','isfirsttitle'));
            $_data['title'] = str_replace(" ", "", $_data['title']);
            if(empty($_data['title'])){
                echo "标题不能为空";
                exit;
            }
            //内容模型，对应模板
            $_data['model'] = 1;
            //判断标题是否重复
            $_checktitle = $this->sys_cms_content->getCount(array(
                'title'=>$_data['title']
            ));
            if($_checktitle>0){
                echo "The title to repeat";
                exit;
            }


            //没有公众号添加公众号
            $_check = $this->sys_cms_category->getCount(array(
                'catname'=>$this->input->post('catname')
            ));
            if($_check==0){
                $_data_cat = $this->parseData(array('catname','openid','class_id'));
                $_data_cat['description'] = $_data_cat['catname'];
                if($_data_cat['catname']){
                    $this->handleResult($this->sys_cms_category->addEntity($_data_cat));
                }
            }

            //根据openid来判断真实的栏目id
            $arr_cat = $this->sys_cms_category->checkCatByCatname($_data['catname']);
            // $arr_cat = $this->sys_cms_category->checkCatByOpenid($_data['openid']);
            if(count($arr_cat)>0){
                $_data['cid'] = $arr_cat[0]['id'];
                $_data['catname'] = $arr_cat[0]['catname'];
                $_data['class_id'] = $arr_cat[0]['class_id'];
                $_data['2weima'] = $arr_cat[0]['2weima'];
                $_data['logourl'] = $arr_cat[0]['logourl'];
                $_data['openid'] = $arr_cat[0]['openid'];
                
            }else{
                //没有找到对应公众号就随机取一个
                $arr_cat = $this->sys_cms_category->catmap('all');
                $rand_keys =  array_rand($arr_cat);
                $_data['cid'] = $arr_cat[$rand_keys]['id'];
                $_data['catname'] = $arr_cat[$rand_keys]['catname'];
                $_data['class_id'] = $arr_cat[$rand_keys]['class_id'];
                $_data['openid'] = $arr_cat[$rand_keys]['openid'];
            }


            if($_checktitle==0){
                //$_data['id'] = get_rnd_id();
                $content_data['cid'] =  $_data['cid'];
                $content_data['content'] =  $_data['editorValue'];
                //关键词替换添加链接
                $config_site = $this->config->item('config_site');
                unset($_data['editorValue']);
                if(empty($_data['newsdate'])){
                    $_data['newsdate'] = strtotime("now"); 
                }
                //事务
                $this->db->trans_start();
                $content_id = $this->sys_cms_content->addEntity($_data);
                //事务结束
                $this->db->trans_complete();

                //插入内容
                if($content_id){
                    $content_data['id'] =  $content_id ;
                    $tableindex = $this->get_hash_table($content_id);
                    $content_data['content'] = str_replace("'", '"', $content_data['content']);
                    $sql = "INSERT INTO sys_cms_content_data_".$tableindex."(id,cid,content) VALUES ('".$content_data['id']."','".$content_data['cid']."','".$content_data['content']."')";
                    //事务
                    $this->db->trans_start();
                    $this->db->query($sql);
                    $this->db->insert_id();
                    //事务结束
                    $this->db->trans_complete();
                }

                //更新tags
                $tagname = $_POST['tags'];
                $this->updatetags($tagname,$content_id);



                //发送百度ping指令
                // $val = $this->sys_cms_content->getContentById($insert_id);
                $listurl = $config_site['domainname']."/list-".$_data['cid'].".html";
                $conurl = $config_site['domainname']."/view-". $content_id .".html";
                $params = "<params>".
                                "<param><value><string>".$_data['title']."</string></value></param>".
                                "<param><value><string>".$config_site['domainname']."</string></value></param>".
                                "<param><value><string>".$listurl."</string></value></param>".
                                "<param><value><string>".$conurl."</string></value></param>".
                            "</params>";
                $baiduXML = "
                    <?xml version=\"1.0\" encoding=\"UTF-8\"?>
                    <methodCall>
                    <methodName>weblogUpdates.extendedPing</methodName>".$params."
                    </methodCall>";
                $res = $this->postUrl('http://ping.baidu.com/ping/RPC2', $baiduXML);
                //下面是返回成功与否的判断（根据百度ping的接口说明）
                //if (strpos($res, "<int>0</int>"))
                //echo "PING成功--------------->".$val['title']."</br>";
                //else
                //echo "PING失败-->".$val['title']."</br>";

                //实时推送
                // $siteurl = str_replace("http://", "", $config_site['domainname']);
                // $siteurl = str_replace("/", "", $siteurl);
                // if($conurl){
                //     $urls = array(
                //        $conurl,
                //     );
                //     $api = 'http://data.zz.baidu.com/urls?site='. $siteurl.'&token=vQxpmiwgV2WVN0UU';
                //     $ch = curl_init();
                //     $options =  array(
                //         CURLOPT_URL => $api,
                //         CURLOPT_POST => true,
                //         CURLOPT_RETURNTRANSFER => true,
                //         CURLOPT_POSTFIELDS => implode("\n", $urls),
                //         CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
                //     );
                //     curl_setopt_array($ch, $options);
                //     $result = curl_exec($ch);
                // }

                $this->handleResult($result);

            }else{
                if($_data['isfirsttitle']){
                     $this->sys_cms_content->updateFirsttitle($_data['title']);
                     echo "update firsttitle";
                     exit;
                }
            }
        }
        echo '操作成功';
        exit;

    }


    public function tags(){
        $tagname = $_GET['tagname'];
        $aid = $_GET['aid'];
        $this->updatetags($tagname,$aid);
    }

    public function updatetags($tagname,$aid){
        $tagname = str_replace("，", ",", $tagname);
        $tagname = preg_replace("/\'|\`|\=|\\\|\|/", "", $tagname);
        $tagname  = str_replace("/", "", $tagname );
        $arr_tag=explode(",",$tagname); 

        if(empty($tagname)||empty($aid)){
            //echo 'tagname is  null';
            return;
        }
        foreach ($arr_tag as $tagname) {
            //检查tag是否存在
            $sql = "select id from sys_cms_tags where name='".$tagname."' limit 1";
            $query = $this->db->query($sql)->result_array();
            $tagid = !empty($query[0]['id']) ? $query[0]['id'] : 0;
            if($tagid==0){
                $query = $this->db->insert('sys_cms_tags', array('name' => $tagname ));
                $tagid=$this->db->insert_id();
            }

            //关联文章
            if($tagid){
                //检查是否已经关联tag
                $sql = "select id from sys_cms_tags_data where tid=".$tagid." and aid=".$aid." limit 1";
                $check_query = $this->db->query($sql)->result_array();
                if(sizeof($check_query)>0){
                    //echo 'is exists';
                }else{
                    $_data  = array(
                        'tid' => $tagid, 
                        'aid' => $aid, 
                        'tagname' => $tagname
                    );
                    $query = $this->db->insert('sys_cms_tags_data',$_data);
                }

            }

        }


    }

    public function get_hash_table($id){   
         $tableindex = ceil($id/50000);
         #$tableindex = ceil($id/100000);
         if($tableindex<10){
            $tableindex = '0'.$tableindex;
         }
         return $tableindex;   
    }  

    public function edit()
    {
        $_id = $this->input->get('id');

        if(IS_POST){
            $_data = $this->parseData(array('title','catname','cid','editorValue','openid','newsdate','description','headimage','2weima','logourl','isrecommend','isfirsttitle'));
            $_data['id'] = $_id;
            $content =  $_data['editorValue'];
            unset($_data['editorValue']);
            

            $tableindex = $this->get_hash_table($_id);
            $sql = "update sys_cms_content_data_".$tableindex." set content = '".$content."'where id=".$_id." limit 1";
            $this->db->query($sql);

            $this->handleResult($this->sys_cms_content->updateEntityByID($_data,$_id));

        }
        $this->put("group_list",$this->sys_cms_category->getCateList());
        $data = $this->sys_cms_content->getEntityByID($_id);

        $tableindex = $this->get_hash_table($_id);
        $sql = "select content from sys_cms_content_data_".$tableindex." where id=".$_id." limit 1";
        $query = $this->db->query($sql)->result_array();
        $data_array = $this->db->query($sql)->result_array();
        $data['content'] =  $data_array[0]['content'];

        $this->put('entity',$data);
        $this->render('sys_cms_content_edit.html');
    }


    public function delete()
    {
        $_id = $this->input->get('id');
        $tableindex = $this->get_hash_table($_id);
        $tabledata = "sys_cms_content_data_".$tableindex;
        $this->db->delete($tabledata,array('id' => $_id));
        echo $this->sys_cms_content->deleteEntityByID($_id)?STATUS_SUCCESS:STATUS_ERROR;
    }

    //读取文件转化为数组
    function getTitleArr($filename){
        $title_arr = array();
        if($myfile = fopen($filename, "r")) { 
            while(!feof($myfile)){ 
                $myline = fgets($myfile);//从文件指针中读取一行 
                //$title_arr[] = iconv("GBK","UTF-8",$myline); 
            } 
            fclose($myfile); 
        }
        return  $title_arr;
    }

    function postUrl($url, $postvar) {
        $ch = curl_init();
        $headers = array(
        "POST ".$url." HTTP/1.0",
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Content-length: ".strlen($postvar)
        );
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postvar);
        $res = curl_exec ($ch);
        curl_close ($ch);
        return $res;
    }

    function postGoogleUrl($url, $postvar) {
        $ch = curl_init();
        $headers = array(
        "POST /RPC2 HTTP/1.0",
        "User-Agent: request",
        "Host: blogsearch.google.com",
        "Content-type: text/xml",
        "Accept: text/xml",
        "Content-length: ".strlen($postvar)
        );
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postvar);
        $res = curl_exec ($ch);
        curl_close ($ch);
        return $res;
    }


    public function recomstatus(){
        $_id = $this->input->get('id');
        $_status = $this->input->get('status');
        $_data['isrecommend'] = $_status;
        echo $this->sys_cms_content->updateEntityByID($_data,$_id)?STATUS_SUCCESS:STATUS_ERROR;
    }

    public function ftstatus(){
        $_id = $this->input->get('id');
        $_status = $this->input->get('status');
        $_data['isfirsttitle'] = $_status;
        echo $this->sys_cms_content->updateEntityByID($_data,$_id)?STATUS_SUCCESS:STATUS_ERROR;
    }
}

?>