<?php
$args = [
    'post_type' => 'videos',
    'post_status' => 'publish',
    'category_name' => 'destaque',
    'orderby' => 'date',
    'order' => 'DESC',
    'numberposts' => 1
];

$destaque = get_posts($args);
$destaque_id = $destaque[0]->ID;

$categories = get_the_category($destaque_id);

?>
<section class="hero-section" style="background:linear-gradient(0deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?php echo get_the_post_thumbnail_url($destaque_id); ?>">
    <div class="container center-y">
        <div class="info-hero">
            <?php foreach ($categories as $category) : ?>
                <?php if ($category->slug !== 'destaque') : ?>
                    <div class="item"><?php echo $category->name; ?></div>
                <?php endif; ?>
            <?php endforeach; ?>
            <div class="item"><?php echo get_post_meta($film_id, 'tempo_video_min', true) ?>m</div>
        </div>

        <h1 class="hero-title"><?php echo get_the_title($destaque_id) ?></h1>

        <a href="<?php the_permalink($destaque_id); ?>" class="btn-red">Mais informações</a>
    </div>
</section>