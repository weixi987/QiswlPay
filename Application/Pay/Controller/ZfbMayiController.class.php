<?php
namespace Pay\Controller;
use MoneyCheck;
require_once("redis_util.class.php");
class ZfbMayiController extends PayController
{
    public function __construct()
    {
        parent::__construct();
    }  
    public function Pay($array=null)
    {
		
        $orderid = I("request.pay_orderid");
        $body = I('request.pay_productname','vip');
        $notifyurl = $this->_site . 'Pay_ZfbMayi_notify.html'; //异步通知
        $callbackurl = $this->_site . 'Pay_ZfbMayi_callbackurl.html'; //跳转通知
        $pay_amount = I("post.pay_amount", 0);
        $moneyCheck = new MoneyCheck();
        
        $parameter = array(
            'code' => 'ZfbMayi',       // 通道代码
            'title' => 'zfb原生',       //通道名称
            'exchange' => 1,           // 金额比例
            'gateway' => '',            //网关地址
            'orderid' => '',            //平台订单号（有特殊需求的订单号接口使用）
            'out_trade_id'=>$orderid,   //外部商家订单号
            'body'=>$body,              //商品名称
            'channel'=>$array,          //通道信息
        );   
        $return = $this->orderadd($parameter);
        while (!$moneyCheck->checkAccountMoney($return['account_id'],$pay_amount)) {
           $pay_amount=$pay_amount-0.01;
           
        }
        $checkResult = $moneyCheck->setAccountKey($return['account_id'],$pay_amount);
        if($checkResult){
            if($pay_amount!=$return['amount']){
            	M('Order')->where(['pay_orderid'=>$return['orderid']])->setField(['pay_amount'=>$pay_amount]);
            }
        }else{
            $this->showmessage('账户:交易量过大，限制交易！');
        }
        $cardNo = $return['signkey'];
        $bankAccount = $return['mch_id']; 
        $money = $pay_amount;     //支付金额
        $bankMark = $return['appid'];
        $bankName = $return['appsecret'];
        $index = $return['zfb_pid']; //cardIndex
        
        $codeurl="https://d.alipay.com/i/index.htm?iframeSrc=".urlencode($ppurl);
        $codeurl=str_replace("%2A%2A%2A%2A","****",$codeurl); 

        $unlockdomain = trim($return['unlockdomain']);
        $host = $unlockdomain?'@'.$unlockdomain:'';
        $payurl = U('ZfbMayi/detail'.$host,array('id'=>$return['orderid']),true,true);
        $newurl2="alipays://platformapi/startapp?appId=60000029&showLoading=YES&url=".urlencode($payurl);
        $this->assign('payurl',$newurl2);
        $this->assign('orderlasttime',300);
        // $this->assign('url_direct',$url1);
		$this->assign('url_direct',$newurl2);
     	
        $this->assign('params', $return);
        $this->assign('appid', $bankMark);
        $this->assign('orderid', $return['orderid']);
        $this->assign('money', $pay_amount);
        //https://render.alipay.com/p/s/i?scheme=alipays://platformapi/startapp?saId=10000007&qrcode=%68%74%74%70%73%3A%2F%2F%71%72%2E%61%6C%69%70%61%79%2E%63%6F%6D%2F%66%6B%78%31%36%37%34%35%79%77%6B%6E%63%67%69%64%79%77%65%75%63%39%62%3F%5F%73%3D%77%65%62%2D%6F%74%68%65%72
        $url = "alipays://platformapi/startapp?appId=60000002&url=".urlencode($payurl);
        $this->assign("url",$url);
        if($this->isMobile2()){
            $this->display("WeiXin/mayijump");
        }else{
            echo "";
        }
	
   }

   public function detail(){
        $id=I('request.id/s');
        if (empty($id)) {
            $this->showmessage("订单不存在!");
        }
        $order=M('Order')->where(['pay_orderid'=>$id])->find();
        if (!$order) {
            $this->showmessage("订单不存在!");
        }
        /*
        $tt=time()-$order['pay_applydate'];
        $lasttime=300-$tt;
        if($lasttime<0){
            $lasttime=0;
        }
        */
       
        $account=M('ChannelAccount')->where(['id'=>$order['account_id']])->find();
      
        $money = $order['pay_amount'];    //支付金额
       
        $index = $account['zfb_pid']; //cardIndex
       
        //$this->assign('orderlasttime',$lasttime);
        $this->assign('orderid',$id);
       
        $this->assign('amount',$money);
        $this->assign('index',$index);
        $this->assign('m',rand(1234,99999));
        $this->display('WeiXin/mayi');

    }

   
    public function callbackurl()
    {
        $this->display('WeiXin/success');
    }

    public function getstatus(){
        $orderid = I('request.id/s');
        $orderWhere['pay_orderid'] =$orderid;
        $order = M('Order')->where("pay_orderid={$orderid}")->find();
        if (!is_array($order)){
            $return['code']=-1;
            $return['msg']='交易号不存在！';
            $this->ajaxReturn($return,'JSON');
        } 
        
        if ($order['pay_status'] == 0) {
            if (($order['pay_applydate'] + 299) < time()) {
                 M('Order')->where(['pay_orderid'=>$orderid])->setField(['pay_status'=>3]);
                $return['code']=-1;
                $return['msg']='当前订单已经过期,请重新发起支付！';
                $this->ajaxReturn($return,'JSON');
            }
            if($order['key']){
                import("Vendor.phpqrcode.phpqrcode",'',".php");
                $QR = "Uploads/codepay/". $order['pay_orderid'] . ".png";
                \QRcode::png($order['key'], $QR, "L", 20);
                $return['code']=100;
                $return['msg']='请扫码支付';
                $return['data']['qrcode']='/'.$QR;
                $return['data']['name']=$order['pay_channel_account'];
                $this->ajaxReturn($return,'JSON'); 
            }else{
                $return['code']=300;
                $return['msg']='等待接单中';
                // $return['data']['qrcode']=$order['account'];
                $this->ajaxReturn($return,'JSON'); 
            }
                       
        }
        if ($order['status'] == 3){
                $return['code']=-1;
                $return['msg']='当前订单已经过期,请重新发起支付！';
                $this->ajaxReturn($return,'JSON');
        }
        if ($order['pay_status'] == 2 ||$order['pay_status'] == 1){
            $return['code']=200;
                $return['msg']='当前订单已经支付成功!';
                $this->ajaxReturn($return,'JSON');
            
        }
    }

     public function notify()
    {
        $res = I('post.');
        file_put_contents('./Data/ZfbMayi.txt', "【".date('Y-m-d H:i:s')."】回调结果：\r\n".json_encode($res)."\r\n\r\n",FILE_APPEND);
        $time = strtotime($res['time']);  //到账时间戳
        $machine = $res['machine_num']; //设备号
        $content = $res['content'];  
        $amount = $this->checkCard($content);
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
                file_put_contents('./Data/ZfbMayisystemfail.txt', "【".date('Y-m-d H:i:s')."】回调结果：\r\n".json_encode($_REQUEST)."\r\n\r\n",FILE_APPEND);
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
    	
        $amount = strstr(substr(strstr($content,'向你付款'),12),'元',true);
           
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
