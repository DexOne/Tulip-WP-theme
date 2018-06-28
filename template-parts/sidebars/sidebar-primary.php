<div class="row sidebar-primary">
    
<!--  Latest 2 Posts From Specific category Widget -->
	<div class="col-xs-12 widget">
		<h3 class="widget-title">أحدث مقالات الفلسفة</h3>
		<div class="widget-content">
			<ul>
				<?php
				$args = array(
                    'posts_per_page' => 2
                    /* change this num for posts to show */, 
                    'category' => 4
                    /* change the category ID to get another one */
                );
				$latest_two_posts = new WP_Query( $args );
						
					if( $latest_two_posts->have_posts() ) {
						while( $latest_two_posts->have_posts() ) {
						$latest_two_posts->the_post(); ?>   
					<li class="row">
						<a class="" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						<?php the_post_thumbnail('',
						['class' => 'img-responvise img-thumbnail auto-height', 'title' => 'Post Image']) ?>
				    </li>
				<hr>
					<?php }
					}; wp_reset_postdata(); ?>
			</ul>
		</div>
	</div>
        <!--  Hot Posts Widget  -->
	<div class="col-xs-12 widget">
		<h3 class="widget-title">أكثر المقالات تفاعل</h3>
		<div class="widget-content">
						<ul>
				<?php
				$hot_posts_args = array( 'posts_per_page' => 2, 'orderby' => 'comment_count' );
				$myposts_hot = new WP_Query( $hot_posts_args );
						
					if( $myposts_hot->have_posts() ) {
						while( $myposts_hot->have_posts() ) {
						$myposts_hot->the_post(); ?>   
					<li>
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        <?php the_post_thumbnail('',
						['class' => 'img-responvise img-thumbnail auto-height', 'title' => 'Post Image']) ?>
						<hr> تحتوى هذه المقالة على 
			<?php comments_popup_link('0 Comments', '1 Comment', '% Comments', 'comment-link', 'Comments Disabled') ?>
					</li>
					<?php }
					}; wp_reset_postdata(); ?>
			</ul>
		</div>
	</div>
</div>