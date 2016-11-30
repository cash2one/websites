<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User:Stephan
 * Date: 14-3-28
 * Time: 下午12:14
 */


class Sys_user extends Base_Controller {

    public function __construct()
    {

        parent::__construct();
        $this->load->model('sys_user_model');
        $this->load->model('sys_user_group_model');

    }

	public function index()
	{
        $_like = array();
        $_where = array();
        $_order_by = array('id' => 'desc');

        $_keywords = $this->input->get_post('keywords');

        if(notBlank($_keywords)){
            $_like['truename'] = $_keywords;
        }

        $page = $this->sys_user_model->getListByPage($this->page_offset, $_where, $_like, $_order_by,
        array($this->sys_user_model->_table.'.*','group_name'),
            array(
                array(
                    'table'=>$this->sys_user_group_model->_table,
                    'on'=>$this->sys_user_group_model->_table.'.id=sys_group_id',
                    'd'=>'left'
                )
            ));

        $this->put("pagerbar", $this->getPageBar('index.php', $page['total']));

        $this->put("list", $page['list']);

		$this->render('sys_user_list.html');
	}

    public function add()
    {
        if(IS_POST){
            $_check = $this->sys_user_model->getCount(array(
                'username'=>$this->input->post('username')
            ));
            if($_check==0){
                $_data = $this->parseData(array('username','truename','email','flag_valid','sys_group_id'));
                $_data['id'] = get_rnd_id();
                $_data['password'] = get_password($this->input->post('password'),$_data['id']);
                $this->handleResult($this->sys_user_model->addEntity($_data));
            }else{
                $this->handleResult(false,'账户号名已存在，不能重复！');
            }


        }
        $this->put("group_list",$this->sys_user_group_model->getSysGroupArray());
        $this->render('sys_user_edit.html');
    }

    public function edit()
    {
        $_id = $this->input->get('id');
        if(IS_POST){

            $_check = $this->sys_user_model->getCount(array(
                'username'=>$this->input->post('username'),
                'id <>'=>$_id
            ));
            if($_check==0){
                $_password = $this->input->post('password');
                $_data = $this->parseData(array('username','truename','email','flag_valid','sys_group_id'));
                $_data['id'] = $_id;
                if(notBlank($_password)){
                    $_data['password'] = get_password($_password,$_id);
                }
                $this->handleResult($this->sys_user_model->updateEntityByID($_data,$_id));
            }else{
                $this->handleResult(false,'账户号名已存在，不能重复！');
            }
        }
        $this->put("group_list",$this->sys_user_group_model->getSysGroupArray());
        $this->put('entity',$this->sys_user_model->getEntityByID($_id));
        $this->render('sys_user_edit.html');
    }

    public function password()
    {

        $this->render('sys_user_password.html');
    }

    public function delete()
    {
        $_id = $this->input->get('id');
        echo $this->sys_user_model->deleteEntityByID($_id)?STATUS_SUCCESS:STATUS_ERROR;
    }

    public function status(){
        $_id = $this->input->get('id');
        $_status = $this->input->get('status');
        $_data['flag_valid'] = $_status;
        echo $this->sys_user_model->updateEntityByID($_data,$_id)?STATUS_SUCCESS:STATUS_ERROR;
    }

}

