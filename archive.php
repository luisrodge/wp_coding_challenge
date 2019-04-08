<?php

/**
 * Template for displaying collection of posts.
 *
 * This template displays a number of custom post types for `Ads` and `Stories`
 */

get_header(); ?>

<?php
$category = get_category(get_query_var('cat'));
$cat_id = $category->cat_ID;
?>


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
      <?php cc_get_leaderboard($cat_id); ?>
    </div>
  </div>

  <div class="row mt">
    <div class="col-md-8">
      <!-- TOP HEADLINE -->
      <?php cc_get_headline($cat_id) ?>
      <!-- STORIES -->
      <div class="row">
        <?php cc_get_stories($cat_id); ?>
      </div>
    </div>
    <!-- RIGHT SIDEBAR -->
    <div class="col-md-4 mb-5" id="right-sidebar">
      <!-- HALF PAGE AD -->
      <?php cc_get_right_sidebar($cat_id); ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>