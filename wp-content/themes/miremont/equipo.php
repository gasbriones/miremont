<?php
/*
Template Name: Equipo
*/
get_header();

$post_id = $_GET['cv'];

$args = array(
    'p' => $post_id
);

$query = new WP_Query($args);

?>

<div class="grid-center">
    <div class="col-11 grid-center team-member">
        <?php if ($query->have_posts()):
            while ($query->have_posts()):$query->the_post(); ?>
                <div class="col-4 grid">
                    <div class="col-8">
                        <figure>
                            <?php
                            $img = get_field('image');
                            ?>
                            <img class="photo" src="<?php echo $img['sizes']['thumbnail'] ?>"/>
                        </figure>
                    </div>
                </div>
                <div class="col-8">
                    <h1 class="name"><?php the_title(); ?></h1>
                    <h2 class="specialist"><?php the_content(); ?></h2>
                </div>
                <div class="col-12 cv">
                    <?php echo the_field('curriculum') ?>
                </div>
            <?php endwhile; endif; ?>
    </div>
</div>

