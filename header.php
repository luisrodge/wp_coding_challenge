<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Coding Challenge Site</title>

  <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>


  <header class="sticky-top">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 id="site-logo">Coding Challenge Site</h2>
        </div>
      </div>
      <?php wp_nav_menu(
        array(
          'theme_location' => 'top-menu',
          'menu_class' => 'navigation'
        )
      ); ?>
    </div>
  </header>