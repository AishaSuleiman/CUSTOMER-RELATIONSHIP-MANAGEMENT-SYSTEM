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
                    <b>Order</b>
                </div>
                <div class="panel-body">
                    <div class="panel-group" id="accordion"><br/><br/>

                        <?php
                            function generatePassword($length) {
                                $possibleChars = "abcdefghijklmnopqrstuvwxyz1234567890";
                                $password = '';

                                for($i = 0; $i < $length; $i++) {
                                    $rand = rand(0, strlen($possibleChars) - 1);
                                    $password .= substr($possibleChars, $rand, 1);
                                }

                                return strtoupper($password);
                            }
                             $id = generatePassword(4);
                            if(isset($_GET['edit'])){

                                if(isset($_GET['re_id'])){
                                    $query = "UPDATE `requests` SET `request_type`='".$_GET['oderName']."',`description`='".$_GET['detail']."',`request_date`='".$_GET['re_date']."',`delivery_date`='".$_GET['d_date']."',status='".$_GET['status']."' WHERE `request_id`='".$_GET['re_id']."'";
                                    $statement=$db->prepare($query);
                                    $statement->execute();
                                    echo "<br/><b style='color: blue;padding-left:1%;'> * Order edited successfully</b> ";
                                }
                                else {
                                    ?>
                                    <table class="table table-striped table-bordered" id="tableData">
                                        <tbody>
                                        <tr>
                                            <td style="width: 10%;text-align: center;">Status</td>
                                            <td style="width: 15%;text-align: center;">Name</td>
                                            <td style="width: 15%;text-align: center;">Requested date</td>
                                            <td style="width: 15%;text-align: center;">Delivery date</td>
                                            <td style="text-align: center;">Order Detail</td>
                                            <td style="width: 5%;text-align: center;">Action</td>
                                        </tr>
                                        <?php
                                        $i = 1;
                                        $query ="SELECT * FROM `requests` WHERE request_id = '" . $_GET['id'] . "'";
                                        $statement=$db->prepare($query);
                                        $statement->execute();
                                        $row1=$statement->fetchAll(PDO::FETCH_ASSOC);
                                        foreach($row1 as $row) {
                                            echo " <tr><form method='GET' action='order.php'>
                                            <td><select name='status'><option>Status</option><option>requested</option><option>on process</option><option>on journey</option><option>reached</option></select></td><td style='width: 15%'><input type='tex' id='middle-edit-box' name='oderName' value='" . $row['request_type'] . "'></td><td style='width: 15%'><input type='tex' id='middle-edit-box' name='re_date' value='" . $row['request_date'] . "'></td><td style='width: 15%'><input type='tex' id='middle-edit-box' name='d_date' value='" . $row['delivery_date'] . "'></td><td><input type='tex' id='edit-box' name='detail' value='" . $row['description'] . "'></td><td style='text-align:center'><button id='btn_2' name='edit'><span class='fa fa-edit'></span></button><input type='hidden' name='re_id' value='" . $row['request_id'] . "'></td></form></tr>";
                                            $i++;
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                    <?php
                                }
                            }
                        else if(isset($_GET['delete'])){
                            $query = "DELETE FROM `requests` WHERE request_id = '".$_GET['id']."'";
                            $statement=$db->prepare($query);
                            $statement->execute();
                            echo "<br/><b style='color:red;padding-left:1%;'> * Order deleted successfully</b> ";
                        }
                        ?>

                        <table  class="table table-striped table-bordered" id="tableData">
                            <tbody>
                            <?php
                            if(isset($_GET['add_oder'])){

                                if(isset($_GET['id'])) {
                                    $query ="INSERT INTO `requests`(`request_id`, `request_type`, `description`, `request_date`, `delivery_date`, `phone`,`signed`, `status`) VALUES ('$id','".$_GET['request_type']."','".$_GET['description']."','".$_GET['re_date']."','".$_GET['d_date']."','".$_GET['phone']."','$mobile','".$_GET['status']."')";
                                    $statement=$db->prepare($query);
                                    $statement->execute();
                                    $row = $statement->rowCount();
                                    echo "<br/><b style='color: blue;padding-left:1%;'> * Order added successfully</b> ";
                                }
                                else{
                                    $query = "SELECT * FROM `user_details` WHERE privilage='Customer'";
                                    $statement=$db->prepare($query);
                                    $statement->execute();
                                 
                                   
                                    echo " <tr><form method='GET' action='order.php'><td>></td><td><select name='phone'><option>Select number</option>";
                                    $row1=$statement->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($row1 as $row){
                                        echo "<option>".$row['phone_number']."</option>";
                                    }
                                        echo"</select></td><td style='width: 15%' colspan='2'><input type='tex' id='edit-box' name='request_type' placeholder='Oder Name' required/></td><td style='width: 15%'><input type='date' id='middle-edit-box' name='re_date' placeholder='Requested date' required/></td><td style='width: 15%'><input type='date' id='middle-edit-box' name='d_date' placeholder='Delivery date' required/></td><td colspan='2'><input type='tex' id='edit-box' name='description' placeholder='Oder Detail' required/></td><td><select name='status'><option>Status</option><option>requested</option><option>on process</option><option>on journey</option><option>reached</option></select></td><td style='text-align:center;'><button id='btn_2' name='add_oder'><span class='fa fa-floppy-save'></span></button><input type='hidden' name='id' value='id'></td></form></tr>";
                                }
                            }
                            ?>
                            </tbody>
                            </table>
                            <table  class="table table-striped table-bordered" id="tableData">
                            <tbody>
                            <tr><td style="width: 2%;text-align: center;">#</td><td style="width: 13%;text-align: center;">Phone number</td><td style="width: 15%;text-align: center;">Oder Name</td><td style="width: 13%;text-align: center;">Requested date</td><td style="width: 13%;text-align: center;">Delivery date</td><td style="text-align: center;">Order Detail</td><td>Status</td><td style="width: 10%;text-align: center;" colspan="2">Action</td></tr>
                          <?php
                          if($privilege=="admin"){
                              $query = "SELECT * FROM `requests` WHERE 1";
                              $statement=$db->prepare($query);
                              $statement->execute();
                          }
                          else{
                              $query = "SELECT * FROM `requests` WHERE signed='$mobile'";
                              $statement=$db->prepare($query);
                              $statement->execute();
                             
                          }
                          $i=1;
                          $row1=$statement->fetchAll(PDO::FETCH_ASSOC);
                              foreach($row1 as $row){
                              echo "<tr><form method='GET' action='order.php'><td style='width: 2%'>".$i."</td><td style='width: 10%'>".$row['phone']."</td><td style='width: 15%'>".$row['request_type']."</td><td>".$row['request_date']."</td><td>".$row['delivery_date']."</td><td>".$row['description']."</td><td>".$row['status']."</td><td style='$dis'><button id='btn_1' name='delete'><span class='fa fa-trash'></span></button></td><td style='text-align:center;'><button id='btn_2' name='edit'><span class='fa fa-edit'></span></button><input type='hidden' name='id' value='".$row['request_id']."'></td></form></tr>";
                          $i++;
                          }
                          ?>
                            <form method='GET' action='order.php'> <tr><td colspan="9"><button name="add_oder" class="btn btn-sm btn-default">Add oder</button></td></tr></form>
                            </tbody>
                        </table>
                    </div>
                </div>
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