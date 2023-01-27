<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>

<footer class="main-footer">
	<div class="container">
		<a class="site-logo-href" href="<?php echo site_url() ?>">
			<img src="<?php echo get_template_directory_uri() ?>/img/logo.svg">
		</a>

		<p class="theme-copyright">© 2020 — Play — Todos os direitos reservados.</p>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>