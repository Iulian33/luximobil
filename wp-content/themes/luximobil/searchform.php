<form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
    <label>
        <span class="screen-reader-text"><?php echo _x('Caută :', 'jhfw') ?></span>
        <input type="search" class="search-field"
               placeholder="<?php echo esc_attr_x('Caută Imobil ...', 'jhfw') ?>"
               value="<?php echo get_search_query() ?>" name="s"
               title="<?php echo esc_attr_x('Search for:', 'jhjw') ?>"/>
        <input type="hidden" name="post_type" value="imobil"/>
    </label>
    <button type="submit" class="search-submit">
        <i class="fa fa-search"></i>
    </button>
</form>