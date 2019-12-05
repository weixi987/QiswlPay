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


<script src="/Public/Front/js/jquery.min.js"></script>
<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>修改手机号码</h5>
            </div>
            <div class="ibox-content">
                <!--用户信息-->
                <form class="layui-form" action="" autocomplete="off" id="profile">
                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <label class="layui-form-label">手机：</label>
                            <div class="layui-input-inline">
                                <input type="text" lay-verify="phone" disabled autocomplete="off"
                                       class="layui-input" value="<?php echo ($user["mobile"]); ?>">
                            </div>
                            <div class="layui-input-inline">
                                <?php if($user['mobile']): ?><a href="javascript:;" style="color:blue;" class="editMobile" data-id="<?php echo ($user["id"]); ?>">点击修改手机号</a>
                                <?php else: ?>
                                    <a href="javascript:;" style="color:blue;" class="bindMobile" data-id="<?php echo ($user["id"]); ?>">点击绑定手机号</a><?php endif; ?>
                            </div>
                        </div>
                    </div>
                </form>
                <!--用户信息-->
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
layui.use(['laydate', 'laypage', 'layer', 'form', 'element'], function() {
    var laydate = layui.laydate //日期
        ,layer = layui.layer //弹层
        ,form = layui.form //弹层
        , element = layui.element; //元素操作
    //日期
    laydate.render({
        elem: '#date'
    });
    //绑定手机
    $('.bindMobile').click(function(){
        var id = $(this).data('id');
        m_admin_show('绑定手机', "<?php echo U('System/bindMobileShow');?>?id=" + id);
        
    })
        //修改手机
    $('.editMobile').click(function(){
        var id = $(this).data('id');
        m_admin_show('绑定手机', "<?php echo U('System/editMobileShow');?>?id=" + id);
        
    })
});
function m_admin_show(title,url,w,h){
    if (title == null || title == '') {
        title=false;
    };
    if (url == null || url == '') {
        url="404.html";
    };
    if (w == null || w == '') {
        w=($(window).width());
    };
    if (h == null || h == '') {
        h=($(window).height());
    };
    layer.open({
        type: 2,
        area: [w+'px', h +'px'],
        fix: false, //不固定
        maxmin: true,
        shadeClose: true,
        shade:0.4,
        title: title,
        content: url
    });
}
</script>
</body>
</html>