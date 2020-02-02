<?php
namespace Pay\Controller;
use MoneyCheck;
require_once("redis_util.class.php");
class ClientController extends PayController
{
    public function __construct()
    {
        parent::__construct();
    }  
   

     public function notify()
    {
        $res = I('get.');
        //if($res['key'] != 'q1234567*')die();
        //http://qpay.heropay.net/Pay_Client_notify.html?act=Mcode_notify&key=123456&pid=q11&money=0.10&type=alipay&t=1579539350&data=ZGFQlBKWVdOMFBVMWpiMlJsWDI1dmRHbG1lV3RsZVQweE1qTTBOVFp3YVdROWNURXhkRDB4TlRjNU5UTTVNelV3
        
        if(isset($res['money'])){
            $this->callback($res);
        }else{
            $resp = [
                "code" => 1,
                "msg" => "登录成功!",
                "pid" => $res['pid'],
                "nowordermoney" => "0.00",
                "qq" => "00000",
                "alipid" => "",
                "wxhao" => "",
                "alione" => "17109642564",
                "alitwo" => "",
                "nxyhao" => "",
                "dxhao" => "",
                "alicardhao" => "",
                "groupid" => "172",
                "money" => "0.00",
                "paymb" => "19999.94",
                "active" => 1
            ];
            echo json_encode($resp);
        }
    }

    private function callback($res)
    {
        file_put_contents('./Data/Client.txt', "【".date('Y-m-d H:i:s')."】回调结果：\r\n".json_encode($res)."\r\n\r\n",FILE_APPEND);
        $time = $res['t'];  //到账时间戳
        $machine = $res['pid']; //设备号
        //$content = $res['content'];  
        $amount = $res['money'];
        $map['pay_applydate'] = ['GT',time()-300];  //查询条件1  当前时间到过去5分钟内的订单
        $map['pay_amount'] = ['EQ',$amount];    //查询条件2   金额一致     
        $map['pay_status'] = ['EQ','0'];     //查询条件3   状态为未支付
        $map['account_id'] = ['EQ',$machine]; //查询条件4 渠道账号 
        $query = M('Order')->where($map)->find();

        if($query){
            $moneyCheck = new moneyCheck();
            $isSystemOrder = $moneyCheck->checkAccountMoney($query['account_id'],$amount);
            if($isSystemOrder){
                //不是系统订单
                file_put_contents('./Data/Client.txt', "【".date('Y-m-d H:i:s')."】回调结果：\r\n".json_encode($_REQUEST)."\r\n\r\n",FILE_APPEND);
                echo "非系统订单";die;
            }
            $this->EditMoney($query['pay_orderid'],'ZfbMayi',0); 
            $moneyCheck->deletAccountKey($query['account_id'],$amount);
            echo 'success';
        }else{
            echo 'no order';
        }
    }

    public function checkCard($content=null)
    {  
        
        $amount = strstr(substr(strstr($content,'款'),3),'元',true);
           
    	return $amount;
    	
    }


    public function isMobile2(){
        $useragent=isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
        $useragent_commentsblock=preg_match('|\(.*?\)|',$useragent,$matches)>0?$matches[0]:'';
        function CheckSubstrs($substrs,$text){
            foreach($substrs as $substr)
                if(false!==strpos($text,$substr)){
                    return true;
                }
            return false;
        }
        $mobile_os_list=array('Google Wireless Transcoder','Windows CE','WindowsCE','Symbian','Android','armv6l','armv5','Mobile','CentOS','mowser','AvantGo','Opera Mobi','J2ME/MIDP','Smartphone','Go.Web','Palm','iPAQ');
        $mobile_token_list=array('Profile/MIDP','Configuration/CLDC-','160×160','176×220','240×240','240×320','320×240','UP.Browser','UP.Link','SymbianOS','PalmOS','PocketPC','SonyEricsson','Nokia','BlackBerry','Vodafone','BenQ','Novarra-Vision','Iris','NetFront','HTC_','Xda_','SAMSUNG-SGH','Wapaka','DoCoMo','iPhone','iPod');

        $found_mobile=CheckSubstrs($mobile_os_list,$useragent_commentsblock) ||
            CheckSubstrs($mobile_token_list,$useragent);

        if ($found_mobile){
            return true;
        }else{
            return false;
        }
    }

}
