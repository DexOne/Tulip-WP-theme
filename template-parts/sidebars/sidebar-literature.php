<?php
$comments_args = array(
	'status' => 'approve'
);

$comments_count = 0;
$all_comments = get_comments($comments_args);

foreach ($all_comments as $comment){
	$post_id = $comment->comment_post_ID;

	if(! in_category('literature', $post_id)){
		continue;
	}
	$comments_count++;
}

$cat = get_queried_object();
$post_count = $cat->count;
?>

<div class="row sidebar-literature">
	<div class="col-xs-12 widget">
		<h3 class="widget-title">
			احصائيات قسم "<?php single_cat_title(); ?>"
		</h3>
		<div class="widget-content">
			<ul>
				<li>
					<span>عدد التعليقات : <?php echo $comments_count ?></span>
				</li>
				<li>
					<span>عدد المقالات :
                        <?php $post_count ?>
                    </span>
				</li>
			</ul>
		</div>
	</div>
	<div class="col-xs-12 widget">
		<h3 class="widget-title">أحدث مقالات الفلسفة</h3>
		<div class="widget-content">
			<ul>
				<?php
				$args = array( 'posts_per_page' => 5, 'category' => 4 );
				$myposts = new WP_Query( $args );
						
					if( $myposts->have_posts() ) {
						while( $myposts->have_posts() ) {
						$myposts->the_post(); ?>   
					<li class="row">
						<a class="col-md-6" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						<?php the_post_thumbnail('',
						['class' => 'col-md-6 img-responvise auto-height', 'title' => 'Post Image']) ?>
				</li>
				<hr>
					<?php }
					}; wp_reset_postdata(); ?>
			</ul>
		</div>
	</div>
	<div class="col-xs-12 widget">
		<h3 class="widget-title">أعلى مقال</h3>
		<div class="widget-content">
						<ul>
				<?php
				$hot_posts_args = array( 'posts_per_page' => 1, 'orderby' => 'comment_count' );
				$myposts_hot = new WP_Query( $hot_posts_args );
						
					if( $myposts_hot->have_posts() ) {
						while( $myposts_hot->have_posts() ) {
						$myposts_hot->the_post(); ?>   
					<li>
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						<hr> يحتوى هذا المقال على 
			<?php comments_popup_link('0 Comments', '1 Comment', '% Comments', 'comment-link', 'Comments Disabled') ?>
					</li>
					<?php }
					}; wp_reset_postdata(); ?>
			</ul>
		</div>
	</div>
</div>