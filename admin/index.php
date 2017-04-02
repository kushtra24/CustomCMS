<?php include 'includes/header.php' ?>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                    <p>hello <?php echo $_SESSION['username']; ?></p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                                        $query = "SELECT * FROM comments";
                                        $select_comments = mysqli_query($connect, $query);
                                        $post_comments = mysqli_num_rows($select_comments);
                                    ?>
                                    <div class='huge'><?php echo "$post_comments"; ?></div>
                                    <div>All Comments!</div>
                                </div>
                            </div>
                        </div>
                        <a href="comments.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-align-left fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                <?php
                                    $query = "SELECT * FROM posts";
                                    $select_posts = mysqli_query($connect, $query);
                                    $all_posts = mysqli_num_rows($select_posts);
                                ?>
                                    <div class="huge"><?php echo "$all_posts"; ?></div>
                                    <div>All posts!</div>
                                </div>
                            </div>
                        </div>
                        <a href="all_posts.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                <?php
                                    $query = "SELECT * FROM users";
                                    $select_users = mysqli_query($connect, $query);
                                    $all_users = mysqli_num_rows($select_users);
                                ?>
                                    <div class="huge"><?php echo "$all_users"; ?></div>
                                    <div>All Users!</div>
                                </div>
                            </div>
                        </div>
                        <a href="users.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                <?php
                                    $query = "SELECT * FROM categories";
                                    $select_categories = mysqli_query($connect, $query);
                                    $all_categories = mysqli_num_rows($select_categories);
                                ?>
                                    <div class="huge"><?php echo "$all_categories"; ?></div>
                                    <div>All Categories!</div>
                                </div>
                            </div>
                        </div>
                        <a href="categories.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
                
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include 'includes/footer.php' ?>


</body>

</html>
