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
                        <h5>接口供应商管理</h5>
						<div class="row">
							<div class="col-sm-2 pull-right">
								<a href="javascript:;" id="addSupplier" class="layui-btn">添加供应商</a>
							</div>
                        </div>
                    </div>
                    <div class="ibox-content">
                        
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>

                                        <th>编号</th>
                                        <th>代付接口名称</th>
                                        <th>代付接口代码</th>
                                        <th>更改或添加时间</th>
                                        <th>代付接口状态</th>  
                                        <th>默认代付接口</th>  
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php if(is_array($lists)): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
                                        <td><?php echo ($v["id"]); ?></td>
                                        <td><?php echo ($v["title"]); ?></td>
                                        <td><?php echo ($v["code"]); ?></td>
                                        <td><?php echo ($v["updatetime"]); ?></td>
                                        <td>
											<div class="layui-form">
											<input type="checkbox" <?php if($v['status']): ?>checked<?php endif; ?> name="status" value="1" data-id="<?php echo ($v["id"]); ?>" data-name="<?php echo ($v["title"]); ?>" lay-skin="switch" lay-filter="switchTest" lay-text="开|关">
											</div>
										</td>
										<td>
											<div class="layui-form">
											<input type="checkbox" <?php if($v['is_default']): ?>checked<?php endif; ?> name="status" value="1" data-id="<?php echo ($v["id"]); ?>" data-name="<?php echo ($v["title"]); ?>" lay-skin="switch" lay-filter="switchDefault" lay-text="开|关">
										</div>
										</td>
                                        <td >
											<div class="layui-btn-group">
                                              <a href="javascript:;" class="layui-btn layui-btn-small" onclick="checkMoney('<?php echo U("Payment/". $v['code'] ."/queryBalance");?>',<?php echo ($v['id']); ?>)">查询余额</a>
                                              <a href="<?php echo U('PayForAnother/extendFields', array('id' => $v[id]));?>" class="layui-btn layui-btn-small">扩展字段</a>

											  <button class="layui-btn layui-btn-small" onclick="admin_edit('编辑供应商接口','<?php echo U('PayForAnother/operationSupplier',array('id'=>$v[id]));?>')">编辑</button>
											  
											  <button class="layui-btn layui-btn-small" onclick="admin_del(this,'<?php echo $v[id];?>')">删除</button>
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
	var pid = $(this).attr('data-id'),
	isopen = this.checked ? 1 : 0,
	title = $(this).attr('data-name');
	$.ajax({
		url:"<?php echo U('PayForAnother/editStatus');?>",
		type:'post',
		data:"id="+pid+"&isopen="+isopen,
		success:function(res){
			if(res.status){
				layer.tips('温馨提示：'+title+'开启', data.othis);
			}else{
				layer.tips('温馨提示：'+title+'关闭', data.othis);
			}
		}
	});
  });
  
  //监听指定开关
  form.on('switch(switchDefault)', function(data){
	var pid = $(this).attr('data-id'),
	isopen = this.checked ? 1 : 0,
	title = $(this).attr('data-name');
	$.ajax({
		url:"<?php echo U('PayForAnother/editDefault');?>",
		type:'post',
		data:"id="+pid+"&isopen="+isopen,
		success:function(res){
			if(res.status){
				layer.tips('温馨提示：'+title+'开启', data.othis);
				location.replace(location.href);
			}else{
				layer.tips('温馨提示：'+title+'关闭', data.othis);

			}
		}
	});
  });

  //监听提交
  $('#addSupplier').on('click',function(){
	var h=($(window).height() - 250), w=($(window).width() - 550);
	if (h == null || h == '') {
		
	};
	if (w == null || w == '') {
		;
	};
	layer.open({
		type: 2,
		fix: false, //不固定
		maxmin: true,
		shadeClose: true,
		area: [w+'px', h +'px'],
		shade:0.4,
		title: "添加供应商",
		content: "<?php echo U('PayForAnother/operationSupplier');?>"
	});
  });
});
 //编辑
 function admin_edit(title,url){
	var h=($(window).height() - 250), w=($(window).width() - 550);
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
			url:"<?php echo U('PayForAnother/delSupplier');?>",
			type:'post',
			data:'id='+id,
			success:function(res){
				if(res.status){
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
				}
			}
		});
	});
}
function checkMoney(url,id){
    $.ajax({
        'type':'post',
        'url':url,
        'data':'id='+id,
        success:function(res){

            if(res['status'] == 1){
                layer.open({
                  type: 1 ,
                  icon: 1,
                  closeBtn: 1,
                  title: '代付余额查询',
                  btn: ['知道了'],
                  area: ['300px', '200px'],
                  shade: 0.6, 
                  maxmin: false,
                  anim: 1,
                  skin: 'yourclass',
                  content: res['data']
                });
                return;
            }


        },
        'error':function(){
            layer.msg('此代付无查询余额接口！', {icon: 5});
        }
    });
}
</script>
</body>
</html>