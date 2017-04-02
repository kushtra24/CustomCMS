            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit post</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

    <form role="form" method="post" enctype="multipart/form-data">
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
            <input value="<?php echo $post_title; ?>" type="text" name="post_title" class="form-control" id="postTitle" placeholder="Post title">
          </div>
          <div class="form-group">
          <p>Corrent category: <?php echo $category_title ?></p>
           <select class="form-control" name="post_category">
            <?php
            //Get all categories to display in a dropdown menu
              $query = "SELECT * FROM categories";
              $show_all_categories_in_the_table = mysqli_query($connect, $query);
              while ($row = mysqli_fetch_assoc($show_all_categories_in_the_table)) {
                  $cat_title = $row['cat_title'];
                  $cat_id = $row['cat_id'];
                   echo "<option value='$cat_id'>{$cat_title}</option>";
                }
             ?>
          </select>
          </div>
          <div class="form-group">
            <label for="postAuthor">Post author</label>
            <input type="text" name="post_author" value="<?php echo $post_author; ?>"  class="form-control" id="postAuthor" placeholder="Post author">
          </div>
          <div class="form-group">
            <label for="postStatus">Post status</label>
            <input type="text" name="post_status" value="<?php echo $post_status; ?>" class="form-control" id="postStatus" placeholder="Post status">
          </div>

          <div class="form-group">
            <label for="image">Change image</label><br>
          <div class="" style="border: 2px solid #ccc; width: 185px; padding: 15px 15px 0;">
           <img src="img/<?php echo $post_image; ?>" alt="post_img" width="150px">
            <p style="text-align: center;"><?php echo $post_image; ?></p>
          </div>
            <input type="file" name="image" id="post_image">
          </div>

          <div class="form-group">
            <label for="postTags">Post tags</label>
            <input type="text"  name="post_tags" value="<?php echo $post_tags; ?>" class="form-control" id="postTags" placeholder="Post tags">
          </div>
          <div class="form-group">
            <label for="content">Content</label>
              <textarea name="post_content" class="form-control" rows="3"><?php echo $post_content; ?></textarea>
          </div>


      <?php
            }
    }
            //if the update_category field is set
            if (isset($_POST['edit_post_input'])) {
              //get the name from the input (input_cat_title)
                $post_author = $_POST['post_author'];
                $post_title = $_POST['post_title'];
                $post_category_title = $_POST['post_category'];
                $post_status = $_POST['post_status'];
                $post_image = $_FILES['image']['name'];
                $post_image_temp = $_FILES['image'] ['tmp_name'];
                $post_content = $_POST['post_content'];
                $post_tags = $_POST['post_tags'];

                move_uploaded_file($post_image_temp, "img/$post_image");

                if (empty($post_image)) {

                  $query = "SELECT * FROM posts WHERE post_id = {$post_id} ";

                  $iamge_query = mysqli_query($connect, $query);

                  while ($row = mysqli_fetch_assoc($iamge_query)) {

                    $post_image = $row['post_image'];

                  }

                  // confirm_query_is_working($iamge_query);

                }

$query = " UPDATE posts SET post_title = '{$post_title}', post_category_id = {$post_category_title}, post_date = now(), post_author = '{$post_author}', post_status = '{$post_status}', post_tags = '{$post_tags}', post_content = '{$post_content}', post_image = '{$post_image}' WHERE post_id = {$post_id} ";

                // $query = " UPDATE posts SET ";
                // $query .= "post_title = '{$post_title}', ";
                // $query .= "post_category_id = {$post_category_title}, ";
                // $query .= "post_date = now(), ";
                // $query .= "post_author = '{$post_author}', ";
                // $query .= "post_status = '{$post_status}', ";
                // $query .= "post_tags = '{$post_tags}', ";
                // $query .= "post_content = '{$post_content}', ";
                // $query .= "post_image = '{$post_image}' WHERE post_id = {$post_id} ";

              $update_query = mysqli_query($connect, $query);

               confirm_query_is_working($update_query);

               header("Location: ?burimi=edit_posts&p_id=$post_id");


             }
            ?>
                <p class="help-block"></p>
                <input type="submit" name="edit_post_input" value="Ruaje" class="btn btn-default">
      </div>
    </div>
    </form>