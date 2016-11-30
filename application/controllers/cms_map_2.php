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
class Cms_map extends  CI_Controller {

	public function __construct(){
		 parent::__construct();
		 $this->load->model('sys_cms_category');
		 $this->load->model('sys_cms_content');
		 $this->load->model('sys_cms_link');
		 $this->load->database();
		 $this->load->helper('url');
		 $this->config->load('config_site', TRUE);
        $this->load->library('parser');
 
	}
	
	public function index(){
		$this->config->load('config_site', TRUE);
		$config_site = $this->config->item('config_site');

		$total = $this->sys_cms_content->getCount();
		$page = ceil($total/10000);

		$sitemap_txt = "";
		echo "总共".$total."条记录，每个文件10000条记录,共生成".$page."个文件";
		echo "</br>";
		echo "******************************Save File ***********************************"."</br>";
		for ($i=0; $i <$page ; $i++) { 
			$offset = 10000*$i;
			$data = array(
				'posts' => $this->sys_cms_content->contMapList($offset.",5000"),
				'categorys' => $this->sys_cms_category->catmap(1000,'id desc'),
				'domainname' => $config_site['domainname'],
				);

			$string = $this->load->view('skin/weixin/sitemap_baidu.html',$data,true);
			//$string = str_replace(" ", "", $string);

			
			if($string){
				if($i==0){
					$fname = dirname(__FILE__).'/../../sitemap.xml';
					echo $config_site['domainname']."/sitemap.xml</br>";
				}else{
					$fname = dirname(__FILE__).'/../../sitemap_'.$i.'.xml';
					echo $config_site['domainname']."/sitemap_".$i.".xml</br>";
				}
				
				
				$of = fopen($fname,'w');//创建并打开dir.txt
				if($of){
				 fwrite($of,$string);//把执行文件的结果写入txt文件
				}
				fclose($of);
			}
			
		}

		// $pageTxt = ceil($total/20000);
		// for ($j=0; $j <$pageTxt ; $j++) {
		// 	$offsettxt = 20000*$j;
		// 	echo "******************************Save File sitemap.txt ***********************************"."</br>";
		// 	$txt_result = '';
		// 	$txt_array = $this->sys_cms_content->getWhereList('',20000,$offsettxt);
		// 	foreach ($txt_array as $key => $value) {
		// 		$txt_result .= $config_site['domainname']."/view-".$value['id'].".html\n";
		// 	}
		// 	echo "更新了".count($txt_array)."条链接</br>";
		// 	if($j==0){
		// 		$ftxtname = dirname(__FILE__).'/../../sitemap.txt';
		// 		echo $config_site['domainname']."/sitemap.txt</br>";
		// 	}else{
		// 		$ftxtname = dirname(__FILE__).'/../../sitemap_'.$j.'.txt';
		// 		echo $config_site['domainname']."/sitemap_".$j.".txt</br>";
		// 	}
		// 	$of = fopen($ftxtname,'w');//创建并打开dir.txt
		// 		if($of){
		// 	 	fwrite($of,$txt_result);//把执行文件的结果写入txt文件
		// 	}
		// 	fclose($of);
			
			
		// }


		


		//echo "******************************Save File End********************************"."</br>";
		//$this->outputIndex();
		//$this->outputCat(1);
		//echo "******************************Save Index File End********************************";

		exit;
	}

	public function updatesiteTxt(){
		$this->config->load('config_site', TRUE);
		$config_site = $this->config->item('config_site');

		$total = $this->sys_cms_content->getCount();
		$pageTxt = ceil($total/20000);
		for ($j=0; $j <$pageTxt ; $j++) {
			$offsettxt = 20000*$j;
			echo "******************************Save File sitemap.txt ***********************************"."</br>";
			$txt_result = '';
			$txt_array = $this->sys_cms_content->getWhereList('',20000,$offsettxt);
			foreach ($txt_array as $key => $value) {
				$txt_result .= $config_site['domainname']."/view-".$value['id'].".html\n";
			}
			echo "更新了".count($txt_array)."条链接</br>";
			if($j==0){
				$ftxtname = dirname(__FILE__).'/../../sitemap.txt';
				echo $config_site['domainname']."/sitemap.txt</br>";
			}else{
				$ftxtname = dirname(__FILE__).'/../../sitemap_'.$j.'.txt';
				echo $config_site['domainname']."/sitemap_".$j.".txt</br>";
			}
			$of = fopen($ftxtname,'w');//创建并打开dir.txt
				if($of){
			 	fwrite($of,$txt_result);//把执行文件的结果写入txt文件
			}
			fclose($of);
			
			
		}
	}

public function outputallCat(){
	 foreach ($this->sys_cms_category->classlistbypid(0,50,'sort asc') as $key => $value) 
	 {
          $this->outputCat($value['id']);        
      }

}
public function outputCat($id=0){

	    if($id==0){
	    	$cid = $_GET['cid'];
	    }else{
	    	$cid = $id;
	    }
		
		//分页，查询列表设置
        $currentPage = 1;
		if(isset($_GET['page']) && $_GET['page'] != ''){
			$currentPage = $_GET['page'];
		}

        $pagesize=10;
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
        $per_page =  0;

        $_where = array(
        	'class_id' =>  $cid
        	);
        $_like = array();
        $_group_by = array();
        //$_group_by = array('cid');
        $_order_by = array('id' => 'desc');
        $cols=array('*');
        $join=array();
        $total_rows = $this->sys_cms_content->getCount($_where,$_like,$_group_by);
        //$total_rows = $this->sys_cms_content->getCountGroupBy($cid);
        $arr_cols = array('id','cid','title','newsdate','buildtime','catname','content','description','onclick','headimage','openid','2weima','logourl');
        //$page_links = $this->sys_cms_category->getPageLinks($per_page,$total_rows,$cid);
		$news = $this->sys_cms_content->getListByPage($per_page, $_where, $_like, $_order_by,$cols=$arr_cols,$join=array(),$pagesize,$_group_by);


		//网站标题、皮肤、关键词、描述等设置
		$config_site = $this->config->item('config_site');
		$infocat = $this->sys_cms_category->infocat($cid);

		$data_header = array(
			'htitle' => $infocat[0]['name'].' - '.$config_site['sitename'],
			'sitename' => $config_site['sitename'],
			'sitebname' => $config_site['sitebname'],
			'domainname' => $config_site['domainname'],
			'skin' => base_url().$config_site['skin'],
			'sitekeywords' => $config_site['keywords'],
			'sitedescription' => $infocat[0]['description'].' - '.$config_site['description'],
			'search' => $config_site['search'],
			'ad_index' => $config_site['ad_index'],
			'config_site' => $config_site
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
			'catweixin' => $this->sys_cms_category->catlistbyid($cid),
			'domainname' => $config_site['domainname'],
			'categoryname' => $infocat[0]['name'],
			'config_site' => $config_site,
			'class_id' => $cid,
			'news' => $news['list'],
			);

		//分页
        $data_pager = array(
            'page' => $currentPage,     //当前页
            'page_size' => $pagesize,    //分页总大小
            'total' => $total_rows        //总页数
        );
        $this->load->library('pagercat',$data_pager);        //载入分页类
        $links = $this->pagercat->links();    

		$string_header = $this->load->view($config_site['skin'].'/header.html',$data_header,true);
		$string_body =  $this->parser->parse($config_site['skin'].'/cat.html', $data,true);
		$string_footer = $this->load->view($config_site['skin'].'/footer.html',$data_footer,true);

		$string = $string_header.$string_body.$string_footer;

		if($string){
			$fname = dirname(__FILE__).'/../../cat-'.$cid.'.html';
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


	public function catList(){
		$cid = $_GET['cid'];

		//分页，查询列表设置
        $currentPage = 1;
		if(isset($_GET['page']) && $_GET['page'] != ''){
			$currentPage = $_GET['page'];
		}

        $pagesize=10;
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
        	'class_id' =>  $cid
        	);
        $_like = array();
        $_group_by = array('cid');
        $_order_by = array('id' => 'desc');
        $cols=array('*');
        $join=array();
        //$total_rows = $this->sys_cms_content->getCount($_where,$_like,$_group_by);
        $total_rows = $this->sys_cms_content->getCountGroupBy($cid);
        //$page_links = $this->sys_cms_category->getPageLinks($per_page,$total_rows,$cid);
        $arr_cols = array('id','cid','title','newsdate','buildtime','catname','description','onclick','headimage','openid','2weima','logourl');
		$news = $this->sys_cms_content->getListByPage($per_page, $_where, $_like, $_order_by,$arr_cols,$join=array(),$pagesize,$_group_by);


		//网站标题、皮肤、关键词、描述等设置
		$config_site = $this->config->item('config_site');
		$infocat = $this->sys_cms_category->infocat($cid);

		$data_header = array(
			'htitle' => $infocat[0]['name'].' - '.$config_site['sitename'],
			'sitename' => $config_site['sitename'],
			'sitebname' => $config_site['sitebname'],
			'domainname' => $config_site['domainname'],
			'skin' => base_url().$config_site['skin'],
			'sitekeywords' => $config_site['keywords'],
			'sitedescription' => $infocat[0]['description'].' - '.$config_site['description'],
			'search' => $config_site['search'],
			'ad_index' => $config_site['ad_index'],
			'config_site' => $config_site
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
			'catweixin' => $this->sys_cms_category->catlistbyid($cid),
			'domainname' => $config_site['domainname'],
			'categoryname' => $infocat[0]['name'],
			'config_site' => $config_site,
			'class_id' => $cid,
			'news' => $news['list'],
			);

		//分页
        $data_pager = array(
            'page' => $currentPage,     //当前页
            'page_size' => $pagesize,    //分页总大小
            'total' => $total_rows        //总页数
        );
        $this->load->library('pagercat',$data_pager);        //载入分页类
        $links = $this->pagercat->links();    

		$this->load->view($config_site['skin'].'/header.html',$data_header);
		$this->parser->parse($config_site['skin'].'/cat.html', $data);
		$this->load->view($config_site['skin'].'/footer.html',$data_footer);
	}

	public function outputIndex(){
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
			'config_site' => $config_site
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
			'newest' => $this->sys_cms_content->getNewest(30),
			'hotweixin' => $this->sys_cms_category->hotWeixin(16,'RAND()'),
			'senweixin' => $this->sys_cms_category->hotWeixin(70,'onclick desc',0),
			'domainname' => $config_site['domainname'],
			'linklist' => $this->sys_cms_link->linklist('all'),
			'config_site' => $config_site
			);

		//$this->load->view($config_site['skin'].'/header.html',$data_header);
		//$this->parser->parse($config_site['skin'].'/index.html',$data);
		//$this->load->view($config_site['skin'].'/footer.html',$data_footer);

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

	public function getLastestList(){
		$this->config->load('config_site', TRUE);
		$config_site = $this->config->item('config_site');

		$offsettime = 3600*24*1;
		$lastlist = $this->sys_cms_content->getLastestList($offsettime);


		$params = "";
		if(count($lastlist)>0){
			foreach ($lastlist as $key => $val) {
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
				if (strpos($res, "<int>0</int>"))
				echo "PING成功--------------->".$val['title']."</br>";
				else
				echo "PING失败-->".$val['title']."</br>";
			}
		}



		


	}

	public function postUrl($url, $postvar) {
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

	public function postGoogleUrl($url, $postvar) {
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

}

?>