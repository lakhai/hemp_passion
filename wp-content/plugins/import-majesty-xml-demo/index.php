<?php
/*------------------------------------------------------------------------------
Plugin Name: Import Majesty XML Demo
Plugin URI: http://samathemes.com/
Description: change background in demo site.
Version: 1.0.0
Author: samathemes
License: GNU General Public License version 3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
------------------------------------------------------------------------------*/

if ( ! class_exists('import_xml_demo')) {

	class import_xml_demo {
		
		function __construct() {
			
			$theme = wp_get_theme();
			if( $theme->Name == 'Majesty' ) {
				add_action("redux/extensions/majesty/before", array( $this, 'redux_register_custom_extension_loader'), 0);
			}
		}
		
		function redux_register_custom_extension_loader($ReduxFramework) {
			$path    = dirname( __FILE__ ) . '/extensions/';
            $folders = scandir( $path, 1 );
            foreach ( $folders as $folder ) {
                if ( $folder === '.' or $folder === '..' or ! is_dir( $path . $folder ) ) {
                    continue;
                }
                $extension_class = 'ReduxFramework_Extension_' . $folder;
                if ( ! class_exists( $extension_class ) ) {
                    // In case you wanted override your override, hah.
                    $class_file = $path . $folder . '/extension_' . $folder . '.php';
                    $class_file = apply_filters( 'redux/extension/' . $ReduxFramework->args['opt_name'] . '/' . $folder, $class_file );
                    if ( $class_file ) {
                        require_once( $class_file );
                    }
                }
                if ( ! isset( $ReduxFramework->extensions[ $folder ] ) ) {
                    $ReduxFramework->extensions[ $folder ] = new $extension_class( $ReduxFramework );
                }
            }
		}		
	} //EO class Posttype
		
	new import_xml_demo();

}

if ( !function_exists( 'sama_wbc_extended_example' ) ) {
	function sama_wbc_extended_example( $demo_active_import , $demo_directory_path ) {

		reset( $demo_active_import );
		$current_key = key( $demo_active_import );

		$megamenu 	= get_term_by( 'name', 'theme mega menu small', 'nav_menu' );
		$scrollmenu = get_term_by( 'name', 'scroll menu', 'nav_menu' );
		set_theme_mod( 'nav_menu_locations', array(
				'top-menu' => $megamenu->term_id,
				'top-menu-2'  => $scrollmenu->term_id
			)
		);


		/************************************************************************
		* Set HomePage
		*************************************************************************/

		// array of demos/homepages to check/select from
		$wbc_home_pages = array(
			'p' => 'Home Page v1',
		);

		if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && array_key_exists( $demo_active_import[$current_key]['directory'], $wbc_home_pages ) ) {
			/*$page = get_page_by_title( $wbc_home_pages[$demo_active_import[$current_key]['directory']] );
			if ( isset( $page->ID ) ) {
				update_option( 'page_on_front', $page->ID );
				update_option( 'show_on_front', 'page' );
			}*/
			$blogid = 1066;
			$homepage = 1527;
			$shoppage = 1304;
			$cartpage = 1305;
			$checkoutpage = 1306;
			$myacountpage = 1307;
			$eventspage = 2974;
			$locationpage = 2975;
			$bookingpage = 2978;
			$fullcalendarcss = 0;
			$fullcalendarpageid = 2981;
			/*
			mega menu
			full calender
			$fullcalendarcss = 'wpfc_theme_css'; = 0
			$fullcalendarpageid = 'wpfc_scripts_limit'
			
			megamenu_settings['css']   disabled
			*/
			
			update_option( 'page_on_front', $homepage );
			update_option( 'show_on_front', 'page' );
			update_option( 'page_for_posts', $blogid );
			
			update_option( 'woocommerce_shop_page_id', $shoppage );
			update_option( 'woocommerce_cart_page_id', $cartpage );
			update_option( 'woocommerce_checkout_page_id', $checkoutpage );
			update_option( 'woocommerce_myaccount_page_id', $myacountpage );
			update_option( 'dbem_events_page', $eventspage );
			update_option( 'dbem_locations_page', $locationpage );
			update_option( 'dbem_my_bookings_page', $bookingpage );
			update_option( 'wpfc_theme_css', $fullcalendarcss );
			update_option( 'wpfc_scripts_limit', $fullcalendarpageid );
			
			if( get_option('megamenu_settings') ) {
				$megaoptions = get_option('megamenu_settings');
				$megaoptions['css'] = 'disabled';
				update_option( 'megamenu_settings', $megaoptions );
			} else {
				$megaoptions['css'] = 'disabled';
				update_option( 'megamenu_settings', $megaoptions );
			}
			// Home 1
			$home1meta = array( array(
					'transition'	=> 'zoom',
					'timer'			=> 1000,
					'efftimer'		=> 15000,
					'overlay'		=> 'transparent-bg-3',
					'content'		=> '<div class="slider-content">
										<ul id="fade">
										<li><h2 class="text-uppercase">Come in & Taste</h2></li>
										<li><h2 class="text-uppercase">most delicious food</h2></li>
										<li><h2 class="text-uppercase">most delicious desserts</h2></li>
										</ul>
										<i class="icon-home-ico"></i>
										<p class="text-uppercase margin-tb-30">We Create Sweet Memories</p>
										<a href="#" class="btn btn-gold white">DISCOVER MORE</a>
										</div>',
					'images'		=> array(
						'4831' => content_url() . '/uploads/2015/07/bgw1080-2.jpg',
						'4818' => content_url() . '/uploads/2015/07/bgw1600.jpg',
						'4787' => content_url() . '/uploads/2015/09/bgslider2.jpg'
					)
			));
			$metadefined = get_post_meta( 1527, '_sama_bgslider_settings', true );
			if ( empty( $metadefined ) )  { 
			   add_post_meta ( 1527, '_sama_bgslider_settings', $home1meta, true );
			}
			
			// Home 2
			$home2meta = array( array(
					'url'	=> 'https://youtu.be/HAeWL6I25rc',
					'poster_id'			=> 4777,
					'poster'		=> content_url() . '/uploads/2015/08/bgw1080.jpg',
					'overlay'		=> 'transparent-bg-3',
					'content'		=> '<div class="container dark slider-content">
<i class="icon-top-draw"></i>
<div id="text-transform" class="owl-carousel">
<div class="item">
<h1>Premium Restaurant Theme</h1>
</div>
<div class="item">
<h1>KEEP CALM & TASTE OUR FOOD</h1>
</div>
<div class="item">
<h1>Premium Restaurant Themes</h1>
</div>
</div>
<p class="font2">We Create Delicous Memories</p>
<i class="icon-bottom-draw"></i>
</div>',
					'autoplay'		=> 'true',
					'loop'		=> 'true',
					'mute'		=> 'false',
					'showcontrols'		=> 'false',
					'ratio'		=> 'auto',
					'quality'		=> 'hd1080',
			));
			$metadefined2 = get_post_meta( 1566, '_sama_youtube_settings', true );
			if ( empty( $metadefined2 ) )  { 
			   add_post_meta ( 1566, '_sama_youtube_settings', $home2meta, true );
			}
		
			//Home 3
			$home3meta = array( array(
					'direction'	=> 'horizontal',
					'effect'			=> 'slide',
					'loop'		=> 'true',
					'speed'		=> '300',
					'arrows'		=> 'true',
					'bullet'		=> 'false'
			));
			$metadefined3 = get_post_meta( 1595, '_sama_swiper_settings', true );
			if ( $metadefined3 )  { 
			   add_post_meta ( 1595, '_sama_swiper_settings', $home3meta, true );
			}
			
			$home3slides = array( array(
					'type'	=> 'image',
					'image_id'			=> '4831',
					'image'		=> content_url() . '/uploads/2015/07/bgw1080-2.jpg',
					'mp4'		=> '',
					'webm'		=> '',
					'overlay'		=> 'no',
					'content'		=> '<div class="slider-content">
<div class="logo">
<a href="#" class="light-logo"><img src="'.get_template_directory_uri().'/img/logo.png" alt="Logo"></a>
</div>
<h2>HOME OF THE BEST CUISINE</h2>
<h4 class="text-capitalize">We open 24 Hours.</h4>
</div>'
			),
			array(
					'type'	=> 'video',
					'image_id'			=> '4830',
					'image'		=> content_url() . '/uploads/2015/07/bgw1080-1.jpg',
					'mp4'		=> content_url() .'/uploads/2015/07/explore.mp4',
					'webm'		=> content_url(). '/uploads/2015/07/explore.webm',
					'overlay'		=> 'transparent-bg-5',
					'content'		=> '<div class="slider-content ">
<div class="logo">
<a href="#" class="light-logo"><img src="'. get_template_directory_uri().'/img/logo.png" alt="Logo"></a>
</div>
<h2>FROM AN an Outstanding Chef</h2>
<h4 class="text-capitalize">We Create Sweet Memories.</h4>
</div>'
			),
			array(
					'type'	=> 'image',
					'image_id'			=> '4830',
					'image'		=> content_url() . '/uploads/2015/07/bgw1080-1.jpg',
					'mp4'		=> '',
					'webm'		=> '',
					'overlay'		=> 'transparent-bg-5',
					'content'		=> '<div class="slider-content">
<div class="logo"><a href="#" class="light-logo"><img src="'.get_template_directory_uri().'/img/logo.png" alt="Logo"></a></div>
<h2>FROM AN an Outstanding Chef</h2>
<h4 class="text-capitalize">We Create Sweet Memories.</h4>
</div>'
			)
			);
			
			$metadefined4 = get_post_meta( 1595, '_sama_swiper_slides', true );
			if ( empty( $metadefined4 ) )  { 
			   add_post_meta ( 1595, '_sama_swiper_slides', $home3slides, true );
			}
			
			//Index One Page Vertical
			$indexonepageverical = array( array(
					'type'	=> 'fullheight',
					'transition'			=> 'slide',
					'speed'		=> '500',
					'arrows'		=> 'true',
					'navtype'		=> 'block',
					'autoplay'		=> 'true',
					'duration'		=> '5000',
					'hideprev'		=> 'false'
			));
			$metadefined5 = get_post_meta( 1513, '_sama_skipper_settings', true );
			if ( empty( $metadefined5 ) )  { 
			   add_post_meta ( 1513, '_sama_skipper_settings', $indexonepageverical, true );
			}
			$indexonepagevericalslides = array( array(
					'image_id'			=> '4830',
					'image'		=> content_url() . '/uploads/2015/07/bgw1080-1.jpg',
					'overlay'		=> 'transparent-bg-3',
					'content'		=> '<div class="slider-content">
<span class="text-center"><img src="'. get_template_directory_uri().'/img/vertical-logo.png" class="img-responsive aligncenter" alt=""></span>
<i class="icon-home-ico"></i>
<h1 class="text-uppercase" data-caption-animate="fadeInUp">Come in & Taste</h1>
</div>'
			),
			array(
					'image_id'			=> '4830',
					'image'		=> content_url() . '/uploads/2015/07/bgw1080-1.jpg',
					'overlay'		=> 'transparent-bg-3',
					'content'		=> '<div class="slider-content">
<span class="text-center"><img src="'. get_template_directory_uri().'/img/vertical-logo.png" class="img-responsive aligncenter" alt=""></span>
<i class="icon-home-ico"></i>
<h1 class="text-uppercase" data-caption-animate="fadeInUp">HIGH CLASS PROFESSIONAL SERVICE</h1>
</div>'
			),
			array(
					'image_id'			=> '4831',
					'image'		=> content_url() . '/uploads/2015/07/bgw1080-2.jpg',
					'overlay'		=> 'transparent-bg-3',
					'content'		=> '<div class="slider-content">
<span class="text-center"><img src="'. get_template_directory_uri().'/img/vertical-logo.png" class="img-responsive aligncenter" alt=""></span>
<i class="icon-home-ico"></i>
<h1 class="text-uppercase" data-caption-animate="fadeInUp">We Create Sweet Memories</h1>
</div>'
			)
			);
			
			$metadefined6 =  get_post_meta( 1513, '_sama_skipper_slides', true );
			if ( empty( $metadefined6 ) )  { 
			   add_post_meta ( 1513, '_sama_skipper_slides', $indexonepagevericalslides, true );
			}
			
			// Full Screen Bg & index one Page Full Screen
			$indexonepagefullscreenbg = array( array(
					'image_id'	=> '4818',
					'image'			=> content_url() . '/uploads/2015/07/bgw1600.jpg',
					'overlay'		=> 'transparent-bg-3',
					'content'		=> '<div class="slider-content">
<ul id="fade">
<li>
<h1 class="text-uppercase">Come in & Taste</h1>
</li>
<li>
<h1 class="text-uppercase">HIGH CLASS PROFESSIONAL SERVICE</h1>
</li>
<li>
<h1 class="text-uppercase">From an Outstanding Chef</h1>
</li>
</ul>
<i class="icon-home-ico"></i>
<p class="mt30 font2">We Create Sweet Memories</p>
</div>
<a href="#about" class="go-down"><i class="fa fa-angle-double-down"></i></a>'
			));
			
			$metadefined7 = get_post_meta( 1579, '_sama_fullscreenbg_settings', true );
			if ( empty( $metadefined7 ) )  {
			   add_post_meta ( 1579, '_sama_fullscreenbg_settings', $indexonepagefullscreenbg, true );
			}
			
			// Parallax Bg & index one Page Parallax BG
			$indexonepageparallaxbg = array( array(
					'image_id'	=> '4831',
					'image'			=> content_url() . '/uploads/2015/07/bgw1080-2.jpg',
					'overlay'		=> 'transparent-bg-3',
					'content'		=> '<div class="slider-content">
<ul class="text-rotator">
<li>
<h1 class="text-uppercase">Come in & Taste</h1>
</li>
<li>
<h1 class="text-uppercase">HIGH CLASS PROFESSIONAL SERVICE</h1>
</li>
<li>
<h1 class="text-uppercase">From an Outstanding Chef</h1>
</li>
</ul>
<i class="icon-home-ico"></i>
<p class="mt30 font2">We Create Sweet Memories</p>
<a href="#ourmenu" class="btn btn-gold white scroll-down">Our Menu</a>
</div>
<a href="#about" class="go-down"><i class="fa fa-angle-double-down"></i></a>'
			));
			
			$metadefined8 = get_post_meta( 1588, '_sama_parallaxbg_settings', true );
			if ( empty( $metadefined8 ) )  { 
			   add_post_meta ( 1588, '_sama_parallaxbg_settings', $indexonepageparallaxbg, true );
			}
			
			// Bg Slider zooming & index one Page Zooming
			$indexonepageparallaxbg = array( array(
					'image_id'	=> '4831',
					'image'			=> content_url() . '/uploads/2015/07/bgw1080-2.jpg',
					'overlay'		=> 'transparent-bg-3',
					'content'		=> '<div class="slider-content">
<ul class="text-rotator">
<li>
<h1 class="text-uppercase">Come in & Taste</h1>
</li>
<li>
<h1 class="text-uppercase">HIGH CLASS PROFESSIONAL SERVICE</h1>
</li>
<li>
<h1 class="text-uppercase">From an Outstanding Chef</h1>
</li>
</ul>
<i class="icon-home-ico"></i>
<p class="mt30 font2">We Create Sweet Memories</p>
<a href="#ourmenu" class="btn btn-gold white scroll-down">Our Menu</a>
</div>
<a href="#about" class="go-down"><i class="fa fa-angle-double-down"></i></a>'
			));
			$metadefined9 = get_post_meta( 1588, '_sama_parallaxbg_settings', true );
			if ( empty( $metadefined9  ) )  { 
			   add_post_meta ( 1588, '_sama_parallaxbg_settings', $indexonepageparallaxbg, true );
			}
			
			// Index one Page Zooming
			$indexonepagezooming = array( array(
					'transition'	=> 'zoom',
					'timer'			=> 1000,
					'efftimer'		=> 15000,
					'overlay'		=> 'transparent-bg-3',
					'content'		=> '<div class="slider-content">
<ul id="fade">
<li>
<h2 class="text-uppercase">Come in & Taste</h2>
</li>
<li>
<h2 class="text-uppercase">most delicious food</h2>
</li>
<li>
<h2 class="text-uppercase">most delicious desserts</h2>
</li>
</ul>
<i class="icon-home-ico"></i>
<p class="text-uppercase">We Create Sweet Memories</p>
<a href="#about" class="btn btn-gold white scroll-down">DISCOVER MORE</a>
</div>',
					'images'		=> array(
						'4831' => content_url() . '/uploads/2015/07/bgw1080-2.jpg',
						'4818' => content_url() . '/uploads/2015/07/bgw1600.jpg',
						'4788' => content_url() . '/uploads/2015/09/bgslider3.jpg'
					)
			));
			
			$metadefined10 = get_post_meta( 1535, '_sama_bgslider_settings', true );
			if ( empty( $metadefined10 ) )  { 
			   add_post_meta ( 1535, '_sama_bgslider_settings', $indexonepagezooming, true );
			}
			
			//Index One Page Fade
			$indexonepagefade = array( array(
					'type'	=> 'fullheight',
					'transition'			=> 'fade',
					'speed'		=> '500',
					'arrows'		=> 'false',
					'navtype'		=> 'block',
					'autoplay'		=> 'true',
					'duration'		=> '5000',
					'hideprev'		=> 'true'
			));
			
			$metadefined11 =  get_post_meta( 1519, '_sama_skipper_settings', true );
			if ( empty( $metadefined11 ) )  { 
			   add_post_meta ( 1519, '_sama_skipper_settings', $indexonepagefade, true );
			}
			$indexonepagefadeslides = array( array(
					'image_id'			=> '4830',
					'image'		=> content_url() . '/uploads/2015/07/bgw1080-1.jpg',
					'overlay'		=> 'transparent-bg-3',
					'content'		=> '<div class="slider-content">
<h1>Come in & Taste</h1>
<i class="icon-home-ico"></i>
<p class="mt30 font2">We Create Sweet Memories</p>
</div>
<a href="#about" class="go-down"><i class="fa fa-angle-double-down"></i></a>'
			),
			array(
					'image_id'			=> '4818',
					'image'		=> content_url() . '/uploads/2015/07/bgw1600.jpg',
					'overlay'		=> 'transparent-bg-3',
					'content'		=> '<div class="slider-content">
<h1>HIGH CLASS PROFESSIONAL SERVICE</h1>
<i class="icon-home-ico"></i>
<p class="mt30 font2">We Create Sweet Memories</p>
</div>
<a href="#about" class="go-down"><i class="fa fa-angle-double-down"></i></a>'
			),
			array(
					'image_id'			=> '4785',
					'image'		=> content_url() . '/uploads/2015/09/bgslider1.jpg',
					'overlay'		=> 'transparent-bg-3',
					'content'		=> '<div class="slider-content">
<h1>Come in & Taste</h1>
<i class="icon-home-ico"></i>
<p class="mt30 font2">We Create Sweet Memories</p>
</div>
<a href="about" class="go-down"><i class="fa fa-angle-double-down"></i></a>'
			)
			);
			
			$metadefined12 = get_post_meta( 1519, '_sama_skipper_slides', true );
			if ( empty( $metadefined12 ) )  { 
			   add_post_meta ( 1519, '_sama_skipper_slides', $indexonepagefadeslides, true );
			}
			
			//index one page slider
			$indexonepageslider = array( array(
					'direction'	=> 'horizontal',
					'effect'			=> 'slide',
					'loop'		=> 'true',
					'speed'		=> '300',
					'arrows'		=> 'true',
					'bullet'		=> 'false',
			));
			
			$metadefined13 = get_post_meta( 1632, '_sama_swiper_settings', true );
			if ( empty( $metadefined13 ) )  { 
			   add_post_meta ( 1632, '_sama_swiper_settings', $indexonepageslider, true );
			}
			$indexonepagesliderslides = array( array(
					'type'	=> 'image',
					'image_id'			=> '4830',
					'image'		=> content_url() . '/uploads/2015/07/bgw1080-1.jpg',
					'mp4'		=> '',
					'webm'		=> '',
					'overlay'		=> 'transparent-bg-3',
					'content'		=> '<div class="slider-content">
<div class="logo">
<a href="#" class="light-logo"><img src="'. get_template_directory_uri().'/img/logo.png" alt="Logo"></a>
</div>
<h1>HOME OF THE BEST CUISINE</h1>
<h4 class="text-capitalize">We open 24 Hours.</h4>
</div>'
			),
			array(
					'type'	=> 'video',
					'image_id'			=> '4831',
					'image'		=> content_url() . '/uploads/2015/07/bgw1080-2.jpg',
					'mp4'		=> content_url() .'/uploads/2015/07/explore.mp4',
					'webm'		=> content_url(). '/uploads/2015/07/explore.webm',
					'overlay'		=> 'transparent-bg-5',
					'content'		=> '<div class="slider-content ">
<div class="logo">
<a href="#" class="light-logo"><img src="'. get_template_directory_uri().'/img/logo.png" alt="Logo"></a>
</div>
<h1>FROM AN an Outstanding Chef</h1>
<h4 class="text-capitalize">We Create Sweet Memories.</h4>
</div>'
			),
			array(
					'type'	=> 'image',
					'image_id'			=> '4830',
					'image'		=> content_url() . '/uploads/2015/07/bgw1080-1.jpg',
					'mp4'		=> '',
					'webm'		=> '',
					'overlay'		=> 'transparent-bg-5',
					'content'		=> '<div class="slider-content">
<div class="logo"><a href="#" class="light-logo"><img src="'. get_template_directory_uri().'/img/logo.png" alt="Logo"></a></div>
<h1>HIGH CLASS PROFESSIONAL SERVICE</h1>
<h4 class="text-capitalize">We Create Sweet Memories.</h4>
</div>'
			)
			);
			
			$metadefined14 = get_post_meta( 1632, '_sama_swiper_slides', true );
			if ( empty( $metadefined14 ) )  { 
			   add_post_meta ( 1632, '_sama_swiper_slides', $indexonepagesliderslides, true );
			}
			
			//Index One Page full width
			$indexonepagefullwidth = array( array(
					'type'	=> 'fullwidth',
					'transition'			=> 'fade',
					'speed'		=> '500',
					'arrows'		=> 'false',
					'navtype'		=> 'bubble',
					'autoplay'		=> 'true',
					'duration'		=> '5000',
					'hideprev'		=> 'false'
			));
			
			$metadefined15 = get_post_meta( 1523, '_sama_skipper_settings', true );
			if ( empty( $metadefined15 ) )  { 
			   add_post_meta ( 1523, '_sama_skipper_settings', $indexonepagefullwidth, true );
			}
			$indexonepagefullwidth = array( array(
					'image_id'			=> '4830',
					'image'		=> content_url() . '/uploads/2015/07/bgw1080-1.jpg',
					'overlay'		=> 'transparent-bg-3',
					'content'		=> '<div class="slider-content">
<h1>Come in & Taste</h1>
<i class="icon-home-ico"></i>
<p class="mt30 font2">We Create Sweet Memories</p>
</div>
<a href="#about" class="go-down"><i class="fa fa-angle-double-down"></i></a>'
			),
			array(
					'image_id'			=> '4818',
					'image'		=> content_url() . '/uploads/2015/07/bgw1600.jpg',
					'overlay'		=> 'transparent-bg-3',
					'content'		=> '<div class="slider-content">
<h1>HIGH CLASS PROFESSIONAL SERVICE</h1>
<i class="icon-home-ico"></i>
<p class="mt30 font2">We Create Sweet Memories</p>
</div>
<a href="#about" class="go-down"><i class="fa fa-angle-double-down"></i></a>'
			),
			array(
					'image_id'			=> '4788',
					'image'		=> content_url() . '/uploads/2015/09/bgslider3.jpg',
					'overlay'		=> 'transparent-bg-3',
					'content'		=> '<div class="slider-content">
<h1>HIGH CLASS PROFESSIONAL SERVICE</h1>
<i class="icon-home-ico"></i>
<p class="mt30 font2">We Create Sweet Memories</p>
</div>
<a href="#about" class="go-down"><i class="fa fa-angle-double-down"></i></a>'
			)
			);
			
			$metadefined16 = get_post_meta( 1523, '_sama_skipper_slides', true );
			if ( empty( $metadefined16 ) )  { 
			   add_post_meta ( 1523, '_sama_skipper_slides', $indexonepagefullwidth, true );
			}
			
			//index one page slider top
			$indexonepageslidertop = array( array(
					'direction'	=> 'vertical',
					'effect'			=> 'slide',
					'loop'		=> 'true',
					'speed'		=> '300',
					'arrows'		=> 'false',
					'bullet'		=> 'true'
			));
			
			$metadefined17 = get_post_meta( 1604, '_sama_swiper_settings', true );
			if ( empty( $metadefined17 ) )  { 
			   add_post_meta ( 1604, '_sama_swiper_settings', $indexonepageslidertop, true );
			}
			$indexonepagesliderslidestop = array( array(
					'type'	=> 'image',
					'image_id'			=> '4830',
					'image'		=> content_url() . '/uploads/2015/07/bgw1080-1.jpg',
					'mp4'		=> '',
					'webm'		=> '',
					'overlay'		=> 'transparent-bg-3',
					'content'		=> '<div class="slider-content">
<h1 class="text-capitalize">From an Outstanding Chef</h1>
<i class="icon-home-ico"></i>
<p class="mt30 font2 skipperparaghraph">We Create Sweet Memories</p>
</div>'
			),
			array(
					'type'	=> 'image',
					'image_id'			=> '4831',
					'image'		=> content_url() . '/uploads/2015/07/bgw1080-2.jpg',
					'mp4'		=> '',
					'webm'		=> '',
					'overlay'		=> 'transparent-bg-3',
					'content'		=> '<div class="slider-content">
<h1 class="text-capitalize">HIGH CLASS PROFESSIONAL SERVICE</h1>
<i class="icon-home-ico"></i>
<p class="mt30 font2 skipperparaghraph">We Create Sweet Memories</p>
</div>>'
			),
			array(
					'type'	=> 'image',
					'image_id'			=> '4830',
					'image'		=> content_url() . '/uploads/2015/07/bgw1080-1.jpg',
					'mp4'		=> '',
					'webm'		=> '',
					'overlay'		=> 'transparent-bg-5',
					'content'		=> '<div class="slider-content">
<h1 class="text-capitalize">Come in & Taste</h1>
<i class="icon-home-ico"></i>
<p class="mt30 font2 skipperparaghraph">We Create Sweet Memories</p>
</div>'
			)
			);
			
			$metadefined18 = get_post_meta( 1604, '_sama_swiper_slides', true );
			if ( empty( $metadefined18 ) )  { 
			   add_post_meta ( 1604, '_sama_swiper_slides', $indexonepagesliderslidestop, true );
			}
			
			// Index html5video
			$indexonepagehtml5video = array( array(
					'mp4'	=> content_url() . '/uploads/2015/07/explore.mp4',
					'webm'			=> content_url() . '/uploads/2015/07/explore.webm',
					'poster_id'		=> '4831',
					'poster'		=> content_url() . '/uploads/2015/07/bgw1080-2.jpg',
					'overlay'		=> 'transparent-bg-5',
					'content'		=> '<div class="video-content">
      <ul class="text-rotator">
        <li>
          <h1 class="text-uppercase">Come in & Taste</h1>
        </li>
        <li>
          <h1 class="text-uppercase">HIGH CLASS PROFESSIONAL SERVICE</h1>
        </li>
        <li>
          <h1 class="text-uppercase">From an Outstanding Chef</h1>
        </li>
      </ul>
      <!-- End Text Rotater -->
      <i class="icon-home-ico"></i>
      <p class="mt30 font2">We Create Sweet Memories</p>
    </div>
	 <a href="#about" class="go-down"><i class="fa fa-angle-double-down"></i></a>',
					'autoplay'		=> 'true',
					'loop'		=> 'true',
					'muted'		=> 'false'
			));
			
			$metadefined19 = get_post_meta( 1572, '_sama_h5video_settings', true );
			if ( empty( $metadefined19 ) )  { 
			   add_post_meta ( 1572, '_sama_h5video_settings', $indexonepagehtml5video, true );
			}
			
			// Index youtubebg
			$indexonepageyoutubebg = array( array(
					'url'	=> 'https://www.youtube.com/watch?v=HAeWL6I25rc',
					'poster_id'			=> '4830',
					'poster'		=> content_url() . '/uploads/2015/07/bgw1080-1.jpg',
					'overlay'		=> 'transparent-bg-3',
					'content'		=> '<div class="container dark slider-content">
<i class="icon-top-draw"></i>
<div id="text-transform" class="owl-carousel">
<div class="item">
<h1>Premium Restaurant Theme</h1>
</div>
<div class="item">
<h1>KEEP CALM & TASTE OUR FOOD</h1>
</div>
<div class="item">
<h1>Premium Restaurant Themes</h1>
</div>
</div>
<p class="font2">We Create Delicous Memories</p>
<i class="icon-bottom-draw"></i>
</div>
<a data-scroll-nav="1" href="#about" class="go-down"><i class="fa fa-angle-double-down"></i></a>',
					'autoplay'		=> 'true',
					'loop'		=> 'true',
					'muted'		=> 'false',
					'showcontrols'		=> 'false',
					'ratio'		=> 'auto',
					'quality'	=> 'hd1080',
					'startat'	=> 5,
					'stopat'	=> 10,
			));
			
			$metadefined20 = get_post_meta( 1562, '_sama_youtube_settings', true );
			if ( empty( $metadefined20 ) )  { 
			   add_post_meta ( 1562, '_sama_youtube_settings', $indexonepageyoutubebg, true );
			}
			
			// Index vimeobg
			$indexonepagevimeobg = array( array(
					'url'	=> 'https://vimeo.com/23851992',
					'poster_id'			=> '4830',
					'poster'		=> content_url() . '/uploads/2015/07/bgw1080-1.jpg',
					'overlay'		=> 'transparent-bg-7',
					'content'		=> '<div class="slider-content  container ">
<i class="icon-home-ico"></i>
<h1 class="text-uppercase">COME ON IN & ENJOY YOUR FOOD</h1>
<p class="text-uppercase">Aenean sodales dictum augue, in faucibus nisi sollicitudin eu. Nulla semper arcu vel diam auctor.</p>
</div>
<a href="#about" class="go-down"><i class="fa fa-angle-double-down"></i></a>',
					'autoplay'		=> 'true',
					'loop'		=> 'true',
					'volume'		=> 100
			));
			
			$metadefined21 = get_post_meta( 1570, '_sama_vimeo_settings', true );
			if ( empty( $metadefined21 ) )  { 
			   add_post_meta ( 1570, '_sama_vimeo_settings', $indexonepagevimeobg, true );
			}
			
			// Index interactivebg
			$indexonepageinteractivebg = array( array(
					'image_id'	=> 4830,
					'image'		=> content_url() . '/uploads/2015/07/bgw1080-1.jpg',
					'overlay'		=> 'transparent-bg-3',
					'content'		=> '<div class="slider-content">
<ul class="text-rotator">
<li>
<h1 class="text-uppercase">Come in & Taste</h1>
</li>
<li>
<h1 class="text-uppercase">HIGH CLASS PROFESSIONAL SERVICE</h1>
</li>
<li>
<h1 class="text-uppercase">From an Outstanding Chef</h1>
</li>
</ul>
<i class="icon-home-ico"></i>
<p class="mt30 font2">We Create Sweet Memories</p>
</div>
 <a href="#about" class="go-down"><i class="fa fa-angle-double-down"></i></a>',
					'animationspeed'		=> '100ms'
			));
			
			$metadefined22 = get_post_meta( 1585, '_sama_interactivebg_settings', true );
			if ( empty( $metadefined22 ) )  { 
			   add_post_meta ( 1585, '_sama_interactivebg_settings', $indexonepageinteractivebg, true );
			}
			
			// Index animationbg
			$indexonepageanimationbg = array( array(
					'image_id'	=> 4831,
					'image'		=> content_url() . '/uploads/2015/07/bgw1080-2.jpg',
					'overlay'		=> 'transparent-bg-3',
					'content'		=> '<div class="slider-content">
<ul id="fade">
<li>
<h1 class="text-uppercase">Come in & Taste</h1>
</li>
<li>
<h1 class="text-uppercase">HIGH CLASS PROFESSIONAL SERVICE</h1>
</li>
<li>
<h1 class="text-uppercase">From an Outstanding Chef</h1>
</li>
</ul>
<i class="icon-home-ico"></i>
<p class="mt30 font2">We Create Sweet Memories</p>
<a href="#ourmenu" class="btn btn-gold white scroll-down">Our Menu</a>
</div>'
			));
			
			$metadefined23 = get_post_meta( 1582, '_sama_movementbg_settings', true );
			if ( empty( $metadefined23 ) )  { 
			   add_post_meta ( 1582, '_sama_movementbg_settings', $indexonepageanimationbg, true );
			}
			
			// index one page animation
			$indexonepageparallaxbganimation = array( array(
					'image_id'	=> '4830',
					'image'			=> content_url() . '/uploads/2015/07/bgw1080-1.jpg',
					'overlay'		=> 'transparent-bg-3',
					'content'		=> '<div class="slider-content">
<ul class="text-rotator">
<li>
<h1 class="text-uppercase">Come in & Taste</h1>
</li>
<li>
<h1 class="text-uppercase">HIGH CLASS PROFESSIONAL SERVICE</h1>
</li>
<li>
<h1 class="text-uppercase">From an Outstanding Chef</h1>
</li>
</ul>
<i class="icon-home-ico"></i>
<p class="mt30 font2">We Create Sweet Memories</p>
<a href="#ourmenu" class="btn btn-gold white scroll-down">Our Menu</a>
</div>
<a data-scroll-nav="1" href="#about" class="go-down"><i class="fa fa-angle-double-down"></i></a>'
			));
			
			$metadefined24 = get_post_meta( 1592, '_sama_parallaxbg_settings', true );
			if ( empty( $metadefined24 ) )  { 
			   add_post_meta ( 1592, '_sama_parallaxbg_settings', $indexonepageparallaxbganimation, true );
			}
			
			//index american
			$indexamerican = array( array(
					'direction'	=> 'horizontal',
					'effect'			=> 'slide',
					'loop'		=> 'true',
					'speed'		=> '300',
					'arrows'		=> 'true',
					'bullet'		=> 'false'
			));
			
			$metadefined25 = get_post_meta( 1602, '_sama_swiper_settings', true );
			if ( empty( $metadefined25 ) )  { 
			   add_post_meta ( 1602, '_sama_swiper_settings', $indexamerican, true );
			}
			$indexamericanslides = array( array(
					'type'	=> 'image',
					'image_id'			=> '4777',
					'image'		=> content_url() . '/uploads/2015/08/bgw1080.jpg',
					'mp4'		=> '',
					'webm'		=> '',
					'overlay'		=> 'transparent-bg-6',
					'content'		=> '<div class="slider-content">
<div class="logo">
<a href="#" class="light-logo"><img src="'. get_template_directory_uri().'/img/logo.png" alt="Logo"></a>
</div>
<h1>HOME OF THE BEST CUISINE</h1>
<h4 class="text-capitalize">We open 24 Hours.</h4>
</div>'
			),
			array(
					'type'	=> 'video',
					'image_id'			=> '4777',
					'image'		=> 	content_url() . '/uploads/2015/08/bgw1080.jpg',
					'mp4'		=>	content_url() . '/uploads/2015/07/explore.mp4',
					'webm'		=> 	content_url() . '/uploads/2015/07/explore.webm',
					'overlay'		=> 'transparent-bg-6',
					'content'		=> '<div class="slider-content ">
<div class="logo">
<a href="#" class="light-logo"><img src="'. get_template_directory_uri().'/img/logo.png" alt="Logo"></a>
</div>
<h1>FROM AN an Outstanding Chef</h1>
<h4 class="text-capitalize">We Create Sweet Memories.</h4>
</div>'
			),
			array(
					'type'	=> 'image',
					'image_id'			=> '4777',
					'image'		=> content_url() . '/uploads/2015/08/bgw1080.jpg',
					'mp4'		=> '',
					'webm'		=> '',
					'overlay'		=> 'transparent-bg-5',
					'content'		=> '<div class="slider-content">
<div class="logo"><a href="#" class="light-logo"><img src="'. get_template_directory_uri().'/img/logo.png" alt="Logo"></a></div>
<h1>FROM AN an Outstanding Chef</h1>
<h4 class="text-capitalize">We Create Sweet Memories.</h4>
</div>'
			)
			);
			
			$metadefined26 = get_post_meta( 1602, '_sama_swiper_slides', true );
			if ( empty( $metadefined26 ) )  { 
			   add_post_meta ( 1602, '_sama_swiper_slides', $indexamericanslides, true );
			}
			
			// home asian
			$asian = array( array(
					'transition'	=> 'slideUp',
					'timer'			=> 3000,
					'efftimer'		=> 2000,
					'overlay'		=> 'transparent-bg-3',
					'content'		=> '<div class="slider-content">
<ul id="fade">
<li>
<h2 class="text-uppercase">Come in & Taste</h2>
</li>
<li>
<h2 class="text-uppercase">most delicious food</h2>
</li>
<li>
<h2 class="text-uppercase">most delicious desserts</h2>
</li>
</ul>
<i class="icon-home-ico"></i>
<p class="text-uppercase mt30 mb30">We Create Sweet Memories</p>
<a href="about.html" class="btn btn-gold white">DISCOVER MORE</a>
</div>',
					'images'		=> array(
						'4777' => content_url() . '/uploads/2015/08/bgw1080.jpg',
						'4830' => content_url() . '/uploads/2015/07/bgw1080-1.jpg',
						'4831' => content_url() . '/uploads/2015/07/bgw1080-2.jpg'
					)
			));
			
			$metadefined27 = get_post_meta( 1537, '_sama_bgslider_settings', true );
			if ( empty( $metadefined27 ) )  { 
			   add_post_meta ( 1537, '_sama_bgslider_settings', $asian, true );
			}
			
			// home pizza
			$pizza = array( array(
					'url'	=> 'https://youtu.be/7yYKL__hSCs',
					'poster_id'			=> '4831',
					'poster'		=> content_url() . 'uploads/2015/07/bgw1080-2.jpg',
					'overlay'		=> 'transparent-bg-3',
					'content'		=> '<div class="container dark slider-content">
<i class="icon-top-draw"></i>
<div id="text-transform" class="owl-carousel">
<div class="item">
<h2>Premium Restaurant Theme</h2>
</div>
<div class="item">
<h2>KEEP CALM & TASTE OUR FOOD</h2>
</div>
<div class="item">
<h2>Premium Restaurant Themes</h2>
</div>
</div>
<p class="font2">We Create Delicous Memories</p>
<i class="icon-bottom-draw"></i>
</div>',
					'autoplay'		=> 'true',
					'loop'		=> 'true',
					'muted'		=> 'false',
					'showcontrols'		=> 'false',
					'ratio'		=> 'auto',
					'quality'	=> 'hd1080',
					'startat'	=> 14
			));
			
			$metadefined28 = get_post_meta( 1568, '_sama_youtube_settings', true );
			if ( empty( $metadefined28 ) )  { 
			   add_post_meta ( 1568, '_sama_youtube_settings', $pizza, true );
			}
			
			// home burger
			$burger = array( array(
					'transition'	=> 'zoom',
					'timer'			=> 6000,
					'efftimer'		=> 20000,
					'overlay'		=> 'transparent-bg-3',
					'content'		=> '<div class="slider-content">
<ul id="fade">
<li>
<h2 class="text-uppercase">Come in & Taste</h2>
</li>
<li>
<h2 class="text-uppercase">most delicious food</h2>
</li>
<li>
<h2 class="text-uppercase">most delicious desserts</h2>
</li>
</ul>
<i class="icon-home-ico"></i>
<p class="text-uppercase mt30 mb30">We Create Sweet Memories</p>
<a href="#" class="btn btn-gold white">DISCOVER MORE</a>
</div>',
					'images'		=> array(
						'4831' => content_url() . '/uploads/2015/07/bgw1080-2.jpg',
						'4761' => content_url() . '/uploads/2013/03/bgheader.jpg',
						'4777' => content_url() . '/uploads/2015/08/bgw1080.jpg'
					)
			));
			
			$metadefined29 = get_post_meta( 1544, '_sama_bgslider_settings', true );
			if ( empty( $metadefined29 ) )  { 
			   add_post_meta ( 1544, '_sama_bgslider_settings', $burger, true );
			}
			
			// home backery
			$backery = array( array(
					'transition'	=> 'fade',
					'timer'			=> 4000,
					'efftimer'		=> 2000,
					'overlay'		=> 'transparent-bg-3',
					'content'		=> '<div class="slider-content">
<ul id="fade">
<li>
<h2 class="text-uppercase">Come in & Taste</h2>
</li>
<li>
<h2 class="text-uppercase">most delicious food</h2>
</li>
<li>
<h2 class="text-uppercase">most delicious desserts</h2>
</li>
</ul>
<i class="icon-home-ico"></i>
<p class="text-uppercase mt30 mb30">We Create Sweet Memories</p>
<a href="#" class="btn btn-gold white">DISCOVER MORE</a>
</div>',
					'images'		=> array(
						'4831' => content_url() . '/uploads/2015/07/bgw1080-2.jpg',
						'4830' => content_url() . '/uploads/2015/07/bgw1080-1.jpg',
						'4777' => content_url() . '/uploads/2015/08/bgw1080.jpg',
					)
			));
			
			$metadefined30 = get_post_meta( 1550, '_sama_bgslider_settings', true );
			if ( empty( $metadefined30 ) )  { 
			   add_post_meta ( 1550, '_sama_bgslider_settings', $backery, true );
			}
			
			// home cafe
			$cafe = array( array(
					'transition'	=> 'slideDown',
					'timer'			=> 3000,
					'efftimer'		=> 2000,
					'overlay'		=> 'transparent-bg-3',
					'content'		=> '<div class="slider-content">
<ul id="fade">
<li>
<h2 class="text-uppercase">Come in & Taste</h2>
</li>
<li>
<h2 class="text-uppercase">most delicious food</h2>
</li>
<li>
<h2 class="text-uppercase">most delicious desserts</h2>
</li>
</ul>
<i class="icon-home-ico"></i>
<p class="text-uppercase mt30 mb30">We Create Sweet Memories</p>
<a href="#" class="btn btn-gold white">DISCOVER MORE</a>
</div>',
					'images'		=> array(
						'4831' => content_url() . '/uploads/2015/07/bgw1080-2.jpg',
						'4830' => content_url() . '/uploads/2015/07/bgw1080-1.jpg',
						'4777' => content_url() . '/uploads/2015/08/bgw1080.jpg'
					)
			));
			
			$metadefined31 = get_post_meta( 1555, '_sama_bgslider_settings', true );
			if ( empty( $metadefined31 ) )  { 
			   add_post_meta ( 1555, '_sama_bgslider_settings', $cafe, true );
			}
			
			// home animatecss
			$homeanimatecss = array( array(
					'transition'	=> 'zoom',
					'timer'			=> 1000,
					'efftimer'		=> 15000,
					'overlay'		=> 'transparent-bg-3',
					'content'		=> '<div class="slider-content">
<ul id="fade">
<li>
<h2 class="text-uppercase">Come in & Taste</h2>
</li>
<li>
<h2 class="text-uppercase">most delicious food</h2>
</li>
<li>
<h2 class="text-uppercase">most delicious desserts</h2>
</li>
</ul>
<i class="icon-home-ico"></i>
<p class="text-uppercase margin-tb-30">We Create Sweet Memories</p>
<a href="#" class="btn btn-gold white">DISCOVER MORE</a>
</div>',
					'images'		=> array(
						'4785' => content_url() . '/uploads/2015/09/bgslider1.jpg',
						'4818' => content_url() . '/uploads/2015/07/bgw1600.jpg',
						'4777' => content_url() . '/uploads/2015/08/bgw1080.jpg'
					)
			));
			
			$metadefined32 = get_post_meta( 1532, '_sama_bgslider_settings', true );
			if ( empty( $metadefined32 ) )  { 
			   add_post_meta ( 1532, '_sama_bgslider_settings', $homeanimatecss, true );
			}
			
			// comingsoondefault
			$comingsoondefault = array( array(
					'image_id'	=> '4777',
					'image'			=> content_url() . '/uploads/2015/08/bgw1080.jpg',
					'overlay'		=> 'transparent-bg-3',
					'content'		=> '<div class="coming-soon"><div class="slider-content dark">
	<div id="logo">
		<a href="#" class="light-logo"><img src="'. content_url().'/uploads/2015/09/logo.png" alt="Logo"></a>
	</div>
	<h3>WE ARE GLAD TO SEE YOU, BUT PLEASE BE PATIENT, THIS PAGE IS UNDER CONSTRUCTION</h3>
[sama_countdown date="2020/11/7" rtl="false" dayslabel="Days" hourslabel="Hours" minuteslabel="Minutes" secondslabel="Seconds" cssclass=""]<h3>This is Countdown Message if Countdown Expire.</h3>[/sama_countdown]
<p>If you have any questions, comments, or suggestions, please click <a class="underline" href="mailto:someone@yoursite.com">here</a> to mail me.</p>
	<ul class="social">
		<li><a href="#" data-toggle="tooltip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
		<li><a href="#" data-toggle="tooltip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
		<li><a href="#" data-toggle="tooltip" title="Google+"><i class="fa fa-google-plus"></i></a></li>
		<li><a href="#" data-toggle="tooltip" title="Behance"><i class="fa fa-behance"></i></a></li>
	</ul>
</div></div>'
			));
			
			$metadefined33 = get_post_meta( 3089, '_sama_fullscreenbg_settings', true );
			if ( empty( $metadefined33 ) )  { 
			   add_post_meta ( 3089, '_sama_fullscreenbg_settings', $comingsoondefault, true );
			}
			
			// comingsonslider
			$comingsonslider = array( array(
					'transition'	=> 'fade',
					'timer'			=> 5000,
					'efftimer'		=> 5000,
					'overlay'		=> 'transparent-bg-3',
					'content'		=> '<div class="coming-soon"><div class="slider-content dark">
	<div id="logo">
		<a href="#" class="light-logo"><img src="'. content_url().'/uploads/2015/09/logo.png" alt="Logo"></a>
	</div>
	<h3>WE ARE GLAD TO SEE YOU, BUT PLEASE BE PATIENT, THIS PAGE IS UNDER CONSTRUCTION</h3>
[sama_countdown date="2020/11/7" rtl="false" dayslabel="Days" hourslabel="Hours" minuteslabel="Minutes" secondslabel="Seconds" cssclass=""]<h3>This is Countdown Message if Countdown Expire.</h3>[/sama_countdown]
<p>If you have any questions, comments, or suggestions, please click <a class="underline" href="mailto:someone@yoursite.com">here</a> to mail me.</p>
	<ul class="social">
		<li><a href="#" data-toggle="tooltip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
		<li><a href="#" data-toggle="tooltip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
		<li><a href="#" data-toggle="tooltip" title="Google+"><i class="fa fa-google-plus"></i></a></li>
		<li><a href="#" data-toggle="tooltip" title="Behance"><i class="fa fa-behance"></i></a></li>
	</ul>
</div></div>',
					'images'		=> array(
						'4785' => content_url() . '/uploads/2015/09/bgslider1.jpg',
						'4787' => content_url() . '/uploads/2015/09/bgslider2.jpg',
						'4788' => content_url() . '/uploads/2015/09/bgslider3.jpg'
					)
			));
			
			$metadefined34 = get_post_meta( 3095, '_sama_bgslider_settings', true );
			if ( empty( $metadefined34 ) )  { 
			   add_post_meta ( 3095, '_sama_bgslider_settings', $comingsonslider, true );
			}
			
			// comingsoonvideo
			$comingsoonvideo = array( array(
					'mp4'	=> content_url() . '/uploads/2015/07/explore.mp4',
					'webm'			=> content_url() . '/uploads/2015/07/explore.webm',
					'poster_id'		=> '4831',
					'poster'		=> content_url() . '/uploads/2015/07/bgw1080-2.jpg',
					'overlay'		=> 'transparent-bg-3',
					'content'		=> '<div class="coming-soon"><div class="slider-content">
<div id="logo">
<a href="#" class="light-logo"><img src="'. content_url() .'/uploads/2015/09/logo.png" alt="Logo"></a>
</div>
    <h3>We are glad to see you, But please be patient, This page is under construction</h3>
    [sama_countdown date="2020/11/7" rtl="false" dayslabel="Days" hourslabel="Hours" minuteslabel="Minutes" secondslabel="Seconds" cssclass=""]<h3>This is Countdown Message if Countdown Expire.</h3>[/sama_countdown]
    <p>If you have any questions, comments, or suggestions, please click <a class="underline" href="mailto:someone@yoursite.com">here</a> to mail me.</p>
        <ul class="social">
          <li><a href="#" data-toggle="tooltip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#" data-toggle="tooltip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
          <li><a href="#" data-toggle="tooltip" title="Google+"><i class="fa fa-google-plus"></i></a></li>
          <li><a href="#" data-toggle="tooltip" title="Behance"><i class="fa fa-behance"></i></a></li>
        </ul>
</div></div>',
					'autoplay'		=> 'true',
					'loop'		=> 'true',
					'muted'		=> 'false'
			));
			
			$metadefined36 = get_post_meta( 3093, '_sama_h5video_settings', true );
			if ( empty( $metadefined36 ) )  { 
			   add_post_meta ( 3093, '_sama_h5video_settings', $comingsoonvideo, true );
			}
			
			// comingsoondefault
			$home5 = array( array(
					'image_id'	=> '4777',
					'image'			=> content_url() . '/uploads/2015/08/bgw1080.jpg',
					'overlay'		=> 'transparent-bg-2',
					'content'		=> '<div class="container dark slider-content">
<i class="icon-top-draw"></i>
<div id="text-transform" class="owl-carousel">
<div class="item">
<h1>Premium <span>Restaurant</span> Theme</h1>
</div>
<div class="item">
<h1>KEEP CALM & TASTE OUR FOOD</h1>
</div>
<div class="item">
<h1>Premium <span>Majesty</span> Restaurant</h1>
</div>
</div>
<p class="font2">We Create Delicous Memories</p>
<i class="icon-bottom-draw"></i>
</div>'
			));
			
			$metadefined37 = get_post_meta( 5346, '_sama_fullscreenbg_settings', true );
			if ( empty( $metadefined37 ) )  { 
			   add_post_meta ( 5346, '_sama_fullscreenbg_settings', $home5, true );
			}
			
		}
	}

	// Uncomment the below
	add_action( 'wbc_importer_after_content_import', 'sama_wbc_extended_example', 10, 2 );
}
?>