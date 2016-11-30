<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(dirname(__FILE__) . '/../libraries/query/phpQuery/phpQuery.php');
require_once(dirname(__FILE__) . '/../libraries/Snoopy.class.php');
header("Content-Type: text/html; charset=utf-8");
set_time_limit(0);
ini_set('memory_limit', '-1'); 
//ob_end_clean();
//ob_implicit_flush(1);

class Mulu_site extends Base_Controller{

	public $snoopy;
	public $_agent;
	public $foldername;
	public $htitle = "测试标题";
	public $sitename = "测试123";
	public $sitebname = "测试456";
	public $domainname = "http://www.test.com";
	public $sitekeywords = "测试,测试1,测试2";
	public $sitedescription = "对方水电费水电费是东方闪电凡事都";
	public $total;
	public $title_array;
	public $con_data = array();
	public $sitename_array = array();
	
	public function __construct(){

		parent:: __construct();
	}

	public function index(){

        if(IS_POST){
        	$_data = $this->parseData(array('foldername','filename','sitename','domain','keyword','description','hittle'));
        	$this->load->helper('file');
			//$string = read_file($_data['filename']);
			//$string = explode('|', $string);
			$title_arr = $this->getTitleArr($_data['filename']);
			$this->htitle = $_data['hittle'];
			
			$this->foldername = $_data['foldername'];
			$this->domainname =  $_data['domain']; 
			$this->sitekeywords =  $_data['keyword']; 
			$this->sitedescription =  $_data['description']; 
			//随机选取一个站点名称
			$_data['sitename'] = str_replace("，",",",$_data['sitename']);
			$key_arr = explode(",", $_data['sitename']);
			$this->sitename_array = $key_arr;
			shuffle($key_arr);
			$key_arr = array_slice($key_arr,0,1);
			$this->sitename = $key_arr[0];

			if(count($title_arr) > 0){
				$this->title_array = $title_arr;
				$this->total = count($title_arr);
				//print_r($title_arr);

				//创建文件夹
				$foldername = './html/'.$this->foldername;
				if(is_dir($foldername)==false){
					mkdir($foldername,'0777');
				}

				// $this->getNewsList($title_arr);
				$this->multi_get163news($title_arr);
			}
        }
		$this->render('mulu_site.html');
	}


	public function getTitleArr($filename){
		$title_arr = array();
		if($myfile = fopen($filename, "r")) { 
			while(!feof($myfile)){ 
				$myline = fgets($myfile);//从文件指针中读取一行 
				$title_arr[] = iconv("GBK","UTF-8",$myline); 
			} 
			fclose($myfile); 
		}
		return  $title_arr;
	}

	public function do_upload()
	{
		$config['upload_path'] = './upload/mulusite/';
		$config['allowed_types'] = 'txt';
		$config['max_size'] = '1024';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$config['file_name'] = date('ymdHis');

		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
			//$this->load->view('upload_form', $error);
		} 
		else
		{
			$data = array('upload_data' => $this->upload->data());
			//print_r($string);
			//$this->load->view('upload_success', $data);
		}
		$this->put('fullpath',$data['upload_data']['full_path']);
		$this->render('mulu_site.html');
	}

	public function getNewsList($titlearr){
		$this->total =  count($titlearr);
		$total = $this->total;
		$url = "http://xianguo.com/lianbo/cat/22/0";



		$agent_arr = array();
	    //伪装浏览器
	    $agent_arr[0] = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.120 Safari/537.36";
	    $agent_arr[1] = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.63 Safari/537.36";
	    $agent_arr[2] = "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:33.0) Gecko/20100101 Firefox/33.0";
	    $agent_rand = rand(0,2);
      	$agent = $agent_arr[$agent_rand];
		$this->snoopy = $this->setNoProxy($agent);

		$this->snoopy->fetch($url); 
        $newsweb = $this->snoopy->results;

        phpQuery::newDocument($newsweb); 
        $newsweblist = pq(".cp-sudoku li"); 
        $news_index = 0;
        $data = array();
        foreach($newsweblist as  $li){ 
			echo "------------------------------------".pq($li)->find("h4")->text()."------------------------------------</br>";
			$weburl = "http://xianguo.com".pq($li)->find("a")->attr("href");
			echo "网址:".$weburl."</br>";
			echo "------------------采集新闻----------------------------</br>";
			for ($i=0; $i < 100; $i++) {
				$pageurl = $weburl."?pi=".$i; 
				$this->snoopy->fetch($weburl); 
				$newslist = $this->snoopy->results;
				phpQuery::newDocument($newslist); 
				$newsconlist = pq(".article-list li"); 
				foreach($newsconlist as $con){
					$news_index ++;
					if($total >= $news_index){
						echo "标题_".$news_index."：".pq($con)->find("h3:eq(0)")->text()."URL:".pq($con)->find("h3 a")->attr("href")."</br>";
						//echo "内容:".pq($con)->find("p")->text()."</br>";
						$data[$news_index]['id'] = $news_index;
						$data[$news_index]['title'] = $titlearr[$news_index-1];
						$data[$news_index]['content'] = pq($con)->find("h3:eq(0)")->text()."</br></br>".pq($con)->find("p")->text().$titlearr[$news_index-1];
						$this->makeContentHtml($news_index,$data[$news_index]['title'],$data[$news_index]['content']);

		
					}else{
						if(count($data) > 0){
							$this->makeIndexHtml($data);
						}
						exit;
					}
				}
			}


			echo "------------------采集新闻END----------------------------</br></br>";
			echo "------------------------------------".pq($li)->find("h4")->text()."END------------------------------------</br>";

        }
	}

	
	public function multi_get163news($titlearr){

		$weburl = array(
	       	'http://news.163.com/special/0001386F/rank_news.html',
	       	'http://news.163.com/special/0001386F/rank_ent.html',
	       	'http://news.163.com/special/0001386F/rank_sports.html',
	       	'http://news.163.com/special/0001386F/rank_tech.html',
	       	'http://news.163.com/special/0001386F/rank_auto.html',
	       	'http://news.163.com/special/0001386F/rank_lady.html',
	       	'http://news.163.com/special/0001386F/rank_house.html',
	       	'http://news.163.com/special/0001386F/rank_book.html',
	       	'http://news.163.com/special/0001386F/game_rank.html',
	       	'http://news.163.com/special/0001386F/rank_travel.html',
	       	'http://news.163.com/special/0001386F/rank_edu.html',
	       	'http://news.163.com/special/0001386F/rank_gongyi.html',
	       	'http://news.163.com/special/0001386F/rank_campus.html',
	       	'http://news.163.com/special/0001386F/rank_media.html',
	       	'http://news.163.com/special/0001386F/rank_news.html',
	       	'http://news.163.com/special/0001386F/rank_ent.html',
	       	'http://news.163.com/special/0001386F/rank_sports.html',
	       	'http://news.163.com/special/0001386F/rank_tech.html',
	       	'http://news.163.com/special/0001386F/rank_auto.html',
	       	'http://news.163.com/special/0001386F/rank_lady.html',
	       	'http://news.163.com/special/0001386F/rank_house.html',
	       	'http://news.163.com/special/0001386F/rank_book.html',
	       	'http://news.163.com/special/0001386F/game_rank.html',
	       	'http://news.163.com/special/0001386F/rank_travel.html',
	       	'http://news.163.com/special/0001386F/rank_edu.html',
	       	'http://news.163.com/special/0001386F/rank_gongyi.html',
	       	'http://news.163.com/special/0001386F/rank_campus.html',
	       	'http://news.163.com/special/0001386F/rank_media.html',
	       	'http://news.163.com/special/0001386F/rank_whole.html'
	       	);

		$titleurl = $this->curl_multi($weburl,$this->total);
		echo "total:".$this->total;
		//print_r($titleurl);
		//exit;
		$this->news_index = 0;
		//$titleurl = array_slice($titleurl, 0,100);
		//$titlearray = array_slice($this->title_array, 0,100);

		//每次执行100个线程
		$page = ceil($this->total/100);
		echo "</br>Page:".$page."</br>";
		//exit;
		for ($i=0; $i <$page ; $i++) { 
			$offset = 100 * $i;
			$this->curl_multi_content(array_slice($titleurl, $offset,100),array_slice($this->title_array, $offset,100));
		}

		if(count($this->con_data)){
			$this->makeIndexHtml($this->con_data);
		}
		//print_r($res);
	}


	public function curl_multi($urls,$total=10) {
		phpQuery::$defaultCharset = 'GBK';
	    if (!is_array($urls) or count($urls) == 0) {
	        return false;
	    } 
		$num=count($urls);
	    $curl = $curl2 = $text = array();
	    $handle = curl_multi_init();

		foreach($urls as $k=>$v){
			$url=$urls[$k];
			$curl[$k] = $this->createCh($url);
	        curl_multi_add_handle ($handle,$curl[$k]);
		}
	    $active = null;
	    do {
	        $mrc = curl_multi_exec($handle, $active);
	    } while ($mrc == CURLM_CALL_MULTI_PERFORM);

	    while ($active && $mrc == CURLM_OK) {
			if (curl_multi_select($handle) != -1) {
				usleep(100);
			}
			do {
				$mrc = curl_multi_exec($handle, $active);
			} while ($mrc == CURLM_CALL_MULTI_PERFORM);
		} 
		$news_index = 0;
		$titleurl = array();
	    foreach ($curl as $k => $v) {
	        if (curl_error($curl[$k]) == "") {
				$text = (string) curl_multi_getcontent($curl[$k]); 

				phpQuery::newDocument($text); 
			    $newsconlist = pq(".tabContents tr"); 
			    foreach($newsconlist as $con){
			    	if( $total <= $news_index ) break;
					$newurl = pq($con)->find("td a")->attr("href");
					if($newurl){
						$titleurl[] = $newurl;
						//echo "标题_".$news_index."：".pq($con)->find("td a")->text()."  URL:".pq($con)->find("td a")->attr("href")."</br>";
						$news_index ++;
					}

					
				}

	        }
	        curl_multi_remove_handle($handle, $curl[$k]);
	        curl_close($curl[$k]);
	    } 
	    curl_multi_close($handle);
	    return $titleurl;
	}

	public function curl_multi_content($urls,$titlearray) {
		phpQuery::$defaultCharset = 'GBK';
	    if (!is_array($urls) or count($urls) == 0) {
	        return false;
	    } 
		$num=count($urls);
	    $curl = $curl2 = $text = array();

	    $handle = curl_multi_init();

		foreach($urls as $k=>$v){
			$url=$urls[$k];
			$curl[$k] = $this->createCh($url);
	        curl_multi_add_handle ($handle,$curl[$k]);
		}
	    $active = null;
	    do {
	        $mrc = curl_multi_exec($handle, $active);
	    } while ($mrc == CURLM_CALL_MULTI_PERFORM);

	    while ($active && $mrc == CURLM_OK) {
			if (curl_multi_select($handle) != -1) {
				usleep(500);
			}
			do {
				$mrc = curl_multi_exec($handle, $active);
			} while ($mrc == CURLM_CALL_MULTI_PERFORM);
		} 

		//$con_contetn = array();
		$news_index = 0;
		
	    foreach ($curl as $k => $v) {
	        if (curl_error($curl[$k]) == "") {
	        	$this->news_index++;
	        	$news_index++;
	        	//if($this->total >= $news_index){
					$text = (string) curl_multi_getcontent($curl[$k]); 
					//echo $news_index.":".strlen($text)."</br>";
					phpQuery::$documents = null;
					phpQuery::newDocument($text); 
					$epcon = pq("#epContentLeft"); 
					$con_title = pq($epcon)->find("#h1title")->text();
					$con_contetn = pq($epcon)->find("#endText:eq(0)")->html();
					$con_contetn = iconv("gbk", "utf-8", $con_contetn);
					$con_keywords = pq("meta[name=keywords]")->attr('content');
					$con_description = pq("meta[name=description]")->attr('content');
					//$con_contetn = preg_replace( "@<object(.*?)</script>@is", "", $con_contetn ); 
					//$con_contetn[] = $con_contetn;
					//echo "关键词：".$con_keywords."</br>";
					//echo "描述：".$con_description."</br>";
					echo "标题_".$this->news_index."：".$titlearray[$news_index-1]."</br>";
					//if($con_title){
						$con_title = $titlearray[$news_index-1];
						$this->con_data[$this->news_index]['id'] = $this->news_index;
						$this->con_data[$this->news_index]['title'] = $con_title;
						$this->con_data[$this->news_index]['content'] = $con_contetn;
						$this->makeContentHtml($this->news_index,$con_title,$con_contetn,$con_keywords,$con_description);
						// $this->makeContentHtml($this->news_index,$con_title,$con_contetn,$con_keywords,$con_description);
					//}


		
				//}else{

						//$this->makeIndexHtml($data);
						//exit;

					
				//}


	        }
	        curl_multi_remove_handle($handle, $curl[$k]);
	        curl_close($curl[$k]);
	    } 
	    curl_multi_close($handle);
	   // return $con_contetn;
	}




	public function createCh($url) {
		$ch = curl_init();
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; Trident/7.0; rv:11.0) like Gecko');//设置头部
		curl_setopt ($ch, CURLOPT_REFERER, $url); //设置来源
		curl_setopt ($ch, CURLOPT_ENCODING, "gzip"); // 编码压缩
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);//是否采集301、302之后的页面
		curl_setopt ($ch, CURLOPT_MAXREDIRS, 5);//查找次数，防止查找太深
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); // 对认证证书来源的检查
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); // 从证书中检查SSL加密算法是否存在		
		curl_setopt ($ch, CURLOPT_TIMEOUT, 20);
		curl_setopt ($ch, CURLOPT_HEADER, 0);//输出头部
		return $ch;
	}



	public function makeContentHtml($id,$title,$content,$keyword,$description){
		$total = $this->total;
		//$this->title_array 
		$rand_array = $this->noRand(0,$total-1,10);

		$rand_list = array();
		$rand_list2 = array();
		for ($i=0; $i < 5; $i++) { 
			$rand_index =  $rand_array[$i];
			$rand_list[$i]['id'] = $rand_index;
			$rand_list[$i]['title'] = $this->title_array[$rand_index];
		}
		for ($i=5; $i < 10; $i++) { 
			$rand_index =  $rand_array[$i];
			$rand_list2[$i]['id'] = $rand_index;
			$rand_list2[$i]['title'] = $this->title_array[$rand_index];
		}

		$prev_id = $id-1;
		if($prev_id > 0){
			$prev_url = "<a href=\"".$this->domainname."/".$this->foldername."/view-".$prev_id.".html\" title=\"".$this->title_array[$prev_id]."\" rel=\"prev\">".$this->title_array[$prev_id]."</a>";
		}else{
			$prev_url = "抱歉没有了！";
		}

		$next_id = $id+1;
		if($next_id < $total){
			$next_url = "<a href=\"".$this->domainname."/".$this->foldername."/view-".$next_id.".html\" title=\"".$this->title_array[$next_id]."\" rel=\"next\">".$this->title_array[$next_id]."</a>";
		}else{
			$next_url = "抱歉没有了！";
		}


		
		$keyword = empty($keyword) ? $this->sitekeywords : $keyword;
		$description = empty($description) ? $this->sitedescription : $description;


		$key_arr = $this->sitename_array;
		shuffle($key_arr);
		$key_arr = array_slice($key_arr,0,1);
		$sitename_con = $key_arr[0];
		$title = str_replace("\r\n", "", $title);
		$data = array(
			'htitle' => $title.' - '.$sitename_con,
			'sitename' => $sitename_con,
			'sitebname' => $sitename_con,
			'domainname' => $this->domainname,
			'sitekeywords' => $title.' - '.$sitename_con,
			'sitedescription' => $title.' - '.$sitename_con." - ".$description,
			'foldername' => $this->foldername,
			'title' => $title,
			'content' => $content,
			'newsdate' => date('Y-m-d'),
			'rand_list' => $rand_list,
			'rand_list2' => $rand_list2,
			'prev_url' => $prev_url,
			'next_url' => $next_url
		);

		$string = $this->load->view('skin/mulu/content.html',$data,true);
		if($this->foldername == ""){
			$this->foldername = "test";
		}
		if($string){
			$fname = './html/'.$this->foldername.'/view-'.$id.'.html';
			echo "Save File：".$fname."</br></br>";
			$of = fopen($fname,'w');//创建并打开dir.txt
			if($of){
			 fwrite($of,$string);//把执行文件的结果写入txt文件
			}
			fclose($of);
		}

	}

	function noRand($begin=1,$end=100,$limit=10){
		$rand_array = range($begin,$end);
		shuffle($rand_array);
		return array_slice($rand_array,0,$limit);
	}

	public function makeIndexHtml($data){
		$data = array(
			'htitle' => $this->htitle,
			'sitename' => $this->sitename,
			'sitebname' => $this->sitebname,
			'domainname' => $this->domainname,
			'sitekeywords' => $this->sitekeywords,
			'sitedescription' => $this->sitedescription,
			'foldername' => $this->foldername,
			'newsdate' => date('Y-m-d'),
			'data' => $data
		);

		$string = $this->load->view('skin/mulu/list.html',$data,true);
		if($this->foldername == ""){
			$this->foldername = "test";
		}
		if($string){
			$fname = './html/'.$this->foldername.'/index.html';
			echo "</br></br>Save Index File：".$fname."</br></br>";
			$of = fopen($fname,'w');//创建并打开dir.txt
			if($of){
			 fwrite($of,$string);//把执行文件的结果写入txt文件
			}
			fclose($of);
		}

	}

    public function setNoProxy($agent){
        $this->_agent = $agent;
        $snoopy = new Snoopy;
        $snoopy->agent = $this->_agent; 
        return $snoopy;
    }




}