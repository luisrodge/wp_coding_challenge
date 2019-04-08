<?php

/**
 * Template for displaying stories preview
 *
 */
?>

<div class="col-md-4 mb-5 d-flex align-items-stretch">
  <div class="card">
    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" class="card-img-top img-height-md">
    <div class="card-body">
      <h5 class="card-title text-truncate"><?php the_title(); ?></h5>
      <h6 class="text-truncate text-normal"><?php the_excerpt() ?></h6>
      <a href="<?php echo get_permalink(); ?>">Read more...</a>
    </div>
  </div>
</div>