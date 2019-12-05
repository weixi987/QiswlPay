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
<link rel="stylesheet" href="/Public/Front/js/plugins/layui/css/layui.css">
<style>
.layui-form-label {width:110px;padding:4px}
</style>
<body>
    <div class="wrapper wrapper-content animated">
        <div class="row">
            <div class="col-sm-12">
			<form class="layui-form" action="" id="payaccess">
			<input type="hidden" name="id" value="<?php echo ($pa["id"]); ?>">
			  <div class="layui-form-item">
				<label class="layui-form-label">中文名称：</label>
				<div class="layui-input-inline">
				  <input type="text" name="pa[title]" lay-verify="required" autocomplete="off" value="<?php echo ($pa["title"]); ?>" placeholder="中文名称" class="layui-input">
				</div>
			  </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">英文名称：</label>
				<div class="layui-input-inline">
				  <input type="text" name="pa[code]" lay-verify="required" placeholder="英文名称" value="<?php echo ($pa["code"]); ?>" style="text-transform:capitalize;" autocomplete="off" class="layui-input">
				</div>
				  <div class="layui-form-mid layui-word-aux">注意：即支付接口类名称（不含Controller）</div>
			  </div>
			  
			 <div class="layui-form-item">
				  <label class="layui-form-label">网关地址：</label>
				  <div class="layui-input-block">
					<input type="text" name="pa[gateway]" placeholder="网关地址" autocomplete="off" value="<?php echo ($pa["gateway"]); ?>" class="layui-input">
				  </div>
			 </div>
			 
			 <div class="layui-form-item">
				  <label class="layui-form-label">页面通知：</label>
				  <div class="layui-input-block">
					<input type="text" name="pa[pagereturn]" placeholder="页面通知地址" autocomplete="off" value="<?php echo ($pa["pagereturn"]); ?>" class="layui-input">
				  </div>
			 </div>
			 
			 <div class="layui-form-item">
				  <label class="layui-form-label">服务器通知：</label>
				  <div class="layui-input-block">
					<input type="text" name="pa[serverreturn]" placeholder="服务器通知地址" autocomplete="off" value="<?php echo ($pa["serverreturn"]); ?>" class="layui-input">
				  </div>
			 </div>
				<fieldset class="layui-elem-field">
					<legend>T+0费率</legend>
					<div class="layui-field-box">
						<div class="layui-form-item">
							<label class="layui-form-label">运营费率：</label>
							<div class="layui-input-inline">
								<input type="text" name="pa[t0defaultrate]" placeholder="运营费率" autocomplete="off" value="<?php echo ($pa["t0defaultrate"]); ?>" class="layui-input">
							</div>
							<div class="layui-form-small layui-word-aux">单位：‰，例如：千分之三填 0.003</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">封顶手续费：</label>
							<div class="layui-input-inline">
								<input type="text" name="pa[t0fengding]" placeholder="封顶手续费" autocomplete="off" value="<?php echo ($pa["t0fengding"]); ?>" class="layui-input">
							</div>
							<div class="layui-form-small layui-word-aux">单位：‰，例如：千分之三填 0.003</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">成本费率：</label>
							<div class="layui-input-inline">
								<input type="text" name="pa[t0rate]" placeholder="成本费率" autocomplete="off" value="<?php echo ($pa["t0rate"]); ?>" class="layui-input">
							</div>
							<div class="layui-form-small layui-word-aux">单位：‰，例如：千分之三填 0.003</div>
						</div>
					</div>
				</fieldset>
				<fieldset class="layui-elem-field">
					<legend>T+1费率</legend>
					<div class="layui-field-box">
						<div class="layui-form-item">
							<label class="layui-form-label">运营费率：</label>
							<div class="layui-input-inline">
								<input type="text" name="pa[defaultrate]" placeholder="运营费率" autocomplete="off" value="<?php echo ($pa["defaultrate"]); ?>" class="layui-input">
							</div>
							<div class="layui-form-small layui-word-aux">单位：‰，例如：千分之三填 0.003</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">封顶手续费：</label>
							<div class="layui-input-inline">
								<input type="text" name="pa[fengding]" placeholder="封顶手续费" autocomplete="off" value="<?php echo ($pa["fengding"]); ?>" class="layui-input">
							</div>
							<div class="layui-form-small layui-word-aux">单位：‰，例如：千分之三填 0.003</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">成本费率：</label>
							<div class="layui-input-inline">
								<input type="text" name="pa[rate]" placeholder="成本费率" autocomplete="off" value="<?php echo ($pa["rate"]); ?>" class="layui-input">
							</div>
							<div class="layui-form-small layui-word-aux">单位：‰，例如：千分之三填 0.003</div>
						</div>
					</div>
				</fieldset>
			 <div class="layui-form-item">
				  <label class="layui-form-label">防封域名：</label>
				  <div class="layui-input-block">
					<input type="text" name="pa[unlockdomain]" placeholder="防封域名" value="<?php echo ($pa["unlockdomain"]); ?>" autocomplete="off" class="layui-input">
				  </div>
			 </div>
			  <div class="layui-form-item">
				<label class="layui-form-label">分类：</label>
				<div class="layui-input-inline">
				  <select name="pa[paytype]" lay-verify="required" lay-search="">
				  <option value="">直接选择或搜索选择</option>
					  <?php if(is_array($paytypes)): $i = 0; $__LIST__ = $paytypes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$b): $mod = ($i % 2 );++$i;?><option <?php if($pa[paytype] == $b[id]): ?>selected<?php endif; ?>
						  value="<?php echo ($b["id"]); ?>"><?php echo ($b["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				  </select>
				</div>
			  </div>

			  <div class="layui-form-item">
				<label class="layui-form-label">状态：</label>
				<div class="layui-input-block">
				  <input type="radio" name="pa[status]" <?php if($pa[status] == 1): ?>checked<?php endif; ?> value="1" title="开启" checked="">
				  <input type="radio" name="pa[status]" <?php if($pa[status] == 0): ?>checked<?php endif; ?> value="0" title="关闭">
				</div>
			  </div>
			  
			  <div class="layui-form-item">
				<div class="layui-input-block">
				  <button class="layui-btn" lay-submit="submit" lay-filter="add">提交保存</button>
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
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
<script>
layui.use(['layer', 'form'], function(){
  var form = layui.form
  ,layer = layui.layer;
  
  //监听提交
  form.on('submit(add)', function(data){
    $.ajax({
		url:"<?php echo U('Channel/saveEditSupplier');?>",
		type:"post",
		data:$('#payaccess').serialize(),
		success:function(res){
			if(res.status){
				layer.alert("编辑成功", {icon: 6},function () {
					parent.location.reload();
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
<!--统计代码，可删除-->
</body>
</html>