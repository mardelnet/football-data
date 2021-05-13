<div class='box'>
    <h3>Players in League</h3>
    <form action="<?php echo admin_url( 'admin.php' ); ?>?page=football_plugin" method="post">
        <label for="leagues">
            Returns the players that belong to all teams participating in the given league.
        </label>
        <hr>
        <?php include('select_compt.php'); ?>
        <input type="submit" value="Run" style='padding: 5px 10px'>
    </form>
</div>