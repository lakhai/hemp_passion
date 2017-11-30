<?php
/*
 *	this function to out custom css color for theme
 *	This file only load when you enable custom color in theme option page
 */
function sama_output_custom_css_color () {
	global $majesty_options;
	$main_color = $majesty_options['majesty_main_color'];
	$body 		= $majesty_options['majesty_body_color'];
	$heading 	= $majesty_options['majesty_head_color'];
	$icon 		= $majesty_options['majesty_icon_color'];
	$todaycal	= $majesty_options['majesty_calendar_color'];
?>
<style type="text/css">
::-webkit-input-placeholder{color:<?php echo esc_attr($body); ?>}:-moz-placeholder{color:<?php echo esc_attr($body); ?>}::-moz-placeholder{color:<?php echo esc_attr($body); ?>}:-ms-input-placeholder{color:<?php echo esc_attr($body); ?>}
::-moz-selection{background:<?php echo esc_attr($main_color); ?>}::selection{background:<?php echo esc_attr($main_color); ?>}::-moz-selection{background:<?php echo esc_attr($main_color); ?>}::-webkit-selection{background:<?php echo esc_attr($main_color); ?>}
body,.input-group-addon,div.css-search input.em-date-start,div.css-search input.em-date-end,.post-password-form input[type="submit"],.post-password-form input[type="password"],.woocommerce input[type="tel"],.woocommerce input[type="password"],.woocommerce input[type="email"],.woocommerce input[type="text"],.rtb-booking-form input[type="tel"],.rtb-booking-form input[type="text"],.rtb-booking-form input[type="email"],.form-control,textarea,.blog_list .blog-content a,.blog_list_2 .blog-content a,.comment-form input,.comment-form textarea,.comment-form select,div.css-search select,select.em-ticket-select,.sidebar select,.woocommerce textarea,.select2-container .select2-choice,.rtb-booking-form select,.woocommerce select,.woocommerce .commentlist .star-rating:before,.woocommerce-product-rating .star-rating::before,form.cart .label,.plus-minus input,blockquote footer,.widget.woocommerce .star-rating:before,.em-booking-form-details textarea,.rtb-booking-form input:not([type="submit"]),.contact-form input:not(.wpcf7-submit),.rtb-booking-form textarea,.contact-form textarea,.contact-form select, .sidebar .widget_shopping_cart span.amount, .sidebar .widget_shopping_cart span.quantity,.welcome-block p {color:<?php echo esc_attr($body); ?>}
h1,h2,h3,h4,h5,h6,.label-tagged,.post-tags-social .social-share i,.social-counter li i,.em-booking-form-details .select_wrap:after,.sidebar .select_wrap:after,.woocommerce .select_wrap:after,.select2-container .select2-choice:after,.em-search-field .select_wrap:after,.rtb-booking-form .select_wrap:after,.woocommerce-ordering:after,.single-product .entry-summary .price,.single-menu .menu-desc span.pull-right,.single-menu .product_meta .tagged_as,.single-menu .product_meta .posted_in,.single-menu .product_meta .sku_wrapper,.upsells-products h2,.related-products h2,.team-single h3,.team-single h4,.team-single h5,.team-single h6,.dark.our_team p,.dark .our_team .overlay_content .desc h2,.dark .our_team .overlay_content .desc p,.price_head,.jumbotron .h1,.jumbotron h1,.sidebar .sidebar_divider,.menu_tabs .item_desc,.woocommerce.menu_tabs .star-rating:before,.menu_list h3 span,.single-menu-item.menu-item-list h3 span.price.dark .signature,.welcome-block h2,.welcome-block h1,span.welcome,.art-3 .icon-intro,.breadcumbs .head_breadcumb,.em-calendar-wrapper table.fullcalendar thead td.month_name,.em-calendar-wrapper table.fullcalendar tbody tr.days-names td,.fc th,.entery-header h1,h1.entry-title,.blog_single .entery-header h1,#wpfc-calendar-wrapper .fc-header-title h2,.ui-widget .fc-popover .fc-header .fc-close,.fc-grid .fc-day-number,.single-menu-item span.menu-title,.widget-twitter-feed i{color:<?php echo esc_attr($heading); ?>}
i.icon-large,.head_title.icon-large i,.icon-large > i,.head_title i,.latest_news i,.masonary_blog i,.blog-grid i{color:<?php echo esc_attr($icon); ?>}
a:hover,a:focus,.page-numbers-gold > li > a,.page-numbers-gold > li > span,.page-numbers-gold li i,.page-links a,.list-group-item.active > .badge,.nav-pills > .active > a > .badge,.btn-black .badge,.btn-link,.white-header #shop_cart a.cart-contents i,.white-header #main-menu ul li a,.shop_table tr td a:hover,.single-menu .shop-social-share .social a,.woocommerce-tabs ul.tabs > li > a,.woocommerce p.stars a,.team-single .social li span,.team-single .social li a,.dark.our_team a,.dark .our_team .overlay_content .desc a,.majesty_tab .nav .open > a,.sidebar .custom-search-form .input-group-btn,#footer .widget.woocommerce.widget_product_tag_cloud a:hover,#footer .tagcloud a:hover,.menu_tabs div.tab-menu div.list-group > a,.breadcumbs .banner-breadcumb ol a:hover,.product_meta a:hover,.woocommerce button.single_add_to_cart_button,.woocommerce .menu-item-list2 .button,.woocommerce a.single_add_to_cart_button,table.em-calendar td.eventful a:hover,table.em-calendar td.eventful-today a,table.em-calendar td.eventful-today ul li a,table.em-calendar td.eventful ul li a:hover,.fc-button,.sidebar a,.widget a,.tagcloud a,.tagcloud a:focus,.sidebar .widget_shopping_cart a,.widget_calendar table a:hover,.sidebar .widget_shopping_cart a.remove:hover,.menu-item-list.single-menu-item h3 a,a.dark,.post-meta a,.post-tags-social a,.entry-footer a:hover,.comment-body .fn a,.pingback .edit-link a,.comment-metadata a.comment-edit-link,.comment-metadata a,.em-pagination a:hover,.em-pagination a:focus,.page-numbers > li > a:hover,.page-numbers-gold > li > a:hover,.page-numbers > li > span:hover,.page-numbers-gold > li > span:hover,.page-numbers > li > a:focus,.page-numbers-gold > li > a:focus,.page-numbers > li > span:focus,.page-numbers-gold > li > span:focus,.page-numbers span.current,.page-numbers-gold span.current,.page-numbers span.current,.page-numbers-gold span.current,.page-numbers span.current:hover,.page-numbers-gold span.current:hover,.art-3 a.btn,#footer .custom-search-form .input-group-btn button:hover,.menu-bar.light .menu-fillter a,.widget-twitter-feed a:hover{color:#262626}
.btn-white,.select_wrap select option,#footer select option,.sidebar select option,.woocommerce select option{color:#262626 !important}.select_wrap:after{color:#262626}
a,.dark h1 span,.dark h2 span,.dark h3 span,h1 span,h2 span,h3 span,h4 span,h5 span,h6 span,.dark a:hover,.dark button:hover,.navbar-default .navbar-link:hover,.navbar-default .btn-link:hover,.navbar-default .btn-link:focus,.rating span.active i,.rating i:hover,.btn-dark .badge,.btn-link:hover,.btn-link:focus,#header-sticky-wrapper.white-header #header #main-menu > ul > li > a:hover,#header-sticky-wrapper.is-sticky #header #mega-menu-wrap-top-menu #mega-menu-top-menu > li.mega-menu-item > a:hover,#header-sticky-wrapper.white-header #header #main-menu > ul > li.current > a,#header-sticky-wrapper.is-sticky #header #main-menu > ul > li > a:hover,#header-sticky-wrapper.is-sticky #header #main-menu > ul > li.current > a,#header-sticky-wrapper.is-sticky #header #shop_cart a.cart-contents:hover i,#header-sticky-wrapper.is-sticky #header #shop_cart a.cart-contents i:hover,#header-sticky-wrapper.is-sticky #header.dark-header #mega-menu-wrap-top-menu #mega-menu-top-menu > li.mega-menu-item > a:hover,#header-sticky-wrapper.is-sticky #header.dark-header #main-menu ul li > a:hover,#header-sticky-wrapper.is-sticky #header.dark-header #shop_cart a.cart-contents:hover i,#main-menu ul li a:hover,#main-menu > ul > li:hover a,#main-menu > ul > li.current a,#main-menu > ul > li a.current,#mega-menu-wrap-top-menu #mega-menu-top-menu > li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item:hover a,#main-menu ul ul li:hover > a,#header-sticky-wrapper.white-header #header #main-menu > ul > li:hover a,#header-sticky-wrapper.white-header #header #main-menu > ul > li.current a,#header-sticky-wrapper.white-header #header #main-menu > ul > li a.current,#header-sticky-wrapper.is-sticky #header #main-menu > ul > li:hover a,#header-sticky-wrapper.is-sticky #header #main-menu > ul > li.current a,#header-sticky-wrapper.is-sticky #header #main-menu > ul > li a.current,.vertical-menu ul a:hover,.vertical-menu ul a.current,.product .overlay_content i,.blog_list .blog-content a:hover,.blog_list_2 .blog-content a:hover,.excerpt-content .readmore a i,.post-tags-social span a:hover,a.comment-reply-link:hover i,.overlay_content .overlay .icons a:hover h2,.woocommerce .star-rating span:before,.shop_table tr td a,a.shipping-calculator-button:focus,.widget_shopping_cart p.total .amount,#shop_cart a.cart-contents i:hover,#shop_cart a.cart-contents:hover i,#shop_cart a.cart-contents:hover,#shop_cart .cart_items a:hover,.single-menu .rating .active i:hover,.woocommerce p.stars a.active,.woocommerce p.stars a:hover,.inner-team .item a:hover,.our_team .item .overlay_content .icons a:hover i,.our_team a:hover,.dark .our_team .overlay_content .desc a:hover,.widget_layered_nav_filters li a:before,#footer .widget_recently_viewed_products a:hover span,#footer .widget_top_rated_products a:hover span,#footer .widget_products a:hover span,#footer a:focus,.footer_logo a,.menu_tabs .our-menu-slider .btn-gold i,.menu_list .shop i,.woocommerce .menu-item-list .price,.testimonials.text-right blockquote:before,.testimonials blockquote:before,#menu-scroll li a:after,#menu-scroll li a:focus,.menu-fillter a:focus,.menu-fillter a:after,.wishlist .social-share a:hover,.error-404 h1,.breadcumbs .banner-breadcumb ol a,.woocommerce button.single_add_to_cart_button:before,.woocommerce a.single_add_to_cart_button:before,table.em-calendar td.eventful-post a:hover,table.em-calendar td.eventful a,table.em-calendar td.eventful-today a:hover,table.em-calendar td.eventful-today ul li a:hover,.fc-button:hover,.fc-button .ui-icon:hover,.em-calendar-wrapper table.fullcalendar a.em-calnav-next:hover,.em-calendar-wrapper table.fullcalendar a.em-calnav-prev:hover,.widget_calendar table a,.sidebar a:hover,.widget a:hover,.sidebar .widget_shopping_cart a.remove,.menu-item-list a,.menu-item-list.single-menu-item h3 a:hover,.menu-item-list a:hover h3, .menu-item-list a:hover h2,.post-meta a:hover,.entry-footer a,.post-tags-social a:hover,a.comment-reply-login,.pingback .edit-link a:hover,.comment-metadata a:hover,.comment-body .fn a:hover,#reply-title a:hover,.fc-state-hover,.fc-state-down,.fc-state-active,.fc-state-disabled .fc-state-hover,.fc-grid .fc-day-number,a.action_button:hover,.overlay_content .icons a.added_to_cart,#footer .footer_logo a,#footer .custom-search-form .input-group-btn button,.post-top-blockquote blockquote:before,#footer .widget_calendar table a,.small-menu-icon i,.woocommerce .menu-item-list2 .button i,.menu-bar.light .menu-fillter li.activeFilter a,.menu-bar.light .menu-fillter a:hover,#footer .widget-twitter-feed i,#footer .widget-twitter-feed a:hover,.widget-twitter-feed a,.woocommerce-columns a:hover,.woocommerce-columns li a:hover h2{color:<?php echo esc_attr($main_color); ?>}
.page-numbers-gold > li > a,.page-numbers-gold > li > span,.page-numbers-gold li i,.page-numbers-gold > li > a:hover,.page-numbers-gold > li > span:hover,.page-numbers-gold > li > a:focus,.page-numbers-gold > li > span:focus,.dark .rtb-booking-form button,.post-password-form input[type="submit"],.btn-gold,.btn-white,.btn-black,.btn-gold:hover,.btn-white:hover,.btn-white:active,.btn-white:focus,.dark .open-table-widget input[type="submit"]:hover,.dark .open-table-widget input[type="submit"]:focus,.dark .rtb-booking-form button:hover,.dark .rtb-booking-form button:focus,.sidebar .widget_shopping_cart p.buttons a:hover,.post-password-form input[type="submit"]:active,.post-password-form input[type="submit"]:focus,.woocommerce input[type="submit"]:active,.woocommerce input[type="submit"]:focus,.btn.btn-black:active,.btn.btn-black:focus,.em-booking-submit:hover,.rtb-booking-form button:hover,.dark .rtb-booking-form button,.open-table-widget input[type="submit"]:hover,.dark .open-table-widget input[type="submit"],.menu_tabs .our-menu-slider a.wc-forward:hover,.woocommerce .menu-item-list2 a.wc-forward,.woocommerce .menu-item-list2 a.wc-forward:hover,.woocommerce.menu_tabs .button:hover,.woocommerce .button:hover,.woocommerce button:not(.btn-number):hover,.post-password-form input[type="submit"]:hover,.woocommerce input[type="submit"]:hover,.btn.btn-black:hover,.btn-gold:hover,.btn-gold:focus,.btn-gold.focus,.btn-gold:active,.btn-gold.active,.contact-form input[type="submit"]:focus,.open > .dropdown-toggle.btn-gold,.btn-gold.disabled,.btn-gold.disabled.active,.btn-gold.disabled.focus,.btn-gold.disabled:active,.btn-gold.disabled:focus,.btn-gold.disabled:hover,.btn-gold[disabled],.btn-gold[disabled].active,.btn-gold[disabled].focus,.btn-gold[disabled]:active,.btn-gold[disabled]:focus,.btn-gold[disabled]:hover,fieldset[disabled] .btn-gold,fieldset[disabled] .btn-gold.active,fieldset[disabled] .btn-gold.focus,fieldset[disabled] .btn-gold:active,fieldset[disabled] .btn-gold:focus,fieldset[disabled] .btn-gold:hover,.btn-dark,.btn-dark:hover,.btn-dark:focus,.btn-dark.focus,.btn-dark:active,.btn-dark.active,.open > .dropdown-toggle.btn-dark,.btn-dark.disabled,.btn-dark[disabled],fieldset[disabled] .btn-dark,.btn-dark.disabled:hover,.btn-dark[disabled]:hover,fieldset[disabled] .btn-dark:hover,.btn-dark.disabled:focus,.btn-dark[disabled]:focus,fieldset[disabled] .btn-dark:focus,.btn-dark.disabled.focus,.btn-dark[disabled].focus,fieldset[disabled] .btn-dark.focus,.btn-dark.disabled:active,.btn-dark[disabled]:active,fieldset[disabled] .btn-dark:active,.btn-dark.disabled.active,.btn-dark[disabled].active,fieldset[disabled] .btn-dark.active,.primary-bg:hover,.menu_tabs .our-menu-slider .wc-forward,.woocommerce.menu_tabs .button,.overlay_content a.button,.form-submit #submit:hover,.color-divider,#footer .widget.woocommerce.widget_product_tag_cloud a,#footer .tagcloud a,.wpcf7 input[type="submit"]:focus,.address-content .icon i,.date-blocks .block-item,.countdown-section,.woocommerce button.single_add_to_cart_button,.woocommerce .menu-item-list2 .button,.woocommerce a.single_add_to_cart_button,.tagcloud a:hover,.sidebar .widget.woocommerce.widget_product_tag_cloud a:hover,a.dark:hover,.widget_shopping_cart p.buttons a,.menu_tabs a.view_all:hover,.woocommerce-columns ul.products li .button,.woocommerce .woocommerce-columns a.wc-forward:hover{border-color:<?php echo esc_attr($main_color); ?>}
.woocommerce .menu-item-list2 .button:hover,.page-numbers-gold > li > a:hover,.page-numbers-gold > li > span:hover,.page-numbers-gold > li > a:focus,.page-numbers-gold > li > span:focus,.gold-blockquote,.label-default,.label-tagged:hover,.btn-gold:hover,.btn-gold:active,.btn-gold:focus,.btn-white:hover,.btn-white:active,.btn-white:focus,.dark .open-table-widget input[type="submit"]:hover,.dark .open-table-widget input[type="submit"]:focus,.dark .rtb-booking-form button:hover,.dark .rtb-booking-form button:focus,.sidebar .widget_shopping_cart p.buttons a:hover,.post-password-form input[type="submit"]:active,.post-password-form input[type="submit"]:focus,.woocommerce input[type="submit"]:active,.woocommerce input[type="submit"]:focus,.btn.btn-black:active,.btn.btn-black:focus,.em-booking-submit:hover,.rtb-booking-form button:hover,.open-table-widget input[type="submit"]:hover,.menu_tabs .our-menu-slider a.wc-forward:hover,.woocommerce .menu-item-list2 a.wc-forward,.woocommerce .menu-item-list2 a.wc-forward:hover,.woocommerce.menu_tabs .button:hover,.woocommerce .button:hover,.woocommerce button:not(.btn-number):hover,.post-password-form input[type="submit"]:hover,.woocommerce input[type="submit"]:hover,.btn.btn-black:hover,.btn-gold:hover,.btn-gold:focus,.btn-gold.focus,.btn-gold:active,.btn-gold.active,.contact-form input[type="submit"]:focus,.open > .dropdown-toggle.btn-gold,.btn-dark,.btn-dark:hover,.btn-dark:focus,.btn-dark.focus,.btn-dark:active,.btn-dark.active,.open > .dropdown-toggle.btn-dark,.btn-dark.disabled,.btn-dark[disabled],fieldset[disabled] .btn-dark,.btn-dark.disabled:hover,.btn-dark[disabled]:hover,fieldset[disabled] .btn-dark:hover,.btn-dark.disabled:focus,.btn-dark[disabled]:focus,fieldset[disabled] .btn-dark:focus,.btn-dark.disabled.focus,.btn-dark[disabled].focus,fieldset[disabled] .btn-dark.focus,.btn-dark.disabled:active,.btn-dark[disabled]:active,fieldset[disabled] .btn-dark:active,.btn-dark.disabled.active,.btn-dark[disabled].active,fieldset[disabled] .btn-dark.active,.primary-bg,.primary-bg:hover,.theme-color,#loader .spinner > div,#loader2 .spinner > div,#loader3 .spinner > div,#loader3,#loader2 .sk-spinner-wave div,#scroll_up:hover,.onsale,.featured-product,.our-menu .overlay_content .label,.interest-in .overlay_content .label,.menu_grid .overlay_content .label,.menu_list .overlay_content .label,.entery-content .page-links a:hover,.form-submit #submit:hover,.single-menu .product_meta .tagged_as,.woocommerce-tabs ul.tabs > li.active > a,.swiper-pagination-bullet-active,.skippr-nav-container .skippr-nav-element:hover,.skippr-nav-container .skippr-nav-element-active,.dark .owl-theme .owl-controls .owl-page.active span,.dark .our_team .owl-controls .owl-page.active span,.pricing_table .theme-color h3,.mark,mark,.dropcap,.jumbotron,.accordion_majesty a:hover.panel-link,.majesty_tab .nav-tabs > li > a:hover,.sidebar .custom-search-form .input-group-btn:hover,.widget_price_filter .ui-widget-header,.widget_price_filter .ui-state-default,.widget_price_filter .ui-widget-content .ui-state-default,.widget_price_filter .ui-widget-header .ui-state-default,#footer .widget.woocommerce.widget_product_tag_cloud a,#footer .tagcloud a,.menu_tabs div.tab-menu div.list-group > a.active,.menu_list .label,.menu-item-list .label,.panel-gold > .panel-heading,.panel-gold .panel-footer,table.em-calendar td.eventful ul,.tagcloud a:hover,.sidebar .widget.woocommerce.widget_product_tag_cloud a:hover,a.dark:hover,.widget_shopping_cart p.buttons a,#shop_cart a.cart-contents span,.majesty_tab .nav-tabs > li.active > a,.majesty_tab .nav-tabs > li.active > a:focus,.menu_tabs a.view_all:hover,.woocommerce .menu-item-list2 a.wc-forward:hover,.woocommerce-columns ul.products li .button:hover,.woocommerce .woocommerce-columns a.wc-forward:hover{background:<?php echo esc_attr($main_color); ?>;background-color:<?php echo esc_attr($main_color); ?>}
.color-progress{background-color: <?php echo esc_attr($main_color); ?>;}.blockquote-reverse,blockquote.pull-right{border-right-color: <?php echo esc_attr($main_color); ?>;}
#mega-menu-wrap-top-menu #mega-menu-top-menu > li.mega-menu-flyout ul.mega-sub-menu,#main-menu ul ul,#mega-menu-wrap-top-menu #mega-menu-top-menu > li.mega-menu-flyout ul.mega-sub-menu,#main-menu.dark ul ul,#mega-menu-wrap-top-menu #mega-menu-top-menu > li.mega-menu-megamenu > ul.mega-sub-menu,#shop_cart .shop_cart_content{border-top-color:<?php echo esc_attr($main_color); ?>}
.fc-event,.picker--focused .picker__list-item--highlighted,.picker__list-item--highlighted:hover,.picker__list-item:hover,.picker__nav--next:hover,.picker__nav--prev:hover,.picker__button--clear:hover,.picker__button--close:hover,.picker__button--today:hover,.picker--focused .picker__day--highlighted,.picker__day--highlighted:hover,.picker__day--infocus:hover,.picker__day--outfocus:hover{background:<?php echo esc_attr($main_color); ?> !important}.picker__button--clear:hover,.picker__button--close:hover,.picker__button--today:hover,.picker__list-item--highlighted{border-color:<?php echo esc_attr($main_color); ?> !important}.picker__list-item:hover{border-color:#f1f1f1 !important}
table.em-calendar td.eventless-today,table.em-calendar td.eventful-today{background-color:<?php echo esc_attr($main_color); ?>}
.woocommerce-columns ul.products li .button:hover,.woocommerce .menu-item-list2 .button:hover i,.woocommerce .menu-item-list2 .button:hover,.overlay_content .icons a.added_to_cart:hover,.woocommerce input[type="submit"],.excerpt-content .readmore a:hover,#footer .footer_logo a:hover,.art-3 a.btn:hover,.tagcloud a:hover{color:#FFF}
@media only screen and (max-width: 991px){#mega-menu-wrap-top-menu #mega-menu-top-menu > li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item a:hover,#mega-menu-wrap-top-menu #mega-menu-top-menu > li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item a:focus,#mega-menu-wrap-top-menu #mega-menu-top-menu > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item > a:hover,#mega-menu-wrap-top-menu #mega-menu-top-menu > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item > a:focus,#mega-menu-wrap-top-menu #mega-menu-top-menu > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item li.mega-menu-item > a:hover,#mega-menu-wrap-top-menu #mega-menu-top-menu > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item li.mega-menu-item > a:focus,#main-menu.dark ul ul li:hover > a,#main-menu ul ul li:hover > a{color:<?php echo esc_attr($main_color); ?> !important}#main-menu ul li a:hover,#main-menu.style-white > ul > li > a:hover{color:<?php echo esc_attr($main_color); ?>}#header.dark-header #main-menu ul li a:hover{color:<?php echo esc_attr($main_color); ?>}#mega-menu-wrap-top-menu #mega-menu-top-menu > li.mega-menu-flyout ul.mega-sub-menu,#mega-menu-wrap-top-menu #mega-menu-top-menu > li.mega-menu-megamenu > ul.mega-sub-menu,#mega-menu-wrap-top-menu #mega-menu-top-menu > li.mega-menu-megamenu > ul.mega-sub-menu > li ul.mega-sub-menu,#main-menu ul ul ul,#main-menu.dark ul ul,#main-menu ul ul{border-top-color:<?php echo esc_attr($main_color); ?>}}@media only screen and (min-width: 480px) and (max-width: 767px){.navbar-default .navbar-nav .open .dropdown-menu > li > a:hover,.navbar-default .navbar-nav .open .dropdown-menu > li > a:focus{color:<?php echo esc_attr($main_color); ?>}}
</style>
<?php
}
add_action( 'wp_head', 'sama_output_custom_css_color', 50 );
?>