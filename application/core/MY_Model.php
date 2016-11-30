<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * User:Stephan
 * Date: 14-3-28
 * Time: 下午12:14
 */

class MY_Model  extends CI_Model {

    public $_table;

    public function __construct()
    {
        $this->load->database();
    }

    /**
     * 分页获取列表
     * @param int $offset
     * @param array $where
     * @param array $like
     * @param array $order_by
     * @param array $cols
     * @param array $join
     * @param int $page_size
     * @return mixed
     */
    public function getListByPage($offset=0,$where=array(),$like=array(),$order_by=array(),$cols=array('*'),$join=array(),$page_size=PAGE_SIZE,$group_by=array())
    {
        //var_dump($like);
        $this->db->from($this->_table);
        foreach($join as $_item){

                $this->db->join($_item['table'],$_item['on'],$_item['d']);

        }
        $this->db->where($where);
        if(isset($like)){

            $this->db->like($like);
        }
        if(isset($group_by)){
             $this->db->group_by($group_by); 
        }
        $pager['total'] = $this->db->count_all_results();

        $this->db->select($cols)->from($this->_table);
        foreach($join as $_item){

            $this->db->join($_item['table'],$_item['on'],$_item['d']);

        }
        $this->db->where($where);
        if(isset($like)){
            $this->db->like($like);
        }
        if(isset($group_by)){
             $this->db->group_by($group_by); 
        }
        foreach($order_by as $_col=>$_value){
            $this->db->order_by($_col,$_value);
        }
        $this->db->limit($page_size,!isset($offset)?0:$offset);
        $pager['list'] = $this->db->get()->result_array();

        return $pager;
    }

    public function getListByPageNew($offset=0,$where=array(),$like=array(),$order_by=array(),$cols=array('*'),$join=array(),$page_size=PAGE_SIZE,$group_by=array())
    {
        //查找分页最大id
        $lastid_arr = $this->getLastId($where,$order_by,$offset);
        if(sizeof($lastid_arr)>0){
            $lastid = $lastid_arr[0]['id'];
        }
        //查询total
        $this->db->from($this->_table);
        foreach($join as $_item){

                $this->db->join($_item['table'],$_item['on'],$_item['d']);

        }
        $this->db->where($where);
        if(isset($like)){

            $this->db->like($like);
        }
        if(isset($group_by)){
             $this->db->group_by($group_by); 
        }
        $pager['total'] = $this->db->count_all_results();


        $this->db->select($cols)->from($this->_table);
        foreach($join as $_item){

            $this->db->join($_item['table'],$_item['on'],$_item['d']);

        }
        $this->db->where($where);
        if(isset($like)){
            $this->db->like($like);
        }
        if(isset($group_by)){
             $this->db->group_by($group_by); 
        }
        foreach($order_by as $_col=>$_value){
            $this->db->order_by($_col,$_value);
        }
        //从最大id开始查询
        if($lastid){
            $this->db->where('id <=', $lastid); 
        }else{
            show_404();
        }
        $this->db->limit($page_size,0);
        $pager['list'] = $this->db->get()->result_array();

        return $pager;
    }

    public function getListByPageTags($offset=0,$where=array(),$like=array(),$order_by=array(),$cols=array('*'),$join=array(),$page_size=PAGE_SIZE,$group_by=array(),$where_in=array())
    {
        //查找分页最大id
        $lastid_arr = $this->getLastId($where,$order_by,$offset);
        if(sizeof($lastid_arr)>0){
            $lastid = $lastid_arr[0]['id'];
        }
        //查询total
        $this->db->from($this->_table);
        foreach($join as $_item){

                $this->db->join($_item['table'],$_item['on'],$_item['d']);

        }
        $this->db->where($where);
        if(isset($like)){

            $this->db->like($like);
        }
        if(isset($group_by)){
             $this->db->group_by($group_by); 
        }
        $pager['total'] = $this->db->count_all_results();


        $this->db->select($cols)->from($this->_table);
        foreach($join as $_item){

            $this->db->join($_item['table'],$_item['on'],$_item['d']);

        }
        $this->db->where($where);
        if(isset($like)){
            $this->db->like($like);
        }
        if(isset($group_by)){
             $this->db->group_by($group_by); 
        }
        foreach($order_by as $_col=>$_value){
            $this->db->order_by($_col,$_value);
        }
        //从最大id开始查询
        if($lastid){
            $this->db->where('id <=', $lastid); 
        }else{
            show_404();
        }
        if(isset($where_in)){
            $this->db->where_in('id',$where_in);
        }
        $this->db->limit($page_size,0);
        $pager['list'] = $this->db->get()->result_array();

        return $pager;
    }

    public function getLastId($where=array(),$order_by=array(),$offset){
        $this->db
            ->select(array('id'))->from($this->_table);
        foreach($order_by as $_col=>$_value){
            $this->db->order_by($_col,$_value);
        }
         $this->db->limit(1,$offset);
        return $this->db
            ->where($where)->get()->result_array();
    }

    public function getCountTags($where=array(),$like=array(), $group_by=array(),$where_in=array()){
        $this->db->from($this->_table);
        $this->db->where($where);
        if(isset($like)){

            $this->db->like($like);
        }
        if(isset($where_in)){
            $this->db->where_in('id',$where_in);
        }
        if(isset($group_by)){
             $this->db->group_by($group_by); 
        }
        return $this->db->count_all_results();
    }

    public function getCount($where=array(),$like=array(), $group_by=array()){
        $this->db->from($this->_table);
        $this->db->where($where);
        if(isset($like)){

            $this->db->like($like);
        }
        if(isset($group_by)){
             $this->db->group_by($group_by); 
        }
        return $this->db->count_all_results();
    }

    public function getCountGroupBy($class_id){
        $sql = "select id from sys_cms_content where class_id=".$class_id." group by cid";
        $query = $this->db->query($sql)->result_array();
        return count($query);
    }
    

    /**
     * 获取列表
     * @param array $where
     * @param array $cols
     * @return mixed
     */
    public function getList($where=array(),$cols=array('*'),$order_by=array()){
        $this->db
            ->select($cols)->from($this->_table);
        foreach($order_by as $_col=>$_value){
            $this->db->order_by($_col,$_value);
        }
        return $this->db
            ->where($where)->get()->result_array();
    }

    /**
     * 获取一条
     * @param $id
     * @param array $cols
     * @param string $pk
     * @return mixed
     */
    public function getEntityByID($id,$cols=array('*'),$pk='id'){
        return $this->getEntity(array($pk=>$id),$cols);
    }

    public function getEntity($where=array(),$cols=array('*')){
        return $this->db
            ->select($cols)->from($this->_table)
            ->where($where)->get()->row_array();
    }

    public function addEntity($data){
        $query = $this->db->insert($this->_table,$data);
        return $this->db->insert_id();
    }

    public function deleteEntityByID($id,$pk='id'){
        return $this->deleteEntity(array($pk => $id));
    }

    public function deleteEntity($where){
        if(count($where)==0){
            return false;
        }
        return $this->db->delete($this->_table,$where);
    }

    public function updateEntityByID($data,$id,$pk='id'){
        return $this->updateEntity($data,array($pk => $id));
    }

    public function updateEntity($data,$where){

        if(count($where)==0){
            return false;
        }

        $this->db->where($where);
        return $this->db->update($this->_table,$data);
    }

    public function getMaxColValue($col_name,$where=array()){
        $_row = $this->db->select_max($col_name)->where($where)->get($this->_table)->row_array();
        if(isset($_row)){
            return $_row[$col_name];
        }
        return 0;
    }
    
    public function getPageLinks($per_page,$total_rows,$cid){
        //分页
        $this->load->library('pagination');
        // $config_page['base_url'] ='list-'.$cid;
        $config_page['base_url'] ='list-'.$cid.'.html';
        $config_page['total_rows'] =$total_rows;
        $config_page['per_page'] = $per_page;
        $config_page['prev_link'] = '上一页';
        $config_page['next_link'] = '下一页';
        //$config_page['first_link'] = '首页';
        //$config_page['last_link'] = '末页';
        $config_page['anchor_class'] = 'class="in" ';
        $config_page['cur_tag_open'] = '<li><a class="current">';
        $config_page['cur_tag_close'] = '</a></li>';
        // 不显示“数字”链接
        //$config_page['display_pages'] = FALSE;

        // $config_page['full_tag_open'] ='<a>';
        // $config_page['full_tag_close'] ='</a>';
        //num_links = ceil($total_rows/$per_page);
        //$config_page['num_links'] =  $num_links;

        $config_page['uri_segment'] =4;

        $page=(int)$this->uri->segment(4);
        $start = $page ? $page : 1;
        $start = $start * 6 - 6;
        $config_page ['use_page_numbers'] = TRUE;

        $this->pagination->initialize($config_page);
        $page_links = $this->pagination->create_links();
        $page_links = str_replace('&amp;','?',$page_links);
        // http://www.hyci.com/list-182.html?page=2
        $page_links = preg_replace("/\.html\?page=[+d]$/", '-',$page_links);

        return  $page_links ;
    }

    /**记录日志
     * @param $_user
     * @param $_event
     * @param $_ip
     * @param int $_log_type
     * @return mixed
     */
//    public function log($_user,$_event,$_ip,$_log_type=0){
//        $data = array('log_content'=>$_event,'user_id'=>$_user,'log_ip'=>$_ip);
//        $data['log_date'] = date('Y-m-d H:i:s');
//        $data['log_type'] = $_log_type;
//        return $this->db->insert("site_log",$data);
//    }

} 