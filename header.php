<?php if (!defined('ABSPATH')) exit; ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="site-header">

  <!-- ÜST BAR: Sol logo, sağ arama (desktop); mobilde sağda arama butonu -->
  <div class="header-top">
    <div class="container header-top__inner">
      <div class="brand">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="brand__link">
          <?php
          // Logo görselin varsa şu satırı kullan:
          // echo wp_get_attachment_image( get_theme_mod('custom_logo'), 'full', false, ['class'=>'brand__img'] );
          // Yoksa site adını yazı olarak göster:
          bloginfo('name');
          ?>
        </a>
      </div>

      <!-- Desktop arama -->
      <form class="site-search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
        <input type="hidden" name="post_type" value="post">
        <input type="search" name="s" class="site-search__input" placeholder="Search publications…">
        <button class="site-search__btn" aria-label="Search">
          <!-- basit büyüteç -->
          <svg width="18" height="18" viewBox="0 0 24 24" aria-hidden="true"><path d="M10 18a8 8 0 1 1 5.293-14.293A8 8 0 0 1 10 18zm11.707 2.293-5.4-5.4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
        </button>
      </form>

      <!-- Mobil arama butonu -->
      <button class="site-search-toggle" aria-expanded="false" aria-controls="mobile-search-panel">
        <svg width="20" height="20" viewBox="0 0 24 24" aria-hidden="true"><path d="M10 18a8 8 0 1 1 5.293-14.293A8 8 0 0 1 10 18zm11.707 2.293-5.4-5.4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
      </button>
    </div>

    <!-- Mobil arama paneli -->
    <div id="mobile-search-panel" class="mobile-search-panel" hidden>
      <form class="mobile-search-form" method="get" action="<?php echo esc_url(home_url('/')); ?>">
        <input type="hidden" name="post_type" value="post">
        <input type="search" name="s" placeholder="Search publications…" />
        <button type="submit">Search</button>
      </form>
    </div>
  </div>

  <!-- ALT BAR: Menü satırı + hamburger (mobilde) -->
  <div class="header-nav">
    <div class="container header-nav__inner">
      <button class="hamburger" aria-expanded="false" aria-controls="primary-menu">
        <span></span><span></span><span></span>
        <span class="hamburger__label">Menu</span>
      </button>

      <nav id="primary-menu" class="primary-menu" aria-label="Primary">
        <?php
          wp_nav_menu([
            'theme_location' => 'primary',
            'container'      => false,
            'menu_class'     => 'primary-menu__list',
            'fallback_cb'    => false
          ]);
        ?>
      </nav>
    </div>
  </div>

</header>

<main class="site-main">