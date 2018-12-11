<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<title>学生综合素质测评指标</title>  
<style type="text/css">
*{margin:0;padding:0;list-style-type:none;}
a,img{border:0;}
body{font:12px/180% Arial, Helvetica, sans-serif, "新宋体";}
p{margin:20px 0 10px 0;}
</style>

<script src="<?php echo (__JS__); ?>jquery-1.5.1.js" type="text/javascript"></script>
<script src="<?php echo (__JS__); ?>jquery.raty.js" type="text/javascript"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
<!--<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script> -->
<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

<div class="container">
	<h2>学生综合素质测评指标</h2>                             
	<table class="table table-hover">
		<thead>
			<tr>
				<th>指标代码</th>
				<th>说明</th>
				<th>测评周期</th>
				<th>测评人</th>
				<th>状态</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
					<td>【<?php echo ($vo["id"]); ?>】</td><td><?php echo ($vo["name"]); ?></td><td><?php echo ($vo["period"]); ?></td><td><?php echo ($vo["appraiser"]); ?></td><td><?php echo ($vo["status"]); ?></td>
				</tr><?php endforeach; endif; ?>
			<tr><td colspan="4"><?php echo ($page); ?></td></tr>
		</tbody>
	</table>
</div>
</body>
</html>