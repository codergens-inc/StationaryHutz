<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Templatemela
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width,initial-scale=1">  
<link rel="profile" href="//gmpg.org/xfn/11"/>
<?php tmpmela_header(); ?>
 <?php wp_head();?> 
</head>
<body <?php body_class(); ?>>
<!-- Css Spinner-->
	 <div class="sk-fading-circle">
	  <div class="sk-circle1 sk-circle"></div>
	  <div class="sk-circle2 sk-circle"></div>
	  <div class="sk-circle3 sk-circle"></div>
	  <div class="sk-circle4 sk-circle"></div>
	  <div class="sk-circle5 sk-circle"></div>
	  <div class="sk-circle6 sk-circle"></div>
	  <div class="sk-circle7 sk-circle"></div>
	  <div class="sk-circle8 sk-circle"></div>
	  <div class="sk-circle9 sk-circle"></div>
	  <div class="sk-circle10 sk-circle"></div>
	  <div class="sk-circle11 sk-circle"></div>
	  <div class="sk-circle12 sk-circle"></div>
	</div>
<div id="page" class="hfeed site">
<?php if ( get_header_image() ) : ?>
<div id="site-header"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"> <img src="<?php header_image(); ?>" width="<?php echo esc_attr(get_custom_header()->width); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>" alt="<?php echo esc_attr_e('Siteheader','kartpul'); ?>"> </a> </div>
<?php endif; ?>
<!-- Header -->
<?php tmpmela_header_before(); ?>
<header id="masthead" class="site-header header-fix <?php echo "header".esc_attr(get_option('tmpmela_header_layout'));  ?> <?php echo esc_attr(tmpmela_sidebar_position()); ?>">
	<div class="header-main site-header-fix">
				<?php tmpmela_header_inside(); ?>	
					<!-- Start header_top -->			
			<?php if (get_option('tmpmela_show_topbar') == 'yes') : ?>	
			<?php if ( has_nav_menu('topbar-menu') ) { ?> 
			<div class="topbar-outer">
				<div class="topbar-main theme-container">
				<?php if(get_option('tmpmela_show_offer') == 'yes') : ?>					
						<div class="header-offer"><?php echo esc_attr(stripslashes(get_option('tmpmela_show_offer_text'))) ?></div>
				<?php endif; ?>
																					
				<div class="tmpmela-topbar-menu-links">
					<?php wp_nav_menu( array( 'theme_location' => 'topbar-menu','menu_class' => 'mega' ) ); ?>
				</div>
				</div>
			</div>
			<?php  } ?>
			<?php endif; ?>		
			<div class="header-top">
				<div class="theme-container">
					<div class="header-top-left">
						<!-- Header LOGO-->
							<div class="header-logo">
							<?php if (get_option('tmpmela_logo_image') != '') : ?>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
								<?php tmpmela_get_logo(); ?>
								</a>
							<?php else: ?>
								<h3 class="site-title"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
									<span class="logo-text"><?php echo stripslashes(get_option('tmpmela_logo_image_alt')); ?></span>
									</a>	
								</h3>
							<?php endif; ?>
                                <?php if (get_option('tmpmela_logo_image') == '' && get_option('tmpmela_logo_image_alt') == '') : ?>
                                    <h3 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                            <span class="logo-text"><?php echo esc_attr(get_bloginfo('name', 'display')); ?></span>
                                        </a>
                                    </h3>
                                <?php endif; ?>
							<?php if(get_option('tmpmela_showsite_description') == 'yes') : ?>
								<h2 class="site-description">
									<?php bloginfo( 'description' ); ?>
								</h2>
							<?php endif; // End tmpmela_showsite_description ?>
							</div>
							<!-- Header Mob LOGO-->
							<div class="header-mob-logo">
							<?php if (get_option('tmpmela_mob_logo_image') != '') : ?>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
								<?php tmpmela_get_mob_logo(); ?>
								</a>
							<?php else: ?>
								<h3 class="site-title"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
									<span class="moblogo-text"><?php echo stripslashes(get_option('tmpmela_mob_logo_image_alt')); ?></span>
									</a>
								</h3>
							<?php endif; ?>
                                <?php if (get_option('tmpmela_logo_image') == '' && get_option('tmpmela_logo_image_alt') == '') : ?>
                                    <h3 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                            <span class="moblogo-text"><?php echo esc_attr(get_bloginfo('name', 'display')); ?></span>
                                        </a>
                                    </h3>
                                <?php endif; ?>
							<?php if(get_option('tmpmela_showsite_description') == 'yes') : ?>
								<h2 class="site-description">
									<?php bloginfo( 'description' ); ?>
								</h2>
							<?php endif; // End tmpmela_showsite_description ?>
							</div>					 			
					</div>
					
					<div class="header-right">
					<div class="header-top-center">
					<!--Search-->
							<?php if (is_active_sidebar('header-search')) : ?>
							<div class="header-search">
									<div class="header-toggle"></div>
										<?php tmpmela_get_widget('header-search');  ?>	
							</div>
							<?php endif; ?>			
					<!--End Search-->	
					</div>		
					
					<!--Start Header Right CMS Area-->
					<div class="header-top-right">
							 <?php if (!has_nav_menu('header-menu')): ?>
                                <div class="login-out">
                                    <?php $logout_url = '';
                                    if (is_user_logged_in()) {
                                        $myaccount_page_id = get_option('woocommerce_myaccount_page_id');
                                        if ($myaccount_page_id) {
                                            $logout_url = wp_logout_url(get_permalink($myaccount_page_id));
                                            if (get_option('woocommerce_force_ssl_checkout') == 'yes')
                                                if (is_ssl()) {
                                                    $logout_url = str_replace('http:', 'https:', $logout_url);
                                                }
                                        } ?>
                                        <?php if ($myaccount_page_id): ?>
                                            <a class="logout" href="<?php echo esc_url($logout_url); ?>">
                                                <?php echo esc_html_e('Logout', 'kartpul'); ?>
                                            </a>
                                        <?php endif; ?>
                                    <?php } else {
                                        $myaccount_page_id = get_option('woocommerce_myaccount_page_id'); ?>
                                        <?php if ($myaccount_page_id): ?>
                                            <a class="login" href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>">
                                                <?php echo esc_html_e('Login', 'kartpul'); ?>
                                            </a>
                                        <?php endif; ?>
                                    <?php } ?>
                                </div>
                            <?php endif; ?>
							<?php if ( has_nav_menu('header-menu') ): ?> 	
										<!-- Topbar link -->							
										<div class="topbar-link">
											<div class="topbar-link-toggle"></div>
												<div class="topbar-link-wrapper">   
													<div class="header-menu-links">																		
															<?php 
															// Woo commerce Header Cart
															$tmpmela_header_menu =array(
															'menu' => esc_html__('TM Header Top Links','kartpul'),
															'depth'=> 1,
															'echo' => false,
															'menu_class'      => 'header-menu', 
															'container'       => '', 
															'container_class' => '', 
															'theme_location' => 'header-menu'
															);
															echo wp_nav_menu($tmpmela_header_menu);				    
															?>
															
															<?php
															$logout_url = '';
															if ( is_user_logged_in() ) {
																$myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' ); 
																if ( $myaccount_page_id ) { 
																$logout_url = wp_logout_url( get_permalink( $myaccount_page_id ) ); 
																if ( get_option( 'woocommerce_force_ssl_checkout' ) == 'yes' )
																if (is_ssl()) {
																$logout_url = str_replace( 'http:', 'https:', $logout_url );
																}
																} ?>
																<a href="<?php echo esc_url($logout_url); ?>" ><?php echo esc_html_e('Logout','kartpul'); ?></a>
																<?php }
																else { ?>
																<a href="<?php echo  get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>"><?php echo esc_html_e('User Login','kartpul'); ?></a>
															<?php } ?>  
													</div>			
												</div>
										</div>	
										<?php endif; ?>	
					<?php if ( in_array( 'yith-woocommerce-compare/init.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ): ?>		
					<?php  tmpmela_add_to_compare_in_menu();  ?>
					<?php endif ?>		
					<?php if ( in_array( 'yith-woocommerce-wishlist/init.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ): ?>	
 					<?php  tmpmela_add_to_wishlist_in_menu();  ?>	
					<?php endif ?>	
 					<?php // Woo commerce Header Cart
											if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) && is_active_sidebar('header-widget') ) : ?>
											<div class="header-cart headercart-block">
											<div class="cart togg">
														<?php global $woocommerce;
														ob_start();?>						
														<div class="shopping_cart tog" title="<?php esc_attr_e('View your shopping cart', 'kartpul'); ?>">
															<div class="cart-icon"></div>
															<div class="cart-price">
																<a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e('View your shopping cart', 'kartpul'); ?>">
																	<span class="cart-qty"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'kartpul'), $woocommerce->cart->cart_contents_count);?></span>																
																</a>
															</div>
														</div>	
														<?php global $woocommerce; ?>
														<?php tmpmela_get_widget('header-widget'); ?>		
											</div>
										</div>
							<?php endif; ?>	
					</div>
					<!--End Header Right CMS Area-->
					</div>
				</div>
			</div>
			 	<!-- End header_top -->		
				
				<div class="header-bottom">
				  <div class="header-botton-inner">
					<div class="theme-container">
							<div class="header-bottom-left">	
								<!-- Start header_bottom_left -->	
									<?php if (is_active_sidebar('header-category')) : ?>
								<div class="box-category-heading">
									<div class="box-category">
                                        <div class="title1">
                                            <?php echo stripslashes(get_option( 'tmpmela_navbar_category_title1' )); ?>
                                        </div>
                                    </div>
									<!-- category block -->
									<div class="header-category widget_product_categories">
                                        <?php tmpmela_get_widget('header-category');  ?>
                                    </div>
									<!-- end category block -->
								</div>						
								<?php endif; ?>				
							<!-- #site-navigation -->
								<nav id="site-navigation" class="navigation-bar main-navigation">																				
								<a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'kartpul' ); ?>"><?php esc_html_e( 'Skip to content', 'kartpul' ); ?></a>	
									<div class="mega-menu">
										<?php wp_nav_menu( array( 'theme_location' => 'primary','menu_class' => 'mega' ) ); ?>		
									</div>	
								</nav>
								<nav class="mobile-navigation">	
								<h3 class="menu-toggle"><?php esc_html_e( 'Menu', 'kartpul' ); ?></h3>
									<div class="mobile-menu">	
										<span class="close-menu"></span>	
											<?php wp_nav_menu( array( 'theme_location' => 'primary','menu_class' => 'mobile-menu-inner') ); ?>
										</div>
								</nav>
						</div>				
						<!-- End header_bottom_left -->
						<!-- Start header_bottom_right -->		
							<div class="header-bottom-right">
							 <?php if (get_option('tmpmela_show_header_right_services') == 'yes') : ?> 	
							<div class="header-right-service-cms">
									<?php tmpmela_header_right_service_cms(); ?>	
							</div>
							<?php endif; ?>			
									</div>
					<!-- End header_bottom_right -->	
				</div>	
				  </div>
				<!-- End header_bottom -->	
				</div>					
 <!-- End header-main -->
</div>	
</header>
<?php tmpmela_header_after(); ?>
<?php tmpmela_main_before(); ?>
	<?php 
		$tmpmela_page_layout = tmpmela_page_layout(); 
		if( isset( $tmpmela_page_layout) && !empty( $tmpmela_page_layout ) ):
		$tmpmela_page_layout = $tmpmela_page_layout; 
		else:
		$tmpmela_page_layout = '';
		endif;
	?>
<?php 
$shop = '0';
	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) :
	if(is_shop())
		$tmpmela_page_layout = 'wide-page';
		$shop = '1';
	endif;
?>
<?php
global $wp;
$current = esc_url(home_url( add_query_arg( array( $_GET ), $wp->request ) ));
$str = substr(strrchr($current, '?'), 1);
if($str == 'left'){
  $div_class = 'left-sidebar';
}elseif($str == 'right'){
  $div_class = 'right-sidebar';
}elseif($str == 'full'){
  $div_class = 'full-width';  
}else{
$div_class = tmpmela_sidebar_position();
} 
if ( get_option( 'tmpmela_page_sidebar' ) == 'no' ):
    $div_class = "full-width";
	endif;
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {	
  if ( is_product() ){	
     if ( get_option( 'tmpmela_shop_sidebar' ) == 'no' ):
   		 $div_class = "full-width";
	endif;
   }	
}
if ( is_home() && tmpmela_is_blog() ){
    $div_class = "left-sidebar";
}
?>
<div id="main" class="site-main <?php echo esc_attr($div_class);  ?> <?php echo esc_attr(tmpmela_page_layout()); ?>">
<div class="main_inner">
<?php 
	$tmpmela_page_layout = tmpmela_page_layout(); 
	if( isset( $tmpmela_page_layout) && !empty( $tmpmela_page_layout ) ):
	$tmpmela_page_layout = $tmpmela_page_layout; 
	else:
	$tmpmela_page_layout = '';
	endif;
if ( $tmpmela_page_layout == 'wide-page' ) : ?>
	<div class="main-content-inner-full">
<?php else: 		
if(is_archive() || is_tag() || is_404()) : ?>
	<div class="main-content">
<?php else: ?>
	<div class="main-content-inner <?php echo esc_attr(tmpmela_sidebar_position()); ?>">	
<?php endif; ?>
<?php endif; ?>
<?php tmpmela_content_before(); ?>