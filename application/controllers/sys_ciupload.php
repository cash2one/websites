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


header("Content-Type: text/html; charset=utf-8");
set_time_limit(0);

class Sys_ciupload extends Base_Controller {



    public function __construct()
    {
        parent::__construct();
        $this->load->model('sys_cms_ci_category');
        $this->load->model('sys_cms_ci_data');
    }


	public function index()
	{
    $result = "";
    $this->put("classlist",$this->sys_cms_ci_category->getClassArray());
    $this->put("catlist",$this->sys_cms_ci_category->getSysGroup());
    $this->put("result",$result);
	$this->render('sys_ci_upload_edit.html');
	}

    public function upload()
    {

        if(IS_POST){
            echo $_FILES["file"]["size"];
            if ((($_FILES["file"]["type"] == "text/plain") && ($_FILES["file"]["size"] < 20000000000)))
            {
              if ($_FILES["file"]["error"] > 0)
              {
                echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
              }
              else
              {
                echo "Upload: " . $_FILES["file"]["name"] . "<br />";
                echo "Type: " . $_FILES["file"]["type"] . "<br />";
                echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
                //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

                $myfile = fopen( $_FILES["file"]["tmp_name"], "r") or die("Unable to open file!");

                // 输出单行直到 end-of-file
                $fi=0;
                $fis=0;
                $fie=0;
                while(!feof($myfile)) {
                    $ciname = fgets($myfile);
                    //echo $ciname . "<br>";
                    $_check = $this->sys_cms_ci_data->getCount(array(
                        'name'=>$ciname
                    ));
                    if($_check==0){
                        $_data = $this->parseData(array('cid'));
                        $_data['name'] = $ciname;
                        //print_r($_data);
                        //$_data['id'] = get_rnd_id();
                        $this->handleResult($this->sys_cms_ci_data->addEntity($_data));
                        $fis++;
                    }else{
                        echo $ciname.' 已存在'. "<br>";
                        $fie++;
                    }
                    $fi++;

                }
                fclose($myfile);
                echo "<br />共 ".$fi." 个词,成功上传 ". $fis." 个词,重复 ".$fie." 个词<br />";
                if (file_exists("upload/" . $_FILES["file"]["name"]))
                {
                  echo $_FILES["file"]["name"] . " already exists. ";
                }
                else
                {
                  move_uploaded_file($_FILES["file"]["tmp_name"],
                  "upload/" . $_FILES["file"]["name"]);
                  echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
                }
              }
            }
            else
            {
              echo "Invalid file";
            }
        }
    }
    public function download()
    { 
        if(IS_POST){
            $filecontent="";
            if(!isset($_POST['cid'])){
                echo '没有选择分类';
                exit;
            }
            foreach ($_POST['cid'] as $cid) {
                $total = isset($_POST['total']) ? $_POST['total'] :100;
                $downlist=$this->sys_cms_ci_data->downlist($total,$cid);
                $infocat=$this->sys_cms_ci_category->infocat($cid);
                $cname =$infocat[0]['name'];
                $order = array("\r\n", "\n", "\r");   
                $replace = '';
                if(sizeof($downlist)>0){
                    $_data['issend'] = 1;
                    if($cid==1){
                        foreach ($downlist as $down => $val) {
                            $ciname = str_replace($order, $replace, $val['name']);
                            $filecontent =  $filecontent.$ciname."\r\n";
                            $_id = $val['id'];
                            $this->sys_cms_ci_data->updateEntityByID($_data,$_id);
                        }
                    }else{
                        foreach ($downlist as $down => $val) {
                            $ciname = str_replace($order, $replace, $val['name']);
                            $filecontent =  $filecontent. $ciname."####".$cname."\r\n";
                            $_id = $val['id'];
                            $this->sys_cms_ci_data->updateEntityByID($_data,$_id);
                        }
                    }
                }
            }

            $time = date("Y-m-d-H-i-s", time());
            $myfile = 'download/'.$time.'.txt';
            $file_pointer = fopen($myfile,"a");
            fwrite($file_pointer,$filecontent);
            fclose($file_pointer);


            $filename = $myfile;
            header('Content-Type:text/plain'); //指定下载文件类型
            header('Content-Disposition: attachment; filename="'.$filename.'"'); //指定下载文件的描述
            header('Content-Length:'.filesize($filename)); //指定下载文件的大小
              
            //将文件内容读取出来并直接输出，以便下载
            readfile($filename);
            exit;
        }

    }
    public function status(){
        $_id = $this->input->get('id');
        $_status = $this->input->get('status');
        $_data['flag_valid'] = $_status;
        echo $this->sys_user_model->updateEntityByID($_data,$_id)?STATUS_SUCCESS:STATUS_ERROR;
    }

}

