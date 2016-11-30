<?php    
/*  
*  长文章分页类  
*  @package    cutpage  
*  @author     yytcpt(无影)  
*  @version    2008-03-27  
*  @copyrigth  http://www.d5s.cn/    
*/  
    class cutpage{    
        var $pagestr;       //被切分的内容    
        var $pagearr;       //被切分文字的数组格式    
        var $sum_word;      //总字数(UTF-8格式的中文字符也包括)    
        var $sum_page;      //总页数    
        var $page_word;     //一页多少字    
        var $cut_tag;       //自动分页符    
        var $cut_custom;    //手动分页符    
        var $ipage;         //当前切分的页数，第几页    
        var $url;    
        function __construct(){    
            $this->page_word = 700;     
            $this->cut_tag = array("</table>", "</div>", "</p>", "<br/>", "”。", "。", ".", "！", "……", "？", ",");    
            //$this->cut_tag = array("</table>", "</div>", "</p>", "<br/>", "”。", "。", ".", "！", "……", "？", ",");    
            $this->cut_custom = "{nextpage}";    
            $tmp_page = intval(trim($_GET["ipage"]));    
            $this->ipage = $tmp_page>1?$tmp_page:1;    
        }    
        //统计总字数    
        function get_page_word(){    
            $this->sum_word = $this->strlen_utf8($this->pagestr);    
            return $this->sum_word;    
        }    
        /*  统计UTF-8编码的字符长度  
         *  一个中文，一个英文都为一个字  
         */  
        function strlen_utf8($str){    
           $i = 0;    
           $count = 0;    
           $len = strlen ($str);    
           while ($i < $len){    
               $chr = ord ($str[$i]);    
               $count++;    
               $i++;    
               if ($i >= $len)    
                   break;    
               if ($chr & 0x80){    
                   $chr <<= 1;    
                   while ($chr & 0x80) {    
                       $i++;    
                       $chr <<= 1;    
                   }    
               }    
           }    
           return $count;    
        }    
        //设置自动分页符号    
        function set_cut_tag($tag_arr=array()){    
            $this->cut_tag = $tag_arr;    
        }    
        //设置手动分页符    
        function set_cut_custom($cut_str){    
            $this->cut_custom = $cut_str;    
        }    
        function show_cpage($ipage=0){    
            $this->cut_str();    
            $ipage = $ipage ? $ipage:$this->ipage;    
            return $this->pagearr[$ipage];    
        }    
        function cut_img(){
            $str_len_word = strlen($this->pagestr);     //获取使用strlen得到的字符总数    
            $i = 0;    
            if ($str_len_word<=$this->page_word){   //如果总字数小于一页显示字数    
                $page_arr[$i] = $this->pagestr;
            }else{
                $str1 = substr($this->pagestr,0,strpos($this->pagestr,' src='));
                $str2 = substr($this->pagestr,strpos($this->pagestr,' src='),strlen($this->pagestr));

                $str2 = str_ireplace('<img', '{nextpage}<img',$str2);
                $page_arr =$str1.$str2;
                $page_arr = explode('{nextpage}', $page_arr);
   
            }    
            $this->sum_page = count($page_arr);     //总页数    
            $this->pagearr = $page_arr;    
        }

        function cut_str(){
            $str_len_word = strlen($this->pagestr);     //获取使用strlen得到的字符总数    
            $i = 0;    
            if ($str_len_word<=$this->page_word){   //如果总字数小于一页显示字数    
                $page_arr[$i] = $this->pagestr;
            }else{    
                if (strpos($this->pagestr, $this->cut_custom)){
                    $page_arr = explode($this->cut_custom, $this->pagestr);
                }else{

                    $str_first = substr($this->pagestr, 0, $this->page_word);   //0-page_word个文字    cutStr为func.global中的函数    
                    foreach ($this->cut_tag as $v){    
                        $cut_start = strrpos($str_first, $v);       //逆向查找第一个分页符的位置    
                        if ($cut_start){    
                            $page_arr[$i++] = substr($this->pagestr, 0, $cut_start).$v;    
                            $cut_start = $cut_start + strlen($v);    
                            break;    
                        }    
                    }    
                    if (($cut_start+$this->page_word)>=$str_len_word){  //如果超过总字数    
                        $page_arr[$i++] = substr($this->pagestr, $cut_start, $this->page_word);    
                    }else{    
                        while (($cut_start+$this->page_word)<$str_len_word){    
                            foreach ($this->cut_tag as $v){    
                                $str_tmp = substr($this->pagestr, $cut_start, $this->page_word);        //取第cut_start个字后的page_word个字符    
                                $cut_tmp = strrpos($str_tmp, $v);       //找出从第cut_start个字之后，page_word个字之间，逆向查找第一个分页符的位置    
                                if ($cut_tmp){    
                                    $page_arr[$i++] = substr($str_tmp, 0, $cut_tmp).$v;    
                                    $cut_start = $cut_start + $cut_tmp + strlen($v);    
                                    break;    
                                }    
                            }      
                        }    
                        if (($cut_start+$this->page_word)>$str_len_word){    
                            $page_arr[$i++] = substr($this->pagestr, $cut_start, $this->page_word);    
                        }    
                    }    
                }    
            }    
            $this->sum_page = count($page_arr);     //总页数    
            $this->pagearr = $page_arr;    
        }    
        //显示上一条，下一条    
        function show_prv_next(){    
            
            $str = "";

            if ($this->sum_page>1 and $this->ipage>1){
                $nurl = $this->set_url($this->ipage-1);
                // $str .= "<a href='".$nurl."'>上一页</a>";
                $str = "<a href='".$nurl."'><i class=\"fa fa-angle-double-up\"></i><span>上一页</span></a>";
            } 
            if ($this->sum_page>1 and $this->ipage<$this->sum_page){
                $purl = $this->set_url($this->ipage+1);
                $str .= "<a href='".$purl."' ><i class=\"fa fa-angle-double-down\"></i><span>下一页</span></a>";    
            }  
            return $str;    
        }

        //显示上一条，下一条    
        function show_pingyin_prv_next($ename){    
            
            $str = "";

            if ($this->sum_page>1 and $this->ipage>1){
                $nurl = $this->set_pinyin_url($this->ipage-1,$ename);
                // $str .= "<a href='".$nurl."'>上一页</a>";
                $str = "<a href='".$nurl."'><i class=\"fa fa-angle-double-up\"></i><span>上一页</span></a>";
            } 
            if ($this->sum_page>1 and $this->ipage<$this->sum_page){
                $purl = $this->set_pinyin_url($this->ipage+1,$ename);
                $str .= "<a href='".$purl."' ><i class=\"fa fa-angle-double-down\"></i><span>下一页</span></a>";    
            }  
            return $str;    
        }    
        function show_page_select(){    
            if ($this->sum_page>1){    
                $str = '  <select onchange=/"location.href=this.options[this.selectedIndex].value/">';    
                for ($i=1; $i<=$this->sum_page; $i++){    
                    $str.= "<option value='".$this->url.$i."' ".(($this->ipage)==$i ? " selected='selected'":"").">第".$i."页</option>";    
                }    
                $str.= "</select>";    
            }    
            return $str;    
        }    
        function show_page_select_wap(){    
            if ($this->sum_page>1){    
                $str = "<select ivalue='".($this->ipage-1)."'>";    
                for ($i=1; $i<=$this->sum_page; $i++){    
                    $str.= "<option onpick='".$this->url.$i."'>第".$i."节</option>";    
                }    
                $str.= "</select>";    
            }    
            return $str;    
        }
        //伪静态
        function set_url($ipage){
            parse_str($_SERVER["QUERY_STRING"], $arr_url);
            if($ipage==1){
                $url = "http://".$_SERVER["HTTP_HOST"]."/view-".$arr_url['id'].".html";
            }else{
                $url = "http://".$_SERVER["HTTP_HOST"]."/view-".$arr_url['id']."-".$ipage.".html";
            }
            return $url;
        }

        //拼音伪静态
        function set_pinyin_url($ipage,$ename){
            parse_str($_SERVER["QUERY_STRING"], $arr_url);
            if($ipage==1){
                $url = "http://".$_SERVER["HTTP_HOST"]."/".$ename."/".$arr_url['id'].".html";
            }else{
                $url = "http://".$_SERVER["HTTP_HOST"]."/".$ename."/".$arr_url['id']."-".$ipage.".html";
            }
            return $url;
        }
        //动态
        function set_url_bak(){
            parse_str($_SERVER["QUERY_STRING"], $arr_url);  
            unset($arr_url["ipage"]);    
            if (empty($arr_url)){   
                $str = "ipage=";    
            }else{    
                $str = http_build_query($arr_url)."&ipage=";    
            }
            $this->url = "http://".$_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"]."?".$str;    
        }    
    }    
?>