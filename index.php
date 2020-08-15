<!DOCTYPE html>
<!---->
<html>
	<head>
		<meta charset='utf-8'>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
		<title>CRM</title>
		<link rel='stylesheet' type='text/css' href='../style/style1.css'/>
		<link rel='stylesheet' type='text/css' href='../style/dive_background.css'/>
		<link rel='icon' href='../images/green.png' type='image/x-icon'/>
	</head>

<body style ='font-size:13px;font-family:Georgia, serif, sans-serif;' >
	<div id='wrapper'>
		<nav class='navbar navbar-default navbar-fixed-top' role='navigation' style='margin-bottom: 0' id='headerdive'>
			<div class='navbar-header'>
				<a class='navbar-brand'><b style="color:white;">Customer Relationship Management</b> </a>
			</div>
		</nav>
	<div id='page-wrapper'>
		<div class='row'>
			</br></br>
		</div>
	<div id='main_center'>
	<div id='left'>
	</div>
	<div style="height:50%;	width:40%;float:left;margin-left:30%;margin-top:7%;">
	<div class="row">
	<div class="col-lg-12">
	<div class="panel panel-default">
	<div class="panel-heading">
	<b style="color:#39b1cc">Login</b>
	</div>
			<form role="form" action="index.php" name="passwordForm" method="POST" style='padding-left:7.5%'>
			<br/></br>
			<div class="form-group">
			<img src='../images/profile1.jpg' id='login-image'>
			<input data-toggle="myToolTip" class='tooltip-style' data-placement="bottom" autocomplete="off" style="display:block;width:90%;height:34px;padding:6px 32px;font-size:14px;line-height:1.428571429;color:#555;background-color:#fff;background-image:none;border:1px solid #ccc;border-radius:4px;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075);box-shadow:inset 0 1px 1px rgba(0,0,0,.075);-webkit-transition:border-color ease-in-out .15s,box-shadow ease-in-out .15s;transition:border-color ease-in-out .15s,box-shadow ease-in-out .15s" placeholder="Enter User email" type="text"  name="email" />
			</div>
			<div class="form-group">
			<img src='../images/key.png' id='login-image'>
			<input data-toggle="myToolTip" class='tooltip-style' data-placement="bottom" autocomplete="off" style="display:block;width:90%;height:34px;padding:6px 32px;font-size:14px;line-height:1.428571429;color:#555;background-color:#fff;background-image:none;border:1px solid #ccc;border-radius:4px;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075);box-shadow:inset 0 1px 1px rgba(0,0,0,.075);-webkit-transition:border-color ease-in-out .15s,box-shadow ease-in-out .15s;transition:border-color ease-in-out .15s,box-shadow ease-in-out .15s" placeholder="Enter  your password" type="password" name="pass"/>
			</div>
<?php
include("db.php");
session_start();
	/***login section and verification***/
	if(isset($_POST['login'])){
						
		$error=''; /*** Variable To Store Error Message ***/
		/***all function start here***/
		if (empty($_POST['email']) || empty($_POST['pass'])) {
			$error = "* incorrect email or password";
			echo "<b style='font-size:11px;font-family:times new roman;color:red;'>".$error."</b>"."<br/>" ;
		}
		else{
			/***Define $phone_number and $password***/
			$email=$_POST['email'];
			$password=$_POST['pass'];
			//$password = stripslashes($password);
			//$password = $password;
	//	$_SESSION['login_user'] = $emailemail; // Initializing Session
			/***SQL query to fetch information of registerd users and finds user match.***/
			$sql = 'select * from user_details where email=? and password=? ';
			$statement=$db->prepare($sql);
			$statement->execute(array($email,$password));
			$rows= $statement->rowCount();
			
			if($rows){
				$row=$statement->fetchAll(PDO::FETCH_ASSOC);
				foreach($row as $rows)
				$_SESSION['email'] = $rows['email'];
			
				header("location:home.php");
			}else{
					$error = "* incorrect email or password";
					echo "<b style='font-size:11px;font-family:times new roman;color:red;'>".$error."</b><br/>" ;
				}
			
		}
    }	
//login section and verification
?>
				<br/>
			<button type="submit" name="login" class="btn btn-default">Login</button>
			<a  style = 'text-decoration:none'><button type="reset" class="btn btn-default">Cancel</button></a>
			<br/><br/>
			</form>
			<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
			</div>
			<!-- /.col-lg-12 -->
			</div>
			</div>
			<div id="right">
				<div id="inside_right">
				</div>
			</div>
		</div>		
	</div>
</div>
	<div id="inside_footer">
				Customer Relationship Management</br>
					All right reserved.</br>
					Copyright © Suza
		</div>
	</body>
</html>	