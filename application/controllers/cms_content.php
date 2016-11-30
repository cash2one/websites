<?php /**
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
require_once(dirname(__FILE__) . '/../libraries/cutpage.php');
class Cms_content extends CI_Controller{

	public function __construct(){
		 parent::__construct();
		 $this->load->model('sys_cms_category');
		 $this->load->model('sys_cms_content');
		 $this->load->model('sys_cms_link');
		 $this->load->model('sys_cms_class');
		 $this->config->load('config_site', TRUE);
		 $this->load->database();
		 $this->load->helper('url');
	}
	
	public function get_hash_table($id){   
		 $tableindex = ceil($id/50000);
		 #$tableindex = ceil($id/100000);
		 if($tableindex<10){
		 	$tableindex = '0'.$tableindex;
		 }
		 return $tableindex;   
	}   

	public function index(){

		$ipage = $_GET["ipage"]? intval($_GET["ipage"]):1;
		$id = $_GET['id'];
		//根据id找对应的数据表
		$tableindex = $this->get_hash_table($id);
        $this->load->library('parser');
        $id = $_GET['id'];
        $data = array();
        $CP = new cutpage();
        if($id){
        	$data[0] = $this->sys_cms_content->getContentById($id);
        	//根据索引读取文章内容
        	$content =  $this->sys_cms_content->getDataContentById($tableindex,$id);
        	if(count($content)>0){
			    $CP->pagestr =  $content['content'];    
			    $CP->cut_img();    
        		$data[0]['content'] = $CP->pagearr[$ipage-1];
        	}else{
        		$data[0]['content'] = '';
        	}


        	if(empty($data[0])){
        		show_404();
        	}
        }else{
        	show_404();
        }

		//网站标题、皮肤、关键词、描述等设置
		$config_site = $this->config->item('config_site');
		$infoweixin = $this->sys_cms_category->infoWeixin($data[0]['cid']);
		$head_weixin = $infoweixin[0];
		$mypostion = '<a href="'.$config_site['domainname'].'">'.$config_site['sitename'].'</a>&nbsp>&nbsp'.
		 			 '<a href="'.$config_site['domainname'].'/'.$head_weixin->ename.'/'.$head_weixin->id.'/">'.$head_weixin->catname.'</a>&nbsp>&nbsp'.
		 			 '<a>正文</a>';

		//上、下篇
		$content_per = $this->sys_cms_content->getPer($id,$config_site['domainname']);
		$content_next = $this->sys_cms_content->getNext($id,$config_site['domainname']);
		if($ipage==1){
			$htitle = $data[0]['title'];
		}else{
			$htitle = $data[0]['title']."_第".$ipage."页";
		}
		$data_header = array(
			//'htitle' => $data[0]['title'].' - '.$config_site['sitename'],
			'htitle' => $htitle,
			'sitename' => $config_site['sitename'],
			'sitebname' => $config_site['sitebname'],
			'domainname' => $config_site['domainname'],
			'skin' =>  base_url().$config_site['skin'],
			'sitekeywords' => $data[0]['title'],
			'sitedescription' => $data[0]['description'],
			'ad_index' => $config_site['ad_index'],
			'search' => $config_site['search'],
			'ad_index' => $config_site['ad_index'],
			'config_site' => $config_site,
			'cid' => $head_weixin->id,
			'classid' => $head_weixin->class_id,
			'ename' => $head_weixin->ename,
			'viewid' => $id,
			'murl' => $config_site['mdomain'].'/'.$head_weixin->ename.'/'.$id.'.html',
			'pcurl' => $config_site['pcdomain'].'/'.$head_weixin->ename.'/'.$id.'.html'
			);

		$data_footer = array(
			'sitename' => $config_site['sitename'],
			'domainname' => $config_site['domainname'],
			'zhanzhangtong' => $config_site['zhanzhangtong'],
			'beian' => $config_site['beian'],
			'bottom' => $config_site['bottom'],
			'ad_index' => $config_site['ad_index'],
			'config_site' => $config_site
			);

		$data = array(
			'data_content' => $data,
			'newest' => $this->sys_cms_content->getNewest(10,0,'id desc'),
			'hotweixin' => $this->sys_cms_category->hotWeixin(10,'id desc'),
			'content_per' => $content_per,
			'content_next' => $content_next,
			'domainname' => $config_site['domainname'],
			'mypostion' => $mypostion,
			'ad_content' => $config_site['ad_content'],
			'config_site' => $config_site,
			'showprvnext' => $CP->show_prv_next(),
			'showpinyinprvnext' => $CP->show_pingyin_prv_next($head_weixin->ename),
			'viewid' => $id
			);


		$content_templete = '/content.html';
		$this->load->view($config_site['skin'].'/header.html',$data_header);
		$this->parser->parse($config_site['skin'].$content_templete, $data);
		$this->load->view($config_site['skin'].'/footer.html',$data_footer);
	}


	public function getVideoUrl(){

		require_once(dirname(__FILE__) . '/../libraries/query/phpQuery/phpQuery.php');
		require_once(dirname(__FILE__) . '/../libraries/Snoopy.class.php');

		header("Content-Type: text/html; charset=utf-8");
		set_time_limit(0);
		$snoopy = new Snoopy;
		$id = isset($_GET['id']) ? $_GET['id'] : 0;
        // $tp_url = "http://qianmo.com/naocanque/331";
        if($id){
        	$arr_url = $this->sys_cms_content->getVidwoSourceUrl($id);
        	$tp_url = $arr_url[0]['url'];
        }else{
        	exit;
        }
        $videourl = "";
        if($tp_url){
	        $snoopy->fetch($tp_url); 
	        
	        //判断连接状态
	        $snoopy_status = $snoopy->status;
	        if($snoopy_status==200){
	        	$result = $snoopy->results;
	        	$videourl = substr($result, strlen('"urls":["')+strpos($result, '"urls":["'),(strlen($result) - strpos($result, '"],'))*(-1));
	        }
        }

	    echo json_encode($videourl);
	    // echo $videourl;
        exit;

	}

	public function getKB(){

		require_once(dirname(__FILE__) . '/../libraries/query/phpQuery/phpQuery.php');
		require_once(dirname(__FILE__) . '/../libraries/Snoopy.class.php');

		header("Content-Type: text/html; charset=utf-8");
		set_time_limit(0);
		$snoopy = new Snoopy;
		$id = $_GET['id'];
        // $tp_url = "http://qianmo.com/naocanque/331";
        if($id){
        	$tp_url = "http://city.china-7.net/kb.html?id=".$id;
        }else{
        	exit;
        }
        
        $videourl = "";
        if($tp_url){
	        $snoopy->fetch($tp_url); 
	        
	        //判断连接状态
	        $snoopy_status = $snoopy->status;
	        if($snoopy_status==200){
	        	$result = $snoopy->results;
	        	//phpQuery::newDocument($result);  //初始化对象
        		//$res = pq("#artcontent");
	        	//$videourl = substr($result, strlen('"urls":["')+strpos($result, '"urls":["'),(strlen($result) - strpos($result, '"],'))*(-1));
	        }
        }

	    echo  $result;
	    // echo $videourl;
	    //$data  = array('result' => $result );
	    //$config_site = $this->config->item('config_site');
	   // $this->load->library('parser');
        //$this->parser->parse($config_site['skin'].'/kb.html', $data);

	}

	public function showkb(){
		$content = $_POST['content'];
		echo $content;
	}



}

?>