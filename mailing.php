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
                    <b>Contact by e-mail</b>
                </div>
                <div class="panel-body">
                    <div class="panel-group" id="accordion"><br/><br/>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-16">
                                    <div class="well well-sm">
                                        <form class="form-horizontal" action="" method="post">
                                            <fieldset>


                                                <!-- Message body -->
                                                <div class="form-group">
                                                    <div class="col-md-10">
                                                        <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5" style="width: 800px;"></textarea>
                                                    </div>
                                                </div>

                                                <!-- Form actions -->
                                                <div class="form-group">
                                                    <div class="col-md-12 text-left">
                                                         Send e-mail to all user : <input type="checkbox" name="toAll" value="all">
                                                     </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12 text-left">
                                                        <select>
                                                            <option>Select specific user</option>
                                                            <?php
                                                            $query = $mysql -> query("SELECT * FROM `user_details`") or die($mysql -> error);
                                                            while($row1 = $query -> fetch_Array()){
                                                                echo "<option>".$row1['email']."</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12 text-left">
                                                        <button type="submit" class="btn btn-primary btn-md"><span class="fa fa-envelope"> </span>Send</button>
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