<?php

/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage SurfSchool
 * @since 1.0.0
 */

?>
<footer role="contentinfo">
	<div class="bg-teal-500">
		<nav class="container mx-auto">
			<?php
			if (has_nav_menu('footer')) {
				wp_nav_menu(
					array(
						'container'  => 'ul',
						'menu_class' => 'list-none text-white flex justify-center uppercase tracking-wide font-bold',
						'theme_location' => 'footer',
					)
				);
			} ?>
		</nav>
	</div>
	<div class="bg-teal-600 py-4">
		<div class="container mx-auto text-white">
			<p>Design with by Ashik. All Rights Reserved</p>
			<!-- TODO: Implement socials -->
		</div>
	</div>
</footer><!-- #site-footer -->

<?php wp_footer(); ?>

</body>

</html>