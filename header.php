<?php
/**
 * Created by PhpStorm.
 * User: Ali
 * Date: 6/18/2016
 * Time: 12:05 AM
 */

?>
<!DOCTYPE html>
<!---->
<html>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>CRM</title>
    <link rel='stylesheet' type='text/css' href='style/style1.css'/>
    <link rel='stylesheet' type='text/css' href='style/dive_background.css'/>
    <link rel='icon' href='../images/green.png' type='image/x-icon'/>
    <script type="text/javascript" src="jquery/google.js"> </script>
    <script type="text/javascript" src="jquery/bootrap.js"> </script>
    
<link rel="stylesheet" href="style\fonts\font-awesome\font-awesome.min.css" />

</head>
<?php

   include("db.php");
    if(!$db){
        echo "<p style='font-size:20px;text-align:center;color:red'>"."* Could not connect to the database"."</p>";
    }
    /*end of data base Connection */
    session_start();// Starting Session
    $email = $_SESSION['email'];// Storing
    $sql = 'select * from user_details where email=? ';
    $statement=$db->prepare($sql);
    $statement->execute(array($email));
    $rows= $statement->rowCount();
    $row=$statement->fetchAll(PDO::FETCH_ASSOC);
    foreach($row as $row1)

    $fname = $row1['first_name']." ".$row1['last_name'];
    $privilege = $row1['privilage'];
    $mobile = $row1['phone_number'];
    $email = $row1['email'];
    if(!isset($_SESSION['email'])){
        header("location:logout.php");
    }
    if($privilege=="admin"){
        $dis = "";
    }
    else{
        $dis = "display : none;";
    }
    ?>
<body style ='font-family:Georgia, serif, sans-serif;' >

<div id='wrapper'>
    <nav class='navbar navbar-default navbar-fixed-top' role='navigation' id='headerdive'>
        <div class='navbar-header'>
            <a class='navbar-brand' href='home.php' ><b style="color:white;" data-toggle="myToolTip" class='tooltip-style' data-placement="bottom" title="Go Home Page">Customer Relationship Management</b> </a><div id='search-box'><form action="search.php" method="GET"><input id="enjoy-css" placeholder="Search in this system" name='search' class="form-control"/><span class="fa fa-search" id="g-search-button"></span></form></div>
        </div>
        <div id='ad-menu'>
            <div class="dropdown">
                <b data-toggle="dropdown"><i style="color:yellow;font-family:times new roma"><span class="fa fa-user"></span>&nbsp;&nbsp;Login as : </i>
                    <a href="#" style="color:white;font-family:times new roma"><?php echo "<b style='color:#ffffff;'>".strtolower($fname)."</b>"; // display who login the database ?>
                        <span class="caret"></span></b>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href='profile.php'><span class="fa fa-user"></span>&nbsp;&nbsp;My Profile</a></li>
                    <li><a href='setting.php'><span class="fa fa-cog"></span>&nbsp;&nbsp;Setting</a></li>
                    <li><a href='logout.php'><span class="fa fa-log-out"></span>&nbsp;&nbsp;Sign out </a></li>
                    <li class="divider"></li>
                    <li><a href="#" data-toggle="modal" data-target="#myModal">About Us</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div id='page-wrapper'>
        <div class='row'>
            </br></br>
        </div>
        <div id='main_center'>
            <div id='left'  >
                <div id='inside_left'>
                    <div class='row' >
                        <div class='col-lg-12'>
                            <div  style="position:fixed;width:20%;">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="fa fa-folder-close">
                            </span>Content</a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <table class="table">
                                                <tr>
                                                    <td>
                                                        <span class="fa fa-home"></span><a href="home.php">Home</a>
                                                    </td>
                                                </tr><?php if($privilege=="admin"||$privilege=="Staff"){?>
                                                <tr>
                                                    <td>
                                                        <span class="fa fa-plus"></span><a href="registration.php">Add new user</a>
                                                    </td>
                                                </tr>
                                              
                                                <?php }
                                                else {?>
                                                    <tr>
                                                        <td>
                                                            <span class="fa fa-sort-by-order"></span><a href="keep_oder.php">View oder status</a>
                                                        </td>
                                                    </tr>
                                                   
                                                <?php } ?>
                                                <tr>
                                                    <td>
                                                        <span class="fa fa-comment"></span><a href="comment.php">Comments</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    <ul style="text-decoration:none;" type="none">
                                                    <li><a href='profile.php'><span class="fa fa-user"></span>&nbsp;&nbsp;My Profile</a></li>
                                                    <li><a href='setting.php'><span class="fa fa-cog"></span>&nbsp;&nbsp;Setting</a></li>
                                                    <li><a href='logout.php'><span class="fa fa-sign-out"></span>&nbsp;&nbsp;Sign out </a></li>
                                                    </ul>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                           
								
								
								
								   <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="fa fa-folder-close">
                            </span>View</a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <table class="table">
                                             
												
												
												<?php if($privilege=="admin"||$privilege=="Staff"){?>
                                                    <tr>
                                                    <td>
                                                        <span class="fa fa-users"></span> <a href="customer.php">View registered customer</a>
                                                    </td>
                                                </tr>
                                                
												  <tr>
                                                    <td>
                                                        <span class="fa fa-user"></span> <a href="staffs.php">View staff</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                    <span class="fa fa-cart-plus"></span><a href="order.php">View order</a>
                                                    </td>
                                                </tr>

                                              <?php  }   else {?>
                                                    <tr>
                                                    <td>
                                                    <span class="fa fa-cart-plus"></span><a href="order.php">View order</a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                               
                                            </table>
                                        </div>
                                    </div>
                                </div>
                           
								
								
								
								
								
								
								
								
								
								
								
                            </div>
                            <!--end left frequetly user menu-->
                        </div>
                    </div>
                </div>
            </div>
