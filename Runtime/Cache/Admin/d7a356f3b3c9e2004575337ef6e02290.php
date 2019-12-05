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
                <h5>任务设置</h5>
            </div>
            <div class="ibox-content">
        <form class="layui-form" action="" autocomplete="off" id="baseForm">
            <input type="hidden" name="id" id="id" value="<?php echo ($vo["id"]); ?>">
            <div class="layui-form-item">
                <label class="layui-form-label">补发次数：</label>
                <div class="layui-input-inline">
                    <input type="number" min="0" name="config[postnum]" value="<?php echo ($configs["postnum"]); ?>" lay-verify="required" autocomplete="off" placeholder="" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">T+1资金解冻执行时间：</label>
                    <div class="layui-input-inline" style="width: 100px;">
                        <select name="config[allowstart]">
                            <option <?php if($configs['allowstart'] == 0): ?>selected<?php endif; ?> value="0">0:00</option>
                            <option <?php if($configs['allowstart'] == 1): ?>selected<?php endif; ?> value="1">1:00</option>
                            <option <?php if($configs['allowstart'] == 2): ?>selected<?php endif; ?> value="2">2:00</option>
                            <option <?php if($configs['allowstart'] == 3): ?>selected<?php endif; ?> value="3">3:00</option>
                            <option <?php if($configs['allowstart'] == 4): ?>selected<?php endif; ?> value="4">4:00</option>
                            <option <?php if($configs['allowstart'] == 5): ?>selected<?php endif; ?> value="5">5:00</option>
                            <option <?php if($configs['allowstart'] == 6): ?>selected<?php endif; ?> value="6">6:00</option>
                            <option <?php if($configs['allowstart'] == 7): ?>selected<?php endif; ?> value="7">7:00</option>
                            <option <?php if($configs['allowstart'] == 8): ?>selected<?php endif; ?> value="8">8:00</option>
                            <option <?php if($configs['allowstart'] == 9): ?>selected<?php endif; ?> value="9">9:00</option>
                            <option <?php if($configs['allowstart'] == 10): ?>selected<?php endif; ?> value="10">10:00</option>
                            <option <?php if($configs['allowstart'] == 11): ?>selected<?php endif; ?> value="11">11:00</option>
                            <option <?php if($configs['allowstart'] == 12): ?>selected<?php endif; ?> value="12">12:00</option>
                            <option <?php if($configs['allowstart'] == 13): ?>selected<?php endif; ?> value="13">13:00</option>
                            <option <?php if($configs['allowstart'] == 14): ?>selected<?php endif; ?> value="14">14:00</option>
                            <option <?php if($configs['allowstart'] == 15): ?>selected<?php endif; ?> value="15">15:00</option>
                            <option <?php if($configs['allowstart'] == 16): ?>selected<?php endif; ?> value="16">16:00</option>
                            <option <?php if($configs['allowstart'] == 17): ?>selected<?php endif; ?> value="17">17:00</option>
                            <option <?php if($configs['allowstart'] == 18): ?>selected<?php endif; ?> value="18">18:00</option>
                            <option <?php if($configs['allowstart'] == 19): ?>selected<?php endif; ?> value="19">19:00</option>
                            <option <?php if($configs['allowstart'] == 20): ?>selected<?php endif; ?> value="20">20:00</option>
                            <option <?php if($configs['allowstart'] == 21): ?>selected<?php endif; ?> value="21">21:00</option>
                            <option <?php if($configs['allowstart'] == 22): ?>selected<?php endif; ?> value="22">22:00</option>
                            <option <?php if($configs['allowstart'] == 23): ?>selected<?php endif; ?> value="23">23:00</option>
                        </select>
                    </div>
                    <div class="layui-form-mid">-</div>
                    <div class="layui-input-inline" style="width: 100px;">
                        <select name="config[allowend]">
                            <option <?php if($configs['allowend'] == 0): ?>selected<?php endif; ?> value="0">0:00</option>
                            <option <?php if($configs['allowend'] == 1): ?>selected<?php endif; ?> value="1">1:00</option>
                            <option <?php if($configs['allowend'] == 2): ?>selected<?php endif; ?> value="2">2:00</option>
                            <option <?php if($configs['allowend'] == 3): ?>selected<?php endif; ?> value="3">3:00</option>
                            <option <?php if($configs['allowend'] == 4): ?>selected<?php endif; ?> value="4">4:00</option>
                            <option <?php if($configs['allowend'] == 5): ?>selected<?php endif; ?> value="5">5:00</option>
                            <option <?php if($configs['allowend'] == 6): ?>selected<?php endif; ?> value="6">6:00</option>
                            <option <?php if($configs['allowend'] == 7): ?>selected<?php endif; ?> value="7">7:00</option>
                            <option <?php if($configs['allowend'] == 8): ?>selected<?php endif; ?> value="8">8:00</option>
                            <option <?php if($configs['allowend'] == 9): ?>selected<?php endif; ?> value="9">9:00</option>
                            <option <?php if($configs['allowend'] == 10): ?>selected<?php endif; ?> value="10">10:00</option>
                            <option <?php if($configs['allowend'] == 11): ?>selected<?php endif; ?> value="11">11:00</option>
                            <option <?php if($configs['allowend'] == 12): ?>selected<?php endif; ?> value="12">12:00</option>
                            <option <?php if($configs['allowend'] == 13): ?>selected<?php endif; ?> value="13">13:00</option>
                            <option <?php if($configs['allowend'] == 14): ?>selected<?php endif; ?> value="14">14:00</option>
                            <option <?php if($configs['allowend'] == 15): ?>selected<?php endif; ?> value="15">15:00</option>
                            <option <?php if($configs['allowend'] == 16): ?>selected<?php endif; ?> value="16">16:00</option>
                            <option <?php if($configs['allowend'] == 17): ?>selected<?php endif; ?> value="17">17:00</option>
                            <option <?php if($configs['allowend'] == 18): ?>selected<?php endif; ?> value="18">18:00</option>
                            <option <?php if($configs['allowend'] == 19): ?>selected<?php endif; ?> value="19">19:00</option>
                            <option <?php if($configs['allowend'] == 20): ?>selected<?php endif; ?> value="20">20:00</option>
                            <option <?php if($configs['allowend'] == 21): ?>selected<?php endif; ?> value="21">21:00</option>
                            <option <?php if($configs['allowend'] == 22): ?>selected<?php endif; ?> value="22">22:00</option>
                            <option <?php if($configs['allowend'] == 23): ?>selected<?php endif; ?> value="23">23:00</option>
                        </select>
                    </div>
                    <div class="layui-form-mid layui-word-aux">建议凌晨1点到5点执行。</div>
                </div>
            </div>

            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit="" lay-filter="add">立即提交</button>
                    <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                </div>
            </div>
        </form>
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
    var layer = layui.layer
        ,form = layui.form
        ,laydate = layui.laydate;

        //监听提交
        form.on('submit(add)', function(data){
            $.ajax({
                url:"<?php echo U('System/planning');?>",
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
</script>
</body>
</html>