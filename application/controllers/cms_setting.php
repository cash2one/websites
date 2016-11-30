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
header("Content-type: text/html; charset=utf-8"); 

class Cms_setting extends Base_Controller{

	public function __construct(){
		parent::__construct();
		
	}

	public function index(){

		if(IS_POST){
			$_data = $this->parseData(array('domainname','skin','sitename','sitebname','indextitle','keywords','description','beian','zhanzhangtong',
				'bottom','ad_index','ad_category','ad_content','search','mdomain','pcdomain','urltype'));
			$this->cache_write("site",$_data );
			$this->handleResult(1);
		}
		$this->config->load('config_site', TRUE);
		$config_site = $this->config->item('config_site');
		$this->put("setting",$config_site);
        $this->render('sys_cms_setting.html');
	}

	public function  cache_write($name,$values){
		$cachefile = './application/config/config_'.$name.'.php';
		$cachetext = "<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');\r\n".$this->arrayeval($values)."\r\n";

    	if(!$this->swritefile($cachefile,$cachetext)){
    		exit("File: $cachefile write error.");
    	}

	}

	public function arrayeval($array,$level=0){
		$space = "";

		$evalute = "";
		$comma = $space;
		foreach ($array as $key => $val) {
			$key = is_string($key) ? '\''.addcslashes($key,'\'\\').'\'' : $key;
			$val = !is_array($val) && (!preg_match("/^\-?\d+$/", $val) || strlen($val) > 12) ? '\''.addcslashes($val, '\'\\').'\'' : $val;

			if(is_array($val)){
				$evalute .= "$omma$key => " .arrayeval($val,$level + 1);
			}else{
				$evalute .= '$config['."$comma$key] = $val".";\r\n";
			}

		}
		$evalute .= "\r\n$space";
		return $evalute;
	}

	public function swritefile($filename,$writetext,$openmod='w'){
		if(@$fp = fopen($filename,$openmod)){
			flock($fp,2);
			fwrite($fp, $writetext);
			fclose($fp);
			return true;
		}else{
			return false;
		}
	}


}