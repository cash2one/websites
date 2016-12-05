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
		 $this->load->model('sys_cms_sites');
		 $this->load->database();
		 $this->load->helper('url');
		 $this->load->library('parser');
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
     	$catename = $_GET['catename'];
     	$catename= str_replace('/', '', $catename);
     	echo 'catename:',$catename;
     	//根据拼音查找 catid
     	$catarr =$domain_config['cat_map'];
     	$catid=0;
     	foreach ($catarr as $key => $val) {
     		if($val['pinyin']==$catename){
     			$catid = $key;
     			$catename = $val['pinyin'];
     			$catname = $val['name'];
     			$catkeys = $val['keys'];
     			$catdescription = $val['description'];
     			break;
     		}
     	}
     	if(!$catid){
     		$catlist = $this->sys_cms_sites->getCatByCatename($catename);
     		if($catlist){
     			$catid = $catlist['id'];
     			$catename = $catlist['catename'];
     			$catname = $catlist['catname'];
     			$catkeys = $catlist['keys'];
     			$catdescription = $catlist['decription'];
     		}else{
     			show_404();
     		}
     		print_r($catlist);
     	}


		//分页，查询列表设置
		$this->load->model('sys_cms_content');
        $currentPage = 1;
		if(isset($_GET['page']) && $_GET['page'] != ''){
			$currentPage = $_GET['page'];
		}

        $pagesize=2;
        if(isset($_GET['page']) && $_GET['page'] != ''){
        	//$per_page = isset($_GET['page']) ? $_GET['page']+$pagesize :  $pagesize;
        	if($_GET['page']>1){
        		$per_page = ($_GET['page']-1)*$pagesize;
        	}else{
        		$per_page = 0;
        	}

        }else{
        	$per_page =  0;
        }
        $_where = array(
        	'wid' =>  $domain_config['wid'],
        	'cid' =>  $catid,
        	);
        $_like = array();
        $_order_by = array('id' => 'desc');
        $cols=array('*');
        $join=array();
        $total_rows = $this->sys_cms_content->getCount($_where,$_like);
		$news = $this->sys_cms_content->getListByPageNew($per_page, $_where, $_like, $_order_by,$cols=array('*'),$join=array(),$pagesize);
		$newslist = $news['list'];
		print_r($newslist);

        foreach ($newslist as $key => $arr) {
			if(array_key_exists($arr['cid'], $domain_config['cat_map'])){
				$catarr = $domain_config['cat_map'][$arr['cid']];
				$newslist[$key]['catname'] = $catarr['name'];
				$newslist[$key]['catename'] = $catarr['pinyin'];
			}
		}

		//分页
        $data_pager = array(
            'page' => $currentPage,     //当前页
            'page_size' => $pagesize,    //分页总大小
            'total' => $total_rows        //总页数
        );
        $this->load->library('pagercat',$data_pager);        //载入分页类

        $this->load->library('parser');
        $muban = $domain_config['webtype']=='pc' ? $domain_config['muban'] : $domain_config['mobile_tmpl'];
        $data = array(
			'htitle' => $catname.'-'.$domain_config['index_title'],
			'sitename' => $domain_config['sitename'],
			'sitebname' => $domain_config['sitename'],
			'domainname' => $domain_config['sitename'],
			'skin' => base_url().'skin/'.$muban,
			'sitekeywords' => $domain_config['index_key'],
			'sitedescription' => $domain_config['detail_seo_title'],
			'murl' => $domain_config['mdomain'],
			'pcurl' => $domain_config['pcdomain'],
			'zhanzhangtong' => $domain_config['tongji'],
			'news' => $newslist,
			'catename' => $catename,
			'catname' => $catname,
			'catkeys' => $catkeys,
			'catdescription' => $catdescription,
		);
		$tmpl= '../../templates/'.$muban.'/list.html';

		$this->load->view($tmpl,$data);
		// $this->parser->parse($tmpl, $data);

     }

     public function view(){
     	echo 'view';
     	$catename = $_GET['catename'];
     	$catename= str_replace('/', '', $catename);
		$ipage = isset($_GET["ipage"]) ? intval($_GET["ipage"]):1;
		$id = $_GET['id'];
		echo ' id:',$id;
		$this->load->model('sys_cms_content');
		$this->load->model('sys_cms_category');
		//根据id找对应的数据表
		$tableindex = $this->get_hash_table($id);
        $this->load->library('parser');
        $id = $_GET['id'];
        $data_content = array();
        if($id){
        	$data_content = $this->sys_cms_content->getContentById($id);
        	//根据索引读取文章内容
        	$content = $this->sys_cms_content->getDataContentById($tableindex,$id);
        	if(empty($content)){
        		show_404();
        	}else{
        		$data_content['content'] = $content['content'];
        	}
        }else{
        	show_404();
        }
		
		$domain_config = $this->config->item('domain_config');
		//网站标题、皮肤、关键词、描述等设置
		$mypostion = '<a href="'.$domain_config['pcdomain'].'">'.$domain_config['sitename'].'</a>&nbsp>&nbsp'.
		 			 '<a href="'.$domain_config['pcdomain'].'/'.$catename.'/'.'">'.$catename.'</a>&nbsp>&nbsp'.
		 			 '<a>正文</a>';

		//上、下篇
		$curdomain=$domain_config['webtype']=='pc' ? $domain_config['pcdomain'] : $domain_config['mdomain'];
		$content_per = $this->sys_cms_content->getPer($id,$curdomain);
		$content_next = $this->sys_cms_content->getNext($id,$curdomain);
		print_r($data_content);

     	$muban = $domain_config['webtype']=='pc' ? $domain_config['muban'] : $domain_config['mobile_tmpl'];
        $data = array(
        	'data_content' => $data_content,
			'htitle' => $data_content['title'].'-'.$domain_config['index_title'],
			'sitename' => $domain_config['sitename'],
			'sitebname' => $domain_config['sitename'],
			'domainname' => $domain_config['sitename'],
			'skin' => base_url().'skin/'.$muban,
			'sitekeywords' => $domain_config['index_key'],
			'sitedescription' => $domain_config['detail_seo_title'],
			'murl' => $domain_config['mdomain'],
			'pcurl' => $domain_config['pcdomain'],
			'zhanzhangtong' => $domain_config['tongji'],
			'catename' => $catename,
			'catname' => $catname,
			'catkeys' => $catkeys,
			'catdescription' => $catdescription,
		);
		$tmpl= '../../templates/'.$muban.'/content.html';

		$this->load->view($tmpl,$data);


     }

    public function get_hash_table($id){   
		 $tableindex = ceil($id/100000);
		 if($tableindex<10){
		 	$tableindex = '0'.$tableindex;
		 }
		 return $tableindex;   
	}  

 }