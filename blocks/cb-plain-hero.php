<?php
/**
 * Block template for CB Plain Hero.
 *
 * @package Identity Travel
 */

defined( 'ABSPATH' ) || exit;

?>
<section class="cb-plain-hero">
	<div class="cb-plain-hero__title">
		<h1 class="id-container px-4 px-md-5">
			<?= esc_html( get_field( 'title' ) ); ?>
		</h1>
	</div>
	<div class="id-container px-4 px-md-5 pt-5 pb-5">
		<div class="row">
			<div class="col-md-8">
				<div class="cb-plain-hero__intro pb-5">
					<?= wp_kses_post( get_field( 'intro' ) ); ?>
				</div>
			</div>
		</div>
	</div>
</section>
