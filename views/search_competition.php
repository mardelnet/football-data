<div class='box'>
    <h3>Search Competition</h3>
    <form action="<?php echo admin_url( 'edit.php' ); ?>" method="get">
        <span>Takes a name and returns the corresponding competition:</span>
        <hr>
        <input id="s" name="s" type="text" value="">
        <input id="post_status" name="post_status" type="hidden" value="all">
        <input id="post_type" name="post_type" type="hidden" value="competition">
        <input id="action" name="action" type="hidden" value="-1">
        <input id="paged" name="paged" type="hidden" value="1">
        <input type="submit" value="Search" style='padding: 5px 10px'>
    </form>
</div>