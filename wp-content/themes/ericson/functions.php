<?php

// theme setup
if (!function_exists('ericson_setup')):
	function ericson_setup() {
		register_nav_menus( array(
			'primary'   => __('Primary Menu', 'ericson'),
			'footerone'   => __('Footer Column 1 Menu', 'ericson'),
      'footertwo'   => __('Footer Column 2 Menu', 'ericson'),
      'footerthree'   => __('Footer Column 3 Menu', 'ericson')
		));
		add_image_size('featured', 1170, 400, true);
		// editor style
		function ericson_editor_style() {
		  add_editor_style( get_template_directory_uri() . '/css/editor-style.css' );
		}
		add_action('after_setup_theme', 'ericson_editor_style');
	}
endif;
add_action('after_setup_theme', 'ericson_setup');

function ericson_theme_customizer( $wp_customize ) {
  $wp_customize->add_section( 'ericson_logo_section' , array(
	  'title'       => __( 'Logo', 'ericson' ),
	  'priority'    => 30,
	  'description' => 'Upload a logo to replace the default site name and description in the header',
	));
	$wp_customize->add_setting( 'ericson_logo' );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ericson_logo', array(
	  'label'    => __( 'Logo', 'ericson' ),
	  'section'  => 'ericson_logo_section',
	  'settings' => 'ericson_logo',
	)));

  $wp_customize->add_section( 'ericson_secondary_logo_section' , array(
    'title'       => __( 'Secondary Logo', 'ericson' ),
    'priority'    => 30,
    'description' => 'Upload a secondary logo to replace the default site name and description in the header',
  ));
  $wp_customize->add_setting( 'ericson_secondary_logo' );
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ericson_secondary_logo', array(
    'label'    => __( 'Secondary Logo', 'ericson' ),
    'section'  => 'ericson_secondary_logo_section',
    'settings' => 'ericson_secondary_logo',
  )));

  $wp_customize->add_section( 'ericson_header_settings_section' , array(
    'title'       => __( 'Header Settings', 'ericson' ),
    'priority'    => 30,
    'description' => 'Settings for the site header',
  ));
  $wp_customize->add_setting( 'ericson_header_settings_button_text' );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ericson_header_settings_button_text', array(
    'label'    => __( 'Button Text', 'ericson' ),
    'section'  => 'ericson_header_settings_section',
    'settings' => 'ericson_header_settings_button_text',
  )));
  $wp_customize->add_setting( 'ericson_header_settings_button_link' );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ericson_header_settings_button_link', array(
    'label'    => __( 'Button Link', 'ericson' ),
    'section'  => 'ericson_header_settings_section',
    'settings' => 'ericson_header_settings_button_link',
  )));
  $wp_customize->add_section( 'ericson_footer_settings_section' , array(
    'title'       => __( 'Footer Settings', 'ericson' ),
    'priority'    => 30,
    'description' => 'Settings for the site footer',
  ));
  $wp_customize->add_setting( 'ericson_footer_certification_img' );
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ericson_footer_certification_img', array(
    'label'    => __( 'Certification Image', 'ericson' ),
    'section'  => 'ericson_footer_settings_section',
    'settings' => 'ericson_footer_certification_img',
  )));
  $wp_customize->add_setting( 'ericson_footer_cert_link' );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ericson_footer_cert_link', array(
    'label'    => __( 'Certification Link', 'ericson' ),
    'section'  => 'ericson_footer_settings_section',
    'settings' => 'ericson_footer_cert_link',
  )));
  $wp_customize->add_setting( 'ericson_footer_company_name' );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ericson_footer_company_name', array(
    'label'    => __( 'Company Name', 'ericson' ),
    'section'  => 'ericson_footer_settings_section',
    'settings' => 'ericson_footer_company_name',
  )));
  $wp_customize->add_setting( 'ericson_footer_company_address' );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ericson_footer_company_address', array(
    'label'    => __( 'Company Address', 'ericson' ),
    'section'  => 'ericson_footer_settings_section',
    'settings' => 'ericson_footer_company_address',
  )));
  $wp_customize->add_setting( 'ericson_footer_company_phone_prefix' );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ericson_footer_company_phone_prefix', array(
    'label'    => __( 'Company Phone Prefix', 'ericson' ),
    'section'  => 'ericson_footer_settings_section',
    'settings' => 'ericson_footer_company_phone_prefix',
  )));
  $wp_customize->add_setting( 'ericson_footer_company_phone' );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ericson_footer_company_phone', array(
    'label'    => __( 'Company Phone', 'ericson' ),
    'section'  => 'ericson_footer_settings_section',
    'settings' => 'ericson_footer_company_phone',
  )));
  $wp_customize->add_setting( 'ericson_footer_company_logo' );
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ericson_footer_company_logo', array(
    'label'    => __( 'Company Logo', 'ericson' ),
    'section'  => 'ericson_footer_settings_section',
    'settings' => 'ericson_footer_company_logo',
  )));
  $wp_customize->add_setting( 'ericson_footer_linkedin_address' );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ericson_footer_linkedin_address', array(
    'label'    => __( 'Linked-In URL', 'ericson' ),
    'section'  => 'ericson_footer_settings_section',
    'settings' => 'ericson_footer_linkedin_address',
  )));
  $wp_customize->add_setting( 'ericson_footer_twitter_address' );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ericson_footer_twitter_address', array(
    'label'    => __( 'Twitter URL', 'ericson' ),
    'section'  => 'ericson_footer_settings_section',
    'settings' => 'ericson_footer_twitter_address',
  )));
  $wp_customize->add_setting( 'ericson_footer_facebook_address' );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ericson_footer_facebook_address', array(
    'label'    => __( 'Facebook URL', 'ericson' ),
    'section'  => 'ericson_footer_settings_section',
    'settings' => 'ericson_footer_facebook_address',
  )));
  $wp_customize->add_setting( 'ericson_footer_youtube_address' );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ericson_footer_youtube_address', array(
    'label'    => __( 'YouTube URL', 'ericson' ),
    'section'  => 'ericson_footer_settings_section',
    'settings' => 'ericson_footer_youtube_address',
  )));
  $wp_customize->add_setting( 'ericson_footer_instagram_address' );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ericson_footer_instagram_address', array(
    'label'    => __( 'Instagram URL', 'ericson' ),
    'section'  => 'ericson_footer_settings_section',
    'settings' => 'ericson_footer_instagram_address',
  )));
}
add_action( 'customize_register', 'ericson_theme_customizer' );


// load css
function ericson_css() {
	wp_enqueue_style('ericson_bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css');
  wp_enqueue_style('ericson_fontawesome', 'https://use.fontawesome.com/releases/v5.3.1/css/all.css');
  wp_enqueue_style('ericson_exo_2', 'https://fonts.googleapis.com/css?family=Exo+2:200,300,400,500,700,900,400i');
  wp_enqueue_style('ericson_animate_css', get_template_directory_uri() . '/css/animate.min.css');
	wp_enqueue_style('ericson_style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'ericson_css');

// load javascript
function ericson_javascript() {
	wp_enqueue_script('ericson_bootstrap_js', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array('jquery'), '4.1', true);
	wp_enqueue_script('ericson_parallax_js', get_template_directory_uri() . '/js/parallax.min.js', array('jquery'), '1.0', true);
  wp_enqueue_script('ericson_bcswipe_js', get_template_directory_uri() . '/js/jquery.bcSwipe.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('ericson_script', get_template_directory_uri() . '/js/ericson.js', array('jquery'), '1.0', true);
	if (is_singular() && comments_open()) {wp_enqueue_script('comment-reply');}
}
add_action('wp_enqueue_scripts', 'ericson_javascript');

// html5 shiv
function ericson_html5_shiv() {
    echo '<!--[if lt IE 9]>';
    echo '<script src="'. get_template_directory_uri() .'/js/html5shiv.js"></script>';
    echo '<![endif]-->';
}
add_action('wp_head', 'ericson_html5_shiv');


function ericson_industry_category_init() {
  // create a new taxonomy
  register_taxonomy(
    'industry',
    'industries',
    array(
      'label' => __( 'Industry Categories' ),
      'rewrite' => array( 'slug' => 'industry' ),
      'hierarchical' => true
    )
  );
}
add_action( 'init', 'ericson_industry_category_init' );

function ericson_service_category_init() {
  // create a new taxonomy
  register_taxonomy(
    'service',
    'services',
    array(
      'label' => __( 'Service Categories' ),
      'rewrite' => array( 'slug' => 'service' ),
      'hierarchical' => true
    )
  );
}
add_action( 'init', 'ericson_service_category_init' );

function ericson_product_category_category_init() {
  // create a new taxonomy
  register_taxonomy(
    'product_category',
    'product_categories',
    array(
      'label' => __( 'Product Categories' ),
      'rewrite' => array( 'slug' => 'product-category' ),
      'hierarchical' => true
    )
  );
}
add_action( 'init', 'ericson_product_category_category_init' );

function ericson_case_study_category_init() {
  // create a new taxonomy
  register_taxonomy(
    'case_study',
    'case_studies',
    array(
      'label' => __( 'Case Study Categories' ),
      'rewrite' => array( 'slug' => 'case_study' ),
      'hierarchical' => true
    )
  );
}
add_action( 'init', 'ericson_case_study_category_init' );

function ericson_white_paper_category_init() {
  // create a new taxonomy
  register_taxonomy(
    'white_paper',
    'white_papers',
    array(
      'label' => __( 'White Paper Categories' ),
      'rewrite' => array( 'slug' => 'white-paper' ),
      'hierarchical' => true
    )
  );
}
add_action( 'init', 'ericson_white_paper_category_init' );


function ericson_brochure_category_init() {
  // create a new taxonomy
  register_taxonomy(
    'brochure',
    'brochures',
    array(
      'label' => __( 'Brochure Categories' ),
      'rewrite' => array( 'slug' => 'brochure' ),
      'hierarchical' => true
    )
  );
}
add_action( 'init', 'ericson_brochure_category_init' );


function ericson_hub_offer_category_init() {
  // create a new taxonomy
  register_taxonomy(
    'hub_offer',
    'hub_offers',
    array(
      'label' => __( 'Hubspot Offer Categories' ),
      'rewrite' => array( 'slug' => 'hub-offer' ),
      'hierarchical' => true
    )
  );
}
add_action( 'init', 'ericson_hub_offer_category_init' );

function ericson_history_timeline_category_init() {
  // create a new taxonomy
  register_taxonomy(
    'history_timeline',
    'history_timelines',
    array(
      'label' => __( 'History Timeline Categories' ),
      'rewrite' => array( 'slug' => 'history-timeline' ),
      'hierarchical' => true
    )
  );
}
add_action( 'init', 'ericson_history_timeline_category_init' );


function ericson_create_post_type() {
  register_post_type( 'industries',
    array(
      'labels' => array(
        'name' => __( 'Industries' ),
        'singular_name' => __( 'Industry' )
      ),
      'public' => true,
      'has_archive' => false,
      'rewrite' => array('slug' => 'industries'),
      'taxonomies' => array( 'industry' ),
    )
  );
  register_post_type( 'services',
    array(
      'labels' => array(
        'name' => __( 'Services' ),
        'singular_name' => __( 'Service' )
      ),
      'public' => true,
      'has_archive' => false,
      'rewrite' => array('slug' => 'services'),
      'taxonomies' => array( 'service' ),
    )
  );
  register_post_type( 'product_categories',
    array(
      'labels' => array(
        'name' => __( 'Product Categories' ),
        'singular_name' => __( 'Product Category' )
      ),
      'public' => true,
      'has_archive' => false,
      'rewrite' => array('slug' => 'product-categories'),
      'taxonomies' => array( 'product_category' ),
      'hierarchical' => true,
      'supports' => array(
        'page-attributes',
        'title',
      ),
    )
  );
  register_post_type( 'case_studies',
    array(
      'labels' => array(
        'name' => __( 'Case Studies' ),
        'singular_name' => __( 'Case Study' )
      ),
      'public' => true,
      'has_archive' => false,
      'rewrite' => array('slug' => 'resources/case-studies'),
      'taxonomies' => array( 'case_study' ),
    )
  );
  register_post_type( 'white_papers',
    array(
      'labels' => array(
        'name' => __( 'White Papers' ),
        'singular_name' => __( 'White Paper' )
      ),
      'public' => true,
      'has_archive' => false,
      'rewrite' => array('slug' => 'resources/white-papers'),
      'taxonomies' => array( 'white_paper' ),
    )
  );

	register_post_type( 'brochures',
		array(
			'labels' => array(
				'name' => __( 'Brochures' ),
				'singular_name' => __( 'Brochures' )
			),
			'public' => true,
			'has_archive' => false,
			'rewrite' => array('slug' => 'resources/brochures'),
			'taxonomies' => array( 'brochure' ),
		)
	);

  register_post_type( 'hub_offers',
    array(
      'labels' => array(
        'name' => __( 'Hubspot Offers' ),
        'singular_name' => __( 'Hubspot Offer' )
      ),
      'public' => true,
      'has_archive' => false,
      'rewrite' => array('slug' => 'hubspot-offers'),
      'taxonomies' => array( 'hub_offer' ),
    )
  );
  register_post_type( 'history_timelines',
    array(
      'labels' => array(
        'name' => __( 'History Timeline Items' ),
        'singular_name' => __( 'History Timeline Item' )
      ),
      'public' => true,
      'has_archive' => false,
      'rewrite' => array('slug' => 'history-timeline-item'),
      'taxonomies' => array( 'history_timeline' ),
    )
  );
}
add_action( 'init', 'ericson_create_post_type' );


function ericson_edit_admin_menus() {
    global $menu;
    global $submenu;

    $menu[5][0] = 'News & Events'; // Change Posts to News & Events

    $submenu['edit.php'][5][0] = 'All News & Events'; // Change All Posts to All News & Events
}
add_action( 'admin_menu', 'ericson_edit_admin_menus' );

function create_bootstrap_menu( $theme_location ) {
  if ( ($theme_location) && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location]) ) {
    if($theme_location === 'primary'){
      $theme_logo = get_theme_mod( 'ericson_logo' );
      $site_name = get_bloginfo( 'name', 'display' );
      $menu_list  = '<nav class="navbar navbar-expand-lg navbar-light">' ."\n";
      $menu_list  .= '<h2 class="sr-only">Navigation</h2>' ."\n";
      $menu_list .= '<a class="navbar-brand" href="' . home_url() . '">' ."\n";
      if ( get_theme_mod( 'ericson_logo' ) ){
        $menu_list .= '<img alt="' . $site_name . '" src="' . $theme_logo . '" class="img-fluid">' ."\n";
      }
      else {
        $menu_list .= $site_name ."\n";
      }
      $menu_list .= '</a>' ."\n";
      $menu_list .= '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ericsonNavBar" aria-controls="ericsonNavBar" aria-expanded="false" aria-label="Toggle navigation">' ."\n";
      $menu_list .= '<span class="navbar-toggler-icon"></span>' ."\n";
      $menu_list .= '</button>' ."\n";
      $menu = get_term( $locations[$theme_location], 'nav_menu' );
      $menu_items = wp_get_nav_menu_items($menu->term_id);
      $menu_list .= '<div class="collapse navbar-collapse" id="ericsonNavBar">' ."\n";
      $menu_list .= '<ul class="navbar-nav mr-auto">' ."\n";

      foreach( $menu_items as $menu_item ) {
        if( (int)$menu_item->menu_item_parent === 0 ) {
          $parent = $menu_item->ID;
          $menu_array = array();
          foreach( $menu_items as $submenu ) {
            $submenu_parent = $submenu->ID;
            if( (int)$submenu->menu_item_parent === $parent ) {
              $submenu_array = array();
              $submenu_list = NULL;
              foreach ($menu_items as $tertiarymenu) {
                if( (int)$tertiarymenu->menu_item_parent === $submenu_parent ) {
                  $tertiarymenumenu_parent = $tertiarymenu->ID;

                  $tertiarymenu_array = array();
                  $tertiarymenu_list = NULL;
                  foreach ($menu_items as $quaternarymenu) {
                    if( (int)$quaternarymenu->menu_item_parent === $tertiarymenumenu_parent ) {
                      if(isset($quaternarymenu->target)){
                        $quaternarymenu_link_target = ' target="' . $quaternarymenu->target . '" ';
                      }
                      else {
                        $quaternarymenu_link_target = '';
                      }
                      $tertiarymenu_array[] = '<li class="nav-item"><a href="' . $quaternarymenu->url . '" ' . $quaternarymenu_link_target . ' class="nav-link">' . $quaternarymenu->title . '</a></li>' ."\n";
                    }
                  }
                  if(sizeof($tertiarymenu_array) > 0) {
                    if(isset($tertiarymenu->target)){
                      $tertiarymenu_link_target = ' target="' . $tertiarymenu->target . '" ';
                    }
                    else {
                      $tertiarymenu_link_target = '';
                    }
                    $tertiarymenu_list .= '<li class="nav-item dropdown">' ."\n";
                    $tertiarymenu_list .= '<a href="' . $tertiarymenu->url . '" ' . $tertiarymenu_link_target . ' class="nav-link">' . $tertiarymenu->title . ' <i class="fas fa-chevron-right"></i></a>' ."\n";
                    $tertiarymenu_list .= '<ul class="dropdown-menu">' ."\n";
                    $tertiarymenu_list .= implode( "\n", $tertiarymenu_array );
                    $tertiarymenu_list .= '</ul>' ."\n";
                    $tertiarymenu_list .= '</li>' ."\n";
                    $submenu_array[] = $tertiarymenu_list;
                  }
                  else {
                    if(isset($tertiarymenu->target)){
                      $tertiarymenu_link_target = ' target="' . $tertiarymenu->target . '" ';
                    }
                    else {
                      $tertiarymenu_link_target = '';
                    }
                    $submenu_array[] = '<li class="nav-item"><a href="' . $tertiarymenu->url . '" ' . $tertiarymenu_link_target . ' class="nav-link">' . $tertiarymenu->title . '</a></li>' ."\n";
                  }

                }
              }
              if(sizeof($submenu_array) > 0) {
                if(isset($submenu->target)){
                  $submenu_link_target = ' target="' . $submenu->target . '" ';
                }
                else {
                  $submenu_link_target = '';
                }
                $bool = true;
                $submenu_list .= '<li class="nav-item dropdown">' ."\n";
                $submenu_list .= '<a href="' . $submenu->url . '" ' . $submenu_link_target . ' class="nav-link">' . $submenu->title . ' <i class="fas fa-chevron-right"></i></a>' ."\n";
                $submenu_list .= '<ul class="dropdown-menu">' ."\n";
                $submenu_list .= implode( "\n", $submenu_array );
                $submenu_list .= '</ul>' ."\n";
                $submenu_list .= '</li>' ."\n";
                $menu_array[] = $submenu_list;
              }
              else {
                if(isset($submenu->target)){
                  $submenu_link_target = ' target="' . $submenu->target . '" ';
                }
                else {
                  $submenu_link_target = '';
                }
                $bool = true;
                $menu_array[] = '<li class="nav-item"><a href="' . $submenu->url . '" ' . $submenu_link_target . ' class="nav-link">' . $submenu->title . '</a></li>' ."\n";
              }
            }
          }
          if(sizeof($menu_array) > 0) {
            if(isset($menu_item->target)){
              $menu_item_link_target = ' target="' . $menu_item->target . '" ';
            }
            else {
              $menu_item_link_target = '';
            }
            $menu_list .= '<li class="nav-item dropdown">' ."\n";
            $menu_list .= '<a href="' . $menu_item->url . '" ' . $menu_item_link_target . ' class="nav-link">' . $menu_item->title . '</a>' ."\n";
            $menu_list .= '<ul class="dropdown-menu">' ."\n";
            $menu_list .= implode( "\n", $menu_array );
            $menu_list .= '</ul>' ."\n";
            $menu_list .= '</li>' ."\n";
          }
          else {
            if(isset($menu_item->target)){
              $menu_item_link_target = ' target="' . $menu_item->target . '" ';
            }
            else {
              $menu_item_link_target = '';
            }
            $menu_list .= '<li class="nav-item">' ."\n";
            $menu_list .= '<a href="' . $menu_item->url . '" ' . $menu_item_link_target . ' class="nav-link">' . $menu_item->title . '</a>' ."\n";
            $menu_list .= '</li>' ."\n";
          }
        }
        //$menu_list .= '</li>' ."\n";
      }
      $menu_list .= '</ul>' ."\n";
      $menu_list .= '</div>' ."\n";
      $menu_list .= '</nav>' ."\n";
    }
    else {
      $menu_list  = '<div class="footer-nav">' ."\n";
      $menu = get_term( $locations[$theme_location], 'nav_menu' );
      $menu_items = wp_get_nav_menu_items($menu->term_id);
      $menu_list .= '<ul>' ."\n";

      foreach( $menu_items as $menu_item ) {
        if( $menu_item->menu_item_parent == 0 ) {
          $parent = $menu_item->ID;
          $menu_array = array();
          foreach( $menu_items as $submenu ) {
            if( $submenu->menu_item_parent == $parent ) {
              $bool = true;
              $menu_array[] = '<li><a href="' . $submenu->url . '" class="footer-menu-submenu">' . $submenu->title . '</a></li>' ."\n";
            }
          }
          if( $bool == true && count( $menu_array ) > 0 ) {
            $menu_list .= '<li>' ."\n";
            $menu_list .= '<a href="' . $menu_item->url . '" class="footer-menu-category">' . $menu_item->title . ' <span class="caret"></span></a>' ."\n";
            $menu_list .= '<ul class="footer-menu-submenu">' ."\n";
            $menu_list .= implode( "\n", $menu_array );
            $menu_list .= '</ul>' ."\n";
          } else {
            $menu_list .= '<li>' ."\n";
            $menu_list .= '<a href="' . $menu_item->url . '" class="footer-menu-category">' . $menu_item->title . '</a>' ."\n";
          }
        }
        $menu_list .= '</li>' ."\n";
      }
      $menu_list .= '</ul>' ."\n";
      $menu_list .= '</div>' ."\n";
    }
  } else {
    $menu_list = '<!-- no menu defined in location "'.$theme_location.'" -->';
  }
  echo $menu_list;
}

function breadcrumbs() {

    // Settings
    $separator          = '/';
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'breadcrumbs';
    $home_title         = 'Home';

    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'product_cat';

    // Get the query & post information
    global $post,$wp_query;

    // Do not display on the homepage
    if ( !is_front_page() ) {

        // Build the breadcrums
        echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';

        // Home page
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
        echo '<li class="separator separator-home"> ' . $separator . ' </li>';

        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {

            echo '<li class="item-current item-archive"><span class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</span></li>';

        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {

            // If post is a custom post type
            $post_type = get_post_type();

            // If it is a custom post type display name and link
            if($post_type != 'post') {

                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);

                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';

            }

            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><span class="bread-current bread-archive">' . $custom_tax_name . '</span></li>';

        } else if ( is_single() ) {

            // If post is a custom post type
            $post_type = get_post_type();

            // If it is a custom post type display name and link
            if($post_type != 'post') {

                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);

                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';

            }

            // Get post category info
            $category = get_the_category();

            if(!empty($category)) {

                // Get last category post is in
                $last_category = end(array_values($category));

                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);

                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                    $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
                }

            }

            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {

                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;

            }

            // Check if the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<li class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</span></li>';

            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {

                echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
                echo '<li class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</span></li>';

            } else {

                echo '<li class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</span></li>';

            }

        } else if ( is_category() ) {

            // Category page
            echo '<li class="item-current item-cat"><span class="bread-current bread-cat">' . single_cat_title('', false) . '</span></li>';

        } else if ( is_page() ) {

            // Standard page
            if( $post->post_parent ){

                // If child page, get parents
                $anc = get_post_ancestors( $post->ID );

                // Get parents in the right order
                $anc = array_reverse($anc);

                // Parent page loop
                if ( !isset( $parents ) ) $parents = null;
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }

                // Display parent pages
                echo $parents;

                // Current page
                echo '<li class="item-current item-' . $post->ID . '"><span title="' . get_the_title() . '"> ' . get_the_title() . '</span></li>';

            } else {

                // Just display current page if not parents
                echo '<li class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</span></li>';

            }

        } else if ( is_tag() ) {

            // Tag page

            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;

            // Display the tag name
            echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><span class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';

        } elseif ( is_day() ) {

            // Day archive

            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';

            // Day display
            echo '<li class="item-current item-' . get_the_time('j') . '"><span class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</span></li>';

        } else if ( is_month() ) {

            // Month Archive

            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

            // Month display
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><span class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</span></li>';

        } else if ( is_year() ) {

            // Display year archive
            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><span class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</span></li>';

        } else if ( is_author() ) {

            // Auhor archive

            // Get the author information
            global $author;
            $userdata = get_userdata( $author );

            // Display author name
            echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><span class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</span></li>';

        } else if ( get_query_var('paged') ) {

            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><span class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</span></li>';

        } else if ( is_search() ) {

            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '"><span class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</span></li>';

        } elseif ( is_404() ) {

            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }

        echo '</ul>';

    }

}







function ericson_custom_menu_order($menu_ord) {
    if (!$menu_ord) return true;

    return array(
        'index.php', // Dashboard
        'separator1', // First separator
        'edit.php?post_type=page', // Pages
        'edit.php', // News & Events
        'edit.php?post_type=industries', // Industries
        'edit.php?post_type=services', // Services
        'edit.php?post_type=product_categories', // Product Category
        'edit.php?post_type=case_studies', // Case Studies
        'edit.php?post_type=white_papers', // White Papers
				'edit.php?post_type=brochures', // Brochures
        'edit.php?post_type=hub_offers', // Hubspot Offers
        'edit.php?post_type=history_timelines', // History Timeline Items
        'separator2', // Second separator
        'themes.php', // Appearance
        'plugins.php', // Plugins
        'users.php', // Users
        'edit-comments.php', // Comments
        'upload.php', // Media
        'tools.php', // Tools
        'options-general.php', // Settings
        'separator-last', // Last separator
    );
}
add_filter('custom_menu_order', 'ericson_custom_menu_order'); // Activate custom_menu_order
add_filter('menu_order', 'ericson_custom_menu_order');

flush_rewrite_rules( false );
