<?php get_header(); ?>
<div class="container">
<?php 
echo do_shortcode('[smartslider3 slider=2]');
?>
</div>
<div class="container homepage">
	<div class="row style-row">
		<div class="col-md-9 rtl main-bg">
			<?php if (have_posts()) { // check if there's posts
	while (have_posts()) { // loop throught posts
		the_post(); ?>
 	           <div class="text-center main-post-head">
                <h2 class="main-post-h2">
                    <a class="main-post-a" href="<?php the_permalink(); ?>">
                        <?php echo wp_trim_words( get_the_title(), 5 ); ?>
                    </a>
                </h2>
            </div>
			<div class="row main-post main-bg">
                <div class="row main-post-stats">
                    <div class="col-xs-3 col-md-6 hold-post-author">
                        <span class="post-author">
                            <i class="fa fa-user fa-fw"></i> <?php the_author_posts_link() ?>
                        </span>
                    </div>
                 <div class="col-xs-9 col-md-6 hold-post-cats">
            <p class="text-center post-categories">
                            <i class="fa fa-tags fa-fw"></i>
                                <?php the_category(', ') ?>
            </p>
            </div>
                <div class="col-xs-3 col-md-6 hold-post-comments">
            <span class="post-comments">
				<i class="fa fa-comments-o fa-fw"></i>
				<?php comments_popup_link(
			'0',
			'1',
			'%',
			'comment-link',
			'Comments Disabled') ?>
			</span>
            </div>
                    <div class="col-xs-9 col-md-6 hold-post-tags">
            <p class="post-tags">
				<?php
			if (has_tag()){
				the_tags();
			} else {
				echo "no tags";
			}
				?>
			</p>
            </div>
            
			</div> <!-- End 2nd Row --> 
                
                <div class="col-md-4">
                    <a href="<?php the_permalink(); ?>" class="thumbnail">
                        <?php the_post_thumbnail('', ['class' => 'img-responvise', 'title' => 'Post Image']) ?>
                    </a>
                </div>
                <div class="col-md-8 main-post-content">
                    <p class="post-content">
                        <?php the_excerpt() ?>
                        <a class="read-more" href="<?php echo get_permalink(); ?>">تابع قراءة</a>
                    </p>
                </div>
                </div> <!-- end Row & main post -->
			<?php

	} // end while loop

} // end if condition
			?>
                <div class="clearfix"></div>
                            <!-- Start Posts Pagination -->
                <div class="numbering_pagination">
                    <?php echo numbering_pagination(); ?>	
                </div>
                <!--  End Posts Pagination -->
		</div>
		<div class="col-md-3 rtl text-center">
        <?php // Get Side-Bar Primary
        get_template_part( 'template-parts/sidebars/sidebar', 'primary' );
        ?>
		</div>
            <!-- Most Commented posts -->
            <div class="latest-24-hour">
                <h3>الأكثر تعليقاً</h3>
                <?php echo sb_top_commented_posts(); ?>
            </div>
	</div> <!-- End Row -->
</div>
<?php get_footer(); ?>
