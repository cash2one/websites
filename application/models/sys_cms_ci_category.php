<?php
/**
 * User:Stephan
 * Date: 14-3-26
 * Time: 上午11:10
 */

class Sys_cms_ci_category extends MY_Model {

    public function __construct()
    {
        parent::__construct();
        $this->_table = 'sys_cms_ci_category';
    }

   
    public function getSysGroup(){

        return $this->db
            ->select('id,name')->from($this->_table)
            ->order_by('id','asc')->get()->result_array();
    }

	public function getClassArray(){
        $_group_list = array();

        $_group = $this->getSysGroup();

        foreach($_group as $item){
            $_group_list[$item['id']] = $item['name'];
        }

        return $_group_list;
    }

    public function infocat($id){
        $sql = "select id,name from ".$this->_table." where id=".$id." limit 1";
        $res = $this->db->query($sql)->result_array();
        return $res;
    }
} 