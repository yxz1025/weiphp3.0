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
<body>
	<!-- 选择支付-->
    <div class="container">
    	<div class="pay_header">
        	
        </div>
    	<div class="choose_pay_type">
            <?php if(!empty($config["isopenwx"])): ?><a href="#" data-paytype='0'><em class="wxpay">&nbsp;</em>微信支付</a><?php endif; ?>
        	<?php if(!empty($config["isopenzfb"])): ?><a href="#" data-paytype='1'><em class="alipay">&nbsp;</em>支付宝</a><?php endif; ?>
            <?php if(!empty($config["isopencftwap"])): ?><a href="#" data-paytype='2'><em class="tenpay">&nbsp;</em>财付通</a><?php endif; ?>
            <?php if(!empty($config["isopenyl"])): ?><a href="#" data-paytype='4'><em class="cardpay">&nbsp;</em>银行卡支付</a><?php endif; ?>
            <?php if(!empty($config["isopenload"])): ?><a href="#" data-paytype='10'><em class="rechpay">&nbsp;</em>货到付款</a><?php endif; ?>
        </div>
    </div>	
    
    <!-- 支付成功 -->
    <div class="container" style="display:none">
    	<div class="pay_header_success">
        </div>
    	<div class="pay_result">
        	支付成功
        </div>
        <a class="pay_ok_back" href="#">查看订单</a>
    </div>	
    <!-- 支付失败 -->
    <div class="container" style="display:none">
    	<div class="pay_header_fail">
        </div>
    	<div class="pay_result">
        	支付失败
        </div>
        <a class="pay_ok_back" href="#">重新支付</a>
    </div>	
</body>
</html>
<script type="text/javascript">
	$('.choose_pay_type a').each(function(){
		$(this).click(function(){
			var paytype=$(this).attr('data-paytype');//alert(paytype);
			var order_id=<?php echo ($order_id); ?>;
			var url="<?php echo U('do_pay');?>&paytype="+paytype+"&order_id="+order_id;
			$(this).attr('href',url);
		});
	});
</script>