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

    <script src="/Public/static/ueditor/dialogs/internal.js"></script>
    <style type="text/css">
    	.style_list{ box-shadow:0 0 3px #ccc inset; background:#fff}
		.style_list .tabs{ height:40px; border-bottom:1px solid #ddd;}
		.style_list .tabs a{ line-height:40px; padding:0 15px; float:left; color:#444; border-right:1px solid #ddd;}
		.style_list .tabs a.current{ background:#3C0; color:#fff;}
		.style_wrap{ margin:15px auto; width:500px;}
		#styleList li{ padding:10px 0; cursor:pointer;border:3px solid #fff}
		
    </style>
</head>
<body>
	<div class="style_list">
    	<div class="tabs">
        	<?php if(is_array($group_list)): $i = 0; $__LIST__ = $group_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a class="<?php echo ($vo["class"]); ?>" href="<?php echo addons_url('EditorForAdmin://Style/get_article_style',array('group_id'=>$vo[id]));?>"><?php echo ($vo["group_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div class="style_wrap">
        	<ul id="styleList">
            	<?php if(is_array($list[list_data])): $i = 0; $__LIST__ = $list[list_data];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><?php echo ($vo["style"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        
        <div id="pagelist"><?php echo ($list["_page"]); ?></div>
    </div>
	
</body>
<script type="text/javascript">
$('#styleList li').click(function(){
	 editor.execCommand("inserthtml", $(this).html());
	 dialog.close();
})
</script>
</html>