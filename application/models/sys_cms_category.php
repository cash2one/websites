<?php
/**
 * User:Stephan
 * Date: 14-3-26
 * Time: 上午11:10
 */

class Sys_cms_category extends MY_Model {

    public function __construct()
    {
        parent::__construct();
        $this->_table = 'sys_cms_category';
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
    
    public function hotWeixin($limit,$order_by='id desc',$offset=0){
    	if($limit=='all'){
    		$limit = '';
    	}
    	else
    	{
    		$limit = ' limit '.$offset.','.$limit;
    	}

		$sql = "select id,catname,weixinhao,logourl,buildtime  from sys_cms_category where logourl <>'' order by ".$order_by.$limit;
		$res = $this->db->query($sql)->result();
		return $res;
	}

    public function hotWeixinList($limit,$order_by='id desc',$offset=0){
        if($limit=='all'){
            $limit = '';
        }
        else
        {
            $limit = ' limit '.$offset.','.$limit;
        }

        $sql = "select id,catname,weixinhao,logourl,description,wxrz from sys_cms_category where logourl <>'' order by ".$order_by.$limit;
        $res = $this->db->query($sql)->result_array();
        return $res;
    }

    public function footerCat($limit){
        $_row = $this->db->select_max('id')->where(array())->get($this->_table)->row_array();
        if($limit>$_row['id']){
            $maxid = $_row['id'];
        }else{
            $maxid = $_row['id'] - $limit;
        }
        if($maxid>0){
            $max = rand(1,$maxid);
        }else{
            $max=0;
        }
        $sql = 'select cat.id,cat.catname from sys_cms_category cat,sys_cms_content con where con.cid=cat.id and cat.id>'.$max.' GROUP BY cat.id limit '.$limit.'';
        $res = $this->db->query($sql)->result_array();
        return $res;
        
    }

	public function infoWeixin($id){
		$sql = "select ename,cat.id,catname,weixinhao,logourl,cat.description,wxrz,class_id,2weima from sys_cms_category cat ,sys_cms_class c where cat.class_id=c.id and cat.id=".$id." limit 1";
		$res = $this->db->query($sql)->result();
		return $res;
	}

    public function getSysGroup(){

        return $this->db
            ->select('id,catname,openid')->from($this->_table)
            ->order_by('id','desc')->get()->result_array();
    }

	public function getCateArray(){
        $_group_list = array();

        $_group = $this->getSysGroup();

        foreach($_group as $item){
            $_group_list[$item['openid'].','.$item['id'].','.$item['catname']] = $item['catname'];
        }

        return $_group_list;
    }

    public function getCateList(){
        $_group_list = array();

        $_group = $this->getSysGroup();

        foreach($_group as $item){
            $_group_list[$item['id']] = $item['catname'];
        }

        return $_group_list;
    }

    public function catmap($limit,$order_by='id desc',$offset=0){
        if($limit=='all'){
            $limit = '';
        }
        else
        {
            $limit = ' limit '.$offset.','.$limit;
        }

        $sql = "select id,catname,weixinhao,logourl,class_id,2weima,openid from sys_cms_category where logourl <>'' order by ".$order_by.$limit;
        $res = $this->db->query($sql)->result_array();
        return $res;
    }

    public function getCatByClassid($classid){
        $sql = "select id,catname,weixinhao,logourl,class_id,2weima,openid from sys_cms_category where class_id =".$classid." order by RAND() limit 1";
        $res = $this->db->query($sql)->result_array();
        return $res;    
    }


    public function catlistbyid($cid,$limit='',$order_by='id desc',$offset=0){
        if($limit==''){
            $limit = '';
        }
        else
        {
            $limit = ' limit '.$offset.','.$limit;
        }

        $sql = "select id,catname,weixinhao,logourl from sys_cms_category where logourl <>'' and pid=".$cid." order by ".$order_by.$limit;
        $res = $this->db->query($sql)->result_array();
        return $res;
    }

    public function catlistbyclassid($cid,$limit='',$order_by='id desc',$offset=0){
        if($limit==''){
            $limit = '';
        }
        else
        {
            $limit = ' limit '.$offset.','.$limit;
        }

        $sql = "select id,catname,weixinhao,logourl from sys_cms_category where  class_id=".$cid." order by ".$order_by.$limit;
        $res = $this->db->query($sql)->result_array();
        return $res;
    }

    public function allcatlist(){
        $sql = "select id,catname,weixinhao,logourl from sys_cms_category  order by id asc";
        $res = $this->db->query($sql)->result_array();
        return $res;
    }

    public function classlistbypid($pid,$limit='',$order_by='sort asc',$offset=0){
        if($limit == ''){
            $limit = '';
        }
        else
        {
            $limit = ' limit '.$offset.','.$limit;
        }

        $sql = "select id,name,ename from sys_cms_class where pid=".$pid." and isshow=1 order by ".$order_by.$limit;
        $res = $this->db->query($sql)->result_array();
        return $res;
    }

    public function mobileclasslist(){
        $sql = "select id,name from sys_cms_class where pid=0 and id in(2,39,21,10,3,28) ORDER BY id desc";
        $res = $this->db->query($sql)->result_array();
        return $res;
    }

    public function infocat($id){
        $sql = "select id,name,ename,description from sys_cms_class where id=".$id." limit 1";
        $res = $this->db->query($sql)->result_array();
        return $res;
    }

    public function infocatbyname($name){
        $sql = "select id,name,description from sys_cms_class where name='".$name."' limit 1";
        $res = $this->db->query($sql)->result_array();
        return $res;
    }

    public function infocatbyarea($area){
        $sql = "select id,catname,class_id from sys_cms_category where catname='".$area."' limit 1";
        $res = $this->db->query($sql)->result_array();
        return $res;
    }

    public function checkCatByOpenid($openid){
        $sql = "select id,catname,class_id,weixinhao,logourl,2weima,openid from sys_cms_category where openid='".$openid."' limit 1";
        $res = $this->db->query($sql)->result_array();
        return $res;
    }

    public function checkCatByCatname($catname){
        $sql = "select id,catname,class_id,weixinhao,logourl,2weima,openid from sys_cms_category where catname='".$catname."' limit 1";
        $res = $this->db->query($sql)->result_array();
        return $res;
    }


    
    public function onClick($id){
        $sql = "update $this->_table set onclick=onclick+1 where id='$id'";
        $this->db->query($sql);
    }

} 