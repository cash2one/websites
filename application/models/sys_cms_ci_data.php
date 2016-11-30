<?php
/**
 * User:Stephan
 * Date: 14-3-26
 * Time: 上午11:10
 */

class Sys_cms_ci_data extends MY_Model {

    public function __construct()
    {
        parent::__construct();
        $this->_table = 'sys_cms_ci_data';
    }

    public function downlist($limit=100,$cid=0){
        if($limit=='all'){
            $limit = '';
        }
        else
        {
            $limit = ' limit 0,'.$limit;
        }

        $sql = "select id,name from $this->_table where issend=0 and cid=".$cid." order by id asc".$limit;
        $res = $this->db->query($sql)->result_array();
        return $res;
    }

} 