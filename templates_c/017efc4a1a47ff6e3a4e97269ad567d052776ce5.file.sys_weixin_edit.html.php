<?php /* Smarty version Smarty-3.1.18, created on 2016-04-09 15:23:45
         compiled from "application\views\sys_weixin_edit.html" */ ?>
<?php /*%%SmartyHeaderCode:28885708ae019a1687-63443356%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '017efc4a1a47ff6e3a4e97269ad567d052776ce5' => 
    array (
      0 => 'application\\views\\sys_weixin_edit.html',
      1 => 1458201760,
      2 => 'file',
    ),
    '3c596ebb474f18116c621d13434576de5f901b18' => 
    array (
      0 => 'application\\views\\base_content.html',
      1 => 1458201769,
      2 => 'file',
    ),
    'f165530f262ead3194e3da74319d75271efdfbb5' => 
    array (
      0 => 'application\\views\\base.html',
      1 => 1458201760,
      2 => 'file',
    ),
    '8eb80540d977b61863eaa84b9076238b5bc9835e' => 
    array (
      0 => 'application\\views\\inc_form_result.html',
      1 => 1458201760,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28885708ae019a1687-63443356',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5708ae01b4f2d5_50955883',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5708ae01b4f2d5_50955883')) {function content_5708ae01b4f2d5_50955883($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'D:\\Stephan\\phpstudy\\WWW\\sunnycms\\application\\libraries\\Smarty\\plugins\\function.html_options.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>后台管理系统</title>

    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="<?php echo @constant('RES_PATH');?>
/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo @constant('RES_PATH');?>
/assets/font-awesome/css/font-awesome.min.css" />

    <!-- page specific plugin styles -->

    <!--<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />-->

    <link rel="stylesheet" href="<?php echo @constant('RES_PATH');?>
/assets/css/jquery-ui.custom.min.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="<?php echo @constant('RES_PATH');?>
/assets/css/ace.min.css" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="<?php echo @constant('RES_PATH');?>
/assets/css/ace-part2.min.css" />
    <![endif]-->
    <link rel="stylesheet" href="<?php echo @constant('RES_PATH');?>
/assets/css/ace-skins.min.css" />
    <link rel="stylesheet" href="<?php echo @constant('RES_PATH');?>
/assets/css/ace-rtl.min.css" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="<?php echo @constant('RES_PATH');?>
/assets/css/ace-ie.min.css" />
    <![endif]-->
    <link rel="stylesheet" href="<?php echo @constant('RES_PATH');?>
/assets/css/admin.css" />
    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="<?php echo @constant('RES_PATH');?>
/assets/js/ace-extra.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="<?php echo @constant('RES_PATH');?>
/assets/js/html5shiv.js"></script>
    <script src="<?php echo @constant('RES_PATH');?>
/assets/js/respond.min.js"></script>
    <![endif]-->

















    

    

</head>

<body class="no-skin">




<div class="main-content">
    <div class="breadcrumbs" id="breadcrumbs">


        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="index.php?c=main&m=welcome">主页</a>
            </li>


            
<li><a href="index.php?c=sys_weixin">采集微信</a></li>
<li class="active">设置</li>

        </ul><!-- /.breadcrumb -->

        <div class="nav-search" id="nav-search">
            <button class="btn btn-light btn-xs btn-app re" onclick="self.location.reload()">
                <i class="ace-icon fa fa-refresh bigger-120"></i>
            </button>
        </div><!-- /.nav-search -->
    </div>

    <div class="page-content">

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                

<h3 class="lighter block green">采集设置</h3>

<form class="form-horizontal" id="validation-form" method="post" role="form" action="index.php?c=sys_weixin&m=add">
    <?php /*  Call merged included template "inc_form_result.html" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("inc_form_result.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '28885708ae019a1687-63443356');
content_5708ae01aaf3b2_21984192($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "inc_form_result.html" */?>
        <div class="form-group">
        <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="class_id">选择行业:</label>
        <div class="col-xs-12 col-sm-9">
            <div class="clearfix">
                <select name="class_id" id="class_id" class="col-xs-12 col-sm-6">
                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['classlist']->value,'selected'=>$_smarty_tpl->tpl_vars['entity']->value['class_id']),$_smarty_tpl);?>

                </select>
            </div>
        </div>
    </div>
    <div class="space-2"></div>

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="keyword">关键词:</label>

        <div class="col-xs-12 col-sm-9">
            <div class="clearfix">
                <input type="text" name="keyword" id="keyword" class="col-xs-12 col-sm-6"
                        value="" />
            </div>
        </div>
    </div>

    <div class="space-2"></div>

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="totalPage">公告号采集数:</label>

        <div class="col-xs-12 col-sm-9">
            <div class="clearfix">
                <select name="totalPage" id="totalPage" class="col-xs-12 col-sm-6">
                  <option value="1">10个</option>
                  <option value="2">20个</option>
                  <option value="3">30个</option>
                  <option value="4">40个</option>
                  <option value="5">50个</option>
                  <option value="6">60个</option>
                  <option value="7">70个</option>
                  <option value="8">80个</option>
                  <option value="9">90个</option>
                  <option value="10">100个</option>
                  <option value="15">150个</option>
                  <option value="20">200个</option>
                  <option value="30">300个</option>
                  <option value="60">600个</option>
                  <option value="100">1000个</option>
                </select>
            </div>
        </div>
    </div>



    <div class="space-2"></div>

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="newsPageSize">内容采集数:</label>

        <div class="col-xs-12 col-sm-9">
            <div class="clearfix">
                <select name="newsPageSize" id="newsPageSize" class="col-xs-12 col-sm-6">
                  <option value="1">10条</option>
                  <option value="2">20条</option>
                  <option value="3">30条</option>
                  <option value="4">40条</option>
                  <option value="5">50条</option>
                  <option value="6">60条</option>
                  <option value="7">70条</option>
                  <option value="8">80条</option>
                  <option value="9">90条</option>
                  <option value="10">100条</option>
                  <option value="20">200条</option>
                  <option value="30">300条</option>
                  <option value="100">1000条</option>
                  <option value="-1">不限</option>
                </select>
            </div>
        </div>
    </div>


  

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="status">启用代理:</label>

        <div class="col-xs-12 col-sm-9">
            <div class="clearfix">
                <label>
                    <input name="status" id="status" class="ace ace-switch ace-switch-6" type="checkbox"
                           checked value="1"/>
                    <span class="lbl"></span>
                </label>
            </div>
        </div>
    </div>

      <div class="form-group">
        <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="line">代理线路:</label>

        <div class="col-xs-12 col-sm-9">
            <div class="clearfix">
                <label>
                    <input type="radio"  id="line1" name="line" value="1" checked>线路1
                    <input type="radio"  id="line2" name="line" value="2">线路2
                    <span class="lbl"></span>
                </label>
            </div>
        </div>
    </div>


    <div class="clearfix form-actions">
        <div class="col-md-offset-3 col-md-9">
            <button class="btn btn-info" type="submit">
                <i class="ace-icon fa fa-check bigger-110"></i>
                提交
            </button>

            &nbsp; &nbsp; &nbsp;
            <a class="btn" href="index.php?c=sys_weixin">
                <i class="ace-icon fa fa-undo bigger-110"></i>
                返回
            </a>
        </div>
    </div>

<div class="clearfix form-actions">
 <div class="col-md-offset-3 col-md-9">
 <?php echo $_smarty_tpl->tpl_vars['result']->value;?>

 </div>
</div>

</form>



                <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
</div>


<!-- basic scripts -->

<!--[if !IE]> -->
<script src="<?php echo @constant('RES_PATH');?>
/assets/js/jquery.2.1.0.min.js"></script>
<!-- <![endif]-->

<!--[if IE]>
<script src="<?php echo @constant('RES_PATH');?>
/assets/js/jquery.1.11.min.js"></script>
<![endif]-->

<!--[if !IE]> -->
<script type="text/javascript">
    window.jQuery || document.write("<script src='<?php echo @constant('RES_PATH');?>
/assets/js/jquery.min.js'>"+"<"+"/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
    window.jQuery || document.write("<script src='<?php echo @constant('RES_PATH');?>
/assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->



<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo @constant('RES_PATH');?>
/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>

<script src="<?php echo @constant('RES_PATH');?>
/assets/js/jquery-ui.custom.min.js"></script>

<script src="<?php echo @constant('RES_PATH');?>
/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo @constant('RES_PATH');?>
/assets/js/jqGrid/jquery.jqGrid.min.js"></script>

<!-- page specific plugin scripts -->
<script src="<?php echo @constant('RES_PATH');?>
/assets/js/jquery.validate.min.js"></script>
<!--<script src="<?php echo @constant('RES_PATH');?>
/assets/js/jquery.nestable.min.js"></script>-->
<!-- ace scripts -->

<script src="<?php echo @constant('RES_PATH');?>
/assets/js/ace-elements.min.js"></script>
<script src="<?php echo @constant('RES_PATH');?>
/assets/js/ace.min.js"></script>

<script>
      $(function(){

          jQuery.validator.addMethod("keyword", function (value, element) {
              return this.optional(element) || /^[_a-zA-Z0-9]+$/.test(value);
          }, "账号只能包含数字，字母，下划线");
          $('#validation-form').validate({
              errorElement: 'div',
              errorClass: 'help-block',
              focusInvalid: false,
              rules: {
                  email: {
                      required: true,
                      email:true
                  },
                  password: {
                  <?php if ($_REQUEST['m']=='add') {?>required: true,<?php }?>
                      minlength: 6,
                      maxlength: 15
                  },

                  keyword: {
                      required: true,
                      minlength: 1,
                      maxlength: 15,
                      username: 'required'
                  }
                  ,

                  truename: {
                      required: true,
                      minlength: 2,
                      maxlength: 15
                  }
              },

              messages: {
                  email: {
                      required: "请输入邮箱",
                      email: "请输入正确邮箱格式"
                  },
                  password: {
                      required: "请输入密码",
                      minlength: "密码需要6-12个字符",
                      maxlength: "密码需要6-15个字符"
                  },
                  username: {
                      required: "请输入账号",
                      minlength: "账号需要3-15个字符",
                      maxlength: "账号需要3-15个字符"
                  },
                  truename: {
                      required: "请输入姓名",
                      minlength: "姓名需要2-15个字符",
                      maxlength: "姓名需要2-15个字符"
                  }
              },



              highlight: function (e) {
                  $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
              },

              success: function (e) {
                  $(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
                  $(e).remove();
              },

              errorPlacement: function (error, element) {
                  if(element.is(':checkbox') || element.is(':radio')) {
                      var controls = element.closest('div[class*="col-"]');
                      if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
                      else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
                  }
                  else if(element.is('.select2')) {
                      error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
                  }
                  else if(element.is('.chosen-select')) {
                      error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
                  }
                  else error.insertAfter(element.parent());
              }


          });
      });
</script>

<!-- <script type="text/javascript" src="/resources/uploadify/jquery.uploadify.min.js"></script> -->
</body>
</html>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.18, created on 2016-04-09 15:23:45
         compiled from "application\views\inc_form_result.html" */ ?>
<?php if ($_valid && !is_callable('content_5708ae01aaf3b2_21984192')) {function content_5708ae01aaf3b2_21984192($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
<div class="alert alert-danger">
    <strong>
        <i class="icon-remove"></i>
        <?php echo (($tmp = @$_smarty_tpl->tpl_vars['do_result']->value)===null||$tmp==='' ? '' : $tmp);?>

    </strong>
</div>
<?php } elseif (isset($_smarty_tpl->tpl_vars['do_result']->value)) {?>
<div class="alert alert-block alert-success">
    <strong>
        <i class="icon-ok"></i>
        <?php echo (($tmp = @$_smarty_tpl->tpl_vars['do_result']->value)===null||$tmp==='' ? '' : $tmp);?>

    </strong>
</div>
<?php }?>


<?php }} ?>
