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
.address input{
	width:100px;	
}
.chooseShopDialog li{
		 height:50px;
}
.chooseShopDialog li span{
		 
		width:100px;
		 height:50px;
		 float:left;
	   text-align:center;	   
}
.img img{
	  width:50px;
	  height:50px;
}
.shop_tr input{
	width:100px;	
}
</style>
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
      <!-- 表单 -->
      <?php $post_url || $post_url = U('add?model='.$model['id'], $get_param); ?>
      <form id="form" action="<?php echo ($post_url); ?>" method="post" class="form-horizontal form-center">
        <?php if(is_array($fields)): $i = 0; $__LIST__ = $fields;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$field): $mod = ($i % 2 );++$i; if($field['is_show'] == 4): ?><input type="hidden" class="text" name="<?php echo ($field["name"]); ?>" value="<?php echo I($field[name], $field[value]);?>"><?php endif; ?>
          <?php if($field['is_show'] == 1 || $field['is_show'] == 2 || ($field['is_show'] == 5 && I($field['name']))): ?><div class="form-item cf toggle-<?php echo ($field["name"]); ?>">
              <label class="item-label">
                <?php if(!empty($field["is_must"])): ?><span class="need_flag">*</span><?php endif; ?>
                <?php echo ($field['title']); ?> <span class="check-tips">
                <?php if(!empty($field['remark'])): ?>（<?php echo ($field['remark']); ?>）<?php endif; ?>
                </span></label>
              <div class="controls">
                <?php switch($field["type"]): case "num": ?><input type="number" class="text" name="<?php echo ($field["name"]); ?>" value="<?php echo I($field[name], $field[value]);?>"><?php break;?>
                  <?php case "string": ?><input type="text" class="text input-large" name="<?php echo ($field["name"]); ?>" value="<?php echo I($field[name], $field[value]);?>"><?php break;?>
                  <?php case "textarea": ?><label class="textarea input-large">
                      <textarea name="<?php echo ($field["name"]); ?>"><?php echo I($field[name], $field[value]);?></textarea>
                    </label><?php break;?>
                  <?php case "datetime": ?><input type="datetime" name="<?php echo ($field["name"]); ?>" class="text time" value="<?php echo I($field[name], $field[value]);?>" placeholder="请选择时间" /><?php break;?>
                  <?php case "date": ?><input type="datetime" name="<?php echo ($field["name"]); ?>" class="text date" value="<?php echo I($field[name], $field[value]);?>" placeholder="请选择日期" /><?php break;?>
                  <?php case "bool": $_result=parse_field_attr($field['extra']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="check-item"> 
                        <!--[if !IE]><!--> 
                        <input type="radio" class="regular-radio toggle-data" value="<?php echo ($key); ?>" id="<?php echo ($field["name"]); ?>_<?php echo ($key); ?>" name="<?php echo ($field["name"]); ?>" toggle-data="<?php echo (get_hide_attr($vo)); ?>"
								  
                        <?php if(($field["value"]) == $key): ?>checked<?php endif; ?>
                        />
                        <label for="<?php echo ($field["name"]); ?>_<?php echo ($key); ?>"></label>
                        <?php echo (clean_hide_attr($vo)); ?> 
                        <!--<![endif]--> 
                        <!--[if IE]>
							       <input type="radio" value="<?php echo ($key); ?>" 
								   id="<?php echo ($field["name"]); ?>_<?php echo ($key); ?>" name="<?php echo ($field["name"]); ?>" class="toggle-data" toggle-data="<?php echo (get_hide_attr($vo)); ?>"
								  <?php if(($field["value"]) == $key): ?>checked="checked"<?php endif; ?> />
								  <label for="<?php echo ($field["name"]); ?>_<?php echo ($key); ?>"></label><?php echo (clean_hide_attr($vo)); ?>
							   <![endif]--> 
                      </div><?php endforeach; endif; else: echo "" ;endif; break;?>
                  <?php case "select": ?><select name="<?php echo ($field["name"]); ?>">
                      <?php $_result=parse_field_attr($field['extra']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>" class="toggle-data" toggle-data="<?php echo (get_hide_attr($vo)); ?>"
                              
                        <?php if(($field["value"]) == $key): ?>selected<?php endif; ?>
                        ><?php echo (clean_hide_attr($vo)); ?>
                              
                        </option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select><?php break;?>
                  <?php case "cascade": ?><div id="cascade_<?php echo ($field["name"]); ?>"></div>
                    <?php echo hook('cascade', array('name'=>$field['name'],'value'=>$field['value'],'extra'=>$field['extra'])); break;?>
                  <?php case "dynamic_select": ?><div id="dynamic_select_<?php echo ($field["name"]); ?>"></div>
                  <?php echo hook('dynamic_select', array('name'=>$field['name'],'value'=>$data[$field['name']],'extra'=>$field['extra'])); break;?>
                  <?php case "news": ?><div id="news_<?php echo ($field["name"]); ?>"></div>
                  <?php echo hook('news', array('name'=>$field['name'],'value'=>$data[$field['name']],'extra'=>$field['extra'])); break;?> 
                  <?php case "image": ?><div id="image_<?php echo ($field["name"]); ?>"></div>
                  <?php echo hook('image', array('name'=>$field['name'],'value'=>$data[$field['name']],'extra'=>$field['extra'])); break;?>                                                           
                  <?php case "radio": $_result=parse_field_attr($field['extra']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="check-item"> 
                        <!--[if !IE]><!--> 
                        <input type="radio" class="regular-radio toggle-data" value="<?php echo ($key); ?>" id="<?php echo ($field["name"]); ?>_<?php echo ($key); ?>" name="<?php echo ($field["name"]); ?>" toggle-data="<?php echo (get_hide_attr($vo)); ?>"
								  
                        <?php if(($field["value"]) == $key): ?>checked<?php endif; ?>
                        />
                        <label for="<?php echo ($field["name"]); ?>_<?php echo ($key); ?>"></label>
                        <?php echo (clean_hide_attr($vo)); ?> 
                        <!--<![endif]--> 
                        <!--[if IE]>
							       <input type="radio" value="<?php echo ($key); ?>" 
								   id="<?php echo ($field["name"]); ?>_<?php echo ($key); ?>" name="<?php echo ($field["name"]); ?>" class="toggle-data" toggle-data="<?php echo (get_hide_attr($vo)); ?>"
								  <?php if(($field["value"]) == $key): ?>checked="checked"<?php endif; ?> />
								  <label for="<?php echo ($field["name"]); ?>_<?php echo ($key); ?>"></label><?php echo (clean_hide_attr($vo)); ?>
							   <![endif]--> 
                      </div><?php endforeach; endif; else: echo "" ;endif; break;?>
                  <?php case "checkbox": $_result=parse_field_attr($field['extra']);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="check-item"> <input type="checkbox" class="regular-checkbox toggle-data" value="<?php echo ($key); ?>" id="<?php echo ($field["name"]); ?>_<?php echo ($key); ?>" name="<?php echo ($field["name"]); ?>[]" toggle-data="<?php echo (get_hide_attr($vo)); ?>"
                              
                        <?php if(in_array(($key), is_array($field['value'])?$field['value']:explode(',',$field['value']))): ?>checked="checked"<?php endif; ?>
                        >
                        <label for="<?php echo ($field["name"]); ?>_<?php echo ($key); ?>"></label>
                        <?php echo (clean_hide_attr($vo)); ?> </div><?php endforeach; endif; else: echo "" ;endif; break;?>
                  <?php case "editor": ?><label class="textarea">
                      <textarea name="<?php echo ($field["name"]); ?>" style="width:405px; height:200px;"></textarea>
                      <?php echo hook('adminArticleEdit', array('name'=>$field['name'],'value'=>$field['value']));?> </label><?php break;?>
                  <?php case "picture": ?><div class="controls uploadrow2" title="点击修改图片" rel="<?php echo ($field["name"]); ?>">
                      <input type="file" id="upload_picture_<?php echo ($field["name"]); ?>">
                      <input type="hidden" name="<?php echo ($field["name"]); ?>" id="cover_id_<?php echo ($field["name"]); ?>"/>
                      <div class="upload-img-box">
                        <?php if(!empty($data[$field['name']])): ?><div class="upload-pre-item2"><img width="100" height="100" src="<?php echo (get_cover_url($data[$field['name']])); ?>"/></div>
                          <em class="edit_img_icon">&nbsp;</em><?php endif; ?>
                        
                      </div>
                    </div><?php break;?>
                  <?php case "mult_picture": ?><div class="mult_imgs">
                    	<div class="upload-img-view" id='mutl_picture_<?php echo ($field["name"]); ?>'>
                          <?php if(!empty($data[$field['name']])): if(is_array($data[$field['name']])): $i = 0; $__LIST__ = $data[$field['name']];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="upload-pre-item22">
                            <img width="100" height="100" src="<?php echo (get_cover_url($vo)); ?>"/>
                            <input type="hidden" name="<?php echo ($field["name"]); ?>[]" value="<?php echo ($vo); ?>"/>
                            <em>&nbsp;</em>
                            </div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        </div>
                        <div class="controls uploadrow2 mult" title="点击上传图片" rel="<?php echo ($field["name"]); ?>">
                          <input type="file" id="upload_picture_<?php echo ($field["name"]); ?>">
                        </div>
                    </div><?php break;?>
                  <?php case "file": ?><div class="controls upload_file">
                      <input type="file" id="upload_file_<?php echo ($field["name"]); ?>" title="点击修改文件">
                      <input type="hidden" name="<?php echo ($field["name"]); ?>" value="<?php echo ($data[$field['name']]); ?>"/>
                      <div class="upload-img-box">
                        <?php if(isset($data[$field['name']])): ?><div class="upload-pre-file"><span class="upload_icon_all"></span><?php echo ($data[$field['name']]); ?></div><?php endif; ?>
                      </div>
                    </div><?php break;?>
                  <?php case "user": ?><div class="controls">
                    	<div id="userList" class="common_add_list fl">
                            <?php if(!empty($data[$field['name']])): ?><div class="item" onClick="$.WeiPHP.selectSingleUser('<?php echo addons_url('UserCenter://UserCenter/lists');?>','<?php echo ($field["name"]); ?>');">
                                	<?php $userInfo = getUserInfo($data[$field['name']]); ?>
                                    <img src="<?php echo ($userInfo['headimgurl']); ?>"/><br/><span><?php echo ($userInfo['nickname']); ?></span>
                                    <input type="hidden" name="<?php echo ($field["name"]); ?>'" value="<?php echo ($data[$field['name']]); ?>"/>
                                    <span class="name"><?php echo ($userInfo['nickname']); ?></span>
                                </div>
                            <?php else: ?>
                            <a href="javascript:;" class="common_add_btn fl" onClick="$.WeiPHP.selectSingleUser('<?php echo addons_url('UserCenter://UserCenter/lists');?>','<?php echo ($field["name"]); ?>');"></a><?php endif; ?>
                       </div>
                    </div><?php break;?>
                  <?php case "users": ?><div class="controls">
                            <div id="userList" class="common_add_list fl">
                                <?php if(!empty($data[$field['name']])): $userIds = explode(',',$data[$field['name']]); ?>
                                	<?php if(is_array($userIds)): $i = 0; $__LIST__ = $userIds;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$uid): $mod = ($i % 2 );++$i; $userInfo = getUserInfo($uid); ?>
                                    <div class="item" onClick="$.WeiPHP.selectSingleUser('<?php echo addons_url('UserCenter://UserCenter/lists');?>','<?php echo ($field["name"]); ?>');">
                                        <?php $userInfo = getUserInfo($data[$field['name']]); ?>
                                        <img src="<?php echo ($userInfo['headimgurl']); ?>"/><br/><span><?php echo ($userInfo['nickname']); ?></span>
                                        <input type="hidden" name="<?php echo ($field["name"]); ?>'[]" value="<?php echo ($data[$field['name']]); ?>"/>
                                        <span class="name"><?php echo ($userInfo['nickname']); ?></span>
                                    </div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                               <a href="javascript:;" class="common_add_btn fl" onClick="$.WeiPHP.selectMutiUser('<?php echo addons_url('UserCenter://UserCenter/lists');?>',9,'<?php echo ($field["name"]); ?>');"></a>
                           </div>
                        </div><?php break;?>
                  <?php default: ?>
                  <input type="text" class="text input-large" name="<?php echo ($field["name"]); ?>" value="<?php echo I($field[name], $field[value]);?>"><?php endswitch;?>
              </div>
            </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
        <div class="controls">
        	 <label class="item-label">添加奖品</label>
			                
			                <table id="awardList" class="form_table" cellpadding="0" cellspacing="1">
                			<thead>
                        	<tr>
	                            <td>奖品名称</td>
	                            <td>奖品图片</td>
	                            <td>奖品类型</td>
	                            <td><span class="need_flag">*</span>中奖等级名</td>
	                            <td><span class="need_flag">*</span>奖品数量</td>
	                            <td><span class="need_flag">*</span>最多抽奖<span class="check-tips">（n次,把奖品发放完）</span></td>
	                            <td>操作</td>
                       		 </tr>
                    		</thead>
                   		 <tbody>
                    	<?php if(is_array($award_list)): $i = 0; $__LIST__ = $award_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="shop_tr">
	                            <td><input type="hidden" name="award_id[]" value="<?php echo ($vo["award_id"]); ?>"/><span class="name"><?php echo ($vo["name"]); ?></span></td>
	                             <td><span class="img"><img src="<?php echo (get_cover_url($vo["img"])); ?>" width='50' height='50'/></span></td>
	                            <td><span class="award_type"><?php echo ($vo["type_name"]); ?></span></td>
	                            
	                            <td><span class="address"><input name='grade[<?php echo ($vo["award_id"]); ?>]' value='<?php echo ($vo["grade"]); ?>'/></span></td>
	                            <td><span class="address"><input name='num[<?php echo ($vo["award_id"]); ?>]' value='<?php echo ($vo["num"]); ?>'/></span></td>
	                            <td><span class="address"><input name='max_count[<?php echo ($vo["award_id"]); ?>]' value='<?php echo ($vo["max_count"]); ?>'/></span></td>
	                            <td><a href="javascript:;" onclick="removeSingleAddress(this)">删除</a></td>
	                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                         	<tr class="add_tr"><td colspan="7">
                            	<a href="javascript:;" onClick="chooseAward();">+添加奖品</a>
                            </td></tr>
                    	</tbody>
                </table>
            </div>
        </div>
        <div class="form-item form_bh">
          <button class="btn submit-btn ajax-post" id="submit" type="submit" target-form="form-horizontal"><?php echo ((isset($submit_name) && ($submit_name !== ""))?($submit_name):'确 定'); ?></button>
        </div>
      </form>
      		<!-- 预览 -->
        <!--通用的微信预览模板-->
<!--头部标题栏-->
<!--鉴于样式title放进具体每块模块-->
<!--CSS模块-->
<div class="weixin-preview">
	<p class="preview-tips">微信回复预览</p>
	<div class="weixin-box">
	<p class="weixin-title"></p>
    <div class="weixin-cover"><img class="weixin-cover-pic" src=""/></div>
    <p class="weixin-content">
    	
    </p>
</div>
<script type="text/javascript">
$('.tab-content').addClass('has-weixinpreivew');
if($('input[name="title"]').val()!=undefined){
	$('.weixin-title').html($('input[name="title"]').val());
}else{
	$('.weixin-title').html($('input[name="config[title]"]').val());
}
if($('textarea[name="content"]').val()!=undefined){
	$('.weixin-content').html($('textarea[name="content"]').val());
}else if($('textarea[name="intro"]').val()!=undefined){
	$('.weixin-content').html($('textarea[name="config[intro]"]').val());
	}else{
	$('.weixin-content').html($('textarea[name="config[info]"]').val());	
}
var weixin_cover_picurl = $('#cover_id_picurl').next().find('img').attr('src');
if(weixin_cover_picurl==undefined)weixin_cover_picurl=$('#cover_id_cover').next().find('img').attr('src');
if($('#cover_id_cover').val()==undefined && $('#cover_id_picurl').val()==undefined){
	$('.weixin-preview').hide();
	}
if(weixin_cover_picurl==undefined || weixin_cover_picurl==""){
	$('.weixin-cover-pic').attr('src',"/Public/Home/images/no_cover.png");
}else{
	$('.weixin-cover-pic').attr('src',weixin_cover_picurl);
}
$('input[name="title"]').keyup(function(){
	$('.weixin-title').html($(this).val());
	});
$('textarea[name="content"]').keyup(function(){
	$('.weixin-content').html($(this).val());
	});
$('textarea[name="info"]').keyup(function(){
	$('.weixin-content').html($(this).val());
	});
$('textarea[name="des_jj"]').keyup(function(){
	$('.weixin-content').html($(this).val());
	});
$('textarea[name="intro"]').keyup(function(){
	$('.weixin-content').html($(this).val());
	});	
</script>  
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

  <link href="/Public/static/datetimepicker/css/datetimepicker.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">
  <?php if(C('COLOR_STYLE')=='blue_color') echo '
  <link href="/Public/static/datetimepicker/css/datetimepicker_blue.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">
    '; ?>
  <link href="/Public/static/datetimepicker/css/dropdown.css?v=<?php echo SITE_VERSION;?>" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="/Public/static/datetimepicker/js/bootstrap-datetimepicker.js"></script> 
  <script type="text/javascript" src="/Public/static/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js?v=<?php echo SITE_VERSION;?>" charset="UTF-8"></script> 
  <script type="text/javascript">
$('#submit').click(function(){
    $('#form').submit();
});

$(function(){
	//初始化上传图片插件
	initUploadImg();
	initUploadFile();
    $('.time').datetimepicker({
        format: 'yyyy-mm-dd hh:ii',
        language:"zh-CN",
        minView:0,
        autoclose:true
    });
    $('.date').datetimepicker({
        format: 'yyyy-mm-dd',
        language:"zh-CN",
        minView:2,
        autoclose:true
    });	
    showTab();
	
	$('.toggle-data').each(function(){
		var data = $(this).attr('toggle-data');
		if(data=='') return true;		
		
	     if($(this).is(":selected") || $(this).is(":checked")){
			 change_event(this)
		 }
	});
	$('.toggle-data').bind("click",function(){ change_event(this) });
	$('select').change(function(){
		$('.toggle-data').each(function(){
			var data = $(this).attr('toggle-data');
			if(data=='') return true;		
			
			 if($(this).is(":selected") || $(this).is(":checked")){
				 change_event(this)
			 }
		});
	});
	//填充
	$("iframe").load(function(){
		
		var count = 0;
		var prevLiHtml = "";
		$('.shop_tr').each(function(index, element) {
			count++;
			var id = $(this).find('.shop_id').val();
			//console.log(1);
			var name = $(this).find('.name').text();
			var img = $(this).find('.img img').attr('src');
			var award_type= $(this).find('.award_type').text();
				
			prevLiHtml = '<li class="item single_address">'+
					'<span class="title">'+name+'</span><br/>'+
					 '<a href="#"><img src="'+img+'" width="50" height="50" /></a>'+
                     '<a href="#">'+award_type+'</a>'+
                     '<td><input name="grade['+id+']" /></td>'+
							'<td><input name="num['+id+']" /></td>'+
							'<td><input name="max_count['+id+']" /></td>'+
					'<a href="#"><em>&nbsp;</em></a>'+
				'</li>';
			
        });
		if(count==1){
			$(window.frames["wxIframe"].document).find(".v_nav").append(prevLiHtml);
		}else if(count>1){
			var prevHtml = '<a class="item" href="#">适用门店<em>&nbsp;</em></a>';
			$(window.frames["wxIframe"].document).find(".v_nav").append(prevHtml);
		}
		
		
	})
	//编辑页面预览
	$('input[name="title"]').keyup(function(){
		var val = $(this).val();
		$(window.frames["wxIframe"].document).find("#title").text(val);
	})
	$('input[name="shop_name"]').keyup(function(){
		var val = $(this).val();
		$(window.frames["wxIframe"].document).find(".name").text(val);
	})
});
  
//添加地址
  var addnewShopUrl = "<?php echo addons_url('Draw://Award/add?model=sport_award');?>";
  function chooseAward(){
  	var $shopHtml = $('<div class="chooseShopDialog"><ul><center><img src="/Public/Home/images/loading.gif"/></center></ul><br/><a href="javascript:;" target="_blank" id="addNewShopBtn" class="border-btn">增加新奖品</a><div class="m15"><a href="javascript:;" class="btn" id="confirmBtn">确定</a></div></div>');
  	$.Dialog.open("添加奖品",{width:600,height:500},$shopHtml);
  	$('#addNewShopBtn',$shopHtml).click(function(){
  		window.open(addnewShopUrl);
  		$.Dialog.close();
  	})
  	var ids = [];
  	$('.shop_tr').each(function(index, element) {
          var _id = $(this).find('input').val();
  		ids[index] = _id;
      });
  	$.ajax({
  		url:"<?php echo addons_url('Draw://Award/list_data',array('p'=>1));?>",
  		data:{},
  		dataType:'JSON',
  		success:function(data){
  			var html = "";
  			var list_data = data.list_data;
  			if(list_data && list_data.length>0){
  				for(var i=0;i<list_data.length;i++){
  					//console.log(list_data[i].name)
  					var id = list_data[i].id;
  					var name = list_data[i].name;
  					var award_type = list_data[i].type_name;
  					var award=list_data[i].award_title;
  					var img_url=list_data[i].img_url;
  					//console.log(ids)
  					//console.log(id)
  					if(ids.indexOf(id)!=-1){
  						html += '<li><input type="checkbox"  checked="true" class="shop_id" value="'+id+'"/><span class="name">'+name+'</span><span class="img"><img src="'+img_url+'" ></span><span class="award_type">'+award_type+'</span><span class="award">'+award+'</span></li>';
  					}else{
  						html += '<li><input type="checkbox" class="shop_id" value="'+id+'"/><span class="name">'+name+'</span><span class="img"><img src="'+img_url+'" width="50" height="50"></span><span class="award_type">'+award_type+'</span><span class="award">'+award+'</span></li>';
  					}
  				}
  				if(html!=""){
  					$('ul',$shopHtml).html(html);
  					$('#awardList').show();
  				}
  			}else{
  				$('ul',$shopHtml).html("<center>奖品库还没有奖品</center>");
  			}
  		}
  	})
  	$('#confirmBtn',$shopHtml).click(function(){
  		var selectHtml = "";
  		var count = 0;
  		var prevLiHtml = "";
  		$('li',$shopHtml).each(function(index, element) {
  			if($(this).find('.shop_id').prop("checked")==true){
  				count++;
  				//console.log(1);
  				var id = $(this).find('.shop_id').val();
  				var name = $(this).find('.name').text();
  				var img = $(this).find('.img img').attr('src');
  				var award_type= $(this).find('.award_type').text();
				var idArr = new Array();
				$('#awardList tbody .shop_tr').each(function(index, element) {
                    idArr.push($(element).find('input[name="award_id[]"]').val());
                });
				if($.inArray(id,idArr)==-1){
  					selectHtml += '<tr class="shop_tr">'+
  								'<td><input type="hidden" name="award_id[]" value="'+id+'"/>'+name+'</td>'+
  								'<td><img src="'+img+'" width="50" height="50" /></td>'+
  								'<td>'+award_type+'</td>'+
  								'<td><input name="grade['+id+']" /></td>'+
  								'<td><input name="num['+id+']" /></td>'+
  								'<td><input name="max_count['+id+']" /></td>'+
  								'<td><a href="javascript:;" onclick="removeSingleAddress(this)">删除</a></td>'+
  							'</tr>';
				}
  				prevLiHtml = '<li class="item single_address">'+
                          '<span class="title">'+name+'</span><br/>'+
                           '<a href="#"><img src="'+img+'" width="50" height="50" /></a>'+
                           '<a href="#">'+award_type+'</a>'+
                           '<td><input name="grade['+id+']" /></td>'+
								'<td><input name="num['+id+']" /></td>'+
								'<td><input name="max_count['+id+']" /></td>'+
                          '<a href="#"><em>&nbsp;</em></a>'+
                      '</li>';
  			}
          });
  		$(selectHtml).insertBefore($('#awardList tbody .add_tr'));
  		//$(window.frames["wxIframe"].document).find(".v_nav .item").eq(0).siblings().remove();
  		if(count==1){
  			//$(window.frames["wxIframe"].document).find(".v_nav").append(prevLiHtml);
  		}else if(count>1){
  			var prevHtml = '<a class="item" href="#">添加奖品<em>&nbsp;</em></a>';
  			//$(window.frames["wxIframe"].document).find(".v_nav").append(prevHtml);
  		}
  		$.Dialog.close();
  	})
  	
  }
  function removeSingleAddress(_this){
  	$(_this).parents('tr').remove();
  	if($('.shop_tr').size()==0){
  		//$(window.frames["wxIframe"].document).find(".v_nav .item").eq(0).siblings().remove();
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