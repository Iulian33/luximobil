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
    <div class="container blog-content-archive">

        <h1 class="main-blog-heading">
            <?php _e('Blog', 'jhfw'); ?>
        </h1>

        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article class="col-md-4 col-sm-6 col-xs-12"
                         id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <a href="<?php the_permalink(); ?>">

                    <div class="article-block">
                        <div class="col-sm-12 blog-image">
                            <?php if (has_post_thumbnail()) { ?>
                                <?php the_post_thumbnail('blog-thumbnail'); ?>
                            <?php } else { ?>
                                <?php $default_blog_image = get_template_directory_uri().'/images/default-img.png'?>
                                <div class="default-blog-picture"
                                     style="background-image: url('<?php echo $default_blog_image; ?>' );"></div>
                            <?php } ?>
                        </div>

                        <div class="text-content">

                            <header class="entry-header">
                                <h1 class="entry-title"><?php the_title(); ?></h1>
                            </header><!-- .entry-header -->
                            <div class="entry-summary">
                                <?php the_excerpt(); ?>
                            </div><!-- .entry-summary -->
                        </div>
                    </div>
                    </a>
                </article><!-- #post-## -->

            <?php endwhile; ?>
            <?php the_posts_navigation(); ?>
        <?php else : ?>
            <?php get_template_part('content', 'none'); ?>
        <?php endif; ?>

    </div>
</div><!--mainContent-->
<?php get_footer(); ?>
