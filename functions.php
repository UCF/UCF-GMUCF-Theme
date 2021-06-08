<?php
namespace GMUCF\Theme;

define( 'GMUCF_THEME_DIR', trailingslashit( get_stylesheet_directory() ) );


// Theme foundation
include_once GMUCF_THEME_DIR . 'includes/utilities.php';
include_once GMUCF_THEME_DIR . 'includes/config.php';
include_once GMUCF_THEME_DIR . 'includes/meta.php';
include_once GMUCF_THEME_DIR . 'includes/template-redirect-functions.php';

include_once GMUCF_THEME_DIR . 'includes/analytics-functions.php';
include_once GMUCF_THEME_DIR . 'includes/announcements-functions.php';
include_once GMUCF_THEME_DIR . 'includes/coronavirus-functions.php';
include_once GMUCF_THEME_DIR . 'includes/email-markup-functions.php';
include_once GMUCF_THEME_DIR . 'includes/events-functions.php';
include_once GMUCF_THEME_DIR . 'includes/in-the-news-functions.php';
include_once GMUCF_THEME_DIR . 'includes/ucf-today-functions.php';
include_once GMUCF_THEME_DIR . 'includes/request-email-functions.php';


// Plugin extras/overrides

// ...
