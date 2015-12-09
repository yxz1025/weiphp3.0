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
<script type="text/javascript" src="<?php echo ADDON_PUBLIC_PATH;?>/mobile/shop.js?v=<?php echo SITE_VERSION;?>"></script>
<link href="<?php echo ADDON_PUBLIC_PATH;?>/mobile/common.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">
<link href="<?php echo CUSTOM_TEMPLATE_PATH;?>Public/shop.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">
<body>
    <div class="container">
    	<form class="search_form">
        	<a href="<?php echo U('lists',array('shop_id'=>$shop_id));?>" class="back_icon">&nbsp;</a>
            <input type="text" placeholder="输入关键字搜索商品" value="<?php echo I('search_key');?>" name="search_key" />
            <button type="button" id="search" url="<?php echo U('lists',array('shop_id'=>$shop_id));?>">搜索</button>
            <a href="javascript:void(0);" class="cate_icon" onClick="showPopCategory()">&nbsp;</a>
        </form>
        <?php if(empty($goods)): ?><br/><br/>
        	<p style="text-align: center;color: red;">抱歉，该商品不存在，已被删除</p>
        	<?php else: ?>
        	<?php if(($goods["is_show"]) == "0"): ?><br/><br/>
        		<p style="text-align: center;color: red;">抱歉，该商品已下架</p>
        	<?php else: ?>
        	
        <!-- 相册 -->
        <section class="photoList">
        	<ul>
            <?php if(is_array($goods["imgs_url"])): $i = 0; $__LIST__ = $goods["imgs_url"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$url): $mod = ($i % 2 );++$i;?><li>
                    <img src="<?php echo ($url); ?>"/>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>            
            </ul>
            <span class="identify">
            <?php if(is_array($goods["imgs_url"])): $i = 0; $__LIST__ = $goods["imgs_url"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><em></em><?php endforeach; endif; else: echo "" ;endif; ?>  
            </span>
        </section>
        <!-- 详情信息 -->
        <form id="detailForm" action="<?php echo addons_url('Shop://Wap/confirm_order');?>" method="post">
        <input type="hidden" name="goods_id" value="<?php echo ($goods["id"]); ?>"/>
        <div class="detail_info">
        	<div class="info_item">
        		<h6 class="name"><?php echo ($goods["title"]); ?></h6>
            	<p class="price">
                	￥<span id="price"><?php echo (wp_money_format($goods["price"])); ?></span>
                	<?php if(!empty($goods["old_price"])): ?><del>￥<?php echo (wp_money_format($goods["old_price"])); ?></del><?php endif; ?>
                </p>
            </div>
            <div class="info_item">
<!--            	<p>型号</p>
            	<a class="sku_item" href="javascript:;" data-price="122.00">黄色 38<input type="checkbox" class="sku_check" name="sku[0]" value="1"/></a>
                <a class="sku_item select"href="javascript:;" data-price="122.00">绿色 39<input type="checkbox" class="sku_check" name="sku[1]" value="1"/></a>
                <a class="sku_item" href="javascript:;" data-price="122.00">红色 40<input type="checkbox" class="sku_check" name="sku[2]" value="1"/></a>-->
                <p>数量</p>
                <div class="buy_count">
                	<a class="reduce" href="javascript:;">-</a>
                    <input type="text" name="buyCount" value="1"/>
                    <a class="add" href="javascript:;">+</a>
                </div>
            </div>
        </div>
        <!--<div class="detail_comment">
        	<span class="t">评价：</span>
            <span class="star_rader">
            	<span class="star_select" style="width:20%"></span>
            </span>
            <span class="t comment_count">&nbsp;&nbsp;&nbsp;(23人)</span>
        </div>-->
        <!-- 商品介绍 -->
        <div class="detail_content">
        	<h6 class="t">商品介绍</h6>
            <div class="content"><?php echo ($goods["content"]); ?>
            </div>
        </div>
        </form>
    </div>
        <!-- 分类目录 -->
    <section class="pop_category" style="display:none">
  <div class="pop_category_head"> <a href="javascript:;" onClick="hidePopCategory()">取消</a> </div>
  <ul>
    <?php if(is_array($category_list)): $i = 0; $__LIST__ = $category_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('goodsListsByCategory',array('shop_id'=>$shop_id,'cid0'=>$cate[id]));?>"><?php echo ($cate["title"]); ?></a></li>
        <?php if(!empty($cate["child"])): ?><ul>
            <?php if(is_array($cate["child"])): $i = 0; $__LIST__ = $cate["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cd): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('lists',array('shop_id'=>$shop_id,'cid0'=>$cate[id],'cid1'=>$cd[id]));?>"><?php echo ($cd["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul><?php endif; endforeach; endif; else: echo "" ;endif; ?>
  </ul>
</section>
<script type="text/javascript">
function showPopCategory(){
	$('body').addClass('noscroll');
	$('.pop_category').addClass('show_category').show();
}
function hidePopCategory(){
	$('body').removeClass('noscroll');
	$('.pop_category').removeClass('show_category').hide();	
}
</script> 
    
    <!-- 底部加入购物车等 -->
    <div class="detail_bottom">
    	<a class="add_favorite" href="javascript:;" onClick="addToFavorite()">收藏</a>
        <a class="add_cart" href="javascript:;" onClick="addToCart()">加入购物车</a>
        <a class="buy_now" href="javascript:;" onClick="buyNow()">立即购买</a>
        <a class="my_cart" href="<?php echo U('cart', array('shop_id'=>$shop_id));?>">购物车<span class="count" id="cartCount"><?php echo ($cart_count); ?></span></a>
    </div><?php endif; endif; ?>
	<p class="copyright"><?php echo ($system_copy_right); echo ($tongji_code); ?></p>
<script type="text/javascript">
//加入收藏
function addToFavorite(){
	$.Dialog.loading();
	var data = $('#detailForm').serializeArray();
	$.ajax({
		url:"<?php echo U('addToCollect',array('shop_id'=>$shop_id));?>",
		data:data,
		dataType:'JSON',
		type:"POST",
		success:function(data){
			if(data){
				$.Dialog.success("收藏成功");
			}
		}
	})
}
function addToCart(){
	
	if(parseInt($('input[name="buyCount"]').text())>0){
		$.Dialog.fail("购物数量不能小于1件");
		return;	
	}
//	if(!$('.sku_check:checked').val()){
//		$.Dialog.fail("请选择型号");
//		return;	
//	}
	$.Dialog.loading();
	var data = $('#detailForm').serializeArray();
	$.ajax({
		url:"<?php echo U('addToCart',array('shop_id'=>$shop_id));?>",
		data:data,
		dataType:'html',
		type:"POST",
		success:function(res){
			if(res){
				$.Dialog.success("加入购物车成功");
				$('#cartCount').text(res);
			}
		}
	})
}
function buyNow(){
	if(parseInt($('input[name="buyCount"]').text())>0){
		$.Dialog.fail("购物数量不能小于1件");
		return;	
	}
//	if(!$('.sku_check:checked').val()){
//		$.Dialog.fail("请选择型号");
//		return;	
//	}
	$('#detailForm').submit();
}
$(function(){
	$.WeiPHP.gallery('.photoList','.photoList ul');
	$('.sku_item').click(function(){
		$('#price').text($(this).data('price'));
		$(this).addClass('select').siblings().removeClass('select');
		$(this).find('input').prop("checked",true);
		$(this).siblings().find('input').prop("checked",false);
	})
	//图片预览
	var picList = [];
	$('.photoList li img').each(function(index, element) {
		var picUrl = $(this).attr("src");
		picList[index] = picUrl;
        $(this).click(function(){
			wx.previewImage({
				current: picUrl, // 当前显示的图片链接
				urls: picList // 需要预览的图片链接列表
			});
		})
    });
	
		//搜索功能
	$("#search").click(function(){
		var url = $(this).attr('url');
        var query  = $('.search_form').find('input').serialize();
        query = query.replace(/(&|^)(\w*?\d*?\-*?_*?)*?=?((?=&)|(?=$))/g,'');
        query = query.replace(/^&/g,'');
        if( url.indexOf('?')>0 ){
            url += '&' + query;
        }else{
            url += '?' + query;
        }
		window.location.href = url;
	});	
})
</script>	
</body>
</html>