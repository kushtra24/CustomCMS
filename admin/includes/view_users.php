   <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">All Users</h1>
        </div>
    <!-- /.col-lg-12 -->
    </div>

   <div class="show_categories">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading"></div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table align="center" width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th>User image</th>
                                    <th>Role</th>
                                    <th>radsalt</th>
                                    <th>edit</th>
                                    <th>Kill</th>
                            </thead>
                            <tbody>
                                <tr>
                                <!-- get this (list_all_posts()) from funkctions.php file to display here -->
                                <?php
                                // these functions come from functions.php for admin page. 
                                delete_user();
                                list_all_users();

                                if (isset($edit_user_submit)) {
                                    echo("Success, You've updated the post");
                                }

                                ?>
                                
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>

