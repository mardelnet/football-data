<div class='box'>
<h3>Delete All</h3>
<span>Delete all the competitions, teams and players.</span>
<hr>
<form action="<?php echo admin_url( 'admin.php' ); ?>?page=football_plugin" method="post">
    <input id="deleteall" name="deleteall" type="hidden" value="true">
    <input type="submit" value="Delete All" style='padding: 5px 10px'>
</form>

<?php  if ( $_POST['deleteall'] && $_POST['deleteall'] != '' ) : ?>
        
    <?php
    $allposts= get_posts( array(
        'post_type' => array( 'competition' , 'team' , 'player' ) ,
        'numberposts' => -1),
    );
    foreach ($allposts as $eachpost) {
        wp_delete_post( $eachpost->ID, true );
    }
    ?>

    <div class='alert'>
        <strong>All the data has been deleted!</strong>
    </div>
    
<?php endif; ?>

</div>