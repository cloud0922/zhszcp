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
<table id="dg" title="My Users" style="width:700px;height:250px"
			toolbar="#toolbar" pagination="true" idField="id"
			rownumbers="true" fitColumns="true" singleSelect="true">
		<thead>
			<tr>
				<th field="course_id" width="50" editor="{type:'validatebox',options:{required:true}}">First Name</th>
				<th field="course_name" width="50" editor="{type:'validatebox',options:{required:true}}">Last Name</th>
				<th field="classes_name" width="50" editor="text">Phone</th>
			</tr>
		</thead>
	</table>
	<div id="toolbar">
		<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="javascript:$('#dg').edatagrid('addRow')">New</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="javascript:$('#dg').edatagrid('destroyRow')">Destroy</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="javascript:$('#dg').edatagrid('saveRow')">Save</a>
		<a href="#" class="easyui-linkbutton" iconCls="icon-undo" plain="true" onclick="javascript:$('#dg').edatagrid('cancelRow')">Cancel</a>
	</div>
	<script type="text/javascript">
		$(function(){
			$('#dg').edatagrid({
				url: "<?php echo U('TCC/Index');?>",
				saveUrl: 'save_user.php',
				updateUrl: 'update_user.php',
				destroyUrl: 'destroy_user.php'
			});
		});
	</script>
	<h2>Basic DataGrid</h2>
	<p>The DataGrid is created from markup, no JavaScript code needed.</p>
	<div style="margin:20px 0;"></div>
	
	<table class="easyui-datagrid" title="Basic DataGrid" style="width:700px;height:250px"
			data-options="singleSelect:true,collapsible:true,url:'datagrid_data1.json',method:'get'">
		<thead>
			<tr>
				<th data-options="field:'itemid',width:80">课程编号</th>
				<th data-options="field:'productid',width:100">课程名字</th>
				<th data-options="field:'listprice',width:80,align:'right'">班级</th>
				<th data-options="field:'unitcost',width:80,align:'right'">Unit Cost</th>
				<th data-options="field:'attr1',width:250">Attribute</th>
				<th data-options="field:'status',width:60,align:'center'">Status</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
					<td>【<?php echo ($vo["course_id"]); ?>】</td><td><?php echo ($vo["course_name"]); ?></td><td><?php echo ($vo["classes_name"]); ?></td><td><?php echo ($vo["appraiser"]); ?></td><td><?php echo ($vo["status"]); ?></td>
				</tr><?php endforeach; endif; ?>
			<tr><td colspan="4"><?php echo ($page); ?></td></tr>
		</tbody>
	</table>

</body>
</html>