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
                    <b>Order status</b>
                </div>
                <div class="panel-body">
                    <div class="panel-group" id="accordion"><br/><br/>
                        <table  class="table table-striped table-bordered" id="tableData">
                            <tbody>
                            <tr><td colspan="8">If you receive your oder please help us to now by click flag at action colum</td></tr>
                            <tr><td style="width: 2%;text-align: center;">#</td><td style="width: 15%;text-align: center;">Oder Name</td><td style="width: 15%;text-align: center;">Requested date</td><td style="width: 15%;text-align: center;">Delivery date</td><td style="text-align: center;">Order Detail</td><td>Request Status</td><td style="width: 2%">Action</td></tr>
                            <?php
                            $date = date("d-m-y");
                            if(isset($_GET['confirm'])){
                                $query = "UPDATE `requests` SET status='received', delivery_date='$date' WHERE  request_id='".$_GET['id']."'";
                                $statement=$db->prepare($query);
                                $statement->execute();
                            }
                            $i=1;
                            $query = "SELECT * FROM `requests` WHERE phone='$mobile'";
                            $statement=$db->prepare($query);
                            $statement->execute();
                            $row1=$statement->fetchAll(PDO::FETCH_ASSOC);
                            foreach($row1 as $row){
                                echo "<tr><form method='GET' action='keep_oder.php'><td style='width: 2%'>".$i."</td><td style='width: 15%'>".$row['request_type']."</td><td>".$row['request_date']."</td><td>".$row['delivery_date']."</td><td>".$row['description']."</td><td>".$row['status']."</td><td style='text-align:center;'><button id='btn_2' name='confirm'><span class='fa fa-flag'></span></button><input type='hidden' name='id' value='".$row['request_id']."'></td></form></tr>";
                                $i++;
                            }
                            if($i==1){
                                echo "<tr><td colspan='8'><i style='color: red;'>Sorry you have no oder yet</i></td></tr>";
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