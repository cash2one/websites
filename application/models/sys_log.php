<?php
/**
 * User:Stephan
 * Date: 14-3-26
 * Time: 上午11:10
 */

class Sys_user_model extends MY_Model {

    public function __construct()
    {
        parent::__construct();
        $this->_table = 'sys_log';
    }




} 