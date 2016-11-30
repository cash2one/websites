<?php /* Smarty version Smarty-3.1.18, created on 2016-04-11 23:42:12
         compiled from "application\views\sys_ci_category_list.html" */ ?>
<?php /*%%SmartyHeaderCode:12490570bc5d47e4267-03794174%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '14fd8944d4c63246af6a153f0abea6b46aa912b0' => 
    array (
      0 => 'application\\views\\sys_ci_category_list.html',
      1 => 1460185416,
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
  'nocache_hash' => '12490570bc5d47e4267-03794174',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_570bc5d4997061_17110662',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_570bc5d4997061_17110662')) {function content_570bc5d4997061_17110662($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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


            
<li class="active">词分类管理</li>

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
        <div class="col-xs-1"  style="min-width: 80px">
            <a href="index.php?c=sys_cicategory&m=add" class="btn btn-success btn-sm">
                <i class="ace-icon fa fa-plus bigger-110"></i>新建
            </a>
        </div>

        <div class="col-xs-8">
            <form class="form-inline" style="width: 300px" method="post">

                <div class="input-group">
                    <input type="text" class="form-control search-query" name="keywords" placeholder="姓名">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-purple btn-sm">
                                查询
                                <i class="ace-icon fa fa-search icon-on-right bigger-110"></i>
                            </button>
                        </span>
                </div>
            </form>
        </div>
    </div>


</div>

<table id="sample-table-2" class="table table-striped table-bordered table-hover">
    <thead>
    <tr>


        <th>名称</th>
        <th>模型</th>
        <th>描述</th>
        <th>排序</th>
        <th>开启</th>
        <th style="width: 70px">操作</th>
    </tr>
    </thead>

    <tbody>
    <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
    <tr>

        <td><?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
</td>
        <td><?php if ($_smarty_tpl->tpl_vars['value']->value['model']==1) {?>视频<?php } elseif ($_smarty_tpl->tpl_vars['value']->value['model']==0) {?>文章<?php }?> </td>
        <td><?php echo $_smarty_tpl->tpl_vars['value']->value['description'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['value']->value['sort'];?>
</td>
        <td><label>
            <input name="isshow" id="isshow" class="ace ace-switch ace-switch-6" type="checkbox"
                   onchange="updateStatus('<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
',this)"
            <?php if ((($tmp = @$_smarty_tpl->tpl_vars['value']->value['isshow'])===null||$tmp==='' ? '' : $tmp)==1) {?>checked<?php }?>  value="1"/>
            <span class="lbl"></span>
        </label></td>


        <td>
            <div class="action-buttons">


                <a class="green" href="index.php?c=sys_cicategory&m=edit&id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
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
                               class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete">
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
    <?php }
if (!$_smarty_tpl->tpl_vars['value']->_loop) {
?>
    <?php /*  Call merged included template "inc_gritter.html" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("inc_gritter.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '12490570bc5d47e4267-03794174');
content_570bc5d492a542_75801276($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "inc_gritter.html" */?>
    <?php } ?>
    </tbody>
</table>
<?php echo $_smarty_tpl->tpl_vars['pagerbar']->value;?>


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
    function deleteEntity(id,btn){


        $.get("index.php?c=sys_cicategory&m=delete&id="+id,function(r){
            if(r=='<?php echo @constant('STATUS_SUCCESS');?>
'){
                tr_row = btn.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode
                list_table=tr_row.parentNode;
                list_table.removeChild(tr_row);
            }else{
                alert("删除失败");
            }
        });

    }

    function updateStatus(id,cb){

        $.get("index.php?c=sys_cicategory&m=status&id="+id+"&status="+(cb.checked?1:0),function(r){
            if(r=='<?php echo @constant('STATUS_SUCCESS');?>
'){

            }else{
                if(cb.checked){
                    cb.checked = false;
                }else{
                    cb.checked = true;
                }
            }
        });

    }
</script>

<!-- <script type="text/javascript" src="/resources/uploadify/jquery.uploadify.min.js"></script> -->
</body>
</html>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.18, created on 2016-04-11 23:42:12
         compiled from "application\views\inc_gritter.html" */ ?>
<?php if ($_valid && !is_callable('content_570bc5d492a542_75801276')) {function content_570bc5d492a542_75801276($_smarty_tpl) {?><script>

    $(function () {
        $.gritter.add({
            title: '提示',
            text: '没有查到相关记录',
            class_name: 'gritter-warning gritter-center',
            time : 2500
        });
    });
</script><?php }} ?>
