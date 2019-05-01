<?php

    add_filter( 'genesis_title_comments', function() {
        if ( '1' == get_comments_number() ) {
            $comment_count = '1 Comment';
        } else {
            $comment_count = sprintf( '%s Comments', get_comments_number() );
        }

        return sprintf( '<h3 class="comments-title">%s</h3>', $comment_count );
    } );

    add_action( 'genesis_list_comments', function() {
        $args = array(
            'type'        => 'comment',
            'avatar_size' => 96,
            'callback'    => 'sc2019_show_comment'
        );

        $args = apply_filters( 'genesis_comment_list_args', $args );

        wp_list_comments( $args );
    } );

    function sc2019_show_comment( $comment, $args, $depth ) {
        $GLOBALS['comment'] = $comment;
        ?>
        <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
            <?php do_action( 'genesis_before_comment' ); ?>
            <article class="comment-body">
                <header class="comment-header">
                    <?php echo get_avatar( $comment, $args['avatar_size'] ); ?>
                    <cite class="fn"><?php echo get_comment_author_link(); ?></cite>
                </header>

                <div class="comment-content">
                    <p class="comment-time"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><?php echo get_comment_date() . ', ' . get_comment_time(); ?></a>

                    <div class="comment-text">
                        <?php if ( '1' !== $comment->comment_approved ) : ?>
                            <p class="awaiting-moderation">Your comment is awaiting moderation.</p>
                        <?php
                        endif;

                        if ( '0' !== $comment->comment_parent ) : ?>
                            <p class="comment-parent">In reply to <a href="<?php echo esc_url( get_comment_link( $comment->comment_parent ) ); ?>"><?php echo get_comment_author_link( $comment->comment_parent ); ?></a></p>
                        <?php
                        endif;

                        comment_text();
                        ?>

                        <div class="comment-actions">
                            <?php
                            comment_reply_link( array_merge( $args, array(
                                'depth'      => $depth,
                                'max_depth'  => $args['max_depth'],
                                'reply_text' => 'Reply <span class="screen-reader-text">to ' . get_comment_author() . '</span>'
                            ) ) );

                            if ( get_edit_comment_link() ) :
                            ?>
                                <span class="sep"> / </span>
                                <?php edit_comment_link( 'Edit' );
                            endif;
                            ?>
                        </div><!-- .comment-actions -->
                    </div><!-- .comment-body -->
                </div><!-- .comment-content -->
            </article>
    <?php
    }
