<?php
global $post;
// Headings Variabile
$hero_heading = get_field('hero_heading');
$hero_heading_imobil = get_field('imobil_hero_title','option');
$hero_heading_blog = get_field('blog_hero_title','option');

//Backgrounds Variabiles
$pageImage = get_field('header_image', get_the_ID());
$imobilImageBG = get_field('imobil_hero_bg','option');
$blogImageBG = get_field('blog_hero_bg','option');
$defaultImage = get_field('standard_header_image', 'option');
?>
<div class="headerImage">
    <?php if (get_field('header_type') != 'None') { ?>
        <?php if ($pageImage) { ?>
            <div class="pageImage" style="background-image: url(<?php echo $pageImage['url']; ?>);">
                <div class="content-inner">
                    <div class="container">
                        <h1 class="hero-title">
                            <?php echo $hero_heading; ?>
                        </h1>
                    </div>
                </div>
            </div>
        <?php } elseif (is_post_type_archive('imobil')) { ?>
            <div class="pageImage" style="background-image: url(<?php echo $imobilImageBG['url']; ?>);">
                <div class="content-inner">
                    <div class="container">
                        <h1 class="hero-title">
                            <?php echo $hero_heading_imobil; ?>
                        </h1>
                    </div>
                </div>
            </div>
        <?php } elseif (is_post_type_archive('blog')) { ?>
            <div class="pageImage" style="background-image: url(<?php echo $blogImageBG['url']; ?>);">
                <div class="content-inner">
                    <div class="container">
                        <h1 class="hero-title">
                            <?php echo $hero_heading_blog; ?>
                        </h1>
                    </div>
                </div>
            </div>
        <?php } elseif (is_singular('blog')) { ?>
            <?php if (get_the_post_thumbnail_url($post->ID)) { ?>
                <div class="pageImage"
                     style="background-image:url(<?php echo get_the_post_thumbnail_url($post->ID); ?>); ">
                </div>
            <?php } else { ?>
                <div class="pageImage" style="background-image: url(<?php echo $defaultImage['url']; ?>);">
                </div>
            <?php } ?>
        <?php } else { ?>
            <div class="pageImage" style="background-image: url(<?php echo $defaultImage['url']; ?>);"></div>
        <?php } ?>
    <?php } ?>
</div>