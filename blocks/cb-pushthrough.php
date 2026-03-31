<?php
/**
 * Block template for CB Pushthrough.
 *
 * @package cb-idtravel2026
 */

defined( 'ABSPATH' ) || exit;

$block_id = $block['anchor'] ?? $block['id'] ?? wp_unique_id( 'cb-pushthrough-' );

$link            = get_field( 'link' );
$background      = get_field( 'background' );
$left_content    = get_field( 'left_content' );
$left_type       = get_field( 'left_content_type' ) ?: 'Text';
$title           = get_field( 'title' );
$description     = get_field( 'description' );
$background_url  = $background ? wp_get_attachment_image_url( $background, 'full' ) : '';
$section_classes = array( 'cb-pushthrough' );

if ( $background_url ) {
	$section_classes[] = 'cb-pushthrough--has-bg';
}

if ( ! empty( $block['className'] ) ) {
	$section_classes[] = $block['className'];
}

$section_style = $background_url ? sprintf( '--_bg-url: url(%s);', esc_url_raw( $background_url ) ) : '';
?>
<section id="<?= esc_attr( $block_id ); ?>" class="<?= esc_attr( implode( ' ', $section_classes ) ); ?>"<?= $section_style ? ' style="' . esc_attr( $section_style ) . '"' : ''; ?>>
	<?php if ( $background_url ) : ?>
		<div class="cb-pushthrough__overlay<?= $left_content ? ' cb-pushthrough__overlay--dark' : ''; ?>"></div>
	<?php endif; ?>

	<div class="id-container px-4 px-md-5 py-4">
		<div class="row g-5 py-4">
			<div class="col-md-6">
				<?php if ( 'Text' === $left_type ) : ?>
					<?php if ( $title ) : ?>
						<h2 class="cb-pushthrough__title w-constrained" style="--width:25ch"><?= esc_html( $title ); ?></h2>
					<?php endif; ?>
					<?php if ( $left_content ) : ?>
						<div class="cb-pushthrough__left-content mb-3 pt-3">
							<?= wp_kses_post( nl2br( esc_html( $left_content ) ) ); ?>
						</div>
					<?php endif; ?>
				<?php else : ?>
					<div class="cb-pushthrough__logo"><?= cb_sanitise_svg( get_stylesheet_directory() . '/img/identity-logo.svg', '', '570px' ); ?></div>
				<?php endif; ?>
			</div>

			<div class="col-md-6">
				<?php if ( $description ) : ?>
					<div class="cb-pushthrough__desc fw-regular">
						<?= wp_kses_post( $description ); ?>
					</div>
				<?php endif; ?>
				<?php if ( $link && isset( $link['url'], $link['title'] ) ) : ?>
					<a href="<?= esc_url( $link['url'] ); ?>" class="cb-pushthrough__link" target="<?= esc_attr( $link['target'] ?: '_self' ); ?>">
						<?= esc_html( $link['title'] ); ?>
						<span class="cb-pushthrough__link-arrow"><?= cb_sanitise_svg( get_stylesheet_directory() . '/img/arrow-n600.svg', 'cb-pushthrough__link-arrow-icon', 16, 16 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
