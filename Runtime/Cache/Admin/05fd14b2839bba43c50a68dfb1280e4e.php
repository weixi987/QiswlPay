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
<link href="/Public/Front/js/plugins/fancybox/jquery.fancybox.css" rel="stylesheet">
<link rel="stylesheet" href="/Public/Front/js/plugins/layui/css/layui.css">
<style>
	.layui-form-switch {width:54px;}
	.layui-form-label {width:110px;padding:4px}
</style>
<body>
    <div class="wrapper wrapper-content animated">
        <div class="row">
            <div class="col-sm-12">
			<form class="layui-form" action="" id="userProduct">
				<input type="hidden" name="userid" value="<?php echo (htmlspecialchars($_GET['uid'])); ?>">
				<!--产品列表-->
				<table class="layui-table" lay-even="" lay-skin="line">
				<thead>
				<tr>
				  <th>名称</th>
				  <th>状态</th>
				  <th>操作</th>
				</tr> 
				</thead>
				<tbody>
				<?php if(is_array($products)): $i = 0; $__LIST__ = $products;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p): $mod = ($i % 2 );++$i;?><tr>
					<td><?php echo ($p["name"]); ?></td>
					<td>
						<input type="checkbox"
							   data-pid="<?php echo ($p["id"]); ?>"
						<?php if($p['status']): ?>checked<?php endif; ?>
						name="u[<?php echo ($p["id"]); ?>][status]"
						lay-skin="switch"
						lay-filter="switchStatus"
						lay-text="开启|关闭" value="1">
					</td>
					<td>
						<input type="radio" name="u[<?php echo ($p["id"]); ?>][polling]" lay-filter="polling" data-pid="<?php echo ($p["id"]); ?>"
							   data-type="<?php echo ($p["paytype"]); ?>"
						<?php if($p[polling] == 0): ?>checked<?php endif; ?> value="0" title="单独">
						<input type="radio" name="u[<?php echo ($p["id"]); ?>][polling]" lay-filter="polling" data-pid="<?php echo ($p["id"]); ?>"
							   data-type="<?php echo ($p["paytype"]); ?>"
						<?php if($p[polling] == 1): ?>checked<?php endif; ?>
						value="1" title="轮询">
						<div id="selmodel<?php echo ($p["id"]); ?>" style="display:<?php if($p['polling']): ?>none<?php endif; ?>;">
							<select name="u[<?php echo ($p["id"]); ?>][channel]" lay-verify="" id="channels<?php echo ($p["id"]); ?>" lay-search="">
								<option value="">选择或搜索</option>
								<?php if(is_array($channellist)): $i = 0; $__LIST__ = $channellist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i; if($c['paytype'] == $p['paytype']): ?><option <?php if($p[channel] == $c[id]): ?>selected<?php endif; ?> value="<?php echo ($c["id"]); ?>"><?php echo ($c["title"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</div>

						<table class="layui-table" lay-skin="line" id="pdtable<?php echo ($p["id"]); ?>" style="display:<?php if(!$p['polling']): ?>none<?php endif; ?>;">
							<thead>
							<tr>
								<th></th>
								<th>通道代码</th>
								<th>通道名称</th>
								<th>权重(1-9)</th>
							</tr>
							</thead>
							<tbody>
							<?php if(is_array($channellist)): $i = 0; $__LIST__ = $channellist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i; if($c['paytype'] == $p['paytype']): ?><tr>
										<td><input type="checkbox" name="u[<?php echo ($p["id"]); ?>][w][<?php echo ($c["id"]); ?>][pid]" <?php if($p['weight'][$c['id']][pid]): ?>checked<?php endif; ?>
												   lay-skin="primary" value="<?php if($p['weight'][$c['id']]): echo ($p['weight'][$c['id']][pid]); else: echo ($c['id']); endif; ?>"></td>
										<td><?php echo ($c["id"]); ?></td>
										<td><?php echo ($c["title"]); ?></td>
										<td><input type="number" min="0" max="9" name="u[<?php echo ($p["id"]); ?>][w][<?php echo ($c["id"]); ?>][weight]"
												   class="layui-input" value="<?php echo ($p['weight'][$c['id']][weight]); ?>"></td>
									</tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>

							</tbody>
						</table>
						
					</td>
		
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
				</table>
				<!--产品列表-->
				<div class="layui-form-item">
					<div class="layui-input-block">
					  <button class="layui-btn" lay-submit="submit" lay-filter="save">提交保存</button>
					</div>
				</div>
			</form>
            </div>
        </div>
    </div>

    <script src="/Public/Front/js/jquery.min.js"></script>
    <script src="/Public/Front/js/bootstrap.min.js"></script>
    <script src="/Public/Front/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="/Public/Front/js/content.js"></script>
	<script src="/Public/Front/js/plugins/layui/layui.js" charset="utf-8"></script>
</div>
<script src="/Public/Front/js/jquery.min.js"></script>
<script src="/Public/Front/js/bootstrap.min.js"></script>
<script src="/Public/Front/js/plugins/peity/jquery.peity.min.js"></script>
<script src="/Public/Front/js/content.js"></script>
<script src="/Public/Front/js/plugins/layui/layui.js" charset="utf-8"></script>
<script src="/Public/Front/js/x-layui.js" charset="utf-8"></script>

<script>

    // 用户-编辑
    function member_edit(title, url, id, w, h) {
        x_admin_show(title, url, w, h);
    }

    var channels = <?php echo ($channels); ?>;
layui.use(['layer', 'form','laydate'], function(){
  var form = layui.form
  ,laydate = layui.laydate
  ,layer = layui.layer;

  //监听提交
  form.on('submit(save)', function(data){
    $.ajax({
		url:"<?php echo U('User/saveUserProduct');?>",
		type:"post",
		data:$('#userProduct').serialize(),
		success:function(res){
			if(res.status){
				layer.alert("编辑成功", {icon: 6},function () {
					parent.location.reload();
					var index = parent.layer.getFrameIndex(window.name);
					parent.layer.close(index);
				});
			}else{
                layer.alert("操作失败", {icon: 5},function () {
                    parent.location.reload();
                    var index = parent.layer.getFrameIndex(window.name);
                    parent.layer.close(index);
                });
			}
		}
	});
    return false;
  });
    //监听radio
    form.on('radio(polling)', function(data){
        //console.log(data.elem); //得到radio原始DOM对象
        //console.log(data.value); //被点击的radio的value值
        var pty = $(this).attr('data-type');
        var pid = $(this).attr('data-pid');
        var html = '';
        if(data.value == 0){
            $('#selmodel'+pid).css('display','');
            $('#pdtable'+pid).css('display','none');
            html += '<option value="">直接选择或搜索选择</option>';
            for(var i in channels){
                if(pty==channels[i].paytype){
                    html += '<option value='+channels[i].id+'>'+channels[i].title+'</option>';
                }
            }
            $('#channels'+pid).html(html);
        }else{
            $('#selmodel'+pid).css('display','none');
            $('#pdtable'+pid).css('display','');
            for(var i in channels){
                if(pty == channels[i].paytype){
                    html += '<tr>';
                    html += '<td><input type="checkbox" name="u['+pid+'][w]['+channels[i].id+'][pid]" ' +
						'lay-skin="primary" ' +
						'value="'+channels[i].id+'"></td>';
                    html += '<td>'+channels[i].id+'</td>'
                    html += '<td>'+channels[i].title+'</td>';
                    html += '<td><input type="number" min="0" max="9" name="u['+pid+'][w]['+channels[i]
							.id+'][weight]" ' +
						'class="layui-input" value=""></td>';
                    html += '</tr>';
                }
            }
            $('#pdtable'+pid+' > tbody').html(html);
        }
        form.render();
    });
});
</script>
<!--统计代码，可删除-->
</body>
</html>