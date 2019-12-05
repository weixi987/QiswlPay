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
<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>查看通道费率</h5>
            </div>
            <!--条件查询-->
            <div class="ibox-content">
                <?php if(($fans[groupid]) == "4"): ?><blockquote class="layui-elem-quote">
                    <p class="text-danger">结算方式：
                        <?php if($tkconfig[t1zt] == 1): ?>T+1<?php elseif($tkconfig[t1zt] == 0): ?>T+0<?php endif; ?></p>
                </blockquote><?php endif; ?>
                <table class="layui-table" lay-skin="row">
                    <thead>
                    <tr>
                        <th>编码</th>
                        <th>通道名称</th>
                        <?php if(($fans[groupid]) != "4"): ?><th>T+0交易费率(千分)</th>
                            <th>T+1交易费率(千分)</th>
                            <th>T+0封顶费率(千分)</th>
                            <th>T+1封顶费率(千分)</th>
                        <?php else: ?>
                            <th>通道费率(千分)</th><?php endif; ?>
                        <th>通道状态</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p): $mod = ($i % 2 );++$i;?><tr>
                            <td><?php echo ($p["id"]); ?></td>
                            <td><?php echo ($p["name"]); ?></td>
                            <?php if(($fans[groupid]) != "4"): ?><td><?php echo ($p[t0feilv]*1000); ?> ‰</td>
                                <td><?php echo ($p[feilv]*1000); ?> ‰</td>
                                <td><?php echo ($p[fengding]*1000); ?> ‰</td>
                                <td><?php echo ($p[t0fengding]*1000); ?> ‰</td>
                                <?php else: ?>
                            <td><?php echo ($p[feilv]*1000); ?> ‰</td><?php endif; ?>
                            <td><?php if($p['status'] == 1): ?>开通<?php endif; ?></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
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
<script src="/Public/Front/js/Util.js" charset="utf-8"></script>
</body>
</html>