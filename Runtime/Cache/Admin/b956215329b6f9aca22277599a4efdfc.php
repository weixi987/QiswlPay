<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
 <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title><?php echo ($sitename); ?>---管理</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link href="/Public/Front/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Public/Front/css/font-awesome.min.css" rel="stylesheet">
    <link href="/Public/Front/css/animate.css" rel="stylesheet">
    <link href="/Public/Front/css/style.css" rel="stylesheet">
      <link href="/Public/Front/css/zuy.css" rel="stylesheet">
    <link rel="stylesheet" href="/Public/Front/js/plugins/layui/css/layui.css">
    <link rel="stylesheet" type="text/css" href="/Public/Front/iconfont/iconfont.css"/>
<style>
        .layui-form-label {width:110px;padding:4px}
        .layui-form-item .layui-form-checkbox[lay-skin="primary"]{margin-top:0;}
        .layui-form-switch {width:54px;margin-top:0px;}
    </style>
<body class="gray-bg">
<div class="wrapper wrapper-content animated">


<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>菜单列表</h5>
                <div class="row">
                    <div class="col-sm-2 pull-right">
                        <a href="javascript:menu_add('添加菜单','<?php echo U('Menu/addMenu');?>',540,320);"
                           class="layui-btn layui-btn-small">添加菜单</a>
                    </div>
                </div>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th style="text-align: left;">菜单名称</th>
                            <th>控制器名称</th>
                            <th>方法名称</th>
                            <th>菜单级别</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                <td><?php echo ($vo["id"]); ?></td>
                                <td style="text-align: left;">
                                    <?php if($vo['level'] == 0): ?>├─
                                    <?php else: ?>
                                        └─<?php endif; echo ($vo["title"]); ?>
                                </td>
                                <td><?php echo ($vo["controller"]); ?></td>
                                <td><?php echo ($vo["action"]); ?></td>
                                <td>
                                    <?php if(!$vo['pid']): ?>一级菜单
                                        <?php else: ?>
                                        二级菜单<?php endif; ?>
                                </td>
                                <td>
                                    <a class="layui-btn layui-btn-mini"
                                       onclick="menu_add('添加子菜单','<?php echo U('Menu/addMenu',['pid'=>$vo[id]]);?>',540,320)"><i
                                            class="layui-icon">
                                        &#xe608;</i>添加子菜单</a>
                                    <a class="layui-btn layui-btn-mini layui-btn-normal"
                                       onclick="menu_edit('编辑菜单','<?php echo U('Menu/editMenu',['id'=>$vo[id]]);?>',540,320)"><i
                                            class="layui-icon">&#xe642;</i>编辑</a>
                                    <a class="layui-btn layui-btn-danger layui-btn-mini"
                                       onclick="menu_del(this,'<?php echo ($vo[id]); ?>')"><i
                                            class="layui-icon">&#xe640;</i>删除</a>
                                </td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="page"><?php echo ($page); ?></div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="/Public/Front/js/jquery.min.js"></script>
<script src="/Public/Front/js/bootstrap.min.js"></script>
<script src="/Public/Front/js/plugins/peity/jquery.peity.min.js"></script>
<script src="/Public/Front/js/content.js"></script>
<script src="/Public/Front/js/plugins/layui/layui.js" charset="utf-8"></script>
<script src="/Public/Front/js/x-layui.js" charset="utf-8"></script>
<script>
    layui.use(['form','laydate','layer'], function(){
        var form = layui.form
            ,layer = layui.layer
            ,laydate = layui.laydate;
    });
    //添加菜单
    function menu_add(title,url,w,h){
        x_admin_show(title,url,w,h);
    }
    //添加菜单
    function menu_edit(title,url,w,h){
        x_admin_show(title,url,w,h);
    }
    //添加菜单
    function menu_del(title,url,w,h){
        x_admin_show(title,url,w,h);
    }
    /*用户-删除*/
    function menu_del(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            $.ajax({
                url:"<?php echo U('Menu/delMenu');?>",
                type:'post',
                data:'id='+id,
                success:function(res){
                    if(res.status){
                        $(obj).parents("tr").remove();
                        layer.msg('已删除!',{icon:1,time:1000});
                    }
                }
            });
        });
    }
</script>
</body>
</html>