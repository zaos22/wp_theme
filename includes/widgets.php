<?php

if (!defined('ABSPATH')) die();

class TheTopic_Moderators_Widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            'thetopic_widget',
            esc_html__('TheTopic Moderators', 'thetopic'),
            array('description' => esc_html__('Add Moderators as Widget', 'thetopic'),)
        );
    }

    public function widget($args, $instance)
    {
?>
        <ul class="moderator-sidebar">
            <?php
            $args = array(
                'post_type' => 'thetopic_moderators',
                'post_per_page' => $instance['quantity'],
                'order' => 'ASC',
                'orderby' => 'title'
            );

            $moderators = new WP_Query($args);
            while ($moderators->have_posts()) {
                $moderators->the_post();
            ?>
                <li>
                    <div class="image">
                        <?php the_post_thumbnail('thumbnail'); ?>
                    </div>
                    <div class="content-moderator">
                        <a href="<?php the_permalink(); ?>">
                            <h3><?php the_title(); ?></h3>
                        </a>
                        <?php $joinedInDate = get_field('date'); ?>
                        <p><?php the_field('joined_in'); ?> - <?php echo $joinedInDate; ?></p>
                    </div>
                </li>
            <?php
            }
            wp_reset_postdata();
            ?>
        </ul>
    <?php
    }

    public function form($instance)
    {
        $quantity = !empty($instance['quantity']) ? $instance['quantity'] : esc_html('How many Moderators do you want to show?');
    ?>
        <p>
            <label for="<?php esc_attr($this->get_field_id('quantity')); ?>">
                <?php esc_attr_e('How many Moderators do you want to show?'); ?>
            </label>
            <input class="widefat" id="<?php esc_attr($this->get_field_id('quantity')); ?>" name="<?php esc_attr($this->get_field_name('quantity')); ?>" type="number" value="<?php echo esc_attr($quantity); ?>" />
        </p>

<?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['quantity'] = (!empty($new_instance['quantity'])) ? sanitize_text_field($new_instance['quantity']) : '';
        return $instance;
    }
}

function thetopic_registrar_widget()
{
    register_widget('TheTopic_Moderators_Widget');
}
add_action('widgets_init', 'thetopic_registrar_widget');
