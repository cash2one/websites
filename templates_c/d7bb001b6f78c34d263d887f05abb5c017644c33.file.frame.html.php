<?php /* Smarty version Smarty-3.1.18, created on 2015-07-28 18:48:02
         compiled from "application/views/frame.html" */ ?>
<?php /*%%SmartyHeaderCode:109616063755b75de2dd61f4-81855570%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd7bb001b6f78c34d263d887f05abb5c017644c33' => 
    array (
      0 => 'application/views/frame.html',
      1 => 1426823788,
      2 => 'file',
    ),
    '9983591074296b35844f91ae042cd15f8192823d' => 
    array (
      0 => 'application/views/base.html',
      1 => 1426823787,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '109616063755b75de2dd61f4-81855570',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_55b75de3320de7_15928053',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55b75de3320de7_15928053')) {function content_55b75de3320de7_15928053($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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

















    
<style>
    html,body{
        margin: 0;
        padding: 0;
        min-width: 500px;
    }
    iframe {
        border: 0px;
    }
    table{

        width: 100%;
        height: 100%;
        border-spacing: 0;
    }
</style>


</head>

<body class="no-skin">





<table style="height: 100%">
    <tr  style="height: 41px;min-width: 500px">
        <td colspan="2">
            <div id="navbar" class="navbar navbar-default">


                <div class="navbar-container" id="navbar-container"  style="padding-right: 0">


                    <div class="navbar-header pull-left">

                        <a href="grid.html#" class="navbar-brand">
                            <small>
                                <i class="fa fa-wrench"></i>
                                后台管理系统
                            </small>
                        </a>
                    </div>

                    <div class="navbar-buttons navbar-header pull-right" role="navigation">
                        <ul class="nav ace-nav">

                        <li><a target="_blank" href="/index.html">网站首页</a></li>
                        <li class="light-blue" style="display:none"><a href="javascript:;">欢迎,管理员</a></li>
                            <li class="light-blue" >

                                <a data-toggle="dropdown" href="grid.html#" class="dropdown-toggle">


                                        欢迎,管理员
                                        
    

                                    <i class="ace-icon fa fa-caret-down"></i>
                                </a>

                                <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close"
                                    style="margin-right: 6px">

                                    <li>
                                        <a href="index.php?c=sys_user&m=password" target="mainFrame">
                                            <i class="ace-icon fa fa-key"></i>
                                            修改密码
                                        </a>
                                    </li>

                                    <li class="divider"></li>

                                    <li>
                                        <a href="index.php?c=main&m=logout" target="top">
                                            <i class="ace-icon fa fa-power-off"></i>
                                            退出
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div><!-- /.navbar-container -->

            </div>
        </td>

    </tr>
    <tr>
        <td style="width: 180px;border-right: 1px solid #438eb9;height: 100%">
            <iframe width="100%" height="100%" src="index.php?c=main&m=left"></iframe></td>
        <td><iframe id="mainFrame" name="mainFrame" width="100%" height="100%" src="index.php?c=main&m=welcome"></iframe></td>
    </tr>
</table>


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



<!-- <script type="text/javascript" src="/resources/uploadify/jquery.uploadify.min.js"></script> -->
</body>
</html>
<?php }} ?>
