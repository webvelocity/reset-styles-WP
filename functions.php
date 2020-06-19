// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;


// function pm_remove_all_scripts() {
//     global $wp_scripts;
//     $wp_scripts->queue = array();
// }
// add_action('wp_print_scripts', 'pm_remove_all_scripts', 100);

function pm_remove_all_styles() {
    global $wp_styles;
    $wp_styles->queue = array();
}
add_action('wp_print_styles', 'pm_remove_all_styles', 100); 


// while testing, just append this parameter to your url: http://www.yourwebsite.com/?purifytest
    $purifyCssEnabled = array_key_exists('purifytest',$_GET);

    // when you're done, set the variable to true - you will be able to disable it anytime with just one change
    $purifyCssEnabled = true;
    
    /***
*** ENQUEUE PURIFIED STYLES ***
***/

function enqueue_pure_styles() {
    wp_enqueue_style('pure', get_stylesheet_directory_uri().'/styles-pure.css');
}

if ($purifyCssEnabled) {
    // enqueue our purified css file
    add_action('wp_print_styles', 'enqueue_pure_styles', PHP_INT_MAX);
}
    
