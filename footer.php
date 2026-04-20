<?php
/**
 * Footer template for the Identity Coda 2026 theme.
 *
 * This file contains the footer section of the theme, including navigation menus,
 * office addresses, and colophon information.
 *
 * @package cb-idtravel2026
 */

defined( 'ABSPATH' ) || exit;
?>
<div id="footer-top"></div>

<footer class="footer pt-5 pb-4">
    <div class="id-container px-4 px-md-5">
        <div class="row pb-4 g-4">
			<div class="col-12 col-md-6 col-lg-4 order-9 order-md-1">
				<strong>
					<?= do_shortcode( '[contact_email]' ); ?>
				</strong>
				<?= do_shortcode( '[social_icons class="fa-2x"]' ); ?>
			</div>
			<div class="col-12 col-sm-6 col-md-4 col-lg-2 order-2 order-md-3 order-lg-2">
				<div class="footer-title"><a href="/business-travel/">Business Travel</a></div>
				<?=
				wp_nav_menu(
					array(
						'theme_location' => 'footer_menu_business',
						'menu_class'     => 'footer__menu',
					)
				);
				?>
				<div class="footer-title mt-4"><a href="/about/">About</a></div>
				<?=
				wp_nav_menu(
					array(
						'theme_location' => 'footer_menu_about',
						'menu_class'     => 'footer__menu',
					)
				);
				?>
			</div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 order-4 order-md-4 order-lg-3">
				<div class="footer-title"><a href="/solutions/">Solutions</a></div>
				<?=
				wp_nav_menu(
					array(
						'theme_location' => 'footer_menu_solutions',
						'menu_class'     => 'footer__menu',
					)
				);
				?>
				<div class="footer-title mt-4"><a href="/specialist-travel/">Specialist Travel</a></div>
				<?=
				wp_nav_menu(
					array(
						'theme_location' => 'footer_menu_specialist',
						'menu_class'     => 'footer__menu',
					)
				);
				?>
			</div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 order-6 order-md-7 order-lg-4">
				<div class="footer-title">Identity Companies</div>
				<?=
				wp_nav_menu(
					array(
						'theme_location' => 'footer_menu_identity',
						'menu_class'     => 'footer__menu',
					)
				);
				?>
			</div>
			<!-- 5. Legal -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 order-6 order-md-7 order-lg-4">
				<div class="footer-title"><a href="/insights/">Resources</a></div>
				<?=
				wp_nav_menu(
					array(
						'theme_location' => 'footer_menu_resources',
						'menu_class'     => 'footer__menu',
					)
				);
				?>
				<div class="footer-title mt-4">Legal &amp; info</div>
				<?=
				wp_nav_menu(
					array(
						'theme_location' => 'footer_menu_legal',
						'menu_class'     => 'footer__menu',
					)
				);
				?>
			</div>
		</div>
	</div>
	<div class="footer__logo">
		<div class="id-container py-5 px-4 px-md-5">
			<div id="footer-logo-clip" class="footer__logo-clip">
				<div id="footer-logo-inner" class="footer__logo-inner">
					<!-- Inline logo SVG (long form) so we can animate precisely -->
					<svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 45.92">
						<defs>
							<style>
							.cls-1f {
								fill: #fff;
							}

							.cls-2f {
								fill: none;
							}
							</style>
						</defs>
						<g id="Layer_1-2" data-name="Layer 1">
							<polygon class="cls-1f" points="298.63 31.21 304.34 31.21 304.34 45.91 306.37 45.91 306.37 31.21 312.08 31.21 312.08 29.45 298.63 29.45 298.63 31.21"/>
							<path class="cls-1f" d="M325.26,40.12c1.02-.45,1.8-1.1,2.34-1.95.54-.85.81-1.86.81-3.03,0-1.79-.6-3.18-1.81-4.18s-2.87-1.5-4.98-1.5h-6.28v16.45h2.02v-5.1h4.25c.41,0,.8-.03,1.18-.06l3.66,5.17h2.23l-3.98-5.58c.18-.06.37-.13.54-.2l.02-.02ZM321.57,39.06h-4.21v-7.85h4.21c1.57,0,2.76.34,3.57,1.02.81.68,1.22,1.65,1.22,2.9s-.41,2.2-1.22,2.89-2.01,1.03-3.57,1.03h0Z"/>
							<path class="cls-1f" d="M337.89,29.45l-7.48,16.45h2.12l1.88-4.25h8.97l1.89,4.25h2.14l-7.5-16.45h-2.02ZM335.14,40.01l3.75-8.47,3.76,8.47h-7.51Z"/>
							<polygon class="cls-1f" points="354.64 43.36 348.52 29.45 346.31 29.45 353.57 45.91 355.59 45.91 362.83 29.45 360.79 29.45 354.64 43.36"/>
							<polygon class="cls-1f" points="367.7 38.43 376.09 38.43 376.09 36.67 367.7 36.67 367.7 31.21 377.12 31.21 377.12 29.45 365.68 29.45 365.68 45.91 377.45 45.91 377.45 44.14 367.7 44.14 367.7 38.43"/>
							<polygon class="cls-1f" points="384.11 44.14 384.11 29.45 382.09 29.45 382.09 45.91 393.19 45.91 393.19 44.14 384.11 44.14"/>
							<polygon class="cls-1f" points="293.25 17.11 293.25 0 298.52 0 298.52 24.56 293.85 24.56 275.68 7.57 275.68 24.56 270.41 24.56 270.41 0 275.08 0 293.25 17.11"/>
							<path class="cls-1f" d="M375.79,0c3.04,3.93,9,12.17,9,12.17l8.9-12.17h6.31l-12.63,16.5v8.06h-5.27v-7.95l-12.74-16.61h6.43Z"/>
							<polygon class="cls-1f" points="367.75 0 367.75 4.5 356.98 4.5 356.98 24.56 351.71 24.56 351.71 4.5 340.95 4.5 340.95 0 367.75 0"/>
							<polygon class="cls-1f" points="328.77 0 328.77 4.5 318.01 4.5 318.01 24.56 312.74 24.56 312.74 4.5 301.98 4.5 301.98 0 328.77 0"/>
							<rect class="cls-1f" x="200" width="5.38" height="24.56"/>
							<polygon class="cls-1f" points="265.69 4.5 265.69 0 245.53 0 241.04 0 241.04 24.56 245.53 24.56 265.69 24.56 265.69 20.07 245.53 20.07 245.53 14.53 265.69 14.53 265.69 10.03 245.53 10.03 245.53 4.5 265.69 4.5"/>
							<path class="cls-1f" d="M233.58,3.21c-2.24-2.13-5.51-3.21-9.7-3.21h-12.96v24.56h12.96c8.41,0,13.05-4.37,13.05-12.3,0-3.9-1.12-6.95-3.34-9.05h0ZM216.15,4.52h7.39c2.66,0,4.68.63,6,1.86,1.37,1.27,2.07,3.25,2.07,5.89,0,5.24-2.64,7.78-8.07,7.78h-7.39V4.52Z"/>
							<rect class="cls-1f" x="332.23" width="5.27" height="24.56"/>
							<rect class="cls-2f" width="400" height="45.91"/>
						</g>
					</svg>
				</div>
			</div>
		</div>
	</div>
	<div class="id-container px-4 px-md-5 pt-4 footer__colophon">
		EQD Travel Ltd. Registered in Northern Ireland: NI602037 | VAT Number - GB 175 2550 07
	</div>
</footer>
<script>
(function(){
    const clip = document.getElementById('footer-logo-clip');
    const inner = document.getElementById('footer-logo-inner');
	const clip2 = document.getElementById('footer-logo-clip-2');
    if (!clip || !inner) return;

    const prefersReduced = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    let triggered = false;

	// Set initial state immediately to avoid a pre-animation flash at natural size.
	clip.style.width = '100%';
	inner.style.transformOrigin = 'left center';
	inner.style.width = '200%';
	inner.style.display = 'block';
	inner.style.transform = 'translateX(0)';
	inner.style.transition = 'none';

    function prepareAndAnimate() {
        clip.style.width = '100%';
        inner.style.transformOrigin = 'left center';
        inner.style.width = '200%';
        inner.style.display = 'block';
        inner.style.transform = 'translateX(0)';

		if (clip2) {
			clip2.style.opacity = '0';
			clip2.style.transform = 'translateY(12px)';
			clip2.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
		}

		const revealClip2 = () => {
			if (!clip2) return;
			clip2.style.opacity = '1';
			clip2.style.transform = 'translateY(0)';
		};

        if (prefersReduced) {
            inner.style.transform = 'translateX(-50%)';
			revealClip2();
            return;
        }
        const animDuration = 1.6;
        const gsapEase = 'power3.out';
        if (window.gsap && typeof window.gsap.to === 'function') {
			if (clip2) {
				window.gsap.set(clip2, { autoAlpha: 0, y: 12 });
			}
			window.gsap.to(inner, {
				xPercent: -50,
				duration: animDuration,
				ease: gsapEase,
				onComplete: () => {
					if (clip2) {
						window.gsap.to(clip2, { autoAlpha: 1, y: 0, duration: 0.6, ease: 'power2.out' });
					}
				}
			});
        } else {
            inner.style.transition = 'transform ' + animDuration + 's cubic-bezier(.22,.9,.32,1)';
            requestAnimationFrame(() => { inner.style.transform = 'translateX(-50%)'; });
			setTimeout(revealClip2, animDuration * 1000);
        }
    }

    function triggerIfVisible(el) {
        const rect = el.getBoundingClientRect();
        const vh = window.innerHeight || document.documentElement.clientHeight;
        return rect.top < vh && rect.bottom > 0;
    }

    const triggerEl = document.querySelector('.footer__colophon') || document.querySelector('.footer__logo') || clip;

    if (triggerEl) {
        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (triggered) return;
                if (entry.isIntersecting && entry.intersectionRatio > 0) {
                    triggered = true;
                    prepareAndAnimate();
                    obs.disconnect();
                }
            });
        }, { rootMargin: '0px 0px -10px 0px', threshold: [0.1] });

        observer.observe(triggerEl);

        // Immediately check if already visible (e.g., on fast loads or short pages)
        if (triggerIfVisible(triggerEl)) {
            triggered = true;
            prepareAndAnimate();
            observer.disconnect();
        }
    }

    let resizeTimer = null;
    window.addEventListener('resize', () => {
        if (triggered) return;
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
            clip.style.width = '100%';
            inner.style.width = '200%';
        }, 120);
    });
})();
</script>

<?php wp_footer(); ?>
</body>

</html>
