<?php
	$main_logo = get_theme_mod( 'ericson_logo' );
	$secondary_logo = get_theme_mod( 'ericson_secondary_logo' );
	$site_name = get_bloginfo( 'name', 'display' );
	$home_url = home_url();
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta charset="<?php bloginfo('charset'); ?>" />
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" />
	<title><?php wp_title( '|', true, 'right' ); ?> <?php bloginfo('name'); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <?php wp_head(); ?>

 <!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '176371822969209');
fbq('track', 'PageView');
</script>
<noscript>
<img height="1" width="1"
src="https://www.facebook.com/tr?id=176371822969209&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->

</head>

<body <?php body_class(); ?>>

<header class="site-header">

	<h2 class="sr-only"><?php print get_bloginfo( 'name', 'display' ); ?></h2>

	<div class="searchbar-wrapper">
		<div class="container">
			<div class="row">
				<div class="col text-right search-bar-links">
					<div class="main-secondary-nav">
						<a href="/request-a-quote/" class="btn btn-tertiary inverse">Request A Quote</a> <a href="https://products.ericson.com/checkout/cart/" class="cart-link"><span class="sr-only">Shopping Cart</span><i class="fas fa-shopping-cart"></i></a> <button class="search-link" id="toggle-search"><span class="sr-only">Search</span><i class="fas fa-search"></i></button>
					</div>
					<div class="hidden-secondary-nav">

						<div class="product-quote-container">
							<a href="/request-a-quote/" class="btn btn-primary">Request A Quote</a> <button class="close-link"><span class="sr-only">Close</span><i class="fas fa-times"></i></button>
						</div>

						<div class="product-search-container"><form action="https://products.ericson.com/catalogsearch/result/" method="get"><label for="product-search" class="sr-only">Product Search</label><input type="text" name="q" class="form-control" id="product-search" placeholder="Product Search"><input type="submit" alt="Search" value="Search" class="search-link"><i class="fas fa-search site-search-icon"></i></form></div> <div class="site-search-container"><form action="/" method="get"><label for="site-search" class="sr-only">Site Search</label><input type="text" name="s" class="form-control" id="site-search" placeholder="Site Search"><input type="submit" alt="Search" value="Search" class="search-link"><i class="fas fa-search site-search-icon"></i></form></div>
						<button class="close-link desktop"><span class="sr-only">Close</span><i class="fas fa-times"></i></button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="partner-portal-wrapper">
		<div class="container">
			<div class="row">
				<div class="col text-right">
					<a href="https://products.ericson.com/b2b/portal/login/">Partner Portal</a>
				</div>
			</div>
		</div>
	</div>

	<div class="secondary-logo-wrapper">
		<div class="text-center secondary-logo">
			<a href="<?php print $home_url; ?>"><img alt="<?php print $site_name; ?>" src="<?php print $secondary_logo; ?>" class="img-fluid"></a>
		</div>
	</div>

	<div class="main-navigation">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<!-- menu markup in functions.php -->
					<?php create_bootstrap_menu('primary'); ?>
				</div>
			</div>
		</div>
	</div>

</header>
