<?php

/**
 * Header file for the Surf School WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage SurfSchool
 * @since 1.0.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<?php
	wp_body_open();
	?>

	<nav class="absolute top-0 inset-x-0">
		<div class="container mx-auto">
			<?php
			if (has_nav_menu('primary')) {
				wp_nav_menu(
					array(
						'container'  => 'ul',
						'menu_class' => 'list-none py-4 flex justify-center uppercase tracking-normal font-bold',
						'items_wrap' => '<ul id="hello %1$s" class="%2$s">%3$s</ul>',
						'theme_location' => 'primary',
					)
				);
			}
			?>
		</div>
	</nav>