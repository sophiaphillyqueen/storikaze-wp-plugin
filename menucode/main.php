<?php

// The default for all new installations of this plugin is that
// the social panel be off.
add_option('storikaze_social', 'no');

// I expect this (the re-ordering of archive posts to be earliest-
// -to-latest) to remain 'yes' as default -- but that may change.
// At any rate - I am definining the option now because I soon
// plan for it to be, well, optional.
//   If I set it so that the default is *not* to do this, it will
// be so that someone can install the plugin anew onto a pre-existing
// WordPress without any functionality even *temporarily* changing
// without them wanting it to do so.
// Option defined in dev-space: 2015-09-01:
add_option('storikaze_chron_order', 'yes');

// Currently, Storikaze adds shortcode processing to widgets.
// I plan in the future for this feature to be off-by-default
// in new installations --- yet it will still need to be
// on-by-default on older installations out of the Continuity
// Principle.
// Option defined in dev-space: 2015-09-01:
add_option('storikaze_shortc_widget', 'yes');

// By default, there are no Storikaze reference sites.
//add_option('storikaze_refls','*');

add_action('admin_menu','storikaze_main_options_menu');
add_action('admin_post_storikaze_refsite_new','storikaze_optform_reference_new');
add_action('admin_post_storikaze_social_upd','storikaze_optform_social_upd');
add_action('admin_post_storikaze_ad_opts','storikaze_optform_ad_opts');

function storikaze_main_options_menu ( ) {
  add_menu_page('Storikaze Options', 'Storikaze', 'manage_options', 'storikaze-opts-main', 'storikaze_main_options_page');
  add_submenu_page('storikaze-opts-main','Storikaze Reference Site Options','Reference Sites','manage_options','storikaze-opts-related','storikaze_options_reference');
  add_submenu_page('storikaze-opts-main','AdCode Options','AdCodes','install_plugins','storikaze-opts-adcode','storikaze_options_adcode');
}

function storikaze_main_options_page ( ) {
  require_once(dirname(__FILE__) . "/htsg/main-menu.php");
}

function storikaze_options_reference ( ) {
  require_once(dirname(__FILE__) . "/htsg/reference-sites.php");
}

function storikaze_options_adcode ( ) {
  require_once(dirname(__FILE__) . "/htsg/adcode-items.php");
}

function storikaze_optform_reference_new ( ) {
  header("Content-type: text/plain");
  echo "<h1>GOCHA</h1>";
  var_dump($_SERVER);
}

require_once(dirname(__FILE__) . "/fun_storikaze_optform_social_upd.php");
require_once(dirname(__FILE__) . "/fun_storikaze_optform_ad_opts.php");


?>