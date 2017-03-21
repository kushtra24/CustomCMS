<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add post</h1>
        </div>
    <!-- /.col-lg-12 -->
    </div>
<?php post_a_post(); ?>


<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="postTitle">Post title</label>
    <input type="text" name="post_title" class="form-control" id="postTitle" placeholder="Post title">
  </div>
  <div class="form-group">
    <label for="postCategoryId">Post category id</label>
    <input type="text" name="post_category_id" class="form-control" id="postCategoryId" placeholder="Post category id">
  </div>
  <div class="form-group">
    <label for="postAuthor">Post author</label>
    <input type="text" name="post_author" class="form-control" id="postAuthor" placeholder="Post author">
  </div>
  <div class="form-group">
    <label for="postStatus">Post status</label>
    <input type="text" name="post_status" class="form-control" id="postStatus" placeholder="Post status">
  </div>
  <div class="form-group">
    <label for="image">add image</label>
    <input type="file" name="post_image" id="post_image">
  </div>
  <div class="form-group">
    <label for="postTags">Post tags</label>
    <input type="text" name="post_tags" class="form-control" id="postTags" placeholder="Post tags">
  </div>
  <div class="form-group">
    <label for="content">Content</label>
      <textarea name="post_content" class="form-control" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-default" name="add_for_submit">Add Post</button>
</form>