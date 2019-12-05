<?php
 header('Content-type: application/json');
require 'db.class.php';
require 'config.php';
$mysql = new MMysql($configArr);
$count = 0;
$max_count = 25;
date_default_timezone_set('PRC');
$result = new stdClass();
$mark_sell = $_GET["mark_sell"];
if($mark_sell == ""){
	echo json_encode(array('code'=>0,"msg"=>"数据异常"));die;
}
do {
  if (function_exists('sleep')) {
    sleep(1);

  } else {
    time_sleep_until(time() + 1);//很多垃圾服务器不支持用sleep(1);
  }

  $result = $mysql->where(['pay_orderid'=>$mark_sell])->find("pay_order");

  //$result = pdo_get('alu_fbsk_paytask', array('uniacid' => $_W['uniacid'], 'mark_sell' => $mark_sell, 'status' => 0));
  $count++;

} while (strlen($result['qrurl']) < 1 && $count < $max_count);

if ($result['qrurl']) {
  exit(json_encode(array('code'=>1,'url'=>$result['qrurl'])));
}
echo json_encode(array('code'=>0,"msg"=>"获取失败"));