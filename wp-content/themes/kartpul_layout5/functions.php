<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) StationeryHutz. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 * @author         TemplateMela
 * @version        Release: 1.0
 */
/**  Set Default options : Theme Settings  */
function tmpmela_set_default_options_child()
{
  add_option("tmpmela_logo_image", get_stylesheet_directory_uri() . "/images/megnor/logo.png"); // set logo image
  add_option("tmpmela_mob_logo_image", get_stylesheet_directory_uri() . "/images/megnor/mob-logo.png"); // set logo image
  add_option("tmpmela_button_color","f2f2f2"); // button color
  add_option("tmpmela_button_text_color","3D3D3D"); // button Text color  
  add_option("tmpmela_button_hover_color","0088CC"); // button hover color
  add_option("tmpmela_button_hover_text_color","FFFFFF"); // button hover Text color
  add_option("tmpmela_border_color","F2F2F2"); // button border color
  add_option("tmpmela_hover_border_color","0088CC"); // button border hover color

  add_option("tmpmela_header_top_bkg_color","FFFFFF"); // Header Top Background color
  add_option("tmpmela_top_menu_texthover_color","0088CC"); // Top Menu Text hover color
  add_option("tmpmela_sub_menu_texthover_color","0088CC"); // Sub Menu Text hover color
  add_option("tmpmela_sidebar_category_link_hover_color","0088CC"); // Sidebar Category link Hover Color
  add_option("tmpmela_sidebar_category_child_link_hover_color","0088CC"); // Sidebar Category Child link Hover Color
  add_option("tmpmela_sidebar_category_sub_child_link_hover_color","0088CC"); // Sidebar Category Sub Child link Hover Color
  add_option("tmpmela_navbar_category_title_bg_color","0088cc"); // Header Category Title text color
	
  add_option("tmpmela_topbar_link_hover_color","0088CC"); // top bar_link_hover_color
  add_option("tmpmela_hoverlink_color","0088CC"); // link hover color

  add_option("tmpmela_footer_newsletter_bkg_color", "0088CC");
  add_option("tmpmela_footer_bkg_color","FFFFFF"); // Footer Background color 
  add_option("tmpmela_footer_title_color","222222"); // Footer link text color
  add_option("tmpmela_footerlink_color","7A7A7A"); // Footer link text color
  add_option("tmpmela_footerhoverlink_color","0088CC"); // Footer link hover text color
}	
add_action('init', 'tmpmela_set_default_options_child');

function tmpmela_child_styles() {
    wp_enqueue_style( 'tmpmela-child-style', get_template_directory_uri(). '/style.css' );	
}
add_action( 'wp_enqueue_scripts', 'tmpmela_child_styles' );

/********************************************************
**************** One Click Import Data ******************
********************************************************/
if ( ! function_exists( 'sampledata_import_files' ) ) :
function sampledata_import_files() {
return array(
 array(
    'import_file_name'            => 'kartpul_layout5',
    'local_import_file'           => trailingslashit( get_stylesheet_directory() ) . 'demo-content/demo5/kartpul_layout5.wordpress.xml',
    'local_import_customizer_file'=> trailingslashit( get_stylesheet_directory() ) . 'demo-content/demo5/kartpul_layout5_customizer_export.dat',
  'local_import_widget_file'    => trailingslashit( get_stylesheet_directory() ) . 'demo-content/demo5/kartpul_layout5_widgets_settings.wie',
    'import_notice'               => esc_html__( 'Please waiting for a few minutes, do not close the window or refresh the page until the data is imported.', 'kartpul' ),
),
);
}
add_filter( 'pt-ocdi/import_files', 'sampledata_import_files' );
endif;
if ( ! function_exists( 'sampledata_after_import' ) ) :
function sampledata_after_import($selected_import) {
         //Set Menu
        $header_menu = get_term_by('name', 'MainMenu', 'nav_menu');
        $headertop_menu = get_term_by('name', 'Header Top Links', 'nav_menu');
    $top_menu = get_term_by('name', 'TopBar Menu Links', 'nav_menu');
        set_theme_mod( 'nav_menu_locations' , array( 
     'primary'   => $header_menu->term_id,
     'header-menu'   => $headertop_menu->term_id ,
     'topbar-menu'   => $top_menu->term_id
         ) 
        );
    //Set Front page and blog page
       $page = get_page_by_title( 'Home');
       if ( isset( $page->ID ) ) {
        update_option( 'page_on_front', $page->ID );
        update_option( 'show_on_front', 'page' );
       }
     $post = get_page_by_title( 'Blog');
       if ( isset( $page->ID ) ) {
        update_option( 'page_for_posts', $post->ID );
        update_option( 'show_on_posts', 'post' );
       }
     
     //Import Revolution Slider
       if ( class_exists( 'RevSlider' ) ) {
           $slider_array = array(
              get_template_directory()."/demo-content/demo5/tmpmela_homeslider_layout5.zip",
        );
           $slider = new RevSlider();
        
           foreach($slider_array as $filepath){
             $slider->importSliderFromPost(true,true,$filepath);
           }
           echo esc_html__( 'Slider processed', 'kartpul' );
      }
}
add_action( 'pt-ocdi/after_import', 'sampledata_after_import' );
endif;
?>