<html>
<head>
<title>Login Form</title>
<style>
ul{
}
li{
list-style-type:none;
height:35px;


}
label{
width:200px;
display:inline-block;
}
#fs{
margin-left:auto;
margin-right:auto;
width:35%;
}
</style>
</head>
<body>
	<div>
	<form action="enter.php" method="POST" target="$_BLANK">
	<fieldset id="fs">
	<legend>
	Enter your Credentials		
	</legend>	
	<ul>
	<li><label>User Name: </label><input type="text" name="us" >*</li>
	<li><label>Password: </label><input type="password" name="pass" required="required" >*</li>
	<li><input type="submit" value="Login" name="sub"></li>
	<li><a href="forgot.php">Forgot Password</a></li>
	</ul>
	</fieldset>
	</form>
	
	</div>
	<div>
	<form action="insert.php" method="POST" >
	<fieldset id="fs">
	<legend>
	Register Here
	</legend>	
	<ul>
	<li><label>Name: </label><input type="text" name="name" required="required">*</li>
	
	<li><label>User Id: </label><input type="text" name="us" required="required" >*</li>
	<li><label>Password: </label><input type="password" name="pass" required="required" >*</li>
	<li><label>Nick Name: </label><input type="text" name="nn" required="required">*</li>
	<li><label>Phone: </label><input type="text" name="phone" ></li>
	
	
	<li><input type="submit" value="Login" name="sub"></li>
	
	</ul>
	</fieldset>
	</form>
	
	</div>
	
</body>
</html>