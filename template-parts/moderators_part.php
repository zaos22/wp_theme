<li class="card">
    <?php the_post_thumbnail(); ?>
    <div class="content">
        <a href="<?php the_permalink(); ?>">
            <h3><?php the_title(); ?></h3>
        </a>
        <?php
        // Retrieve the custom field values
        $joined_in = get_field('joined_in');
        $date = get_field('date');
        ?>
        <p><?php echo $joined_in; ?> - <?php echo $date; ?></p>
    </div>
</li>