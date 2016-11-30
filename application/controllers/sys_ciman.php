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

class Sys_ciman extends Base_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('sys_cms_ci_category');
        $this->load->model('sys_cms_ci_data');
        $this->config->load('config_site', TRUE);
    }

    public function index()
    {
        $_like = array();
        $_where = array();
        $_order_by = array('id' => 'desc');
        $_keywords = $this->input->get_post('keywords');
        $cid = $this->input->get_post('cid');
        $issend = $this->input->get_post('issend');
        if(notBlank($_keywords)){
           $_like['name'] = $_keywords;
        }

        if($cid){
            $_like['cid'] = $cid;
        }
        if($issend!=-1){
            $_like['issend'] = $issend;
        }
        //print_r($this->sys_cms_content->getCount());
        $this->put("cid",$cid);
        $this->put("issend",$issend);
        $this->put("keywords",$_keywords);
        $this->put("group_list",$this->sys_cms_ci_category->getClassArray());
        $this->put("issendarray",array('0' => '未导出', '1'=>'已导出'));
        $page = $this->sys_cms_ci_data->getListByPage($this->page_offset, $_where, $_like,$_order_by,$cols=array('*'),$join=array(),50);

        $this->put("pagerbar", $this->getPageBar('index.php?c=sys_ciman&m=index&keywords='.$_keywords.'&cid='.$cid.'&issend='.$issend.'', $page['total']));

        $this->put("list", $page['list']);
        $this->put("total",$page['total']);
        $this->render('sys_cms_ci_man.html');
    }




    public function delete()
    {
        $_id = $this->input->get('id');
        $tableindex = $this->get_hash_table($_id);
        $tabledata = "sys_cms_content_data_".$tableindex;
        $this->db->delete($tabledata,array('id' => $_id));
        echo $this->sys_cms_content->deleteEntityByID($_id)?STATUS_SUCCESS:STATUS_ERROR;
    }

   
    public function recomstatus(){
        $_id = $this->input->get('id');
        $_status = $this->input->get('issend');
        $_data['issend'] = $_status;
        echo $this->sys_cms_ci_data->updateEntityByID($_data,$_id)?STATUS_SUCCESS:STATUS_ERROR;
    }


}

?>