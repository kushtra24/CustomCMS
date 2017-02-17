<?php include 'includes/header.php' ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Categories</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
                    <?php 

                if(isset($_POST['submit'])) {

                    $cat_titles = $_POST['cat_title'];

                    if ($cat_titles == "" || empty($cat_titles)) {
                       
                    }
                    else{
                        $query = "INSERT INTO Categories(cat_title) ";
                        $query .= "value('{$cat_titles}')";

                        $create_category_query = mysqli_query($connect, $query);

                        if (!$create_category_query) {
                            die('Query faild' . mysqli_error($connect));
                        }
                    }
                }

                 ?>
            <form role="form" method="post">
                <div class="form-group col-md-6">
                <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage Categories
                        </div>
                <div class="panel-body">
                    <input class="form-control text" name="cat_title" type="text" placeholder="Add a categorie to your page" required>
                    <p class="help-block"></p>
                    <input type="submit" name="submit" value="Add category" class="btn btn-default">
                </div>
                </div>
                </div>
            </form>

            <div class="add-categry-form">
                           <!-- /.row -->
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Categorie Data
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Categorie Title</th>
                                </thead>
                                <tbody>
                                <?php 
                                    $query = "SELECT * FROM categories";

                                    $show_all_categories_in_the_table = mysqli_query($connect, $query);
                
                                    while ($row = mysqli_fetch_assoc($show_all_categories_in_the_table)) {
                                        $cat_id = $row['cat_id'];
                                        $cat_title = $row['cat_title'];
                                        echo "
                                        <tr>
                                            <td>$cat_id</td>
                                            <td>$cat_title</td>
                                        </tr>
                                        ";
                                        } 
                                ?>
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


<?php include 'includes/footer.php' ?>


</body>

</html>
