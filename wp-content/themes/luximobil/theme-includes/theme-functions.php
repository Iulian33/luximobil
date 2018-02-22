<?php
/**
 * Jolian Hook Theme Functions
 *
 */

function siteFavicon() {
    $favicon = get_field('site_favicon', 'option');

    if ($favicon) {
        $fav_url = $favicon['url'];
    } else {
        $fav_url = get_template_directory_uri() . "/images/Jh-insign.png";
    }

    return '<link rel="shortcut icon" href="' . $fav_url . '">';
}

function imobilOnlyTitle() {
    if (is_singular('imobil')) {
        return '<title> Lux Imobil &#8211; Imobil</title> ';
    }
}


function siteLogo() {
    $site_logo = get_field('site_logo', 'option');
    if (!$site_logo) {
        $img_src = get_template_directory_uri() . "/images/default-logo.png";
    } else {
        $img_src = $site_logo['url'];
    }
    return '<img src = "' . $img_src . '" alt="site-logo" />';
}

function my_content($limit, $text = false, $word = false) {
    if (!$word) {
        $word = __('Read more', 'jhfw');
    }
    if ($text) {
        $content = $text;
    } else {
        $content = get_the_content();
    }
    $content = strip_tags($content);
    $content = explode(" ", $content);
    if (count($content) > $limit) {
        $trim = true;
    } else {
        $trim = false;
    }
    $content = array_slice($content, 0, $limit, true);
    if ($trim) {
        $index = count($content) - 1;
        $last = $content[$index];
        if ($word) {
            $last = $last . ' ' . $word;
        }
        $content[$index] = $last;
    }
    $content = implode(" ", $content);
    return $content;
}

function JHCredits() {
    $creditsText = '<a href="http://julianhook.com/" target="_blank">' . __('Developed by Julian Hook', 'jhfw') . '</a>';
    echo $creditsText;
}

function related_products($custom_post_type, $custom_taxonomy, $nr_posts) {
    global $post;
    $post_terms = array();
    $taxonomy = $custom_taxonomy;
    $terms = wp_get_post_terms($post->ID, $taxonomy);
    foreach ($terms as $term) {
        $post_terms[] = $term->term_id;
    }
    $posts_per_page = $nr_posts;
    $args = array(
        'posts_per_page' => $posts_per_page,
        'orderby' => 'date',
        'post_status' => 'publish',
        'post_type' => $custom_post_type,
        'post__not_in' => array($post->ID),
        'tax_query' => array(
            array(
                'taxonomy' => $taxonomy,
                'field' => 'id',
                'terms' => $post_terms
            ),
        )
    );
    $all_posts = new WP_Query($args);
    return $all_posts->posts;
}

//custom query pagination
if (!function_exists('custom_paging_nav')) :

    function custom_paging_nav($custom_query) {
        global $wp_rewrite;

        // Don't print empty markup if there's only one page.
        if ($custom_query->max_num_pages < 2) {
            return;
        }
        $paged = get_query_var('paged') ? intval(get_query_var('paged')) : 1;
        $pagenum_link = html_entity_decode(get_pagenum_link());
        $query_args = array();
        $url_parts = explode('?', $pagenum_link);

        if (isset($url_parts[1])) {
            wp_parse_str($url_parts[1], $query_args);
        }

        $pagenum_link = remove_query_arg(array_keys($query_args), $pagenum_link);
        $pagenum_link = trailingslashit($pagenum_link) . '%_%';
        $format = $wp_rewrite->using_index_permalinks() && !strpos($pagenum_link, 'index.php') ? 'index.php/' : '';
        $format .= $wp_rewrite->using_permalinks() ? user_trailingslashit($wp_rewrite->pagination_base . '/%#%', 'paged') : '?paged=%#%';

        // Set up paginated links.
        $links = paginate_links(array(
            'base' => $pagenum_link,
            'format' => $format,
            'total' => $custom_query->max_num_pages,
            'current' => $paged,
            'mid_size' => 1,
            'add_args' => array_map('urlencode', $query_args),
            'prev_text' => __('<i class="fa fa-chevron-left"></i>', 'twentyfourteen'),
            'next_text' => __('<i class="fa fa-chevron-right"></i>', 'twentyfourteen'),
        ));

        if ($links) : ?>

            <nav class="navigation paging-navigation" role="navigation">
                <div class="screen-reader-text"><?php _e('Posts navigation', 'twentyfourteen'); ?></div>
                <div class="pagination loop-pagination">
                    <?php echo $links; ?>
                </div><!-- .pagination -->
            </nav><!-- .navigation -->

        <?php endif;
    }
endif;

//default pagination
if (!function_exists('default_paging_nav')) :
    function default_paging_nav() {
        global $wp_query, $wp_rewrite;
        if ($wp_query->max_num_pages < 2) {
            return;
        }
        $paged = get_query_var('paged') ? intval(get_query_var('paged')) : 1;
        $pagenum_link = html_entity_decode(get_pagenum_link());
        $query_args = array();
        $url_parts = explode('?', $pagenum_link);

        if (isset($url_parts[1])) {
            wp_parse_str($url_parts[1], $query_args);
        }

        $pagenum_link = remove_query_arg(array_keys($query_args), $pagenum_link);
        $pagenum_link = trailingslashit($pagenum_link) . '%_%';
        $format = $wp_rewrite->using_index_permalinks() && !strpos($pagenum_link, 'index.php') ? 'index.php/' : '';
        $format .= $wp_rewrite->using_permalinks() ? user_trailingslashit($wp_rewrite->pagination_base . '/%#%', 'paged') : '?paged=%#%';

        // Set up paginated links.
        $links = paginate_links(array(
            'base' => $pagenum_link,
            'format' => $format,
            'total' => $wp_query->max_num_pages,
            'current' => $paged,
            'mid_size' => 1,
            'add_args' => array_map('urlencode', $query_args),
            'prev_text' => __('&larr; Previous', 'twentyfourteen'),
            'next_text' => __('Next &rarr;', 'twentyfourteen'),
        ));

        if ($links) : ?>

            <nav class="navigation paging-navigation" role="navigation">
                <div class="screen-reader-text"><?php _e('Posts navigation', 'twentyfourteen'); ?></div>
                <div class="pagination loop-pagination">
                    <?php echo $links; ?>
                </div>
            </nav>

        <?php endif;
    }
endif;