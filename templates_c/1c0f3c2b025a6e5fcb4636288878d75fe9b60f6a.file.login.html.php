<?php /* Smarty version Smarty-3.1.18, created on 2016-12-08 22:55:51
         compiled from "application\views\login.html" */ ?>
<?php /*%%SmartyHeaderCode:1625058497477092c47-94701007%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c0f3c2b025a6e5fcb4636288878d75fe9b60f6a' => 
    array (
      0 => 'application\\views\\login.html',
      1 => 1480611411,
      2 => 'file',
    ),
    'f165530f262ead3194e3da74319d75271efdfbb5' => 
    array (
      0 => 'application\\views\\base.html',
      1 => 1480611411,
      2 => 'file',
    ),
    '8eb80540d977b61863eaa84b9076238b5bc9835e' => 
    array (
      0 => 'application\\views\\inc_form_result.html',
      1 => 1480611411,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1625058497477092c47-94701007',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_58497477807d95_86768030',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58497477807d95_86768030')) {function content_58497477807d95_86768030($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
    body {
        overflow: hidden;
    }

    .login-layout {
        height: 100%;
    }
</style>


</head>

<body class="no-skin">




<div class="login-layout">

    <div class="main-container">
        <div class="main-content">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="login-container">
                        <div class="center">
                            <h1>
                                <i class="ace-icon fa fa-gears green"></i>
                                <span class="red">APP</span>
                                <span class="white" id="id-text2">管理系统</span>
                            </h1>
                            <h4 class="blue" id="id-company-text">&copy; Company Name</h4>
                        </div>

                        <div class="space-6"></div>

                        <div class="position-relative">
                            <div id="login-box" class="login-box visible widget-box no-border">
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <h4 class="header blue lighter bigger">
                                            <i class="ace-icon fa fa-coffee green"></i>
                                            请输入账号
                                        </h4>

                                        <div class="space-6"></div>

                                        <form action="index.php?c=main&m=login" method="post" >
                                        <?php /*  Call merged included template "inc_form_result.html" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("inc_form_result.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '1625058497477092c47-94701007');
content_5849747761fc54_10036257($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "inc_form_result.html" */?>
                                            <fieldset>
                                                <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control"
                                                                   placeholder="Username" name="username" />
															<i class="ace-icon fa fa-user" style="margin-top: 2px"></i>
														</span>
                                                </label>

                                                <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control"
                                                                   placeholder="Password" name="password"/>
															<i class="ace-icon fa fa-lock"
                                                               style="margin-right: 3px;margin-top: 2px"></i>
														</span>
                                                </label>

                                                <div class="space"></div>

                                                <div class="clearfix">
                                                    <!--<label class="inline">-->
                                                    <!--<input type="checkbox" class="ace" />-->
                                                    <!--<span class="lbl"> Remember Me</span>-->
                                                    <!--</label>-->

                                                    <button type="submit"
                                                            class="width-35 pull-right btn btn-sm btn-primary">
                                                        <i class="ace-icon fa fa-key"></i>
                                                        <span class="bigger-110">登录</span>
                                                    </button>
                                                </div>

                                                <div class="space-4"></div>
                                            </fieldset>
                                        </form>


                                    </div>
                                    <!-- /.widget-main -->


                                </div>
                                <!-- /.widget-body -->
                            </div>
                            <!-- /.login-box -->


                        </div>
                        <!-- /.position-relative -->


                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.main-content -->
    </div>
    <!-- /.main-container -->

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



<!-- <script type="text/javascript" src="/resources/uploadify/jquery.uploadify.min.js"></script> -->
</body>
</html>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.18, created on 2016-12-08 22:55:51
         compiled from "application\views\inc_form_result.html" */ ?>
<?php if ($_valid && !is_callable('content_5849747761fc54_10036257')) {function content_5849747761fc54_10036257($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
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
