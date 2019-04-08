<?php

function load_stylesheets()
{
  wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all');
  wp_enqueue_style('bootstrap');

  wp_register_style('style', get_template_directory_uri() . '/style.css', array(), false, 'all');
  wp_enqueue_style('style');
}
add_action('wp_enqueue_scripts', 'load_stylesheets');

function load_jquery()
{
  wp_deregister_script('jquery');

  wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-3.1.3.min.js', '', 1, true);

  add_action('wp_enqueue_scripts', 'jquery');
}
add_action('wp_enqueue_scripts', 'load_jquery');

function loadjs()
{
  wp_register_script('customjs', get_template_directory_uri() . '/js/scripts.js', '', 1, true);
  wp_enqueue_script('customjs');
}
add_action('wp_enqueue_scripts', 'loadjs');

function ad_post_type()
{
  $labels = array(
    'name' => 'Ads',
    'singular_name' => 'Ad',
    'add_new' => 'Add Ad',
    'all_items' => 'All Ads',
    'add_new_item' => 'Add Ad',
    'edit_item' => 'Edit Ad',
    'new_item' => 'New Ad',
    'view_item' => 'View Ad',
    'search_item' => 'Search Ads',
    'not_found' => 'No ads found',
    'not_found_in_trash' => 'No ads found in trash',
    'parent_item_colon' => 'Parent Ad',
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'has_archive' => true,
    'publicly_queryable' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'supports' => array(
      'title',
      'editor',
      'excerpt',
      'thumbnail',
      'revisions'
    ),
    'taxonomies' => array('category', 'post_tag'),
    'menu_position' => 5,
    'exclude_from_search' => false
  );
  register_post_type('ads', $args);
}
add_action('init', 'ad_post_type');

function story_post_type()
{
  $labels = array(
    'name' => 'Stories',
    'singular_name' => 'Story',
    'add_new' => 'Add Story',
    'all_items' => 'All Stories',
    'add_new_item' => 'Add Story',
    'edit_item' => 'Edit Story',
    'new_item' => 'New Story',
    'view_item' => 'View Story',
    'search_item' => 'Search Stories',
    'not_found' => 'No stories found',
    'not_found_in_trash' => 'No stories found in trash',
    'parent_item_colon' => 'Parent Story',
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'has_archive' => true,
    'publicly_queryable' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'supports' => array(
      'title',
      'editor',
      'excerpt',
      'thumbnail',
      'revisions'
    ),
    'taxonomies' => array('category', 'post_tag'),
    'menu_position' => 3,
    'exclude_from_search' => false
  );
  register_post_type('stories', $args);
}
add_action('init', 'story_post_type');

add_theme_support('menus');
add_theme_support('post-thumbnails');

register_nav_menus(
  array(
    'top-menu' => __('Top Menu', 'theme'),
    'footer-menu' => __('Footer Menu', 'theme'),
  )
);

add_image_size('smallest', 300, 300, true);
add_image_size('largest', 800, 800, true);

/**
 * Get Leaderboard 
 */
function cc_get_leaderboard($cat_id)
{
  $top_sb_ads = array(
    'post_type' => 'ads',
    'cat' => $cat_id,
    'posts_per_page' => 1,
    'tag' => 'top-sidebar'
  );

  $top_sb_ads_query = new WP_Query($top_sb_ads);
  if ($top_sb_ads_query->have_posts()) {
    while ($top_sb_ads_query->have_posts()) : $top_sb_ads_query->the_post();
      get_template_part('/partials/ads/leaderboard');
    endwhile;
  } else {
    get_template_part('/partials/ads/leaderboard-placeholder');
  }
}

/**
 * Get Headline Story Post
 */
function cc_get_headline($cat_id)
{
  $top_hl_post = array(
    'post_type' => 'stories',
    'cat' => $cat_id,
    'posts_per_page' => 1,
    'tag' => 'top-headline'
  );
  $top_hl_post_query = new WP_Query($top_hl_post);
  if ($top_hl_post_query->have_posts()) {
    while ($top_hl_post_query->have_posts()) : $top_hl_post_query->the_post();
      get_template_part('/partials/stories/headline');
    endwhile;
  } else {
    get_template_part('/partials/stories/headline-placeholder');
  }
}

/**
 * Get Story Preview
 */
function cc_get_stories($cat_id)
{
  $tag = get_term_by('name', 'Top Headline', 'post_tag');
  $args_latest = array(
    'post_type' => 'stories',
    'cat' => $cat_id,
    'posts_per_page' => 6,
    'tag__not_in' => array($tag->term_id)
  );
  $the_query = new WP_Query($args_latest);
  if ($the_query->have_posts()) {
    while ($the_query->have_posts()) : $the_query->the_post();
      get_template_part('/partials/stories/story');
    endwhile;
  } else {
    get_template_part('/partials/stories/story-placeholder');
  }
}

/**
 * Get Right Side Bar
 */
function cc_get_right_sidebar($cat_id)
{
  // HALF PAGE AD 

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
      array(
        'taxonomy'  => 'category',
        'field'     => 'cat',
        'terms'     => array($cat_id),
        'operator' => 'IN',
        'include_children' => false,
      ),
    )
  );
  $half_page_ad_query = new WP_Query($half_page_ad);
  if ($half_page_ad_query->have_posts()) {
    while ($half_page_ad_query->have_posts()) : $half_page_ad_query->the_post();
      get_template_part('/partials/ads/half-page');
    endwhile;
  } else {
    get_template_part('/partials/ads/half-page-placeholder');
  }

  // LARGE BANNER AD 
  $large_banner_ad = array(
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
      array(
        'taxonomy'  => 'category',
        'field'     => 'cat',
        'terms'     => array($cat_id),
        'operator' => 'IN',
        'include_children' => false,
      ),
    )
  );
  $large_banner_ad_query = new WP_Query($large_banner_ad);
  if ($large_banner_ad_query->have_posts()) {
    while ($large_banner_ad_query->have_posts()) : $large_banner_ad_query->the_post();
      get_template_part('/partials/ads/large-banner');
    endwhile;
  } else {
    get_template_part('/partials/ads/large-banner-placeholder');
  }
}
