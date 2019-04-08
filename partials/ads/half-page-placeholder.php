<?php

/**
 * Template for displaying half page placeholder
 *
 * This is rendered when no half page ad is present.
 */
?>

<div class="card mb-5">
  <div class="card-header">
    <h4>Cannot find half page ad</h4>
  </div>
  <div class="card-body">
    <p>Make sure the ad exist and is properly tagged & categorized:</p>
    <p class="m-0"><strong>Category:</strong> <?php echo get_category(get_query_var('cat'))->name; ?></p>
    <p class="m-0"><strong>Tags:</strong> Half Page Ad, Right Sidebar</p>
  </div>
</div>