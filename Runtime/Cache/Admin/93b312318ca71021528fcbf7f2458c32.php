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
                <!--条件查询-->
                <div class="ibox-title">
                    <h5>码商管理</h5>
                    <div class="ibox-tools">
                        <i class="layui-icon" onclick="location.replace(location.href);" title="刷新"
                           style="cursor:pointer;">ဂ</i>
                    </div>
                </div>
                <!--条件查询-->
                <div class="ibox-content">
                    <form class="layui-form" action="" method="get" autocomplete="off">
                        <input type="hidden" name="m" value="<?php echo ($model); ?>">
                        <input type="hidden" name="c" value="User">
                        <input type="hidden" name="a" value="index">
                        <input type="hidden" name="p" value="1">
                        <div class="layui-form-item">
                            <div class="layui-inline">
                                <div class="layui-input-inline">
                                    <input type="text" name="username" autocomplete="off" placeholder="商户号或用户名"
                                           class="layui-input" value="<?php echo ($username); ?>">
                                </div>
                            </div>
                            <div class="layui-inline">
                                <div class="layui-input-inline">
                                    <input type="text" name="parentid" autocomplete="off" placeholder="上级商户号或用户名"
                                           class="layui-input" value="<?php echo ($parentid); ?>">
                                </div>
                            </div>
                            <div class="layui-inline">
                                <div class="layui-input-inline">
                                    <select name="groupid">
                                        <option value="">分类</option>
                                        <?php if(is_array($agentCateSel)): foreach($agentCateSel as $k=>$v): ?><option value="<?php echo ($k); ?>" <?php if($groupid == $k): ?>selected<?php endif; ?>><?php echo ($v); ?></option><?php endforeach; endif; ?>
                                    </select>
                                </div>
                                <div class="layui-input-inline">
                                    <select name="status">
                                        <option value="">状态</option>
                                        <option value="1" <?php if($status == 1): ?>selected<?php endif; ?>>已激活</option>
                                        <option value="0" <?php if($status != '' && $status == 0): ?>selected<?php endif; ?>>未激活</option>
                                        <option value="2" <?php if($status == 2): ?>selected<?php endif; ?>>禁用</option>
                                    </select>
                                </div>
                                <div class="layui-input-inline">
                                    <select name="authorized">
                                        <option value="">认证</option>
                                        <option value="0" <?php if($authorized != '' && $authorized == 0): ?>selected<?php endif; ?>>未认证</option>
                                        <option value="2" <?php if($authorized == 2): ?>selected<?php endif; ?>>等待审核</option>
                                        <option value="1" <?php if($authorized == 1): ?>selected<?php endif; ?>>认证用户</option>
                                    </select>
                                </div>
                                <div class="layui-input-inline">
                                    <input type="text" class="layui-input" name="regdatetime" id="regtime"
                                           placeholder="起始时间" value="<?php echo ($regdatetime); ?>">
                                </div>
 
                            </div>

                            <div class="layui-inline">
                                <button type="submit" class="layui-btn"><span
                                        class="glyphicon glyphicon-search"></span> 搜索
                                </button>
                                <a href="javascript:;" id="export"
                                   class="layui-btn layui-btn-danger"><span
                                        class="glyphicon glyphicon-export"></span> 导出</a>
                                <button  class="layui-btn" onclick="member_edit('添加码商商','<?php echo U('User/editUser');?>',400,350);return false;"><span
                                        class="glyphicon glyphicon-user"></span> 添加
                                </button>
                            </div>
                        </div>
                    </form>
                    <!--用户列表-->
                    <table class="layui-table" lay-data="{width:'100%',limit:<?php echo ($rows); ?>,id:'userData'}">
                        <thead>
                        <tr>
                            <th lay-data="{field:'memberid', width:120,fixed:'left'}">码商ID</th>
                            <th lay-data="{field:'username', width:140}">码商名称</th>
                            <th lay-data="{field:'groupid', width:150}">码商级别</th>
                            <th lay-data="{field:'parentid', width:100}">上级代理</th>
                            <th lay-data="{field:'status', width:80}">状态</th>
                            <th lay-data="{field:'auto_paofen', width:100}">手动接单</th>
                            <th lay-data="{field:'authorized', width:100}">认证</th>
                            <th lay-data="{field:'money', width:250,style:'cursor: pointer;'}">账户总额</th>
                            <th lay-data="{field:'regdatetime', width:100}">注册时间</th>
                            <th lay-data="{field:'last_login_time', width:100,style:'text-align:center;'}">最后登录时间</th>
                            <th lay-data="{field:'op',width:700,fixed:'right'}">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                <td><a href="<?php echo U('User/changeuser',array('userid'=>$vo['id']));?>" target="_blank"><?php echo (shanghubianhao($vo['id'])); ?></a></td>
                                <td><?php echo ($vo["username"]); ?></td>
                                <td><?php echo ($vo["groupname"]); ?></td>
                                <td><?php echo (getParentName($vo['parentid'])); ?></td>
                                <td>
                                    <input type="checkbox"
                                           data-uid="<?php echo ($vo["id"]); ?>"
                                    <?php if($vo['status']): ?>checked<?php endif; ?>
                                    name="open"
                                    lay-skin="switch"
                                    lay-filter="switchStatus"
                                    lay-text="正常|禁用">
                                </td>
                                <td>
                                    <input type="checkbox"
                                           data-uid="<?php echo ($vo["id"]); ?>"
                                    <?php if($vo['auto_paofen']): ?>checked<?php endif; ?>
                                    name="auto_paofen"
                                    lay-skin="switch"
                                    lay-filter="auto_paofen"
                                    lay-text="开启|关闭">
                                </td>
                                <td><a href="javascript:member_auth('用户认证','<?php echo U('User/authorize',['uid'=>$vo[id]]) ;?>',500,520)">
                                    <?php switch($vo[authorized]): case "0": ?><span class="label label-default">未认证</span><?php break;?>
                                        <?php case "1": ?><span class="label label-success">已认证</span><?php break;?>
                                        <?php case "2": ?><span class="label label-warning">等待审核</span><?php break;?>
                                        <?php default: endswitch;?>
                                </a></td>
                                <td><div title="用户资金管理" onclick="member_money('商户：<?php echo ($vo["username"]); ?>','<?php echo U("User/usermoney",['userid'=>$vo["id"]]);?>',300,500)">可提现：<?php echo ($vo["balance"]); ?> 冻结：<?php echo ($vo["codeblockedbalance"]); ?></div></td>
    
                                <td><?php echo (date("Y-m-d H:i:s",$vo["regdatetime"])); ?></td>
                                <td><?php if($vo[last_login_time] > 0): echo (date("Y-m-d H:i:s",$vo["last_login_time"])); else: ?>-<?php endif; ?></td>

                                <td>
                                    <div class="layui-btn-group">

                                        <a href="<?php echo U('User/changeuser',array('userid'=>$vo['id']));?>" target="_blank"><button class="layui-btn layui-btn-small" >登录</button></a>

<button class="layui-btn layui-btn-small" onclick="member_withdrawal('提现设置', '<?php echo U('User/userWithdrawal',['uid'=>$vo[id]]);?>')">提现</button>
<a class="layui-btn layui-btn-small" href="<?php echo U('User/allChannelAccount',['uid'=>$vo[id]]);?>">子账号</a>
<button class="layui-btn layui-btn-small" onclick="kjxh('<?php echo ($vo[id]); ?>')">一键下号</button>
<button class="layui-btn layui-btn-small" onclick="kjsh('<?php echo ($vo[id]); ?>')">一键上号</button>
<button class="layui-btn layui-btn-small" onclick="member_withdrawal('码商保证金冻结时间',
                                                '<?php echo U('User/userCodeDepositRule',['uid'=>$vo[id]]);?>',400,400)">冻结时间</button>
<button class="layui-btn layui-btn-small" onclick="member_withdrawal('交易设置', '<?php echo U('Transaction/userConfig',['uid'=>$vo[id]]);?>')">风控</button>
<button class="layui-btn layui-btn-small" onclick="member_edit('编辑通道','<?php echo U('User/editUserProduct',['uid'=>$vo[id]]);?>',800,580)">通道</button>
<button class="layui-btn layui-btn-small" onclick="member_rate('编辑费率','<?php echo U('User/userRateEdit',['uid'=>$vo[id]]);?>',800,580)">费率</button>
<button class="layui-btn layui-btn-small" onclick="member_edit('编辑','<?php echo U('User/editPassword',['uid'=>$vo[id]]);?>',800,540)">密码</button>
<button class="layui-btn layui-btn-small" onclick="member_edit('编辑','<?php echo U('User/editUser',['uid'=>$vo[id]]);?>',400,350)">编辑</button>
<button class="layui-btn layui-btn-small" onclick="member_del(this,'<?php echo ($vo["id"]); ?>')">删除</button>
                                        
                                    </div>
                                </td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                    <!--用户列表-->
                    <div class="page"><?php echo ($page); ?> 
                        <div class="layui-input-inline">
                        <form class="layui-form" action="" method="get" id="pageForm" autocomplete="off">                                
                            
                            <select name="rows" style="height: 29px;" id="pageList" lay-ignore >
                                <option value="">显示条数</option>
                                <option <?php if($rows != '' && $rows == 15): ?>selected<?php endif; ?> value="15">15条</option>
                                <option <?php if($rows == 30): ?>selected<?php endif; ?> value="30">30条</option>
                                <option <?php if($rows == 50): ?>selected<?php endif; ?> value="50">50条</option>
                                <option <?php if($rows == 80): ?>selected<?php endif; ?> value="80">80条</option>
                                <option <?php if($rows == 100): ?>selected<?php endif; ?> value="100">100条</option>
                                <option <?php if($rows == 1000): ?>selected<?php endif; ?> value="1000">1000条</option>
                            </select>
                           

                        </form>
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
    layui.use(['form','table',  'laydate', 'layer'], function () {
        var form = layui.form
            ,table = layui.table
            , layer = layui.layer
            , laydate = layui.laydate;

        //日期时间范围
        laydate.render({
            elem: '#regtime'
            , type: 'datetime'
            ,theme: 'molv'
            , range: '|'
        });
        //监听表格复选框选择
        table.on('checkbox(userData)', function(obj){
            var child = $(data.elem).parents('table').find('tbody input[lay-filter="ids"]');
            child.each(function(index, item){
                item.checked = data.elem.checked;
            });
            form.render('checkbox');
        });
        //监听工具条
        table.on('tool(test1)', function(obj){
            var data = obj.data;
            if(obj.event === 'detail'){
                layer.msg('ID：'+ data.id + ' 的查看操作');
            } else if(obj.event === 'del'){
                layer.confirm('真的删除行么', function(index){
                    obj.del();
                    layer.close(index);
                });
            } else if(obj.event === 'edit'){
                layer.alert('编辑行：<br>'+ JSON.stringify(data))
            }
        });
        //全选
        form.on('checkbox(allChoose)', function (data) {
            var child = $(data.elem).parents('table').find('tbody input[lay-filter="ids"]');
            child.each(function (index, item) {
                item.checked = data.elem.checked;
            });
            form.render('checkbox');
        });

        //监听用户状态
        form.on('switch(switchStatus)', function (data) {
            var isopen = this.checked ? 1 : 0,
                uid = $(this).attr('data-uid');
            $.ajax({
                url: "<?php echo U('User/editStatus');?>",
                type: 'post',
                data: "uid=" + uid + "&isopen=" + isopen,
                success: function (res) {
                    if (res.status) {
                        layer.tips('温馨提示：开启成功', data.othis);
                    } else {
                        layer.tips('温馨提示：关闭成功', data.othis);
                    }
                }
            });
        });

        //监听用户状态
        form.on('switch(auto_paofen)', function (data) {
            var isopen = this.checked ? 1 : 0,
                uid = $(this).attr('data-uid');
            $.ajax({
                url: "<?php echo U('User/AutoPaofen');?>",
                type: 'post',
                data: "uid=" + uid + "&isopen=" + isopen,
                success: function (res) {
                    if (res.status) {
                        layer.tips('温馨提示：开启成功', data.othis);
                    } else {
                        layer.tips('温馨提示：关闭成功', data.othis);
                    }
                }
            });
        });


    });

    //批量删除提交
    function delAll() {
        layer.confirm('确认要删除吗？', function (index) {
            //捉到所有被选中的，发异步进行删除
            layer.msg('删除成功', {icon: 1});
        });
    }

    function kjxh(uid){
        layer.confirm('确认要冻结全部子账号吗？', function (index) {
            $.ajax({
                url:"<?php echo U('User/downAllAccount');?>",
                type:'post',
                data:'uid='+uid,
                success:function(res){
                    if(res.status){
                        layer.msg('操作成功!',{icon:1,time:1000});
                    }else{
                        layer.msg('操作失败!',{icon:1,time:1000});
                    }
                }
            });
        });
    }

    function kjsh(uid){
        layer.confirm('确认要开启全部子账号吗？', function (index) {
            $.ajax({
                url:"<?php echo U('User/upAllAccount');?>",
                type:'post',
                data:'uid='+uid,
                success:function(res){
                    if(res.status){
                        layer.msg('操作成功!',{icon:1,time:1000});
                    }else{
                        layer.msg('操作失败!',{icon:1,time:1000});
                    }
                }
            });
        });
    }

    /*用户-认证*/
    function member_auth(title, url, w, h) {
        x_admin_show(title, url, w, h);
    }

    /*用户-费率*/
    function member_rate(title, url, w, h) {
        x_admin_show(title, url, w, h);
    }

    // 用户-编辑
    function member_add(title, url, id, w, h) {
        x_admin_show(title, url, w, h);
    }

    // 用户-编辑
    function member_edit(title, url, id, w, h) {
        x_admin_show(title, url, w, h);
    }

    // 用户-提现
    function member_withdrawal(title, url, id, w, h) {
        x_admin_show(title, url, w, h);
    }
    // 用户-提现
    function member_money(title, url, id, w, h) {
        x_admin_show(title, url, w, h);
    }

    /*用户-删除*/
    function member_del(obj, id) {
        layer.confirm('确认要删除吗？', function (index) {
            $.ajax({
                url:"<?php echo U('User/delUser');?>",
                type:'post',
                data:'uid='+id,
                success:function(res){
                    if(res.status){
                        $(obj).parents("tr").remove();
                        layer.msg('已删除!',{icon:1,time:1000});
                    }
                }
            });
        });
    }

    function thawing_funds(){
        layer.confirm('温馨提示：解冻数据数量多，可能需要时间非常长，请尽量在交易量低的时间段再提交，<br><br>确认要提交吗？',function(index) {
            layer.load();
            $.ajax({
                'url':'<?php echo U("User/thawingFunds");?>',
                '':'json',
                'type':'get',
                'success':function(info){
                    console.log(info);
                    layer.closeAll('loading');
                    layer.msg(info['msg'], {icon: 1, time: 1000},function () {
                        location.replace(location.href);
                    }); 
                },
                'error':function(){

                },
            });
        });
    }

    $('#pageList').change(function(){
        $('#pageForm').submit();
    });
    $('#export').on('click',function(){
        window.location.href
            ="<?php echo U('Admin/User/exportuser',array('username'=>$username,'parentid'=>$parentid,'status'=>$status,'authorized'=>$authorized,'groupid'=>$groupid,'regdatetime'=>$regdatetime,'isagent'=>1));?>";
    });

</script>
</body>
</html>