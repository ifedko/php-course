<h1><?php echo $pageData['title']; ?></h1>
<div>
	<form name="auth_form" method="post">
		Input data
		<br>
		<textarea name="input_data" rows="10" cols="60"></textarea>
		<br>
		<input type="submit" name="task_run" value="Run task">
	</form>
	<!-- <form name="auth_form" method="post">
		<input type="text" name="username"><br>
		<input type="password" name="password"><br>
		<select name="user_type">
			<option value="user">User</option>
			<option value="admin">Admin</option>
		</select>
		<br>
		<input type="checkbox" name="remember_me">Remember me<br>
		<input type="radio" name="auth_type" value="simple">Simple auth type<br>
		<input type="radio" name="auth_type" value="hard" checked>Hard auth type<br>
		<input type="submit" name="auth_submit" value="Login">
	</form> -->
</div>
<div class="task-item">
	Task:<br>
	<?php echo $pageData['description']; ?>
</div>
<div class="task-item">
	Input:<br>
	<?php echo $pageData['inputData']; ?>
</div>
<div class="task-item">
	Output:<br>
	<?php echo $pageData['result']; ?>
</div>
<div class="task-item">
	Code:<br>
	...
</div>
