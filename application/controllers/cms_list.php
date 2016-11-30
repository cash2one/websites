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
class Cms_list extends CI_Controller{

	public function __construct(){
		 parent::__construct();
		 $this->load->model('sys_cms_category');
		 $this->load->model('sys_cms_content');
		 $this->load->model('sys_cms_link');
		 $this->config->load('config_site', TRUE);
		 $this->load->database();
		 $this->load->library('parser');
		 $this->load->helper('url');
	}
	
	public function page(){
        $cid = $_GET['cid'];
        //分页，查询列表设置
        $currentPage = 1;
		if(isset($_GET['page']) && $_GET['page'] != ''){
			$currentPage = $_GET['page'];
		}

        $pagesize=20;
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
        	'cid' =>  $cid
        	);
        $_like = array();
        $_order_by = array('id' => 'desc');
        $cols=array('*');
        $join=array();
        $total_rows = $this->sys_cms_content->getCount($_where,$_like);
        //$page_links = $this->sys_cms_category->getPageLinks($per_page,$total_rows,$cid);
		$news = $this->sys_cms_content->getListByPageNew($per_page, $_where, $_like, $_order_by,$cols=array('*'),$join=array(),$pagesize);
		//print_r($news);


		//网站标题、皮肤、关键词、描述等设置
		$config_site = $this->config->item('config_site');
		$infoweixin = $this->sys_cms_category->infoWeixin($cid);
		$head_weixin = $infoweixin[0];
		if($config_site['urltype']==1){
			$mypostion = '<a href="'.$config_site['domainname'].'">'.$config_site['sitename'].'</a>&nbsp>&nbsp'.
		 			 '<a href="'.$config_site['domainname'].'/'.$infoweixin[0]->ename.'/'.$head_weixin->id.'/">'.$head_weixin->catname.'</a>';
			$htitle = $head_weixin->catname;
			$murl = $config_site['mdomain'].'/'. $infoweixin[0]->ename.'/'.$infoweixin[0]->id.'/';
			$pcurl = $config_site['pcdomain'].'/'. $infoweixin[0]->ename.'/'.$infoweixin[0]->id.'/';
			if($currentPage > 1){
				$htitle = $head_weixin->catname.'_第'.$currentPage.'页';
				$murl = $config_site['mdomain'].'/'. $infoweixin[0]->ename.'/'.$infoweixin[0]->id.'/index_'.$currentPage.'.html';
				$pcurl = $config_site['pcdomain'].'/'. $infoweixin[0]->ename.'/'.$infoweixin[0]->id.'/index_'.$currentPage.'.html';
			}
		}else{
			$mypostion = '<a href="'.$config_site['domainname'].'">'.$config_site['sitename'].'</a>&nbsp>&nbsp'.
		 			 '<a href="'.$config_site['domainname'].'/list-'.$head_weixin->id.'.html">'.$head_weixin->catname.'</a>';
			$htitle = $head_weixin->catname;
			$murl = $config_site['mdomain'].'/list-'.$infoweixin[0]->id.'.html';
			$pcurl = $config_site['pcdomain'].'/list-'.$infoweixin[0]->id.'.html';
			if($currentPage > 1){
				$htitle = $head_weixin->catname.'_第'.$currentPage.'页';
				$murl = $config_site['mdomain'].'/list-'.$infoweixin[0]->id.'-'.$currentPage.'.html';
				$pcurl = $config_site['pcdomain'].'/list-'.$infoweixin[0]->id.'-'.$currentPage.'.html';
			}
		}


		$data_header = array(
			'htitle' => $htitle .'-'.$config_site['sitename'],
			'sitename' => $config_site['sitename'],
			'sitebname' => $config_site['sitebname'],
			'domainname' => $config_site['domainname'],
			'skin' =>  base_url().$config_site['skin'],
			'sitekeywords' => $head_weixin->catname,
			'sitedescription' => $head_weixin->description,
			'search' => $config_site['search'],
			'ad_index' => $config_site['ad_index'],
			'config_site' => $config_site,
			'cid' => $infoweixin[0]->id,
			'classid' => $infoweixin[0]->class_id,
			'catname' => $infoweixin[0]->catname,
			'ename' => $infoweixin[0]->ename,
			'murl' => $murl,
			'pcurl' => $pcurl
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
			'infoweixin' =>  $infoweixin,
			'news' => $news['list'],
			'newest' => $this->sys_cms_content->getNewest(10),
			'hotweixin' => $this->sys_cms_category->hotWeixin(10),
			'domainname' => $config_site['domainname'],
			'mypostion' => $mypostion,
			'ad_category' => $config_site['ad_category'],
			'config_site' => $config_site,
			'class_id' => $infoweixin[0]->class_id
			);
		
		//分页
        $data_pager = array(
            'page' => $currentPage,     //当前页
            'page_size' => $pagesize,    //分页总大小
            'total' => $total_rows        //总页数
        );
        $this->load->library('pager',$data_pager);        //载入分页类
        $links = $this->pager->links();    

		$this->load->view($config_site['skin'].'/header.html',$data_header);
		$this->parser->parse($config_site['skin'].'/list.html', $data);
		$this->load->view($config_site['skin'].'/footer.html',$data_footer);
	}

	public function tags(){
        $cid = $_GET['cid'];
        //分页，查询列表设置
        $currentPage = 1;
		if(isset($_GET['page']) && $_GET['page'] != ''){
			$currentPage = $_GET['page'];
		}

        $pagesize=20;
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
        //获取文章id 
        $arr_id = $this->sys_cms_content->getAidByTid($cid);
        $_where_id = array();
        foreach ($arr_id as $aid) {
			$_where_id[]=$aid['aid'];
        }
        $_where = array();

        $_like = array();
        $_order_by = array('id' => 'desc');
        $cols=array('*');
        $join=array();
        $total_rows = $this->sys_cms_content->getCountTags($_where,$_like,array(),$_where_id);

        //$page_links = $this->sys_cms_category->getPageLinks($per_page,$total_rows,$cid);
		$news = $this->sys_cms_content->getListByPageTags($per_page, $_where, $_like, $_order_by,$cols=array('*'),$join=array(),$pagesize,array(),$_where_id);


		//网站标题、皮肤、关键词、描述等设置
		$config_site = $this->config->item('config_site');
		$infoweixin = $this->sys_cms_content->getTagInfo($cid);
		$head_weixin = $infoweixin[0];

		$mypostion = '<a href="'.$config_site['domainname'].'">'.$config_site['sitename'].'</a>&nbsp>&nbsp'.
		 			 '<a href="'.$config_site['domainname'].'/tags-'.$head_weixin['id'].'.html">'.$head_weixin['name'].'</a>';

		$htitle = $head_weixin['name'];
		if($currentPage > 1){
			$htitle = $head_weixin['name'].'_第'.$currentPage.'页';
		}

		$htitle = $head_weixin['name'];
		if($config_site['urltype']==1){
			$murl = $config_site['mdomain'].'/taglist/'.$head_weixin['id'].'/';
			$pcurl = $config_site['pcdomain'].'/taglist/'.$head_weixin['id'].'/';
			if($currentPage > 1){
				$htitle = $head_weixin['name'].'_第'.$currentPage.'页';
				$murl = $config_site['mdomain'].'/taglist/'.$head_weixin['id'].'/index_'.$currentPage.'.html';
				$pcurl =$config_site['pcdomain'].'/taglist/'.$head_weixin['id'].'/index_'.$currentPage.'.html';
			}
		}else{
			$murl = $config_site['mdomain'].'/tags-'.$head_weixin['id'].'.html';
			$pcurl = $config_site['pcdomain'].'/tags-'.$head_weixin['id'].'.html';
			if($currentPage > 1){
				$htitle = $head_weixin['name'].'_第'.$currentPage.'页';
				$murl = $config_site['mdomain'].'/tags-'.$head_weixin['id'].'-'.$currentPage.'html';
				$pcurl =$config_site['pcdomain'].'/tags-'.$head_weixin['id'].'-'.$currentPage.'html';
			}
		}

		$data_header = array(
			'htitle' => $htitle .' - '.$config_site['sitename'],
			//'htitle' => $htitle .'【官方网站】',
			'sitename' => $config_site['sitename'],
			'sitebname' => $config_site['sitebname'],
			'domainname' => $config_site['domainname'],
			'skin' =>  base_url().$config_site['skin'],
			'sitekeywords' => $head_weixin['name'],
			'sitedescription' => $head_weixin['name'],
			'search' => $config_site['search'],
			'ad_index' => $config_site['ad_index'],
			'config_site' => $config_site,
			'tid' => $infoweixin[0]['id'],
			'classid' => 0,
			'tagname' => $infoweixin[0]['name'],
			'catname' => $infoweixin[0]['name'],
			'ename'=>'linglei',
			'murl' => $murl,
			'pcurl' => $pcurl
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
			'infoweixin' =>  $infoweixin,
			'news' => $news['list'],
			'newest' => $this->sys_cms_content->getNewest(10),
			'hotweixin' => $this->sys_cms_category->hotWeixin(10),
			'domainname' => $config_site['domainname'],
			'mypostion' => $mypostion,
			'ad_category' => $config_site['ad_category'],
			'config_site' => $config_site
			);
		
		//分页
        $data_pager = array(
            'page' => $currentPage,     //当前页
            'page_size' => $pagesize,    //分页总大小
            'total' => $total_rows        //总页数
        );
        $this->load->library('pager',$data_pager);        //载入分页类
        $links = $this->pager->links();    

		$this->load->view($config_site['skin'].'/header.html',$data_header);
		$this->parser->parse($config_site['skin'].'/tags.html', $data);
		$this->load->view($config_site['skin'].'/footer.html',$data_footer);
	}

	public function allList(){
		//网站标题、皮肤、关键词、描述等设置
		$config_site = $this->config->item('config_site');
		$data_header = array(
			//'htitle' => '公共号 - '.$config_site['sitename'],
			'htitle' => '公共号【官方网站】',
			'sitename' => $config_site['sitename'],
			'sitebname' => $config_site['sitebname'],
			'domainname' => $config_site['domainname'],
			'skin' => base_url().$config_site['skin'],
			'sitekeywords' => $config_site['keywords'],
			'sitedescription' => $config_site['description'],
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
			'allweixin' => $this->sys_cms_category->hotWeixin('all'),
			'domainname' => $config_site['domainname'],
			'ad_category' => $config_site['ad_category'],
			'config_site' => $config_site
			);

		$this->load->view($config_site['skin'].'/header.html',$data_header);
		$this->parser->parse($config_site['skin'].'/list_all.html', $data);
		$this->load->view($config_site['skin'].'/footer.html',$data_footer);
	}

	public function mapList(){
		//网站标题、皮肤、关键词、描述等设置
		$config_site = $this->config->item('config_site');
		//分页，查询列表设置
        $currentPage = 1;
		if(isset($_GET['page']) && $_GET['page'] != ''){
			$currentPage = $_GET['page'];
		}

        $pagesize=20;
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

 		$_where = array();
        $_like = array();
        $_order_by = array('id' => 'desc');
        $cols=array('*');
        $join=array();
        $total_rows = $this->sys_cms_category->getCount($_where,$_like);
        //$page_links = $this->sys_cms_category->getPageLinks($per_page,$total_rows,$cid);
		$news = $this->sys_cms_category->getListByPage($per_page, $_where, $_like, $_order_by,$cols=array('*'),$join=array(),$pagesize);
		//print_r($news);

		$mypostion = '<a href="'.$config_site['domainname'].'">'.$config_site['sitename'].'</a>&nbsp>&nbsp'.
		 			 '地图';

		//网站标题、皮肤、关键词、描述等设置
		$config_site = $this->config->item('config_site');
		$data_header = array(
			//'htitle' => '公共号 - '.$config_site['sitename'],
			'htitle' => '',
			'sitename' => $config_site['sitename'],
			'sitebname' => $config_site['sitebname'],
			'domainname' => $config_site['domainname'],
			'skin' => base_url().$config_site['skin'],
			'sitekeywords' => $config_site['keywords'],
			'sitedescription' => $config_site['description'],
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
			'maplist' => $news['list'],
			'domainname' => $config_site['domainname'],
			'ad_category' => $config_site['ad_category'],
			'mypostion' => $mypostion,
			'config_site' => $config_site
			);

		//分页
        $data_pager = array(
            'page' => $currentPage,     //当前页
            'page_size' => $pagesize,    //分页总大小
            'total' => $total_rows        //总页数
        );
        $this->load->library('pager',$data_pager);        //载入分页类
        $links = $this->pager->links();    

		$this->load->view($config_site['skin'].'/header.html',$data_header);
		$this->parser->parse($config_site['skin'].'/list_map.html', $data);
		$this->load->view($config_site['skin'].'/footer.html',$data_footer);
	}

	public function catList(){
		$cid = $_GET['cid'];
	    if(empty($cid)){
	    	$cid = $classid;
	    	$_GET['cid'] = $classid;
	    }
		//分页，查询列表设置
        $currentPage = 1;
		if(isset($_GET['page']) && $_GET['page'] != ''){
			$currentPage = $_GET['page'];
		}
        $pagesize=24;
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
        $_group_by = array();
        //$_group_by = array('cid');
        $_order_by = array('id' => 'desc');
        $cols=array('*');
        $join=array();
        $total_rows = $this->sys_cms_content->getCount($_where,$_like,$_group_by);
        //$total_rows = $this->sys_cms_content->getCountGroupBy($cid);
        $arr_cols = array('id','cid','title','newsdate','buildtime','catname','description','onclick','headimage','openid','2weima','logourl');
        //$page_links = $this->sys_cms_category->getPageLinks($per_page,$total_rows,$cid);
		// $news = $this->sys_cms_content->getListByPage($per_page, $_where, $_like, $_order_by,$cols=$arr_cols,$join=array(),$pagesize,$_group_by);
		$news = $this->sys_cms_content->getListByPageNew($per_page, $_where, $_like, $_order_by,$arr_cols,$join=array(),$pagesize,$_group_by);


		//网站标题、皮肤、关键词、描述等设置
		$config_site = $this->config->item('config_site');
		$infocat = $this->sys_cms_category->infocat($cid);

		if($config_site['urltype']==1){
			$htitle = $infocat[0]['name'];
			$murl = $config_site['mdomain'].'/'. $infocat[0]['ename'].'/';
			$pcurl = $config_site['pcdomain'].'/'. $infocat[0]['ename'].'/';
			if($currentPage > 1){
				$htitle = $infocat[0]['name'].'_第'.$currentPage.'页';
				$murl = $config_site['mdomain'].'/'. $infocat[0]['ename'].'/index_'.$currentPage.'.html';
				$pcurl = $config_site['pcdomain'].'/'. $infocat[0]['ename'].'/index_'.$currentPage.'.html';
			}
		}else{
			$htitle = $infocat[0]['name'];
			$murl = $config_site['mdomain'].'/cat-'. $infocat[0]['id'].'.html';
			$pcurl = $config_site['pcdomain'].'/cat-'. $infocat[0]['id'].'.html';
			if($currentPage > 1){
				$htitle = $infocat[0]['name'].'_第'.$currentPage.'页';
				$murl = $config_site['mdomain'].'/cat-'. $infocat[0]['id'].'-'.$currentPage.'.html';
				$pcurl = $config_site['pcdomain'].'/cat-'. $infocat[0]['id'].'-'.$currentPage.'.html';
			}
		}





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
			'config_site' => $config_site,
			'classid' => $infocat[0]['id'],
			'classname' => $infocat[0]['name'],
			'ename' => $infocat[0]['ename'],
			'murl' => $murl,
			'pcurl' => $pcurl
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
		
		for ($i=0; $i <count($news['list']) ; $i++) { 
			$news['list'][$i]['description'] = mb_substr($news['list'][$i]['description'],0,60);
		}

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

 	public function testpage(){
        $this->load->helper('url');
        $page = $this->input->get('page');
        //$page = $_GET['page'];
        $page = @intval($page);
        if($page<=0) $page = 1;
        $this->load->library('page_list',array('total'=>10000,'size'=>16,'page'=>$page));
        $pl = $this->page_list->display(site_url('/cms_list/testpage/page/-page-'));
        //echo  $pl;
        $this->load->view('pagelist.html', array('pl' => $pl));
    }

    public function testpager($curpage){
 		//$currentpage, $page_size, $total
 		$currentPage = $curpage;
 		$pageSize = 5;
 		$countnum = 78;

        $data = array(
            'page' => $currentPage,     //当前页
            'page_size' => $pageSize,    //分页总大小
            'total' => $countnum        //总页数
        );
        $this->load->library('pager',$data);        //载入分页类
        $this->pager->show();                    //在view视图执行这个就可以啦！

    }
}
