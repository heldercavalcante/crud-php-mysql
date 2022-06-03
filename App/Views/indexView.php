<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo \App\Config\Config::$BASE_URL.'assets/style.css';?>">
  <title>Store</title>
</head>
<body>
    <?php $this->view("headerView");?>
    
    <section id="content">
      <?php
      if (isset($page)) {
        $this->view($page);
      }

      ?>
    </section>

    <?php $this->view("footerView");?>
</body>
</html>