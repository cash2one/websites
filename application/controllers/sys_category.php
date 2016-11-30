<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
header("Content-type: text/html; charset=utf-8"); 

class Sys_category extends Base_Controller {

    public function __construct()
    {

        parent::__construct();
        $this->load->model('sys_cms_content');
        $this->load->model('sys_cms_category');
        $this->load->model('sys_cms_class');

    }

	public function index()
	{
        $_like = array();
        $_where = array();
        $_order_by = array('id' => 'desc');
        $_keywords = $this->input->get_post('keywords');
        if(notBlank($_keywords)){
           $_like['catname'] = $_keywords;
        }



        $this->put("keywords",$_keywords);
        $this->put("group_list",$this->sys_cms_category->getCateList());
        $page = $this->sys_cms_category->getListByPage($this->page_offset, $_where, $_like,$_order_by,$cols=array('*'),$join=array(),18);
        
        //print_r($page);
        $this->put("pagerbar", $this->getPageBar('index.php?c=sys_category&m=index&keywords='.$_keywords, $page['total']));
        // $this->put("pagerbar", $this->getPageBar('index.php?c=cms_contentMan&m=index&keywords='.$_keywords.'&cid='.$cid.'', $page['total']));
        $this->put("list", $page['list']);
        $this->put("total",$page['total']);

		$this->render('sys_category_list.html');
	}

    public function add()
    {

        if(IS_POST){
            $_check = $this->sys_cms_category->getCount(array(
                'openid'=>$this->input->post('openid')
            ));
            if($_check==0){
                $_data = $this->parseData(array('catname','weixinhao','openid','description','keyword','wxrz','logourl','2weima','catimg','class_id'));
                //$_data['id'] = get_rnd_id();
                if($_data['catname']){
                    $this->handleResult($this->sys_cms_category->addEntity($_data));
                }
            }else{
                echo "is exist";
            }
        }
        $timestamp = time();
        $token = md5('unique_salt' . $timestamp);
        $this->put('timestamp',$timestamp);
        $this->put('token',$token);
        $this->put("bigcat_list",$this->sys_cms_class->getClassArray());
        $this->render('sys_category_edit.html');
    }

    public function refresh_cat()
    {
        if(empty($_POST))
        {
            $list = $this->sys_cms_class->getClassArray();
            $listopt = "";
            foreach ($list as $key => $value) {
                $listopt .= "<option value='".$key."'>".$value."</option>";
            }
            //这里刷新列表
            echo "<select name='list'>";
            echo $listopt;
            echo '</select>';
            exit();
        }
    }

    public function edit()
    {
        $_id = $this->input->get('id');
        if(IS_POST){
            $_data = $this->parseData(array('catname','weixinhao','openid','description','keyword','wxrz','logourl','catimg','class_id'));
            $_data['id'] = $_id;
            $this->handleResult($this->sys_cms_category->updateEntityByID($_data,$_id));
        }
        $timestamp = time();
        $token = md5('unique_salt' . $timestamp);
        $this->put('timestamp',$timestamp);
        $this->put('token',$token);
        $this->put('entity',$this->sys_cms_category->getEntityByID($_id));
        $this->put("bigcat_list",$this->sys_cms_class->getClassArray());
        $this->render('sys_category_edit.html');
    }

    public function password()
    {

        $this->render('sys_user_password.html');
    }

    public function delete()
    {
        $_id = $this->input->get('id');
        //先删除所属栏目内容
        $this->sys_cms_content->deleteEntityByID($_id,'cid');
        echo $this->sys_cms_category->deleteEntityByID($_id)?STATUS_SUCCESS:STATUS_ERROR;
    }

    public function status(){
        $_id = $this->input->get('id');
        $_status = $this->input->get('status');
        $_data['flag_valid'] = $_status;
        echo $this->sys_cms_category->updateEntityByID($_data,$_id)?STATUS_SUCCESS:STATUS_ERROR;
    }

}

