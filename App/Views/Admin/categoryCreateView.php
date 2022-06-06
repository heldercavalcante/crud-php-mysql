<h1>Form - create Category</h1>

<form class="form" method="POST" enctype="multipart/form-data" action="<?php echo App\Config\Config::url("/admin/categories/create/save");?>">
  <div>
    <label for="name">Name</label>
    <input type="text" name="name">
  </div>
  <div>
    <button type="submit">Save</button>
  </div>
</form>