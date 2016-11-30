<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User:Stephan
 * Date: 14-3-28
 * Time: 下午12:14
 */


class Sys_group_permission extends Base_Controller {

    public function __construct()
    {

        parent::__construct();
        $this->load->model('sys_group_permission_model');
        $this->load->model('sys_module_model');

    }

	public function index()
	{
        $_like = array();
        $_where = array();
        $_order_by = array('id' => 'desc');

        $page = $this->sys_group_permission_model->getListByPage($this->page_offset, $_where, $_like, $_order_by);

        $this->put("pagerbar", $this->getPageBar('index.php', $page['total']));

        $this->put("list", $page['list']);
		$this->render('sys_user_group_list.html');
	}

    public function config(){

        //$_user = $this->session->userdata['admin'];
        $_group_id=$this->input->get('sys_group_id');
        $this->put("permission",$this->sys_module_model->getPermission($_group_id));

        $this->render('sys_group_permission_edit.html');
    }

    public function change(){

        $_group_id = $this->input->get('group_id');
        $_module_id = $this->input->get('module_id');
        $_flag = $this->input->get('flag');

        if($_flag==1){
            $_data = array('user_group_id'=>$_group_id,'sys_module_id'=>$_module_id,'id'=>get_rnd_id());
            echo $this->sys_group_permission_model->addEntity($_data)?STATUS_SUCCESS:STATUS_ERROR;
        }else{
            echo $this->sys_group_permission_model->deleteEntity(array('user_group_id'=>$_group_id,'sys_module_id'=>$_module_id))?STATUS_SUCCESS:STATUS_ERROR;
        }

    }

}

