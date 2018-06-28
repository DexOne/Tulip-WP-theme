<footer>
 
    <?php
    /* The footer widget area is triggered if any of the areas
     * have widgets. So let's check that first.
     *
     * If none of the sidebars have widgets, then let's bail early.
     */
    if (   ! is_active_sidebar( 'first-footer-widget-area'  )
        && ! is_active_sidebar( 'second-footer-widget-area' )
        && ! is_active_sidebar( 'third-footer-widget-area'  )
        && ! is_active_sidebar( 'fourth-footer-widget-area' )
    )
        return; ?>
	<aside class="fatfooter" role="complementary">
		<div class="first quarter left widget-area">
			<?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
		</div><!-- .first .widget-area -->

		<div class="second quarter widget-area">
			<?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
		</div><!-- .second .widget-area -->

		<div class="third quarter widget-area">
			<?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
		</div><!-- .third .widget-area -->

		<div class="fourth quarter right widget-area">
			<?php dynamic_sidebar( 'fourth-footer-widget-area' ); ?>
		</div><!-- .fourth .widget-area -->
	</aside><!-- #fatfooter -->         
</footer>
    <?php wp_footer(); ?>
  </body>
</html>