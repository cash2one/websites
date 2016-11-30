<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 * ━━━━━━神兽出没━━━━━━
 * 　　　┏┓　　　┏┓
 * 　　┏┛┻━━━┛┻┓
 * 　　┃　　　　　　　┃
 * 　　┃　　　━　　　┃
 * 　　┃　┳┛　┗┳　┃
 * 　　┃　　　　　　　┃
 * 　　┃　　　┻　　　┃
 * 　　┃　　　　　　　┃
 * 　　┗━┓　　　┏━┛Code is far away from bug with the animal protecting
 * 　　　　┃　　　┃    神兽保佑,代码无bug
 * 　　　　┃　　　┃
 * 　　　　┃　　　┗━━━┓
 * 　　　　┃　　　　　　　┣┓
 * 　　　　┃　　　　　　　┏┛
 * 　　　　┗┓┓┏━┳┓┏┛
 * 　　　　　┃┫┫　┃┫┫
 * 　　　　　┗┻┛　┗┻┛
 *
 * ━━━━━━感觉萌萌哒━━━━━━
 */

// require_once(dirname(__FILE__) . '/../libraries/Weixin.class.php');
require_once(dirname(__FILE__) . '/../libraries/query/phpQuery/phpQuery.php');
require_once(dirname(__FILE__) . '/../libraries/Snoopy.class.php');

header("Content-Type: text/html; charset=utf-8");
set_time_limit(0);

class Sys_weixin extends Base_Controller {
    public $keyWord = "";
    public $class_id ="";
    public $totalPage = 1;
    public $url = "";
    public $page_arr = array();
    public $ggh_arr = array();
    public $newsPageSize = 1;
    public $newsPageUrl = array();
    public $_proxy_host = "";
    public $_proxy_port = "";
    public $_agent = "";
    public $snoopy;
    public $proxy_arr = array();
    public $snoopy_status = 0;
    public $reinit =0;


    public function __construct()
    {

        parent::__construct();
        $this->load->model('sys_cms_category');
        $this->load->model('sys_cms_content');
        $this->load->model('sys_cms_class');


        
    }

  public function initProxy($status=1,$line=1){
      $agent_arr = array();
      //伪装浏览器
      //$agent  = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.120 Safari/537.36";
      $agent_arr[0] = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.120 Safari/537.36";
      $agent_arr[1] = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.63 Safari/537.36";
      $agent_arr[2] = "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:33.0) Gecko/20100101 Firefox/33.0";
      $agent_arr[3] = "Mozilla/5.0 (Windows NT 6.1; WOW64; Trident/7.0; rv:11.0) like Gecko";
      $agent_arr[4] = "Mozilla/5.0 (iPhone; U; CPU iPhone OS 4_3_3 like Mac OS X; en-us) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2 Mobile/8J2 Safari/6533.18.5";
      $agent_arr[5] = "Mozilla/5.0 (Linux; U; Android 2.3.7; en-us; Nexus One Build/FRF91) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1";
      $agent_arr[6] = "Mozilla/5.0 (BlackBerry; U; BlackBerry 9800; en) AppleWebKit/534.1+ (KHTML, like Gecko) Version/6.0.0.337 Mobile Safari/534.1+";
      $agent_rand = rand(0,2);
      $agent = $agent_arr[$agent_rand];
      $proxy_zz = array();
      $proxy_arr1 = array();
      if($status == 1){

          switch ($line) {
            case '1':
              //代理线路1
              //获取代理ip
              $proxy_arr1 = $this->getProxyArr("http://proxy.com.ru/list_1.html");
              //$proxy_arr2 = $this->getProxyArr("http://proxy.com.ru/list_2.html",50);
              // $proxy_arr3 = $this->getProxyArr("http://proxy.com.ru/list_3.html",100);
              // $proxy_arr4 = $this->getProxyArr("http://proxy.com.ru/list_4.html",150);
              //$proxy_arr5 = $this->getProxyArr("http://proxy.com.ru/list_5.html",200);
              //$proxy_arr6 = $this->getProxyArr("http://proxy.com.ru/list_6.html",250);
              // $proxy_arr = array_merge($proxy_arr1,$proxy_arr2,$proxy_arr3,$proxy_arr4);
              // $proxy_arr = array_merge($proxy_arr1,$proxy_arr2);
              $proxy_zz = $proxy_arr1;

            break;

            case '2':
              //获取代理ip
              $proxy_zz = $this->getProxyList();
            break;
            
          }

         
          
          //自动切换代理线路
          if(count($proxy_zz)==0 && count($proxy_arr1)==0){
             $proxy_zz = $this->getProxyList();
             //print_r($proxy_zz);
             //两个代理线路都失效，关掉代理
             //if(count($proxy_zz)==0){
                return $this->snoopy = $this->setNoProxy($agent);
                //return 1;
             //}
          }
          $proxy_total = count($proxy_zz) -1;
          $this->proxy_arr =  $proxy_zz;
          $p_rand = rand(0,$proxy_total);

          //设置代理参数
          //41.231.53.40  3128
          
          $proxy_host = $this->proxy_arr[$p_rand]['ip'];
          $proxy_port = $this->proxy_arr[$p_rand]['port'];
          echo "|". $proxy_host."|".$proxy_port."|<br>";
          $this->snoopy = $this->setProxy($proxy_host,$proxy_port,$agent);
           

        }else{
          $this->snoopy = $this->setNoProxy($agent);
        }
  }

	public function index()
	{
    $result = "";
    $this->put("classlist",$this->sys_cms_class->getClassArray());
    $this->put("result",$result);
		$this->render('sys_weixin_edit.html');
	}

  public function content()
  {
    
    $result = "";
    if(IS_POST){
      $this->initProxy();
      $_config = $this->parseData(array('newsPageSize'));
      $arr_cat = $_POST['selcategory'];
      if(count($arr_cat)){
        foreach ($arr_cat as $key => $cat) {
          $_config['openid'] = $cat;
          $this->newsPageSize = $_config['newsPageSize'];
          $arr_ggh = explode(",", $_config['openid']);
          $result =  "</br>".$arr_ggh[2].":</br>".$result . $this->getNewsList($arr_ggh[0],$arr_ggh[1],$arr_ggh[2]);
          
        }
      }
      $result = empty($result) ? '没有结果': $result;
      //$this->handleResult('0',$result);
    }
    $this->put("result",$result);
    
    $this->put("catlist",$this->sys_cms_category->getSysGroup());
    //$this->put("group_list",$this->sys_cms_category->getCateArray());
    $this->render('sys_weixin_content.html');
    
  }

    public function add()
    {
        $status = isset($_POST['status']) ? $_POST['status'] : 0;
        $line = $_POST['line'];
        $this->initProxy($status,$line);

        $result = "";
        if(IS_POST){
            $_config = $this->parseData(array('keyword','totalPage','newsPageSize','class_id'));
            $this->class_id =  $_config['class_id'];
            $this->keyWord = $_config['keyword'];
            $this->totalPage = $_config['totalPage'];
            $this->newsPageSize = $_config['newsPageSize'];
            $this->url = 'http://weixin.sogou.com/weixin?type=1&query='.$this->keyWord.'&ie=utf8&_ast=1411368960&_asf=null&w=01029901&p=40040100&dp=1&cid=null';
            try {
            $page_arr=$this->getPageUrl();
            if($page_arr){
              $result = $this->getGongGongHao($page_arr);
            }
            } catch (Exception $e) {
              //print $e->getMessage();   
              //exit;
            }
            $result = empty($result) ? '代理失效，请重试': $result;

        }
        $this->put("classlist",$this->sys_cms_class->getClassArray());
        $this->put("result",$result);
        $this->render('sys_weixin_edit.html');
    }

    public function getPageUrl(){
        //初始化代理
        $this->reinit = $this->reinit+1;
        $this->snoopy->fetch($this->url); 
        $this->snoopy_status = $this->snoopy->status;
        //echo  $this->snoopy_status;
        if($this->snoopy_status == 200){
          $file = $this->snoopy->results;
        }else{
          //判断连接失败，重试5次
          if($this->reinit <= 5){
              $this->initProxy();
              $this->getPageUrl();
          }else{
            return false;
          }

        }

       //echo  $file ;
        //$file = file_get_contents($this->url);
        phpQuery::newDocument($file);  //初始化对象
        $pageurl = pq("#pagebar_container a");

        $urllen = strlen($pageurl);
        if($urllen==0){
          return 0;
        }
        $i = 0;
        foreach($pageurl as $page){
          
          if($i < $this->totalPage)
          {
            $this->page_arr[] = "http://weixin.sogou.com/weixin?type=1&".substr(pq($page)->attr('href'),1)."</br>";
          }
          $i++; 
        }
        //print_r($this->page_arr);
       

        if(count($this->page_arr)==1){
          //$this->page_arr[1] = $this->page_arr[0];
          $this->page_arr[0] = str_replace("page=2","page=1",$this->page_arr[0]);
        }else{
          $this->page_arr[1] = $this->page_arr[0];
          $this->page_arr[0] = str_replace("page=2","page=1",$this->page_arr[0]);
        }
        sort($this->page_arr);
        //print_r($this->page_arr);
        return  $this->page_arr;
    }


    public function getGongGongHao($page_arr){
        //echo  "|".$this->_proxy_host."|". $this->_proxy_port."|</br></br>";
        $result = "";
        if(count($page_arr)>0){
          foreach($this->page_arr as $pages){
            //代理ip，伪造浏览器
            $this->snoopy->fetch($pages); 
            $file_ggh = $this->snoopy->results;


            //直接获取内容
            //$file_ggh = file_get_contents($pages);

            phpQuery::newDocument($file_ggh); 
            $gghlist = pq(".results div"); 
            foreach($gghlist as  $li){ 
              //每50个公众号换一次代理
              //if($key%5 == 0){
               //   $this->initProxy();
               //   echo "key:".$key."</br>";
             // }

              $cid = "";
              if(pq($li)->attr('onclick')){
                 $gghao = explode(",",pq($li)->attr('onclick'));
                 $gghao = explode("'",  $gghao[0]);
                 $gghao = explode("=",  $gghao[1]);
                 $weixinhao = explode("：",pq($li)->find("h4")->text());
                 $_data['keyword'] = $this->keyWord;
                 $_data['class_id'] = $this->class_id;
                 $_data['catname'] = str_replace(" ","",pq($li)->find("h3")->text());
                 $_data['weixinhao'] = str_replace(" ","",$weixinhao[1]);   
                 $_data['openid'] = $gghao[1];
                 $_data['description'] = str_replace("'"," ",pq($li)->find("p:eq(0) span:eq(1)")->text());
                 $_data['wxrz'] = str_replace("'"," ",pq($li)->find("p:eq(1) span:eq(1)")->text());
                 $_data['2weima'] = pq($li)->find("img:eq(2)")->attr('src');
                 $_data['url'] = "http://weixin.sogou.com/gzh?openid=".$gghao[1];
                 $_data['logourl'] = pq($li)->find("img")->attr("src");

                 // echo $this->sys_cms_category->addEntity($_data);
                 $_check = $this->sys_cms_category->getCount(array(
                'openid'=>$_data['openid']
                 ));
                 //通过openid判断不存在才入库
                 if($_check==0){
                     $sql = "INSERT INTO sys_cms_category (catname, weixinhao,openid,description,keyword,url,wxrz,logourl,2weima,class_id,pid) VALUES ('".$_data['catname']."', '".$_data['weixinhao']."','".$_data['openid']."','".$_data['description']."','".$_data['keyword']."','".$_data['url']."','".$_data['wxrz']."','".$_data['logourl']."','". $_data['2weima']."','". $_data['class_id']."','". $_data['class_id']."')";
                     $this->db->query($sql);
                     $cid = $this->db->insert_id();
                     //echo "</br></br></br>". $_data['catname'] ."</br>";

                  }else{

                    $query = $this->db->query("SELECT id,2weima FROM sys_cms_category where openid='".$_data['openid']."' LIMIT 1");
                    $row = $query->row_array();
                    $cid = $row['id'];
                    //判断没有二维码就更新
                    if($row['2weima']==""){
                       $sql = "update sys_cms_category set 2weima='".$_data['2weima']."' where id=".$cid."";
                       $this->db->query($sql);
                    }
                  }

                  if($cid){

                      /*更换代理IP
                      $proxy_arr = $this->proxy_arr;
                      $p_rand = rand(0,49);
                      $proxy_host = $proxy_arr[$p_rand]['ip'];
                      $proxy_port = $proxy_arr[$p_rand]['port'];
                      echo $proxy_host."  ".$proxy_port."<br>";
                      $agent = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.120 Safari/537.36";
                      $this->snoopy = $this->setProxy($proxy_host,$proxy_port,$agent);*/

                      $result = $result ."公众号：". $_data['catname']."</br>";
                      $result = $result .$this->getNewsList($_data['openid'],$cid,$_data['catname']);
                  }
               }
           }

          }
        }
        return $result;
    }


    public function getNewsList($gghao,$cid,$catname){
        //$this->initProxy();
        $result = "";
        $date_t = strtotime(date('Y-m-d H:i:s')).'000';
        //获取总条数、页数
        $tp_url = "http://weixin.sogou.com/gzhjs?cb=sogou.weixin.gzhcb&openid=".$gghao."&page=1&t=".$date_t."";

        //代理ip，伪造浏览器
        $this->snoopy->fetch($tp_url); 
        
        //判断连接状态
        $this->snoopy_status = $this->snoopy->status;
        //echo  $this->snoopy_status;
        $this->reinit = $this->reinit+1;
        if($this->snoopy_status == 200){
          $file_tp = $this->snoopy->results;
        }else{
          //判断连接失败，重试5次
          if($this->reinit <= 5){
              $this->initProxy();
              $this->getNewsList($gghao,$cid,$catname);
          }else{
            return false;
          }

        }

        
        //$file_tp = file_get_contents($tp_url);
        //print_r($file_tp);


        // 裁剪多余字符串，只剩下json数据
        $file_arr = explode('sogou.weixin.gzhcb(', $file_tp);
        $file_arr = explode('})', $file_arr[1]);
        $file_ggh = $file_arr[0].'}';
        //将json字符串转成数组 array(page,items,totalItems,totalPages)
        $file_ggh=json_decode($file_ggh,true);
       
        $totalItems = $file_ggh['totalItems'];
        $totalPages = $file_ggh['totalPages'];


        /*$total_arr = explode('"totalItems":', $file_tp);
        $total_arr = $total_arr[1];
        $totalItems = explode(",", $total_arr);
        $totalItems = intval( $totalItems[0]);
        $totalPages =explode(":", $total_arr);
        $totalPages = intval($totalPages[1]);*/

        if($this->newsPageSize == '-1' && $totalItems > 0){
           $this->newsPageSize = $totalPages;
        }

        for($i=0;$i<$this->newsPageSize;$i++){
           $xml_url = "http://weixin.sogou.com/gzhjs?cb=sogou.weixin.gzhcb&openid=".$gghao."&page=".$i."&t=".$date_t."";

           //代理ip，伪造浏览器
           $this->snoopy->fetch($xml_url); 
           $file_ggh = $this->snoopy->results;

           //$file_ggh = file_get_contents($xml_url);

           //判断有没有新闻
           if( $totalItems > 0 && $totalPages >= $i){

               $file_arr = explode('sogou.weixin.gzhcb(', $file_ggh);
               if(count($file_arr)<1){
                  break;
               }
               $file_arr = explode('})', $file_arr[1]);
               $file_ggh = $file_arr[0].'}';
               $file_ggh=json_decode($file_ggh,true);
               $xml_content = $file_ggh['items'];
               $xml_content = str_replace('gbk','utf-8',$xml_content);

               /*$file_ggh=explode('["', $file_ggh);
               $file_ggh=explode('"]', $file_ggh[1]);
               $xml_content = str_replace('\"','"',$file_ggh[0]);
               $xml_content = str_replace('\/','/',$xml_content);
               $xml_content = str_replace('gbk','utf-8',$xml_content);
               $xml_content = explode('","',$xml_content );*/
               
               foreach($xml_content as $xc){
                $xc = str_replace('','',$xc);
               
                
                phpQuery::newDocument($xc); 

                 $docid = pq("display > docid")->text();
                 $tplid = pq("display > tplid")->text();
                 $title = pq("display > title")->text();
                 $title = str_replace("'"," ",$title);
                 $url = pq("display > url")->text();
                 
                 $newsdate = strtotime(pq("display > date")->text());
                 $description = pq("display > content168")->text();
                 $description = str_replace("'"," ",$description);
                 $imglink = pq("display > imglink")->text();
                 $headimage = pq("display > headimage")->text();
                 // $title = str_replace('<![CDATA[','',$title);
                 // $title = str_replace(']]','',$title);
                $_check = $this->sys_cms_content->getCount(array(
                      'docid'=>$docid
                ));
                if($_check==0){
                    //代理ip，伪造浏览器
                   $this->snoopy->fetch($url); 
                   $file_content = $this->snoopy->results;

                   //$file_content = file_get_contents($url);
                   if($file_content){
                    phpQuery::newDocument($file_content); 
                    // $html = preg_replace("/<([a-za-z]+)[^>]*>/","<\1>",$html); </?[^pp/>]+>
                    $content = pq("#page-content")->html();

                    $content = preg_replace( "@<script(.*?)</script>@is", "", $content ); 
                   // $str = preg_replace( "@<iframe(.*?)</iframe>@is", "", $str ); 
                    //$str = preg_replace( "@<style(.*?)</style>@is", "", $str ); 
                    //$str = preg_replace( "@<(.*?)>@is", "", $str ); 
                    // $content = str_replace("&quot;",'"',$content); //替换"的html实体标签
                    // $content = str_replace("&apos;","'",$content); //替换'的html实体标签
                    // $content = str_replace("&amp;","&",$content); //替换&的html实体标签
                    $content = str_replace("var first_sceen__time = (+new Date());","",$content);
                    $content = str_replace("举报","",$content);
                    // $content = str_replace(" ", "", $content);
                    $content = str_replace("'"," ",$content);
                    $content = str_replace("data-src","src",$content);
                    $content = str_replace("<a class=\"media_tool_meta meta_primary\" id=\"js_view_source\" href=\"javascript:void(0);\">阅读原文</a>","",$content);

                    //echo "content:". $content."</br></br>";
            
                    $sql = "INSERT INTO sys_cms_content (docid,cid,tplid,title,url,newsdate,description,content,imglink,headimage,catname) VALUES ('".$docid."','".$cid."','".$tplid."', '".$title."','".$url."','".$newsdate."','".$description."','".$content."','".$imglink."','".$headimage."','".$catname."')";

                    $this->db->query($sql);
                    $this->db->insert_id();
                    // echo $sql;
                    // exit;
                    $result = $result. $title."</br>";
                    //sleep(1);

                    }
                }


               }
         }

        }

        return $result;
    }


    public function setProxy($proxy_host,$proxy_port,$agent){
        $this->_proxy_host = $proxy_host;
        $this->_proxy_port = $proxy_port;

        $this->_agent = $agent;
        $snoopy = new Snoopy;
        $snoopy->proxy_host = $this->_proxy_host;
        $snoopy->proxy_port = $this->_proxy_port;
        $snoopy->agent = $this->_agent; 
        return $snoopy;
    }

    public function setNoProxy($agent){
        $this->_agent = $agent;
        $snoopy = new Snoopy;
        $snoopy->agent = $this->_agent; 
        return $snoopy;
    }

    //抓取代理站长免费代理IP
    public function getProxyList(){
      $url = "http://www.chaojirj.com/daili/";
      $snoopy = new Snoopy;
      $snoopy->fetch($url); 
      $result = $snoopy->results;
      phpQuery::newDocument($result); 
      $proxy_table = pq(".phoneduba-newlist");
      //获取最新代理文章地址
      $proxy_url = "http://www.chaojirj.com".pq($proxy_table)->find('li:eq(1) a')->attr('href');
      
      $snoopy->fetch($proxy_url); 
      $result = $snoopy->results;
      phpQuery::newDocument($result); 
      $proxy_list = pq(".phoneduba-newleftcont div");
      $data = array();
      foreach ($proxy_list as $key => $pro) {
          $str = pq($pro)->text();
          if(preg_match("/\d+\.\d+\.\d+\.\d+\:\d/",$str)){
            $str = explode(':', $str);
            $str_rep = preg_replace( '/\d+\.\d+\.\d+\.\d+/','', $str[0]);
            $data[] = array('ip' => str_replace($str_rep, "", $str[0]),'port' => str_replace(" ", "", $str[1]));
          }
      }
      return $data;
    }

    public function getProxyArr($action,$index=0){
      // $action  = "http://proxy.com.ru/list_1.html";
      $snoopy = new Snoopy;
      $snoopy->fetch($action); 
      $result = iconv('gbk','utf-8',$snoopy->results);
      $data = array();
      phpQuery::newDocument($result); 
      $proxy_table = pq("table:eq(2) table:eq(4) tr");
      // $proxy_list = pq($proxy_table)->find('tr');
      foreach($proxy_table as $key => $pro){
        if($key > 0){
          $pro_ip = pq($pro)->find('td:eq(1)')->text();
          $pro_port = pq($pro)->find('td:eq(2)')->text();
          $data[$index] = array('ip' => $pro_ip ,'port' => $pro_port);
          $index = $index +1;
        }
      }
      return $data;
    }

    public function status(){
        $_id = $this->input->get('id');
        $_status = $this->input->get('status');
        $_data['flag_valid'] = $_status;
        echo $this->sys_user_model->updateEntityByID($_data,$_id)?STATUS_SUCCESS:STATUS_ERROR;
    }

}

