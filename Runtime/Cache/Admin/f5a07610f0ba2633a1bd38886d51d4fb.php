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
			<form class="layui-form" action="" id="editRate">
				<input type="hidden" name="data[id]" value="<?php echo ($aid); ?>">
                <div class="layui-form-item">
                  <span style="padding-left: 15px;">
                    <b style="color:red">注意:不需要风控的事项请默认0</b>
                  </span>
                </div>
	            <div class="layui-form-item">
	              <label class="layui-form-label">风控模式：</label>
	              <div class="layui-input-block">
	                <input lay-filter="is_defined" type="radio" name="data[is_defined]" <?php if( $info["is_defined"] == 0): ?>checked="checked"<?php endif; ?> value="0" title="继承通道"><div class="layui-unselect layui-form-radio layui-form-radioed"><i class="layui-anim layui-icon"></i><span>继承通道</span></div>
	                <input lay-filter="is_defined" type="radio" name="data[is_defined]" <?php if($info["is_defined"] == 1): ?>checked="checked"<?php endif; ?> value="1" title="自定义"><div class="layui-unselect layui-form-radio"><i class="layui-anim layui-icon"></i><span>自定义</span></div>
	              </div>
	            </div>
	            <div id='group' <?php if($info["is_defined"] == 0): ?>style="display:none"<?php endif; ?>>
					<div class="layui-form-item">
						<label class="layui-form-label">当天交易金额：</label>
						<div class="layui-input-inline">
							<input type="number"  name="data[all_money]" autocomplete="off" value="<?php echo ($info["all_money"]); ?>" placeholder="" class="layui-input">
						</div>
					</div>

					<div class="layui-form-item">
						<label class="layui-form-label">单笔最小金额：</label>
						<div class="layui-input-inline">
							<input type="number"  name="data[min_money]" autocomplete="off" value="<?php echo ($info["min_money"]); ?>" placeholder="" class="layui-input">
						</div>

						<label class="layui-form-label">单笔最大金额：</label>
						<div class="layui-input-inline">
							<input type="number"  name="data[max_money]" autocomplete="off" value="<?php echo ($info["max_money"]); ?>" placeholder="" class="layui-input">
						</div>
					</div>
					<div class="layui-form-item">
			            <div class="layui-inline">
							<label class="layui-form-label">交易时间：</label>
							<div class="layui-input-inline">
								<select name="data[start_time]">
									<option <?php if($info['start_time'] == 0): ?>selected<?php endif; ?> value="0">0:00</option>
									<option <?php if($info['start_time'] == 1): ?>selected<?php endif; ?> value="1">1:00</option>
									<option <?php if($info['start_time'] == 2): ?>selected<?php endif; ?> value="2">2:00</option>
									<option <?php if($info['start_time'] == 3): ?>selected<?php endif; ?> value="3">3:00</option>
									<option <?php if($info['start_time'] == 4): ?>selected<?php endif; ?> value="4">4:00</option>
									<option <?php if($info['start_time'] == 5): ?>selected<?php endif; ?> value="5">5:00</option>
									<option <?php if($info['start_time'] == 6): ?>selected<?php endif; ?> value="6">6:00</option>
									<option <?php if($info['start_time'] == 7): ?>selected<?php endif; ?> value="7">7:00</option>
									<option <?php if($info['start_time'] == 8): ?>selected<?php endif; ?> value="8">8:00</option>
									<option <?php if($info['start_time'] == 9): ?>selected<?php endif; ?> value="9">9:00</option>
									<option <?php if($info['start_time'] == 10): ?>selected<?php endif; ?> value="10">10:00</option>
									<option <?php if($info['start_time'] == 11): ?>selected<?php endif; ?> value="11">11:00</option>
									<option <?php if($info['start_time'] == 12): ?>selected<?php endif; ?> value="12">12:00</option>
									<option <?php if($info['start_time'] == 13): ?>selected<?php endif; ?> value="13">13:00</option>
									<option <?php if($info['start_time'] == 14): ?>selected<?php endif; ?> value="14">14:00</option>
									<option <?php if($info['start_time'] == 15): ?>selected<?php endif; ?> value="15">15:00</option>
									<option <?php if($info['start_time'] == 16): ?>selected<?php endif; ?> value="16">16:00</option>
									<option <?php if($info['start_time'] == 17): ?>selected<?php endif; ?> value="17">17:00</option>
									<option <?php if($info['start_time'] == 18): ?>selected<?php endif; ?> value="18">18:00</option>
									<option <?php if($info['start_time'] == 19): ?>selected<?php endif; ?> value="19">19:00</option>
									<option <?php if($info['start_time'] == 20): ?>selected<?php endif; ?> value="20">20:00</option>
									<option <?php if($info['start_time'] == 21): ?>selected<?php endif; ?> value="21">21:00</option>
									<option <?php if($info['start_time'] == 22): ?>selected<?php endif; ?> value="22">22:00</option>
									<option <?php if($info['start_time'] == 23): ?>selected<?php endif; ?> value="23">23:00</option>
								</select>
				            </div>

			              	<div class="layui-form-mid">-</div>
			              	<div class="layui-input-inline">
								<select name="data[end_time]">
									<option <?php if($info['end_time'] == 0): ?>selected<?php endif; ?> value="0">0:00</option>
									<option <?php if($info['end_time'] == 1): ?>selected<?php endif; ?> value="1">1:00</option>
									<option <?php if($info['end_time'] == 2): ?>selected<?php endif; ?> value="2">2:00</option>
									<option <?php if($info['end_time'] == 3): ?>selected<?php endif; ?> value="3">3:00</option>
									<option <?php if($info['end_time'] == 4): ?>selected<?php endif; ?> value="4">4:00</option>
									<option <?php if($info['end_time'] == 5): ?>selected<?php endif; ?> value="5">5:00</option>
									<option <?php if($info['end_time'] == 6): ?>selected<?php endif; ?> value="6">6:00</option>
									<option <?php if($info['end_time'] == 7): ?>selected<?php endif; ?> value="7">7:00</option>
									<option <?php if($info['end_time'] == 8): ?>selected<?php endif; ?> value="8">8:00</option>
									<option <?php if($info['end_time'] == 9): ?>selected<?php endif; ?> value="9">9:00</option>
									<option <?php if($info['end_time'] == 10): ?>selected<?php endif; ?> value="10">10:00</option>
									<option <?php if($info['end_time'] == 11): ?>selected<?php endif; ?> value="11">11:00</option>
									<option <?php if($info['end_time'] == 12): ?>selected<?php endif; ?> value="12">12:00</option>
									<option <?php if($info['end_time'] == 13): ?>selected<?php endif; ?> value="13">13:00</option>
									<option <?php if($info['end_time'] == 14): ?>selected<?php endif; ?> value="14">14:00</option>
									<option <?php if($info['end_time'] == 15): ?>selected<?php endif; ?> value="15">15:00</option>
									<option <?php if($info['end_time'] == 16): ?>selected<?php endif; ?> value="16">16:00</option>
									<option <?php if($info['end_time'] == 17): ?>selected<?php endif; ?> value="17">17:00</option>
									<option <?php if($info['end_time'] == 18): ?>selected<?php endif; ?> value="18">18:00</option>
									<option <?php if($info['end_time'] == 19): ?>selected<?php endif; ?> value="19">19:00</option>
									<option <?php if($info['end_time'] == 20): ?>selected<?php endif; ?> value="20">20:00</option>
									<option <?php if($info['end_time'] == 21): ?>selected<?php endif; ?> value="21">21:00</option>
									<option <?php if($info['end_time'] == 22): ?>selected<?php endif; ?> value="22">22:00</option>
									<option <?php if($info['end_time'] == 23): ?>selected<?php endif; ?> value="23">23:00</option>
								</select>
			            	</div>

			            </div>
		            </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">单位时间限制：</label>
                        <div class="layui-input-inline">
                            <input type="number" min="0" name="data[unit_interval]" autocomplete="off" value="<?php echo ($info["unit_interval"]); ?>" placeholder="0.00" class="layui-input">
                        </div>

                        <label class="layui-form-label">限制时间单位：</label>
                        <div class="layui-input-inline">
                            <select name="data[time_unit]">
                                <option <?php if($info['time_unit'] == 's'): ?>selected<?php endif; ?> value="s">秒</option>
                                <option <?php if($info['time_unit'] == 'i'): ?>selected<?php endif; ?> value="i">分</option>
                                <option <?php if($info['time_unit'] == 'h'): ?>selected<?php endif; ?> value="h">时</option>
                                <option <?php if($info['time_unit'] == 'd'): ?>selected<?php endif; ?> value="d">天</option>     
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">单位时间次数：</label>
                        <div class="layui-input-inline">
                            <input type="number" min="0" name="data[unit_number]" autocomplete="off" value="<?php echo ($info["unit_number"]); ?>"
                                   placeholder="" class="layui-input">
                        </div>
                        <label class="layui-form-label">单位时间金额：</label>
                        <div class="layui-input-inline">
                            <input type="number" min="0" name="data[unit_all_money]" autocomplete="off" value="<?php echo ($info["unit_all_money"]); ?>"
                                   placeholder="" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">单位时间是否允许相同金额订单：</label>
                        <div class="layui-input-inline">
                             <select name="data[unit_same_amount]">
                                <option <?php if($info['unit_same_amount'] == '0'): ?>selected<?php endif; ?> value="0">允许</option>
                                <option <?php if($info['unit_same_amount'] == '1'): ?>selected<?php endif; ?> value="1">不允许</option>
                                  
                            </select>
                        </div>
                        
                    </div>
		            
		            <div class="layui-form-item">
		                <label class="layui-form-label">上线状态：</label>
		                <div class="layui-input-block">
		                    <input type="radio" name="data[offline_status]" <?php if($info['offline_status'] == 0): ?>checked<?php endif; ?> value="0" title="关闭" checked="">
		                    <input type="radio" name="data[offline_status]" <?php if($info['offline_status'] == 1): ?>checked<?php endif; ?> value="1" title="开通">
		                </div>
		            </div>
		            <div class="layui-form-item">
		                <label class="layui-form-label">风控状态：</label>
		                <div class="layui-input-block">
		                    <input type="radio" name="data[control_status]" <?php if($info['control_status'] == 0): ?>checked<?php endif; ?> value="0" title="关闭" checked="">
		                    <input type="radio" name="data[control_status]" <?php if($info['control_status'] == 1): ?>checked<?php endif; ?> value="1" title="开通">
		                </div>
		            </div>
		        </div>

				<div class="layui-form-item">
					<div class="layui-input-block">
						<button class="layui-btn" lay-submit="submit" lay-filter="edit">提交保存</button>
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
  form.on('submit(edit)', function(data){
    $.ajax({
		url:"<?php echo U('Channel/editAccountControl');?>",
		type:"post",
		data:$('#editRate').serialize(),
		success:function(res){
			if(res.status){
				layer.alert("编辑成功", {icon: 6},function () {
					var index = parent.layer.getFrameIndex(window.name);
                  parent.location.reload();
					parent.layer.close(index);
					parent.$('#dfRate'+res.data.pid).text(res.data.defaultrate);
					parent.$('#fdRate'+res.data.pid).text(res.data.fengding);
				});
			}else{
                layer.msg(res['msg'], {icon: 5},function () {
                    var index = parent.layer.getFrameIndex(window.name);
                    parent.layer.close(index);
                });
                return false;
            }
		}
	});
    return false;
  });

   form.on('radio(is_defined)', function(data) {
    if (data.value == 1) {
      $('#group').show()
    } else {
      $('#group').hide()
    }
  })
});
</script>
    <!--统计代码，可删除-->
</body>
</html>