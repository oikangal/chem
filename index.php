<?php
/* Fallback index (required by WP). Uses archive loop layout. */
get_header(); ?>
<div class="main">
  <section class="results" style="grid-column:1/-1">
    <header><h1><?php bloginfo('name'); ?></h1></header>
    <div class="grid">
      <?php if (have_posts()): while (have_posts()): the_post(); ?>
        <article class="card">
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <div class="meta"><?php the_time('M j, Y'); ?> • <?php the_category(', '); ?></div>
          <div><?php the_excerpt(); ?></div>
        </article>
      <?php endwhile; else: ?>
        <p>No content yet.</p>
      <?php endif; ?>
    </div>
    <div style="margin:16px 0"><?php the_posts_pagination(); ?></div>
  </section>
</div>
<?php get_footer(); ?>
