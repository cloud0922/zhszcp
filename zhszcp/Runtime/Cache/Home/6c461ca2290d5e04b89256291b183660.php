<?php if (!defined('THINK_PATH')) exit();?><form id="ff" method="post" action="<?php echo U('Index/test');?>" >
			<div style="margin-bottom:20px">
				<input class="easyui-textbox" name="C1-1" style="width:100%" data-options="label:'姓名:',required:true,missingMessage:'请输入学生姓名'">
			</div>
			<div style="margin-bottom:20px">
				<input class="easyui-textbox" name="C1-2" style="width:100%" data-options="label:'学号:',required:true">
			</div>
			<div style="margin-bottom:20px">
				<select class="easyui-combobox" name="C1-3" label="性别:" style="width:100%"><option value="男" selected="selected">男</option><option value="女" >女</option></select>
			</div>
			<div style="margin-bottom:20px">
				<input class="easyui-textbox" name="C1-4" style="width:100%" data-options="label:'学籍号:',required:true">
			</div>
			<div style="margin-bottom:20px">	
			</div>
			<input type="submit"  value="submit" /> 
			
</form>