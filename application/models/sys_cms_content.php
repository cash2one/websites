<?php
/**
 * User:Stephan
 * Date: 14-3-26
 * Time: 上午11:10
 */

class Sys_cms_content extends MY_Model {

    public function __construct()
    {
        parent::__construct();
        $this->_table = 'sys_cms_content';
        $this->_domainconfig = $this->config->item('domain_config');
    }

	public function getNewest($limit,$offset=0,$order_by='id desc'){
		if($limit=='all'){
    		$limit = '';
    	}
    	else
    	{
    		$limit = ' limit '.$offset.','.$limit;
    	}
		$sql = "select id,title,newsdate,DATE_FORMAT(buildtime,'%m-%d %h:%i') as 'buildtime',headimage from ".$this->_table." order by ".$order_by.$limit;
		$res = $this->db->query($sql)->result();
		return $res;
	}

	public function getNewList($limit,$offset=0,$order_by='id desc'){
		if($limit=='all'){
    		$limit = '';
    	}
    	else
    	{
    		$limit = ' limit '.$offset.','.$limit;
    	}
		$sql = "select id,title,newsdate,buildtime,description,headimage,catname,cid,onclick from ".$this->_table." where headimage<> '' order by ".$order_by.$limit;
		$res = $this->db->query($sql)->result_array();
		return $res;
	}

	public function getDiguoViewList(){
		$sql = "select titleurl,title,titlepic,newstime from phome_ecms_news where firsttitle=1 ORDER BY newstime desc limit 10";
		$diguodb= $this->load->database('diguodb', TRUE);
		$query = $diguodb->query($sql)->result_array();
		$this->load->database('default', TRUE);
		return $query;
	}

	public function getDiguoTags($limit=20){
		$sql = "select tagid,tagname from phome_enewstags where num >10 order by tagid desc limit ".$limit."";
		$diguodb= $this->load->database('diguodb', TRUE);
		$query = $diguodb->query($sql)->result_array();
		$this->load->database('default', TRUE);
		return $query;
	}

	public function getDiguoViewListSible($firsttitle=2,$limit=10){
		$sql = "select titleurl,title,titlepic,newstime from phome_ecms_news where firsttitle=".$firsttitle." ORDER BY id desc limit ".$limit."";
		$diguodb= $this->load->database('diguodb', TRUE);
		$query = $diguodb->query($sql)->result_array();
		$this->load->database('default', TRUE);
		return $query;
	}

	public function getFirsttitleList($limit,$offset=0,$order_by='id desc'){
		if($limit=='all'){
    		$limit = '';
    	}
    	else
    	{
    		$limit = ' limit '.$offset.','.$limit;
    	}
		$sql = "select id,description,headimage,title,newsdate,buildtime from ".$this->_table." where headimage <> ''  and isfirsttitle=1 order by ".$order_by.$limit;
		$res = $this->db->query($sql)->result_array();
		return $res;
	}

	public function getRecommendList($limit,$offset=0,$order_by='id desc'){
		if($limit=='all'){
    		$limit = '';
    	}
    	else
    	{
    		$limit = ' limit '.$offset.','.$limit;
    	}
		$sql = "select id,description,headimage,title,newsdate,buildtime from ".$this->_table." where headimage is not null and isrecommend=1 order by ".$order_by.$limit;
		$res = $this->db->query($sql)->result_array();
		return $res;
	}

	public function getWhereList($where,$limit,$offset=0,$order_by='order by id desc'){
		$wid=isset($this->_domainconfig['wid']) ? $this->_domainconfig['wid'] : 0;
		if($wid){
			$where = ' and wid='.$wid.' ';
		}
		if($limit=='all'){
    		$limit = '';
    	}
    	else
    	{
    		$limit = ' limit '.$offset.','.$limit;
    	}
		$sql = "select * from ".$this->_table." where id>1 ".$where." ".$order_by.$limit;
		$res = $this->db->query($sql)->result_array();
		return $res;
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

	public function getXmlList($where,$limit,$offset=0,$order_by='order by id desc'){
		//通过查找id范围来提高查询速度
    	if($offset==0){
    		$endid = $limit;
    		$startid = 0;
    	}else{
    		$endid = $offset + $limit;
    		$startid= $offset;
    	}

    	$sql = 'select id,cid,title,newsdate,catname,description,buildtime,imglink from '.$this->_table.' where id>'.$startid.' and id<='.$endid.' order by id desc limit '.$limit ;
		$res = $this->db->query($sql)->result_array();
		return $res;
	}

	public function contmap($limit){
		$sql = "select id,title,newsdate from ".$this->_table." order by id desc limit ".$limit;
		$res = $this->db->query($sql)->result_array();
		return $res;
	}

	public function contMapList($limit){
        // $sql = "select  con.id as id,con.title,con.newsdate,cat.id as cid,cat.catname,con.description,con.buildtime as buildtime,con.imglink  ".
        //        "from sys_cms_content con LEFT JOIN sys_cms_category cat on con.cid=cat.id ORDER BY con.id desc limit ".$limit;
        $sql = "select id,cid,title,newsdate,catname,description,buildtime,imglink from sys_cms_content ORDER BY id desc  limit ".$limit;
		$res = $this->db->query($sql)->result_array();
		return $res;
	}

	public function getNext($id,$domainname){
		$str_next = '<a>抱歉，没有了！</a>';
		$sql = "select id,title from ".$this->_table." where id >".$id." order by id asc limit 1";
		$query = $this->db->query($sql);
		if($query->num_rows()){
			$row = $query->row(); 
			$str_next = '<a href="'.$domainname.'/view-'.$row->id.'.html"><i class="fa fa-refresh fa-spin"></i>'.$row->title.'</a>';

		}
		return $str_next;
	}

	public function getPer($id,$domainname){
		$str_per = '<a>抱歉，没有了！</a>';
		$sql = "select id,title from ".$this->_table." where id <".$id." order by id desc limit 1";
		$query = $this->db->query($sql);
		if($query->num_rows()){
			$row = $query->row(); 
			$str_per = '<a href="'.$domainname.'/view-'.$row->id.'.html">'.$row->title.'</a>';
		}
		return $str_per;
	}

	public function getContentById($id){
		$sql = "select id,cid,title,FROM_UNIXTIME(newsdate,'%Y-%m-%d') as newsdate,buildtime,catname,description,onclick,headimage from ".$this->_table." where id =".$id." order by id desc limit 1";
		return $this->db->query($sql)->row_array();
	}

	public function getDataContentById($tableindex,$id){
		$sql = "select id,cid,content from ".$this->_table."_data_$tableindex where id =".$id." order by id desc limit 1";
		return $this->db->query($sql)->row_array();
	}

	public function getUrlByKeyword($keyword){
		$sql = "select id from sys_cms_content where title LIKE \"%".$keyword."%\" ORDER BY rand() LIMIT 1";
		return $this->db->query($sql)->row_array();
	}

	public function getStatDay($limit){
		$sql = "select title,catname,count(*) as total,DATE_FORMAT(buildtime,'%m-%d')buildtime from sys_cms_content  GROUP BY DATE_FORMAT(buildtime,'%y-%m-%d') ORDER BY  DATE_FORMAT(buildtime,'%y-%m-%d') desc LIMIT $limit";
		return $this->db->query($sql)->result_array();
	}

	public function onClick($id){
		$sql = "update $this->_table set onclick=onclick+1 where id='$id'";
		$this->db->query($sql);
	}

	public function getContentByCid($cid,$limit=2){
		$sql = "select id,cid,title,FROM_UNIXTIME(newsdate,'%Y-%m-%d') as newsdate,buildtime,catname,content,description from ".$this->_table." where cid =".$cid." order by id desc limit 0,".$limit;
		return $this->db->query($sql)->result_array();
	}

	public function getLastestList($second=1800){
		$sql = "select id,cid,title from sys_cms_content where newsdate > UNIX_TIMESTAMP()-".$second." order by id asc ";
		return $this->db->query($sql)->result_array();
	}

	public function updateFirsttitle($title){
		$sql = "update $this->_table set buildtime=CURRENT_TIMESTAMP where title='$title'";
		$this->db->query($sql);
	}

	public function getRandList($class_id=21,$limit=10){
		$sql = "SELECT  id,cid,description,headimage,title,newsdate,buildtime,catname,2weima,onclick,logourl FROM sys_cms_content WHERE id >= ((SELECT MAX(id) FROM sys_cms_content)-(SELECT MIN(id) FROM sys_cms_content)) * RAND() + ".
			   "(SELECT MIN(id) FROM sys_cms_content) and class_id=$class_id  LIMIT $limit";
		return $this->db->query($sql)->result_array();
	}

	public function getTagsByAid($id){
		$sql = "select tagname,tid from sys_cms_tags_data where aid=".$id." order by id asc ";
		return $this->db->query($sql)->result_array();
	}

	public function getTagsList($limit=30,$offset=0){
		$sql = "select name,id from sys_cms_tags  order by id desc limit ".$offset.",".$limit." ";
		return $this->db->query($sql)->result_array();
	}

	public function getAidByTid($id){
		$sql = "select aid from sys_cms_tags_data where tid=".$id." order by id asc ";
		return $this->db->query($sql)->result_array();
	}

	public function getTagInfo($id){
		$sql = "select id,name from sys_cms_tags where id=".$id." limit 1 ";
		return $this->db->query($sql)->result_array();
	}

	public function getVidwoSourceUrl($id){
		$sql = "select url from sys_cms_content where id=".$id." limit 1 ";
		return $this->db->query($sql)->result_array();
	}

	public function getlistbytagid($tagid,$limit=10,$offset=0,$order_by='order by id desc'){
		if($limit=='all'){
    		$limit = '';
    	}
    	else
    	{
    		$limit = ' limit '.$offset.','.$limit;
    	}
    	$tagsql = "select aid from sys_cms_tags_data where tid=".$tagid;
		$sql = "select id,cid,description,headimage,title,newsdate,buildtime,catname,2weima,onclick,logourl from ".$this->_table." where id in(".$tagsql.") ".$order_by.$limit;
		$res = $this->db->query($sql)->result_array();
		return $res;
	}

	public function getnextbyid($id,$limit=2,$offset=0,$order_by=' order by id asc'){
    	if($limit)
    	{
    		$limit = ' limit '.$offset.','.$limit;
    	}
		$sql = "select * from ".$this->_table." where id > ".$id.$order_by.$limit;
		$res = $this->db->query($sql)->result_array();
		return $res;
	}

} 