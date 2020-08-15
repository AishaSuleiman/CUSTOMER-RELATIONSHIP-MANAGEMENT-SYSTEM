<?php include('header.php'); ?>
<div id="middle">
				<div id="result_result"></div>
				<?php
				if(isset($_POST['accept'])){
				if (empty($_POST['password'])|| empty($_POST['email'])|| empty($_POST['fname'])|| empty($_POST['lname'])) {
				$error = "* Data field could not be empty";
				$_SESSION['msg'] ="<b id='error-sms'>".$error."</b><br/>" ;
					$fname = $_POST['fname'];
					$lName = $_POST['lname'];
					$email = $_POST['email'];
					$mobiles = $_POST['mobile'];
					$passwor= $_POST['password'];
				
					$userType= $_POST['userType'];
				}
				else if($_POST['password'] != $_POST['confirm_password']){
				$_SESSION['msg']="<b id='error-sms'>* Password Mismatch !</b><br/>";
				}
				else{
					$fname = $_POST['fname'];
					$lName = $_POST['lname'];
					$email = $_POST['email'];
					$mobiles = $_POST['mobile'];
					$password = $_POST['password'];
				
					$userType= $_POST['userType'];
				
					
				//check if user name exist or mot
				$sql ='select * from user_details where phone_number=?';
				$statement=$db->prepare($sql);
				$statement->execute(array($mobiles));
				$rows= $statement->rowCount();
				if($rows){
					$_SESSION['msg']="<b id='error-sms'>* User entered is already used !</b><br/>";
					}
				else{
					$sql = 'INSERT INTO `user_details` VALUES (?,?,?,?,?,?,?,?)';
				$statement=$db->prepare($sql);
				$statement->execute(array(Null,$fname,$lName,$password,$email,$mobiles,$mobile,$userType));
				$rows= $statement->rowCount();
				$_SESSION['msg']="<b style='font-size: 13px;margin-left:1%;font-family:times new roman;color: #4989bd;'>New user registered successful !</b><br/>";
				}
				}
				}
				?>
				<div class="row" id="currentPane" >
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<b>REGISTRATION FORM</b>
							</div>
							<form role="form" action="registration.php" name="passwordForm" method="POST" style='padding-left:7.5%'>
								<br/></br>
								<div class="form-group">
									<input class = "input-box" id='fullName' value="<?php if(isset($_SESSION['fName'])){ echo $_SESSION['fName'];}?>" autocomplete="off"  placeholder="Enter First name" type="text"  name="fname" required/>
									<div id="full_Name" style="margin-top: 1%;color: red"></div>
								</div>
								<div class="form-group">
									<input class = "input-box" id='fullName' value="<?php if(isset($_SESSION['lName'])){ echo $_SESSION['lName'];}?>" autocomplete="off"  placeholder="Enter last name" type="text"  name="lname" required/>
									<div id="full_Name" style="margin-top: 1%;color: red"></div>
								</div>
								<div class="form-group">
									<input class = "input-box" id='work_place' autocomplete="off" value="<?php if(isset($_SESSION['email'])){ echo $_SESSION['email'];}?>"  placeholder='Enter e-mail' type="email"  name="email" required/>
									<div id="id" style="margin-top: 1%;color: red"></div>
								</div>
								<div class="form-group">
									<input class = "input-box" id='work_place' autocomplete="off" value="<?php if(isset($_SESSION['mobile'])){ echo $_SESSION['mobile'];}?>"  placeholder='Enter mobile number' type="mobile"  name="mobile" required/>
									<div id="id" style="margin-top: 1%;color: red"></div>
								</div>
								<div class="form-group">
									<input class = "input-box" id='new_password' autocomplete="off"  placeholder="Enter password" type="password" name="password" required/>
									<div id="new_pass" style="margin-top: 1%;color: red"></div>
								</div>
								<div class="form-group">
									<input class = "input-box" id='re_entered_pass' autocomplete="off"  placeholder="Confirm password" type="password"  name="confirm_password" required/>
									<div id="con_pass" style="margin-top: 1%;color: red"></div>
								</div>
								<div class="form-group">
									<select name="userType"><option>User type</option><option style="<?php echo $dis;?>">Staff</option><option>Customer</option></select>
								</div>
								<div class="text-group" id='error-sms'><?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];unset($_SESSION['msg']);}?></div>
								<button type="submit" name="accept" class="btn btn-default">Save</button><a href="default.php" style="margin-left: 1%"  class="btn btn-default">Cancel</a>
								<br/><br/>
							</form>
						</div>
						<!-- end of main panel -->
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
</body>
</html>
<script type="text/javascript" src="../js/ali_query.js"> </script>
<script type="text/javascript">
	function aboutDeveloper(){
		document.getElementById("about").innerHTML ='</br></br><div class="panel-group" id="accordion"><div style="margin-bottom:1%;"><div class="row" id ="homePage" ><div class="col-lg-12"><div class="panel panel-default" style="padding-bottom:2%;padding-left:2%;padding-top:2%;margin-bottom:1%;">Comment:</br></br><form method="POST" action="adminHome.php"><textarea style="width:50%;height:200px;resize:none;margin-bottom:1%;padding-left:2%;padding-right:2%;border: 1px solid rgba(0,142,198,1);" placeholder="leave your comment" name="comment" required></textarea></br></br><input type="submit" value="Send" style="background: rgb(255,255,255);color: rgba(0,142,198,1); border: 1px solid rgba(0,142,198,1);border-radius: 48px;" name="send"><input type="button" onclick="home()" style="background: rgb(255,255,255);color: rgba(0,142,198,1); border: 1px solid rgba(0,142,198,1);border-radius: 48px;" value="Close"></form></div></div></div></div>';
	}
</script>