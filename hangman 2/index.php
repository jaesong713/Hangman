<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="signinStyles.css">
</head>
<body>
	<div id="form">
	<form action="login.php" method="post">
		<h2>LOGIN</h2>
		<?php if(isset($_GET['error'])) { ?>
			<p class="error"> <?php echo $_GET["error"]; ?></p>

		<?php } ?> 
		<label for="user">User Name</label>
		<input id="user" type="text" name="uname" placeholder="User Name"><br>
		<label for="key">Password</label>
		<input id="key" type="Password" name="password" placeholder="Password"><br>
		<button type="submit">Login</button>
	
	</div>
</body>
</html>