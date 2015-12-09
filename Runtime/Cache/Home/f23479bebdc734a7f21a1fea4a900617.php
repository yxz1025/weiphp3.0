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
    	<div class="top_tab">
        	<a href="<?php echo U('myOrder');?>" class="<?php echo ($allClass); ?>">全部订单</a>
            <a href="<?php echo U('unPayOrder');?>" class="<?php echo ($unPayClass); ?>">待付款</a>
            <a href="<?php echo U('shippingOrder');?>" class="<?php echo ($shippingClass); ?>">配送中</a>
            <a href="<?php echo U('waitCommentOrder');?>" class="<?php echo ($waitClass); ?>">待评价</a>
        </div>
    	
        <?php if(empty($orderList)): ?><div class="empty_container"><p>暂时无订单数据</p></div>
        <?php else: ?>
        <!-- 订单信息 -->
        <div class="order_list">
        	<ul>
            	<?php if(is_array($orderList)): $i = 0; $__LIST__ = $orderList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                	<a style="display:block" href="<?php echo U('orderDetail',array('id'=>$vo[id],'shop_id'=>$shop_id));?>">
                	<p class="top">
                    <span class="t">订单编号：<?php echo ($vo["order_number"]); ?></span><br/>
                    <span class="c">订单状态：<span class="blue"><?php echo ($vo["status_code_name"]); ?></span></span>
                    </p>
                    
                    <?php if(is_array($vo["goods"])): $i = 0; $__LIST__ = $vo["goods"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gg): $mod = ($i % 2 );++$i;?><div class="goods_item">
                        <img src="<?php echo (get_cover_url($gg["cover"])); ?>"/>
                        <div class="info">
                            <P class="name"><?php echo ($gg["title"]); ?></P>
                            <p class="property">
                                <span class="colorless">价格</span>
                                <span class="orange">￥<?php echo ($gg[price]*$gg[num]); ?>元</span>
                            </p>
                            <p class="property">
                                <span class="colorless">数量</span>
                                <span><?php echo ($gg["num"]); ?></span>
                            </p>
                        </div>
                        
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
                    </a>
                    <div class="order_list_bottom">
                    	<?php if($vo[pay_status]==0 && $vo[pay_type]!=10): ?><a class="btn small_btn" href="<?php echo U('choose_pay');?>&order_id=<?php echo ($info["id"]); ?>">立即付款</a>
                        <?php else: ?>
                            <?php if(($vo[is_send]) == "0"): ?><span>等待卖家发货</span>
                            <?php else: ?>
                            	<?php if($vo['status_code']==3): ?><a class="btn small_btn" href="javascript:;" onClick="confirmGetGoods('<?php echo U('confirm_get',array('id'=>$vo[id]));?>');">确认收货</a><?php endif; endif; endif; ?>
                    	
                    </div>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                
            </ul>
         </div><?php endif; ?>
         
        
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