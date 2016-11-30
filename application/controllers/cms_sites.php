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
class Cms_sites extends  Cms_Controller {

	public function __construct(){
		 parent::__construct();
		 $this->load->model('sys_cms_category');
		 $this->load->model('sys_cms_content');
		 $this->load->model('sys_cms_link');
		 $this->load->database();
		 $this->load->helper('url');
	}
	

	public function index(){

		// echo 'index:';
		// echo 'PHP_SELF:',$_SERVER['PHP_SELF'];
		// echo 'QUERY_STRING:',$_SERVER["QUERY_STRING"];

		// //获取完整的url
		// echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		// echo '</br>';
		// echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
		// echo '</br>';

		// //包含端口号的完整url
		// echo 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"]; 
		// echo '</br>';
		// #http://localhost:80/blog/testurl.php?id=5

		// //只取路径
		// $url='http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"]; 
		// echo dirname($url);

		$domain_config = $this->config->item('domain_config');
		print_r($domain_config);

		$this->config->load('config_site', TRUE);

        $this->load->library('parser');
        $muban = $domain_config['webtype']=='pc' ? $domain_config['muban'] : $domain_config['mobile_tmpl'];
		$data = array(
			'htitle' => $domain_config['index_title'],
			'sitename' => $domain_config['sitename'],
			'sitebname' => $domain_config['sitename'],
			'domainname' => $domain_config['sitename'],
			'skin' => base_url().'skin/'.$muban,
			'sitekeywords' => $domain_config['index_key'],
			'sitedescription' => $domain_config['detail_seo_title'],
			'murl' => $domain_config['mdomain'],
			'pcurl' => $domain_config['pcdomain'],
			'zhanzhangtong' => $domain_config['tongji'],
		);
		$tmpl= '../../templates/'.$muban.'/index.html';


		//缓存设置
		if($domain_config['cache']){
			$this->load->driver('cache', array('adapter' => 'redis'));
			$indexkey = 'index_'.$domain_config['wid'];
			echo '$indexkey:',$indexkey;
			$index_content = $this->cache->get($indexkey);
			if (!$index_content)
			{
			 echo 'Saving to the cache!<br />';
			 $index_content= $this->load->view($tmpl,$data,true);
			 // Save into the cache for 5 minutes
			 $this->cache->save($indexkey,$index_content, 30);
			}
			echo $index_content;

		}else{
			$this->load->view($tmpl,$data);
		}

     }

     public function catlist(){

     	$domain_config = $this->config->item('domain_config');
     	$catename= str_replace('/', '', $_SERVER['REQUEST_URI']);
     	echo 'catename:',$catename;
     	//根据拼音查找 catid
     	$catarr =$domain_config['cat_map'];
     	foreach ($catarr as $key => $val) {
     		if($val['pinyin']==$catename){
     			$catname = $key;
     			break;
     		}
     	}
     	if($catname){
     		echo ' catname:',$catname;
     	}else{
     		show_404();
     	}
        $this->load->library('parser');
        $muban = $domain_config['webtype']=='pc' ? $domain_config['muban'] : $domain_config['mobile_tmpl'];
        $data = array(
			'htitle' => $domain_config['index_title'],
			'sitename' => $domain_config['sitename'],
			'sitebname' => $domain_config['sitename'],
			'domainname' => $domain_config['sitename'],
			'skin' => base_url().'skin/'.$muban,
			'sitekeywords' => $domain_config['index_key'],
			'sitedescription' => $domain_config['detail_seo_title'],
			'murl' => $domain_config['mdomain'],
			'pcurl' => $domain_config['pcdomain'],
			'zhanzhangtong' => $domain_config['tongji'],
		);
		$tmpl= '../../templates/'.$muban.'/list.html';

     }

     public function view(){
     	echo 'view';
     }

 }