
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>API测试页面</title>
</head>
<style>
	.file{
		filter:alpha(opacity:0);
		opacity: 0;
		width:0;
	}
</style>


<body style="background-color: gray;">

	<p>S-4.2.新建分类</p>
	<form action="/api/device_term_add" method="post">
		access_token：<input type="text" name="access_token" value="irFs6FQCE6WEysR01rAYUW8ASgHrE47Z_1531197746" size="60">
		分类名称:<input type="text" name="term_name">
		<input type="submit" value="提交">
	</form>
	
	<p>S-4.2.修改分类</p>
	<form action="/api/device_term_edit" method="post">
		access_token：<input type="text" name="access_token" value="irFs6FQCE6WEysR01rAYUW8ASgHrE47Z_1531197746" size="60">
		分类编号(term_id):<input type="text" name="term_id">
		分类名称:<input type="text" name="term_name">
		<input type="submit" value="提交">
	</form>

	<p>S-4.2.查看分类 逆查询,通过term_id,查看分类下都有什么设备</p>
	<form action="/api/device_term_subclass" method="post">
		access_token：<input type="text" name="access_token" value="irFs6FQCE6WEysR01rAYUW8ASgHrE47Z_1531197746" size="60">
		分类编号(term_id):<input type="text" name="term_id">
		请求开始数(limit_begin): <input type="text" name="limit_begin">
		请求截止数(limit_end):<input type="text" name="limit_num">
		<input type="submit" value="提交">
	</form>

	
<br/>
<br/>
<br/>
<br/>