<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="renderer" content="webkit">
<title><?php echo C("WEB_TITLE");?></title>
<link rel="shortcut icon" href="favicon.ico">
<link href="/Public/Front/css/bootstrap.min.css" rel="stylesheet">
<link href="/Public/Front/css/font-awesome.min.css" rel="stylesheet">
<link href="/Public/Front/css/animate.css" rel="stylesheet">
<link href="/Public/Front/css/style.css" rel="stylesheet">
<link rel="stylesheet" href="/Public/Front/js/plugins/layui/css/layui.css"  media="all">
<style>
.layui-form-switch {width:54px;}
</style>
<body class="gray-bg">
    <div class="wrapper wrapper-content animated">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <!-- <a href="javascript: history.back();" class="pull-left" style="margin-right: 10px;" style=""><i class="layui-icon">&#xe65a;</i></a> -->
                        <h5>账户管理</h5>
                        <div class="row">
                            <div class="col-sm-4 pull-right">
                                <a href="javascript:;" id="addAccount" class="layui-btn">添加码商码</a>
                                <?php if($channel['auto_paofen'] == 1 AND $user['auto_paofen'] == 1): ?><a href="javascript:;" id="addAccount2" class="layui-btn">添加跑分码</a><?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content">
                        
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>

                                        <th>编号</th>
                                        <th>账户名称</th>
                                        <th>账户状态</th>
                                        <th>账户类型</th>
                                        <th>轮询权重</th>
                                        <th>费率模式</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if(is_array($accounts)): $i = 0; $__LIST__ = $accounts;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p): $mod = ($i % 2 );++$i;?><tr>
                                        <td><?php echo ($p["id"]); ?></td>
                                        <td><?php echo ($p["title"]); ?></td>
                                        <td>
                                            <div class="layui-form">
                                            <input type="checkbox" <?php if($p['status']): ?>checked<?php endif; ?> name="status" value="1" data-id="<?php echo ($p["id"]); ?>" data-name="<?php echo ($p["title"]); ?>" lay-skin="switch" lay-filter="switchTest" lay-text="开启|关闭">
                                            </div>
                                        </td>
                                        <td>

                                            <?php switch($p[account_type]): case "2": ?><span class="label label-warning">码商码</span><?php break;?>
                                                <?php case "3": ?><span class="label label-primary">跑分码</span><?php break;?>
                                                <?php default: endswitch;?>
                                        </td>
                                        <td><?php echo ($p["weight"]); ?></td>
                                        <td>
                                            <span id="custom_rate<?php echo ($p["id"]); ?>"><?php if($p["custom_rate"] == 1): ?>自定义<?php else: ?>继承通道<?php endif; ?></span>
                                        </td>
                                        <td>
                                            <div class="layui-btn-group">
                                                <button class="layui-btn layui-btn-small" onclick="admin_edit('编辑通道账户','<?php echo U('Channel/editAccount',array('aid'=>$p[id]));?>')">编辑</button>
                                                <!-- <button class="layui-btn layui-btn-small" onclick="admin_editSeparate('编辑分账','<?php echo U('Channel/editSeparate',array('aid'=>$p[id]));?>')">分账</button> -->
                                                <button class="layui-btn layui-btn-small" onclick="admin_edit('编辑风控','<?php echo U('Channel/editAccountControl',array('aid'=>$p[id]));?>')">风控</button>
                                                <button class="layui-btn layui-btn-small" onclick="admin_editRate('编辑费率','<?php echo U('Channel/editAccountRate',array('aid'=>$p[id]));?>')">费率</button>
                                                <a class="layui-btn layui-btn-small" href="<?php echo U('Pay/Test/addOrder',array('aid'=>$p[id],'cid'=>$channel[id],'uid'=>$uid));?>">测试账号</a>
                                                <button class="layui-btn layui-btn-small" onclick="admin_del(this,'<?php echo $p[id];?>')">删除</button>
                                            </div>
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
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
<script>
layui.use(['layer', 'form'], function(){
  var form = layui.form
  ,layer = layui.layer;
  
  //监听指定开关
  form.on('switch(switchTest)', function(data){
    var aid = $(this).attr('data-id'),
    isopen = this.checked ? 1 : 0,
    title = $(this).attr('data-name');
    $.ajax({
        url:"<?php echo U('Channel/editAccountStatus');?>",
        type:'post',
        data:"aid="+aid+"&isopen="+isopen,
        success:function(res){
            var isopen_desc = isopen ?  '开启' : '关闭'
            layer.tips('温馨提示：'+title+isopen_desc, data.othis);
        }
    });
  });
  
  //监听提交
  $('#addAccount').on('click',function(){
    var w=640,h;
    if (h == null || h == '') {
        h=($(window).height() - 50);
    };
    layer.open({
        type: 2,
        fix: false, //不固定
        maxmin: true,
        shadeClose: true,
        area: [w+'px', h +'px'],
        shade:0.4,
        title: "添加账户",
        content: "<?php echo U('Channel/addAccount', array('pid' => $channel['id']));?>"
    });
  });

  //监听提交
  $('#addAccount2').on('click',function(){
    var w=640,h;
    if (h == null || h == '') {
        h=($(window).height() - 50);
    };
    layer.open({
        type: 2,
        fix: false, //不固定
        maxmin: true,
        shadeClose: true,
        area: [w+'px', h +'px'],
        shade:0.4,
        title: "添加账户",
        content: "<?php echo U('Channel/addAccount2', array('pid' => $channel['id']));?>"
    });
  });


});
 //编辑
 function admin_edit(title,url){
    var w=800,h;
    if (h == null || h == '') {
        h=($(window).height() - 50);
    };
    layer.open({
        type: 2,
        fix: false, //不固定
        maxmin: true,
        shadeClose: true,
        area: [w+'px', h +'px'],
        shade:0.4,
        title: title,
        content: url
    });
 }

  //自己添加支付宝分账使用
  function admin_editSeparate(title,url){
    var w=700,h=450;
    if (h == null || h == '') {
        h=($(window).height() - 50);
    };
    layer.open({
        type: 2,
        fix: false, //不固定
        maxmin: true,
        shadeClose: true,
        area: [w+'px', h +'px'],
        shade:0.4,
        title: title,
        content: url
    });
 }

 /*删除*/
function admin_del(obj,id){
    layer.confirm('确认要删除吗？',function(index){
        $.ajax({
            url:"<?php echo U('Channel/delAccount');?>",
            type:'post',
            data:'aid='+id,
            success:function(res){
                if(res.status){
                $(obj).parents("tr").remove();
                layer.msg('已删除!',{icon:1,time:1000});
                }
            }
        });
    });
}
/*费率*/
function admin_editRate(title,url){
    var w=510,h=320;
    if (h == null || h == '') {
        h=($(window).height() - 50);
    };
    layer.open({
        type: 2,
        fix: false, //不固定
        maxmin: true,
        shadeClose: true,
        area: [w+'px', h +'px'],
        shade:0.4,
        title: title,
        content: url
    });
  }
</script>
</body>
</html>