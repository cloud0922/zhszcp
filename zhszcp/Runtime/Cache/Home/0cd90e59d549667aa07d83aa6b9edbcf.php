<?php if (!defined('THINK_PATH')) exit();?><div style="padding:3px 2px;border-bottom:1px solid #ccc">Ajax Form</div>
	<form id="ff" action="form1_proc.php" method="post">
		<table>
			<tr>
				<td>Name:</td>
				<td><input name="name" type="text"></input></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input name="email" type="text"></input></td>
			</tr>
			<tr>
				<td>Phone:</td>
				<td><input name="phone" type="text"></input></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Submit"></input></td>
			</tr>
		</table>
	</form>