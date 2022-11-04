<?php session_start();
if(isset($userN) || isset($passW) || isset($userlist)){
  $userN = $_POST['username'];
  $passW = $_POST['password'];
  $userlist = file('Users.txt');

  if($userN )
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PHP Login Script Without Using Database</title>
</head>
<body>
<div id="Frame0">
  <h1>The Hangman Login</h1>

</div>
<br>
<form action="the_Hang.php" method="post" name="Login_Form">
  <table width="400" border="0" align="center" cellpadding="5" cellspacing="1" class="Table">
    <?php if(isset($msg)){?>
    <tr>
      <td colspan="2" align="center" valign="top"><?php echo $msg;?></td>
    </tr>
    <?php } ?>
    <tr>
      <td colspan="2" align="left" valign="top"><h3>Login</h3></td>
    </tr>
    <tr>
      <td align="right" valign="top">Username</td>
      <td><input name="Username" type="text" class="Input" required></td>
    </tr>
    <tr>
      <td align="right" valign="top">Password</td>
      <td><input name="Password" type="Password" class="Input" required></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input name="Submit" type="submit" value="Login" class="Button3"></td>
      <form action="hangsignup.php" method="post">
      <td><input name="Submit" type="submit" value="Signup" class="Button3"></td>
    </form>
    </tr>
  </table>

</form>
</body>
</html>