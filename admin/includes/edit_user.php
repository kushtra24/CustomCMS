            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit User</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

    <form role="form" method="post" enctype="multipart/form-data">
    <div class="panel panel-warning">
      <div class="panel-body">
        <p class="help-block setarator"></p>

      <?php
        // show all posts atributes in an form.
         if (isset($_GET['user_id'])) {
        $user_id = $_GET['user_id'];
          //query to edit the field in the database
          $query = "SELECT * FROM users WHERE user_id = $user_id";
          $select_users = mysqli_query($connect, $query);

            //while loop to fetch the data to the field
           while ($row = mysqli_fetch_assoc($select_users)) {
                $user_id = $row['user_id'];
                $username = $row['username'];
                $password = $row['password'];
                $email = $row['email'];
                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
                $userimg = $row['user_img'];
                $role = $row['role'];
                $randsalt = $row['randsalt'];
      ?>

                  <div class="form-group">
                    <label for="postTitle">Username</label>
                    <input type="text" value="<?php echo $username; ?>" name="username" class="form-control" id="postTitle" placeholder="Post title">
                  </div>
                  <div class="form-group">
                    <label for="postTitle">Password</label>
                    <input type="text" value="<?php echo $password; ?>" name="password" class="form-control" id="postTitle" placeholder="Post title">
                  </div>
                  <div class="form-group">
                    <label for="postTitle">First name</label>
                    <input type="text" value="<?php echo $first_name; ?>" name="first_name" class="form-control" id="postTitle" placeholder="<?php echo $first_name; ?>">
                  </div>
                  <div class="form-group">
                    <label for="postTitle">Last name</label>
                    <input type="text" value="<?php echo $last_name; ?>" name="last_name" class="form-control" id="postTitle" placeholder="Post title">
                  </div>
                  <div class="form-group">
                    <label for="postTitle">EMail name</label>
                    <input type="email" value="<?php echo $email; ?>" name="email" class="form-control" id="postTitle" placeholder="Post title">
                  </div>
                  <div class="form-group">
                    <label for="image">Add image</label>
                      <div class="" style="border: 2px solid #ccc; width: 185px; padding: 15px 15px 0;">
                       <img src="img/<?php echo $userimg; ?>" alt="user-image" width="150px">
                        <p style="text-align: center;"><?php echo $userimg; ?></p>
                      </div>
                        <input type="file" name="image" id="post_image">
                  </div>
                  <div class="form-group">
                    <label for="postTitle">Role</label>
                    <p>Corrent category: <?php echo $role ?></p>
                    <select class="form-control" name="role">
                        <option value="Admin">Administrator</option>
                        <option value="moderator">Moderator</option>
                        <option value="subscriber">Subscriber</option>
                    </select>
                  </div>
      <?php
            }
    }
            //if the update_category field is set
            if (isset($_POST['edit_user_submit'])) {
              //get the name from the input (input_cat_title)

                $user_name = $_POST['username'];
                $user_password = $_POST['password'];
                $user_firstname = $_POST['first_name'];
                $user_lastname = $_POST['last_name'];
                $user_image = $_FILES['image']['name'];
                $user_image_temp = $_FILES['image'] ['tmp_name'];
                $user_email = $_POST['email'];
                $user_role = $_POST['role'];

                move_uploaded_file($user_image_temp, "img/$user_image");

                if (empty($user_image)) {
                  $query = "SELECT * FROM users WHERE user_id = {$user_id} ";
                  $iamge_query = mysqli_query($connect, $query);
                  while ($row = mysqli_fetch_assoc($iamge_query)) {
                    $user_image = $row['user_img'];
                  }

                  // confirm_query_is_working($iamge_query);

                }

$query = " UPDATE users SET username = '{$user_name}', password = '{$user_password}', first_name = '{$user_firstname}', last_name = '{$user_lastname}', email = '{$user_email}', role = '{$user_role}', user_img = '{$user_image}' WHERE user_id = {$user_id} ";

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

               header("Location: users.php");
             }
            ?>
                <p class="help-block"></p>
                <input type="submit" name="edit_user_submit" value="Ruaje" class="btn btn-default">
      </div>
    </div>
    </form>