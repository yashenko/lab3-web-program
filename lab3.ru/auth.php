<?php
	if (isset($_POST['login']) && isset($_POST['password']))
	{	 
		if (!empty($_POST['login']) && !empty($_POST['password']))
		{
			$login = clearData($_POST['login']);
			$password = clearData($_POST['password']);    	
			$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
			$_SESSION['user_login'] = $login;
			header("Location: http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
			exit;
		}
		else echo "<font color=red>Заполните все поля!</font>";
	}
	if (isset($_GET['logout'])) 
	{		
		session_destroy();
		header("Location: index.php");
		exit;
	}
	
	if (!isset($_SESSION['user_login']) and $_SESSION['ip'] != $_SERVER['REMOTE_ADDR'])
	{
?>

<table class="content">
	<tr>
		<td>
			<h4>Вход в систему</h4>
			<form method="POST">
				<p>Логин:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="text" name="login"><br>
				<p>Пароль:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="password" name="password"><br>
				<p><input type="submit"><br>
			</form>
		</td>
	</tr>
</table>
<?php	
	}
?>