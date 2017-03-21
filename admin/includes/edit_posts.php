            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit post</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

    <form role="form" method="post">
    <div class="panel panel-warning">
      <div class="panel-heading">
          edit posts
      </div>
      <div class="panel-body">
        <p class="help-block setarator"></p>

      <?php
        // show all posts atributes in an form.
         if (isset($_GET['p_id'])) {
        $post_id = $_GET['p_id'];
            //query to edit the field in the database
            $query = "SELECT * FROM posts INNER JOIN categories ON posts.post_category_id = categories.cat_id WHERE post_id = $post_id";
            $select_post_id = mysqli_query($connect, $query);

            //while loop to fetch the data to the field
            while ($row = mysqli_fetch_assoc($select_post_id)) {
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_status = $row['post_status'];
                $post_tags = $row['post_tags'];
                $post_content = $row['post_content'];
                $post_image = $row['post_image'];
                $category_title = $row['cat_title'];
      ?>
        <div class="form-group">
            <label for="postTitle">Post title</label>
            <input value="<?php if (isset($post_title)) {echo $post_title;} ?>" type="text" name="post_title" class="form-control" id="postTitle" placeholder="Post title">
          </div>
          <div class="form-group">
          <p>Corrent category: <?php echo $category_title ?></p>
           <select class="form-control">
            <?php
            //Get all categories to display in a dropdown menu
              $query = "SELECT * FROM categories";
              $show_all_categories_in_the_table = mysqli_query($connect, $query);
              while ($row = mysqli_fetch_assoc($show_all_categories_in_the_table)) {
                  $cat_title = $row['cat_title'];
                   echo "<option>{$cat_title}</option>";
                }
             ?>
          </select>
          </div>
          <div class="form-group">
            <label for="postAuthor">Post author</label>
            <input type="text" name="post_author" value="<?php if (isset($post_author)) {echo $post_author;} ?>"  class="form-control" id="postAuthor" placeholder="Post author">
          </div>
          <div class="form-group">
            <label for="postStatus">Post status</label>
            <input type="text" name="post_status" value="<?php if (isset($post_status)) {echo $post_status;} ?>" class="form-control" id="postStatus" placeholder="Post status">
          </div>

          <div class="form-group">
            <label for="image">Change image</label><br>
          <div class="" style="border: 2px solid #ccc; width: 185px; padding: 15px 15px 0;">
           <img src="img/<?php if (isset($post_image)) {echo $post_image;} ?>" alt="post_img" width="150px">
            <p style="text-align: center;"><?php if (isset($post_image)) {echo $post_image;} ?></p>
          </div>
            <input type="file" name="post_image" id="post_image">
          </div>

          <div class="form-group">
            <label for="postTags">Post tags</label>
            <input type="text"  name="post_tags" value="<?php if (isset($post_tags)) {echo $post_tags;} ?>" class="form-control" id="postTags" placeholder="Post tags">
          </div>
          <div class="form-group">
            <label for="content">Content</label>
              <textarea name="post_content" class="form-control" rows="3"><?php if (isset($post_content)) {echo $post_content;} ?></textarea>
          </div>
      <?php
            }
    }
            //if the update_category field is set
            if (isset($_POST['edit_post_input'])) {
              //get the name from the input (input_cat_title) 
              $the_post_title = $_POST['input_post_title'];
              $post_id = $row['post_id'];
              $post_title = $row['post_title'];
              $post_author = $row['post_author'];
              $post_status = $row['post_status'];
              $post_tags = $row['post_tags'];
              $post_content = $row['post_content'];
              $post_image = $row['post_image'];
              $category_title = $row['cat_title'];


              $query = "UPDATE posts SET post_title = '$the_cat_title' WHERE cat_id = $cat_id";
              $update_query = mysqli_query($connect, $query);

               confirm_query_is_working($update_query);
            ?>
                <p class="help-block"></p>
                <input type="submit" name="edit_post_input" value="Ruaje" class="btn btn-default">
      </div>
    </div>
    </form>