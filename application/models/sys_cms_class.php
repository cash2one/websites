<?php
/**
 * User:Stephan
 * Date: 14-3-26
 * Time: 上午11:10
 */

class Sys_cms_class extends MY_Model {

    public function __construct()
    {
        parent::__construct();
        $this->_table = 'sys_cms_class';
    }

   
    public function getSysGroup(){

        return $this->db
            ->select('id,name')->from($this->_table)
            ->order_by('id','asc')->get()->result_array();
    }

    public function getTxtList($where,$limit,$offset=0,$order_by='order by id desc'){

        //通过查找id范围来提高查询速度
        if($offset==0){
            $endid = $limit;
            $startid = 0;
        }else{
            $endid = $offset + $limit;
            $startid= $offset;
        }

        $sql = 'select id from '.$this->_table.' where id>'.$startid.' and id<='.$endid.' order by id desc limit '.$limit ;
        // $sql = "select id from ".$this->_table." where id>1 ".$where." ".$order_by.$limit;
        $res = $this->db->query($sql)->result_array();
        return $res;
    }
    
    public function infoclass($id){
        $sql = "select id,name,ename from sys_cms_class where id=".$id." limit 1";
        $res = $this->db->query($sql)->result_array();
        return $res;
    }
	public function getClassArray(){
        $_group_list = array();

        $_group = $this->getSysGroup();

        foreach($_group as $item){
            $_group_list[$item['id']] = $item['name'];
        }

        return $_group_list;
    }

} 