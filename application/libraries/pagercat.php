<?php
/**
 *  class Pager
 *
 *  独立分页类
 *  调用方式：
 *  $pagenation = new Pagination( 4, 10, 200 ); // 4(第一个参数) = currentPage, 10(第二个参数) = pageSize, 200(第三个参数) = 总数
 *  $pagenation->set_link( 'http://www.it308.com' );
 *  $pagenation->show();
 */
class Pagercat {
    protected $_total = 0;
    protected $_total_page = 0;
    protected $_page = 1;
    protected $_page_size = 10;
    protected $_link = '';
    protected $_grep = 3;

    protected $_admin = false;
    protected $_css_next = 'next-page';
    protected $_css_prev = 'prev-page';
    protected $_css_curr = 'current';
    // protected $_css_page = 'page-nav inline-block';
    protected $_css_page = 'pagination';
    protected $_static = true; //伪静态开关
    protected $_cid = ''; //栏目id
	//修改为CI使用的数组方式  $currentpage, $page_size, $total
	public function __construct ($config = array())
    {
    	$this->admin = FALSE;
        if ( count($config)>0 ) {
            foreach ($config as $k => $v) {
                $this->$k = $v;
            }
        }
        $this->set_current_page( $this->page );
        $this->set_page_size( $this->page_size );
        $this->set_total( $this->total );
        //echo $this->classid;
        //$this->_cid = $this->classid;

        if ( $this->admin )
        {
            $this->_admin = $this->admin;
        }
        //$this->_link = $_SERVER['REQUEST_URI'];
        //处理字符串末尾的数字

        if(isset($_SERVER['argv'])){

            $url=$_SERVER['PHP_SELF'].'?'.$_SERVER['argv'][0];

        }else{

            $url=$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];

        }



        $uri = $_SERVER['REQUEST_URI'];

        $uri = rtrim($uri,'/');
        $pos = strrpos($uri, '/');
        if ($pos>0) {
            //判断最后的是否是数字
            $str = substr($uri,$pos,strlen($uri));
            $str = ltrim($str,'/');
            if (is_numeric($str)) {
                //最后一个参数是分页数据
                $uri = substr($uri,0,$pos);
            }
            else {
                //最后一个参数不是分页数据
                $uri = $_SERVER['REQUEST_URI'];
            }
        }
        $uri = rtrim($uri,'/');

        $this->set_link( $uri );

        //echo $_SERVER['REQUEST_URI'];
    }


    public function set_config($config=array())
    {
        $this->admin = FALSE;
        if ( count($config)>0 ) {
            foreach ($config as $k => $v) {
                $this->$k = $v;
            }
        }
        $this->set_current_page( $this->page );
        $this->set_page_size( $this->page_size );
        $this->set_total( $this->total );
        //echo $this->classid;
        //$this->_cid = $this->classid;

        if ( $this->admin )
        {
            $this->_admin = $this->admin;
        }
        //$this->_link = $_SERVER['REQUEST_URI'];
        //处理字符串末尾的数字

        if(isset($_SERVER['argv'])){

            $url=$_SERVER['PHP_SELF'].'?'.$_SERVER['argv'][0];

        }else{

            $url=$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];

        }



        $uri = $_SERVER['REQUEST_URI'];

        $uri = rtrim($uri,'/');
        $pos = strrpos($uri, '/');
        if ($pos>0) {
            //判断最后的是否是数字
            $str = substr($uri,$pos,strlen($uri));
            $str = ltrim($str,'/');
            if (is_numeric($str)) {
                //最后一个参数是分页数据
                $uri = substr($uri,0,$pos);
            }
            else {
                //最后一个参数不是分页数据
                $uri = $_SERVER['REQUEST_URI'];
            }
        }
        $uri = rtrim($uri,'/');

        $this->set_link( $uri );

        //echo $_SERVER['REQUEST_URI'];
    }
	
	
	//原构造函数
	/*
    public function __construct ( $page, $page_size, $total, $admin = false )
    {
        $this->set_current_page( $page );
        $this->set_page_size( $page_size );
        $this->set_total( $total );

        if ( $admin )
        {
            $this->_admin = $admin;
        }
        //$this->_link = $_SERVER['REQUEST_URI'];
        $this->set_link( $_SERVER['REQUEST_URI'] );
    }
	*/
    public function set_link ($link, $is_shop = TRUE)
    {
        $len  = strlen( $link );
        $substr = substr( $link, $len - 1 );
        if ( '&' == $substr )
        {
            $link = substr( $link, 0, $len - 1 );
        }
        $pos = strpos( $link, '?' );

        if ( $pos )
        {
            $link = substr( $link, 0, $pos );
        }
        if ( !empty( $_GET ) )
        {
            $link .= '?';
            foreach ( $_GET as $k=>$v )
            {
                if ( 'page' == strtolower( $k ) )
                {
                    continue;
                }
                $link .= $k.'='.$v.'&';
            }
            $len  = strlen( $link );
            $substr = substr( $link, $len - 1 );
            if ( '&' == $substr )
            {
                $link = substr( $link, 0, $len - 1);
            }
        } 
        elseif ( isset( $_SERVER['QUERY_STRING'] ) AND !empty( $_SERVER['QUERY_STRING'] ) AND $is_shop )
        {  
            $link .= '?'.$_SERVER['QUERY_STRING'];
            $len  = strlen( $link );
            $substr = substr( $link, $len - 1 );
            if ( '&' == $substr )
            {
                $link = substr( $link, 0, $len - 1);
            }
        } 
        // $arr_link = explode('cat-', $link);
        // if(count($arr_link)){
            // $arr_link = explode('.', $arr_link[1]);
            
            // if(count($arr_link)){
            //     $arr_link = explode('.', $arr_link[0]);
            // }
            // if(strstr($arr_link[0],'-')){
            //      $arr_link = explode('-', $arr_link[0]);
            // }
           if(isset($this->classid)){
              $this->_cid = $this->classid;
           }else{
              $this->_cid = isset($_GET['cid']) ? $_GET['cid'] : '';
           }
            //解决获取不到静态地址出现的问题
            if(empty( $this->_cid)){
                $arr_temp = explode("&", $link);
                $arr_cid = "";
                foreach ($arr_temp as $key => $value) {
                    if(preg_match("/^cid=/", $value)){
                        $arr_cid = str_replace("cid=", "", $value);
                    }
                }
                 $this->_cid = $arr_cid;
            }

            
        // }
        $this->_link = $link;
    }

    public function set_page_size ( $page_size )
    {
        if ( empty( $page_size ) )
        {
            $this->_page_size = 10;
        }
        else
        {
            $this->_page_size = (int) $page_size;
        }
    }

    public function set_total ( $total )
    {
        $page_size = empty( $this->_page_size )?10:$this->_page_size;
        $this->_total = $total;
        if ( 0 == ( $total % $page_size ) )
        {
            $this->_total_page = intval( $total / $page_size );
        }
        else
        {
            $this->_total_page = intval( $total / $page_size ) + 1;
        }
        if ( $this->_page > $this->_total_page )
        {
            $this->_page = $this->_total_page;
        }
    }

    public function set_current_page ( $page )
    {
        if ( empty( $page ) )
        {
            $this->_page = 1;
        }
        else
        {
            $this->_page = (int) $page;
        }
    }

    public function get_next_page_btn ()
    {
        if ( $this->_page < $this->_total_page )
        {
            $link = '';

            //伪静态设置
			if($this->_static){
                $s_page = $this->_page + 1;
                $s_link = '/cat-'.$this->_cid.'-'.$s_page.'.html';
                //return '<a href="'.$s_link .'">下一页</a>';
                return '<a class="more-list" href="'.$s_link .'"><i class="fa fa-hand-o-up"></i><span class="load-info">下一页</span></a>';
            }
            if ( strpos( $this->_link, '?' ) )
            {
                $link = $this->_link.'page='.( $this->_page + 1 );
                // $link = $this->_link.'/'.( $this->_page + 1 );
            }
            else
            {
                $link = $this->_link.'page='.( $this->_page + 1 );
            }


            if ( $this->_admin )
            {
                // return '<a href="'.$link.'">下一页</a>';
                return '<a class="more-list" href="'.$link .'"><i class="fa fa-hand-o-up"></i><span class="load-info">下一页</span></a>';


            }
            else
            {
                //return '<a href="'.$link.'">下一页</a>';
                return '<a class="more-list" href="'.$link .'"><i class="fa fa-hand-o-up"></i><span class="load-info">下一页</span></a>';

            }
        }
        if ( $this->_admin )
            return '下一页&nbsp;»';
        else
            return '';
    }

    public function pingyin_next($ename){
        if ( $this->_page < $this->_total_page )
        {
            $s_page = $this->_page + 1;
            $s_link = '/'.$ename.'/index_'.$s_page.'.html';
            echo '<a class="more-list" href="'.$s_link .'"><i class="fa fa-hand-o-up"></i><span class="load-info">下一页</span></a>';
        }
    }

    public function pingyin_prev($ename){
        if ( $this->_page > 1 )
        {
            $s_page = $this->_page - 1;
            if($s_page==1){
                $s_link = '/'.$ename.'/';
            }else{
                 $s_link = '/'.$ename.'/index_'.$s_page.'.html';
            }
            echo '<a class="more-list" href="'.$s_link .'"><i class="fa fa-hand-o-up"></i><span class="load-info">上一页</span></a>';
        }
    }

    public function get_prev_page_btn ()
    {
        if ( $this->_page > 1 )
        {
            $link = '';
            //伪静态设置
            if($this->_static){
                $s_page = $this->_page - 1;
                if($s_page==1){
                    $s_link = '/cat-'.$this->_cid.'.html';
                }
                else{
                    $s_link = '/cat-'.$this->_cid.'-'.$s_page.'.html';
                }
                // return '<a href="'.$s_link .'">上一页</a>';
                return '<a class="more-list" href="'.$s_link .'"><i class="fa fa-hand-o-up"></i><span class="load-info">上一页</span></a>';
            }
            if ( strpos( $this->_link, '?' ) )
            {
                $link = $this->_link.'page='.( $this->_page - 1 );
            }
            else
            {
                $link = $this->_link.'page='.( $this->_page - 1 );
            }
            if ( $this->_admin )
            {
                return '<a href="'.$link.'">上一页</a>';
            }
            else
            {
                return '<a href="'.$link.'">上一页</a>';
            }
        }
        if ( $this->_admin )
            return '«&nbsp;上一页';
        else
            return '';
    }

    public function get_current_page ()
    {
        if ( $this->_admin )
            return '<strong>'.$this->_page.'</strong>';
        else
            return '<a  class="page-numbers '.$this->_css_curr.'" href="javascript:void(0)">'.$this->_page.'</a>';
        // return '<li class="'.$this->_css_curr.'"><a class="selected" href="javascript:void(0)">'.$this->_page.'</a></li>';
    }

    public function get_page_link ( $page )
    {
        $link = '';
        //伪静态设置
        if($this->_static){
            $s_page = $page;
            if($s_page==1){
                $s_link = '/cat-'.$this->_cid.'.html';
            }
            else{
                $s_link = '/cat-'.$this->_cid.'-'.$s_page.'.html';
            }
            return '<a class="page-numbers" href="'.$s_link .'">'.$page.'</a>';
            // return '<li><a href="'.$s_link .'">'.$page.'</a></li>';
        }
        if ( strpos( $this->_link, '?' ) )
        {
            $link = $this->_link.'&page='.$page;
        }
        else
        {
            $link = $this->_link.'?page='.$page;
        }
        if ( $this->_admin )
        {
            return '<a href="'.$link.'">'.$page.'</a>';
        }
        else
        {
            return '<a class="page-numbers" href="'.$link.'">'.$page.'</a>';
            // return '<li><a href="'.$link.'">'.$page.'</a></li>';
        }
    }

    public function get_prev_pages ()
    {
        $pages = array();
        $begin = $this->_page - $this->_grep;
        if ( $begin < 1 )
        {
            $begin = 1;
        }
        elseif ( $begin > 2 )
        {
            $pages[] = $this->get_page_link( 1 );            
            if ( $this->_admin )
            {
                $pages[] = '&nbsp;...&nbsp;';
            }
            else
            {
                $pages[] = '...';
            }
        }
        elseif ( $begin == 2 )
        {
            $pages[] = $this->get_page_link( 1 );
        }
        for ( $i = $begin; $i < $this->_page; $i++ )
        {
            $pages[] = $this->get_page_link( $i );
        }
        return $pages;
    }

    public function get_next_pages ()
    {
        $pages = array();
        $begin = $this->_page + 1;
        if ( $begin < $this->_total_page )
        {
            $end = $begin + $this->_grep;
            if ( $end > $this->_total_page )
            {
                $end = $this->_total_page;
            }
            for ( $i = $begin; $i < $end; $i++ )
            {
                $pages[] = $this->get_page_link( $i );
            }
            if ( $i < $this->_total_page )
            {
                if ( $this->_admin )
                {
                    $pages[] = '&nbsp;...&nbsp;';
                }
                else
                {
                    $pages[] = '...';
                }
                $pages[] = $this->get_page_link( $this->_total_page );
            }
            else
            {
                $pages[] = $this->get_page_link( $this->_total_page );
            }
        }
        elseif ( $begin == $this->_total_page )
        {
            $pages[] = $this->get_page_link( $this->_total_page );
        }
        return $pages;
    }

    public function show ()
    {
        if ( $this->_total_page <= 1 )
        {
            return;
        }
        if ( $this->_admin )
        {
            echo '<p class="pagination">';
            echo '<span>共有'.$this->_total.'条记录</span>';
        }
        else
        {
            //echo '<ul class="'.$this->_css_page.'">';
        }
        //echo $this->get_prev_page_btn();
        $prev_pages = $this->get_prev_pages ();
        if ( !empty( $prev_pages ) )
        {
            foreach ( $prev_pages as $page )
            {
                echo $page;
            }
        }
        echo $this->get_current_page();
        $next_pages = $this->get_next_pages ();
        if ( !empty( $next_pages ) )
        {
            foreach ( $next_pages as $page )
            {
                echo $page;
            }
        }
        // echo $this->get_next_page_btn();
        if ( $this->_admin )
        {
            echo '</p>';
        }
        else
        {
            //echo '</ul>';
        }
    }

    public function mobile_show ()
    {
        if ( $this->_total_page <= 1 )
        {
            return;
        }

        //echo $this->get_prev_page_btn();
        echo $this->get_next_page_btn();

    }

    public function links ()
    {
        $links = "";
        if ( $this->_total_page <= 1 )
        {
            return;
        }
        if ( $this->_admin )
        {
            $links .= '<p class="pagination">';
            $links .= '<span>共有'.$this->_total.'条记录</span>';
        }
        else
        {
            $links .= '<ul class="'.$this->_css_page.'">';
        }
        $links .= $this->get_prev_page_btn();
        $prev_pages = $this->get_prev_pages ();
        if ( !empty( $prev_pages ) )
        {
            foreach ( $prev_pages as $page )
            {
                $links .= $page;
            }
        }
        $links .= $this->get_current_page();
        $next_pages = $this->get_next_pages ();
        if ( !empty( $next_pages ) )
        {
            foreach ( $next_pages as $page )
            {
                $links .= $page;
            }
        }
        $links .= $this->get_next_page_btn();
        if ( $this->_admin )
        {
            $links .= '</p>';
        }
        else
        {
            $links .= '</ul>';
        }

        return $links;
    }

}



?>

