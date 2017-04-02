   <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">All Comments</h1>
        </div>
    <!-- /.col-lg-12 -->
    </div>

   <div class="show_categories">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        All Comments
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table align="center" width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Author</th>
                                    <th>Content</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>In response to</th>
                                    <th>Post submited</th>
                                    <th>Aprove</th>
                                    <th>Disaprove</th>
                                    <th>edit</th>
                                    <th>Kill</th>
                            </thead>
                            <tbody>
                                <tr>
                                <!-- get this (list_all_posts()) from funkctions.php file to display here -->
                                <?php
                                // these functions come from functions.php for admin page. 
                                delete_comments();
                                list_all_comments();
                                aprove_comments();
                                disaprove_comments();

                                if (isset($edit_post_input)) {
                                    echo("Success, You've updated the post");
                                }

                                ?>
                                
                                </tr>
                            </tbody>
                            <a href=""></a>
                        </table>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>

