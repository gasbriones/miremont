<?php
get_header();

$home =  new WP_Query('page_id=5');
$about_us = new WP_Query('page_id=10');

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = array(
  'posts_per_page' => '4',
  'cat' => '3',
  'paged' => $paged,
);

$products = new WP_Query($args);

?>
<body <?php body_class(); ?>>
<a href="#top" id="back-top"><img src="<?php echo get_template_directory_uri(); ?>/images/back-to-top.png" /></a>
<div id="main" class="clearfix wrapper">
  <header id="home" class="grid header">
    <div class="col-12 header-wrapper">
      <div class="logo">
        <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" />
      </div>
      <?php if ($home->have_posts()):
        while ($home->have_posts()):$home->the_post();?>
          <figure>
            <img src="<?php echo the_field('page_image') ?>"/>
          </figure>
          <h2 class="slogan">
            <?php the_content(); ?>
          </h2>
      <?php endwhile; endif; ?>
      <div class="menu-wrapper grid-center">
        <div class="col-9_sm-12_xs-11">
          <?php wp_nav_menu(array('theme_location' => 'header-menu','container' => 'div')); ?>
        </div>
      </div>
    </div>
    <div class="col-12 grid-center gradient">
      <div class=" col-9_xs-6 grid-spaceBetween grid-middle logo-container">
        <div class="col-3_xs-12 sponsor">
          <img src="<?php echo get_template_directory_uri(); ?>/images/moura-logo.png" />
        </div>
        <div class="col-3_xs-12 sponsor">
          <img src="<?php echo get_template_directory_uri(); ?>/images/acedelco-logo.png" />
        </div>
        <div class="col-3_xs-12 sponsor">
          <img src="<?php echo get_template_directory_uri(); ?>/images/prestolite-logo.png" />
        </div>
      </div>
    </div>
  </header>
  <div id="quienes-somos" class="grid about-us">
    <?php if ($about_us->have_posts()):
      while ($about_us->have_posts()):$about_us->the_post();?>
        <div class="col-12 grid-center about-us-content">
          <div class="col-3_xs-10" push-right="off-1_xs-0">
            <img src="<?php echo get_template_directory_uri(); ?>/images/logo-2.png" />
            <h2 class="slogan">
              Venta<br>
              Mayorista y Minorista
            </h2>
            <div class="social">
              <a href="https://www.facebook.com/lotterihnos/" class="fb" target="_blank">/ lotteri hnos</a>
            </div>
          </div>
          <div class="col-6_xs-10">
            <h2 class="title"><span>LOTTERI HNOS /</span> CENTRO DE BATERÍAS</h2>
            <div class="text">
              <?php the_content(); ?>
            </div>
          </div>
        </div>
        <div class="col-12">
          <figure>
            <img src="<?php echo the_field('page_image') ?>"/>
          </figure>
        </div>
      <?php endwhile; endif; ?>
  </div>
  <div id="productos" class="grid products">
    <div class="col-12 grid-center">
      <div class="prod-logo">
        <img src="<?php echo get_template_directory_uri(); ?>/images/battery.png" />
      </div>
      <h2 class="title"><span>PRODUCTOS / </span>BATERÍAS</h2>
      <div class="col-11 grid-spaceBetween">
        <?php if ($products->have_posts()):
          while ($products->have_posts()):$products->the_post();
            $attachment = get_field('product_image');
            ?>
            <a class="fancybox col-6_xs-12 grid-center prod-container" rel="galery" href="<?php echo  $attachment['sizes']['large'];  ?>"data-caption="<b><?php the_title(); ?></b><?php the_content(); ?>">
              <div class="col-4_xs-12 prod-img">
                <img src="<?php echo  $attachment['sizes']['medium'];  ?>"/>
              </div>
              <div class="col-7_xs-12 prod-description">
                <h2 class="prod-title">
                  <?php the_title(); ?>
                </h2>
                <div class="prod-text">
                  <?php the_content(); ?>
                </div>
              </div>
            </a>
          <?php endwhile; endif; ?>
      </div>
      <div class="col-11 paginador">
        <?php
          global $products;

          $big = 999999999; // need an unlikely integer

          echo paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $products->max_num_pages
          ) );
        ?>
      </div>
    </div>

    <div class="col-12 grid-center marks">
      <div class=" col-9 grid-spaceBetween grid-middle logo-container">
        <div class="col-3">
          <img src="<?php echo get_template_directory_uri(); ?>/images/logo_moura_color.png" />
        </div>
        <div class="col-3">
          <img src="<?php echo get_template_directory_uri(); ?>/images/logos_ACDelco_color.png" />
        </div>
        <div class="col-3">
          <img src="<?php echo get_template_directory_uri(); ?>/images/logo_Prestolite_color.png" />
        </div>
      </div>
    </div>
  </div>

  <div id="contacto" class="grid contact">
    <div class="col-8_xs-12 grid-center data">
      <div class="col-5_xs-10">
        <h2 class="title">LOTTERI HNOS</h2>
        <ul class="contact-data">
          <li class="gps">
            Av. Scalabrini Ortiz 1784 - (1425) CABA.<br>
            Teléfono: 4831-4254 / 4832-4006
          </li>
          <li class="hours"> Lunes a Viernes de 8 a 12 hs.<br>
            13.30 a 18 hs.
          </li>
          <li class="mail"><a href="mailto:lotterihnos@gmail.com">lotterihnos@gmail.com</a></li>
          <li class="fb"><a href="https://www.facebook.com/lotterihnos/"  target="_blank">/ lotteri hnos</a></li>
        </ul>
      </div>
      <div class="col-3_xs-10" push-left="off-1_xs-0">
        <h2 class="title">CONSULTAS </h2>
        <form id="news" action="<?php echo get_template_directory_uri(); ?>/ajax/newsletter.php">
          <span>Nombre:</span><br>
          <input type="text" name="name" class="input"/><br>
          <span>E-mail:</span><br>
          <input type="email"  name="email"  class="input" /><br>
          <span>Mensaje:</span><br>
          <textarea name="msg" class="input"> </textarea><br>
          <input type="submit" value="ENVIAR"  class="boton" />
        </form>
        <div id="newsmsg"></div>
      </div>
    </div>
    <div class="col-4_xs-12 grid">
      <div class="col-12 map">
        <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script>
        <div style='overflow:hidden;height:363px;width:100%; '>
          <div id='gmap_canvas' style='height:363px;width:100%; display: table'></div>
          <style>#gmap_canvas img {
              max-width: none !important;
              background: none !important
            }</style>
        </div>
        <script type='text/javascript'>function init_map() {
            var myOptions = {
              zoom: 16,
              center: new google.maps.LatLng(-34.5898073, -58.423439599999995),
              mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
            marker = new google.maps.Marker({map: map, position: new google.maps.LatLng(-34.5898073, -58.423439599999995)});
            infowindow = new google.maps.InfoWindow({content: '<strong>Lotteri Hnos S .A - Centro de Baterías </strong><br>Avenida Raúl Scalabrini Ortiz 1784, Buenos Aires, Ciudad Autónoma de Buenos Aires<br>'});
            google.maps.event.addListener(marker, 'click', function () {
              infowindow.open(map, marker);
            });
            infowindow.open(map, marker);
          }
          google.maps.event.addDomListener(window, 'load', init_map);</script>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
</body>
</html>
