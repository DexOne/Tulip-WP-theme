<?php
/**
 * The template for displaying search results pages.
 *
 * @package stackstar.
 */

get_header(); ?>
    <div class="search-container">
    <section id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
        <div class="search-page-form" id="ss-search-page-form">
            <?php get_search_form(); ?>
            </div>

        <?php if ( have_posts() ) : ?>

            <header class="page-header">
                <span class="search-page-title"><?php printf( esc_html__( 'نتائج البحث عن : %s', stackstar ), '<span>' . get_search_query() . '</span>' ); ?></span>
            </header><!-- .page-header -->
            <div class="main-search container">
            <?php /* Start the Loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="col-md-6 tulip-search">
            <span class="search-post-title"><?php the_title(); ?></span>
			<span>
				<a class="search-post-thumbnail" href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('', ['class' => 'img-responvise auto-height', 'title' => 'Post Image']) ?>
				</a>
			</span>
            <span class="search-post-excerpt">
				<?php the_excerpt(); ?>
			</span>
            <span class="search-post-link">
				<a href="<?php the_permalink(); ?>">
					تابع القراءة</a>
			</span>
                </div>
            <?php endwhile; ?>

            <?php //the_posts_navigation(); ?>

        <?php else : ?>

            <?php //get_template_part( 'template-parts/content', 'none' ); ?>

        <?php endif; ?>
            </div>
        </main><!-- #main -->
    </section><!-- #primary -->
</div>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>