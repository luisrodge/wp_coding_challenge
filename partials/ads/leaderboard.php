<?php

/**
 * Template for displaying archive leaderboard ad
 *
 */
?>

<div class="ad-image-container">
  <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="" class="img-fluid leaderboard-img">
  <!-- <div class="ad-caption-container">
    <h4 class="ad-caption-text"><?php the_title(); ?></h4>
  </div> -->
</div>