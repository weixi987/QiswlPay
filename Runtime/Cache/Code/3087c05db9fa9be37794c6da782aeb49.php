<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <title><?php echo ($sitename); ?>---用户管理中心</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link href="/Public/Front/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Public/Front/css/font-awesome.min.css" rel="stylesheet">
    <link href="/Public/Front/css/animate.css" rel="stylesheet">
    <link href="/Public/Front/css/style.css" rel="stylesheet">
    <link href="/Public/Front/css/zuy.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/Public/Front/iconfont/iconfont.css"/>
    <link rel="stylesheet" href="/Public/Front/js/plugins/layui/css/layui.css">
    <style>
        .layui-form-label {width:110px;padding:4px}
        .layui-form-item .layui-form-checkbox[lay-skin="primary"]{margin-top:0;}
        .layui-form-switch {width:54px;margin-top:0px;}
    </style>
<body class="gray-bg">
<div class="wrapper wrapper-content animated">

  <div class="row zuy-nav">
   <?php if(is_array($list)): foreach($list as $key=>$vo): ?><div class="col-sm-3" style="height: 140px">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5 style="font-size:1.8rem;font-weight: 900;"><?php echo ($vo["title"]); ?></h5>
        </div>
        <div class="ibox-content" style="">
          <h1 class="no-margins"><a href='<?php echo U("Channel/channelAccount",['id'=>$vo['id']]);?>' class="layui-btn layui-btn-warm" lay-submit="submit" lay-filter="add">添加账号</a></h1>
          <i class="iconfont icon-shourusel" style="color: #eff2fe;"></i>
          <small></small>
        </div>
      </div>
    </div><?php endforeach; endif; ?>
    
</div>



<!-- 全局js -->
<script src="<?php echo ($siteurl); ?>Public/Front/js/jquery.min.js"></script>
<script src="<?php echo ($siteurl); ?>Public/Front/js/bootstrap.min.js"></script>
<script src="<?php echo ($siteurl); ?>Public/Front/js/content.js?v=1.0.0"></script>

</body>
</html>