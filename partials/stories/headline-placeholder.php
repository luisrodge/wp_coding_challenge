<?php

/**
 * Template for displaying top headline placeholder
 *
 * This is rendered when no headline is present.
 */
?>

<div class="card mb-5">
  <div class="card-header">
    <h4>Cannot find top headline story</h4>
  </div>
  <div class="card-body">
    <p>Make sure the story exist and is properly tagged & categorized:</p>
    <p class="m-0"><strong>Category:</strong> <?php echo get_category(get_query_var('cat'))->name; ?></p>
    <p class="m-0"><strong>Tag:</strong> Top Headline</p>
  </div>
</div>