<h1>Categories</h1>
<a href="<?php echo App\Config\Config::url("/admin/categories/create")?>">Create New Category</a>
<table class="table">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th></th>
  </tr>
  <?php foreach ($categories as $category) {?>
  <tr>
    <td><?php echo $category->cat_id?></td>
    <td><?php echo $category->name?></td>
    <td>
      [<a href="<?php echo App\Config\Config::url("/admin/categories/delete?id=".$category->cat_id)?>">Delete</a>]
      [<a href="<?php echo App\Config\Config::url("/admin/categories/edit?id=".$category->cat_id)?>">Edit</a>]
    </td>
  </tr>
  <?php }?>
</table>