<?php

/**
 * Template for displaying stories top headline
 *
 */
?>

<div class="row mb-5">
  <div class="col-md-12">
    <div class="card">
      <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" class="card-img-top" style="height: 300px; object-fit: cover;">
      <div class="card-body">
        <div class="card-body">
          <h3 class="text-truncate"><?php the_title() ?></h3>
          <p class="card-text"><?php the_excerpt(); ?></p>
          <a href="<?php echo get_permalink(); ?>">Read more...</a>
        </div>
      </div>
    </div>
  </div>
</div>