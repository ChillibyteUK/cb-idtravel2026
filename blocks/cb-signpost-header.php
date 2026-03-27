<?php
/**
 * Block template for CB Signpost Header.
 *
 * @package Identity Travel
 */

defined( 'ABSPATH' ) || exit;

// Support Gutenberg color picker.
$bg         = ! empty( $block['backgroundColor'] ) ? 'has-' . $block['backgroundColor'] . '-background-color' : '';
$fg         = ! empty( $block['textColor'] ) ? 'has-' . $block['textColor'] . '-color' : '';
$section_id = $block['anchor'] ?? null;
$extra      = $block['className'] ?? '';

$block_title = get_field( 'title' ) ?: 'Signpost Subheader';

?>
<section class="cb-signpost-header <?= esc_attr( trim( $bg . ' ' . $fg . ' ' . $extra ) ); ?>" id="<?= esc_attr( $section_id ); ?>">
	<div class="id-container px-4 px-md-5">
		<?= esc_html( $block_title ); ?>
	</div>
</section>
