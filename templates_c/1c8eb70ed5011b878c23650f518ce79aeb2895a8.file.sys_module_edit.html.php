<?php /* Smarty version Smarty-3.1.18, created on 2015-06-09 16:07:11
         compiled from "application/views/sys_module_edit.html" */ ?>
<?php /*%%SmartyHeaderCode:42428020155769eafb96694-21343698%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c8eb70ed5011b878c23650f518ce79aeb2895a8' => 
    array (
      0 => 'application/views/sys_module_edit.html',
      1 => 1426823791,
      2 => 'file',
    ),
    '614eaa753400c6c1d2f3dbb42bfd183d8d7a854f' => 
    array (
      0 => 'application/views/base_content.html',
      1 => 1426823787,
      2 => 'file',
    ),
    '9983591074296b35844f91ae042cd15f8192823d' => 
    array (
      0 => 'application/views/base.html',
      1 => 1426823787,
      2 => 'file',
    ),
    'da897c8015b5485b545e3646394617514390af41' => 
    array (
      0 => 'application/views/inc_form_result.html',
      1 => 1426823788,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '42428020155769eafb96694-21343698',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_55769eb07a1251_16068916',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55769eb07a1251_16068916')) {function content_55769eb07a1251_16068916($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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


            
<li><a href="index.php?c=sys_module">模块管理</a></li>
<li class="active">编辑</li>

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
                

<h3 class="lighter block green">输入模块信息</h3>

<form class="form-horizontal" id="validation-form" method="post" role="form">
    <?php /*  Call merged included template "inc_form_result.html" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("inc_form_result.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '42428020155769eafb96694-21343698');
content_55769eb00e21b0_92917622($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "inc_form_result.html" */?>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="module_name">模块名称:</label>

        <div class="col-xs-12 col-sm-9">
            <div class="clearfix">
                <input type="text" name="module_name" id="module_name" class="col-xs-12 col-sm-6"
                       value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['entity']->value['module_name'])===null||$tmp==='' ? '' : $tmp);?>
" />
            </div>
        </div>
    </div>
    <div class="form-group <?php if (!empty($_REQUEST['parent_id'])) {?>hidden<?php }?>">
        <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="module_icon">模块图标:</label>

        <div class="col-xs-12 col-sm-9">
            <div class="clearfix">
                <input type="text" name="module_icon" id="module_icon" class="col-xs-12 col-sm-6"
                       value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['entity']->value['module_icon'])===null||$tmp==='' ? '' : $tmp);?>
" />
            </div>
        </div>
    </div>

    <div class="form-group <?php if (empty($_REQUEST['parent_id'])) {?>hidden<?php }?>">
        <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="module_resource">模块地址:</label>

        <div class="col-xs-12 col-sm-9">
            <div class="clearfix">
                <input type="text" name="module_resource" id="module_resource" class="col-xs-12 col-sm-6"
                       value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['entity']->value['module_resource'])===null||$tmp==='' ? '' : $tmp);?>
" />
            </div>
        </div>
    </div>

        <input type="hidden" name="module_type" value="<?php echo (($tmp = @$_REQUEST['module_type'])===null||$tmp==='' ? 'module' : $tmp);?>
">

    <input type="hidden" name="module_parent_id" value="<?php echo (($tmp = @$_REQUEST['parent_id'])===null||$tmp==='' ? '' : $tmp);?>
">
    <div class="clearfix form-actions">
        <div class="col-md-offset-3 col-md-9">
            <button class="btn btn-info" type="submit">
                <i class="ace-icon fa fa-check bigger-110"></i>
                提交
            </button>

            &nbsp; &nbsp; &nbsp;
            <a class="btn" href="index.php?c=sys_module">
                <i class="ace-icon fa fa-undo bigger-110"></i>
                返回
            </a>
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


          $('#validation-form').validate({
              errorElement: 'div',
              errorClass: 'help-block',
              focusInvalid: false,
              rules: {

                  module_name: {
                      required: true,
                      minlength: 3,
                      maxlength: 15
                  }

              },

              messages: {

                  module_name: {
                      required: "请输入模块名",
                      minlength: "模块名需要3-15个字符",
                      maxlength: "模块名需要3-15个字符"
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
<?php /* Smarty version Smarty-3.1.18, created on 2015-06-09 16:07:12
         compiled from "application/views/inc_form_result.html" */ ?>
<?php if ($_valid && !is_callable('content_55769eb00e21b0_92917622')) {function content_55769eb00e21b0_92917622($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
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
