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
   
        <table class="layui-table">
          <tr><td>商户编号：</td><td><?php echo ($order["pay_memberid"]); ?></td></tr>
          <tr><td>商户用户名：</td><td><?php echo ($order["username"]); ?></td></tr>
          <tr><td>商户姓名：</td><td><?php echo ($order["realname"]); ?></td></tr>
          <tr><td>商户订单号：</td><td><strong class="text-success"><?php echo ($order["out_trade_id"]); ?></strong></td></tr>
          <tr><td>交易金额：</td><td><strong class="text-danger"><?php echo ($order["pay_amount"]); ?></strong></td></tr>
          <tr><td>手续费：</td><td><strong class=""><?php echo ($order["pay_poundage"]); ?></strong></td></tr>
          <tr><td>实际金额：</td><td><strong class="text-success"><?php echo ($order["pay_actualamount"]); ?></strong></td></tr>
          <tr><td>提交时间：</td><td><strong class="text-warning"><?php echo (date('Y-m-d H:i:s',$order[pay_applydate])); ?></strong></td></tr>
          <tr><td>成功时间：</td><td><strong class="text-danger"><?php echo (date('Y-m-d H:i:s', $order[pay_successdate])); ?></strong></td></tr>
          <tr><td>交易通道：</td><td><?php echo ($order["pay_bankname"]); ?></td></tr>
          <tr><td>交易银行：</td><td><?php echo ($order["pay_yzh_tongdao"]); ?></td></tr>
          <tr><td>提交地址：</td><td><a href="<?php echo ($order["pay_tjurl"]); ?>" target="_blank">点击查看</a></td></tr>
          <tr><td>返回地址：</td><td><a href="<?php echo ($order["pay_callbackurl"]); ?>" target="_blank">点击查看</a></td></tr>
          <tr><td>通知地址：</td><td><a href="<?php echo ($order["pay_notifyurl"]); ?>" target="_blank">点击查看</a></td></tr>
          <tr><td>订单状态：</td><td><?php switch($order[pay_status]): case "0": ?><strong class="text-danger">未处理</strong><?php break;?>
              <?php case "1": ?><strong class="text-warning">已成功，未返回 【<?php if($order['pay_status'] == 1): ?><a href="<?php echo U('Pay/Pay/bufa', ['TransID'=>$order['pay_orderid'],'tongdao'=>$order['pay_ytongdao']]);?>" target="_blank">补发通知</a><?php endif; ?>】</strong><?php break;?>
              <?php case "2": ?><strong class="text-success">已成功，已返回</strong><?php break; endswitch;?></td></tr>
        </table>
       
</div>
<script src="/Public/Front/js/jquery.min.js"></script>
<script src="/Public/Front/js/bootstrap.min.js"></script>
<script src="/Public/Front/js/plugins/peity/jquery.peity.min.js"></script>
<script src="/Public/Front/js/content.js"></script>
<script src="/Public/Front/js/plugins/layui/layui.js" charset="utf-8"></script>
<script src="/Public/Front/js/x-layui.js" charset="utf-8"></script>
<script src="/Public/Front/js/Util.js" charset="utf-8"></script>
<script>
layui.use(['laydate', 'laypage', 'layer', 'table', 'carousel', 'upload', 'element'], function() {
        var laydate = layui.laydate //日期
            , laypage = layui.laypage //分页
            ,layer = layui.layer //弹层
            , table = layui.table; //表格
    });
</script>
</body>
</html>