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
class Cms_content extends CI_Controller{

	public function __construct(){
		 parent::__construct();
		 $this->load->model('sys_cms_category');
		 $this->load->model('sys_cms_content');
		 $this->load->model('sys_cms_link');
		 $this->config->load('config_site', TRUE);
		 $this->load->database();
		 $this->load->helper('url');
	}
	
	public function index(){
		
        $this->load->library('parser');
        $id = $_GET['id'];
        $data = array();
        if($id){
        	$data[0] = $this->sys_cms_content->getContentById($id);
        	if(empty($data[0])){
        		show_404();
        	}
        }else{
        	show_404();
        }

        //print_r($data );
        //print_r($this->sys_cms_category->hotWeixin(6));
		//网站标题、皮肤、关键词、描述等设置
		$config_site = $this->config->item('config_site');
		$infoweixin = $this->sys_cms_category->infoWeixin($data[0]['cid']);
		$head_weixin = $infoweixin[0];
		$mypostion = '<a href="'.$config_site['domainname'].'">'.$config_site['sitename'].'</a>&nbsp>&nbsp'.
		 			 '<a href="'.$config_site['domainname'].'/list-'.$head_weixin->id.'.html">'.$head_weixin->catname.'</a>&nbsp>&nbsp'.
		 			 '<a>正文</a>';

		//上、下篇
		$content_per = $this->sys_cms_content->getPer($id,$config_site['domainname']);
		$content_next = $this->sys_cms_content->getNext($id,$config_site['domainname']);

		$data_header = array(
			//'htitle' => $data[0]['title'].' - '.$config_site['sitename'],
			'htitle' => $data[0]['title'].'-微信新闻头条',
			'sitename' => $config_site['sitename'],
			'sitebname' => $config_site['sitebname'],
			'domainname' => $config_site['domainname'],
			'skin' =>  base_url().$config_site['skin'],
			'sitekeywords' => $data[0]['title'],
			'sitedescription' => $data[0]['description'],
			'ad_index' => $config_site['ad_index'],
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
			'data_content' => $data,
			'newest' => $this->sys_cms_content->getNewest(10,0,'id desc'),
			'hotweixin' => $this->sys_cms_category->hotWeixin(10,'id desc'),
			'content_per' => $content_per,
			'content_next' => $content_next,
			'domainname' => $config_site['domainname'],
			'mypostion' => $mypostion,
			'ad_content' => $config_site['ad_content'],
			'config_site' => $config_site
			);

		$this->load->view($config_site['skin'].'/header.html',$data_header);
		$this->parser->parse($config_site['skin'].'/content.html', $data);
		$this->load->view($config_site['skin'].'/footer.html',$data_footer);
	}


}

?>