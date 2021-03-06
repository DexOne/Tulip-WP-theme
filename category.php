<?php get_header(); ?>
<div class="container homepage">
	<div class="row">
		<div class="text-center main-category">
			<div class="col-md-4">
				<h1 class="cat-title">
					<?php single_cat_title(); ?>
				</h1>
			</div>
			<div class="col-md-4">
				<p class="cat-description">
					<?php echo category_description(); ?>
				</p>
			</div>
			<div class="col-md-4">
				<div class="cat-stats">
					<span class="posts-count">Posts Count: 91</span>
					<span class="comments-count">Comments Count: 76</span>
				</div>
			</div>
		</div>
		<?php if (have_posts()) { // check if there's posts
	while (have_posts()) { // loop throught posts
		the_post(); ?>		
		<div class="col-xs-12 col-md-4 section">
			<div class="main-post">
				<div class="hold-title">
					<h2 class="title-h2">
						<a href="<?php the_permalink(); ?>">
							<?php echo wp_trim_words( get_the_title(), 5 ); ?>
						</a>
					</h2>
				</div>
				<?php the_post_thumbnail('', ['class' => 'img-responvise img-thumbnail', 'title' => 'Post Image']) ?>
				<p class="post-content">
					<?php the_excerpt() ?>
					<a class="read-more" href="<?php echo get_permalink(); ?>">Read More...</a>
				</p>
				<hr>
				<span class="post-author">
					<i class="fa fa-user fa-fw"></i> <?php the_author_posts_link() ?>,
				</span>
				<span class="post-comments">
					<i class="fa fa-comments-o fa-fw"></i>
					<?php comments_popup_link(
			'0 Comments',
			'1 Comment',
			'% Comments',
			'comment-link',
			'Comments Disabled') ?>
				</span>
				<p class="post-categories">
					<i class="fa fa-tags fa-fw"></i>
					<?php the_category(', ') ?>
				<p class="post-tags">
					<?php
			if (has_tag()){
				the_tags();
			} else {
				echo "Tags: post has no tags";
			}
					?>
				</p>
			</div>
		</div>

		<?php

	} // end while loop

} // end if condition
		?>
		<div class="clearfix"></div>
		<div class="numbering_pagination">
			<?php echo numbering_pagination(); ?>	
		</div>
	</div> <!-- End Row -->
</div>
<?php get_footer(); ?>