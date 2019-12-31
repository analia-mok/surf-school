<?php

/**
 * The main template file
 *
 * @package WordPress
 * @subpackage SurfSchool
 * @since 1.0.0
 */

get_header();

// Data Massaging
$hero_course_descr = get_field('course_start_description');
$hero_title = get_field('hero_title');

$hero_img = get_field('hero_image');
$hero_img_url = $hero_img['url'] ?? '';

// Tabs Massaging

?>


<header id="site-header" class="min-w-full h-screen-90 max-h-screen bg-center bg-cover bg-no-repeat px-8 py-12" style="background-image: url('<?php echo $hero_img_url; ?>');" role="banner">
	<div class="container mx-auto h-full flex items-center">
		<div>
			<p class="uppercase text-teal-900 tracking-normal font-bold mb-8"><?php echo $hero_course_descr['course_start_date_description']; ?>&nbsp;
				<span class="uppercase text-teal-500"><?php echo $hero_course_descr['course_start_date']; ?></span>
			</p>
			<h1 class="font-bold text-teal-900 text-6xl max-w-xs p-0 m-0 leading-none"><?php echo $hero_title; ?></h1>
		</div>
	</div>
</header><!-- #site-header -->

<main id="site-content">
	<h1 class="font-sans font-bold text-teal-900">Surf School Theme</h1>
</main>

<?php
get_footer();
