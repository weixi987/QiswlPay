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
                <h5>短信设置</h5>
                <div class="row">
                    <div class="col-sm-2 pull-right">
                        <a href="<?php echo U('System/smsTemplateList');?>" class="layui-btn layui-btn-small" >短信模版</a>
                    </div>
                </div>
            </div>
            <div class="ibox-content">
                <form class="layui-form" action="" autocomplete="off" id="baseForm">
                    <input type="hidden" name="id" id="id" value="<?php echo ($vo["id"]); ?>">
                    <div class="layui-form-item">
                        <label class="layui-form-label">短信通道：</label>
                        <div class="layui-input-block">
                            <select name="sms_channel" lay-filter="">
                                <option value="">请选择短信通道</option>
                                <option value="aliyun" <?php if(($vo["sms_channel"]) == "aliyun"): ?>selected="selected"<?php endif; ?>>阿里云</option>
                                <option value="smsbao" <?php if(($vo["sms_channel"]) == "smsbao"): ?>selected="selected"<?php endif; ?>>短信宝</option>
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">阿里云App Key：</label>
                        <div class="layui-input-block">
                            <input type="text" name="app_key" value="<?php echo ($vo["app_key"]); ?>" placeholder="App Key" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">阿里云App Secret：</label>
                        <div class="layui-input-block">
                            <input type="text" name="app_secret" value="<?php echo ($vo["app_secret"]); ?>" placeholder="" placeholder="" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">短信宝账号：</label>
                        <div class="layui-input-block">
                            <input type="text" name="smsbao_user" value="<?php echo ($vo["smsbao_user"]); ?>" placeholder="短信宝账号"  autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">短信宝密码：</label>
                        <div class="layui-input-block">
                            <input type="text" name="smsbao_pass" value="<?php echo ($vo["smsbao_pass"]); ?>" placeholder="短信宝密码"  placeholder="" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">短信签名：</label>
                        <div class="layui-input-block">
                            <input type="text" name="sign_name" value="<?php echo ($vo["sign_name"]); ?>" placeholder="" lay-verify="required" placeholder="" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">短信设置：</label>
                        <div class="layui-input-block">
                            <input type="radio" name="is_open" value="1" title="开启" <?php if($vo['is_open'] == 1): ?>checked<?php endif; ?>>
                            <input type="radio" name="is_open" value="0" title="关闭" <?php if($vo['is_open'] == 0): ?>checked<?php endif; ?>>
                        </div>
                    </div>
                    <!-- <div class="layui-form-item">
                        <label class="layui-form-label">接收通知手机：</label>
                        <div class="layui-input-block">
                            <input type="text" name="admin_mobile" value="<?php echo ($vo["admin_mobile"]); ?>" placeholder="请输入管理员接收通知的手机号"  class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">管理员通知：</label>
                        <div class="layui-input-block">
                            <input type="radio" name="is_receive" value="1" title="开启" <?php if($vo['is_receive'] == 1): ?>checked<?php endif; ?>>
                            <input type="radio" name="is_receive" value="0" title="关闭" <?php if($vo['is_receive'] == 0): ?>checked<?php endif; ?>>
                        </div>
                    </div> -->


                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="add">立即提交</button>
                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                        </div>
                    </div>
                </form>
                <hr/>
                <div class="layui-form-item" style="margin-top: 50px;">
                    <label class="layui-form-label">测试接收手机：</label>
                    <div class="layui-inline">
                        <input type="mobile" autocomplete="off" class="layui-input" id="cs_text" name="cs_text" value=""  placeholder="例如：13800138000">
                    </div>
                    <div class="layui-inline">
                        <button class="layui-btn" lay-submit="" onclick="sendMobile()">测试发送短信</button>
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

        });
        //监听提交
        form.on('submit(add)', function(data){
            $.ajax({
                url:"<?php echo U('System/saveSms');?>",
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
    function sendMobile() {
        $.ajax({
            url:"<?php echo U('System/testMobile');?>",
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