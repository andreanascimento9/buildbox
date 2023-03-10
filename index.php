<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

get_header();
?>

<main class="site-main">


	<?php include get_template_directory() . '/template-parts/home/hero.php'; ?>

	<?php include get_template_directory() . '/template-parts/home/categories.php'; ?>


</main><!-- #main -->

<?php
get_footer();
