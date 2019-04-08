<?php 

/**
 * Template for displaying homepage content
 *
 * This template displays the most recent heandline story as
 * well as the six most recent stories.
 */

get_header(); ?>

<div class="container pt-5 pb-5">
  <div class="row mt">
    <div class="col-md-12">
      <!-- TOP HEADLINE -->
      <?php
      $top_hl_post = array(
        'post_type' => 'stories',
        'posts_per_page' => 1,
        'tag' => 'top-headline'
      );
      $top_hl_post_query = new WP_Query($top_hl_post); 
      ?>
      <?php while ($top_hl_post_query->have_posts()) : $top_hl_post_query->the_post(); ?>
        <?php get_template_part('/partials/stories/headline'); ?>
      <?php endwhile; ?>
      <!-- STORIES -->
      <div class="row">
        <?php
        $tag = get_term_by('name', 'Top Headline', 'post_tag');
        $args_latest = array(
          'post_type' => 'stories',
          'posts_per_page' => 6,
          'tag__not_in' => array($tag->term_id)
        );
        $the_query = new WP_Query($args_latest);
        ?>
        
        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
          <?php get_template_part('/partials/stories/story'); ?>
        <?php endwhile; ?>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>