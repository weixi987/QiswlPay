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
<!-- <link rel="stylesheet" href="/Public/Front/js/plugins/layui/css/layui.css"  media="all"> -->
<link rel="stylesheet" href="/Public/layui/css/layui.css"  media="all">
<style>
.layui-form-switch {width:63px;}
</style>
<body class="gray-bg">
    <div class="wrapper wrapper-content animated">

        <div class="row">
            <div class="col-sm-12">

                <div class="ibox float-e-margins">

                    <div class="ibox-title">
                    	<!--<form class="layui-form" action="" method="get" autocomplete="off">
 
					        <div class="layui-form-item">

						        <div class="layui-inline">
						            <div class="layui-input-inline">
						                <select name="rows">
						                  <option value="">显示条数</option>
						                  <option <?php if($rows != '' && $rows == 15): ?>selected<?php endif; ?> value="15">15条</option>
						                  <option <?php if($rows == 30): ?>selected<?php endif; ?> value="30">30条</option>
						                  <option <?php if($rows == 50): ?>selected<?php endif; ?> value="50">50条</option>
						                  <option <?php if($rows == 80): ?>selected<?php endif; ?> value="80">80条</option>
						                  <option <?php if($rows == 100): ?>selected<?php endif; ?> value="100">100条</option>
						                </select>
						            </div>
						        </div>
						        <div class="layui-inline">
						            <button type="submit" class="layui-btn"> <span class="glyphicon glyphicon-search"></span> 搜索 </button>
						        </div>
					        </div>
      					</form> -->
                        <h5>接口供应商管理</h5>
						<div class="row">
					
							<div class="col-sm-2 pull-right" style="width: 280px;">
								<a href="javascript:;" id="showEven" class="layui-btn">风控实况</a>
								<a href="javascript:;" id="addSupplier" class="layui-btn">添加供应商</a>
							</div>
                        </div>
                    </div>
                    <div class="ibox-content">
                        
                        <div class="table-responsive">
                            <table class="table table-hover" lay-data="{width:'100%',limit:<?php echo ($rows); ?>}">
                                <thead>
                                    <tr>

                                        <th>编号</th>
                                        <th>接口名称</th>
                                        <th>接口代码</th>
										<th>类型</th>
                                        <th>接口状态</th>
                                        <th>接口类型</th>
                                        <th>代理上号</th>
                                        <th>撞单风控</th>
                                        <th>手动接单</th>
										<th>运营费率</th>
										<th>成本费率</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p): $mod = ($i % 2 );++$i;?><tr>
                                        <td><?php echo ($p["id"]); ?></td>
                                        <td><?php echo ($p["title"]); ?></td>
                                        <td><?php echo ($p["code"]); ?></td>
										<td><?php echo (getPaytype($p[paytype])); ?></td>
                                        <td>
											<div class="layui-form">
											<input type="checkbox" <?php if($p['status']): ?>checked<?php endif; ?> name="status" value="1" data-id="<?php echo ($p["id"]); ?>" data-name="<?php echo ($p["title"]); ?>" lay-skin="switch" lay-filter="switchTest" lay-text="开启|关闭">
											</div>
										</td>
										<td>
											<div class="layui-form">
											<input type="checkbox" <?php if($p['is_mianqian']): ?>checked<?php endif; ?> name="is_mianqian" value="1" data-id="<?php echo ($p["id"]); ?>" data-name="<?php echo ($p["title"]); ?>" lay-skin="switch" lay-filter="is_mianqian" lay-text="免签|官方">
											</div>
										</td>
										<td>
											<div class="layui-form">
											<input type="checkbox" <?php if($p['agent_can_sh']): ?>checked<?php endif; ?> name="agent_can_sh" value="1" data-id="<?php echo ($p["id"]); ?>" data-name="<?php echo ($p["title"]); ?>" lay-skin="switch" lay-filter="agent_can_sh" lay-text="开启|关闭">
											</div>
										</td>

										<td>
											<div class="layui-form">
											<input type="checkbox" <?php if($p['unit_samemoney_status']): ?>checked<?php endif; ?> name="agent_can_sh" value="1" data-id="<?php echo ($p["id"]); ?>" data-name="<?php echo ($p["title"]); ?>" lay-skin="switch" lay-filter="unit_samemoney_status" lay-text="开启|关闭">
											</div>
										</td>

										<td>
											<div class="layui-form">
											<input type="checkbox" <?php if($p['auto_paofen']): ?>checked<?php endif; ?> name="agent_can_sh" value="1" data-id="<?php echo ($p["id"]); ?>" data-name="<?php echo ($p["title"]); ?>" lay-skin="switch" lay-filter="auto_paofen" lay-text="开启|关闭">
											</div>
										</td>
										
                                          
                                        <td><span id="dfRate<?php echo ($p["id"]); ?>"><span style="color:green">T+0</span>：<?php echo ($p["t0defaultrate"]); ?>，<span style="color:red">T+1</span>：<?php echo ($p["defaultrate"]); ?></span></td>
                                        <td><span id="fdRate<?php echo ($p["id"]); ?>"><span style="color:green">T+0</span>：<?php echo ($p["t0rate"]); ?>，<span style="color:red">T+1</span>：<?php echo ($p["rate"]); ?></span></td>

                          
                          
                                        <td>
											<div class="layui-btn-group">
                                              
                                              	<a href="<?php echo U('Channel/account', array('pid' => $p[id]));?>" class="layui-btn layui-btn-small"  >子账户</a>
											  
											  	<button class="layui-btn layui-btn-small" onclick="admin_editRate('编辑费率','<?php echo U('Channel/editRate',array('pid'=>$p[id]));?>')">费率</button>

											  	<button class="layui-btn layui-btn-small" onclick="admin_control('编辑风控','<?php echo U('Channel/editControl',array('pid' => $p[id]));?>')">风控</button>
											  
											  	<button class="layui-btn layui-btn-small" onclick="admin_edit('编辑供应商接口','<?php echo U('Channel/editSupplier',array('pid'=>$p[id]));?>')">编辑</button>
											  
											  <button class="layui-btn layui-btn-small" onclick="admin_del(this,'<?php echo $p[id];?>')">删除</button>
											</div>
                                        </td>
                                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>    
                                </tbody>
                            </table>
                        </div>
					    <div class="page">

					        <form class="layui-form" action="" method="get" id="pageForm" autocomplete="off">                                
					            <?php echo ($page); ?> 
					            <select name="rows" style="height: 29px;" id="pageList" lay-ignore >
					                <option value="">显示条数</option>
					                <option <?php if($_GET[rows] != '' && $_GET[rows] == 15): ?>selected<?php endif; ?> value="15">15条</option>
					                <option <?php if($_GET[rows] == 30): ?>selected<?php endif; ?> value="30">30条</option>
					                <option <?php if($_GET[rows] == 50): ?>selected<?php endif; ?> value="50">50条</option>
					                <option <?php if($_GET[rows] == 80): ?>selected<?php endif; ?> value="80">80条</option>
					                <option <?php if($_GET[rows] == 100): ?>selected<?php endif; ?> value="100">100条</option>
					            </select>
					           

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
	<!-- <script src="/Public/Front/js/plugins/layui/layui.js" charset="utf-8"></script> -->
	<script src="/Public/layui/layui.js" charset="utf-8"></script>
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
		url:"<?php echo U('Channel/editStatus');?>",
		type:'post',
		data:"pid="+pid+"&isopen="+isopen,
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
  form.on('switch(agent_can_sh)', function(data){
	var pid = $(this).attr('data-id'),
	isopen = this.checked ? 1 : 0,
	title = $(this).attr('data-name');
	$.ajax({
		url:"<?php echo U('Channel/AgentCanSh');?>",
		type:'post',
		data:"pid="+pid+"&isopen="+isopen,
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
  form.on('switch(auto_paofen)', function(data){
	var pid = $(this).attr('data-id'),
	isopen = this.checked ? 1 : 0,
	title = $(this).attr('data-name');
	$.ajax({
		url:"<?php echo U('Channel/AutoPaofen');?>",
		type:'post',
		data:"pid="+pid+"&isopen="+isopen,
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
  form.on('switch(unit_samemoney_status)', function(data){
	var pid = $(this).attr('data-id'),
	isopen = this.checked ? 1 : 0,
	title = $(this).attr('data-name');
	$.ajax({
		url:"<?php echo U('Channel/UnitSamemoneyStatus');?>",
		type:'post',
		data:"pid="+pid+"&isopen="+isopen,
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
  form.on('switch(is_mianqian)', function(data){
	var pid = $(this).attr('data-id'),
	isopen = this.checked ? 1 : 0,
	title = $(this).attr('data-name');
	$.ajax({
		url:"<?php echo U('Channel/editIsMianqian');?>",
		type:'post',
		data:"pid="+pid+"&isopen="+isopen,
		success:function(res){
			if(res.status){
				layer.tips('温馨提示：'+title+'变为免签', data.othis);
			}else{
				layer.tips('温馨提示：'+title+'变为官方', data.othis);
			}
		}
	});
  });
  
  //监听提交
  $('#addSupplier').on('click',function(){
	var w=400,h;
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
		title: "添加供应商",
		content: "<?php echo U('Channel/addSupplier');?>"
	});
  });

  //监听提交
  $('#showEven').on('click',function(){
	var w=400,h;
	if (h == null || h == '') {
		h=($(window).height() - 150);
	};
	layer.open({
		type: 2,
		fix: false, //不固定
		maxmin: true,
		shadeClose: true,
		area: [w+'px', h +'px'],
		shade:0.4,
		title: "交易实况",
		content: "<?php echo U('Channel/showEven');?>"
	});
  });

});
 //编辑
 function admin_edit(title,url){
	var w=600,h;
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
			url:"<?php echo U('Channel/delSupplier');?>",
			type:'post',
			data:'pid='+id,
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
	var w=400,h;
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

function admin_control(title,url){
	var w=400,h;
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

     $('#pageList').change(function(){
        $('#pageForm').submit();
    });
</script>
</body>
</html>