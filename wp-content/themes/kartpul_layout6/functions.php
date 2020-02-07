<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 * @author         TemplateMela
 * @version        Release: 1.0
 */
/**  Set Default options : Theme Settings  */
function tmpmela_set_default_options_child()
{
  /*  General Settings  */    
  add_option("tmpmela_logo_image", get_stylesheet_directory_uri() . "/images/megnor/logo.png"); // set logo image
  add_option("tmpmela_mob_logo_image", get_stylesheet_directory_uri() . "/images/megnor/mob-logo.png"); // set logo image
  add_option("tmpmela_button_color","EAECE7"); // button color
  add_option("tmpmela_button_text_color","000000"); // button Text color  
  add_option("tmpmela_button_hover_color","76A72E"); // button hover color
  add_option("tmpmela_button_hover_text_color","FFFFFF"); // button hover Text color
  add_option("tmpmela_border_color","EAECE7"); // button border color
  add_option("tmpmela_hover_border_color","76A72E"); // button border hover color

  /*  Header Settings  */
  add_option("tmpmela_header_top_bkg_color","FFFFFF"); // Header Top Background color
  add_option("tmpmela_header_bottom_bkg_color","76A72E"); // header bottom background color		
  add_option("tmpmela_header_right_service_text_color","FFFFFF"); // Header Right Service Text Color
  add_option("tmpmela_header_right_service_background_color","76A72E"); // Header Right Service Text Background Color
  add_option("tmpmela_navbar_category_title_bg_color","638c28"); // Header Category Title text color
  
  /*  Navigation Menu Setting  */
  add_option("tmpmela_top_menu_text_color","000000"); // Top Menu Text color
  add_option("tmpmela_top_menu_texthover_color","76A72E"); // Top Menu Text hover color
  add_option("tmpmela_sub_menu_text_color","000000"); // Sub Menu Text color
  add_option("tmpmela_sub_menu_texthover_color","76A72E"); // Sub Menu Text hover color
  
  /*  Menu Category Setting  */
  add_option("tmpmela_categoty_title1_text_color","FFFFFF"); // Header Category Title text color
  add_option("tmpmela_sidebar_category_link_color","000000"); // Sidebar Category Link Color
  add_option("tmpmela_sidebar_category_link_hover_color","76A72E"); // Sidebar Category link Hover Color
  add_option("tmpmela_sidebar_category_child_link_color","000000"); // Sidebar Category Child Link Color
  add_option("tmpmela_sidebar_category_child_link_hover_color","76A72E"); // Sidebar Category Child link Hover Color
  add_option("tmpmela_sidebar_category_sub_child_link_color","000000"); // Sidebar Category Sub Child Link Color
  add_option("tmpmela_sidebar_category_sub_child_link_hover_color","76A72E"); // Sidebar Category Sub Child link Hover Color

  /*  Topbar Setting  */
  add_option("tmpmela_topbar_text_color","7A7A7A"); // TopBar Text color
  add_option("tmpmela_topbar_link_color","7A7A7A"); // topbar_link_color
  add_option("tmpmela_topbar_link_hover_color","76A72E"); // top bar_link_hover_color
  
  /*  Content Settings  */
  add_option("tmpmela_h3color",'000000'); // h3 family font color	
  add_option("tmpmela_link_color","000000"); // link color
  add_option("tmpmela_hoverlink_color","76A72E"); // link hover color

  /*  Footer Settings  */
  add_option("tmpmela_footer_newsletter_bkg_color", "76A72E");
  add_option("tmpmela_footer_bkg_color","000000"); // Footer Background color 
  add_option("tmpmela_footer_title_color","FFFFFF"); // Footer link text color
  add_option("tmpmela_footerlink_color","A2A2A2"); // Footer link text color
  add_option("tmpmela_footerhoverlink_color","76A72E"); // Footer link hover text color
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
            'import_file_name'             => 'Kartpul_Layout6',
            'local_import_file'            => trailingslashit( get_stylesheet_directory() ) . 'demo-content/demo6/kartpul_layout6.wordpress.xml',
            'local_import_customizer_file' => trailingslashit( get_stylesheet_directory() ) . 'demo-content/demo6/kartpul_layout6_customizer_export.dat',
            'local_import_widget_file'     => trailingslashit( get_stylesheet_directory() ) . 'demo-content/demo6/kartpul_layout6_widgets_settings.wie',
            'import_notice'                => esc_html__( 'Please waiting for a few minutes, do not close the window or refresh the page until the data is imported.', 'kartpul' ),
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

     //Import Revolution Slider
       if ( class_exists( 'RevSlider' ) ) {
           $slider_array = array(
              get_stylesheet_directory()."/demo-content/demo6/tmpmela_homeslider_layout6.zip",
              );
 
           $slider = new RevSlider();
        
           foreach($slider_array as $filepath){
             $slider->importSliderFromPost(true,true,$filepath);  
           }
           echo esc_html__( 'Slider processed', 'kartpul' );
      }
   
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
}
add_action( 'pt-ocdi/after_import', 'sampledata_after_import' );
endif;
?>