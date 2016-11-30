<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User:Stephan
 * Date: 14-3-28
 * Time: 下午12:14
 */

class Base_Controller extends CI_Controller {

    public $_url_rewrite = FALSE;

	public function __construct()
    {
        parent::__construct();
        $this->load->library('cismarty');
        $this->load->helper('stringutil');

        $this->load->library('pagination');
        $this->pagination->use_page_numbers = false;

        //$this->_config['per_page'] = PAGE_SIZE;
        $this->_config['per_page'] = 18;
        

        $this->page_offset = $this->input->get($this->pagination->query_string_segment);
        $this->checkUser();

 

    }

    /**
     * 检查用户是否登录
     */
    protected  function checkUser(){
        $_c = $this->input->get("c");
        $_m = $this->input->get("m");
        //校验排除登录登出

        if(($_c=="sys_category"&&$_m=="add")||($_c=="sys_category"&&$_m=="refresh_cat")||($_c=="cms_contentMan"&&$_m=="showkb")||($_c=="cms_contentMan"&&$_m=="addkb")||($_c=="cms_contentMan"&&$_m=="add")||($_c=="main"&&($_m=="login"||$_m=="logout"||$_m=="error403"||$_m=="getJsonArr"))){
            return;
        }
        //没有开启output_buffering
        ob_start();
        
        $_user = $this->session->userdata['admin'];
        if(empty($_user)){
            header("Location: index.php?c=main&m=login");
            exit;
        }

    }


    public function put($key, $value)
    {
        $this->cismarty->assign($key, $value);
    }

    public function debug($value = TRUE)
    {
        $this->output->enable_profiler($value);
    }

    public function url_rewrite($html)
    {
        $html = $this->cismarty->fetch($html);
        print rewrite($html);
    }



    /**
     * Smarty 载入模板方法
     * @author Yin Lei
     * @param string $html
     */
    public function render($html,$data=null)
    {

        if(!empty($data)){
            foreach($data as $key => $value){
                $this->put($key, $value);
            }

        }

        if (!$this->_url_rewrite)
        {

            $this->cismarty->display($html);
        }
        else
        {
            $this->url_rewrite($html);
        }
    }

    /**
     * @param $_page
     * @param $_total
     * @return mixed  分页条
     */
    public function getPageBar($_page,$_total){
        $this->_config['total_rows'] = $_total;
        $this->_config['base_url'] = $_page;
        $this->pagination->setBaseURL($_page);
        $this->pagination->initialize($this->_config);

        return $this->pagination->create_links();
    }



    public function handleResult($_result,$_description=''){
        if ($_result) {
            $this->put('do_result', '操作成功!');
        } else {
            $this->put('do_result', '操作失败!'.$_description);
            $this->put('error', true);
        }
    }




    /**结息request
     * @param $param_name_array
     * @return array
     */
    public function parseData($param_name_array){
        $_data = array();
        foreach($param_name_array as $param_name){
            $_data[$param_name] = $this->input->post($param_name);
        }
        return $_data;

    }
		
}



class Cms_Controller  extends CI_Controller {

    public function __construct()
    {
         parent::__construct();

         //初始化数据
         $this->websiteinit();


    }

    public function websiteinit(){
        $S = $_SERVER['HTTP_HOST'];
        $S = strtolower($S) ; //取域名部分  
         

        $domain = array('com','cn','name','org','net','com.cn','net.cn'); //域名后缀 有新的就扩展这吧  
        $SS = $S;  
        $dd = implode('|',$domain);  
        $SS = preg_replace('/(\.('.$dd.'))*\.('.$dd.')$/iU','',$SS); //把后面的域名后缀部分去掉  
           
        $SS = explode('.',$SS);  
        $SS = array_pop($SS);  //取最后的主域名  
        $domain = substr($S,strrpos($S,$SS));  //加上后缀拼成完成的主域名   

        $agent = strtolower($_SERVER['HTTP_USER_AGENT']);
        $is_pc = (strpos($agent, 'windows nt')) ? true : false;
        $is_iphone = (strpos($agent, 'iphone')) ? true : false;
        $is_ipad = (strpos($agent, 'ipad')) ? true : false;
        $is_android = (strpos($agent, 'android')) ? true : false;

        $webtype='pc';
        if($is_iphone || $is_ipad || $is_android){  
            $webtype='mobile';
        }

        $this->config->load('site_inc', TRUE);
        $site_inc = $this->config->item('site_inc');
        $allhost = $site_inc['allhost'];


        if(isset($allhost[$domain])){
            $allhost[$domain]['webtype'] = $webtype;
            $allhost[$domain]['cache'] = $site_inc['cache'];
            $this->config->set_item('domain_config',$allhost[$domain]);
        }



    }



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */