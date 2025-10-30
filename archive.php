<?php get_header();
$cats = get_categories(['hide_empty'=>false]);
$cur_cat = get_query_var('cat');
$search_q = get_search_query();
?>
<div class="main">
  <aside class="sidebar">
    <h3>Filter</h3>
    <form method="get" action="<?php echo esc_url( home_url('/') ); ?>">
      <label>Search</label>
      <input type="search" name="s" value="<?php echo esc_attr($search_q); ?>" placeholder="Title, keywords…"/>
      <label>Edition (Category)</label>
      <select name="cat">
        <option value="">All</option>
        <?php foreach ($cats as $c): ?>
          <option value="<?php echo esc_attr($c->term_id); ?>" <?php selected($cur_cat, $c->term_id); ?>><?php echo esc_html($c->name); ?></option>
        <?php endforeach; ?>
      </select>
      <button type="submit">Apply</button>
    </form>
  </aside>
  <section class="results">
    <header><h1><?php the_archive_title(); ?></h1></header>
    <div class="grid">
      <?php if (have_posts()): while (have_posts()): the_post(); ?>
        <article class="card">
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <div class="meta"><?php the_time('M j, Y'); ?> • <?php the_category(', '); ?></div>
          <div><?php the_excerpt(); ?></div>
        </article>
      <?php endwhile; else: ?>
        <p>No results.</p>
      <?php endif; ?>
    </div>
    <div style="margin:16px 0"><?php the_posts_pagination(); ?></div>
  </section>
</div>
<?php get_footer(); ?>
