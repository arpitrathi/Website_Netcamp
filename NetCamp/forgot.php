
<html>
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
<body>
<div>
	<form action="for.php" method="POST" >
	<fieldset id="fs">
	<legend>
	 Forgot Password	
	</legend>	
	<ul>
	<li><label>User Id </label><input type="text" name="us" required="required">*</li>
	<li><label>Email Address </label><input type="email" name="email" required="required">*</li>
	<li><label>Phone No: </label><input type="text" name="phone" required="required" >*</li>
	
	<li><label>Nick Name</label><input type="text" name="nn" required="required" >*</li>
	<li><input type="submit" value="Submit" name="sub"></li>
	
	</ul>
	</fieldset>
	</form>
	
	</div>
</center>
<a href="index.php">Back</a>
</body>
</html>
