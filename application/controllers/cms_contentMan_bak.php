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

    public function add()
    {

        if(IS_POST){
            $_data = $this->parseData(array('class_id','title','catname','cid','editorValue','openid','newsdate','description','headimage','2weima','logourl','isrecommend','isfirsttitle'));
            $_data['title'] = str_replace(" ", "", $_data['title']);
            if(empty($_data['title'])){
                echo "标题不能为空";
                exit;
            }
            $_headimage2 = $_POST['headimage2'];
            if(!empty($_headimage2)){
                $_data['headimage'] = empty($_data['headimage']) ? $_headimage2 : $_data['headimage'];
            }
            
            //没有公众号添加公众号
            $_check = $this->sys_cms_category->getCount(array(
                'openid'=>$this->input->post('openid')
            ));
            if($_check==0){
                $_data_cat = $this->parseData(array('catname','openid','logourl','2weima','class_id'));
                $_data_cat['description'] = "请进入查看";
                if($_data_cat['catname']){
                    $this->handleResult($this->sys_cms_category->addEntity($_data_cat));
                }
            }

            //根据openid来判断真实的栏目id
            $arr_cat = $this->sys_cms_category->checkCatByOpenid($_data['openid']);
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

            //判断标题是否重复
            $_check = $this->sys_cms_content->getCount(array(
                'title'=>$_data['title']
            ));
            if($_check==0){
                //$_data['id'] = get_rnd_id();
                $_data['content'] =  $_data['editorValue'];
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
                            $_data['content'] = preg_replace($word_arr, $repl_arr, $_data['content'],1);
                        }

                    }
                    
                }else{
                    //echo "not exists";
                }
                unset($_data['editorValue']);
                if(empty($_data['newsdate'])){
                    $_data['newsdate'] = strtotime("now"); 
                }
                
                $result = $this->sys_cms_content->addEntity($_data);
                //发送百度ping指令
                $insert_id = $this->db->insert_id();
                $val = $this->sys_cms_content->getContentById($insert_id);
                $listurl = $config_site['domainname']."/list-".$val['cid'].".html";
                $conurl = $config_site['domainname']."/view-".$val['id'].".html";
                $params = "<params>".
                                "<param><value><string>".$val['title']."</string></value></param>".
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

                //发送谷歌ping指令
                $swatch_google = array_key_exists("googleping",$config_site) ? $config_site['googleping'] : 0;
                if($swatch_google == 1){
                    $params_google = "<params>".
                                    "<param><value>".$val['title']."</value></param>".
                                    "<param><value>".$config_site['domainname']."</value></param>".
                                    "<param><value>".$listurl."</value></param>".
                                    "<param><value>".$conurl."</value></param>".
                                "</params>";
                    $googleXML = "
                        <?xml version=\"1.0\"?>
                        <methodCall>
                        <methodName>weblogUpdates.extendedPing</methodName>".$params_google."
                        </methodCall>";
                    $res = $this->postGoogleUrl('http://blogsearch.google.com/ping/RPC2', $googleXML);
                    echo $res;
                }

                //实时推送
                if($conurl){
                    $urls = array(
                       $conurl,
                    );
                    $api = 'http://data.zz.baidu.com/urls?site=www.china-7.net&token=vQxpmiwgV2WVN0UU';
                    $ch = curl_init();
                    $options =  array(
                        CURLOPT_URL => $api,
                        CURLOPT_POST => true,
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_POSTFIELDS => implode("\n", $urls),
                        CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
                    );
                    curl_setopt_array($ch, $options);
                    $result = curl_exec($ch);
                }

                $this->handleResult($result);

            }else{
                if($_data['isfirsttitle']){
                     $this->sys_cms_content->updateFirsttitle($_data['title']);
                     echo "update firsttitle";
                }else{
                    echo "The title to repeat";
                }
                
            }
        }
        $this->put("group_list",$this->sys_cms_category->getCateList());
        $this->render('sys_cms_content_edit.html');
    }

    public function edit()
    {
        $_id = $this->input->get('id');

        if(IS_POST){
            $_data = $this->parseData(array('title','catname','cid','editorValue','openid','newsdate','description','headimage','2weima','logourl','isrecommend','isfirsttitle'));
            $_data['id'] = $_id;
            $_data['content'] =  $_data['editorValue'];
            unset($_data['editorValue']);
            $this->handleResult($this->sys_cms_content->updateEntityByID($_data,$_id));
        }
        $this->put("group_list",$this->sys_cms_category->getCateList());
        $this->put('entity',$this->sys_cms_content->getEntityByID($_id));
        $this->render('sys_cms_content_edit.html');
    }


    public function delete()
    {
        $_id = $this->input->get('id');
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