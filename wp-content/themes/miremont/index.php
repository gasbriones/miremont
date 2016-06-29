<?php
get_header();
$home = new WP_Query('page_id=9');
$about = new WP_Query('page_id=2');
$museums = new WP_Query('cat=2');
$expo = new WP_Query('cat=3');

$team = new WP_Query(array(
  'cat' => '4',
  'order' => 'ASC',
));

$doing = new WP_Query(array(
  'cat' => '5',
  'order' => 'ASC',
));

$articles = new WP_Query(array(
  'cat' => '6',
  'order' => 'ASC',
));

$videos = new WP_Query(array(
  'cat' => '7',
  'order' => 'ASC',
));

?>
<body <?php body_class(); ?>>
<div id="main" class="clearfix wrapper">
  <header id="header" class="header">
    <div class="grid">
      <div class="col-2 logo">
        <img src="<?php echo get_template_directory_uri(); ?>/images/logo-miremont.png"/>
      </div>
      <div class="col-10 grid-center grid-bottom menu-wrapper">
        <ul class="menu col-11">
          <li><a href="#acerca-de">Acerca de</a></li>
          <li><a href="#museos">Museos</a></li>
          <li><a href="#exposiciones">Expos</a></li>
          <li><a href="#equipo">Equipo</a></li>
          <li><a href="#lo-que-estamos-haciendo">Lo que estamos haciendo</a></li>
          <li><a href="#prensa">Prensa</a></li>
        </ul>
      </div>
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
            <div class="slider-wrapper">
              <ul class="bxslider">
                <?php
                $images = get_field('galeria_de_fotos');
                if ($images) {
                  foreach ($images as $image) {
                    echo '<li><img src="' . $image["url"] . '"/></li>';
                  }
                }
                ?>
              </ul>
            </div>
          </div>
        <?php endwhile; endif; ?>
    </div>
    <div id="museos" class="col-12 grid-center museum">
      <div class="col-11 grid">
        <h1 class="page-title">Museos</h1>
        <div class="col-12 grid-spaceBetween">
          <?php if ($museums->have_posts()):
            while ($museums->have_posts()):$museums->the_post(); ?>
              <div class="col-4 gallery">
                <?php
                $images = get_field('galeria_de_fotos');
                $arrayImg = Array();
                if ($images) {
                  foreach ($images as $image) {
                    array_push($arrayImg, array('href' => $image['url'], 'title' => $image['caption']));
                  }
                }
                $jsonImg = json_encode($arrayImg);
                ?>
                <a class="fancybox" href="<?php echo $arrayImg[0]['href']; ?>"
                   data-images='<?php echo $jsonImg ?>'>
                  <img src="<?php echo $arrayImg[0]['href']; ?>"
                       alt="<?php echo $arrayImg[0]['alt']; ?>"/>
                </a>
                <div class="page-text">
                  <?php the_content(); ?>
                </div>
              </div>
            <?php endwhile; endif; ?>
        </div>
      </div>
    </div>
    <div id="exposiciones" class="col-12 grid-center expo">
      <div class="col-11 grid">
        <h1 class="page-title">Exposiciones</h1>
        <div class="col-12 grid-spaceBetween">
          <?php if ($expo->have_posts()):
            while ($expo->have_posts()):$expo->the_post(); ?>
              <div class="col-4 grid-center gallery">
                <?php
                $images = get_field('galeria_de_fotos');
                $arrayImg = Array();
                if ($images) {
                  foreach ($images as $image) {
                    array_push($arrayImg, array('href' => $image['url'], 'title' => $image['caption']));
                  }
                }
                $jsonImg = json_encode($arrayImg);
                ?>
                <a class="fancybox" href="<?php echo $arrayImg[0]['href']; ?>"
                   data-images='<?php echo $jsonImg ?>'>
                  <img src="<?php echo $arrayImg[0]['href']; ?>"
                       alt="<?php echo $arrayImg[0]['alt']; ?>"/>
                </a>
                <h1 class="title col-8"><?php the_title(); ?></h1>
                <div class="page-text col-8">
                  <?php the_content(); ?>
                </div>
              </div>
            <?php endwhile; endif; ?>
        </div>
      </div>
    </div>
    <div id="equipo" class="col-12 grid-center team">
      <div class="col-11 grid">
        <h1 class="page-title">Equipo</h1>
        <div class="col-12 grid">
          <?php if ($team->have_posts()):
            while ($team->have_posts()):$team->the_post(); ?>
              <div class="col-3 grid-center content">
                <div class="member col-11">
                  <figure class="photo aspect">
                    <img src="<?php echo the_field('image') ?>"/>
                  </figure>
                  <div class="data">
                    <h1 class="name"><?php the_title(); ?></h1>
                    <h2 class="specialist"><?php the_content(); ?></h2>
                    <a class="linkedin" href="<?php echo the_field('linkedin') ?>" target="_blank">Perfil</a>
                  </div>
                </div>

              </div>
            <?php endwhile; endif; ?>
        </div>
      </div>
    </div>
    <div id="lo-que-estamos-haciendo" class="col-12 grid-center doing">
      <div class="col-11 grid">
        <h1 class="page-title">Lo que estamos haciendo</h1>
        <div class="col-12 grid-spaceBetween">
          <?php if ($doing->have_posts()):
            while ($doing->have_posts()):$doing->the_post(); ?>
              <div class="col-12 grid-spaceBetween gallery">
                <?php
                $images = get_field('galeria_de_fotos');
                $arrayImg = Array();
                if ($images) {
                  foreach ($images as $image) {
                    array_push($arrayImg, array('href' => $image['url'], 'title' => $image['caption']));
                  }
                }
                $jsonImg = json_encode($arrayImg);
                ?>

                <a class="fancybox col-9" href="<?php echo $arrayImg[0]['href']; ?>"
                   data-images='<?php echo $jsonImg ?>'>
                  <img src="<?php echo $arrayImg[0]['href']; ?>"
                       alt="<?php echo $arrayImg[0]['alt']; ?>"/>
                </a>
                <div class="col-2">
                  <h1 class="title col-8"><?php the_title(); ?></h1>
                  <div class="page-text col-8">
                    <?php the_content(); ?>
                  </div>
                </div>

              </div>
            <?php endwhile; endif; ?>
        </div>
      </div>
    </div>
    <div id="prensa" class="col-12 grid-center press">
      <div class="col-11 grid">
        <h1 class="page-title">Prensa</h1>
        <div class="col-12 grid articles">
          <h2 class="subtitle">Artículos</h2>
          <div class="col-12 grid">
            <?php if ($articles->have_posts()):
              while ($articles->have_posts()):$articles->the_post(); ?>
                <div class="col-3 grid-center ">
                  <div class="col-11">
                    <figure class="photo aspect">
                      <a target="_blank" href="<?php echo the_field('page_image') ?>"
                         title="<?php the_title(); ?>">
                        <img src="<?php echo the_field('page_image') ?>"/>
                      </a>
                    </figure>
                  </div>
                </div>
              <?php endwhile; endif; ?>
          </div>
        </div>
        <div class="col-12 grid videos">
          <h2 class="subtitle">Videos</h2>
          <div class="col-12 grid">
            <?php if ($videos->have_posts()):
              while ($videos->have_posts()):$videos->the_post(); ?>
                <div class="col-3 grid-center">
                  <div class="col-11 embed">
                    <?php echo the_field('video') ?>
                  </div>
                </div>
              <?php endwhile; endif; ?>
          </div>
        </div>
      </div>
    </div>
    <div id="contacto" class="col-12 grid-center contact">
      <div class="col-11 grid">
        <div class="col-6 grid">
          <h1 class="col-12 title">Contactános</h1>
          <div class="col-10 grid info">
            <div class="col-6">Teléfono:</div>
            <div class="col-6 text-right">+ 54 11 15 31 21 5667</div>
          </div>
          <div class="col-10 grid info">
            <div class="col-6">Email:</div>
            <div class="col-6 text-right"><a href="mailto:gm@miramont.com.ar">gm@miramont.com.ar</a></div>
          </div>
          <div class="col-10 grid info">
            <div class="col-6">Dirección:</div>
            <div class="col-6 text-right">Enrique Martinez 210, 2do. B</br>
              C.A.B.A, Argentina
            </div>
          </div>
          <div class="col-10 grid info social">
            <div class="col-6">
              <h1 class="col-12 title">Seguínos</h1>
            </div>
            <div class="col-6 text-right">
              <ul class="social-icons">
                <li><a href="#" class="yt"></a></li>
                <li><a href="#" class="fb"></a></li>
                <li><a href="#" class="inst"></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-6 form">
          <form class="contact-form">
            <label>
              Nombre <br> <input type="text"/>
            </label>
            <label>
              e-mail <br> <input type="text"/>
            </label>
            <label>
              Teléfono <br> <input type="text"/>
            </label>
            <label>
              Consulta <br> <textarea> </textarea>
            </label>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="wrapper">
  <?php get_footer(); ?>
</div>
</body>
</html>
