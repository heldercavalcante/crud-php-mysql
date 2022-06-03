<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo \App\Config\Config::$BASE_URL.'assets/admin/admin.css';?>">
  <title>Admin</title>
</head>
<body>
    <?php $this->view("Admin/headerView");?>

    <section id="content">
      <?php
      if (isset($page)) {
        $data = isset($data)?$data:[];
        $this->view($page, $data);
      }

      ?>
    </section>

</body>
</html>