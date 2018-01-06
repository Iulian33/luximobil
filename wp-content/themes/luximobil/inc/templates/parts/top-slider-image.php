<?php global $post ?>

<?php var_dump(wp_get_attachment_image($post->ID)); ?>
<div class="headerImage">
    <?php if (get_field('header_type') != 'None') { ?>
        <?php $pageImage = get_field('header_image', get_the_ID());
        if ($pageImage) { ?>
            <div class="pageImage" style="background-image: url(<?php echo $pageImage['url']; ?>);"></div>
        <?php } else if (is_singular('blog')) { ?>
            <?php if (get_the_post_thumbnail_url($post->ID)) { ?>
                <div class="pageImage"
                     style="background-image:url(<?php echo get_the_post_thumbnail_url($post->ID); ?>); ">
                </div>
            <?php } else { ?>
                <?php $defaultImage = get_field('standard_header_image', 'option'); ?>
                <div class="pageImage" style="background-image: url(<?php echo $defaultImage['url']; ?>);"></div>
            <?php } ?>
        <?php } else { ?>
            <?php $defaultImage = get_field('standard_header_image', 'option'); ?>
            <div class="pageImage" style="background-image: url(<?php echo $defaultImage['url']; ?>);"></div>
        <?php } ?>
    <?php } ?>
</div>