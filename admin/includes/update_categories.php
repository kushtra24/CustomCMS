 <div class="hidden_desabled" id="edit_form">
    <form role="form" method="post">
    <div class="panel panel-warning">
      <div class="panel-heading">
          Change Categories
      </div>
      <div class="panel-body">
        <p class="help-block setarator"></p>

      <?php 
          // Update or change a category
            //query to edit the field in the database
            $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
            $select_cat_id = mysqli_query($connect, $query);
            //while loop to fetch the data to the field
            while ($row = mysqli_fetch_assoc($select_cat_id)) {
                $cat_id = $row ['cat_id'];
                $cat_title = $row['cat_title']; 
                $is_menu = $row['is_menu'];
      ?>
        <!-- check if the cat title is set and display the category title -->
        <input value="<?php if (isset($cat_title)) {echo $cat_title;} ?>" name="input_cat_title" type="text" class="form-control">

        <div class="form-group">
            <label for="postTags">Add to menu</label>
            <input type='checkbox' name='is_menu_checkbox' <?php echo ($row['is_menu']==1 ? 'checked' : '');?>>
          </div>
      <?php
            }
            //if the update_category field is set
            if (isset($_POST['update_category'])) {
              //get the name from the input (input_cat_title) 
            $the_cat_title = $_POST['input_cat_title'];
            $is_menu = (($_POST['is_menu_checkbox']) ? '1' : '0');

            $query = "UPDATE categories SET cat_title = '$the_cat_title', is_menu = '$is_menu' WHERE cat_id = $cat_id";
            $update_query = mysqli_query($connect, $query);

                if (!$update_query) {
                    die("Query faild" . mysqli_error($connect));
                  }

                   header("Location: categories.php");
            }//update_category
       ?>

                <p class="help-block"></p>
                <input type="submit" name="update_category" value="Ruaje" class="btn btn-default">
      </div>
    </div>
    </form>
</div>
<script>
// jQuery('#edit_categorys').click(function() {
//   jQuery('#edit_form').addClass("active");;
// });
</script>
