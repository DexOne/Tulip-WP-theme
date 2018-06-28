<?php get_header(); // get header
include(get_template_directory() . '/template-parts/breadcrumb.php');
// get breadcrumb
?>

<div class="container post-page">
	<?php if (have_posts()) { // check if there's posts

	while (have_posts()) { // loop throught posts

		the_post(); ?>
	<div class="main-single-post">
		<?php edit_post_link('Edit <i class="fa fa-pencil"></i>'); ?>
		<h3 class="post-title-single">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h3>
            <!-- ho => hold -->
        <div class="row ho-date-comments">
                <!-- ho => hold , s => single , po => post -->
            <div class="col-md-6 ho-po-date">
		<span class="po-date">
			<i class="fa fa-calendar fa-fw"></i> <?php the_date() ?>
		</span>
            </div>
            <!-- ho => hold , s => single , po => post -->
            <div class="col-md-6 ho-s-po-comments">
		<span class="po-comments">
			<i class="fa fa-comments-o fa-fw"></i>
			<?php comments_popup_link('0 Comments', '1 Comment', '% Comments', 'comment-link', 'Comments Disabled') ?>
		</span>
            </div>
        </div>
		<?php the_post_thumbnail('', ['class' => 'img-responvise img-thumbnail', 'title' => 'Post Image']);
        echo '<hr class="comment-separator">';
        
        ?>
		<p class="single-post-content">
			<?php the_content() ?>
		</p>
		<hr>
		<p class="po-categories">
			<i class="fa fa-tags fa-fw"></i>
			<?php the_category(' | ') ?>
		<p class="po-tags">
			<?php
			if (has_tag()){
				the_tags('','|','');
			} else {
				echo "has no tags";
			}
			?>
		</p>
	</div>

	<?php

	} // end while loop

} // end if condition ?>
	<div class="random-posts">
		<h3 class="single-rand-title text-center">
        مقالات عشوائية من نفس القسم
        </h3>
		<?php
		$random_posts_arguments = array(
			'posts_per_page'	=> 4,
			'orderby'	=> 'rand',
			'category__in'	=> wp_get_post_categories(get_queried_object_id()),
			'post__not_in'	=> array(get_queried_object_id())

		);

		$random_posts = new WP_Query($random_posts_arguments);

		if ($random_posts->have_posts()) {
			while ($random_posts->have_posts()) {
				$random_posts->the_post() ?>
		<div class="author-posts col-md-3">
            <a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('', ['class' => 'img-responvise img-thumbnail custom-img-height', 'title' => 'Post Image']) ?>
			</a>
			<h3 class="post-title">
				<a href="<?php the_permalink() ?>">
					<?php the_title() ?>
				</a>
			</h3>
		</div>
		<?php
			}
		}
		wp_reset_postdata();
		?>
	</div>
	<div class="clearfix"></div>
	<!-- The Author Information -->
	<div class="author-box">
		<div class="row">
			<div class="col-md-3">
				<?php //get_avatar($id_or_email, $size, $default, $alt, $args );
				$avatar_arguments = array(
					'class' => 'img-responsive img-thumbnail center-block custom-auto-thumbnail'
				);

				echo get_avatar(get_the_author_meta('ID'),150,'','USER Avatar',$avatar_arguments);
				?> 
			</div>
			<div class="col-md-9 author-details">
                <div class="row ho-author">
                <div class="col-md-4">
                    <h3 class="first-name">
					<?php the_author_meta('first_name') ?>
                    </h3>
                </div>
            <div class="col-md-4">
                <h3 class="last-name">
					<?php the_author_meta('last_name') ?>
                    </h3>
                </div>
            <div class="col-md-4">
                <h3 class="nickname">
					(<?php the_author_meta('nickname') ?>)
				</h3>
            </div>
                </div>
				<?php if (get_the_author_meta('description')) { ?>
				<h4 class="author-description">
					<?php
	the_author_meta('description') 
					?>
				</h4>
			</div>
			<?php
} else{
	echo '<h4 class="non-description">هذا هو الوصف الأفتراضى هذا لأن الكاتب لم يعين واحداً بعد</h4>' ?>
			<?php
}

			?>
                <div class="row ho-author-page">
                <div class="col-md-6">
                    <h5 class="posts-count">
                        مقالات الكاتب :
                            <?php echo count_user_posts(get_the_author_meta('ID'))?>
                    </h5>
                </div>
                <div class="col-md-6">
                    <h5 class="posts-count">
                الذهاب الى صفحة الكاتب :
				        <?php the_author_posts_link(); ?>
                    </h5>
                </div>
            </div>
		</div>
	</div>
	<?php
	echo '<div class="post-pagination">';

	if (get_previous_post_link()) {
		previous_post_link('%link', '<i class="fa fa-chevron-right fa-lg" aria-hidden="true"></i> المقال السابق %title');
	} else {
		echo "<span class='previous-span'>لا مزيد من المقالات</span>";
	}

	if (get_next_post_link()) {
		next_post_link('%link', 'المقال القادم %title <i class="fa fa-chevron-left fa-lg" aria-hidden="true"></i>');
	} else {
		echo "<span class='next-span'>لا مزيد من المقالات</span>";
	}

	echo '</div>';
	comments_template();
	?>

</div>

<?php get_footer(); ?>
