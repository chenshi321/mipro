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

<!-- 列表 -->
<div class="list-div" id="listDiv">
<form action="/index.php/Admin/Goods/goods_number/id/23/p/1.html" method="POST">
	<table cellpadding="3" cellspacing="1">
    	<tr>
    		<?php foreach ($attr as $k => $v): ?>
    		<th><?php echo ($v["0"]["attr_name"]); ?></th>
    		<?php endforeach; ?>
            <th width="80">库存</th>
			<th width="30">操作</th>
        </tr>
        <?php if($gnData): ?>
	        <?php foreach ($gnData as $k0 => $v0): if($k0 == 0) $opt = '+'; else $opt = '-'; ?>
		        <tr>
		        	<?php foreach ($attr as $k => $v): ?>
		    		<td>
		    		<select name="goods_attr_id[]">
		    			<option value="">请选择</option>
		    			<?php foreach ($v as $k1 => $v1): if(strpos(','.$v0['goods_attr_id'].',', ','.$v1['id'].',') !== FALSE) $select = 'selected="selected"'; else $select = ''; ?>
		    			<option <?php echo ($select); ?> value="<?php echo ($v1["id"]); ?>"><?php echo ($v1["attr_value"]); ?></option>
		    			<?php endforeach; ?>
		    		</select>
		    		</td>
		    		<?php endforeach; ?>
		            <td><input type="text" size="8" name="goods_number[]" value="<?php echo ($v0["goods_number"]); ?>" /></td>
					<td><input type="button" onclick="addnew(this);" value="<?php echo ($opt); ?>" /></td>
		        </tr>
	        <?php endforeach; ?>
	    <?php else: ?>
	    	<tr>
		        	<?php foreach ($attr as $k => $v): ?>
		    		<td>
		    		<select name="goods_attr_id[]">
		    			<option value="">请选择</option>
		    			<?php foreach ($v as $k1 => $v1): if(strpos(','.$v0['goods_attr_id'].',', ','.$v1['id'].',') !== FALSE) $select = 'selected="selected"'; else $select = ''; ?>
		    			<option <?php echo ($select); ?> value="<?php echo ($v1["id"]); ?>"><?php echo ($v1["attr_value"]); ?></option>
		    			<?php endforeach; ?>
		    		</select>
		    		</td>
		    		<?php endforeach; ?>
		            <td><input type="text" size="8" name="goods_number[]" value="<?php echo ($v0["goods_number"]); ?>" /></td>
					<td><input type="button" onclick="addnew(this);" value="+" /></td>
		      </tr>
	    <?php endif; ?>
        <tr id="btn"><td colspan="<?php echo count($attr)+2; ?>" align="center"><input type="submit" value="提交" /></td></tr>
	</table>
</form>
</div>
<script>
function addnew(btn)
{
	// 先获取点击的按钮所在的tr
	var tr = $(btn).parent().parent();
	if($(btn).val() == "+")
	{
		// 克隆tr
		var newtr = tr.clone();
		// 把+变-
		newtr.find(":button").val("-");
		// 把到btn所在的TR前面
		$("#btn").before(newtr);
	}
	else
		tr.remove();
}
</script>

<div id="footer">php34</div>
</body>
</html>

<script type="text/javascript" charset="utf-8" src="/Public/Admin/Js/tron.js"></script>