<h1>Products</h1>
<a href="<?php echo App\Config\Config::url("/admin/products/create")?>">Create New Product</a>
<table class="table">
  <tr>
    <th>ID</th>
    <th>Image</th>
    <th>Name</th>
    <th>Price</th>
    <th>Description</th>
    <th>Created At</th>
    <th></th>
  </tr>
  <?php foreach ($products as $product) {?>
  <tr>
    <td><?php echo $product->product_id?></td>
    <td><img class="small-blocked-image" src="<?php echo \App\Config\Config::url($product->image)?>"></td>
    <td><?php echo $product->name?></td>
    <td>R$ <?php echo number_format($product->price,2,',','.')?></td>
    <td><?php echo $product->description?></td>
    <td><?php echo date('d/m/Y H:i:s',strtotime($product->created_at))?></td>
    <td>
      [<a href="<?php echo App\Config\Config::url("/admin/products/delete?id=".$product->product_id)?>">Delete</a>]
      [<a href="<?php echo App\Config\Config::url("/admin/products/edit?id=".$product->product_id)?>">Edit</a>]
    </td>
  </tr>
  <?php }?>
</table>