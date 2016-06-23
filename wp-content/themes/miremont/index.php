<?php
get_header();
$home = new WP_Query('page_id=9');
$about = new WP_Query('page_id=2');
$museums = new WP_Query('page_id=2');

?>
<body <?php body_class(); ?>>
<div id="main" class="clearfix wrapper">
  <header id="header" class="grid header">
    <div class="col-2 logo">
      <img src="<?php echo get_template_directory_uri(); ?>/images/logo-miremont.png"/>
    </div>
    <div class="col-10 grid-center grid-bottom menu-wrapper">
      <ul class="menu col-11">
        <li><a href="#">Acerca de</a></li>
        <li><a href="#">Museos</a></li>
        <li><a href="#">Expos</a></li>
        <li><a href="#">Equipo</a></li>
        <li><a href="#">Lo que estamos haciendo</a></li>
        <li><a href="#">Prensa</a></li>
      </ul>
    </div>
  </header>
  <div id="main" class="grid-center main">
    <div id="home" class="col-12 home">
      <?php if ($home->have_posts()):
        while ($home->have_posts()):$home->the_post(); ?>
          <figure>
            <img src="<?php echo the_field('page_image') ?>"/>
          </figure>
        <?php endwhile; endif; ?>
    </div>
    <div id="acerca-de" class="col-11 grid-center about">
        <?php if ($about->have_posts()):
          while ($about->have_posts()):$about->the_post(); ?>
            <div class="col-6 page-content">
              <h1 class="page-title"><?php the_title(); ?></h1>
              <div class="page-text">
                <?php the_content(); ?>
              </div>
            </div>
            <div class="col-6 page-image">
              <figure>
                <img src="<?php echo the_field('page_image') ?>"/>
              </figure>
            </div>
          <?php endwhile; endif; ?>
    </div>
    <div id="museos" class="col-12 grid-center museum">
      <h1 class="col-11 page-title">Museos</h1>
      <div class="col-11 grid-spaceBetween">

      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
</body>
</html>
