<?php
/**
 * Example Application
 *
 * @package Example-application
 */

header("Content-Type: text/html; charset=utf-8");
require_once(dirname(__FILE__) . '/query/phpQuery/phpQuery.php');


class WeiXin{

  public $keyWord = "体育";
  public $totalPage = 1;
  public $url = "";
  public $page_arr = array();
  public $ggh_arr = array();
  public $newsPageSize = 1;
  public $newsPageUrl = array();

  public function __construct($keyWord="体育",$totalPage=1,$newsPageSize=1){
    $this->keyWord = $keyWord;
    $this->totalPage = $totalPage;
    $this->newsPageSize = $newsPageSize;
    $this->url = 'http://weixin.sogou.com/weixin?type=1&query='.$keyWord.'&ie=utf8&_ast=1411368960&_asf=null&w=01029901&p=40040100&dp=1&cid=null';
    echo $this->url ."</br>";
  }

  public function getPageUrl(){
    $file = file_get_contents($this->url);
    phpQuery::newDocument($file);  //初始化对象
    $pageurl = pq("#pagebar_container a");
    $i = 0;
    foreach($pageurl as $page){
      
      if($i < $this->totalPage)
      {
        $this->page_arr[] = "http://weixin.sogou.com/weixin?type=1&".substr(pq($page)->attr('href'),1)."</br>";
      }
      $i++; 
    }
    echo "count:".count($this->page_arr);
    if(count($this->page_arr)==1){
      //$this->page_arr[1] = $this->page_arr[0];
      $this->page_arr[0] = str_replace("page=2","page=1",$this->page_arr[0]);
    }else{
      $this->page_arr[1] = $this->page_arr[0];
      $this->page_arr[0] = str_replace("page=2","page=1",$this->page_arr[0]);
    }
    sort($this->page_arr);
    print_r($this->page_arr);
    return  $this->page_arr;
  }

  public function getGongGongHao($page_arr){
    if(count($page_arr)>0){
      foreach($this->page_arr as $pages){
        $file_ggh = file_get_contents($pages);
        phpQuery::newDocument($file_ggh); 
        $gghlist = pq(".results div"); 
        foreach($gghlist as $li){ 
          if(pq($li)->attr('onclick')){
             $gghao = explode(",",pq($li)->attr('onclick'));
             $gghao = explode("'",  $gghao[0]);
             $gghao = explode("=",  $gghao[1]);
             echo pq($li)->find("h3")->text()." ".pq($li)->find("h4")->text()."</br>";   
             echo pq($li)->find("p:eq(0)")->text()." ".pq($li)->find("p:eq(1)")->text()."</br>";
             echo "</br>"."最近新闻："."</br>";
            $this->getNewsList($gghao[1]);
            echo "<hr>";
           }
       }

      }
    }
  }


  public function getNewsList($gghao){
    $date_t = strtotime(date('Y-m-d H:i:s')).'000';
    for($i=0;$i<$this->newsPageSize;$i++){
       $xml_url = "http://weixin.sogou.com/gzhjs?cb=sogou.weixin.gzhcb&openid=".$gghao."&page=".$i."&t=".$date_t."";
       $file_ggh = file_get_contents($xml_url);
       $file_ggh=explode('["', $file_ggh);
       $file_ggh=explode('"]', $file_ggh[1]);
       $xml_content = str_replace('\"','"',$file_ggh[0]);
       $xml_content = str_replace('\/','/',$xml_content);
       $xml_content = str_replace('gbk','utf-8',$xml_content);
       $xml_content = explode('","',$xml_content );
       foreach($xml_content as $xc){
         phpQuery::newDocument($xc); 
         $title = pq("display > title")->text();
         // $title = str_replace('<![CDATA[','',$title);
         // $title = str_replace(']]','',$title);
         echo "</br>".$title."</br>";
       }
    }
  }
  

}

//test weinxin

//$wx->getGongGongHao($page_arr);


