<?php
/**
 * Block template for CB Image Feature Overlay.
 *
 * @package Identity Travel
 */

defined( 'ABSPATH' ) || exit;

$section_id    = $block['anchor'] ?? null;
$extra_classes = $block['className'] ?? '';
$image_id      = get_field( 'image' );
$content       = get_field( 'content' );

$section_classes = array( 'cb-image-feature-overlay' );

$pres = get_field( 'presentation' );
if ( 'Hero' === $pres ) {
	$section_classes[] = 'cb-image-feature-overlay--hero';
}

if ( $extra_classes ) {
	$section_classes[] = $extra_classes;
}

$section_style = '';

if ( $image_id ) {
	$image_url = wp_get_attachment_image_url( $image_id, 'full' );

	if ( $image_url ) {
		$section_style = sprintf( '--_bg-url: url(%s);', esc_url_raw( $image_url ) );
	}
}

?>
<section
	id="<?= esc_attr( $section_id ); ?>"
	class="<?= esc_attr( implode( ' ', $section_classes ) ); ?>"
	<?= $section_style ? 'style="' . esc_attr( $section_style ) . '"' : ''; ?>
>
	<div class="cb-image-feature-overlay__overlay">
		<div class="id-container px-4 px-md-5 py-4 py-md-5">
			<?php
			if ( 'Inline' === $presentation ) {
				?>
			<div class="cb-image-feature-overlay__content">
				<?= wpautop( esc_html( $content ) ); ?>
			</div>
				<?php
			} else {
				$block_link = get_field( 'cta_link' );
				?>
			<hr>
			<div class="row g-4 pt-4">
				<div class="col-lg-8">
					<h1><?= esc_html( 'title' ); ?></h1>
				</div>
				<div class="col-lg-4">
					<?php if ( ! empty( $block_link['url'] ) && ! empty( $block_link['title'] ) ) : ?>
						<a class="id-button mb-5" href="<?= esc_url( $block_link['url'] ); ?>" target="<?= esc_attr( $block_link['target'] ?: '_self' ); ?>"><?= esc_html( $block_link['title'] ); ?></a>
					<?php endif; ?>
					<div class="cta-hero__cta-title"><?= esc_html( get_field( 'cta_intro' ) ); ?></div>
				</div>
			</div>
				<?php
			}
			?>
		</div>
	</div>
</section>
