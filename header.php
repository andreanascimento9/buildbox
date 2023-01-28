<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="//db.onlinewebfonts.com/c/01173b246d9d9ea808ea75a26b3b61bb?family=Circular+Spotify+Tx+T+Black" rel="stylesheet" type="text/css" />

	<?php wp_head(); ?>
</head>

<?php

$categories_header = get_terms(array(
	'taxonomy' => 'category',
	'hide_empty' => true,
	'object_types' => array('videos')
));


$current_term = get_queried_object();
?>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<header class="main-header">
		<div class="container">
			<nav class="navigation-mobile">
				<a class="site-logo-href" href="<?php echo site_url() ?>">
					<img src="<?php echo get_template_directory_uri() ?>/img/logo.svg">
				</a>
			</nav><!-- #site-navigation -->

			<nav class="navigation-desktop">
				<div class="col-left">
					<a class="site-logo-href" href="<?php echo site_url() ?>">
						<img src="<?php echo get_template_directory_uri() ?>/img/logo.svg">
					</a>
				</div>

				<div class="col-right">
					<?php foreach ($categories_header as $category_header) : ?>
						<?php if ($category_header->slug !== 'destaque' && $category_header->slug !== 'sem-categoria') : ?>


							<div class="item">
								<a class="<?php if ($category_header->slug == $current_term->slug) {
												echo "text-red";
											} ?>" href="<?php echo site_url("/category/$category_header->slug/") ?>"><?php echo $category_header->name; ?></a>
							</div>

						<?php endif; ?>
					<?php endforeach ?>

				</div>
			</nav>
		</div>
	</header><!-- #masthead -->