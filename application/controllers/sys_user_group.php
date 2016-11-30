<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User:Stephan
 * Date: 14-3-28
 * Time: 下午12:14
 */


class Sys_user_group extends Base_Controller {

    public function __construct()
    {

        parent::__construct();
        $this->load->model('sys_user_group_model');

    }

	public function index()
	{
        $_like = array();
        $_where = array();
        $_order_by = array('id' => 'desc');

        $page = $this->sys_user_group_model->getListByPage($this->page_offset, $_where, $_like, $_order_by);

        $this->put("pagerbar", $this->getPageBar('index.php', $page['total']));

        $this->put("list", $page['list']);
		$this->render('sys_user_group_list.html');
	}

    public function add()
    {
        if(IS_POST){
            $_data = $this->parseData(array('group_name'));
            $_data['id'] = get_rnd_id();
            $this->handleResult($this->sys_user_group_model->addEntity($_data));
        }

        $this->render('sys_user_group_edit.html');
    }

    public function edit()
    {
        $_id = $this->input->get('id');
        if(IS_POST){
            $_data = $this->parseData(array('group_name'));
            $_data['id'] = $_id;
            $this->handleResult($this->sys_user_group_model->updateEntityByID($_data,$_id));
        }
        $this->put('entity',$this->sys_user_group_model->getEntityByID($_id));
        $this->render('sys_user_group_edit.html');
    }

    public function delete()
    {
        $_id = $this->input->get('id');
        echo $this->sys_user_group_model->deleteEntityByID($_id)?STATUS_SUCCESS:STATUS_ERROR;
    }

}

