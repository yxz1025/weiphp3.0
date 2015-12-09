<?php if (!defined('THINK_PATH')) exit();?><div class="form-item cf">
  <label class="item-label"> 类型: </label>
  <div class="controls">
    	<div class="check-item">
      <input type="radio" name="config[type]" value="1" class="regular-radio" id="config[type]_1" onClick="changeOption()">
      <label for="config[type]_1"></label>文本
      </div>
<!--    <label class="radio">
      <input type="radio" name="config[type]" value="2" onClick="changeOption()">
      图片 </label>-->
    <div class="check-item">
      <input type="radio" name="config[type]" value="3" class="regular-radio" id="config[type]_3" onClick="changeOption()">
      <label for="config[type]_3"></label>图文
      </div>

  </div>
</div>

<div class="form-item cf show show3">
  <label class="item-label"> 标题: </label>
  <div class="controls">
    <input type="text" name="config[title]" class="text input-large" value="<?php echo ($data["config"]["title"]["value"]); ?>">
  </div>
</div>
<div class="form-item cf show show3 show1">
  <label class="item-label"> 内容: </label>
  <div class="controls">
    <label class="textarea input-large">
      <textarea name="config[description]"><?php echo ($data["config"]["description"]["value"]); ?></textarea>
    </label>
  </div>
  
</div>

<div class="form-item cf show show3">
  <label class="item-label"> 图片: <span class="check-tips">图片链接，支持JPG、PNG格式，较好的效果为大图360*200，小图200*200</span> </label>
  
                          <div class="controls uploadrow2" title="点击修改图片" rel="pic_url">
                            <input type="file" id="upload_picture_pic_url">
                            
                            <input type="hidden" name="config[pic_url]" id="cover_id_pic_url" value="<?php echo ($data["config"]["pic_url"]["value"]); ?>"/>
                            <div class="upload-img-box">
                              <?php if(!empty($data["config"]["pic_url"]["value"])): ?><div class="upload-pre-item2"><img width="100" height="100" src="<?php echo (get_cover_url($data["config"]["pic_url"]["value"])); ?>"/></div>
                                <em class="edit_img_icon">&nbsp;</em><?php endif; ?>
                            </div>
                          </div>

</div>
<div class="form-item cf show show3">
  <label class="item-label"> 链接: <span class="check-tips">点击图文消息跳转链接</span> </label>
  <div class="controls">
    <input type="text" name="config[url]" class="text input-large" value="<?php echo ($data["config"]["url"]["value"]); ?>">
  </div>
</div>
<script type="text/javascript">
$(function(){
	 initUploadImg();
	
	 })
function changeOption(){
	$(".show").each(function(){
		$(this).hide();
		
	});
	
	var val = $("input[name='config[type]']:checked").val();
	$('.show'+val).each(function(){
		$(this).show();
	});
}
$(function(){
	var type = "<?php echo (intval($data["config"]["type"]["value"])); ?>";
	if(type=="0")
	    type = 3;
		
	$("input[name='config[type]'][value="+type+"]").attr("checked",true); 
	changeOption();
})
</script>