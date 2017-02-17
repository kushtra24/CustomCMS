<?php include 'includes/header.php' ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Categories</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
                    <?php
                // check if the user pressed submit button
                if(isset($_POST['submit'])) {

                    $cat_titles = $_POST['cat_title'];
                    //check if the user filled up the form
                    if ($cat_titles == "" || empty($cat_titles)) {
                       
                    }
                    //if the user filled up the form then inster the data to the category title table in the database
                    else{
                        //this query inserts the data from the form to the cat_title table
                        $query = "INSERT INTO Categories(cat_title)";
                        $query .= "value('{$cat_titles}')";
                        //connect to the database
                        $create_category_query = mysqli_query($connect, $query);
                        //check if the query works if not kill the page and show an error
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
                            Add categories
                        </div>
                <div class="panel-body">
                    <input class="form-control text" name="cat_title" type="text" placeholder="Shto një kategori në faqen tënde" required>
                    <p class="help-block"></p>
                    <input type="submit" name="submit" value="Shto Categori" class="btn btn-default">
<p class="help-block setarator"></p>
                                      <?php 

        if (isset($_GET['edit'])) {
            $edit_cat = $_GET['edit'];

            $query = "SELECT * FROM categories WHERE cat_id = $edit_cat";
            $select_cat_id = mysqli_query($connect, $query);

            while ($row = mysqli_fetch_assoc($select_cat_id)) {
                $cat_id = $row ['cat_id'];
                $cat_title = $row['cat_title']; 
?>
                <input value=" <?php if (isset($cat_title)) {echo $cat_title;} ?>" type="text" class="form-control" id="recipient-name">
                <?php
            }
        }

         ?>
<p class="help-block"></p>
         <input type="submit" name="Update" value="Ruaje" class="btn btn-default">

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
                            <table align="center" width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
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
                                            <td align='center'>$cat_id</td>
                                            <td align='center'>$cat_title <a style='float: right;' href='categories.php?delete=$cat_id'><i class='fa fa-times' aria-hidden='true'></i> </a></a>
                                            <a href='?edit=$cat_id' style='float: right; padding: 0 15px;' ><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
                                            </td>
                                        </tr>
                                        ";
                                        } 
                                ?>
                                </tbody>

                                <?php 
                                //delete a category
                                if (isset($_GET["delete"])) {
                                    $the_cat_id = $_GET['delete'];
                                $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
                                $delet_query = mysqli_query($connect, $query);
                                header("Location: categories.php");
                                }
                                 ?>

                            </table>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>


<!-- Change Popup -->
<div class="modal fade" id="change-category-name" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Change the category name</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">

            <label for="recipient-name" class="control-label">Name:</label>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Mbylle</button>
         <input type="submit" name="submit" value="Ruaje" class="btn btn-default">
      </div>
    </div>
  </div>
</div>

<?php include 'includes/footer.php' ?>


</body>

</html>
