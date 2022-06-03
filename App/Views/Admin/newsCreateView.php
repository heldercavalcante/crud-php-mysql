<h1>Form - create new</h1>

<form class="form" method="POST" enctype="multipart/form-data" action="<?php echo App\Config\Config::$BASE_URL.'admin/news/create/save';?>">
  <div>
    <label for="image">Image</label>
    <input type="file" name="image">
  </div>
  <div>
    <label for="title">Title</label>
    <input type="text" name="title">
  </div>
  <div>
    <label for="resume">Resume</label>
    <input type="text" name="resume">
  </div>
  <div>
    <label for="news">News</label>
    <textarea name="news"></textarea>
  </div>
  <div>
    <button type="submit">Save</button>
  </div>
</form>