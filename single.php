<?php get_header(); ?>
<nav class="breadcrumbs">
  <a href="<?php echo esc_url(home_url('/')); ?>">Home</a> /
  <a href="<?php echo esc_url( get_post_type_archive_link('post') ); ?>">Articles</a> /
  <span><?php the_title(); ?></span>
</nav>

<article class="article">
  <?php if (have_posts()): while (have_posts()): the_post(); ?>
    <header>
      <h1><?php the_title(); ?></h1>
      <div class="meta">
        <span class="badge"><?php the_time('M j, Y'); ?></span>
        <span class="badge"><?php the_category(', '); ?></span>
      </div>
    </header>

    <section class="content">
      <?php the_content(); ?>
    </section>

    <footer style="margin-top:16px">
      <?php if (has_post_thumbnail()) the_post_thumbnail('large', ['style'=>'border-radius:12px;border:1px solid #eee']); ?>
    </footer>
  <?php endwhile; endif; ?>
</article>
<?php get_footer(); ?>
