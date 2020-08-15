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
                    <b>Comments</b>
                </div>
                <div class="panel-body">
                    <div class="panel-group" id="accordion"><br/><br/>
                        <div class="container">
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
                            echo $id = generatePassword(4);
                            echo $today = date("F j, Y, g:i a");

                            if(isset($_POST['send'])){
                                $sms = $_POST['message'];
                              
                             $sql = " INSERT INTO `comment`VALUES (?,?,?,?)";
                            $statement=$db->prepare($sql);
                            $statement->execute(array($id,$fname,$today,$sms));
                            $rows= $statement->rowCount();
                                
                            }
                            else if(isset($_GET['delete'])){
                                $sql = "DELETE FROM `comment` WHERE comment_id=?";
                                $statement=$db->prepare($sql);
                                $statement->execute(array($_GET['id']));
                                $rows= $statement->rowCount();
                            }
                            $sql = 'SELECT * FROM `comment` WHERE 1 ORDER BY time DESC  ';
                            $statement=$db->prepare($sql);
                            $statement->execute();
                            $rows= $statement->rowCount();
                            $row1=$statement->fetchAll(PDO::FETCH_ASSOC);
                            foreach($row1 as $row){
                                echo"
                                <i style='color: #1b6d85;'>Sent by : ".$row['sender']."  , ".$row['time']."</i></br>
                                ".$row['comment'];
                                if($privilege=="admin"){
                                 echo "</br><form method='GET' action='comment.php'>
                                <div><button name='delete' id='btn_'>Delete</button><input type='hidden' name='id' value='".$row['comment_id']."'></form></div>";
                               }
                                echo"<hr>";
                            }
                            ?>
                            <div class="row">
                                <div class="col-md-16">
                                    <div class="well well-sm">
                                        <form class="form-horizontal" action="comment.php" method="POST">
                                            <fieldset>
                                                <!-- Message body -->
                                                <div class="form-group">
                                                    <div class="col-md-10">
                                                        <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="2" style="width: 800px;"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12 text-left">
                                                        <button type="submit" name="send" class="btn btn-primary btn-md"><span class="fa fa-comment"> </span>Send</button>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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