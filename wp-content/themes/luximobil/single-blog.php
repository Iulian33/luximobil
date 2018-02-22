<?php
/**
 * Template for Single Blog post
 */

get_header(); ?>
<div id="primary" class="mainContent">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <main id="main" class="site-main" role="main">
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="blog-text-block">
                            <div class="row">
                                <h1 class="blog-heading col-sm-4 col-md-4">
                                    <?php the_title(); ?>
                                </h1>
                                <article class="main-text col-sm-8 col-md-8">
                                    <?php the_content(); ?>
                                </article>
                            </div>
                            <div class="row">
                                <div class="video col-sm-12">
                                    <?php the_field('page_video'); ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </main>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
