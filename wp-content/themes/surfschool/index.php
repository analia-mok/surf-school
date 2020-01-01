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
$tab_nums = ['one', 'two', 'three', 'four'];
$tab_content = [];
$tab_details = [];

foreach ($tab_nums as $num) {
	$tab_content[] = [
		'icon'        => get_field('level_' . $num . '_icon'),
		'title'       => get_field('level_' . $num . '_title'),
		'description' => get_field('level_' . $num . '_tab_description'),
	];

	$tab_details[] = [
		'image'       => get_field('level_' . $num . '_detail_image'),
		'title'       => get_field('level_' . $num . '_detail_title'),
		'description' => get_field('level_' . $num . '_detail_description'),
		'link'        => get_field('level_' . $num . '_link'),
	];
}
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

<main id="site-content" class="relative container mx-auto">
	<section class="absolute left-0 right-0" style="bottom:100%;">
		<div class="flex container mx-auto">
			<?php $count = 1; ?>
			<?php foreach ($tab_content as $tab) : ?>
				<div class="flex-1 text-white bg-teal--500 hover:bg-teal-500 px-4 py-6 cursor-pointer border-solid border-white border border-b-0 relative">
					<span class="uppercase text-xs text-white absolute right-0 pr-4 tracking-wide font-medium">Level <?php echo $count; ?></span>
					<img src="<?php echo $tab['icon']['url']; ?>" alt="<?php echo $tab['icon']['alt'] ?? $tab['title']; ?>" class="w-8 h-8">
					<strong class="block mt-2 mb-4 text-lg"><?php echo $tab['title']; ?></strong>
					<p class="text-sm"><?php echo $tab['description']; ?></p>
				</div>
				<?php $count += 1; ?>
			<?php endforeach; ?>
		</div><!-- End of tab container -->
	</section>
	<section class="container mx-auto bg-gray-200">
		<?php $count = 1; ?>
		<?php foreach ($tab_details as $tab) : ?>
			<div id="tab<?php echo $count; ?>" class="flex">
				<div class="flex-half">
					<img src="<?php echo $tab['image']['url']; ?>" alt="<?php echo $tab['image']['alt']; ?>">
				</div>
				<div class="flex-half px-4">
					<strong class="uppercase text-teal-500 tracking-wide">Level <?php echo $count; ?></strong>
					<h2><?php echo $tab['title']; ?></h2>
					<p class="leading-none"><?php echo $tab['description']; ?></p>
				</div>
			</div>
			<?php $count += 1; ?>
		<?php endforeach; ?>
	</section><!-- End of tab details -->
</main>

<?php
get_footer();
