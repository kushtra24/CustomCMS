<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add post</h1>
        </div>
    <!-- /.col-lg-12 -->
    </div>
<?php add_a_user(); ?>


<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="postTitle">Username</label>
    <input type="text" name="username" class="form-control" id="postTitle" placeholder="Post title">
  </div>
  <div class="form-group">
    <label for="postTitle">Password</label>
    <input type="text" name="password" class="form-control" id="postTitle" placeholder="Post title">
  </div>
  <div class="form-group">
    <label for="postTitle">First name</label>
    <input type="text" name="first_name" class="form-control" id="postTitle" placeholder="Post title">
  </div>
  <div class="form-group">
    <label for="postTitle">Last name</label>
    <input type="text" name="last_name" class="form-control" id="postTitle" placeholder="Post title">
  </div>
  <div class="form-group">
    <label for="postTitle">EMail name</label>
    <input type="email" name="email" class="form-control" id="postTitle" placeholder="Post title">
  </div>
  <div class="form-group">
    <label for="image">Add image</label>
    <input type="file" name="user_image" id="post_image">
  </div>
  <div class="form-group">
    <label for="postTitle">Role</label>
    <select class="form-control" name="role">
        <option value="Admin">Administrator</option>
        <option value="moderator">Moderator</option>
        <option value="subscriber">Subscriber</option>
    </select>
  </div>

  <button type="submit" class="btn btn-default" name="add_user">Add Post</button>
</form>