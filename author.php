<?php get_header(); ?>
<div class="container author-page">
	<h1 class="profile-header text-center">
		<?php the_author_meta('nickname') ?>
	</h1>
	<div class="author-main-info">
		<!--  start row  -->
		<div class="row">
			<div class="col-md-3">
				<!-- Get Author Avatar -->
				<?php
	//get_avatar($id_or_email
	//$size, $default, $alt, $args );
	$avatar_arguments = array(
	'class' => 'img-responsive img-thumbnail center-block custom-auto-thumbnail');

		echo get_avatar(get_the_author_meta('ID'),150,'','USER Avatar',$avatar_arguments);
				?>             
			</div>
			<div class="col-md-9">
				<ul class="list-unstyled author-bio">
					<li><span>First Name : </span>
						<?php the_author_meta('first_name') ?>
					</li>
					<li>
						<span>Last Name : </span>
						<?php the_author_meta('last_name') ?>
					</li>
					<li>
						<span>NickName : </span>
						<?php the_author_meta('nickname') ?>
					</li>
				</ul>
				<hr>
				<?php if (get_the_author_meta('description')) { ?>
				<h4 class="author-description">
					<span>Author Description : </span>
					<?php the_author_meta('description') ?>
				</h4>
			</div>
			<?php }
						else{ echo '<h4 class="non-description">this is the default description , the author didn\'t set one</h4>' ?>
			<?php
							}
			?>
		</div>
	</div>
	<!--  end Row  -->
	<!--  start Row  -->
	<div class="row author-stats">
		<div class="col-md-3">
			<div class="stats">
				posts count
				<span>
					<?php echo count_user_posts(get_the_author_meta('ID'))?>
				</span>
			</div>
		</div>
		<div class="col-md-3">
			<div class="stats">
				comments count
				<span>
					<?php $comment_count_arg = array(
	'user_id' => get_the_author_meta('ID'),
	'count' => true );
					echo get_comments($comment_count_arg); ?>
				</span>
			</div>
		</div>
		<div class="col-md-3">
			<div class="stats">
				total view
				<span>60</span>
			</div>
		</div>
		<div class="col-md-3">
			<div class="stats">
				testing
				<span>80</span>
			</div>
		</div>
	</div>
</div>
<!--  end row  -->
<div class="row">
	<?php
	$author_per_page = 5;
	$author_posts_arguments = array(
		'author' => get_the_author_meta('ID'),
		'posts_per_page' => $author_per_page
	);
	$author_posts = new wp_query($author_posts_arguments);
	?>
	<?php if ($author_posts->have_posts()) { // check if there's posts ?>
	<h1 class="posts-by-author text-center">
		Latest <?php echo $author_per_page ?> by <?php the_author_meta('nickname') ?>
	</h1>
	<?php
	while ($author_posts->have_posts()) { // loop throught posts
		$author_posts->the_post(); ?>
	<div class="author-posts container">
		<div class="col-xs-3">
			<?php the_post_thumbnail('',
									 ['class' => 'img-responvise img-thumbnail custom-auto-thumbnail',
									  'title' => 'Post Image']) ?>
		</div>
		<div class="col-xs-9 post-info">
			<div class="hold-title">
				<h2 class="title-h2">
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</h2>
			</div>
			<p class="post-content">
				<?php the_excerpt(5) ?>
				<a class="read-more" href="<?php echo get_permalink(); ?>">Read More...</a>
			</p>
		</div>
	</div>
</div>
<div class="clearfix"></div>
<?php

	} // end while loop

										   }// end if condition
	wp_reset_postdata();
?>
<?php get_footer(); ?>