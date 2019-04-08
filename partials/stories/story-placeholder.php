<?php

/**
 * Template for displaying story preview placeholder
 *
 * This is rendered when no story is present.
 */
?>

<div class="col-md-4 mb-5 d-flex align-items-stretch">
  <div class="card mb-5">
    <div class="card-header">
      <h4>No story present</h4>
    </div>
    <div class="card-body">
      <p>Make sure a story exist and is properly categorized:</p>
      <p class="m-0"><strong>Category: </strong> <?php echo get_category(get_query_var('cat'))->name; ?></p>
    </div>
  </div>
</div>