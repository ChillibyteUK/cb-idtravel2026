<?php
/**
 * CB Content Grid Block Template
 *
 * @package cb-idtravel2026
 */

defined( 'ABSPATH' ) || exit;

$block_id = $block['id'] ?? wp_unique_id( 'cb-content-grid-' );

$rows               = get_field( 'rows' );
$background_image   = get_field( 'background_image' );
$section_style_attr = '';

if ( empty( $rows ) ) {
	return;
}

if ( $background_image ) {
	$background_image_url = wp_get_attachment_image_url( $background_image, 'full' );

	if ( $background_image_url ) {
		$section_style_attr = sprintf( '--cb-content-grid-bg: url(%s);', esc_url_raw( $background_image_url ) );
	}
}

$bg_class = '';
if ( isset( $block['supports']['color']['background'] ) && $block['supports']['color']['background'] ) {
	$bg_color = $block['backgroundColor'] ?? '';
	if ( $bg_color ) {
		$bg_class = 'has-' . esc_attr( $bg_color ) . '-background-color';
	}
}

$text_class = '';
if ( isset( $block['supports']['color']['text'] ) && $block['supports']['color']['text'] ) {
	$text_color = $block['textColor'] ?? '';
	if ( $text_color ) {
		$text_class = 'has-' . esc_attr( $text_color ) . '-color';
	}
}

$section_classes = array( 'cb-content-grid' );
if ( $bg_class ) {
	$section_classes[] = $bg_class;
}
if ( $text_class ) {
	$section_classes[] = $text_class;
}
if ( $section_style_attr ) {
	$section_classes[] = 'cb-content-grid--has-background-image';
}
?>
<section id="<?= esc_attr( $block_id ); ?>" class="<?= esc_attr( implode( ' ', $section_classes ) ); ?>"<?= $section_style_attr ? ' style="' . esc_attr( $section_style_attr ) . '"' : ''; ?>>
	<div class="id-container py-5 px-4 px-md-5">
		<?php
		foreach ( $rows as $row_index => $row ) {
			$column_layout = $row['column_layout'] ?? '12';
			$modules       = $row['modules'] ?? array();
			$has_h2_module = false;

			foreach ( $modules as $module ) {
				if ( 'h2' === ( $module['module_type'] ?? '' ) && ! empty( $module['h2_text'] ) ) {
					$has_h2_module = true;
					break;
				}
			}

			$row_classes = array( 'cb-content-grid__row  pt-4 pb-5' );

			if ( $has_h2_module ) {
				$row_classes[] = 'cb-content-grid__row--has-h2';
			}

			$grid_classes = array( 'row', 'g-5' );

			if ( 'Yes' === $row['has_line'][0] ) {
				$row_classes[] = 'cb-content-grid__row--has-line';
			}

			switch ( $column_layout ) {
				case '12':
					$grid_classes[] = 'cb-content-grid__row--full';
					break;
				case '6-6':
					$grid_classes[] = 'cb-content-grid__row--two-col';
					break;
				case '4-8':
					$grid_classes[] = 'cb-content-grid__row--third-twothirds';
					break;
				case '8-4':
					$grid_classes[] = 'cb-content-grid__row--twothirds-third';
					break;
				case '4-4-4':
					$grid_classes[] = 'cb-content-grid__row--three-col';
					break;
				case '3-3-3-3':
					$grid_classes[] = 'cb-content-grid__row--four-col';
					break;
			}
			?>
			<div class="<?= esc_attr( implode( ' ', $row_classes ) ); ?>" data-row-index="<?= esc_attr( $row_index ); ?>">
				<div class="<?= esc_attr( implode( ' ', $grid_classes ) ); ?>">
					<?php
					foreach ( $modules as $module_index => $module ) {
						$module_type = $module['module_type'] ?? 'empty';

						$col_classes = array( 'cb-content-grid__module' );

						switch ( $column_layout ) {
							case '12':
								$col_classes[] = 'col-md-12';
								break;
							case '6-6':
								$col_classes[] = 'col-md-6';
								break;
							case '4-8':
								$col_classes[] = 0 === $module_index ? 'col-md-4' : 'col-md-8';
								break;
							case '8-4':
								$col_classes[] = 0 === $module_index ? 'col-md-8' : 'col-md-4';
								break;
							case '4-4-4':
								$col_classes[] = 'col-md-4';
								break;
							case '3-3-3-3':
								$col_classes[] = 'col-md-3';
								break;
						}

						$col_classes[] = 'cb-content-grid__module--' . esc_attr( $module_type );
						?>
						<div class="<?= esc_attr( implode( ' ', $col_classes ) ); ?>" data-module-index="<?= esc_attr( $module_index ); ?>">
							<?php
							switch ( $module_type ) {
								case 'h2':
									$h2_text = $module['h2_text'] ?? '';
									if ( $h2_text ) {
										?>
										<h2 class="cb-content-grid__h2"><?= wp_kses_post( $h2_text ); ?></h2>
										<?php
									}
									break;

								case 'h3':
									$h3_text = $module['h3_text'] ?? '';
									if ( $h3_text ) {
										?>
										<h3 class="cb-content-grid__h3"><?= wp_kses_post( $h3_text ); ?></h3>
										<?php
									}
									break;

								case 'text':
									$text_content = $module['text_content'] ?? '';
									$text_fs      = $module['text_font_size'] ?? 'fs-100';
									$text_fw      = $module['text_font_weight'] ?? 'fw-regular';
									?>
									<div class="cb-content-grid__text <?= esc_attr( $text_fs ); ?> <?= esc_attr( $text_fw ); ?>">
										<?= wp_kses_post( $text_content ); ?>
									</div>
									<?php
									break;

								case 'list':
									$list_content = $module['list_content'] ?? '';
									$list_fs     = $module['list_font_size'] ?? 'fs-100';
									$list_fw     = $module['list_font_weight'] ?? 'fw-regular';
									if ( $list_content ) {
										?>
										<ul class="cb-content-grid__list <?= esc_attr( $list_fs ); ?> <?= esc_attr( $list_fw ); ?>">
											<?= cb_list( $list_content ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
										</ul>
										<?php
									}
									break;

								case 'quote':
									$quote_text = $module['quote_text'] ?? '';
									$quote_link = $module['quote_link'] ?? array();

									if ( $quote_text ) {
										?>
										<div class="cb-content-grid__quote-wrap">
											<blockquote class="cb-content-grid__quote mb-4"><?= wp_kses_post( $quote_text ); ?></blockquote>
											<?php if ( ! empty( $quote_link['url'] ) && ! empty( $quote_link['title'] ) ) : ?>
												<a class="id-button" href="<?= esc_url( $quote_link['url'] ); ?>" target="<?= esc_attr( $quote_link['target'] ?: '_self' ); ?>">
													<?= esc_html( $quote_link['title'] ); ?>
												</a>
											<?php endif; ?>
										</div>
										<?php
									}
									break;

								case 'image':
									$image_id     = $module['image'] ?? null;
									$aspect       = $module['image_aspect_ratio'] ?? '16x9';
									$image_mode   = $module['image_size'] ?? '';
									$image_size   = 'contain' === $image_mode ? 'cb-content-grid__image-contain' : '';
									$native_class = ( 'native' === $aspect && 'contain' === $image_mode ) ? 'cb-content-grid__image-native' : '';
									$aspect_class = '';
									$wrap_style   = '';

									switch ( $aspect ) {
										case 'native':
											$aspect_class = '';
											break;
										case '21x9':
											$aspect_class = 'ratio ratio-21x9';
											break;
										case '16x9':
											$aspect_class = 'ratio ratio-16x9';
											break;
										case '4x3':
											$aspect_class = 'ratio ratio-4x3';
											break;
										case '1x1':
											$aspect_class = 'ratio ratio-1x1';
											break;
									}

									if ( $image_id ) {
										if ( $native_class ) {
											$image_src = wp_get_attachment_image_src( $image_id, 'full' );

											if ( ! empty( $image_src[1] ) ) {
												$wrap_style = sprintf( 'style="width:min(100%%, %dpx);"', (int) $image_src[1] );
											}
										}
										?>
										<div class="cb-content-grid__image-wrap <?= esc_attr( $aspect_class ); ?> <?= esc_attr( $image_size ); ?> <?= esc_attr( $native_class ); ?>" <?= $wrap_style; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
											<?= wp_get_attachment_image( $image_id, 'full', false, array( 'class' => 'img-fluid cb-content-grid__image' ) ); ?>
										</div>
										<?php
									}

									break;

								case 'video':
									$video_url = $module['video_url'] ?? '';

									if ( $video_url ) {
										$video_url = cb_vimeo_url_with_dnt( $video_url );
										?>
										<div class="cb-content-grid__video-wrap ratio ratio-16x9">
											<iframe
												class="cb-content-grid__video"
												src="<?= esc_url( $video_url ); ?>"
												title="Vimeo video player"
												frameborder="0"
												allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media; web-share"
												referrerpolicy="strict-origin-when-cross-origin"
												allowfullscreen>
											</iframe>
										</div>
										<?php
									}
									break;

								case 'qa':
									$qa_rows = $module['qa_rows'] ?? array();

									if ( ! empty( $qa_rows ) && is_array( $qa_rows ) ) {
										$first_q = $module['lead_first'] ? 'cb-content-grid__qa-question--first' : '';
										$first_a = $module['lead_first'] ? 'cb-content-grid__qa-answer--first' : '';
										?>
										<div class="cb-content-grid__qa">
											<?php foreach ( $qa_rows as $qa_row ) : ?>
												<?php
												$qa_question = $qa_row['qa_question'] ?? '';
												$qa_answer   = $qa_row['qa_answer'] ?? '';

												if ( ! $qa_question && ! $qa_answer ) {
													continue;
												}
												?>
												<div class="cb-content-grid__qa-row row g-4 pb-5 align-items-start">
													<div class="col-lg-6">
														<?php if ( $qa_question ) : ?>
															<h3 class="cb-content-grid__qa-question <?= esc_attr( $first_q ); ?>"><?= wp_kses_post( $qa_question ); ?></h3>
														<?php endif; ?>
													</div>
													<div class="col-lg-6">
														<?php if ( $qa_answer ) : ?>
															<div class="cb-content-grid__qa-answer <?= esc_attr( $first_a ); ?>"><?= wp_kses_post( $qa_answer ); ?></div>
														<?php endif; ?>
													</div>
												</div>
											<?php 
												$first_q = $first_a = '';
											endforeach;
											?>
										</div>
										<?php
									}
									break;

								case 'empty':
								default:
									break;
							}
							?>
						</div>
						<?php
					}
					?>
				</div>
			</div>
			<?php
		}
		?>
	</div>
</section>

<?php if ( $section_style_attr ) : ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
	var section = document.getElementById(<?= wp_json_encode( $block_id ); ?>);
	if (!section) return;

	var ticking = false;

	function update() {
		var rect = section.getBoundingClientRect();
		var windowHeight = window.innerHeight;

		if (rect.bottom > 0 && rect.top < windowHeight) {
			var percent = (windowHeight - rect.top) / (windowHeight + rect.height);
			percent = Math.max(0, Math.min(1, percent));
			var translateY = (percent - 0.5) * 280;
			section.style.setProperty('--cb-content-grid-parallax-y', translateY.toFixed(1) + 'px');
		}

		ticking = false;
	}

	function onScroll() {
		if (!ticking) {
			window.requestAnimationFrame(update);
			ticking = true;
		}
	}

	window.addEventListener('scroll', onScroll, { passive: true });
	window.addEventListener('resize', onScroll);
	onScroll();
});
</script>
<?php endif; ?>

<script>
(function() {
	function matchImageHeights() {
		var rows = document.querySelectorAll('.cb-content-grid__row');
		rows.forEach(function(row) {
			var modules = row.querySelectorAll('.cb-content-grid__module--image');
			if (modules.length < 2) return;

			var maxHeight = 0;
			var images = [];

			modules.forEach(function(mod) {
				var img = mod.querySelector('.cb-content-grid__image-wrap');
				if (img) {
					var rect = img.getBoundingClientRect();
					if (rect.height > maxHeight) {
						maxHeight = rect.height;
					}
					images.push(img);
				}
			});

			if (maxHeight > 0) {
				images.forEach(function(img) {
					img.style.height = maxHeight + 'px';
				});
			}
		});
	}

	var resizeTimer;
	window.addEventListener('resize', function() {
		clearTimeout(resizeTimer);
		resizeTimer = setTimeout(matchImageHeights, 100);
	});

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', matchImageHeights);
	} else {
		matchImageHeights();
	}
})();
</script>
