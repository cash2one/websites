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

class Cms_link extends Base_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('sys_cms_link');
		
	}

	public function index()
    {
        $_like = array();
        $_where = array();
        $_order_by = array('sort' => 'asc');
        $_keywords = $this->input->get_post('keywords');
        if(notBlank($_keywords)){
           $_like['name'] = $_keywords;
        }

        $this->put("keywords",$_keywords);
        $page = $this->sys_cms_link->getListByPage($this->page_offset, $_where, $_like,$_order_by,$cols=array('*'),$join=array(),18);
        
        $this->put("pagerbar", $this->getPageBar('index.php?c=cms_link&m=index&keywords='.$_keywords, $page['total']));
        // $this->put("pagerbar", $this->getPageBar('index.php?c=cms_contentMan&m=index&keywords='.$_keywords.'&cid='.$cid.'', $page['total']));
        $this->put("list", $page['list']);
        $this->put("total",$page['total']);
        $this->render('sys_cms_link.html');
    }

    public function add()
    {
        if(IS_POST){
            $_check = $this->sys_cms_link->getCount(array(
                'name'=>$this->input->post('name')
            ));
            if($_check==0){
                $_data = $this->parseData(array('name','url','sort'));
                $this->handleResult($this->sys_cms_link->addEntity($_data));
            }else{
                echo "is exit";
            }
        }
        $this->render('sys_cms_link_edit.html');
    }

    public function edit()
    {
        $_id = $this->input->get('id');
        if(IS_POST){
            $_data = $this->parseData(array('name','url','sort'));
            $_data['id'] = $_id;
            $this->handleResult($this->sys_cms_link->updateEntityByID($_data,$_id));
        }
        $this->put('entity',$this->sys_cms_link->getEntityByID($_id));
        $this->render('sys_cms_link_edit.html');
    }

    public function delete()
    {
        $_id = $this->input->get('id');
        echo $this->sys_cms_link->deleteEntityByID($_id,'id')?STATUS_SUCCESS:STATUS_ERROR;
    }

}