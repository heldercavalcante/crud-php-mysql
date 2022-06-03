<h1>Form - Edit Product</h1>

<form class="form" method="POST" enctype="multipart/form-data" action="<?php echo App\Config\Config::url('admin/products/edit/save?id='.$product->product_id);?>">
  <div>
    <img class="small-blocked-image" src="<?php echo \App\Config\Config::url($product->image)?>">
    <label for="image">Image</label>
    <input type="file" name="image">
  </div>
  <div>
    <label for="name">Name</label>
    <input type="text" name="name" value="<?php echo $product->name?>">
  </div>
  <div>
    <label for="price">Price</label>
    <input type="text" name="price" value="<?php echo $product->price?>">
  </div>
  <div>
    <label for="description">Description</label>
    <textarea name="description"><?php echo $product->description?></textarea>
  </div>
  <div>
    <button type="submit">Save</button>
  </div>
</form>