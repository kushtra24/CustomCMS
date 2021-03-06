   <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">All Posts</h1>
        </div>
    <!-- /.col-lg-12 -->
    </div>

   <div class="show_categories">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        All Posts
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table align="center" width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tages</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                    <th>Kill</th>
                                    <th>edit</th>
                            </thead>
                            <tbody>
                                <tr>
                                <!-- get this (list_all_posts()) from funkctions.php file to display here -->
                                <?php
                                // these functions come from functions.php for admin page. 
                                delete_posts();
                                list_all_posts();

                                if (isset($edit_post_input)) {
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

