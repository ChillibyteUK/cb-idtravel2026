<?php
/**
 * Block template for CB Stat Hero.
 *
 * @package Identity Travel
 */

defined( 'ABSPATH' ) || exit;

$block_title = get_field( 'title' ) ? get_field( 'title' ) : get_the_title();

$block_link = get_field( 'cta_link' );

?>
<section class="stat-hero">
	<div class="id-container pt-2 pb-1 px-4 px-md-5">
		<div class="h1-wrapper">
			<h1><?= esc_html( $block_title ); ?></h1>
		</div>
		<div class="row g-4">
			<div class="col-lg-4">
				<a class="id-button mb-5" href="<?= esc_url( $block_link['url'] ); ?>" target="<?= esc_attr( $block_link['target'] ); ?>"><?= esc_html( $block_link['title'] ); ?></a>
				<div class="stat-hero__cta-title"><?= esc_html( get_field( 'cta_title' ) ); ?></div>
			</div>
			<div class="col-md-6 col-lg-2">
				<div class="stat-hero__intro"><?= esc_html( get_field( 'stat_intro_1' ) ); ?></div>
				<div class="stat-hero__stat"><?= esc_html( get_field( 'stat_1' ) ); ?></div>
			</div>
			<div class="col-md-6 col-lg-2">
				<div class="stat-hero__intro"><?= esc_html( get_field( 'stat_intro_2' ) ); ?></div>
				<div class="stat-hero__stat"><?= esc_html( get_field( 'stat_2' ) ); ?></div>
			</div>
			<div class="col-md-6 col-lg-2">
				<div class="stat-hero__intro"><?= esc_html( get_field( 'stat_intro_3' ) ); ?></div>
				<div class="stat-hero__stat"><?= esc_html( get_field( 'stat_3' ) ); ?></div>
			</div>
			<div class="col-md-6 col-lg-2">
				<div class="stat-hero__intro"><?= esc_html( get_field( 'stat_intro_4' ) ); ?></div>
				<div class="stat-hero__stat"><?= esc_html( get_field( 'stat_4' ) ); ?></div>
			</div>
		</div>
	</div>
</section>