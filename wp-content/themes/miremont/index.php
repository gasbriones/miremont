<?php

include 'submenu/sub-menu.php';

get_header();

$page = $_GET['page'];
//default page num
$per_museum = 3;
$per_articles = 4;
$per_expos = 3;
$per_doing = 2;


if ($page != '') {
    switch ($page) {
        case 'museos':
            $per_museum = $_GET['more'];
            break;
        case 'prensa':
            $per_articles = $_GET['more'];
            break;
        case 'exposiciones':
            $per_expos = $_GET['more'];
            break;
        case 'lo-que-estamos-haciendo':
            $per_doing = $_GET['more'];
            break;
    }
}

function getPost ($category = '' ,$offset = 3){
    return  new WP_Query(array(
        'cat' => $category,
        'order' => 'ASC',
        'posts_per_page' => $offset
    ));
}


$home = new WP_Query('page_id=9');
$about = new WP_Query('page_id=2');
$museums = getPost(2,$per_museum);
$expo = getPost(3,$per_expos);
$team = getPost(4,'-1');
$doing = getPost(5,$per_doing);
$articles = getPost(6,$per_articles);
$videos = getPost(7,'-1');
?>
<body <?php body_class(); ?>>
<div class="overlay"></div>
<div id="main" class="clearfix wrapper">
    <header id="header" class="header">
        <div class="grid">
            <div class="col-2_sm-4 logo">
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo-miremont.png"/>
            </div>
            <div class="col-10_sm-12 grid-center grid-bottom menu-wrapper">
                <input id="check" class="check" type="checkbox">
                <label for="check">
                    <div id="burger">
                        <img class="icon" src="<?php echo get_template_directory_uri(); ?>/images/menu-alt.svg">
                    </div>
                </label>


                <ul class="menu col-11">
                    <li for="check" class="menu_item"><a href="<?php echo site_url(); ?>/#acerca-de">Acerca de</a></li>
                    <li for="check" class="menu_item"><a href="<?php echo site_url(); ?>/#museos">Museos</a>
                        <ul class="sub_menu">
                            <?php getSubMenu(getPost(2,'-1'),'museos',3) ?>
                        </ul>
                    </li>
                    <li for="check" class="menu_item"><a href="<?php echo site_url(); ?>/#exposiciones">exposiciones</a>
                        <ul class="sub_menu">
                            <?php getSubMenu(getPost(3,'-1'),'exposiciones',3) ?>
                        </ul>
                    </li>
                    <li for="check" class="menu_item"><a href="<?php echo site_url(); ?>/#equipo">Equipo</a></li>
                    <li for="check" class="menu_item"><a href="<?php echo site_url(); ?>/#lo-que-estamos-haciendo">Lo que estamos haciendo</a>
                        <ul class="sub_menu">
                            <?php getSubMenu(getPost(5,'-1'),'lo-que-estamos-haciendo',2) ?>
                        </ul>
                    </li>
                    <li for="check" class="menu_item"><a href="<?php echo site_url(); ?>/#prensa">Prensa</a></li>
                    <li for="check" class="menu_item"><a href="<?php echo site_url(); ?>/#contacto">Contacto</a></li>
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
        <div id="acerca-de" class="col-11 grid-spaceBetween about">
            <?php if ($about->have_posts()):
                while ($about->have_posts()):$about->the_post(); ?>
                    <div class="col-6_sm-12 page-content">
                        <h1 class="page-title"><?php the_title(); ?></h1>
                        <div class="page-text">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <div class="col-6_sm-12  page-image">
                        <div class="photo hmedia slider">
                            <?php
                            $images = get_field('galeria_de_fotos');
                            if ($images) {
                                foreach ($images as $image) {
                                    echo '<img src="' . $image["url"] . '"/>';
                                }

                            }
                            ?>
                        </div>
                    </div>
                <?php endwhile; endif; ?>
        </div>
        <div id="museos" class="col-12 grid-center museum block">S
            <div class="col-11 grid">
                <h1 class="page-title">Museos</h1>
                <div class="col-12 grid-spaceBetween">
                    <?php if ($museums->have_posts()):
                        while ($museums->have_posts()):$museums->the_post(); ?>
                            <?php $count++ ?>
                            <div class="col-4_xs-12 col-top grid gallery" id="museos-<?php echo $count + 3?>">
                                <div class="col-12 carousel-container">
                                    <div class="carousel hmedia">
                                        <?php
                                        $images = get_field('galeria_de_fotos');
                                        if ($images) {
                                            foreach ($images as $image) {
                                                echo '<img src="' . $image["url"] . '"/>';
                                            }
                                        }
                                        ?>
                                    </div>
                                    <?php if ($images): ?>
                                        <div class="controls">
                                            <a class="prev" href="#">Prev</a>
                                            <a class="next" href="#">Next</a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-12 grid-center learn-more">
                                    <h1 class="title col-8"><?php the_title(); ?></h1>
                                    <div class="page-text col-10 more-btn">
                                        <?php the_field('resumen'); ?>
                                    </div>
                                    <div class="col-10 more-text">
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            </div>

                        <?php endwhile; endif; ?>
                </div>
                <div class="col-12 grid-center">
                    <div class="col-2_xs-5 more">
                        <a href="<?php echo site_url(); ?>/?page=museos&more=<?php echo $count + 3 ?>#museos-<?php echo $count + 3?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/more_btn_white.png"/>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div id="exposiciones" class="col-12 grid-center expo block">
            <div class="col-11 grid">
                <h1 class="page-title">Exposiciones</h1>
                <div class="col-12 grid-spaceAround grid-middle">
                    <?php if ($expo->have_posts()):
                        while ($expo->have_posts()):$expo->the_post();
                            $count_expos++;
                        ?>
                            <div class="col-4 col-top gallery" id="exposiciones-<?php echo $count_expos + 3?>">
                                <div class="col-12 col-top carousel-container">
                                    <div class="carousel hmedia">
                                        <?php
                                        $images = get_field('galeria_de_fotos');
                                        if ($images) {
                                            foreach ($images as $image) {
                                                echo '<img src="' . $image["url"] . '"/>';
                                            }
                                        }
                                        ?>
                                    </div>
                                    <?php if ($images): ?>
                                        <div class="controls">
                                            <a class="prev" href="#">Prev</a>
                                            <a class="next" href="#">Next</a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-12 grid-center learn-more">
                                    <h1 class="title col-8"><?php the_title(); ?></h1>
                                    <div class="page-text col-10 more-btn">
                                        <?php the_field('resumen'); ?>
                                    </div>
                                    <div class="col-10 more-text">
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; endif; ?>
                </div>
                <div class="col-12 grid-center">
                    <div class="col-2_xs-5 more">
                        <a href="<?php echo site_url(); ?>/?page=exposiciones&more=<?php echo $count_expos + 3 ?>#exposiciones-<?php echo $count_expos + 3?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/more_btn_black.png"/>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div id="equipo" class="col-12 grid-center team block">
            <div class="col-11 grid">
                <h1 class="page-title">Equipo</h1>
                <div class="col-12 grid">
                    <?php if ($team->have_posts()):
                        while ($team->have_posts()):$team->the_post(); ?>
                            <div class="col-3_xs-12 grid-center content">
                                <div class="member col-11">
                                    <figure class="photo aspect">
                                        <?php
                                            $img = get_field('image');
                                        ?>
                                        <img src="<?php echo $img['sizes']['medium'] ?>"/>
                                    </figure>
                                    <div class="data">
                                        <h1 class="name"><?php the_title(); ?></h1>
                                        <h2 class="specialist"><?php the_content(); ?></h2>
                                        <a class="linkedin"
                                           href="<?php echo site_url(); ?>/equipo/?cv=<?php echo $post->ID; ?>"
                                           target="_blank">Ver más</a>
                                    </div>
                                </div>

                            </div>
                        <?php endwhile; endif; ?>
                </div>
            </div>
        </div>
        <div id="lo-que-estamos-haciendo" class="col-12 grid-center doing block">
            <div class="col-11 grid">
                <h1 class="page-title">Lo que estamos haciendo</h1>
                <div class="col-12 grid-spaceBetween">
                    <?php if ($doing->have_posts()):
                        while ($doing->have_posts()):$doing->the_post();
                            $count_doing++;
                        ?>
                            <div class="col-12 col-top grid-spaceBetween gallery" id="lo-que-estamos-haciendo-<?php echo $count_doing + 2 ?>">
                                <div class="col-8_xs-12 col-top carousel-container">
                                        <?php
                                        $images = get_field('galeria_de_fotos');
                                        if ($images) {
                                            echo '<div class="carousel hmedia">';
                                            foreach ($images as $image) {
                                                echo '<img src="' . $image["url"] . '"/>';
                                            }
                                            echo ' </div>';
                                        }
                                        ?>
                                    <?php if ($images): ?>
                                        <div class="controls">
                                            <a class="prev" href="#">Prev</a>
                                            <a class="next" href="#">Next</a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-3_xs-12 col-top grid-center learn-more">
                                    <h1 class="title col-12"><?php the_title(); ?></h1>
                                    <div class="col-12 page-text more-btn">
                                        <?php the_field('resumen'); ?>
                                    </div>
                                    <div class="col-12 more-text">
                                        <?php the_content(); ?>
                                    </div>
                                </div>

                            </div>
                            <?php  endwhile; endif; ?>
                </div>
                <div class="col-12 grid-center">
                    <div class="col-2_xs-5 more">
                        <a href="<?php echo site_url(); ?>/?page=lo-que-estamos-haciendo&more=<?php echo $count_doing + 2 ?>#lo-que-estamos-haciendo-<?php echo $count_doing + 2 ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/more_btn_black.png"/>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div id="prensa" class="col-12 grid-center press block">
            <div class="col-11 grid">
                <h1 class="page-title">Prensa</h1>
                <div class="col-12 grid articles">
                    <h2 class="subtitle">Artículos</h2>
                    <div class="col-12 grid">
                        <?php if ($articles->have_posts()):
                            while ($articles->have_posts()):$articles->the_post();
                                $count_articles++; ?>
                                <div class="col-3_xs-6 grid-center item" id="articles-<?php echo $count_articles + 4 ?>">
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
                    <div class="col-12 grid-center">
                        <div class="col-2_xs-5 more">
                            <a href="<?php echo site_url(); ?>/?page=prensa&more=<?php echo $count_articles + 4 ?>#articles-<?php echo $count_articles + 4 ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/more_btn_black.png"/>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 grid videos">
                    <div class="overlay"></div>
                    <h2 class="subtitle">Videos</h2>
                    <div class="col-12 grid">
                        <?php if ($videos->have_posts()):
                            while ($videos->have_posts()):$videos->the_post(); ?>
                                <div class="col-3_xs-6 grid-center">
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
                <div class="col-12_xs-12 grid">
                    <h1 class="title">Contacto</h1><br><br>
                    <div class="grid">
                        <div class="col-10_xs-12 grid info">
                            <div class="col-6_xs-4">Teléfono:</div>
                            <div class="col-6_xs-8 text-right">+ 54 11 15 31 21 5667</div>
                        </div>
                        <div class="col-10_xs-12 grid info">
                            <div class="col-6_xs-4">Email:</div>
                            <div class="col-6_xs-8 text-right"><a href="mailto:gm@miremont.com.ar">gm@miremont.com.ar</a></div>
                        </div>
                        <div class="col-10_xs-12 grid info">
                            <div class="col-6_xs-4">Dirección:</div>
                            <div class="col-6_xs-8 text-right">Enrique Martinez 210, 2do. B</br>
                                C.A.B.A, Argentina
                            </div>
                        </div>
                        <div class="col-10_xs-12 grid info social">
                            <div class="col-6_xs-5">
                                <h1 class="col-12 title">Podes seguirnos</h1>
                            </div>
                            <div class="col-6_xs-7 text-right">
                                <ul class="social-icons">
                                    <li><a href="https://www.facebook.com/gabrielernesto.miremont" class="fb" target="_blank"></a></li>
                                    <li><a href="https://www.instagram.com/miremont_cia/" class="inst" target="_blank"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

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
