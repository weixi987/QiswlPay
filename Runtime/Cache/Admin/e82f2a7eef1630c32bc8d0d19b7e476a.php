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


<style>
  .layui-form-label{width: 250px;}
  .layui-input-block{margin-left:160px}
</style>
<div class="row">
  <div class="col-sm-12">
    <div class="ibox-content">
    <form class="layui-form"  id="profile">
      <input type="hidden" name="userid" value="<?php echo ($uid); ?>">
        <?php if(is_array($list)): $key1 = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key1 % 2 );++$key1;?><div class="layui-form-item">
            <label class="layui-form-label">【<?php echo ($key); ?>】：</label>
            <?php if(is_array($vo)): $key1 = 0; $__LIST__ = $vo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($key1 % 2 );++$key1;?><div class="layui-input-block">
 
              <input type="checkbox" name="account[<?php echo ($vo1["id"]); ?>]" title="<?php echo ($vo1["title"]); ?>---(<?php echo ($vo1["add_user_name"]); ?>)" <?php if($vo1['checked']): ?>checked<?php endif; ?> value="<?php echo ($vo1["id"]); ?>">

              <div class="layui-unselect layui-form-checkbox">
                <span><?php echo ($vo1["title"]); ?>(<?php echo ($vo1["add_user_name"]); ?>)</span>
                <i class="layui-icon layui-icon-ok"></i>
              </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>

          </div><?php endforeach; endif; else: echo "" ;endif; ?>
        <div class="layui-form-item">
          <label class="layui-form-label">是否开启指定：</label>
          <div class="layui-input-block">
            <input type="radio" name="status" lay-filter="changeRule" <?php if($status == 1): ?>checked<?php endif; ?> value="1" title="是" checked="">
            <input type="radio" name="status" lay-filter="changeRule" <?php if(!$status): ?>checked<?php endif; ?> value="0" title="否">
          </div>
        </div>
      <div class="layui-form-item">
        <div class="layui-input-block">
          <input type="button" class="layui-btn" id="save" value="确定">
        </div>
      </div>
    </form>
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
    var polling = "<?php echo ($polling); ?>";
    var id = "<?php echo ($id); ?>";
    var pid = "<?php echo ($pid); ?>";
    layui.use(['layer', 'form','laydate'], function(){
        var form = layui.form
            ,laydate = layui.laydate
            ,layer = layui.layer;


        $('#save').click(function(){
            $.ajax({
              'url':"<?php echo U('Admin/User/saveChannelAccout');?>",
              'data':$('#profile').serialize(),
              'type':'post',
              'success':function(res){
                  if(res.status){
                    layer.msg('设置成功');
                  }else{
                    layer.msg('设置失败');
                  }
              }
            });
            return false;
           
        });    
    });
             


</script>
<!--统计代码，可删除-->
</body>
</html>