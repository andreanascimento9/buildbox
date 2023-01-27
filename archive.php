<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */


get_header();
$current_term = get_queried_object();

?>

<main id="primary">

	<section class="main-archive">
		<div class="container">
			<div class="flex">

				<?php if ($current_term && $current_term->taxonomy === 'category') :

					$actual_category = $current_term->name;

				?>
					<div class="col-left">
						<h2><?php echo $current_term->name; ?></h2>
						<div class="description">
							<?php echo $current_term->description ?>
						</div>
					</div>

					<div class="col-right">
						<div class="list-items">

							<?php

							$args = [
								'post_type' => 'videos',
								'post_status' => 'publish',
								'category_name' => "$actual_category",
								'orderby' => 'date',
								'order' => 'DESC',
								'posts_per_page' => -1
							];

							$archive = new WP_Query($args);

							if ($archive->have_posts()) :
								while ($archive->have_posts()) : $archive->the_post();
									$post_id_archive = get_the_ID();

							?>

									<div class="item">
										<a class="link-thumb" href="<?php echo the_permalink() ?>">
											<div class="thumb" style="background: url(<?php echo get_the_post_thumbnail_url() ?>"></div>
											<div class="info"><?php echo get_post_meta($post_id_archive, 'tempo_video_min', true) ?>m</div>
											<div class="title"><?php echo get_the_title() ?></div>
										</a>
									</div>

							<?php

								endwhile;
							endif;

							wp_reset_postdata();

							?>

						</div>
					</div>
			</div>
		</div>






	<?php endif; ?>
	</section>
</main><!-- #main -->

<?php

get_footer();
