<?php

$args = [
    'post_type' => 'videos',
    'post_status' => 'publish',
    'category_name' => 'filmes',
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_age' => -1
];

$films = new WP_Query($args);

?>


<section class="categories">

    <?php
    if ($films->have_posts()) :
        while ($films->have_posts()) : $films->the_post();
            $film_id = get_the_ID();
            $categories_films = get_the_category($film_id);
    ?>
            <div class="container">
                <?php foreach ($categories_films as $category_film) : ?>
                    <?php if ($category_film->slug !== 'destaque') : ?>
                        <h2><?php echo $category_film->name; ?></h2>
                    <?php endif; ?>
                <?php endforeach; ?>

                <div class="list-items">
                    <div class="item">
                        <a class="link-thumb" href="<?php echo the_permalink() ?>">
                            <div class="thumb" style="background: url(<?php echo get_the_post_thumbnail_url() ?>"></div>
                            <div class="info"><?php echo get_post_meta($film_id, 'tempo_video_min', true) ?>m</div>
                            <div class="title"><?php echo get_the_title() ?></div>
                        </a>
                    </div>


                </div>
            </div>

    <?php
        endwhile;
    endif;
    wp_reset_postdata();
    ?>

</section>