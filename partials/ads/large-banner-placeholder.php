<?php

/**
 * Template for displaying large banner placeholder
 *
 * This is rendered when no large banner ad is present.
 */
?>

<div class="card ">
  <div class="card-header">
    <h4>Cannot find large banner ad</h4>
  </div>
  <div class="card-body">
    <p>Make sure the ad exist and is properly tagged & categorized:</p>
    <p class="m-0"><strong>Category:</strong> <?php echo get_category(get_query_var('cat'))->name; ?></p>
    <p class="m-0"><strong>Tags:</strong> Large Banner Ad, Right Sidebar</p>
  </div>
</div>