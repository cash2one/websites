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
class Cms_index extends  Cms_Controller {

	public function __construct(){
		 parent::__construct();
		 $this->load->model('sys_cms_category');
		 $this->load->model('sys_cms_content');
		 $this->load->model('sys_cms_link');
		 $this->load->database();
		 $this->load->helper('url');
	}
	

	public function index(){
	
		// if(empty($_GET['p']) || isset($_GET['p'])){
		// 	show_404('error_404');
		// }
		//根据当前ip获取城市名称
		// $ip = $this->GetIp();
		// $ipInfos = $this->GetIpLookup($ip);
		// if($ipInfos){
		// 	$city = $ipInfos['city'];
		// }else{
		// 	$city = '北京';
		// }
		// $areaname = $this->session->userdata['areaname'];
		if(isset($_GET['p'])){
			show_404('error_404');
		}

		$this->config->load('config_site', TRUE);
        $this->load->library('parser');
        //$cid = $_GET['cid'];

		//网站标题、皮肤、关键词、描述等设置
		$config_site = $this->config->item('config_site');

		$data_header = array(
			'htitle' => $config_site['indextitle'],
			'sitename' => $config_site['sitename'],
			'sitebname' => $config_site['sitebname'],
			'domainname' => $config_site['domainname'],
			'skin' => base_url().$config_site['skin'],
			'sitekeywords' => $config_site['keywords'],
			'sitedescription' => $config_site['description'],
			'ad_index' => $config_site['ad_index'],
			'search' => $config_site['search'],
			'config_site' => $config_site,
			'murl' => $config_site['mdomain'],
			'pcurl' => $config_site['pcdomain']
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
			'newest' => $this->sys_cms_content->getNewest(34),
			'hotweixin' => $this->sys_cms_category->hotWeixin(16,'id desc'),
			'senweixin' => $this->sys_cms_category->hotWeixin(70,'id desc',20),
			'domainname' => $config_site['domainname'],
			'linklist' => $this->sys_cms_link->linklist('all'),
			'config_site' => $config_site
			);

		$this->load->view($config_site['skin'].'/header.html',$data_header);
		$this->parser->parse($config_site['skin'].'/index.html',$data);
		$this->load->view($config_site['skin'].'/footer.html',$data_footer);
	}

	public function outputIndex(){
		if(isset($_GET['p'])){
			show_404('error_404');
		}

		$this->config->load('config_site', TRUE);
        $this->load->library('parser');
        //$cid = $_GET['cid'];

		//网站标题、皮肤、关键词、描述等设置
		$config_site = $this->config->item('config_site');

		$data_header = array(
			'htitle' => $config_site['indextitle'],
			'sitename' => $config_site['sitename'],
			'sitebname' => $config_site['sitebname'],
			'domainname' => $config_site['domainname'],
			'skin' => base_url().$config_site['skin'],
			'sitekeywords' => $config_site['keywords'],
			'sitedescription' => $config_site['description'],
			'ad_index' => $config_site['ad_index'],
			'search' => $config_site['search'],
			'config_site' => $config_site,
			'murl' => $config_site['mdomain'],
			'pcurl' => $config_site['pcdomain']
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
			'newest' => $this->sys_cms_content->getNewest(34),
			'hotweixin' => $this->sys_cms_category->hotWeixin(16,'id desc'),
			'senweixin' => $this->sys_cms_category->hotWeixin(70,'id desc',20),
			'domainname' => $config_site['domainname'],
			'linklist' => $this->sys_cms_link->linklist('all'),
			'config_site' => $config_site
			);

		$string_header = $this->load->view($config_site['skin'].'/header.html',$data_header,true);
		$string_body = $this->parser->parse($config_site['skin'].'/index.html',$data,true);
		$string_footer = $this->load->view($config_site['skin'].'/footer.html',$data_footer,true);
		$string = $string_header.$string_body.$string_footer;

		if($string){
			$fname = dirname(__FILE__).'/../../index.html';
			echo "******************************Save File ***********************************"."</br>";
			echo "</br>".$fname."</br>";
			echo "******************************Save File End********************************"."</br>";
			$of = fopen($fname,'w');//创建并打开dir.txt
			if($of){
			 fwrite($of,$string);//把执行文件的结果写入txt文件
			}
			fclose($of);
		}

	}

	public function setConfig(){
		echo "Update config:"."</br>";
		$config_site = $this->config->load('config_site');
		
		$this->config->set_item('sitename', '哇哈哈');
		$site_name = $this->config->item('sitename', 'blog_settings');
		echo $site_name;
	}

	public function viewClick(){
		$id = $_GET['id'];
		$this->sys_cms_content->onClick($id);
	}
	
	public function catClick(){
		$id = $_GET['id'];
		$this->sys_cms_category->onClick($id);
	}

	function GetIp(){
	    $realip = '';
	    $unknown = 'unknown';
	    if (isset($_SERVER)){
	        if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']) && strcasecmp($_SERVER['HTTP_X_FORWARDED_FOR'], $unknown)){
	            $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
	            foreach($arr as $ip){
	                $ip = trim($ip);
	                if ($ip != 'unknown'){
	                    $realip = $ip;
	                    break;
	                }
	            }
	        }else if(isset($_SERVER['HTTP_CLIENT_IP']) && !empty($_SERVER['HTTP_CLIENT_IP']) && strcasecmp($_SERVER['HTTP_CLIENT_IP'], $unknown)){
	            $realip = $_SERVER['HTTP_CLIENT_IP'];
	        }else if(isset($_SERVER['REMOTE_ADDR']) && !empty($_SERVER['REMOTE_ADDR']) && strcasecmp($_SERVER['REMOTE_ADDR'], $unknown)){
	            $realip = $_SERVER['REMOTE_ADDR'];
	        }else{
	            $realip = $unknown;
	        }
	    }else{
	        if(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), $unknown)){
	            $realip = getenv("HTTP_X_FORWARDED_FOR");
	        }else if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), $unknown)){
	            $realip = getenv("HTTP_CLIENT_IP");
	        }else if(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), $unknown)){
	            $realip = getenv("REMOTE_ADDR");
	        }else{
	            $realip = $unknown;
	        }
	    }
	    $realip = preg_match("/[\d\.]{7,15}/", $realip, $matches) ? $matches[0] : $unknown;
	    return $realip;
	}

	function GetIpLookup($ip = ''){
	    if(empty($ip)){
	        $ip = GetIp();
	    }
	    $res = @file_get_contents('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip=' . $ip);
	    if(empty($res)){ return false; }
	    $jsonMatches = array();
	    preg_match('#\{.+?\}#', $res, $jsonMatches);
	    if(!isset($jsonMatches[0])){ return false; }
	    $json = json_decode($jsonMatches[0], true);
	    if(isset($json['ret']) && $json['ret'] == 1){
	        $json['ip'] = $ip;
	        unset($json['ret']);
	    }else{
	        return false;
	    }
	    return $json;
	}


}

?>