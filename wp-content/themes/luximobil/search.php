<?php
/**
 * The template for displaying Search archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Site Theme
 */

get_header(); ?>
<div class="mainContent">
    <div class="container">
        <div class="col-sm-3">
            <?php echo  do_shortcode('[searchandfilter id="418"]');?>
        </div>
        <div class="col-sm-9 products-results">
            <?php if ( have_posts() ) : ?>
                <?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

                            <?php if ( 'post' == get_post_type() ) : ?>
                                <div class="entry-meta">
                                    <?php JH_posted_on(); ?>
                                </div><!-- .entry-meta -->
                            <?php endif; ?>
                        </header><!-- .entry-header -->


                        <footer class="entry-footer">
                            <?php JH_entry_footer(); ?>
                        </footer><!-- .entry-footer -->
                    </article><!-- #post-## -->

                <?php endwhile; ?>
                <?php the_posts_navigation(); ?>
            <?php else : ?>
                <?php get_template_part( 'content', 'none' ); ?>
            <?php endif; ?>
        </div>
    </div>
</div><!--mainContent-->
<?php get_footer(); ?>
