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