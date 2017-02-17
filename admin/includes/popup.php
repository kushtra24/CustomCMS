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
                  <?php 

        if (isset($_GET['edit'])) {
            $edit_cat = $_GET['edit'];

            $query = "SELECT * FROM categories WHERE cat_id = $edit_cat";
            $select_cat_id = mysqli_query($connect, $query);

            while ($row = mysqli_fetch_assoc($select_cat_id)) {
                $cat_id = $row ['cat_id'];
                $cat_title = $row['cat_title']; 
?>
                <input value=" <?php if (isset($cat_title)) {
                    echo $cat_title;
                } ?>" type="text" class="form-control" id="recipient-name">
                <?php
            }
        }

         ?>
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