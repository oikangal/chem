<?php
if (!defined('ABSPATH')) exit;

add_action('after_setup_theme', function () {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  register_nav_menus([
    'primary' => __('Primary Menu','theme')
  ]);
});

add_action('wp_enqueue_scripts', function () {
  // kendi ana stiliniz varsa onu da koruyun
  wp_enqueue_style('header-layout', get_stylesheet_directory_uri() . '/header.css', [], '1.0');
  wp_enqueue_script('header-js', get_stylesheet_directory_uri() . '/header.js', [], '1.0', true);
});