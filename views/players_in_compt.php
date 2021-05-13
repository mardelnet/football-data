<div class='box'>
    <h3>Players in League</h3>
    <span>
        Returns the players that belong to all teams participating in the given league.
    </span>
    <hr>
    <?php $allposts= get_posts( array('post_type' => 'competition' ,'numberposts' => -1, )); ?>
    <select onchange="location = this.value;">
        <?php foreach( $allposts as $post ) : ?>
            <option value="<?php echo get_edit_post_link( $post->ID ); ?>">
                <?php echo get_the_title( $post ); ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>