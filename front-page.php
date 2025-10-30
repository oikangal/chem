<?php
/* Front Page */
get_header(); ?>
<section class="hero">
  <h1><?php bloginfo('name'); ?></h1>
  <p>Find articles &amp; editions. Search by title, author, keywords, DOI…</p>
  <form class="searchbar" method="get" action="<?php echo esc_url( home_url('/') ); ?>">
    <input type="hidden" name="post_type" value="post" />
    <input type="search" name="s" placeholder="Search publications…">
    <button type="submit">Search</button>
  </form>
</section>

<section class="section">
  <h2>Latest Editions</h2>
  <div class="grid">
    <?php
      $cats = get_categories(['number'=>6, 'orderby'=>'id', 'order'=>'DESC','hide_empty'=>false]);
      if ($cats) foreach ($cats as $c): ?>
        <a class="card" href="<?php echo esc_url( get_category_link($c) ); ?>">
          <strong><?php echo esc_html($c->name); ?></strong>
          <div class="meta"><?php echo intval($c->count); ?> articles</div>
        </a>
    <?php endforeach; ?>
  </div>
</section>

<section class="section">
  <h2>Latest Articles</h2>
  <div class="grid">
    <?php
      $q = new WP_Query(['post_type'=>'post','posts_per_page'=>6]);
      if ($q->have_posts()): while ($q->have_posts()): $q->the_post(); ?>
        <article class="card">
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <div class="meta"><?php the_time('M j, Y'); ?></div>
          <div><?php the_excerpt(); ?></div>
        </article>
    <?php endwhile; wp_reset_postdata(); else: ?>
      <p>No articles yet.</p>
    <?php endif; ?>
  </div>
</section>
<?php get_footer(); ?>
