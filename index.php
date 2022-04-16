<?php session_start();?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Site1</title>
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
  <div class="container">
      <div class="row">
          <header class="col-sm-12 col-md-12 col-lg-12">

          </header>      
      </div>

      <div class="row">
        <nav class="col-sm-12 col-md-12 col-lg-12">
            <?php
                include_once "pages/menu.php";
                include_once('pages/functions.php');
            ?>
        </nav>
      </div>

      <div class="row">
        <section class="col-sm-12 col-md-12 col-lg-12">
            <?php
                if(isset($_GET['page']))
                {
                  $page=$_GET['page'];
                  if($page == 4) include_once('pages/registration.php');
                  if($page == 5) include_once('pages/input.php');

                  if(isset($_SESSION["name"]) && isset($_SESSION["pass"]))
                  {
                    if($page == 1) include_once('pages/home.php');
                    if($page == 2) include_once('pages/upload.php');
                    if($page == 3) include_once('pages/gallery.php');
                  };
                }
                
            ?>
        </section>
      </div>
  </div>


<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>

