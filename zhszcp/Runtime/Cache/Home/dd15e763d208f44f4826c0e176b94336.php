<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<style type="text/css">
*{margin:0;padding:0;list-style-type:none;}
a,img{border:0;}
body{font:12px/180% Arial, Helvetica, sans-serif, "新宋体";}
p{margin:20px 0 10px 0;}
</style>
	<link rel="stylesheet" type="text/css" href="<?php echo (__EASYUI__); ?>themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="<?php echo (__EASYUI__); ?>themes/icon.css">
	<script type="text/javascript" src="<?php echo (__EASYUI__); ?>jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo (__EASYUI__); ?>jquery.easyui.min.js"></script>
<script src="<?php echo (__JS__); ?>jquery-1.5.1.js" type="text/javascript"></script>
<script src="<?php echo (__JS__); ?>jquery.raty.js" type="text/javascript"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
<!--<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script> -->
<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="easyui-layout" style="width:100%;height:600px;">
		<div data-options="region:'north'" style="height:80px">
			<p>Basic Layout</p>
			
		</div>
		
		<!--<div data-options="region:'west',split:true" title="当前指标：【<?php echo ($index); ?>】" style="width:500px;"></div> -->
		<div data-options="region:'center',split:true,iconCls:'icon-ok'" title="班级：<?php echo ($cname); ?>">
			<table class="table table-hover" style="width:100%">
				<thead>
					<tr>
						<th >学生编号</th>
						<th>学生姓名</th>
						<th>测评指标</th>
						<th>评星等级</th>
					</tr>
				</thead>
				<tbody>
				<form name="form" id="form" action="<?php echo U('Evaluate/submit');?>" method="post">
				<td style="display:none;"><input type="hidden" name="sids" id="sids" value="<?php echo ($sids); ?>"/></td>
					<?php if(is_array($stu)): foreach($stu as $key=>$vo): ?><tr>
							<td>【<?php echo ($vo["sid"]); ?>】</td>
							<td><?php echo ($vo["C1"]); ?></td>
							<td>【<?php echo ($index); ?>】<?php echo ($indexname); ?></td>
							<td><div id="star<?php echo ($index); ?>-<?php echo ($vo["sid"]); ?>"></div><input type="hidden" name="<?php echo ($index); ?>-<?php echo ($vo["sid"]); ?>" id="<?php echo ($index); ?>-<?php echo ($vo["sid"]); ?>" value="<?php echo ($vo["$index"]); ?>"/></td>	
						</tr><?php endforeach; endif; ?>
					<tr><td style="color:#ff0000">【全局操作】</td>
						<td><div id="starGlobal"></div><input type="hidden" name="Global" id="Global" /></td>
						<td style="color:#ff0000">【<?php echo ($index); ?>】<?php echo ($indexname); ?></td>
						<td><button type="button" class="btn btn-success btn-xs" onclick="applyAll();">应用到所有学生</button></td>	
					</tr>
					<input type="hidden" name="sl_id" id="sl_id" value="<?php echo ($sl_id); ?>"/>
					<input type="hidden" name="index" id="index" value="<?php echo ($index); ?>"/>
					<tr style=""align="center"><td colspan="4"><input type="submit" class="btn btn-primary" value="提交测评单" /></td></tr>
					<tr style=""align="center"><td colspan="4"><a href="javascript:void(0)" class="easyui-linkbutton" onclick="fsubmit()" style="width:80px">Submit</a></td></tr>
				</tbody>
			</table>
		</div>
		<div data-options="region:'south'," style="height:90px;">
		<center>
			<a class="btn btn-success btn-xs" <?php if($lastIndex < 1): ?>href="javascript:void(0)" disabled="true" 
			<?php else: ?>href="<?php echo U('Evaluate/start');?>?sl_id=<?php echo ($sl_id); ?>&cid=<?php echo ($cid); ?>&sname=<?php echo ($sname); ?>&cname=<?php echo ($cname); ?>&indexp=<?php echo ($lastIndex); ?>"<?php endif; ?>>上一项</a>
			<a class="btn btn-success btn-xs"  <?php if($nextIndex > $indexCount): ?>href="javascript:void(0)" disabled="true" 
			<?php else: ?>href="<?php echo U('Evaluate/start');?>?sl_id=<?php echo ($sl_id); ?>&cid=<?php echo ($cid); ?>&sname=<?php echo ($sname); ?>&cname=<?php echo ($cname); ?>&indexp=<?php echo ($nextIndex); ?>"<?php endif; ?>>下一项</a>
		</center>
		<h5 align="center">共计<?php echo ($indexCount); ?>项测评指标，当前第<?php echo ($curIndex); ?>项</h5>
		
		</div>
</div>



	
	

<script type="text/javascript">  
all();

function rat(star,result){

	star= '#' + star;
	result= '#' + result;
	//$(result).hide();//将结果DIV隐藏
	$(star).raty({
		hints: ['需努力','合格', '良好', '优秀'],
		path: "/zhszcp/Common/Common/images",
		starOff: 'star-off-big.png',
		starOn: 'star-on-big.png',
		size: 24,
		start: 40,
		showHalf: true,
		number:4,
		target: result,
		targetType:'',
		//score:2,
		score:$(result).val(),
		targetKeep : true,//targetKeep 属性设置为true，用户的选择值才会被保持在目标DIV中，否则只是鼠标悬停时有值，而鼠标离开后这个值就会消失
		click: function (score, evt) {
			$(result).val(score);
		}
	});
}
function rat2(star,result,m){

	star= '#' + star;
	result= '#' + result;
	
	//$(result).hide();//将结果DIV隐藏
	$(star).raty({
		hints: ['需努力','合格', '良好', '优秀'],
		path: "/zhszcp/Common/Common/images",
		starOff: 'star-off-big.png',
		starOn: 'star-on-big.png',
		size: 24,
		start: 40,
		showHalf: true,
		number:4,
		target: result,
		targetType:'',
		score:m,
		targetKeep : true,//targetKeep 属性设置为true，用户的选择值才会被保持在目标DIV中，否则只是鼠标悬停时有值，而鼠标离开后这个值就会消失
		click: function (score, evt) {
			$(result).val(score);
		}
	});
}
function all()
{

	var fields = $("#sids").val();
	//var prefix = '<?php echo ($index); ?>_';
	var prefix = '<?php echo ($index); ?>-';
	//alert(prefix);
	//alert(fields);
	var f_arr = fields.split(",");
	for (var i=0;i<f_arr.length;i++)
	{
		var star = "star" +prefix + f_arr[i];
		var value = prefix + f_arr[i];
		//alert(value);
		rat(star,value);
	}
	rat('starGlobal','Global');
}
function applyAll()
{

	var fields = $("#sids").val();
	var prefix = '<?php echo ($index); ?>-';
	var f_arr = fields.split(",");
	var v = $("#Global").val();
	//alert(v);
	//exit();
	for (var i=0;i<f_arr.length;i++)
	{
		var star = "star" +prefix + f_arr[i];
		var value = prefix + f_arr[i];
		//alert(value);
		rat2(star,value,v);
	}
	//rat2('starC91-1','C91-1',2);
}
function fsubmit()
{
	var cname = "<?php echo ($cname); ?>";
	var sname = "<?php echo ($sname); ?>";
	var sl_id = "<?php echo ($sl_id); ?>";
	var cid ="<?php echo ($cid); ?>";
	var indexp = parseInt("<?php echo ($nextIndex); ?>");
	var indexCount=parseInt("<?php echo ($indexCount); ?>");
	
	var fields = $("#sids").val();
	var prefix = '<?php echo ($index); ?>-';
	var f_arr = fields.split(",");
	for (var i=0;i<f_arr.length;i++)
	{
		var value = "#" + prefix + f_arr[i];
		//alert($(value).val());
		if($(value).val() == 0)
		{
			alert("编号为【" + f_arr[i] + "】的同学还没有测评哦！");
			return false;
		}
	}
	
	$.ajax({
		type:"post",
		url:"<?php echo U('Evaluate/test');?>",
		async:false,
		data: $('#form').serialize(),
		dataType: "json",
		success:function(msg){
		//alert(msg);
		//exit();
		if(msg){
			if(indexp <= indexCount)
			{
			alert("提交成功,进入下一项！");
			window.location.href="<?php echo U('Evaluate/start');?>?sl_id="+sl_id+"&cid=" + cid +"&sname=" +sname +"&cname="+cname +"&indexp="+indexp;
			}
			else
			{
				alert(cname+sname+"指标已完成！");
			}
		}
		}
	
	});
}
</script>	
</body>
</html>