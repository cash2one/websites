<?php
/**
 * User:Stephan
 * Date: 14-11-25
 * Time: 上午11:10
 */

class Sys_cms_link extends MY_Model {

    public function __construct()
    {
        parent::__construct();
        $this->_table = 'sys_cms_link';
    }

        public function linklist($limit,$order_by='id desc',$offset=0){
        if($limit=='all'){
            $limit = '';
        }
        else
        {
            $limit = ' limit '.$offset.','.$limit;
        }

        $sql = "select id,name,url,imgurl from $this->_table where url <>'' order by ".$order_by.$limit;
        $res = $this->db->query($sql)->result_array();
        return $res;
    }


}