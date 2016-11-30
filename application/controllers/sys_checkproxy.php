<?php 
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
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header("content-type:text/html; charset=utf-8");
require("muti_curl_class.php");
set_time_limit(0);
$sucesesnum=0;
$good_proxy=array();
function request_callback($response, $info, $request) {
    global $sucesesnum,$good_proxy;
//  下面的正则可以对返回的结果进行选择性显示
/*  if (preg_match("~<title>(.*?)</title>~i", $response, $out)) {
            $title = $out[1];
    }*/
//  echo '<br>'.$response .'<br>';
    echo '<br>';
//对响应也就是    $response 进行检测判断里面是否有设定的字符，如果有判断运用该代理成功
    if( $response !== false && substr_count($response, 'User-agent: Baiduspider') >=1 ) {
            //  $result = true;
        echo "true<br>";
//      echo $request[options][10004];
//      print_r ($request->options);
        echo $request->options[CURLOPT_PROXY];
        $good_proxy[]=$request->options[CURLOPT_PROXY];
    }
    echo '<br>the-->'. $sucesesnum.'<---use:'. $info['total_time']; 
//  print_r ($request);
    //echo $request->url;
    $sucesesnum++;
    echo "<hr>";
}


$params = array_merge($_GET, $_POST); //此处获得传递过来的代理ip的地址
$result = $proxy_ip = trim($params['ip']);
$timeout=intval(trim($params['timeout']));
if($timeout<3 ){$timeout=3;}
if($timeout>300){$timeout=300;}
$thread_size=intval(trim($params['thread_size']));
if($thread_size<5){$thread_size =5;}
if($thread_size>300){$thread_size =300;}
 
if($proxy_ip == '') {
    echo '请输入IP!!';
    return;
}
$replace_arr1 = array('&nbsp;', 'qq代理：', 'dn28.com', 'qqip', 'qq代理', 'qq代理ip', '代理ip：', 'ip：', '代理ip','"',"'",'\\','/',' ');
$result = str_replace($replace_arr1, array(''), $result);
$result = str_replace(",", "\n", $result);
$resArr = explode("\n", $result);
foreach($resArr as $k => $v) {
    $posProxy = getPos($v, '@');
    if($posProxy===false){
        if (!empty($v)){$proxyip_and_port = $v; }
    }else{
        $proxyip_and_port = substr($v, 0, $posProxy);
    }
    $newRes[] =trim($proxyip_and_port);
}
print_r($newRes);
//die();
$option_setting = array(
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CONNECTTIMEOUT => 5,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HEADER=>false,
        CURLOPT_PROXY=>'',//这个地方设置代理的位置
    );
$url= 'http://www.baidu.com/robots.txt';
$btime=time();
$rc = new muti_curl("request_callback");
$rc->timeout = $timeout;
$rc->thread_size = $thread_size;
foreach ($newRes as $v) {
    $option_setting[CURLOPT_PROXY]=$v;
    $request = new request_setting($url, $method = "GET", $post_data = null,$header= null, $option_setting);
    $rc->add($request);
}
$rc->execute();
$etime=time();
$usedtime=$etime-$btime;
echo 'all'. $sucesesnum.'use'. $usedtime; 
echo '<hr>';
$good_proxy= array_unique($good_proxy);
$str='';
foreach  ($good_proxy as $v){
    $str.="'".trim($v)."',";
}
$str= str_replace ( ' ' , '' ,$str );
$str = preg_replace('/\s+/', ' ', $str);
echo $str.'<br>';
var_export ($good_proxy);
//var_dump ($good_proxy);
 
 
 
 
 
 
 
 
 
 
 
 
 
//**************************************************************************************************
//*******************************只用了一个函数
 
function parseProxyInfo ( $proxyStr ) {
    //$proxyStr = '202.115.207.25:80@HTTP;四川省成都市 四川师范大学';
    $posIp = getPos($proxyStr, ':');
    $ip = substr($proxyStr, 0, $posIp);
    $posPort = getPos($proxyStr, '@');
    $port = substr($proxyStr, $posIp+1, $posPort-$posIp-1);
    $posType = getPos($proxyStr, ';');
    $type = substr($proxyStr, $posPort+1, $posType-$posPort-1);
    $location = substr(strstr($proxyStr, ';'), 1);
    return array(
                'ip'    =>   $ip,
                'port'  =>   $port,
                'type'  =>   $type,
                'location'  =>   $location
            );
}
 
function getPos($haystack, $needle){
    return strpos($haystack, $needle);
}
 
function check_proxy_is_useful($model, $proxy_info_arr = array()) {
    global $params, $config;
    if($model == 'single') {
        $proxy_port = intval(trim($params['port']));
        $check_proxy_url = $config['verify_url'];
        $proxy_time_out = intval(trim($params['timeout']));
        $retry = intval(trim($params['retry']));
        $proxy_ip = trim($params['ip']);
        $proxy = new proxy( $proxy_ip, $proxy_port, $check_proxy_url, $proxy_time_out, $retry );
        //成功返回string success, 失败返回boolean false
        $result = $proxy -> check_proxy();
        //var_dump($result);
        $proxy_str_success = '<font color="green">'.$proxy_ip.':'.$proxy_port.'@'.'HTTP 代理验证成功!</font>';
        $proxy_str_failed = '<font color="red">'.$proxy_ip.':'.$proxy_port.'@'.'HTTP 代理验证失败!</font>';
        return $result !== false ? $proxy_str_success : $proxy_str_failed;  
    } elseif ($model == 'collect') {
        $proxy_port = intval(trim($proxy_info_arr['port']));
        $check_proxy_url = $config['verify_url'];
        $proxy_time_out = intval(trim($params['timeout']));
        $retry = intval(trim($params['retry']));
        $proxy_ip = trim($proxy_info_arr['ip']);
        /*echo $proxy_ip.'<br />';
        echo $proxy_port.'<br />';
        echo $check_proxy_url.'<br />';
        echo $proxy_time_out.'<br />';
        echo $retry.'<br />';*/
        if(!isset($proxy)) {
            $proxy = new proxy( $proxy_ip, $proxy_port, $check_proxy_url, $proxy_time_out, $retry );
        }       
        //成功返回string success, 失败返回boolean false
        $result = $proxy -> check_proxy();
        return $result;
    }
}
 
function get_single(){
    global $params, $config;
    $proxy_ip = trim($params['ip']);
    if($proxy_ip == '') {
        echo '请输入IP!!';
        return;
    }
    echo check_proxy_is_useful('single');
}
 
function get_proxy_by_collect(){
    global $params, $config;
    $params['url'] = trim($params['url']);
    if($params['url'] == '') {
        echo '请输入url!';
        return;
    }
    //$url = 'http://www.dn28.com/html/75/n-5175.html';
    $con = iconv('GBK', 'UTF-8', file_get_contents($params['url']));
    preg_match ('/<\/TBODY><\/TABLE>(.*)<BR><div class="adbox">/s', $con, $arr);
    $result = strip_tags ($arr[1], '<BR>');
    $replace_arr1 = array('&nbsp;', 'qq代理：', 'dn28.com', 'qqip', 'qq代理', 'qq代理ip', '代理ip：', 'ip：', '代理ip');
    $result = str_replace($replace_arr1, array(''), $result);
    //print_r($arr);
    $resArr = explode('<BR>', $result);
    //print_r($resArr);
    echo '<h3>代理开始批量验证中，整个过程将会花费您几分钟时间。</h3>';
    unset($_SESSION['success_arr']);
    foreach($resArr as $k => $v) {
        $newRes[$k] = parseProxyInfo($v);
        //print_r($newRes[$k]);
        /*return;*/
        $result = check_proxy_is_useful('collect', $newRes[$k]);
        $proxy_str_success = '<font color="green">'.$newRes[$k]['ip'].':'.$newRes[$k]['port'].'@'.$newRes[$k]['type'].' 代理验证成功！&nbsp;&nbsp;&nbsp;IP地址:'.$newRes[$k]['location'].'</font>';
        $proxy_str_failed = '<font color="red">'.$newRes[$k]['ip'].':'.$newRes[$k]['port'].'@'.$newRes[$k]['type'].' 代理验证失败！&nbsp;&nbsp;&nbsp;IP地址:'.$newRes[$k]['location'].'</font>';
        if($result !== false ){
            echo $proxy_str_success;
            $_SESSION['success_arr'][] = $success_arr[] = $newRes[$k];
        } else {
            echo $proxy_str_failed; 
        }
        echo '<br />';
    }
    if(isset($success_arr) && count($success_arr) > 0 ) {
        save_success_proxy($success_arr);
        echo '<p style="text-align:center; font-size: 14px; padding: 30px 0;"><a target="_blank" href="export.php">[保存验证成功的代理到本地电脑]</a>&nbsp;&nbsp;&nbsp;<a target="_blank" href="history_proxy.php">[我要看看历史数据]</a></p>';
    } else {
        echo '<p style="text-align:center; font-size: 14px; padding: 30px 0;"><a target="_blank" href="history_proxy.php">[我要看看历史数据]</a></p>';
    }
    //print_r($success_arr);
}
 
function get_proxy_by_rule(){
    global $params, $config;
    $result = $proxy_ip = trim($params['ip']);
    if($proxy_ip == '') {
        echo '请输入IP!!';
        return;
    }
    $replace_arr1 = array('&nbsp;', 'qq代理：', 'dn28.com', 'qqip', 'qq代理', 'qq代理ip', '代理ip：', 'ip：', '代理ip');
    $result = str_replace($replace_arr1, array(''), $result);
    $resArr = explode("\n", $result);
    //print_r($resArr);
    echo '<h3>代理开始批量验证中，整个过程将会花费您几分钟时间。</h3>';
    unset($_SESSION['success_arr']);
    foreach($resArr as $k => $v) {
        $newRes[$k] = parseProxyInfo($v);
        //print_r($newRes[$k]);
        /*return;*/
        $result = check_proxy_is_useful('collect', $newRes[$k]);
        //var_dump($result);
        $proxy_str_success = '<font color="green">'.$newRes[$k]['ip'].':'.$newRes[$k]['port'].'@'.$newRes[$k]['type'].' 代理验证成功！&nbsp;&nbsp;&nbsp;IP地址:'.$newRes[$k]['location'].'</font>';
        $proxy_str_failed = '<font color="red">'.$newRes[$k]['ip'].':'.$newRes[$k]['port'].'@'.$newRes[$k]['type'].' 代理验证失败！&nbsp;&nbsp;&nbsp;IP地址:'.$newRes[$k]['location'].'</font>';
        if($result !== false ){
            echo $proxy_str_success;
            $_SESSION['success_arr'][] = $success_arr[] = $newRes[$k];
        } else {
            echo $proxy_str_failed; 
        }
        echo '<br />';
    }
    if(isset($success_arr) && count($success_arr) > 0 ) {
        save_success_proxy($success_arr);
        echo '<p style="text-align:center; font-size: 14px; padding: 30px 0;"><a target="_blank" href="export_var.php">[保存到php格式文件]</a>&nbsp;&nbsp;&nbsp;<a target="_blank" href="export.php">[保存验证成功的代理到本地电脑]</a>&nbsp;&nbsp;&nbsp;<a target="_blank" href="history_proxy.php">[我要看看历史数据]</a></p>';
    } else {
        echo '<p style="text-align:center; font-size: 14px; padding: 30px 0;"><a target="_blank" href="history_proxy.php">[我要看看历史数据]</a></p>';
    }
}
 
function save_success_proxy($success_arr){
    global $config;
    date_default_timezone_set('PRC');
    $str = '';
    foreach($success_arr as $k => $v) {
        $str .= $v['ip'].':'.$v['port'].'@'.$v['type'].';'.$v['location']."\n";
    }
    $fp = fopen($config['root_path'].'/success_proxy/'.date('YmdHi').'.log', 'a+');
    fwrite($fp, $str);
    fclose($fp);
    unset($str);
}