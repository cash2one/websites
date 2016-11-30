<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header("Content-type: text/html; charset=utf-8"); 
header('HTTP/1.1 404 Not Found');
header("status: 404 Not Found");
class error_404 extends CI_Controller{

	public function __construct(){
		 parent::__construct();
		 $this->load->helper('url');
		 $this->load->model('sys_cms_category');
		 $this->load->model('sys_cms_content');
		 $this->config->load('config_site', TRUE);

	}
	
	public function index(){
		$config_site = $this->config->item('config_site');
		$domainname = $config_site['domainname'];
		print_r($config_site);
		echo $domainname;
		$this->load->view('skin/404/404.html',$config_site);
	}
		


}

?>