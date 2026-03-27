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
			<div class="cb-image-feature-overlay__content">
				<?= wpautop( esc_html( $content ) ); ?>
			</div>
		</div>
	</div>
</section>
