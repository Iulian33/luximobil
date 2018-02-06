<?php

/**
 * Google Map Widget
 */


function google_map_widget_init()
{
    register_widget('google_map_widget');
}

add_action('widgets_init', 'google_map_widget_init');


class google_map_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'google_map',
            __('Google Map', 'jhfw'),
            array(
                'description' => __('Widget That display Google Map', 'jhfw'),
            )
        );
    }

    // Front End
    public function widget($args, $instance) {

        $title = apply_filters('widget_title', $instance['title']);
        $widget_ID = $args['widget_id'];


        echo $args['before_widget'];
        if (!empty($title)) {
            echo $args['before_title'] . '<h1 class="widget_title">' . $title . '</h1>' . $args['after_title'];
        }

        $location = get_field('google_map_adress', 'widget_' . $widget_ID);;
        if( !empty($location) ): ?>
        <div class="acf-map">
            <div class="marker"
                 data-lat="<?php echo $location['lat']; ?>"
                 data-lng="<?php echo $location['lng']; ?>">
            </div>
        </div>
        <?php endif; ?>

    <?php }

    // Widget Backend
    public function form($instance) {

        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = '';
        } ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
        </p>

    <?php }

    // Updating Widget
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
}