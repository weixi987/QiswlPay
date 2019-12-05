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
      <!--条件查询-->
      <div class="ibox-title">
        <h5>抢单大厅</h5>
        <div class="ibox-tools">
          <i class="layui-icon" onclick="location.replace(location.href);" title="刷新"
             style="cursor:pointer;">ဂ</i>
        </div>
      </div>
      <!--条件查询-->
      <div class="ibox-content">

        <blockquote class="layui-elem-quote" style="font-size:14px;padding;8px;">账户余额：<span class="label label-info"><?php echo ($fans["balance"]); ?>元</span>  冻结金额：<span class="label label-info"><?php echo ($fans["codeblockedbalance"]); ?>元</span>
        </blockquote>
        <div class="list item">
          <!--交易列表-->
          <table class="layui-table" lay-data="{width:'100%',limit:<?php echo ($rows); ?>,id:'userData'}">
            <thead>
            <tr>
             <!-- <th lay-data="{field:'key',width:60}">序号</th>
              <th lay-data="{field:'ddlx', width:90}">订单类型</th>-->
              <th lay-data="{field:'zh_tongdao', width:160}">交易类型</th>
              <th lay-data="{field:'amount', width:100,style:'color:#060;'}">交易金额</th>
              <th lay-data="{field:'applydate', width:140}">提交时间</th>

              <th lay-data="{field:'pay_orderid', width:200,style:'color:#060;'}">平台订单号</th>
              <th lay-data="{field:'out_trade_id', width:200,style:'color:#060;'}">下游订单号</th>
              <th lay-data="{field:'pay_memberid', width:110}">商户编号</th>
              <!--<th lay-data="{field:'memberid', width:160}">通道商户号</th>-->
              <!--<th lay-data="{field:'bankname', width:120}">支付类别</th>-->
              <!--<th lay-data="{field:'tjurl', width:100}">来源地址</th>
              <th lay-data="{field:'body', width:150}">订单描述</th> -->
              <th lay-data="{field:'status', width:110}">状态</th>
              <th lay-data="{field:'op',width:150,fixed:'right'}">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>

                <td style="text-align:center;"><?php echo ($vo["pay_zh_tongdao"]); ?></td>
                <td style="text-align:center; color:#060"><?php echo ($vo["pay_amount"]); ?></td>
                <td style="text-align:center;"><?php echo (date('m-d H:i:s',$vo["pay_applydate"])); ?></td>
                <td style="text-align:center; color:#090;"><?php echo ($vo[pay_orderid]); ?>
                  <?php if($vo["del"] == 1): ?><span style="color: #f00;">×</span><?php endif; ?>
                </td>
                <td style="text-align:center; color:#090;"><?php echo ($vo[out_trade_id]?$vo[out_trade_id]:$vo[pay_orderid]); ?>
                  <?php if($vo["del"] == 1): ?><span style="color: #f00;">×</span><?php endif; ?>
                </td>
                <td style="text-align:center;"><?php echo ($vo["pay_memberid"]); ?></td>

                <!--<td style="text-align:center;"><?php echo ($vo["memberid"]); ?></td> -->
                <!--<td style="text-align:center;"><?php echo ($vo["pay_bankname"]); ?></td>-->
                <!--<td style="text-align:center;"><a href="<?php echo ($vo["pay_tjurl"]); ?>" target="_blank" title="<?php echo ($vo["pay_tjurl"]); ?>">
                  来源地址</a></td>
                <td style="text-align:center;"><?php echo ($vo["pay_productname"]); ?></td> -->
                <td style="text-align:center; color:#369"><?php echo (status($vo['pay_status'])); if(($vo["is_budan"]) == "1"): ?><span class="layui-badge">补</span><?php endif; ?></td>
                <td>

                 
                  <?php if(($vo["pay_status"]) == "0"): if($fans['balance'] > $vo['pay_amount']): ?><button  class="layui-btn layui-btn-small layui-btn-warm" onclick="qiangdan(this,'<?php echo ($vo["id"]); ?>')">抢单</button>
                      <?php else: ?>
                      <button  class="layui-btn layui-btn-small layui-btn-danger">余额不足</button><?php endif; endif; ?>

                </td>
              </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
          </table>
          <!--交易列表-->
          <div class="page">
              <form class="layui-form" action="" method="get" id="pageForm"  autocomplete="off">
                <?php echo ($page); ?>
                  <select name="rows" style="height: 29px;" id="pageList" lay-ignore >
                      <option value="">显示条数</option>
                     <option <?php if($rows != '' && $rows == 30): ?>selected<?php endif; ?> value="30">30条</option>
                    <option <?php if($rows == 40): ?>selected<?php endif; ?> value="40">40条</option>
                      <option <?php if($rows == 50): ?>selected<?php endif; ?> value="50">50条</option>
                      <option <?php if($rows == 80): ?>selected<?php endif; ?> value="80">80条</option>
                      <option <?php if($rows == 100): ?>selected<?php endif; ?> value="100">100条</option>
                  </select>
              </form>
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
<script src="/Public/Front/js/Util.js" charset="utf-8"></script>
<script src="/Public/Front/js/echarts.common.min.js"></script>
<script>
      $('#pageList').change(function(){
        $('#pageForm').submit();
    });
    layui.use(['laydate', 'laypage', 'layer', 'table', 'form'], function() {
        var laydate = layui.laydate //日期
            , laypage = layui.laypage //分页
            ,layer = layui.layer //弹层
            ,form = layui.form //表单
            , table = layui.table; //表格
        //日期时间范围
        laydate.render({
            elem: '#createtime'
            , type: 'datetime'
            ,theme: 'molv'
            , range: '|'
        });
        //日期时间范围
        laydate.render({
            elem: '#successtime'
            , type: 'datetime'
            ,theme: 'molv'
            , range: '|'
        });
    });
    /*订单-查看*/
    function order_view(title,url,w,h){
        x_admin_show(title,url,w,h);
    }
    /*订单-批量删除*/
    function delAllOrder(title, url, w, h) {
        x_admin_show(title, url, w, h);
    }
    /*订单-设置订单状态为已支付*/
      function setOrderPaid(title, url, w, h) {
          x_admin_show(title, url, w, h);
      }
    $('#export').on('click',function(){
        window.location.href
            ="<?php echo U('Admin/Order/exportorder');?>?memberid=<?php echo ($_GET[memberid]); ?>&orderid=<?php echo ($_GET[orderid]); ?>&pay_orderid=<?php echo ($_GET[pay_orderid]); ?>&createtime=<?php echo ($_GET[createtime]); ?>&successtime=<?php echo ($_GET[successtime]); ?>&tongdao=<?php echo ($_GET[tongdao]); ?>&bank=<?php echo ($_GET[bank]); ?>&status=<?php echo ($_GET[status]); ?>&ddlx=<?php echo ($_GET[ddlx]); ?>";
    });
      function qiangdan(obj, id) {
          layer.confirm('确认要抢该订单吗？', function (index) {
              $.ajax({
                  url:"./Code_order_qiangdan.html",
                  type:'post',
                  data:'orderid='+id,
                  success:function(res){
                      if(res.status=="1"){
                          layer.alert('抢单成功！',function () {
                              location.replace(location.href);
                          });
                      }else{
                          layer.alert(res.msg);
                      }
                  }
              });
          });
      }

    
    
    var myChart = echarts.init(document.getElementById('dmonth'));
    myChart.setOption({
        tooltip : {
            trigger: 'axis',
            axisPointer: {
                type: 'cross',
                label: {
                    backgroundColor: '#6a7985'
                }
            }
        },
        legend: {
            data:['交易金额','收入金额','支出金额']
        },
        toolbox: {
            feature: {
                saveAsImage: {}
            }
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        xAxis : [
            {
                type : 'category',
                boundaryGap : false,
                data : [<?php echo (implode($mdata["mdate"],",")); ?>]
            }
        ],
        yAxis : [
            {
                type : 'value'
            }
        ],
        series : [
            {
                name:'交易金额',
                type:'line',
                stack: '总量',
                areaStyle: {normal: {}},
                data:[<?php echo (implode($mdata["amount"],",")); ?>]
            },
            {
                name:'收入金额',
                type:'line',
                stack: '总量',
                areaStyle: {normal: {}},
                data:[<?php echo (implode($mdata["rate"],",")); ?>]
            },
            {
                name:'支出金额',
                type:'line',
                stack: '总量',
                areaStyle: {normal: {}},
                data:[<?php echo (implode($mdata["total"],",")); ?>]
            },
        ]
    });

</script>
</body>
</html>