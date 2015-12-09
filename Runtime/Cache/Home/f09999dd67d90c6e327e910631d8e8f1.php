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
<div class="container"> 
  <!-- 选择收货地址 --> 
  <a class="choose_address" href="<?php echo addons_url('Shop://Wap/choose_address');?>"> 
  <?php if(empty($address)): ?><!-- 没有 --> 
  <span class="write"><em class="write_icon">&nbsp;</em>请选择收货地址</span> 
  <input type="hidden" name="address_id" id="address_id" value="" />
  <?php else: ?>
  <!-- 已有收货地址 -->
  <div class="adress_item"> <span class="label">送至</span> <span class="address"><?php echo ($address["city_name"]); ?> <?php echo ($address["address"]); ?><br/>
    <?php echo ($address["truename"]); ?>  <?php echo ($address["mobile"]); ?></span> </div>
    <input type="hidden" name="address_id" id="address_id" value="<?php echo ($address["id"]); ?>" /><?php endif; ?>
    
  <em class="arrow_right">&nbsp;</em> </a> 
  <!-- 订单信息 -->
  <div class="order_info">
    <p class="t">订单信息</p>
    <ul>
      <?php if(is_array($lists)): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="order_item"> <img src="<?php echo (get_cover_url($vo["cover"])); ?>" />
          <div class="info">
            <P class="name"><?php echo ($vo["title"]); ?></P>
            <!--<p class="property">
                    	<span class="colorless">编号</span>
                    	<span>1212121212</span>
                    </p>
                    <p class="property">
                    	<span class="colorless">型号</span>
                    	<span>红色 34</span>
                    </p>-->
            <p class="property"> <span class="colorless">价格</span> <span class="orange">￥<?php echo (wp_money_format($vo["price"])); ?></span> </p>
            <p class="property"> <span class="colorless">数量</span> <span><?php echo (intval($vo["num"])); ?></span> </p>
          </div>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
    <!--<p class="ship_type"> <span class="fl">配送方式</span> <span class="fr">快递：10元</span> </p>-->
    <p class="order_remark">
      <textarea placeholder="给卖家给留言" name="remark" id="remark"></textarea>
    </p>
    <p class="total_price"> <span class="orange">共<?php echo (wp_money_format($total_price)); ?>元</span> </p>
    <a class="btn" href="javascript:void(0)" onClick="doPost()">提交订单</a> </div>
</div>
</body>
</html>
<script type="text/javascript">
function doPost(){
	var address_id = $('#address_id').val();
	if(address_id==''){
	    $.Dialog.fail("请选择收货地址");
		return false;	
	}
	var remark = $('#remark').val();

	var url = "<?php echo U('add_order');?>";
	$.post(url,{'address_id':address_id,'remark':remark},function(res){
		var orderid=parseInt(res);
		if(orderid==0){
			$.Dialog.fail("提交订单失败");
		}else{
			$url="<?php echo U('choose_pay');?>&order_id="+orderid;
			window.location.href=$url;
		}
	});
}
</script>