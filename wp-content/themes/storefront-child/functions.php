
<!-- this block is from https://codex.wordpress.org/Child_Themes -->
<?php
function my_theme_enqueue_styles() {

    $parent_style = 'storefront-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

// making phone number optional on the checkout page
add_filter( 'woocommerce_billing_fields', 'my_optional_fields' ); function my_optional_fields( $address_fields ) { $address_fields['billing_phone']['required'] = false; return $address_fields; }

//removing sidebar from all product pages, cart, checkout and account page
add_action( 'wp', 'remove_sidebar_from_shopping_pages' );

function remove_sidebar_from_shopping_pages() {
    if ( is_product() || ( is_cart() || is_checkout() || is_account_page() ) ) {
    remove_action( 'storefront_sidebar', 'storefront_get_sidebar', 10 );
    }
}

// should be removing sidebar from all pges but its not working, perhaps needs to be storefront_sidebar
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
 

// removing footer from mobile view
remove_action( 'storefront_footer', 'storefront_handheld_footer_bar', 999 );


// <?php
// /*
//  this direction is from : https://gist.github.com/mrwweb/92b1c15abfe74f0e472c20a9b1591adf
//  Important!
//  Make sure to replace {my_} with your theme's unique prefix.
//  All future functions you write should use that same prefix.
//  Example: mrwnten_parent_theme_enqueue_styles()
// */
// add_action( 'wp_enqueue_scripts', 'storefront_theme_enqueue_styles' );
// /**
//  * This function loads both the parent styles and child theme styles for the front-end site
//  */
// function storefront_theme_enqueue_styles() {
//     // This loads the parent styles
//     wp_enqueue_style( 'parent-styles', get_template_directory_uri() . '/style.css' );
//     // this loads your child theme styles.
//     // The array() makes the parent themes a "dependency" of the child styles
//     // Dependencies get loaded *first*, so your child theme styles will override parent theme styles
//     // (^^^^^^^^ as long as your CSS selectors have the same or higher specificity!)
//     wp_enqueue_style( 'child-styles',
//         get_stylesheet_directory_uri() . '/style.css',
//         array( 'parent-styles' )
//     );
// } 

?>