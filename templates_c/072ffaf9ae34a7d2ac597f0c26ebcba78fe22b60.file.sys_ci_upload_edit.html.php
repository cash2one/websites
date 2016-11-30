<?php /* Smarty version Smarty-3.1.18, created on 2016-04-11 23:42:13
         compiled from "application\views\sys_ci_upload_edit.html" */ ?>
<?php /*%%SmartyHeaderCode:3990570bc5d5deb365-24456252%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '072ffaf9ae34a7d2ac597f0c26ebcba78fe22b60' => 
    array (
      0 => 'application\\views\\sys_ci_upload_edit.html',
      1 => 1460386497,
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
  'nocache_hash' => '3990570bc5d5deb365-24456252',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_570bc5d6050144_41875207',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_570bc5d6050144_41875207')) {function content_570bc5d6050144_41875207($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'D:\\Stephan\\phpstudy\\WWW\\sunnycms\\application\\libraries\\Smarty\\plugins\\function.html_options.php';
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


            
<li><a href="index.php?c=sys_ciupload">上传/导出词库</a></li>
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
                

<h3 class="lighter block green">上传</h3>

<form class="form-horizontal" id="validation-form" method="post" role="form" action="index.php?c=sys_ciupload&m=upload" enctype="multipart/form-data">
    <?php /*  Call merged included template "inc_form_result.html" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("inc_form_result.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '3990570bc5d5deb365-24456252');
content_570bc5d5eecc26_22029342($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "inc_form_result.html" */?>
        <div class="form-group">
        <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="class_id">选择分类:</label>
        <div class="col-xs-12 col-sm-9">
            <div class="clearfix">
                <select name="cid" id="cid" class="col-xs-12 col-sm-6">
                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['classlist']->value),$_smarty_tpl);?>

                </select>
            </div>
        </div>
    </div>
    <div class="space-2"></div>


    <div class="space-2"></div>
<div class="form-group">

<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="keyword">Filename:</label>
        <div class="col-xs-12 col-sm-9">
            <div class="clearfix">
            <input type="file" name="file" id="file" /> 

            </div>
        </div>

</div>


    <div class="clearfix form-actions">
        <div class="col-md-offset-3 col-md-9">
            <button class="btn btn-info" type="submit">
                <i class="ace-icon fa fa-check bigger-110"></i>
                上传
            </button>
        </div>
    </div>



</form>

<h3 class="lighter block green">导出</h3>
<form class="form-horizontal" method="post" role="form" action="index.php?c=sys_ciupload&m=download">
        <div class="form-group">
        <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="class_id">选择分类:</label>
        <div class="col-xs-12 col-sm-9">
            <div class="clearfix">
<?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['catlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
  <label class="col-xs-1 col-sm-2" >
      <input name="cid[]" class="ace ace-checkbox-2" type="checkbox"  parent_id="" id="cid_<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
">
      <span class="lbl"><?php echo $_smarty_tpl->tpl_vars['cat']->value['name'];?>
</span>
  </label>
 <?php } ?>

            </div>
        </div>
    </div>
    <div class="space-2"></div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="keyword">导出数量:</label>

        <div class="col-xs-12 col-sm-9">
            <div class="clearfix">
                <input type="text" name="total" id="total" class="col-xs-12 col-sm-6"
                        value="100" />(每个分类导出词的数量)
            </div>
        </div>
    </div>

        <div class="clearfix form-actions">
        <div class="col-md-offset-3 col-md-9">
            <button class="btn btn-info" type="submit">
                <i class="ace-icon fa fa-undo bigger-110"></i>
                导出
            </button>

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

          $("#download").on('click',function(){
              var cid=$("#cid").val();
              var total = $("#total").val();
              var query = '&cid='+cid+'&total='+total+'&download=1';
              location.href='index.php?c=sys_ciupload&m=download'+query;


          });

         
        });

</script>

<!-- <script type="text/javascript" src="/resources/uploadify/jquery.uploadify.min.js"></script> -->
</body>
</html>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.18, created on 2016-04-11 23:42:13
         compiled from "application\views\inc_form_result.html" */ ?>
<?php if ($_valid && !is_callable('content_570bc5d5eecc26_22029342')) {function content_570bc5d5eecc26_22029342($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
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
