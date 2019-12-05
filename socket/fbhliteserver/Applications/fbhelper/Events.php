<?php
/**
 * This file is part of workerman.
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the MIT-LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @author walkor<walkor@workerman.net>
 * @copyright walkor<walkor@workerman.net>
 * @link http://www.workerman.net/
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */

/**
 * 用于检测业务代码死循环或者长时间阻塞等问题
 * 如果发现业务卡死，可以将下面declare打开（去掉//注释），并执行php start.php reload
 * 然后观察一段时间workerman.log看是否有process_timeout异常
 */
//declare(ticks=1);

use \GatewayWorker\Lib\Gateway;

require_once __DIR__.'/../../vendor/Connection.php';
//require_once __DIR__.'/../../vendor/workerman/MYSQL/src/Connection.php';
/**
 * 主逻辑
 * 主要是处理 onConnect onMessage onClose 三个方法
 * onConnect 和 onClose 如果不需要可以不用实现并删除
 */
class Events
{

    public static $db = null;

    public static function onWorkerStart($worker)
    {
        self::$db = new \Workerman\MySQL\Connection('127.0.0.1', '3306', 'qiswljuhe', 'xBfaJxN5bzRkwY25', 'qiswljuhe');
    }
    /**
     * 当客户端连接时触发
     * 如果业务不需此回调可以删除onConnect
     *
     * @param int $client_id 连接id
     */
    public static function onConnect($client_id)
    {

        // Gateway::sendToAll(json_encode(array('account'=>$client_id,'cmd'=>'login')));
    }

    /**
     * 当客户端发来消息时触发
     * @param int $client_id 连接id
     * @param mixed $message 具体消息
     */
    public static function onMessage($client_id, $message)
    {
      
        file_put_contents('./req22.txt', "【".date('Y-m-d H:i:s')."】\r\n".$message."\r\n\r\n",FILE_APPEND);
        $data = json_decode($message,true);
      	if($data['type']=="login"){
           Gateway::sendToClient($client_id,$message);
           if($data['params']['alipay_id']){
                Gateway::bindUid($client_id,$data['params']['alipay_id']);
           }elseif($data['deveice']){
                file_put_contents('./req.txt', "【".date('Y-m-d H:i:s')."】\r\n".$message."\r\n\r\n",FILE_APPEND);
                Gateway::bindUid($client_id,$data['deveice']);
           }elseif($data['account']){
              Gateway::bindUid($client_id,$data['account']);
           }else{
              Gateway::bindUid($client_id,$data['uid']);
           }
 
        }
        //心跳
        if($data['type']=="xintiao"){
            file_put_contents('./xintiao.txt', "【".date('Y-m-d H:i:s')."】\r\n".$message."\r\n\r\n",FILE_APPEND);
            $id=$data['memberId'];
            $time=time();
            // {"account":"192238833341762","memberId":"330","type":"ysf"}
            $row_count = self::$db->update('pay_channel_account')->cols(array('status'=>1,'last_online_time'=>$time))->where("id = '$id'")->query();
        }
        //云闪付
        if($data['qrCode']){
            if($data['lx']=='ysf'){
                $orderid=$data['remark'];
            
                $row_count = self::$db->update('pay_order')->cols(array('qrurl'=>$data['qrCode']))->where("pay_orderid = '$orderid'")->query();
            }elseif($data['lx']=='nongxin'){
                $notify="http://www.cfepay.net/Pay_Nxys_getnums.html";
                $url = $notify."?".http_build_query($data);
                file_get_contents($url);
            }

            
        }
        //获取搜索码
        if($data['searchCode']){
          file_put_contents('./req2.txt', "【".date('Y-m-d H:i:s')."】\r\n".$message."\r\n\r\n",FILE_APPEND);
              //Gateway::sendToUid(8,$message);
          $url = $data['searchCode'];
          $mark_sell = $data['mark'];          
          $row_count = self::$db->query("UPDATE `pay_order` SET `qrurl` = '$url' WHERE id = '$mark_sell'");
        }
      
        switch ($data['cmd']){
            //如果来路类型是支付申请，将根据该支付申请涉及到的用户 直接返回
            case 'req':
             Gateway::sendToUid($data['account'],$message);
             file_put_contents('./req.txt', "【".date('Y-m-d H:i:s')."】\r\n".$message."\r\n\r\n",FILE_APPEND);
                break;
            case 'req2':
            // Gateway::sendToAll($message);
             Gateway::sendToUid(10005,$message);

             file_put_contents('./req2.txt', "【".date('Y-m-d H:i:s')."】\r\n".$message."\r\n\r\n",FILE_APPEND);
                break;
            case 'login':
                Gateway::sendToClient($client_id,$message);
                Gateway::bindUid($client_id,$data['account']);
                file_put_contents('./bind.txt', "【".date('Y-m-d H:i:s')."】\r\n".$client_id."|".$data['params']['alipay_id']."\r\n\r\n",FILE_APPEND);

                break;

            case 'trade':
                file_put_contents('./req2.txt', "【".date('Y-m-d H:i:s')."】\r\n".$message."\r\n\r\n",FILE_APPEND);
                $mark_sell = $data['remark'];
                $pay_time = $data['paytime'];
                $order_id = $data['trade_no'];
                $money = $data['money'];
                $sign = $data['sign'];
                $type= $data['type'];
                if($type=='ysf'){
                  $notify="http://www.cfepay.net/Pay_Ycloud_notifyurl.html";
                  $param['orderid'] = $data['remark'];
                  $param['money'] = $data['money'];
                  $param['sign'] = md5($param['orderid'].$param['money']."aabbccddefg");
                  
                  $url = $notify."?".http_build_query($param);
                  file_get_contents($url);
                }
                $order = self::$db->row("SELECT * FROM `pay_order` WHERE id='$mark_sell'");
                // if($order){
                  	
                //   	if($order['pay_status'] != 1){
                   
                //     	// $res = self::$db->query("UPDATE `db_orderqr` SET `order_id` = '$order_id', `status` = '1',`end_time` = '$pay_time' WHERE mark_sell = '$mark_sell' AND money = '$money'");
                //       	$param['orderid'] = $data['remark'];
                //       	$param['money'] = $data['money'];
                //       	$param['sign'] = md5($param['orderid'].$param['money']."123456");
                      	
                //       	$url = $order['notifyurl']."?".http_build_query($param);	
                //       	file_get_contents($url);
                //     }
                // }
                if($order){
                    Gateway::sendToClient($client_id,json_encode(array('cmd'=>'trade','trade_no'=>$order_id)));
                }

                break;

            case 'getqr':
                file_put_contents('./req2.txt', "【".date('Y-m-d H:i:s')."】\r\n".$message."\r\n\r\n",FILE_APPEND);
            	//Gateway::sendToUid(8,$message);
                $url = $data['printqrcodeurl'];
                $mark_sell = $data['remark'];
                $time = time();
                
                $row_count = self::$db->query("UPDATE `pay_order` SET `qrurl` = '$url' WHERE id = '$mark_sell'");
                break;

            case 'pong':
                return;
                break;

            case 'ping':
                return;
                break;



        }
    }



    /**
     * 当用户断开连接时触发
     * @param int $client_id 连接id
     */
    public static function onClose($client_id)
    {
        // 向所有人发送
        // GateWay::sendToAll("$client_id logout\r\n");
    }
}
