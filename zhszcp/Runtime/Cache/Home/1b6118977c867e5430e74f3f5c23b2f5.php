<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="keywords" content="巴中棠外小学部,综合素质测评">
	<meta name="description" content="easyui help you build your web page easily!">
	<title>巴中棠外综合素质测评系统</title>
	<link rel="stylesheet" type="text/css" href="<?php echo (__EASYUI__); ?>themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="<?php echo (__EASYUI__); ?>themes/icon.css">
	<script type="text/javascript" src="<?php echo (__EASYUI__); ?>jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo (__EASYUI__); ?>jquery.easyui.min.js"></script>
	<script type="text/javascript" src="<?php echo (__EASYUI__); ?>plugins/jquery.edatagrid.js"></script>
	<link rel="StyleSheet" href="<?php echo (__CSS__); ?>dtree.css" type="text/css" />
	<script type="text/javascript" src="<?php echo (__JS__); ?>dtree.js"></script>
	
</head>
<body>
<table id="dg" title="我的课程和关联班级" style="width:500px;height:250px"
			toolbar="#toolbar" pagination="false" idField="id"
			rownumbers="true" fitColumns="true" singleSelect="true">
		<thead>
			<tr>
				<th field="course_id" width="20%">课程编号</th>
				<th field="course_name" width="20%">课程名</th>
				<th field="classes_name" width="60%" editor="text">班级</th>
			</tr>
		</thead>
	</table>
	<div id="toolbar">
		<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="javascript:$('#dg').edatagrid('addRow')">新增课程</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="javascript:$('#dg').edatagrid('destroyRow')">删除课程</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="javascript:$('#dg').edatagrid('saveRow')">保存新增</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-undo" plain="true" onclick="javascript:$('#dg').edatagrid('cancelRow')">取消更改</a>
	</div>
	<script type="text/javascript">
		$(function(){
			$('#dg').edatagrid({
				url: "<?php echo U('TCC/get');?>",
				saveUrl: "<?php echo U('TCC/save');?>",
				updateUrl: "<?php echo U('TCC/update');?>",
				destroyUrl: "<?php echo U('TCC/destory');?>"
			});
		});
	</script>

</body>
</html>