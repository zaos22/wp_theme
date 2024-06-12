<?php
// comments.php

// Comprueba si hay comentarios
if (have_comments()) :
    // Muestra los comentarios
?>
    <div id="comments" class="comments-area">
        <h2 class="comments-title">
            <?php
            $comments_number = get_comments_number();
            if ('1' === $comments_number) {
                printf(esc_html__('1 Comment', 'textdomain'), number_format_i18n($comments_number));
            } else {
                printf(
                    esc_html(_nx('%1$s Comment', '%1$s Comments', $comments_number, 'comments title', 'textdomain')),
                    number_format_i18n($comments_number)
                );
            }
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style'      => 'ol',
                'short_ping' => true,
                'avatar_size' => 50, // Tamaño del avatar
                'callback' => 'custom_comment_template' // Función personalizada para mostrar el comentario
            ));
            ?>
        </ol>

        <?php the_comments_pagination(); ?>

        <?php if (!comments_open() && get_comments_number()) : ?>
            <p class="no-comments"><?php esc_html_e('Comments are closed.', 'textdomain'); ?></p>
        <?php endif; ?>
    </div>
<?php endif; ?>

<?php
// Muestra el formulario de comentarios
comment_form(array(
    'comment_notes_before' => '' // Oculta la parte "Conectado como zaos..."
));
?>