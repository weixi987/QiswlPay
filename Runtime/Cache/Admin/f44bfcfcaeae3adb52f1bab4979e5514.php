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
<div class="col-md-14">
        <div class="ibox float-e-margins">

            <div class="ibox-title">
                <h5>邮箱设置</h5>
            </div>
            <div class="ibox-content">
                <form class="layui-form" action="" autocomplete="off" id="baseForm">
                    <input type="hidden" name="id" id="id" value="<?php echo ($vo["id"]); ?>">
                    <div class="layui-form-item">
                        <label class="layui-form-label">smtp服务器：</label>
                       <div class="layui-input-inline">
                            <input type="text" name="smtp_host" value="<?php echo ($vo["smtp_host"]); ?>" placeholder="例如：smtp.qq.com" lay-verify="title" lay-verify="required" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">smtp端口：</label>
                        <div class="layui-input-block" style="width: 80px;">
                            <input type="text" name="smtp_port" value="<?php echo ($vo["smtp_port"]); ?>" placeholder="例如：456, 如果是QQ邮箱的话可以为空" lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">smtp用户名：</label>
                        <div class="layui-input-inline">
                            <input type="text" name="smtp_user" value="<?php echo ($vo["smtp_user"]); ?>" placeholder="例如：zhifu@quefu.cn" readonly onfocus="this.removeAttribute('readonly');" lay-verify="email" autocomplete="off" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">smtp授权码：</label>
                        <div class="layui-input-inline">
                            <input type="password" name="smtp_pass" value="<?php echo ($vo["smtp_pass"]); ?>"  placeholder="QQ邮箱，请填写授权码" readonly onfocus="this.removeAttribute('readonly');"
                                   autocomplete="off" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">发件人Email：</label>
                        <div class="layui-input-inline">
                            <input type="text" name="smtp_email" value="<?php echo ($vo["smtp_email"]); ?>"  placeholder="例如：info@baidu.com" autocomplete="off" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">发件人姓名：</label>
                        <div class="layui-input-inline">
                            <input type="tel" name="smtp_name" value="<?php echo ($vo["smtp_name"]); ?>"  placeholder="例如：聚合支付平台" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="add">立即提交</button>
                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                        </div>
                    </div>
                </form>
                <hr/>
                <div class="layui-form-item" style="margin-top: 50px;">
                    <label class="layui-form-label">测试：</label>
                    <div class="layui-inline">
                        <input type="email" autocomplete="off" class="layui-input" id="cs_text" name="cs_text" value=""  placeholder="例如：123@qq.com">
                    </div>
                    <div class="layui-inline">
                        <button class="layui-btn" lay-submit="" onclick="sendEmail()">测试发邮件</button>
                    </div>
                </div>
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
    layui.use(['form', 'laydate'], function(){
        var form = layui.form
            ,layer = layui.layer
            ,laydate = layui.laydate;
        //自定义验证规则
        form.verify({
            title: function(value){
                if(value.length < 5){
                    return '网站名称至少得写啊';
                }
            }
        });
        //监听提交
        form.on('submit(add)', function(data){
            $.ajax({
                url:"<?php echo U('System/saveEmail');?>",
                type:"post",
                data:$('#baseForm').serialize(),
                success:function(res){
                    if(res.status){
                        layer.alert("操作成功", {icon: 6},function () {
                            location.reload();
                            var index = parent.layer.getFrameIndex(window.name);
                            parent.layer.close(index);
                        });
                    }else{
                        layer.msg("操作失败!", {icon: 5},function () {
                            var index = parent.layer.getFrameIndex(window.name);
                            parent.layer.close(index);
                        });
                        return false;
                    }
                }
            });
            return false;
        });
    });
    function sendEmail() {
        $.ajax({
            url:"<?php echo U('System/testEmail');?>",
            type:"post",
            data:'cs_text='+$('#cs_text').val(),
            success:function(res){
                if(res.status){
                    layer.alert(res.msg, {icon: 6},function () {
                        location.reload();
                        var index = parent.layer.getFrameIndex(window.name);
                        parent.layer.close(index);
                    });
                }else{
                    layer.msg(res.msg, {icon: 6},function () {
                        var index = parent.layer.getFrameIndex(window.name);
                        parent.layer.close(index);
                    });
                    return false;
                }
            }
        });
    };
</script>
</body>
</html>