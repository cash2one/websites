<?php /* Smarty version Smarty-3.1.18, created on 2016-04-12 12:03:00
         compiled from "application\views\sys_cms_ci_man.html" */ ?>
<?php /*%%SmartyHeaderCode:2708570c73747caba8-46270268%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0261924a146c4dc7f259b19cf74ca8d5467aefd9' => 
    array (
      0 => 'application\\views\\sys_cms_ci_man.html',
      1 => 1460433777,
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
  'nocache_hash' => '2708570c73747caba8-46270268',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_570c73749ae8b2_76568995',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_570c73749ae8b2_76568995')) {function content_570c73749ae8b2_76568995($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'D:\\Stephan\\phpstudy\\WWW\\sunnycms\\application\\libraries\\Smarty\\plugins\\function.html_options.php';
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


            
<li class="active">内容管理</li>

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
        

       <select name="cid" id="cid" class="col-xs-1 col-sm-2" onchange="setCatname(this.value);" >
        <option value="0">所属栏目</option>
        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['group_list']->value,'selected'=>$_smarty_tpl->tpl_vars['cid']->value),$_smarty_tpl);?>

    </select>

    <select name="issend" id="issend" class="col-xs-1 col-sm-2" onchange="setissend(this.value);" >
        <option value="-1">是否导出</option>
        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['issendarray']->value,'selected'=>$_smarty_tpl->tpl_vars['issend']->value),$_smarty_tpl);?>

    </select>

    <div class="col-xs-8">
        <form class="form-inline" style="width: 300px" method="post">

            <div class="input-group">
                <input type="text" class="form-control search-query" name="keywords" placeholder="标题" value="<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-purple btn-sm">
                            查询
                            <i class="ace-icon fa fa-search icon-on-right bigger-110"></i>
                        </button>
                    </span>
            </div>
             <span id="page_count">共<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
条</span>
        </form>

    </div>








   </div>

</div>

<table id="sample-table-2" class="table table-striped table-bordered table-hover">
<thead>
<tr>

    <th>ID</th>
    <th>标题</th>
    <th>栏目</th>
    <th>时间</th>
    <th>导出</th>
    <th style="width: 90px">操作</th>
</tr>
</thead>

<tbody>
<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
<tr>

    <td><?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['value']->value['cid'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['value']->value['buildtime'];?>
</td>
    <td><label>
        <input name="issend" id="issend" class="ace ace-switch ace-switch-6" type="checkbox"
               onchange="updateStatus('<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
',this)"
        <?php if ((($tmp = @$_smarty_tpl->tpl_vars['value']->value['issend'])===null||$tmp==='' ? '' : $tmp)==1) {?>checked<?php }?>  value="0"/>
        <span class="lbl"></span>
    </label></td>
    <td>
        <div class="action-buttons">

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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("inc_gritter.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '2708570c73747caba8-46270268');
content_570c737492e7d1_38395155($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "inc_gritter.html" */?>
<?php } ?>
</tbody>
</table>
<style type="text/css">
#page_count{
    float: right;
margin-top: 7px;
margin-left: 10px;
color: lightcoral;
}    
</style>

<span id="page_count">共<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
条</span>
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


            $.get("index.php?c=cms_contentMan&m=delete&id="+id,function(r){
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

    function setCatname(obj){
        var issend = $("#issend").val();
        location.href='index.php?c=sys_ciman&m=index&issend='+issend+'&cid='+obj;
    }    

    function setissend(obj){
        var cid=$("#cid").val();
        location.href='index.php?c=sys_ciman&m=index&cid='+cid+'&issend='+obj;
    }

    function updateStatus(id,cb){

        $.get("index.php?c=sys_ciman&m=recomstatus&id="+id+"&issend="+(cb.checked?1:0),function(r){
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

    function updateFTStatus(id,cb){

        $.get("index.php?c=sys_ciman&m=ftstatus&id="+id+"&status="+(cb.checked?1:0),function(r){
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
<?php /* Smarty version Smarty-3.1.18, created on 2016-04-12 12:03:00
         compiled from "application\views\inc_gritter.html" */ ?>
<?php if ($_valid && !is_callable('content_570c737492e7d1_38395155')) {function content_570c737492e7d1_38395155($_smarty_tpl) {?><script>

    $(function () {
        $.gritter.add({
            title: '提示',
            text: '没有查到相关记录',
            class_name: 'gritter-warning gritter-center',
            time : 2500
        });
    });
</script><?php }} ?>
