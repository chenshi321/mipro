<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>管理中心</title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Public/Admin/Styles/general.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/Styles/main.css" rel="stylesheet" type="text/css" />
<link href="/Public/datepicker/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="/Public/datepicker/jquery-1.7.2.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/datepicker/jquery-ui-1.9.2.custom.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/datepicker/datepicker_zh-cn.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/Public/ueditor/lang/zh-cn/zh-cn.js"></script>

</head>
<body>
<h1>
    <span class="action-span"><a href="<?php echo $_page_btn_link; ?>"><?php echo $_page_btn_name; ?></a></span>
    <span class="action-span1"><a href="#">管理中心</a></span>
    <span id="search_id" class="action-span1"> - <?php echo $_page_title; ?> </span>
    <div style="clear:both"></div>
</h1>

<!-- 页面中的内容 -->

<div class="main-div">
    <form name="main_form" method="POST" action="/index.php/Admin/Category/add.html" enctype="multipart/form-data">
        <table cellspacing="1" cellpadding="3" width="100%">
			<tr>
				<td class="label">上级权限：</td>
				<td>
					<select name="parent_id">
						<option value="0">顶级权限</option>
						<?php foreach ($parentData as $k => $v): ?>						<option value="<?php echo $v['id']; ?>"><?php echo str_repeat('-', 8*$v['level']).$v['cat_name']; ?></option>
						<?php endforeach; ?>					</select>
				</td>
			</tr>
            <tr>
                <td class="label">分类名称：</td>
                <td>
                    <input  type="text" name="cat_name" value="" />
                </td>
            </tr>
            <tr>
                <td class="label">筛选属性：</td>
                <td>
	                <ul>
		                <li>
		                	<a href="javascript:void(0);" onclick="addNew(this);">[+]</a>
		                    <select name="type_id[]">
		                    <option value="">选择类型</option>
		                    <?php foreach ($typeData as $k => $v): ?>
		                    <option value="<?php echo ($v["id"]); ?>"><?php echo ($v["type_name"]); ?></option>
		                    <?php endforeach; ?>
		                    </select>
		                    
		                    <select name="attr_id[]">
		                    	<option value="">选择属性</option>
		                    </select>
		                </li>
	                </ul>
                </td>
            </tr>
            <tr>
                <td colspan="99" align="center">
                    <input type="submit" class="button" value=" 确定 " />
                    <input type="reset" class="button" value=" 重置 " />
                </td>
            </tr>
        </table>
    </form>
</div>
<script>
$("select[name='type_id[]']").change(function(){
	var _this = $(this);
	// 获取选择的类型的ID
	var typeId = $(this).val();
	var opt = "<option value=''>选择属性</option>";
	// 如果选择了一个类型就执行AJAX取出个类型下的属性
	if(typeId != "")
	{
		$.ajax({
			type : "GET",
			url : "<?php echo U('Admin/Goods/ajaxGetAttr', '', FALSE); ?>/type_id/"+typeId,
			dataType : "json",
			success : function(data)
			{
				// 把返回的属性放到属性的下拉框中
				$(data).each(function(k,v){
					opt += "<option value='"+v.id+"'>"+v.attr_name+"</option>";
				});
				// 把这个下拉框后面的一个下拉框放进去
				_this.next("select").html(opt);
			}
		});
	}
	else
		_this.next("select").html(opt);
});
function addNew(a)
{
	var li = $(a).parent();
	if($(a).html() == "[+]")
	{
		var newli = li.clone(true);  // 深度克隆，把标签上的事件也克隆
		newli.find("a").html("[-]");
		li.after(newli);
	}
	else
		li.remove();
}
</script>





















<div id="footer">php34</div>
</body>
</html>

<script type="text/javascript" charset="utf-8" src="/Public/Admin/Js/tron.js"></script>