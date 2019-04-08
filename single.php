<?php 

/**
 * Template for displaying a specific (single) post.
 *
 * This template is used to display a single post type, `Story`.
 * It also renders content for posts of the `Ad` type.
 */

get_header(); ?>


<div class="container pt-5 pb-5">
  <!-- TOP SIDEBAR -->
  <div class="row mb-5">
    <!-- LOGO -->
    <div class="col-md-2">
      <div class="content-logo">
      </div>
    </div>

    <!-- LEADERBOARD AD -->
    <div class="col-md-10">
      <?php 
      $top_sb_ads = array(
        'post_type' => 'ads',
        'cat' => $cat_id,
        'posts_per_page' => 1,
        'tag' => 'top-sidebar'
      );
      $top_sb_ads_query = new WP_Query($top_sb_ads);
      while ($top_sb_ads_query->have_posts()) : $top_sb_ads_query->the_post(); ?>
        <?php get_template_part('/partials/ads/leaderboard'); ?>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
  </div>

  <div class="row mt">
    <div class="col-md-8">
      <!-- TOP HEADLINE -->
      <div class="row mb-5">
        <div class="col-md-12">
          <div class="card">
            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" class="card-img-top" style="height: 300px;">
            <div class="card-body">
              <div class="card-body">
                <h3 class="card-title"><?php the_title() ?></h3>
                <p class="card-text"><?php the_excerpt(); ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- STORY DETAILS -->
      <div class="row">
        <div class="col-md-12">
          <?php the_content() ?>
        </div>
      </div>
    </div>
    <!-- RIGHT SIDEBAR -->
    <div class="col-md-4 mb-5" id="right-sidebar">
      <!-- HALF PAGE AD -->
      <?php
      $half_page_ad = array(
        'post_type' => 'ads',
        'posts_per_page' => 2,
        'tax_query'      => array(
          'relation'   => 'AND',
            array(
                'taxonomy'  => 'post_tag',
                'field'     => 'slug',
                'terms'     => array('right-sidebar', 'half-page-ad'),
                'operator' => 'AND',
                'include_children' => false,
            ),
        )
      );
      $half_page_ad_query = new WP_Query($half_page_ad); 
      ?>
      <?php while ($half_page_ad_query->have_posts()) : $half_page_ad_query->the_post();?>
        <?php get_template_part('/partials/ads/half-page'); ?>
      <?php endwhile; ?>

      <!-- LARGE BANNER AD -->
      <?php
      $half_page_ad = array(
        'post_type' => 'ads',
        'posts_per_page' => 2,
        'tax_query'      => array(
          'relation'   => 'AND',
            array(
                'taxonomy'  => 'post_tag',
                'field'     => 'slug',
                'terms'     => array('right-sidebar', 'large-banner-ad'),
                'operator' => 'AND',
                'include_children' => false,
            ),
        )
      );
      $half_page_ad_query = new WP_Query($half_page_ad); 
      ?>
      <?php while ($half_page_ad_query->have_posts()) : $half_page_ad_query->the_post();?>
        <?php get_template_part('/partials/ads/large-banner'); ?>
      <?php endwhile; ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>