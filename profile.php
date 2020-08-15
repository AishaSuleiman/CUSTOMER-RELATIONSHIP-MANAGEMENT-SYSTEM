<?php include('header.php'); ?>
<div id="middle">
    <div id="result_result"></div>
    <div class="row" id ="hide_on_search" >
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>MY PROFILE</b>
                </div>
                <div class="panel-body">
                    <div class="panel-group" id="accordion"><br/><br/>
                        <table  class="table table-striped table-bordered" id="tableData">
                            <tbody>
                            <tr>
                                <td style="width: 20%">First name</td><td><?php echo strtoupper($row1['first_name']); ?></td>
                            </tr>
                            <tr>
                                <td style="width: 20%">Last Name</td><td><?php echo strtoupper($row1['last_name']); ?></td>
                            </tr>
                            <tr>
                                <td style="width: 20%">E-Email</td><td><?php echo $row1['email']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 20%">Mobile number</td><td><?php echo $row1['phone_number']; ?></td>
                            </tr>
                            <tr>
                                <td style="width: 20%">User ID</td><td><?php echo $row1['user_id']; ?></td>
                            </tr>
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