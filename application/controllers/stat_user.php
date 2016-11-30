<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User:Stephan
 * Date: 14-3-28
 * Time: 下午12:14
 */

header("Content-type: text/html; charset=utf-8"); 
class Stat_user extends Base_Controller {

    public $_label = array();
    public $_value = array();
    public function __construct()
    {

        parent::__construct();
        $this->load->model('sys_cms_content');
    }

	public function index()
	{

		$this->render('stat_user.html');

	}


    public function reg_data()
    {





        //$_label = array('05-01','05-02','05-03','05-04','05-05','05-06','05-07','05-08','05-09'
        //,'05-10','05-11','05-12','05-13','05-14','05-15');
        //$_value = array(1235,1125,1323,1389,1256,1568,1383,1677,1953,1798,2089,2215,1738,2189,2315);


        $arr_list = $this->sys_cms_content->getStatDay(30);
        foreach ($arr_list as $key => $value) {
             $this->_label[] =  $value['buildtime'];
             $this->_value[] =  intval($value['total']);
        }

        $_label = $this->_label;
        $_value = $this->_value;
        $_max_value = max($_value)+10;



        $this->load->library('OFC_Chart');
        $title = new OFC_Elements_Title( "每天更新文章数" );
        //创建图表类型对象
        $element = new OFC_Charts_Bar_Glass();
        //设置图标值
        $element->set_values( $_value );
        //$element->set_width( 2 );

        //$element->set_dot_style(array('type'=>"solid-dot",'dot-size'=>5,'halo-size'=>1,'colour'=>'#3D5C56'));

        //设置动画
        $element->set_on_show(array('type'=>"pop-up",'cascade'=> 0.8,'delay'=> 0.1));
        $element->set_colour("#009829");

        //创建图表对象
        $chart = new OFC_Chart();
        $chart->set_title( $title );

        //图表类型添加到图表
        $chart->add_element( $element );

        //x轴
        $x_axis = new OFC_Elements_Axis_X();
        $x_axis->set_labels(array('labels'=>$_label));
        $x_axis->set_steps(1);
        $chart->set_x_axis($x_axis);

        //y轴
        $y_axis = new OFC_Elements_Axis_Y();
        $y_axis->set_range(0,$_max_value,$_max_value/10);
        $chart->set_y_axis($y_axis);

        //x 脚标
        $x_legend = new OFC_Elements_Legend_X('日期');
        $x_legend->set_style('{font-size: 20px; color: #778877}');
        $chart->set_x_legend($x_legend);



        $chart->set_bg_colour('#ffffff');
        echo $chart->toPrettyString();
    }

}

