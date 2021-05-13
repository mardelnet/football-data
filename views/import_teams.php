<div class='box'>
    <h3>Import Teams</h3>
    <form action="<?php echo admin_url( 'admin.php' ); ?>?page=football_plugin" method="post">
        <label for="leagues">
            Import all the teams of the following tournament:
        </label>
        <hr>
        <?php include('select_compt.php'); ?>
        <input type="submit" value="Import" style='padding: 5px 10px'>
    </form>

    <?php if ( $_POST['leagues'] && $_POST['leagues'] != '' ) : ?>

        <?php
        $competition_id = $_POST['leagues'];
        $import_teams = new Team( $competition_id );
        
        $comp_postID= get_posts( array(
            'post_type' => 'competition',
            'numberposts' => 1, 
            'meta_key'   => 'comp',
            'meta_value' => $competition_id,
        ));
        ?>
        
        <div class='alert'>
            <strong>Data imported!</strong>
            <a href=" <?php echo get_edit_post_link( $comp_postID[0]->ID ) ?> ">Check it now.</a>
        </div>

    <?php endif; ?>
</div>