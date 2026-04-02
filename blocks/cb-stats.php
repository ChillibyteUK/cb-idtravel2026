<?php
/**
 * Block template for CB Stats.
 *
 * @package cb-idtravel2026
 */

defined( 'ABSPATH' ) || exit;

$block_id         = $block['anchor'] ?? $block['id'] ?? wp_unique_id( 'cb-stats-' );
$background_image = get_field( 'background_image' );

$section_classes = array( 'cb-stats' );
$section_style   = '';

if ( $background_image ) {
	$background_url = wp_get_attachment_image_url( $background_image, 'full' );

	if ( $background_url ) {
		$section_style     = sprintf( '--cb-stats-bg: url(%s);', esc_url_raw( $background_url ) );
		$section_classes[] = 'cb-stats--has-background-image';
	}
}

$stats = array();

for ( $index = 1; $index <= 4; $index++ ) {
	$stats[] = array(
		'intro'  => get_field( 'stat_intro_' . $index ),
		'prefix' => get_field( 'stat_' . $index . '_prefix' ),
		'value'  => get_field( 'stat_' . $index ),
		'suffix' => get_field( 'stat_' . $index . '_suffix' ),
	);
}

if ( ! array_reduce(
	$stats,
	function ( $carry, $stat ) {
		return $carry || '' !== (string) $stat['intro'] || '' !== (string) $stat['prefix'] || '' !== (string) $stat['value'] || '' !== (string) $stat['suffix'];
	},
	false
) ) {
	return;
}
?>
<section id="<?= esc_attr( $block_id ); ?>" class="<?= esc_attr( implode( ' ', $section_classes ) ); ?>"<?= $section_style ? ' style="' . esc_attr( $section_style ) . '"' : ''; ?>>
	<div class="id-container px-4 px-md-5 py-5">
		<div class="row g-4 py-5">
			<?php foreach ( $stats as $stat ) : ?>
				<div class="col-md-6 col-lg-3">
					<?php if ( ! empty( $stat['intro'] ) ) : ?>
						<div class="cb-stats__intro"><?= esc_html( $stat['intro'] ); ?></div>
					<?php endif; ?>
					<div class="cb-stats__stat">
						<?php if ( '' !== (string) $stat['prefix'] ) : ?>
							<span class="cb-stats__stat-prefix"><?= esc_html( $stat['prefix'] ); ?></span>
						<?php endif; ?>
						<span class="cb-stats__stat-value" data-stat-target="<?= esc_attr( is_numeric( $stat['value'] ) ? $stat['value'] : 0 ); ?>">0</span>
						<?php if ( '' !== (string) $stat['suffix'] ) : ?>
							<span class="cb-stats__stat-suffix"><?= esc_html( $stat['suffix'] ); ?></span>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
