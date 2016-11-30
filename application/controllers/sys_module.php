<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User:Stephan
 * Date: 14-3-28
 * Time: 下午12:14
 */


class Sys_module extends Base_Controller {

    public function __construct()
    {

        parent::__construct();
        $this->load->model('sys_module_model');

    }

	public function index()
	{

        $_where = array('module_type'=>'module');
        $_order_by = array('module_order' => 'asc');

        $list = $this->sys_module_model->getList( $_where, array('*'), $_order_by);

        for($i=0;$i<count($list);$i++){

            $page = $this->sys_module_model->getList(array('module_parent_id'=>$list[$i]['id']), array('*'), $_order_by);

            for($j=0;$j<count($page);$j++){
                $action = $this->sys_module_model->getList(array('module_parent_id'=>$page[$j]['id']), array('*'), $_order_by);

                $page[$j]['children'] = $action;
            }

            $list[$i]['children'] = $page;
        }

        $this->put("list", $list);
		$this->render('sys_module_list.html');
	}

    public function add()
    {
        if(IS_POST){
            $_data = $this->parseData(array('module_name','module_parent_id','module_type','module_resource','module_icon'));
            $_data['id'] = get_rnd_id();
            $this->handleResult($this->sys_module_model->addEntity($_data));
        }

        $this->render('sys_module_edit.html');
    }

    public function edit()
    {
        $_id = $this->input->get('id');
        if(IS_POST){
            $_data = $this->parseData(array('module_name','module_resource','module_icon'));
            $_data['id'] = $_id;
            $this->handleResult($this->sys_module_model->updateEntityByID($_data,$_id));
        }
        $this->put('entity',$this->sys_module_model->getEntityByID($_id));
        $this->render('sys_module_edit.html');
    }

    public function delete()
    {
        $_id = $this->input->get('id');
        echo $this->sys_module_model->deleteEntityByID($_id)?STATUS_SUCCESS:STATUS_ERROR;
    }

    public function sort(){

        $_idlist = array();
        $_idlist = $this->input->get_post('module');

        $_ids = array();
        $_ids = explode('|',$_idlist);

        for ($i=0; $i<count($_ids); $i++)
        {
            $this->sys_module_model->updateEntityByID(array('module_order'=>$i),$_ids[$i]);
        }

        $_idlist = array();
        $_idlist = $this->input->get_post('page');
        $_ids = array();
        $_ids = explode('|',$_idlist);

        for ($i=0; $i<count($_ids); $i++)
        {
            $this->sys_module_model->updateEntityByID(array('module_order'=>$i),$_ids[$i]);
        }

        echo STATUS_SUCCESS;
    }

}

