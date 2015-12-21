<?php
/*
Plugin Name: PSR4 AutoLoader
Plugin URI: http://bluetent.com
Description: Provides PSR4 autoloading for plugins and themes.
Version: 1.0.0
Author: Ethan Hinson
Author URI: http://bluetent.com
License: GPL2
*/

require 'autoloader.php';
add_action('plugins_loaded', 'wp_psr4_class_loader');

/**
 * Allow plugins to register a namespace for class loading.
 */
function wp_psr4_class_loader() {
  // Create a new instance of the autoloader
  $loader = new Psr4AutoloaderClass();

  // Register this instance
  $loader->register();

  $namespaces = apply_filters('wp_psr4_namespaces', array());
  foreach ($namespaces as $ns => $path) {
    $loader->addNamespace($ns, $path, TRUE);
  }
}