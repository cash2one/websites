<?php /* Smarty version Smarty-3.1.18, created on 2016-11-23 17:15:21
         compiled from "application\views\sys_cms_setting.html" */ ?>
<?php /*%%SmartyHeaderCode:889458355e297ac537-51250219%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7de7cb85715d3e885c58fcd642c29596f3753118' => 
    array (
      0 => 'application\\views\\sys_cms_setting.html',
      1 => 1461244192,
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
  'nocache_hash' => '889458355e297ac537-51250219',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_58355e2aaa64f9_38839133',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58355e2aaa64f9_38839133')) {function content_58355e2aaa64f9_38839133($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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


            
<li><a href="index.php?c=cms_setting">站点设置</a></li>
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
                

<script src="<?php echo dirname('__FILE__');?>
/skin/weixin/js/jquery-1.8.3.min.js"></script>


<form class="form-horizontal" id="validation-form" method="post" role="form">
    <?php /*  Call merged included template "inc_form_result.html" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("inc_form_result.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '889458355e297ac537-51250219');
content_58355e2a09fc24_86910350($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "inc_form_result.html" */?>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="domainname">站点域名:</label>

        <div class="col-xs-12 col-sm-9">
            <div class="clearfix">
                <input type="text" name="domainname" id="domainname" class="col-xs-12 col-sm-6"
                        value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['setting']->value['domainname'])===null||$tmp==='' ? '' : $tmp);?>
" />
            </div>例： http://www.sunnycms.com
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="pcdomain">PC域名:</label>

        <div class="col-xs-12 col-sm-9">
            <div class="clearfix">
                <input type="text" name="pcdomain" id="pcdomain" class="col-xs-12 col-sm-6"
                        value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['setting']->value['pcdomain'])===null||$tmp==='' ? '' : $tmp);?>
" />
            </div>例： http://www.sunnycms.com
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="mdomain">手机端域名:</label>

        <div class="col-xs-12 col-sm-9">
            <div class="clearfix">
                <input type="text" name="mdomain" id="mdomain" class="col-xs-12 col-sm-6"
                        value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['setting']->value['mdomain'])===null||$tmp==='' ? '' : $tmp);?>
" />
            </div>例： http://m.sunnycms.com
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="urltype">URL结构:</label>

        <div class="col-xs-12 col-sm-9">
            <div class="clearfix">
                <input type="text" name="urltype" id="urltype" class="col-xs-12 col-sm-6"
                        value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['setting']->value['urltype'])===null||$tmp==='' ? '0' : $tmp);?>
" />
            </div>0: http://www.sunnycms.com/cat-1.html   1: http://www.sunnycms.com/xinwen/
        </div>
    </div>


    <div class="space-2"></div>

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="skin">皮肤:</label>

        <div class="col-xs-12 col-sm-9">
            <div class="clearfix">
                <input type="text" name="skin" id="skin" class="col-xs-12 col-sm-6"
                        value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['setting']->value['skin'])===null||$tmp==='' ? '' : $tmp);?>
" />
            </div>
        </div>
    </div>

    <div class="space-2"></div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="sitename">站点名称:</label>

        <div class="col-xs-12 col-sm-9">
            <div class="clearfix">
                <input type="text" name="sitename" id="sitename" class="col-xs-12 col-sm-6"
                        value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['setting']->value['sitename'])===null||$tmp==='' ? '' : $tmp);?>
" />
            </div>
        </div>
    </div>

    <div class="space-2"></div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="indextitle">首页标题:</label>

        <div class="col-xs-12 col-sm-9">
            <div class="clearfix">
                <input type="text" name="indextitle" id="indextitle" class="col-xs-12 col-sm-6"
                        value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['setting']->value['indextitle'])===null||$tmp==='' ? '' : $tmp);?>
" />
            </div>
        </div>
    </div>

    <div class="space-2"></div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="keywords">关键词:</label>

        <div class="col-xs-12 col-sm-9">
            <div class="clearfix">
                <input type="text" name="keywords" id="keywords" class="col-xs-12 col-sm-6"
                        value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['setting']->value['keywords'])===null||$tmp==='' ? '' : $tmp);?>
" />
            </div>
        </div>
    </div>



    <div class="hr hr-dotted"></div>

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="description">描述:</label>

        <div class="col-xs-12 col-sm-9">
            <div class="clearfix">
                <textarea name="description" id="description" class="col-xs-12 col-sm-6"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['setting']->value['description'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>
            </div>
        </div>
    </div>

    <div class="space-2"></div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="beian">备案:</label>

        <div class="col-xs-12 col-sm-9">
            <div class="clearfix">
                <textarea name="beian" id="beian" class="col-xs-12 col-sm-6"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['setting']->value['beian'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>
            </div>
        </div>
    </div>

    <div class="space-2"></div>

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="zhanzhangtong">站长统计</label>

        <div class="col-xs-12 col-sm-9">
            <div class="clearfix">
             <textarea name="zhanzhangtong" id="zhanzhangtong" class="col-xs-12 col-sm-6"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['setting']->value['zhanzhangtong'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>
            </div>
        </div>
    </div>

    <div class="space-2"></div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="bottom">底部信息</label>

        <div class="col-xs-12 col-sm-9">
            <div class="clearfix">
             <textarea name="bottom" id="bottom" class="col-xs-12 col-sm-6"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['setting']->value['bottom'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>
            </div>
        </div>
    </div>

    <div class="space-2"></div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="search">搜索框</label>

        <div class="col-xs-12 col-sm-9">
            <div class="clearfix">
             <textarea name="search" id="search" class="col-xs-12 col-sm-6"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['setting']->value['search'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>
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
            <a class="btn" href="index.php?c=cms_contentMan">
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

          jQuery.validator.addMethod("username", function (value, element) {
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

                  username: {
                      required: true,
                      minlength: 3,
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
<?php /* Smarty version Smarty-3.1.18, created on 2016-11-23 17:15:22
         compiled from "application\views\inc_form_result.html" */ ?>
<?php if ($_valid && !is_callable('content_58355e2a09fc24_86910350')) {function content_58355e2a09fc24_86910350($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
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
