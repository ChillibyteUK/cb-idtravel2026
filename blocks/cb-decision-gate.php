<?php
/**
 * Block template for CB Decision Gate.
 *
 * @package Identity Travel
 */

defined( 'ABSPATH' ) || exit;

// Support Gutenberg color picker.
$bg         = ! empty( $block['backgroundColor'] ) ? 'has-' . $block['backgroundColor'] . '-background-color' : '';
$fg         = ! empty( $block['textColor'] ) ? 'has-' . $block['textColor'] . '-color' : '';
$section_id = $block['anchor'] ?? null;
$extra      = $block['className'] ?? '';

$link_left = get_field( 'left_link' );
$link_right = get_field( 'right_link' );

?>
<section class="cb-decision-gate <?= esc_attr( trim( $bg . ' ' . $fg . ' ' . $extra ) ); ?>" id="<?= esc_attr( $section_id ); ?>">
	<div class="id-container px-4 px-md-5 py-5">
		<div class="row">
			<div class="col-md-6 cb-decision-gate__left">
				<a href="<?= esc_url( $link_left['url'] ); ?>" aria-label="<?= esc_attr( $link_left['title'] ); ?>">
					<div class="cb-decision-gate__title"><?= esc_html( get_field( 'left_title' ) ); ?></div>
					<div class="cb-decision-gate__content"><?= wp_kses_post( get_field( 'left_content' ) ); ?></div>
				</a>
				<a href="<?= esc_url( $link_left['url'] ); ?>" class="id-button"><?= esc_html( $link_left['title'] ); ?></a>
			</div>
			<div class="col-md-6 cb-decision-gate__right">
				<a href="<?= esc_url( $link_left['url'] ); ?>" aria-label="<?= esc_attr( $link_left['title'] ); ?>">
					<div class="cb-decision-gate__title"><?= esc_html( get_field( 'right_title' ) ); ?></div>
					<div class="cb-decision-gate__content"><?= wp_kses_post( get_field( 'right_content' ) ); ?></div>
				</a>
				<a href="<?= esc_url( $link_right['url'] ); ?>" class="id-button"><?= esc_html( $link_right['title'] ); ?></a>
			</div>
		</div>
	</div>
</section>
