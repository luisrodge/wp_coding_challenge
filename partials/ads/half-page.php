<?php

/**
 * Template for displaying right sidebar half page ad
 *
 */
?>

<div class="row mb-5">
  <div class="col-md-12">
    <div class="ad-image-container">
      <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="" class="img-fluid" id="half-page-ad-img">
      <!-- <div class="ad-caption-container">
        <h4 class="ad-caption-text"><?php the_title(); ?></h4>
      </div> -->
    </div>
  </div>
</div>