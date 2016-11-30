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



class Sys_class extends Base_Controller {

    public function __construct()
    {

        parent::__construct();
        $this->load->model('sys_cms_class');

    }

    public function index()
    {
        $_like = array();
        $_where = array();
        $_order_by = array('sort' => 'asc');

        $_keywords = $this->input->get_post('keywords');

        if(notBlank($_keywords)){
            $_like['truename'] = $_keywords;
        }

        $page = $this->sys_cms_class->getListByPage($this->page_offset, $_where, $_like, $_order_by,
        array($this->sys_cms_class->_table.'.*',''),
            array(

            ),20);

        $this->put("pagerbar", $this->getPageBar('index.php?c=sys_class&m=index', $page['total']));

        $this->put("list", $page['list']);
       // $this->put("pagerbar", $this->getPageBar('index.php?c=sys_class&m=index&keywords='.$_keywords, $page['total']));
    
        $this->render('sys_class_list.html');
    }

    public function add()
    {
        if(IS_POST){
            $_check = $this->sys_cms_class->getCount(array(
                'name'=>$this->input->post('name')
            ));
            if($_check==0){
                $_data = $this->parseData(array('name','ename','description','sort','isshow','pid','model'));
                //$_data['id'] = get_rnd_id();
                $this->handleResult($this->sys_cms_class->addEntity($_data));
            }else{
                $this->handleResult(false,'名称已存在，不能重复！');
            }


        }
        $model_list  = array('0' => '文章', '1' => '视频');
        $this->put("model_list",$model_list);
        $this->render('sys_class_edit.html');
    }

    public function edit()
    {
        $_id = $this->input->get('id');
        if(IS_POST){

            $_check = $this->sys_cms_class->getCount(array(
                'name'=>$this->input->post('name'),
                'id <>'=>$_id
            ));
            if($_check==0){
                $_password = $this->input->post('password');
                $_data = $this->parseData(array('name','ename','description','sort','isshow','pid','model'));
                $_data['id'] = $_id;
                $this->handleResult($this->sys_cms_class->updateEntityByID($_data,$_id));
            }else{
                $this->handleResult(false,'名称已存在，不能重复！');
            }
        }
       // $model_list = $arrayName = array('' => , );

        $model_list  = array('0' => '文章', '1' => '视频');
        $this->put("model_list",$model_list);
        $this->put('entity',$this->sys_cms_class->getEntityByID($_id));
        $this->render('sys_class_edit.html');
    }

    public function password()
    {

        $this->render('sys_user_password.html');
    }

    public function delete()
    {
        $_id = $this->input->get('id');
        echo $this->sys_cms_class->deleteEntityByID($_id)?STATUS_SUCCESS:STATUS_ERROR;
    }

    public function status(){
        $_id = $this->input->get('id');
        $_status = $this->input->get('status');
        $_data['isshow'] = $_status;
        echo $this->sys_cms_class->updateEntityByID($_data,$_id)?STATUS_SUCCESS:STATUS_ERROR;
    }

}

