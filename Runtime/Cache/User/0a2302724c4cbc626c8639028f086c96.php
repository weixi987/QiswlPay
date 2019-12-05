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
      <div class="ibox-title">
        <h5 style="margin:0">商户名称：<?php echo ($fans["username"]); ?></h5><h5>&nbsp;&nbsp;商户ID：<?php echo ($fans["memberid"]); ?></h5>
      </div>
      <div class="ibox-content">
        <p>登录IP：<?php echo ($lastlogin["loginip"]); ?>，登录地址：<?php echo ($lastlogin["loginaddress"]); ?>，登录时间：<?php echo ($lastlogin["logindatetime"]); ?></p>
        <?php if(!empty($ipItem)): ?><p>可登录IP：
            <?php if(is_array($ipItem)): foreach($ipItem as $k=>$v): ?>[<?php echo ($k); ?>]<?php echo ($v); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php endforeach; endif; ?>
        </p><?php endif; ?>
      </div>
    </div>
  </div>
</div>
<?php if(($fans[groupid]) == "4"): ?><div class="row zuy-nav">
  <div class="col-sm-3">
    <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h5><?php echo ($stat["todayordercount"]); ?></h5>
      </div>
      <div class="ibox-content" style="height: 67px">
        <h1 class="no-margins">今日总订单数（单）</h1>
        <i class="iconfont icon-qianbao" style="color: #edf7fe;"></i>
      </div>
    </div>
  </div>
  <div class="col-sm-3" >
    <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h5><?php echo ($stat["todayorderpaidcount"]); ?></h5>
      </div>
      <div class="ibox-content" style="height: 67px">
        <h1 class="no-margins">今日已付订单数（单）</h1>
        <i class="iconfont icon-tuiguangzhuanqian" style="color: #eafaf7;"></i>
      </div>
    </div>
  </div>
    <div class="col-sm-3">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5><?php echo ($stat["todayordernopaidcount"]); ?></h5>
        </div>
        <div class="ibox-content" style="height: 67px">
          <h1 class="no-margins">今日未付订单（单）</h1>
          <i class="iconfont icon-iconfontjikediancanicon20" style="color: #fff6f0;"></i>
        </div>
      </div>
  </div>
  <div class="col-sm-3">
    <div class="ibox float-e-margins">
      <div class="ibox-title">
        <h5><?php echo ($stat["todayordersum"]); ?></h5>
      </div>
      <div class="ibox-content" style="height: 67px">
        <h1 class="no-margins">今日总订单额（元）</h1>
        <i class="iconfont icon-ticket_fill" style="color: #fff8e6;"></i>
      </div>
    </div>
  </div>
</div><?php endif; ?>
  <div class="row zuy-nav">
    <?php if(($fans[groupid]) == "4"): ?><div class="col-sm-3" style="height: 140px">
        <div class="ibox float-e-margins">
          <div class="ibox-title">
            <h5><?php echo ($stat["todayorderactualsum"]); ?></h5>
          </div>
          <div class="ibox-content" style="">
            <h1 class="no-margins">今日到账金额（元）</h1>
            <i class="iconfont icon-shourusel" style="color: #eff2fe;"></i>
            <small>　</small>
          </div>
        </div>
      </div><?php endif; ?>

      <div class="col-sm-3" style="height: 140px">
        <div class="ibox float-e-margins">
          <div class="ibox-title">
            <h5><?php echo ($fans["yckbalance"]); ?></h5>
          </div>
          <div class="ibox-content" style="">
            <h1 class="no-margins">预存款金额（元）</h1>
            <i class="iconfont icon-shourusel" style="color: #eff2fe;"></i>
            <small><a href="<?php echo U('Account/chongzhi');?>">预存款充值</a></small>
          </div>
        </div>
      </div>

    <div class="col-sm-3">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5><?php echo ($fans['balance']); ?></h5>
        </div>
        <div class="ibox-content">
          <h1 class="no-margins">余额（元）</h1>
          <i class="iconfont icon-shouru" style="color: #f0faf8;"></i>
          <small>账户余额<?php echo $fans['balance']?></small>
        </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5><?php echo ($fans['blockedbalance']); ?></h5>
        </div>
        <div class="ibox-content">
          <h1 class="no-margins">冻结（元）</h1>
          <i class="iconfont icon-cunqianguan" style="color: #fff1f3;"></i>
          <small>待解冻</small>
        </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5><?php echo ($stat["complaints_deposit"]); ?></h5>
        </div>
        <div class="ibox-content">
          <h1 class="no-margins">投诉保证金（元）</h1>
          <i class="iconfont icon-huabanfuben" style="color: #fffbe8;"></i>
          <small>待解冻</small>
        </div>
      </div>
    </div>
</div>
  <div class="row">

    <div class="col-sm-12">
      <div class="ibox float-e-margins">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5 style="margin: 0">站内公告</h5>
        </div>
        <div class="ibox-content" style="padding:14px 20px;">
          <ul class="list-unstyled">
            <?php if(is_array($gglist)): $i = 0; $__LIST__ = $gglist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><?php echo (date("Y-m-d",$vo["createtime"])); ?> <a href="<?php echo U('Index/showcontent',['id'=>$vo['id']]);?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5 style="margin: 0">日交易统计</h5>
        </div>
        <div class="ibox-content">
          <div id="main" style="height:300px"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-describedby="tscontent" data-backdrop="static" ajaxurl="<?php echo U("Dealmanages/dealindexload");?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close modalgb" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"> <span>订单号：</span> <span id="orderidModal" style="color:#060;"></span> </h4>
      </div>
      <div class="modal-body" id="dealcontent" style="color:#000; font-family:'微软雅黑';"> 
        <!--------------------------------------------------------------------------------------------------->
        <table class="table table-condensed">
           <tr style="display:none;">
            <td style="text-align:left;">订单号：<span style="color:#090;"></span></td>
          </tr>
          <tr>
            <td style="text-align:left;">交易金额：<span style="color:#060; font-weight:bold;"></span> 元</td>
          </tr>
          <tr>
            <td style="text-align:left;">手续费：<span style="color:#666; font-weight:bold;"></span> 元</td>
          </tr>
          <tr>
            <td style="text-align:left;">实际金额：<span style="color:#C00; font-weight:bold;"></span> 元</td>
          </tr>
          <tr>
            <td style="text-align:left;">提交时间：<span style="color:#F00;"></span></td>
          </tr>
          <tr>
            <td style="text-align:left;">成功时间：<span style="color:#F00;"></span></td>
          </tr>
           <tr>
            <td style="text-align:left;">交易通道：<span></span></td>
          </tr>
           <tr>
            <td style="text-align:left;">交易银行：<span></span></td>
          </tr>
          <tr>
            <td style="text-align:left;">提交地址：<span></span></td>
          </tr>
          <tr>
            <td style="text-align:left;">页面通知返回地址：<span></span></td>
          </tr>
           <tr>
            <td style="text-align:left;">服务器点对点返回地址：<span></span></td>
          </tr>
           <tr>
            <td style="text-align:left;">状态：<span></span>&nbsp;&nbsp;<span></span></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table>
        <!---------------------------------------------------------------------------------------------------> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default modalgb" data-dismiss="modal">关闭</button>
      </div>
    </div>
  </div>
</div>

<!-- 全局js -->
<script src="<?php echo ($siteurl); ?>Public/Front/js/jquery.min.js"></script>
<script src="<?php echo ($siteurl); ?>Public/Front/js/bootstrap.min.js"></script>
<script src="<?php echo ($siteurl); ?>Public/Front/js/content.js?v=1.0.0"></script>
<script src="/Public/Front/js/echarts.common.min.js"></script>
<script type="text/javascript">
    var myChart = echarts.init(document.getElementById('main'));
    var option = {
        grid:{
            x:50,
            x2:20,
            y:70,
            y2:40,
            borderWidth:1
        },
        title : {
            text: '交易订单概况',
            subtext: '按天统计'
        },
        tooltip : {
            trigger: 'axis'
        },
        legend: {
            data:['成交','金额']
        },
        toolbox: {
            show : true,
            feature : {
                mark : {show: true},
                dataView : {show: true, readOnly: false},
                magicType : {show: true, type: ['line', 'bar', 'stack', 'tiled']},
                restore : {show: true},
                saveAsImage : {show: true}
            }
        },
        calculable : true,
        xAxis : [
            {
                type : 'category',
                boundaryGap : false,
                data : <?php echo ($category); ?>
            }
        ],
        yAxis : [
          {
            splitLine:{
              show: true,
              lineStyle:{
                type:"dashed",
                color:"#dfdfdf"
              }
            },
            axisLabel:{
              textStyle:{
                fontSize:14,
                color:'#5b6e89'
              }
            },
            type : 'value'
          }
        ],
        series : [
            {
                name:'成交',
                type:'line',
                smooth:true,
                itemStyle: {
                    normal: {
                      areaStyle: {
                        type: 'default',
                        color: {
                          type: 'linear',
                          x: 0,
                          y: 0,
                          x2: 0,
                          y2: 1,
                          colorStops: [{
                            offset: 0, color: '#ffe9da'
                          }, {
                            offset: 1, color: '#ffffff'
                          }],
                          globalCoord: false
                        }
                      }
                      ,color:'#ff8b88'
                    }
                },
                data:<?php echo ($dataone); ?>
            },
            {
                name:'金额',
                type:'line',
                smooth:true,
                itemStyle: {
                  normal: {
                    areaStyle: {
                      type: 'default',
                              color: {
                        type: 'linear',
                                x: 0,
                                y: 0,
                                x2: 0,
                                y2: 1,
                                colorStops: [{
                          offset: 0, color: '#e7dde7'
                        }, {
                          offset: 1, color: '#ffffff'
                        }],
                                globalCoord: false
                      }
                    }
                  ,color:'#6e94ff'
                  }
                },
                data:<?php echo ($datatwo); ?>
            }
        ]
    };

    // 为echarts对象加载数据
    myChart.setOption(option);
</script>
</body>
</html>