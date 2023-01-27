<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package _s
 */

get_header();
?>

<main id="primary" class="site-main">

	<section class="main-single">
		<div class="container">

			<?php
			$single_id = get_the_ID();
			$thumb =  get_the_post_thumbnail_url();
			$categories = get_the_category();
			?>

			<div class="info-single">
				<?php foreach ($categories as $category) : ?>
					<?php if ($category->slug !== 'destaque') : ?>
						<div class="item"><?php echo $category->name; ?></div>
					<?php endif; ?>
				<?php endforeach; ?>
				<div class="item"><?php echo get_post_meta($single_id, 'tempo_video_min', true) ?>m</div>
			</div>

			<h1><?php echo get_the_title() ?></h1>
		</div>
		<a href="#">
			<div class="container-thumb" style="background:linear-gradient(0deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(<?php echo get_the_post_thumbnail_url() ?>)">
				<img class="icon-play" src="<?php echo get_template_directory_uri() ?>/img/play-light.svg" alt="<?php echo get_the_title() ?>">
			</div>
		</a>
		<div class="container">
			<p><?php echo the_content() ?></p>
		</div>

	</section>

</main><!-- #main -->

<?php
get_footer();
