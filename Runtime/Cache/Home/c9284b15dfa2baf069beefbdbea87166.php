<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title><?php echo empty($page_title) ? C('WEB_SITE_TITLE') : $page_title; ?></title>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
    <meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
    <meta content="no-cache" http-equiv="pragma">
    <meta content="0" http-equiv="expires">
    <meta content="telephone=no, address=no" name="format-detection">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/mobile_module.css?v=<?php echo SITE_VERSION;?>" media="all">
    <script type="text/javascript">
		//静态变量
		var IMG_PATH = "/Public/Home/images";
		var STATIC_PATH = "/Public/static";
		var SITE_URL = "<?php echo SITE_URL;?>";
		var WX_APPID = "<?php echo ($jsapiParams["appId"]); ?>";
		var	WXJS_TIMESTAMP='<?php echo ($jsapiParams["timestamp"]); ?>'; 
		var NONCESTR= '<?php echo ($jsapiParams["nonceStr"]); ?>'; 
		var SIGNATURE= '<?php echo ($jsapiParams["signature"]); ?>';
	</script>
    <script type="text/javascript" src="/Public/static/jquery-2.0.3.min.js"></script>
	<script type="text/javascript" src="http://yaotv.qq.com/shake_tv/include/js/lib/zepto.1.1.4.min.js"></script>
	<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
	<script type="text/javascript" src="minify.php?f=/Public/Home/js/prefixfree.min.js,/Public/Home/js/m/dialog.js,/Public/Home/js/m/flipsnap.min.js,/Public/Home/js/m/mobile_module.js&v=<?php echo SITE_VERSION;?>"></script>
</head>
<link href="<?php echo ADDON_PUBLIC_PATH;?>/mobile/common.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo ADDON_PUBLIC_PATH;?>/mobile/shop.js?v=<?php echo SITE_VERSION;?>"></script>
<body class="withFoot">
    <div class="container">
    	<div class="order_detail">
    	<div class="order">
        	<h3 class="mb_10">订单号:<?php echo ($info["order_number"]); ?></h3>
            <?php if(is_array($info["goods"])): $i = 0; $__LIST__ = $info["goods"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gg): $mod = ($i % 2 );++$i;?><img src="<?php echo (get_cover_url($gg["cover"])); ?>"/>
            <p class="info">
            	<?php echo ($gg["title"]); ?>
                <br/>购买数量：<?php echo ($gg["num"]); ?>
                <br/>价格:<?php echo ($gg[price]*$gg[num]); ?>元
            </p><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div class="order_adress">
        	<p class="info">
            	收件人：<?php echo ($addressInfo["truename"]); ?><br/>
                联系方式：<?php echo ($addressInfo["mobile"]); ?><br/>
                收货地址：<?php echo ($addressInfo["address"]); ?><br/>
            </p>
        </div>
         <div class="order_action">
        	
            	<?php if($info[pay_status]==0 && $info[pay_type]!=10): ?><p class="wait_pay">等待付款中...</p>
                    <div class="m_15">
                    <a href="<?php echo U('choose_pay');?>&order_id=<?php echo ($info["id"]); ?>" class="btn">立即付款</a>
                    </div>
                <?php else: ?>
                	<?php if(($info[is_send]) == "0"): ?><p>等待卖家发货</p>
                    <?php else: ?>
                    	<p>商品已发货&nbsp;&nbsp;&nbsp;</p>
                        <p>发货方式:<?php echo ($info["send_code_name"]); ?></p>
                        <p>快递单号:<?php echo ($info["send_number"]); ?></p>
                        <p class="m_10"><?php if($info['status_code']==3): ?><a class="btn" href="javascript:;" onClick="confirmGetGoods('<?php echo U('confirm_get',array('id'=>$info[id]));?>');">确认收货</a><?php endif; ?></p>
                        <div class="shipping_info" style="display:">
                            <?php if(is_array($log)): $i = 0; $__LIST__ = $log;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><P><span><?php echo (time_format($vo["cTime"])); ?> </span></P>
                                <p><?php echo ($vo["remark"]); ?></p>
                                <p>&nbsp;</p><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div><?php endif; endif; ?>
            
        </div>
         
        </div>
    </div>	
    <!-- 底部导航 -->
    <div class="bottom_menu"> 
<a class="home" href="<?php echo U('index', array('shop_id'=>$shop_id));?>">首页</a> 
<a class="cart" href="<?php echo U('cart', array('shop_id'=>$shop_id));?>">购物车<span class="count"><?php echo ($cart_count); ?></span></a> 
<a class="center" href="<?php echo U('user_center', array('shop_id'=>$shop_id));?>">个人中心</a> 
</div>
<p class="copyright"><?php echo ($system_copy_right); echo ($tongji_code); ?></p>

    

</body>
</html>