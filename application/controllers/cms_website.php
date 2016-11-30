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
class Cms_website extends Base_Controller{

	public function __construct(){
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


}

?>