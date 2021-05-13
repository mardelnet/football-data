<div class='box'>
    <h3>Import Players</h3>
    <form action="<?php echo admin_url( 'admin.php' ); ?>?page=football_plugin" method="post">
        <label for="impo_team">
            Import all the players from a specific team already imported to the database:
        </label>
        <hr>
        <?php $allposts= get_posts( array('post_type' => 'team' ,'numberposts' => -1, )); ?>
        <select name="impo_team" id="impo_team">
                <?php foreach( $allposts as $post ) : ?>
                    <option value="<?php echo get_post_meta( $post->ID )['api_id'][0]; ?>">
                        <?php echo get_the_title( $post ); ?>
                    </option>
                <?php endforeach; ?>
        </select>
        <input type="submit" value="Import" style='padding: 5px 10px'>
    </form>

    <?php if ( $_POST['impo_team'] && $_POST['impo_team'] != '' ) : ?>

        <?php
        $competition_id = $_POST['impo_team'];
        $import_players = new Player( $competition_id );
        $team_postID= get_posts( array(
            'post_type' => 'team' ,
            'numberposts' => 1, 
            'meta_key'   => 'api_id',
            'meta_value' => $competition_id,
        ));
        ?>        

        <div class='alert'>
            <strong>Data imported!</strong>
            <a href=" <?php echo get_edit_post_link( $team_postID[0]->ID ) ?> ">Check it now.</a>
        </div>

    <?php endif; ?>
</div>