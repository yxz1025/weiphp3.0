<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
<meta content="<?php echo C('WEB_SITE_KEYWORD');?>" name="keywords"/>
<meta content="<?php echo C('WEB_SITE_DESCRIPTION');?>" name="description"/>
<link rel="shortcut icon" href="<?php echo SITE_URL;?>/favicon.ico">
<title><?php echo empty($page_title) ? C('WEB_SITE_TITLE') : $page_title; ?></title>
<link href="/Public/static/font-awesome/css/font-awesome.min.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<link href="/Public/Home/css/base.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<link href="/Public/Home/css/module.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<link href="/Public/Home/css/weiphp.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<link href="/Public/static/emoji.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="/Public/static/bootstrap/js/html5shiv.js?v=<?php echo SITE_VERSION;?>"></script>
<![endif]-->

<!--[if lt IE 9]>
<script type="text/javascript" src="/Public/static/jquery-1.10.2.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script type="text/javascript" src="/Public/static/jquery-2.0.3.min.js"></script>
<!--<![endif]-->
<script type="text/javascript" src="/Public/static/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/Public/static/uploadify/jquery.uploadify.min.js"></script>
<script type="text/javascript" src="/Public/static/zclip/ZeroClipboard.min.js?v=<?php echo SITE_VERSION;?>"></script>
<script type="text/javascript" src="/Public/Home/js/dialog.js?v=<?php echo SITE_VERSION;?>"></script>
<script type="text/javascript" src="/Public/Home/js/admin_common.js?v=<?php echo SITE_VERSION;?>"></script>
<script type="text/javascript" src="/Public/Home/js/admin_image.js?v=<?php echo SITE_VERSION;?>"></script>
<script type="text/javascript" src="/Public/static/masonry/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="/Public/static/jquery.dragsort-0.5.2.min.js"></script> 
<script type="text/javascript">
var  IMG_PATH = "/Public/Home/images";
var  STATIC = "/Public/static";
var  ROOT = "";
var  UPLOAD_PICTURE = "<?php echo U('home/File/uploadPicture',array('session_id'=>session_id()));?>";
var  UPLOAD_FILE = "<?php echo U('File/upload',array('session_id'=>session_id()));?>";
</script>
<!-- 页面header钩子，一般用于加载插件CSS文件和代码 -->
<?php echo hook('pageHeader');?>

</head>
<body>
	<!-- 头部 -->
	<!-- 提示 -->
<div id="top-alert" class="top-alert-tips alert-error" style="display: none;">
  <a class="close" href="javascript:;"><b class="fa fa-times-circle"></b></a>
  <div class="alert-content"></div>
</div>
<!-- 导航条
================================================== -->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="wrap">
    
       <a class="brand" title="<?php echo C('WEB_SITE_TITLE');?>" href="<?php echo U('index/index');?>">
       <?php if(!empty($userInfo[website_logo])): ?><img height="52" src="<?php echo (get_cover_url($userInfo["website_logo"])); ?>"/>
       	<?php else: ?>
       		<img height="52" src="/Public/Home/images/logo.png"/><?php endif; ?>
       </a>
        <?php if(is_login()): ?><div class="switch_mp">
            	<a href="#"><?php echo ($public_info["public_name"]); ?><b class="pl_5 fa fa-sort-down"></b></a>
                <ul>
                <?php if(is_array($myPublics)): $i = 0; $__LIST__ = $myPublics;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('home/index/main', array('publicid'=>$vo[mp_id]));?>"><?php echo ($vo["public_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div><?php endif; ?>
      <?php $index_2 = strtolower ( MODULE_NAME . '/' . CONTROLLER_NAME . '/*' ); $index_3 = strtolower ( MODULE_NAME . '/' . CONTROLLER_NAME . '/' . ACTION_NAME ); ?>
       
            <div class="top_nav">
                <?php if(is_login()): ?><ul class="nav" style="margin-right:0">
                    	<?php if($myinfo["is_init"] == 0 ): ?><li><p>该账号配置信息尚未完善，功能还不能使用</p></li>
                    		<?php elseif($myinfo["is_audit"] == 0 and !$reg_audit_switch): ?>
                    		<li><p>该账号配置信息已提交，请等待审核</p></li>
                            <?php elseif($index_2 == 'home/public/*' or $index_3 == 'home/user/profile' or $index_2 == 'home/publiclink/*'): ?>
                    		
                    		<?php else: ?> 
                    		<?php if(is_array($core_top_menu)): $i = 0; $__LIST__ = $core_top_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ca): $mod = ($i % 2 );++$i;?><li data-id="<?php echo ($ca["id"]); ?>" class="<?php echo ($ca["class"]); ?>"><a href="<?php echo ($ca["url"]); ?>"><?php echo ($ca["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                    	
                    	
                        
                        <li class="dropdown admin_nav">
                            <a href="#" class="dropdown-toggle login-nav" data-toggle="dropdown" style="">
                                <?php if(!empty($myinfo[headimgurl])): ?><img class="admin_head url" src="<?php echo ($myinfo["headimgurl"]); ?>"/>
                                <?php else: ?>
                                    <img class="admin_head default" src="/Public/Home/images/default.png"/><?php endif; ?>
                                <?php echo (getShort($myinfo["nickname"],4)); ?><b class="pl_5 fa fa-sort-down"></b>
                            </a>
                            <ul class="dropdown-menu" style="display:none">
                               <?php if($mid==C('USER_ADMINISTRATOR')): ?><li><a href="<?php echo U ('Admin/Index/Index');?>" target="_blank">后台管理</a></li><?php endif; ?>
                            	<li><a href="<?php echo U ('Home/Public/lists');?>">公众号列表</a></li>
                                <li><a href="<?php echo U ('Home/Public/add');?>">账号配置</a></li>
                                <li><a href="<?php echo U('User/profile');?>">修改密码</a></li>
                                <li><a href="<?php echo U('User/logout');?>">退出</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php else: ?>
                    <ul class="nav" style="margin-right:0">
                    	<li style="padding-right:20px">你好!欢迎来到<?php echo C('WEB_SITE_TITLE');?></li>
                        <li>
                            <a href="<?php echo U('User/login');?>">登录</a>
                        </li>
                        <li>
                            <a href="<?php echo U('User/register');?>">注册</a>
                        </li>
                        <li>
                            <a href="<?php echo U('admin/index/index');?>" style="padding-right:0">后台入口</a>
                        </li>
                    </ul><?php endif; ?>
            </div>
        </div>
</div>
	<!-- /头部 -->
	
	<!-- 主体 -->
	
<?php  if(!is_login()){ Cookie ( '__forward__', $_SERVER ['REQUEST_URI'] ); redirect(U('home/user/login',array('from'=>4))); } ?>
<div id="main-container" class="admin_container">
  <?php if(!empty($core_side_menu)): ?><div class="sidebar">
      <ul class="sidenav">
        <li>
          <?php if(!empty($now_top_menu_name)): ?><a class="sidenav_parent" href="javascript:;"> 
            <!--<img src="/Public/Home/images/left_icon_<?php echo ($core_side_category["left_icon"]); ?>.png"/>--> 
            <?php echo ($now_top_menu_name); ?></a><?php endif; ?>
          <ul class="sidenav_sub">
            <?php if(is_array($core_side_menu)): $i = 0; $__LIST__ = $core_side_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="<?php echo ($vo["class"]); ?>" data-id="<?php echo ($vo["id"]); ?>"> <a href="<?php echo ($vo["url"]); ?>"> <?php echo ($vo["title"]); ?> </a><b class="active_arrow"></b></li><?php endforeach; endif; else: echo "" ;endif; ?>
          </ul>
        </li>
        <?php if(!empty($addonList)): ?><li> <a class="sidenav_parent" href="javascript:;"> <img src="/Public/Home/images/ico1.png"/> 其它功能</a>
            <ul class="sidenav_sub" style="display:none">
              <?php if(is_array($addonList)): $i = 0; $__LIST__ = $addonList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="<?php echo ($navClass[$vo[name]]); ?>"> <a href="<?php echo ($vo[addons_url]); ?>" title="<?php echo ($vo["description"]); ?>"> <i class="icon-chevron-right">
                  <?php if(!empty($vo['icon'])) { ?>
                  <img src="<?php echo ($vo["icon"]); ?>" />
                  <?php } ?>
                  </i> <?php echo ($vo["title"]); ?> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
          </li><?php endif; ?>
      </ul>
    </div><?php endif; ?>
  <div class="main_body">
    
<style type="text/css">
.order_info{ margin:20px 0; min-height:100px; border:1px solid #eee; background:#f3f3f3; padding:10px;}
.order_info p{ color:#888; font-size:12px;}
.order_info p.title{ font-size:16px; line-height:30px; color:#333;}
.order_info .cover{ float:left; width:100px; height:100px;}
.order_info .info_content{ padding-left:110px; line-height:22px;}
.address_info{ padding:10px;border:1px solid #eee; background:#f3f3f3;}
.address_info p{ line-height:30px;}
.address_info p span{ color:#888;}
.action_wrap{ margin:20px 0; border:1px solid #F90; background:#fef5ea; padding:20px;}
#sendDiv .tab{ height:40px; margin:15px 0 0; }
#sendDiv .tab a{ height:40px; line-height:40px; float:left; padding:0 20px; }
#sendDiv .tab a.current{background:#44b549; color:#fff}
.tab_content{ padding:10px; background:#fff;border:1px solid #44b549;}
.f_i{ margin:10px 0;}
</style>
  <div class="span9 page_message">
  <section id="contents"> 
  	
    <div class="tab-content"> 
    	<div class="order_detail">
        	<h3>订单编号：<?php echo ($info["order_number"]); ?></h3>
            <?php if(is_array($info["goods"])): $i = 0; $__LIST__ = $info["goods"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gg): $mod = ($i % 2 );++$i;?><div class="order_info">
            	<img class="cover" src="<?php echo (get_cover_url($gg["cover"])); ?>"/>
                <div class="info_content">
                <p class="title"><?php echo ($gg["title"]); ?></p>
                <p>购买数量：<?php echo ($gg["num"]); ?></p>
                <p>单价：<?php echo ($gg["price"]); ?>元</p>
                <p>总价：<?php echo ($gg[price]*$gg[num]); ?>元</p>
            	</div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
            <div class="address_info">
            	<p><span>收件人：</span><?php echo ($addressInfo["truename"]); ?></p>
                <p><span>联系方式：</span><?php echo ($addressInfo["mobile"]); ?></p>
                <p><span>收货地址：</span><?php echo ($addressInfo["address"]); ?></p>
                <p><span>付款方式: </span><?php echo ($info["common"]); ?></p>
                <p><span>总价: </span><?php echo ($info["total_price"]); ?>元</p>
            	<p><span>订单留言: </span><?php echo ($info["remark"]); ?></p>                
             </div>
             <div class="action_wrap">
            	<?php if($info[pay_status]==0 && $info[pay_type]!=10): ?><p class="wait_pay">等待买家付款中...</p>
                <?php else: ?>
                	<?php if(($info[is_send]) == "0"): ?><p><?php if(($info["pay_type"]) == "10"): ?>买家选择货到付款<?php else: ?>买家已付款<?php endif; ?>&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn" href="javascript:;" onClick="$('#sendDiv').show();$(this).parent().hide()">发货</a></p>
                        <form id="sendDiv" action="<?php echo U('do_send');?>" method="post" style="display:none">
                            <div class="tab_content" id="tab1_content">
                                <div class="f_i">
                                    <label>物流公司</label>
                                    <select name="send_code">
                                        <option>请选择物流公司</option>
                                        <option value="sf">顺丰</option>
                                        <option value="sto">申通</option>
                                        <option value="yt">圆通</option>
                                        <option value="yd">韵达</option>
                                        <option value="tt">天天</option>
                                        <option value="ems">EMS</option>
                                        <option value="zto">中通</option>
                                        <option value="ht">汇通</option>
                                        <option value="qf">全峰</option>
                                    </select>
                                </div>
                                <div class="f_i">
                                    <label>快递单号</label>
                                    <input type="text" name="send_number" />
                                </div>
                                <input type="hidden" name="order_id" value="<?php echo ($info["id"]); ?>" />
								<button class="btn submit-btn" type="submit">发货</button>
                            </div>                            
                        </form>
                    <?php else: ?>
                    	商品已发货
                        <p>物流公司: <?php echo ($info["send_code_name"]); ?> &nbsp;&nbsp;&nbsp;快递单号: <?php echo ($info["send_number"]); ?></p>
                        <p><a href="javascript:;" onClick="getShopping();">跟踪物流</a></p>
                        <div class="shipping_info" style="display:none">
                        	<P>正在加载物流信息...</P>
                        </div>
                        <?php if($info[pay_type]==10 and $info['pay_status']==0): ?><p>此订单为货到付款，如果您已经收到款项，请点击：&nbsp;&nbsp;&nbsp;<a href="javascript:;" onClick="doPay();">确认已经收款</a></p><?php endif; endif; endif; ?>
                
            </div>
                
                
        </div>
           
    </div>
  </section>
  </div>

  </div>
</div>

	<!-- /主体 -->

	<!-- 底部 -->
	<div class="wrap bottom" style="background:#fff; border-top:#ddd;">
    <p class="copyright">本系统由<a href="http://weiphp.cn" target="_blank">WeiPHP</a>强力驱动</p>
</div>

<script type="text/javascript">
(function(){
	var ThinkPHP = window.Think = {
		"ROOT"   : "", //当前网站地址
		"APP"    : "/index.php?s=", //当前项目地址
		"PUBLIC" : "/Public", //项目公共目录地址
		"DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
		"MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
		"VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
	}
})();
</script>

<script type="text/javascript">
function tabForm(_this,type){
	$(_this).addClass('current').siblings().removeClass('current');
    $('#tab'+type+'_content').show().siblings('.tab_content').hide();
}
function getShopping(){
	$('.shipping_info').show();
	//加载物流信息到shipping_info
	$.post("<?php echo U('get_send_info');?>",{id:"<?php echo ($info["id"]); ?>"},function(html){
		if(html==''){
			$('.shipping_info').html('<P>暂时无物流信息</P>');
		}else{
			$('.shipping_info').html(html);
		}
	    
	});
}
function doPay(){
	if(confirm('确认设置为已收款？')){
		$.post("<?php echo U('set_pay_status');?>",{id:"<?php echo ($info["id"]); ?>"},function(res){
			 location.reload();
	    });
	}
}
</script>
 <!-- 用于加载js代码 -->
<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
<?php echo hook('pageFooter', 'widget');?>
<div style='display:none'><?php echo ($tongji_code); ?></div>
<div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->
	
</div>

	<!-- /底部 -->
</body>
</html>