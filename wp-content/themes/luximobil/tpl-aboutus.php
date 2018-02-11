<?php
/*
 *Template Name: About Us
*/
get_header();
$groupPhoto = get_field('image_all_group');
?>
<div class="main-content-about-us">
    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                <img class="group-photo"
                     src="<?php echo $groupPhoto['url']; ?>"
                     alt="<?php echo $groupPhoto['alt']; ?>">
            </div>
            <div class="col-sm-7">
                <h1><?php the_title(); ?></h1>
                <div class="company-description">
                    <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile; endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
