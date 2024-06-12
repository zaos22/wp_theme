<div class="contact contact-form-align">
    <div class="contact-slogan">
        <h1>
            Tell us, how we can help you?
        </h1>
        <h2>
            If you have any questions, do not hesitate to contact us.
        </h2>
        <h3>
            Don't think about it too much. Go ahead.
        </h3>
    </div>
    <div class="contact-form-space">
        <?php
        if (function_exists('do_shortcode')) {
            echo do_shortcode('[contact-form-7 id="d4619f6" title="Contact Form"]');
        } else {
            echo 'Shortcode function not available.';
        }
        ?>
    </div>
</div>
