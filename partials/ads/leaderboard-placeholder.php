<?php

/**
 * Template for displaying archive leaderboard placeholder
 *
 * This is rendered when no leaderboard ad is present.
 */
?>

<div class="card">
  <div class="card-header">
    <h4>Cannot find leaderboard ad</h4>
  </div>
  <div class="card-body">
    <p>Make sure the ad exist and is properly tagged & categorized:</p>
    <p class="m-0"><strong>Category:</strong> <?php echo get_category(get_query_var('cat'))->name; ?></p>
    <p class="m-0"><strong>Tag:</strong> Top Sidebar</p>
  </div>
</div>