<div class='box'>
    <h3>Import Competitions</h3>
    <form action="<?php echo admin_url( 'admin.php' ); ?>?page=football_plugin" method="post">
        <span>Import all the teams competitions:</span>
        <hr>
        <input id="compts" name="compts" type="hidden" value="true">
        <input type="submit" value="Import" style='padding: 5px 10px'>
    </form>

    <?php if ( $_POST['compts'] && $_POST['compts'] != '' ) : ?>

        <?php
        $competition_id = $_POST['compts'];
        $import_competitions = new Competition( $competition_id );
        ?>        

        <div class='alert'>
        <strong>Data imported!</strong>
            <a href='/wp-admin/edit.php?post_type=competition'>Check it now.</a>
        </div>

    <?php endif; ?>
</div>