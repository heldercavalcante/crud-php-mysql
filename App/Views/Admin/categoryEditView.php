<h1>Form - Edit Category</h1>

<form class="form" method="POST" enctype="multipart/form-data" action="<?php echo App\Config\Config::url('admin/categories/edit/save?id='.$category->cat_id);?>">
  <div>
    <label for="name">Name</label>
    <input type="text" name="cat_name" value="<?php echo $category->cat_name?>">
  </div>
  <div>
    <button type="submit">Save</button>
  </div>
</form>