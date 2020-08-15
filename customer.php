<?php
/**
 * Created by PhpStorm.
 * User: Ali
 * Date: 6/18/2016
 * Time: 12:23 AM
 */
include('header.php'); ?>
<div id="middle">
    <div id="result_result"></div>
    <div class="row" id ="hide_on_search" >
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>Customers</b>
                </div>
                <div class="panel-body">
                    <div class="panel-group" id="accordion"><br/><br/>
                        <table  class="table table-striped table-bordered" id="tableData">
                            <tbody>
                            <?php
                            //delete 	user from user list
                            if(isset($_GET['delete'])){
                                $query = "select * from user_details  where user_id='".$_GET['id']."'";
                                $statement=$db->prepare($query);
                                $statement->execute();
                                $row1=$statement->fetchAll(PDO::FETCH_ASSOC);
                                foreach($row1 as $row)
                                if($row['privilage']=="all"){
                                    echo "<br/><b style='color:red;padding-left:5%;'> * This user could not be deleted</b> ";
                                }
                                else{
                                    $query = "delete from user_details where user_id='".$_GET['id']."' ";
                                    $statement=$db->prepare($query);
                                    $statement->execute();
                                    echo "<br/><b style='color:red;padding-left:1%;'> * User deleted successfully</b> ";
                                }
                            }
                            else if(isset($_GET['edit'])){

                                if(isset($_GET['update'])){
                                    $query = "UPDATE `user_details` SET `first_name`='".$_GET['fname']."',`last_name`='".$_GET['lname']."',`email`='".$_GET['email']."',`phone_number`='".$_GET['mobile']."' WHERE user_id = '".$_GET['id']."' ";
                                    $statement=$db->prepare($query);
                                    $statement->execute();
                                    echo "<br/><b style='color: #1b6d85;padding-left:1%;'>User updated successfully</b> ";
                                }
                                echo"<tr><td>First Name</td><td>Last Name</td><td>Customer ID</td><td>E-Mail</td><td style='text-align:center'>Mobile</td><td style='text-align:center;width: 4%'>Action</td></tr>";
                                $query = "select * from user_details WHERE user_id = '".$_GET['id']."'";
                                $j=1;
                                $statement=$db->prepare($query);
                                $statement->execute();
                                $row1=$statement->fetchAll(PDO::FETCH_ASSOC);
                                foreach($row1 as $row){
                                    $fname=$row['first_name'];
                                    $lname=$row['last_name'];
                                    $full_name = $fname." ".$lname;
                                    $email=$row['email'];
                                    $user_id=$row['user_id'];
                                    $mobile=$row['phone_number'];
                                    echo"<form action='customer.php'><tr><td><input type='text' id='middle-edit-box' name='fname' value='".strtoupper($fname)."'></td><td><input type='text' id='middle-edit-box' name='lname' value='".strtoupper($lname)."'></td><td><input type='text' id='middle-edit-box' name='user_id' value='$user_id' title = 'You can not edit User ID' disabled><input type='hidden' name='id' value='$user_id'></td><td><input type='text' id='middle-edit-box' name='email' value='$email'></td><td><input type='text' id='middle-edit-box' name='mobile' value='$mobile'></td><td style='text-align:center'><button id='btn_2' name='edit'><span class='fa fa-edit'></span></button><input type='hidden' name='update' value='update'></td></tr></form>";
                                    $j++;
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                        <table  class="table table-striped table-bordered" id="tableData">
                            <tbody>
                            <?php

                            if($privilege=="admin"){
                                $query = "select * from user_details WHERE privilage = 'Customer' order by first_name ASC";
                                $statement=$db->prepare($query);
                                $statement->execute();
                               
                            }
                            else{
                                $query = "select * from user_details WHERE privilage = 'Customer' and _register='$mobile' order by first_name ASC";
                                $statement=$db->prepare($query);
                                $statement->execute();
                            }
                               $j=1;
                            echo"<tr><td>#</td><td>Name</td><td>Customer ID</td><td>E-Mail</td><td style='text-align:center'>Mobile</td><td colspan='2' style='text-align:center;width: 4%;$dis;'>Action</td></tr>";

                            $row1=$statement->fetchAll(PDO::FETCH_ASSOC);
                            foreach($row1 as $row){
                                $fname=$row['first_name'];
                                $lname=$row['last_name'];
                                $full_name = $fname." ".$lname;
                                $email=$row['email'];
                                $user_id=$row['user_id'];
                                $mobile=$row['phone_number'];
                                echo"<tr><td>".$j."</td><td>".strtoupper($full_name)."</i></td><td><a data-toggle='myToolTip' class='tooltip-style' data-placement='bottom' title='".$row['privilage']."' >".$user_id."</a></td><td><a>".$email."</a></td><td><a>".$mobile."</a></td><td style='text-align:center;$dis;'><form action='customer.php'><button id='btn_1' name='delete'><span class='fa fa-trash'></span></button></td><td style='text-align:center;$dis;'><button id='btn_2' name='edit'><span class='fa fa-edit'></span></button><input type='hidden' name='id' value='".$user_id."'></form></td></tr>";
                                $j++;
                            }

                            if($j<=1){
                                echo"<tr><td colspan='6'><b><i style='color:red;'>No Customer added or not assigned to you please add or assign a customer</i></td></tr>";
                            }

                            if(isset($_GET['change-year'])){
                                $query = "update user_details set year='".$_GET['year']."' where full_name='administrator'";
                                $statement=$db->prepare($query);
                                $statement->execute();
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end of main panel -->
        </div>
    </div>
</div>
<div id="right">
    <div id="inside_right">
    </div>
</div>
</div>
</div>
</div>
</body>
</html>
<script type="text/javascript" src="../js/ali_query.js"> </script>