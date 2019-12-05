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
            <input type="hidden" name="pa[pid]" value="<?php echo ($pid); ?>">
              <div class="layui-form-item">
                <label class="layui-form-label">名称</label>
                <div class="layui-input-inline">
                  <input type="text" name="pa[title]" lay-verify="required" autocomplete="off" value="<?php echo ($pa["title"]); ?>" placeholder="名称" class="layui-input">
                </div>
              </div>
              
              <div class="layui-form-item">
                  <label class="layui-form-label">商户号(MCHID)：</label>
                  <div class="layui-input-block">
                    <input type="text" name="pa[mch_id]" value="<?php echo ($pa["mch_id"]); ?>" autocomplete="off" class="layui-input">
                  </div>
             </div>
             <div class="layui-form-item">
                  <label class="layui-form-label">证书密钥：</label>
                    <div class="layui-input-block">
                        <input type="text" placeholder="MD5KEY 或 RSA 密钥" name="pa[signkey]" value="<?php echo ($pa["signkey"]); ?>" autocomplete="off" class="layui-input">
                    </div>
                </div>
              
              <div class="layui-form-item">
                  <label class="layui-form-label">APPID：</label>
                  <div class="layui-input-inline">
                    <input type="text" name="pa[appid]" autocomplete="off" value="<?php echo ($pa["appid"]); ?>" placeholder="公众号APPID或商家账号" class="layui-input">
                  </div>
             </div>
             
             <div class="layui-form-item">
                  <label class="layui-form-label">APPSECRET：</label>
                  <div class="layui-input-inline">
                    <input type="text" name="pa[appsecret]" autocomplete="off" value="<?php echo ($pa["appsecret"]); ?>" placeholder="公众号APPSECRET或安全码" class="layui-input">
                  </div>
             </div>

             <div class="layui-form-item">
                <label class="layui-form-label">PID(支付宝当面付使用)：</label>
                <div class="layui-input-block">
                  <input type="text" name="pa[zfb_pid]" value="<?php echo ($pa["zfb_pid"]); ?>" autocomplete="off" class="layui-input">
                </div>
             </div>

             <div class="layui-form-item">
                  <label class="layui-form-label">轮询权重：</label>
                  <div class="layui-input-inline">
                    <input type="text" name="pa[weight]" autocomplete="off" value="<?php echo ($pa["weight"]); ?>" placeholder="0-9的整数，默认为1" class="layui-input">
                  </div>
             </div>

              <div class="layui-form-item">
                <label class="layui-form-label">费率模式：</label>
                <div class="layui-input-block">
                  <input type="radio" name="pa[custom_rate]" lay-filter="custom_rate" <?php if($pa[custom_rate] == 0): ?>checked<?php endif; ?> value="0" title="继承通道" >
                  <input type="radio" name="pa[custom_rate]" lay-filter="custom_rate" <?php if($pa[custom_rate] == 1): ?>checked<?php endif; ?> value="1" title="自定义">
                </div>
              </div>

             <div id="rate_group" <?php if($pa[custom_rate] == 0): ?>style="display: none;"<?php endif; ?>>
                <fieldset class="layui-elem-field">
                    <legend>T+0费率</legend>
                    <div class="layui-field-box">
                        <div class="layui-form-item">
                            <label class="layui-form-label">运营费率：</label>
                            <div class="layui-input-inline">
                                <input type="text" name="pa[defaultrate]" placeholder="运营费率" autocomplete="off" value="<?php echo ($pa["defaultrate"]); ?>" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">封顶手续费：</label>
                            <div class="layui-input-inline">
                                <input type="text" name="pa[fengding]" placeholder="封顶手续费" autocomplete="off" value="<?php echo ($pa["fengding"]); ?>" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">成本费率：</label>
                            <div class="layui-input-inline">
                                <input type="text" name="pa[rate]" placeholder="成本费率" autocomplete="off" value="<?php echo ($pa["rate"]); ?>" class="layui-input">
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="layui-elem-field">
                    <legend>T+1费率</legend>
                    <div class="layui-field-box">
                        <div class="layui-form-item">
                            <label class="layui-form-label">运营费率：</label>
                            <div class="layui-input-inline">
                                <input type="text" name="pa[t1defaultrate]" placeholder="运营费率" autocomplete="off" value="<?php echo ($pa["t1defaultrate"]); ?>" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">封顶手续费：</label>
                            <div class="layui-input-inline">
                                <input type="text" name="pa[t1fengding]" placeholder="封顶手续费" autocomplete="off" value="<?php echo ($pa["t1fengding"]); ?>" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">成本费率：</label>
                            <div class="layui-input-inline">
                                <input type="text" name="pa[t1rate]" placeholder="成本费率" autocomplete="off" value="<?php echo ($pa["t1rate"]); ?>" class="layui-input">
                            </div>
                        </div>
                    </div>
                </fieldset>
             </div>

              <div class="layui-form-item">
                <label class="layui-form-label">风控模式：</label>
                <div class="layui-input-block">
                  <input type="radio" name="pa[is_defined]" lay-filter="is_defined" <?php if($pa[is_defined] == 0): ?>checked<?php endif; ?> value="0" title="继承通道" >
                  <input type="radio" name="pa[is_defined]" lay-filter="is_defined" <?php if($pa[is_defined] == 1): ?>checked<?php endif; ?> value="1" title="自定义">
                </div>
              </div>

             <div id="defined_group" <?php if($pa[is_defined] == 0): ?>style="display: none;"<?php endif; ?>>
                                <div class="layui-form-item">
                <label class="layui-form-label"></label>
                <b style="color:red">注意:不需要风控的事项请默认0</b>
              </div>  
              <div class="layui-form-item">
                <label class="layui-form-label">当天交易金额：</label>
                <div class="layui-input-inline">
                  <input type="number"  name="pa[all_money]" autocomplete="off" value="<?php echo ($pa["all_money"]); ?>" placeholder="" class="layui-input">
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">单笔最小金额：</label>
                <div class="layui-input-inline">
                  <input type="number"  name="pa[min_money]" autocomplete="off" value="<?php echo ($pa["min_money"]); ?>" placeholder="" class="layui-input">
                </div>
              </div>        
              <div class="layui-form-item">
                <label class="layui-form-label">单笔最大金额：</label>
                <div class="layui-input-inline">
                  <input type="number"  name="pa[max_money]" autocomplete="off" value="<?php echo ($pa["max_money"]); ?>" placeholder="" class="layui-input">
                </div>
              </div>
              <div class="layui-form-item">
                      <div class="layui-inline">
                  <label class="layui-form-label">交易时间：</label>
                  <div class="layui-input-inline">
                    <select name="pa[start_time]">
                      <option <?php if($pa['start_time'] == 0): ?>selected<?php endif; ?> value="0">0:00</option>
                      <option <?php if($pa['start_time'] == 1): ?>selected<?php endif; ?> value="1">1:00</option>
                      <option <?php if($pa['start_time'] == 2): ?>selected<?php endif; ?> value="2">2:00</option>
                      <option <?php if($pa['start_time'] == 3): ?>selected<?php endif; ?> value="3">3:00</option>
                      <option <?php if($pa['start_time'] == 4): ?>selected<?php endif; ?> value="4">4:00</option>
                      <option <?php if($pa['start_time'] == 5): ?>selected<?php endif; ?> value="5">5:00</option>
                      <option <?php if($pa['start_time'] == 6): ?>selected<?php endif; ?> value="6">6:00</option>
                      <option <?php if($pa['start_time'] == 7): ?>selected<?php endif; ?> value="7">7:00</option>
                      <option <?php if($pa['start_time'] == 8): ?>selected<?php endif; ?> value="8">8:00</option>
                      <option <?php if($pa['start_time'] == 9): ?>selected<?php endif; ?> value="9">9:00</option>
                      <option <?php if($pa['start_time'] == 10): ?>selected<?php endif; ?> value="10">10:00</option>
                      <option <?php if($pa['start_time'] == 11): ?>selected<?php endif; ?> value="11">11:00</option>
                      <option <?php if($pa['start_time'] == 12): ?>selected<?php endif; ?> value="12">12:00</option>
                      <option <?php if($pa['start_time'] == 13): ?>selected<?php endif; ?> value="13">13:00</option>
                      <option <?php if($pa['start_time'] == 14): ?>selected<?php endif; ?> value="14">14:00</option>
                      <option <?php if($pa['start_time'] == 15): ?>selected<?php endif; ?> value="15">15:00</option>
                      <option <?php if($pa['start_time'] == 16): ?>selected<?php endif; ?> value="16">16:00</option>
                      <option <?php if($pa['start_time'] == 17): ?>selected<?php endif; ?> value="17">17:00</option>
                      <option <?php if($pa['start_time'] == 18): ?>selected<?php endif; ?> value="18">18:00</option>
                      <option <?php if($pa['start_time'] == 19): ?>selected<?php endif; ?> value="19">19:00</option>
                      <option <?php if($pa['start_time'] == 20): ?>selected<?php endif; ?> value="20">20:00</option>
                      <option <?php if($pa['start_time'] == 21): ?>selected<?php endif; ?> value="21">21:00</option>
                      <option <?php if($pa['start_time'] == 22): ?>selected<?php endif; ?> value="22">22:00</option>
                      <option <?php if($pa['start_time'] == 23): ?>selected<?php endif; ?> value="23">23:00</option>
                    </select>
                        </div>

                          <div class="layui-form-mid">-</div>
                          <div class="layui-input-inline">
                    <select name="pa[end_time]">
                      <option <?php if($pa['end_time'] == 0): ?>selected<?php endif; ?> value="0">0:00</option>
                      <option <?php if($pa['end_time'] == 1): ?>selected<?php endif; ?> value="1">1:00</option>
                      <option <?php if($pa['end_time'] == 2): ?>selected<?php endif; ?> value="2">2:00</option>
                      <option <?php if($pa['end_time'] == 3): ?>selected<?php endif; ?> value="3">3:00</option>
                      <option <?php if($pa['end_time'] == 4): ?>selected<?php endif; ?> value="4">4:00</option>
                      <option <?php if($pa['end_time'] == 5): ?>selected<?php endif; ?> value="5">5:00</option>
                      <option <?php if($pa['end_time'] == 6): ?>selected<?php endif; ?> value="6">6:00</option>
                      <option <?php if($pa['end_time'] == 7): ?>selected<?php endif; ?> value="7">7:00</option>
                      <option <?php if($pa['end_time'] == 8): ?>selected<?php endif; ?> value="8">8:00</option>
                      <option <?php if($pa['end_time'] == 9): ?>selected<?php endif; ?> value="9">9:00</option>
                      <option <?php if($pa['end_time'] == 10): ?>selected<?php endif; ?> value="10">10:00</option>
                      <option <?php if($pa['end_time'] == 11): ?>selected<?php endif; ?> value="11">11:00</option>
                      <option <?php if($pa['end_time'] == 12): ?>selected<?php endif; ?> value="12">12:00</option>
                      <option <?php if($pa['end_time'] == 13): ?>selected<?php endif; ?> value="13">13:00</option>
                      <option <?php if($pa['end_time'] == 14): ?>selected<?php endif; ?> value="14">14:00</option>
                      <option <?php if($pa['end_time'] == 15): ?>selected<?php endif; ?> value="15">15:00</option>
                      <option <?php if($pa['end_time'] == 16): ?>selected<?php endif; ?> value="16">16:00</option>
                      <option <?php if($pa['end_time'] == 17): ?>selected<?php endif; ?> value="17">17:00</option>
                      <option <?php if($pa['end_time'] == 18): ?>selected<?php endif; ?> value="18">18:00</option>
                      <option <?php if($pa['end_time'] == 19): ?>selected<?php endif; ?> value="19">19:00</option>
                      <option <?php if($pa['end_time'] == 20): ?>selected<?php endif; ?> value="20">20:00</option>
                      <option <?php if($pa['end_time'] == 21): ?>selected<?php endif; ?> value="21">21:00</option>
                      <option <?php if($pa['end_time'] == 22): ?>selected<?php endif; ?> value="22">22:00</option>
                      <option <?php if($pa['end_time'] == 23): ?>selected<?php endif; ?> value="23">23:00</option>
                    </select>
                        </div>

                      </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">上线状态：</label>
                        <div class="layui-input-block">
                            <input type="radio" name="pa[offline_status]" <?php if($pa['offline_status'] == 0): ?>checked<?php endif; ?> value="0" title="关闭" checked="">
                            <input type="radio" name="pa[offline_status]" <?php if($pa['offline_status'] == 1): ?>checked<?php endif; ?> value="1" title="开通">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">风控状态：</label>
                        <div class="layui-input-block">
                            <input type="radio" name="pa[control_status]" <?php if($pa['control_status'] == 0): ?>checked<?php endif; ?> value="0" title="关闭" checked="">
                            <input type="radio" name="pa[control_status]" <?php if($pa['control_status'] == 1): ?>checked<?php endif; ?> value="1" title="开通">
                        </div>
                    </div>
                   </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">防封域名：</label>
                        <div class="layui-input-block">
                            <input type="text" name="pa[unlockdomain]" placeholder="防封域名" value="<?php echo ($pa["unlockdomain"]); ?>" autocomplete="off" class="layui-input">
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
        url:"<?php echo U('Channel/saveEditAccount');?>",
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

  form.on('radio(custom_rate)', function(data) {
    if (data.value == 1) {
      $('#rate_group').show();
    } else {
      $('#rate_group').hide();
    }
  })

  form.on('radio(is_defined)', function(data) {
    if (data.value == 1) {
      $('#defined_group').show();
    } else {
      $('#defined_group').hide();
    }
  })
});
</script>
<!--统计代码，可删除-->
</body>
</html>