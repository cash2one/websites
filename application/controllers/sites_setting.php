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

class Sites_setting extends Base_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('sys_cms_sites');
	}

	public function index(){

		if(IS_POST){
			$_data = $this->parseData(array('groupid','wid','domainname','pcskin','mskin','cnzz'));
			$domains = preg_split('/\r\n/', $_data['domainname']);
			$_data['domains'] = $domains;

			if(count($domains)>1){
				$res = $this->cache_write("site",$_data );
				//更新数据库
				if($res){
	                $query = $this->db->insert('sys_cms_group', array('name' => '分组'.$_data['groupid'] ));
	                $groupid=$this->db->insert_id();
	                foreach ($domains as $domain) {
	                	$query = $this->db->insert('sys_cms_website', array('groupid' => $groupid,'name' => $domain,'buildtime'=>time() ));
	                	$wid=$this->db->insert_id();
	                }

	            }
	            $this->handleResult(1);
			}else{
				$this->handleResult(0);
			}
			


			
		}

		$setting = array();
		$setting['groupid'] = $this->sys_cms_sites->getMaxGroupid()+1;
		$setting['wid']  = $this->sys_cms_sites->getMaxWid()+1;

		$this->put('setting',$setting);
        $this->render('sites_setting.html');
	}

	public function  cache_write($name,$data){

		$index_list_title =array();
		$titlelist = file('./data/keywords.txt');
		foreach ($titlelist as $title) {
		    $index_list_title[] = rtrim($title);
		}
		$index_key = $index_list_title;
		$cat_map_arr=array('1','2','3','4','5','6');

		$navlist = array(
				['jiqing','激情'],
				['fuli','福利'],
				['sizu','丝足'],
				['dongtai','动态图'],
		        ['mei','美图'],
		        ['video','视频'],
		        ['pic','推荐'],
		        ['hot','头条'],
		        ['top','另类'],
				['zonghe','综合'],
		        ['meinv','美女'],
		        ['chemo','车模'],
		        ['papa','自拍'],
		        ['zhen','写真'],
		        ['pai','偷拍'],
		        ['lele','娱乐'],
		        ['jing','精彩'],
		        ['tui','推荐'],
		        ['wait','完美'],
		        ['wuwu','无码'],
			);

		$mobile_tmpl = array('mlaonanren-nc','mblbhxy-nc','mkang-nc');
		$muban = array('laonanren-nc','blbhxy-nc','kang-nc','ko1-nc');

		$randdesc = array('最新更新','热门推荐','TOP十条','爆料推荐');


		$cnzz = $data['cnzz'];


		$wid =$data['wid'];
		$groupid = $data['groupid'];
		$domains = $data['domains'];
		$allhost = array();
		foreach ($domains as $domain) {
			$wid = $wid+1;
			$allhost[$domain] = array(
				'wid' => $wid,
			    'group' => $groupid,
			    'muban' => ''.$muban[rand(0,count($muban)-1)].'',
			    'mobile_tmpl' => ''.$mobile_tmpl[rand(0,count($mobile_tmpl)-1)].'',
			    'cat_map' =>array(
			      '1' =>array(
			        'pinyin' => 'xin'.$navlist[rand(0,count($navlist)-1)][0].'',
			        'name' => ''.$navlist[rand(0,count($navlist)-1)][1].'',
			        'keys' => ''.$index_key[rand(0,count($index_key)-1)].','.$index_key[rand(0,count($index_key)-1)].'',
			        'description' => ''.$randdesc[rand(0,count($randdesc)-1)].''.$index_key[rand(0,count($index_key)-1)].','.$index_key[rand(0,count($index_key)-1)].','.$index_key[rand(0,count($index_key)-1)].'',
			      ),
			      '2' =>array(
			        'pinyin' => ''.$navlist[rand(0,count($navlist)-1)][0].'hot',
			        'name' => ''.$navlist[rand(0,count($navlist)-1)][1].'',
			        'keys' => ''.$index_key[rand(0,count($index_key)-1)].','.$index_key[rand(0,count($index_key)-1)].'',
			        'description' => ''.$randdesc[rand(0,count($randdesc)-1)].''.$index_key[rand(0,count($index_key)-1)].','.$index_key[rand(0,count($index_key)-1)].','.$index_key[rand(0,count($index_key)-1)].'',
			      ),
			      '3' =>array(
			        'pinyin' => 'top'.$navlist[rand(0,count($navlist)-1)][0].'',
			        'name' => ''.$navlist[rand(0,count($navlist)-1)][1].'',
			        'keys' => ''.$index_key[rand(0,count($index_key)-1)].','.$index_key[rand(0,count($index_key)-1)].'',
			        'description' => ''.$randdesc[rand(0,count($randdesc)-1)].''.$index_key[rand(0,count($index_key)-1)].','.$index_key[rand(0,count($index_key)-1)].','.$index_key[rand(0,count($index_key)-1)].'',
			      ),
			      '4' =>array(
			        'pinyin' => 'new'.$navlist[rand(0,count($navlist)-1)][0].'',
			        'name' => ''.$navlist[rand(0,count($navlist)-1)][1].'',
			        'keys' => ''.$index_key[rand(0,count($index_key)-1)].','.$index_key[rand(0,count($index_key)-1)].'',
			        'description' => ''.$randdesc[rand(0,count($randdesc)-1)].''.$index_key[rand(0,count($index_key)-1)].','.$index_key[rand(0,count($index_key)-1)].','.$index_key[rand(0,count($index_key)-1)].'',
			      ),
			      '5' =>array(
			        'pinyin' => 'pic'.$navlist[rand(0,count($navlist)-1)][0].'',
			        'name' => ''.$navlist[rand(0,count($navlist)-1)][1].'',
			        'keys' => ''.$index_key[rand(0,count($index_key)-1)].','.$index_key[rand(0,count($index_key)-1)].'',
			        'description' => ''.$randdesc[rand(0,count($randdesc)-1)].''.$index_key[rand(0,count($index_key)-1)].','.$index_key[rand(0,count($index_key)-1)].','.$index_key[rand(0,count($index_key)-1)].'',
			      ),
			      '6' =>array(
			        'pinyin' => ''.$navlist[rand(0,count($navlist)-1)][0].'',
			        'name' => ''.$navlist[rand(0,count($navlist)-1)][1].'',
			        'keys' => ''.$index_key[rand(0,count($index_key)-1)].','.$index_key[rand(0,count($index_key)-1)].'',
			        'description' => ''.$randdesc[rand(0,count($randdesc)-1)].''.$index_key[rand(0,count($index_key)-1)].','.$index_key[rand(0,count($index_key)-1)].','.$index_key[rand(0,count($index_key)-1)].'',
			      ),
			    ),
			    'mdomain' => 'http://m.'.$domain,
			    'pcdomain' => 'http://www.'.$domain,
			    'tongji' => '',
			    'sitename' => ''.$index_key[rand(0,count($index_key)-1)].'',
			    'index_title' => ''.$index_key[rand(0,count($index_key)-1)].'',
			    'index_key' => ''.$index_key[rand(0,count($index_key)-1)].','.$index_key[rand(0,count($index_key)-1)].','.$index_key[rand(0,count($index_key)-1)].'',
			    'detail_seo_title' => ''.$index_key[rand(0,count($index_key)-1)].','.$index_key[rand(0,count($index_key)-1)].','.$index_key[rand(0,count($index_key)-1)].','.$index_key[rand(0,count($index_key)-1)].','.$index_key[rand(0,count($index_key)-1)].'',
		    );
		}

		$config['allhost'] = $allhost;


		//文件格式
		$text='<?php 
		$config["cache"] = 1;
		$config["cnzz"] = '.var_export($cnzz,true).';
		$config["allhost"]='.var_export($allhost,true).';';



		//siteweb51
		$filename='./data/out/siteweb'.$data['groupid'];
		!is_dir($filename) && mkdir($filename,0777);

		$file = $filename.'/site.inc.php';

		if(false!==fopen($file,'w+')){
			file_put_contents($file,$text);
			$this->downfile($file);
			return 1;
		}else{
			return 0;
		}

	}

	function downfile($fileurl)
	{
		if(is_file($fileurl)) {
            header("Content-Type: application/force-download");
            header("Content-Disposition: attachment; filename=".basename($fileurl));
            readfile($fileurl);
            exit;
        }else{
            echo "文件不存在！";
            exit;
        }


	}


}