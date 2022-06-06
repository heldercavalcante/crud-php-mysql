<h1>Form - create Product</h1>

<form class="form" method="POST" enctype="multipart/form-data" action="<?php echo App\Config\Config::$BASE_URL.'admin/products/create/save';?>">
  <div>
    <label for="image">Image</label>
    <input type="file" name="image">
  </div>
  <div>
    <label for="name">Name</label>
    <input type="text" name="name">
  </div>
  <div>
      <label for="product_cat_id">Category</label>
      <select name="product_cat_id">
      <?php foreach ($categories as $category) {?>
        <option value="<?php echo $category->cat_id?>"><?php echo $category->cat_name?></option>
      <?php } ?>
      </select>
  </div>
  <div>
    <label for="price">Price</label>
    <input type="text" name="price">
  </div>
  <div>
    <label for="description">Description</label>
    <textarea name="description"></textarea>
  </div>
  <div>
    <button type="submit">Save</button>
  </div>
</form>