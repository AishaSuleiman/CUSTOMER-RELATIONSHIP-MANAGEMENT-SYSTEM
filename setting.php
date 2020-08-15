<?php include('header.php'); ?>
<div id="middle">
    <div id="result_result"></div>
    <div class="row" id ="hide_on_search" >
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>SETTING</b>
                </div>
                <div class="panel-body">
                    <div class="panel-group" id="accordion"><br/><br/>
                        <form role="form" action="setting.php" name="passwordForm" method="POST" style='padding-left:7.5%'>
                            <label>Change account password</label></br></br>
                            <div class="form-group">
                                <input class = "input-box" id='new_password' autocomplete="off"  placeholder="Enter new password" type="password" name="password" required/>
                                <div id="new_pass" style="margin-top: 1%;color: red"></div>
                            </div>
                            <div class="form-group">
                                <input class = "input-box" id='re_entered_pass' autocomplete="off"  placeholder="Confirm password" type="password"  name="confirm_password" required/>
                                <div id="con_pass" style="margin-top: 1%;color: red"></div>
                            </div>
                            <div class="form-group">
                                <input class = "input-box" id='re_entered_pass' autocomplete="off"  placeholder="Old password" type="password"  name="old_password" required/>
                                <div id="con_pass" style="margin-top: 1%;color: red"></div>
                            </div>
                            <?php
                                if(isset($_POST['accept'])){

                                    if($row1['password'] == $_POST['old_password']){
                                        if($_POST['password'] == $_POST['confirm_password']){
                                            $email = $_SESSION['email'];// Storing
                                            $query ="UPDATE `user_details` SET `password`= '".$_POST['password']."' where email='".$email."'  ";
                                          
                                            $statement=$db->prepare($query);
                                            $statement->execute();
                                            $rows= $statement->rowCount();
                                            echo "<br/><b style='color: lightseagreen;padding-left:1%;'> * Password updated successfully</b></br></br>";
                                        }
                                        else{
                                            echo "<br/><b style='color:red;padding-left:1%;'> * Password mismatch !</b></br></br>";
                                        }
                                    }
                                    else{
                                        echo "<br/><b style='color:red;padding-left:1%;'> * Old password is invalid !</b></br></br>";
                                    }

                                }
                            ?>
                            <button type="submit" name="accept" class="btn btn-default">Save</button><a href="default.php" style="margin-left: 1%"  class="btn btn-default">Cancel</a>
                            <br/><br/>
                        </form>
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