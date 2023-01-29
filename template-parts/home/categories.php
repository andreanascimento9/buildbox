<?php

$args = array(
    'taxonomy' => 'category',
    'hide_empty' => true,
    'post_type' => 'videos',
    'post_per_page' => -1,
    'orderby'   => 'date',
    'order' => 'DESC',
);
$categories = get_categories($args);

?>

<section class="categories">

    <div class="container">
        <?php
        foreach ($categories as $category) :
            if ($category->slug !== 'destaque' && $category->slug !== 'sem-categoria') :

                echo '<h2>' . $category->name . '</h2>';
                echo '<div class="list-items">';

                $args = array(
                    'post_type' => 'videos',
                    'category_name' => $category->slug,
                );

                $posts = new WP_Query($args);
                if ($posts->have_posts()) :
                    while ($posts->have_posts()) :
                        $posts->the_post();
        ?>
                        <div class="item">
                            <a class="link-thumb" href="<?php echo the_permalink() ?>">
                                <div class="thumb" style="background: url(<?php echo get_the_post_thumbnail_url() ?>"></div>
                                <div class="info"><?php echo get_post_meta(get_the_ID(), 'tempo_video_min', true) ?>m</div>
                                <div class="title"><?php echo get_the_title() ?></div>
                            </a>
                        </div>
        <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                echo '</div>';
            endif;
        endforeach
        ?>
    </div>
</section>