<?php include 'includes/header.php' ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Categories</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
         <?php add_categories(); ?>
        
        <div class="form-group col-md-6">
            <form role="form" method="post">
                <div class="panel panel-default">
                        <div class="panel-heading">
                            Add categories
                        </div>
                    <div class="panel-body">
                        <input class="form-control text" name="input_cat_title_add" type="text" placeholder="Shto një kategori në faqen tënde" required>
                        <p class="help-block"></p>
                        <input type="submit" name="add_category_submit" value="Shto Categori" class="btn btn-default">
                    </div>
                </div>
            </form>

            <?php   if (isset($_GET['edit'])) {
                        $cat_id = $_GET['edit'];
                    // Update or change a category
                        include 'includes/update_categories.php';

                    }//if is set edit
            ?>
            
        </div>

            <div class="show_categories">
                           <!-- /.row -->
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Categorie Data
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table align="center" width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Categorie Title</th>
                                </thead>
                                <tbody>
                                <?php show_all_categories(); ?>

                                </tbody>
                                <?php delete_categories(); ?>
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
