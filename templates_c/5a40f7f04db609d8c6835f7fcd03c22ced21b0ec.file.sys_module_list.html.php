<?php /* Smarty version Smarty-3.1.18, created on 2016-04-11 23:23:09
         compiled from "application\views\sys_module_list.html" */ ?>
<?php /*%%SmartyHeaderCode:26270570bc15d8fb2b3-83540862%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5a40f7f04db609d8c6835f7fcd03c22ced21b0ec' => 
    array (
      0 => 'application\\views\\sys_module_list.html',
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
    '86cc578c30958a48e49fd825d849a4d8f75b7329' => 
    array (
      0 => 'application\\views\\inc_gritter.html',
      1 => 1458201760,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26270570bc15d8fb2b3-83540862',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_570bc15dae5e02_15656098',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_570bc15dae5e02_15656098')) {function content_570bc15dae5e02_15656098($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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


            
<li class="active">模块管理</li>

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
                

<div class="page-header">

    <div class="row">
        <div class="col-xs-1" style="min-width: 80px">
            <a href="index.php?c=sys_module&m=add" class="btn btn-success btn-sm">
                <i class="ace-icon fa fa-plus bigger-110"></i>新建
            </a>


        </div>
        <div class="col-xs-1" style="min-width: 80px">


            <a id="sort_save" href="javascript:saveSort()" class="btn  btn-sm disabled">
                <i class="ace-icon fa fa-save bigger-110"></i>保存排序
            </a>
        </div>


    </div>


</div>

<table id="myTable" class="table table-striped table-bordered table-hover">
    <thead>
    <tr>


        <th>模块名称</th>
        <th style="width: 90px">操作</th>
    </tr>
    </thead>

    <tbody id="sortable1">
    <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['value']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['value']->index++;
?>
    <tr>
        <td colspan="2">


            <table class="table table-striped table-bordered table-hover" style="margin: 0">
                <tr>

                    <td><a href="#" class="portlet-header" module="module" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
"><i
                            class="ace-icon fa fa-arrows bigger-110"></i> <?php echo $_smarty_tpl->tpl_vars['value']->value['module_name'];?>
</a></td>


                    <td style="width: 90px">
                        <div class="action-buttons">

                            <a class="orange"
                               href="index.php?c=sys_module&m=add&parent_id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
&module_type=page"
                               title="添加页面">
                                <i class="ace-icon fa fa-plus bigger-130"></i>
                            </a>

                            <a class="green" href="index.php?c=sys_module&m=edit&id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
">
                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                            </a>

                            <div class="inline position-relative">

                                <a href="#" class="red dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                    <i class="ace-icon fa fa-trash-o icon-only bigger-130"></i>
                                </a>

                                <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                    <li>
                                        <a href="javascript:void(0)" onclick="deleteEntity('<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
',this)"
                                           class="tooltip-error" data-rel="tooltip" title=""
                                           data-original-title="Delete">
                                <span class="red">
                                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </td>
                </tr>
                <?php if (!empty($_smarty_tpl->tpl_vars['value']->value['children'])>0) {?>

                <tr>
                    <td colspan="2">
                        <table class="table table-striped table-bordered"
                               style="margin-bottom: 0px;width: 90%;float: right">

                            <tbody id="sortable_<?php echo $_smarty_tpl->tpl_vars['value']->index;?>
">
                            <?php  $_smarty_tpl->tpl_vars['page'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['page']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['value']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['page']->key => $_smarty_tpl->tpl_vars['page']->value) {
$_smarty_tpl->tpl_vars['page']->_loop = true;
?>
                            <tr>
                                <td>


                                    <table class="table table-striped table-bordered" style="margin: 0">
                                        <tr>
                                            <td><a href="#" class="portlet-header1" module="page" value="<?php echo $_smarty_tpl->tpl_vars['page']->value['id'];?>
"><i
                                                    class="ace-icon fa fa-arrows bigger-110"></i> <?php echo $_smarty_tpl->tpl_vars['page']->value['module_name'];?>
</a>
                                            </td>

                                            <td>
                                                <?php echo $_smarty_tpl->tpl_vars['page']->value['module_resource'];?>

                                            </td>


                                            <td style="width: 90px">

                                                <div class="action-buttons">

                                                    <a class="orange"
                                                       href="index.php?c=sys_module&m=add&parent_id=<?php echo $_smarty_tpl->tpl_vars['page']->value['module_parent_id'];?>
&module_type=action"
                                                       title="添加功能">
                                                        <i class="ace-icon fa fa-plus bigger-130"></i>
                                                    </a>

                                                    <a class="green"
                                                       href="index.php?c=sys_module&m=edit&id=<?php echo $_smarty_tpl->tpl_vars['page']->value['id'];?>
&module_type=action&parent_id=<?php echo $_smarty_tpl->tpl_vars['page']->value['module_parent_id'];?>
">
                                                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                    </a>

                                                    <div class="inline position-relative">

                                                        <a href="#" class="red dropdown-toggle" data-toggle="dropdown"
                                                           data-position="auto">
                                                            <i class="ace-icon fa fa-trash-o icon-only bigger-130"></i>
                                                        </a>

                                                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                            <li>
                                                                <a href="javascript:void(0)"
                                                                   onclick="deleteEntity('<?php echo $_smarty_tpl->tpl_vars['page']->value['id'];?>
',this)"
                                                                   class="tooltip-error" data-rel="tooltip" title=""
                                                                   data-original-title="Delete">
                                <span class="red">
                                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                </span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                </div>

                                            </td>
                                        </tr>
                                        <?php if (!empty($_smarty_tpl->tpl_vars['page']->value['children'])>0) {?>
                                        <tr>
                                            <td colspan="3">
                                                <table class="table table-striped table-bordered"
                                                       style="margin-bottom: 0px;width: 90%;float: right">
                                                    <tbody>
                                                    <?php  $_smarty_tpl->tpl_vars['action'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['action']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['page']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['action']->key => $_smarty_tpl->tpl_vars['action']->value) {
$_smarty_tpl->tpl_vars['action']->_loop = true;
?>
                                                    <tr>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['action']->value['module_name'];?>
</td>

                                                        <td>
                                                            <?php echo $_smarty_tpl->tpl_vars['action']->value['module_resource'];?>

                                                        </td>


                                                        <td style="width: 70px">

                                                            <div class="action-buttons">


                                                                <a class="green"
                                                                   href="index.php?c=sys_module&m=edit&id=<?php echo $_smarty_tpl->tpl_vars['action']->value['id'];?>
&parent_id=<?php echo $_smarty_tpl->tpl_vars['action']->value['module_parent_id'];?>
">
                                                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                                </a>

                                                                <div class="inline position-relative">

                                                                    <a href="#" class="red dropdown-toggle"
                                                                       data-toggle="dropdown" data-position="auto">
                                                                        <i class="ace-icon fa fa-trash-o icon-only bigger-130"></i>
                                                                    </a>

                                                                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                                        <li>
                                                                            <a href="javascript:void(0)"
                                                                               onclick="deleteEntity('<?php echo $_smarty_tpl->tpl_vars['action']->value['id'];?>
',this)"
                                                                               class="tooltip-error" data-rel="tooltip"
                                                                               title="" data-original-title="Delete">
                                <span class="red">
                                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                </span>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>

                                                            </div>

                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <?php }?>
                                    </table>


                                </td>
                            </tr>
                            <?php } ?>

                            </tbody>
                        </table>
                    </td>
                </tr>
            </table>


        </td>
    </tr>

    <?php }?>

    <?php }
if (!$_smarty_tpl->tpl_vars['value']->_loop) {
?>
    <?php /*  Call merged included template "inc_gritter.html" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("inc_gritter.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '26270570bc15d8fb2b3-83540862');
content_570bc15da78361_96852517($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "inc_gritter.html" */?>
    <?php } ?>
    </tbody>
</table>



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
    function deleteEntity(id, btn) {


        $.get("index.php?c=sys_module&m=delete&id=" + id, function (r) {
            if (r == '<?php echo @constant('STATUS_SUCCESS');?>
') {
                tr_row = btn.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode
                list_table = tr_row.parentNode;
                list_table.removeChild(tr_row);
            } else {
                alert("删除失败");
            }
        });

    }
    $(function () {
        $("#sortable1").sortable({
            update: function (event, ui) {
                $("#sort_save").removeClass('disabled');
                $("#sort_save").addClass('btn-warning');
            },
            handle: ".portlet-header"
        });
        $('tbody[id^=sortable_]').sortable({
            update: function (event, ui) {
                $("#sort_save").removeClass('disabled');
                $("#sort_save").addClass('btn-warning');
            },
            handle: ".portlet-header1"
        });

//        $( "#sortable" ).disableSelection();
    });
    function saveSort() {

        var idlist = "";
        var s = "";
        var data = {};
        $("#sortable1").find("a[module='module']").each(function () {
            if (idlist != "") {
                s = "|";
            }
            idlist = idlist + s + $(this).attr('value');
        });

        data['module'] = idlist;

        idlist = "";
        s = "";
        $("#sortable1").find("a[module='page']").each(function () {
            if (idlist != "") {
                s = "|";
            }
            idlist = idlist + s + $(this).attr('value');
        });
        data['page'] = idlist;


        $.post("index.php?c=sys_module&m=sort",data, function (r) {

            if (r == '<?php echo @constant('STATUS_SUCCESS');?>
') {

                $("#sort_save").removeClass('btn-warning');
                $("#sort_save").addClass('disabled');
            }else{
                alert("操作失败");
            }
        });
    }
</script>

<!-- <script type="text/javascript" src="/resources/uploadify/jquery.uploadify.min.js"></script> -->
</body>
</html>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.18, created on 2016-04-11 23:23:09
         compiled from "application\views\inc_gritter.html" */ ?>
<?php if ($_valid && !is_callable('content_570bc15da78361_96852517')) {function content_570bc15da78361_96852517($_smarty_tpl) {?><script>

    $(function () {
        $.gritter.add({
            title: '提示',
            text: '没有查到相关记录',
            class_name: 'gritter-warning gritter-center',
            time : 2500
        });
    });
</script><?php }} ?>
