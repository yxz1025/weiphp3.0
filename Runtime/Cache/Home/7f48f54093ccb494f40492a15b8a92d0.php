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
    
  <div class="span9 page_message">
  <section id="contents"> <ul class="tab-nav nav">
  <?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="<?php echo ($vo["class"]); ?>"><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["title"]); ?><span class="arrow fa fa-sort-up"></span></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
  
  <?php if (defined ( '_ADDONS' )) { $page = _ADDONS . '_' . _CONTROLLER . '_' . _ACTION; } else { $page = MODULE_NAME . '_' . CONTROLLER_NAME . '_' . ACTION_NAME; } $url = wp_file_get_contents ( REMOTE_BASE_URL . '/index.php?s=/Home/Index/getDocUrl/page/' . $page ); if (strpos($url,'http')==0) { ?>
  <span class="fr" style="margin:10px;"><a href="<?php echo ($url); ?>"><b style="font-size:16px;" class="fa fa-question-circle"></b>查看配置教程</a></span>
  <?php } ?>
</ul>
<?php if(!empty($sub_nav)): ?><div class="sub-tab-nav">
       <ul class="sub_tab">
       <?php if(is_array($sub_nav)): $i = 0; $__LIST__ = $sub_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a class="<?php echo ($vo["class"]); ?>" href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["title"]); ?><span class="arrow fa fa-sort-up"></span></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
</div><?php endif; ?>
<?php if(!empty($normal_tips)): ?><p class="normal_tips"><b class="fa fa-info-circle"></b> <?php echo ($normal_tips); ?></p><?php endif; ?>
    <div class="tab-content"> 
      <h3>新建图文消息</h3>
      <!-- 表单 -->
      <div id="form" action="<?php echo ($post_url); ?>" class="form-horizontal form-center">
        <div class="material_form">
       		<div class="preview_area">
            <?php if(empty($main)): ?><form data-index='0' class="appmsg_item edit_item editing">
                    <p class="time">时间</p>
                    <div class="main_img">
                        <img src="/Public/Home/images/no_cover_pic.png" data-coverid="0"/>
                        <h6 class="title">这是标题</h6>
                    </div>
                    <p class="intro"></p>
                     <input type="hidden" name="title" placeholder="这是标题" />
                      <input type="hidden" name="cover_id" value="0"/>
                    <input type="hidden" name="intro" placeholder="这是摘要描述"/>
                    <input type="hidden" name="author" placeholder="作者"/>
                    <input type="hidden" name="link" placeholder="外链"/>
                    <textarea style="display:none" name="content"></textarea>
                    <div class="hover_area"><a href="javascript:;" onClick="editItem(this)">编辑</a></div>
                </form>
                <?php else: ?>
                  <form data-index='0' class="appmsg_item edit_item editing">
                    <p class="time"><?php echo (time_format($main["cTime"])); ?></p>
                    <div class="main_img">
                        <img src="<?php echo (get_cover_url($main["cover_id"])); ?>" data-coverid="<?php echo (intval($main["cover_id"])); ?>"/>
                        <h6 class="title"><?php echo ($main["title"]); ?></h6>
                    </div>
                    <p class="intro"><?php echo ($main["intro"]); ?></p>
                    <input type="hidden" name="id" value="<?php echo ($main["id"]); ?>"/>
                     <input type="hidden" name="title" value="<?php echo ($main["title"]); ?>" />
                      <input type="hidden" name="cover_id" value="<?php echo ($main["cover_id"]); ?>"/>
                    <input type="hidden" name="intro" value="<?php echo ($main["intro"]); ?>"/>
                    <input type="hidden" name="author" value="<?php echo ($main["author"]); ?>"/>
                    <input type="hidden" name="link" value="<?php echo ($main["link"]); ?>"/>
                    <textarea style="display:none" name="content"><?php echo ($main["content"]); ?></textarea>
                    <div class="hover_area"><a href="javascript:;" onClick="editItem(this)">编辑</a></div>
                </form>
                <?php if(is_array($others)): $i = 0; $__LIST__ = $others;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><form data-index='<?php echo ($key+1); ?>' class="appmsg_sub_item edit_item">
                    <p class="title"><?php echo ($vo["title"]); ?></p>
                    <div class="main_img">
                        <img src="<?php echo (get_cover_url($vo["cover_id"])); ?>" data-coverid="<?php echo (get_cover_url($vo["cover_id"])); ?>"/>
                    </div>
                    <input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>"/>
                     <input type="hidden" name="title" value="<?php echo ($vo["title"]); ?>"/>
                    <input type="hidden" name="cover_id" value="<?php echo ($vo["cover_id"]); ?>"/>
                    <input type="hidden" name="intro" value="<?php echo ($vo["intro"]); ?>"/>
                    <input type="hidden" name="author" value="<?php echo ($vo["author"]); ?>"/>
                    <input type="hidden" name="link" value="<?php echo ($vo["link"]); ?>"/>
                    <textarea style="display:none" name="content"><?php echo ($vo["content"]); ?></textarea>
                    <div class="hover_area"><a href="javascript:;" onClick="editItem(this)">编辑</a><a href="javascript:;" onClick="deleteItem(this)">删除</a></div>
                </form><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                <div class="appmsg_edit_action">
                    <a href="javascript:;" onClick="addMsg();">添加</a>
                </div>
            </div>
            <div class="edit_area">
            	<em class="area_arrow"></em>
            	<div class="">
                	<ul class="tab-pane in appmsg_edit_group">
                        <li class="form-item cf">
                            <label class="item-label"><span class="need_flag">*</span>标题<span class="check-tips"></span></label>
                            <div class="controls">
                              <input type="text" class="text input-large" name="p_title" value="">
                            </div>
                          </li>  
                          <li class="form-item cf">
                            <label class="item-label">作者<span class="check-tips"></span></label>
                            <div class="controls">
                              <input type="text" class="text input-large" name="p_author" value="">
                            </div>
                          </li>  
                          <li class="form-item cf">
                                <label class="item-label"><span class="need_flag">*</span>封面图片<span class="check-tips">图片900X500</span></label>
                                <div class="controls uploadrow2" title="点击修改图片" rel="p_cover">
                                    <input type="file" id="upload_picture_p_cover">
                                    <input type="hidden" name="p_cover" id="cover_id_p_cover" data-callback="uploadImgCallback" value=""/>
                                    <div class="upload-img-box" rel="img" style="display:none">
                                      <div class="upload-pre-item2"><img width="100" height="100" src=""/></div>
                                        <em class="edit_img_icon">&nbsp;</em>
                                    </div>
                              </div>
                          </li>
                          <li class="form-item cf">
                                <label class="item-label">摘要<span class="check-tips"></span></label>
                                <div class="controls">
                                  <label class="textarea input-large">
                                  <textarea class="text input-large" name="p_intro" ></textarea>
                                  </label>
                                </div>
                           </li>   
                           <li class="form-item cf">
                                <label class="item-label"><span class="need_flag">*</span>正文<span class="check-tips"></span></label>
                                <div class="controls">
                                  <label class="textarea">
                                  <textarea style="width:405px; height:200px;" name="p_content" ></textarea>
                                  <?php echo hook('adminArticleEdit', array('name'=>'p_content','value'=>''));?> </label>
                                  </label>
                                </div>
                           </li>   
                            <li class="form-item cf">
                            <label class="item-label">外链<span class="check-tips"></span></label>
                            <div class="controls">
                              <input type="text" class="text input-large" name="p_link" value="">
                            </div>
                          </li>  
                  </ul>
                </div>
            </div>
        </div>
        <div class="form-item form_bh">
          <button class="btn submit-btn ajax-post" id="submit" type="button"><?php echo ((isset($submit_name) && ($submit_name !== ""))?($submit_name):'确 定'); ?></button>
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
$('#submit').click(function(){
    var postUrl = $('#form').attr('action');
	var dataJson = [];
	$('.edit_item').each(function(index, element) {
        dataJson.push($(this).serializeArray());
    });
	$(this).addClass('disabled');
	//console.log(dataJson);
	//console.log(JSON.stringify(dataJson));
	//提交数组字符串 php解析后进行保存
	$.post(postUrl,{'dataStr':JSON.stringify(dataJson)},function(data){
		$('#submit').removeClass('disabled');
		if(data.status==1){
			updateAlert(data.info,'success');
			setTimeout(function(){
				  location.href=data.url;
			},1500);
		}else{
			updateAlert(data.info);
		}
	})
	return false;
});
$(function(){
	//初始化上传图片插件
	initUploadImg();

    showTab();
	
	$('.toggle-data').each(function(){
		var data = $(this).attr('toggle-data');
		if(data=='') return true;		
		
	     if($(this).is(":selected") || $(this).is(":checked")){
			 change_event(this)
		 }
	});
	
	$('select').change(function(){
		$('.toggle-data').each(function(){
			var data = $(this).attr('toggle-data');
			if(data=='') return true;		
			
			 if($(this).is(":selected") || $(this).is(":checked")){
				 change_event(this)
			 }
		});
	});
	
	//动态预览
	$('input[name="p_title"]').keyup(function(){
		$('.editing').find('.title').text($(this).val());
		$('.editing').find('input[name="title"]').val($(this).val());
	});
	$('input[name="p_author"]').keyup(function(){
		$('.editing').find('.author').text($(this).val());
		$('.editing').find('input[name="author"]').val($(this).val());
	});
	$('input[name="p_link"]').keyup(function(){
		$('.editing').find('.link').text($(this).val());
		$('.editing').find('input[name="link"]').val($(this).val());
	});
	$('textarea[name="p_intro"]').keyup(function(){
		$('.editing').find('.intro').text($(this).val());
		$('.editing').find('input[name="intro"]').val($(this).val());
	});
	imageEditor.addListener("contentChange",function(){
		$('.editing').find('textarea[name="content"]').val(imageEditor.getContent());
	});
	imageEditor.addListener("ready", function () {
       initForm($('.edit_item').eq(0));
 	});
	
	
});
function addMsg(){
	var curCount = $('.edit_item').size();
	if(curCount>=8){
		updateAlert('你最多只可以增加8条图文信息');
		return false;
	}
	//console.log(curCount);
	var addHtml = $('<form data-index="'+curCount+'" class="appmsg_sub_item edit_item">'+
                    '<p class="title"></p>'+
                    '<div class="main_img">'+
                        '<img src="/Public/Home/images/no_cover_pic_s.png" data-coverid="0"/>'+
                    '</div>'+
                    '<input type="hidden" name="title" placeholder="这是标题"/>'+
                    '<input type="hidden" name="cover_id" value="0"/>'+
                    '<input type="hidden" name="intro" placeholder="这是摘要描述"/>'+
                    '<input type="hidden" name="author" placeholder="作者"/>'+
                    '<input type="hidden" name="link" placeholder="外链"/>'+
                    '<textarea style="display:none" name="content"></textarea>'+
                    '<div class="hover_area"><a href="javascript:;" onClick="editItem(this)">编辑</a><a href="javascript:;" onClick="deleteItem(this)">删除</a></div>'+
                '</form>');
	addHtml.insertBefore($('.appmsg_edit_action'));
}
function editItem(_this){
	$(_this).parents('.edit_item').addClass('editing');
	$(_this).parents('.edit_item').siblings().removeClass('editing');
	var index = $(_this).parents('.edit_item').data('index');
	if(index==0){
		$('.edit_area').css('margin-top',0);
	}else{
		$('.edit_area').css('margin-top',index*110+120);
	}
	initForm($(_this).parents('.edit_item'));
}
function deleteItem(_this){
	if(!confirm('确认删除？')) return false;
	
	var item_id = $(_this).parents('.edit_item').find('input[name="id"]').val();
	if(item_id){
		$.post("<?php echo U('del_material_by_id');?>",{id:item_id});
	}
	
	$(_this).parents('.edit_item').remove();
	var curCount = $('.edit_item').size();
	if(curCount==1){
		$('.edit_area').css('margin-top',0);
	}else{
		$('.edit_area').css('margin-top',(curCount-1)*110+120);
	}
	initForm($('.edit_item').eq(curCount-1));
}
function uploadImgCallback(name,id,src){
	$('.editing img').attr('src',src);
	$('.editing input[name="cover_id"]').val(id);
}
function initForm(_item){
	var title = $(_item).find('input[name="title"]').val();
	var author = $(_item).find('input[name="author"]').val();
	var link = $(_item).find('input[name="link"]').val();
	var intro = $(_item).find('input[name="intro"]').val();
	var content = $(_item).find('textarea[name="content"]').val();
	var src = $(_item).find('img').attr('src');
	$('input[name="p_title"]').val(title);
	$('input[name="p_author"]').val(author);
	$('input[name="p_link"]').val(link);
	$('textarea[name="p_intro"]').val(intro);
	if(!content)content=" ";
	if(content){
		imageEditor.setContent(content);
	}
	$('.upload-img-box').show().find('img').attr('src',src);
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