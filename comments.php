<?php
    if (comments_open()){ // check if comments are open ?>
    <h3 class="comments-count">
		<?php comments_number(
        '0 comments',
        '1 comment',
        '% comments'
    )?>
	</h3>
    <?php
        // hold comments list by ul
        echo '<ul class="list-unstyled comments-list">';
        // arguments for comments_list()
        $comments_arg = array(
            'max_depth'  => '3',
            'type'  => 'comment',
            'avatar_size'  => '84',
        );
        // show list of comments depends on
        // $comments_arg Array data
        wp_list_comments($comments_arg);
        echo '</ul>';
						 
        comment_form();
    } else {
        echo '<h2 class="comments-off-text">Sorry Comments Are-off</h2>';
    }
?>