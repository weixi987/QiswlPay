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
  <div class="col-sm-12">

      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <i class="fa fa-warning"></i>欢迎您登陆：
        <!--<strong style="color:#036"><?php echo ($member ["username"]); ?></strong>--><span style="color:#F30">
            <?php switch($member['groupid']): case "1": ?>总管理员<?php break;?>
            <?php case "2": ?>运营管理员<?php break;?>
			<?php case "3": ?>财务管理员<?php break; endswitch;?>
        </span>
      </div>

  </div>
</div>

<div class="row zuy-nav">
  
  <div class="col-sm-4">
    <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h5><?php echo ($stat["allordersum"]); ?></h5>
      </div>
      <div class="ibox-content" style="padding-top:0;height: 67px">
        <h1 class="no-margins">平台总入金(元)</h1>
        <i class="iconfont icon-cunqianguan" style="color: #fff1f3;"></i>
      </div>
    </div>
  </div>
    
    
  <div class="col-sm-4" >
    <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h5><?php echo ($stat["allmemberprofit"]); ?></h5>
      </div>
      <div class="ibox-content" style="padding-top:0;height: 67px">
        <h1 class="no-margins">商户总分成(元)</h1>
        <i class="iconfont icon-tuiguangzhuanqian" style="color: #fffbe8;"></i>
      </div>
    </div>
  </div>
    
  <div class="col-sm-4" >
    <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h5><?php echo ($stat["allplatformincome"]); ?></h5>
      </div>
      <div class="ibox-content" style="padding-top:0;height: 67px">
        <h1 class="no-margins">平台总分成(元)</h1>
        <i class="iconfont icon-iconfontjikediancanicon20" style="color: #f0faf8;"></i>
      </div>
    </div>
  </div>
 
  <div class="col-sm-4">
    <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h5><?php echo ($stat["todayordersum"]); ?></h5>
      </div>
      <div class="ibox-content" style="padding-top:0;height: 67px">
        <h1 class="no-margins">今日平台总入金(元)</h1>
        <i class="iconfont icon-qianbao" style="color: #edf7fe;"></i>
      </div>
    </div>
  </div>
    
  <div class="col-sm-4" style="height: 140px">
    <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h5><?php echo ($stat["todaymemberprofit"]); ?></h5>
      </div>
      <div class="ibox-content" style="padding-top:0;height: 67px">
        <h1 class="no-margins">今日商户总分成(元)</h1>
        <i class="iconfont icon-shourusel" style="color: #fff6f0;"></i>
      </div>
    </div>
  </div>
    
  <div class="col-sm-4" style="height: 140px">
    <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h5><?php echo ($stat["todayplatformincome"]); ?></h5>
      </div>
      <div class="ibox-content" style="padding-top:0;height: 67px">
        <h1 class="no-margins">今日平台总分成(元)</h1>
        <i class="iconfont icon-shouru" style="color: #eff2fe;"></i>
      </div>
    </div>
  </div>
 
    

</div>
<!-- 全局js -->
</div>
<script src="/Public/Front/js/jquery.min.js"></script>
<script src="/Public/Front/js/bootstrap.min.js"></script>
<script src="/Public/Front/js/plugins/peity/jquery.peity.min.js"></script>
<script src="/Public/Front/js/content.js"></script>
<script src="/Public/Front/js/plugins/layui/layui.js" charset="utf-8"></script>
<script src="/Public/Front/js/x-layui.js" charset="utf-8"></script>
<script src="/Public/Front/js/echarts.common.min.js"></script>
<script>
    layui.use(['laypage', 'layer', 'form'], function () {
        var form = layui.form,
            layer = layui.layer,
            $ = layui.jquery;
        });
    function reset_pwd(title,url,w,h){
      x_admin_show(title,url,w,h);
    }
</script>

</body>
</html>