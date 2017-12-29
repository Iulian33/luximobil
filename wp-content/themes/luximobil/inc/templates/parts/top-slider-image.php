<div class="headerImage">
    <?php if (get_field('header_type') != 'None') { ?>
        <?php $pageImage = get_field('header_image', get_the_ID());
        if ($pageImage) { ?>
            <div class="pageImage">
                <img src="<?php echo $pageImage['url']; ?>" alt="<?php the_title(); ?>">
            </div>
        <?php } else {
            $defaultImage = get_field('standard_header_image', 'option'); ?>
            <div class="pageImage">
                <img src="<?php echo $defaultImage['url']; ?>" alt="<?php the_title(); ?>">
            </div>
        <?php } ?>
    <?php } ?>
</div>