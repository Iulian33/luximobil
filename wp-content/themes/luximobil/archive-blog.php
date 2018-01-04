<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Site Theme
 */

get_header(); ?>
<div class="mainContent">
    <div class="container">

        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>

                <article class="col-md-4 col-sm-6 col-xs-12 article-block"
                         id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <div class="col-sm-12 blog-image">
                        <?php if (has_post_thumbnail()) { ?>
                            <?php the_post_thumbnail('blog-thumbnail'); ?>
                        <?php } else { ?>
                            <?php $default_blog_image = get_field('default_blog_thumbnail', 'option'); ?>
                            <div class="blog-picture"
                                 style="background-image: url('<?php echo $default_blog_image['url']; ?>' );"></div>
                        <?php } ?>

                    </div>

                    <div class="text-content">

                        <header class="entry-header">
                            <?php the_title(sprintf('<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h1>'); ?>
                        </header><!-- .entry-header -->
                        <div class="entry-summary">
                            <?php the_excerpt(); ?>
                        </div><!-- .entry-summary -->
                    </div>
                </article><!-- #post-## -->

            <?php endwhile; ?>
            <?php the_posts_navigation(); ?>
        <?php else : ?>
            <?php get_template_part('content', 'none'); ?>
        <?php endif; ?>

    </div>
</div><!--mainContent-->
<?php get_footer(); ?>
