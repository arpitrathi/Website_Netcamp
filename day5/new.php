
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
	<form action="trainenter.php" method="POST" >
	<fieldset id="fs">
	<legend>
	Enter your Credentials		
	</legend>	
	<ul>
	<li><label>Train Number </label><input type="text" name="tno" required="required"  >*</li>
	<li><label>Train Name</label><input type="text" name="tname" required="required" >*</li>
	<li><label>No Of seats</label><input type="text" name="seats" ></li>
	
	
	<li><input type="submit" value="Submit" name="tdet"></li>
	
	</ul>
	</fieldset>
	</form>
	
	</div>
	<div>

