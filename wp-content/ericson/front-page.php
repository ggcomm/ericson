<?php
global $post;
$page_id = $post->ID;

$blog_feed = implode(file('https://blog.ericson.com/blog/rss.xml'));
$blog_feed_xml = simplexml_load_string($blog_feed);
$blog_feed_object = $blog_feed_xml->channel;
$blog_feed_posts = array();
foreach ($blog_feed_object->item as $item) {
	array_push($blog_feed_posts, $item);
}
$blog_feed_json = json_encode($blog_feed_posts);
$blog_feed_array = json_decode($blog_feed_json,TRUE);

$featured_offers_items = array();

if(get_field('home_wtpprs_offers')){
	$featured_offers = get_field('home_wtpprs_offers');
	foreach ($featured_offers as $key => $value) {
		# code...
	}
}
else {
	$featured_offers = NULL;
}

$total_hub_offers = 0;
$hub_offers_even = NULL;
foreach ($featured_offers as $featured_offer_key => $offer) {
	$offer_status = $offer['home_wtpprs_offers_item']->post_status;
	if($offer_status == 'publish'){
		$offer_item = array();
		$offer_item['status'] = $offer_status;
		$offer_item['id'] = $offer['home_wtpprs_offers_item']->ID;
		$offer_item['type'] = $offer['home_wtpprs_offers_item']->post_type;
		if($offer_item['type'] === 'hub_offers'){
			$offer_item['image'] = get_field('hub_offer_img', $offer_item['id']);
			$offer_item['title'] = get_field('hub_offer_title', $offer_item['id']);
			$offer_item['text'] = get_field('hub_offer_txt', $offer_item['id']);
			$offer_item['btn_txt'] = get_field('hub_offer_btn_txt', $offer_item['id']);
			$offer_item['btn_lnk'] = get_field('hub_offer_btn_lnk', $offer_item['id']);
		}
		if($offer_item['type'] === 'white_papers'){
			$offer_item['image'] = get_field('wtppr_offer_img', $offer_item['id']);
			$offer_item['title'] = get_field('wtppr_offer_title', $offer_item['id']);
			$offer_item['text'] = get_field('wtppr_offer_txt', $offer_item['id']);
			$offer_item['btn_txt'] = get_field('wtppr_offer_btn_txt', $offer_item['id']);
			$offer_item['btn_lnk'] = get_field('wtppr_offer_btn_lnk', $offer_item['id']);
		}
		array_push($featured_offers_items, $offer_item);
		$total_hub_offers++;
	}
}
if($total_hub_offers % 2 === 0) {
	$hub_offers_even = 1;
}
else {
	$hub_offers_even = 0;
}


 if ( have_rows( 'home_industires' ) ) :
	 $i = 0;
	 $industries = array();
	 while ( have_rows( 'home_industires' ) ) : the_row();
		 $post_object = get_sub_field( 'choose_industry' );
		 if ( $post_object ):
			 $post = $post_object;
			 setup_postdata( $post );

			 $industries[$i]['id'] = $post->ID;
			 $industries[$i]['label'] = $post->post_title;
			 $industries[$i]['permalink'] = get_permalink($post->ID);


			  if ( have_rows( 'industry_marquee', $post->ID ) ) :
					 while ( have_rows( 'industry_marquee', $post->ID ) ) : the_row();
						 if ( get_sub_field( 'industry_main_image_field' ) ) {
							$industries[$i]['image'] =get_sub_field( 'industry_main_image_field' );
						 }
						 if ( have_rows( 'industry_quote', $post->ID ) ) :
							 while ( have_rows( 'industry_quote', $post->ID ) ) : the_row();
								 $industries[$i]['quote'] = get_sub_field( 'industry_quote_text' );
								 if ( get_sub_field( 'industry_quote_bg_img' ) ) {
									$industries[$i]['bg_img'] = get_sub_field( 'industry_quote_bg_img' );
								 }
							 endwhile;
						 endif;
					 endwhile;
				 endif;



			 wp_reset_postdata();
		 endif;
		 $i++;
	 endwhile;
 else :
	 // no rows found
 endif;


?>

<?php get_header(); ?>

<main>

	<h1 class="sr-only"><?php print get_bloginfo( 'name', 'display' ); ?></h1>

	<?php if( have_rows('marquee_slider', $page_id) ): ?>


		<section id="marqueeCarousel" class="carousel slide" data-ride="carousel">
			<h2 class="sr-only">See Whats New</h2>
		  <ol class="carousel-indicators">
		  	<?php $i_two = 0; ?>
		  	<?php while( have_rows('marquee_slider', $page_id) ): the_row(); ?>
			    <li data-target="#marqueeCarousel" data-slide-to="<?php echo $i_two; ?>" <?php if($i_two === 0): ?>class="active"<?php endif; ?>></li>
			    <?php $i_two++; ?>
		    <?php endwhile; ?>
		  </ol>
		  <div class="carousel-inner">

		  	<?php $i = 1; ?>
				<?php while( have_rows('marquee_slider', $page_id) ): the_row();
					$marquee_slider_title = get_sub_field('marquee_slider_title');
					$marquee_slider_text = get_sub_field('marquee_slider_text');
					$marquee_slider_button_text = get_sub_field('marquee_slider_button_text');
					$marquee_slider_button_link = get_sub_field('marquee_slider_button_link');
					$marquee_slide_bg_img = get_sub_field('marquee_slide_bg_img');
					?>

					<div class="carousel-item <?php if ($i === 1): ?>active<?php endif; ?>" <?php if(isset($marquee_slide_bg_img)): ?>style="background-image: url('<?php print $marquee_slide_bg_img; ?>')"<?php endif; ?>>
						<div class="d-flex align-items-center carousel-item-content">
							<section class="col">
								<?php if(isset($marquee_slider_title)): ?>
									<div class="row">
										<div class="col text-center marquee-slider-title">
											<h3 class="sr-only"><?php print $marquee_slider_title; ?></h3>
											<?php print $marquee_slider_title; ?>
										</div>
									</div>
								<?php endif; ?>
								<?php if(isset($marquee_slider_text)): ?>
									<div class="row">
										<div class="col text-center marquee-slider-text">
											<?php print $marquee_slider_text; ?>
										</div>
									</div>
								<?php endif; ?>
								<?php if(isset($marquee_slider_button_text) && isset($marquee_slider_button_link)): ?>
									<div class="row">
										<div class="col-md-4 offset-md-4 text-center marquee-slider-button">
											<a href="<?php print $marquee_slider_button_link; ?>" class="btn btn-block btn-primary" role="button"><?php print $marquee_slider_button_text; ?></a>
										</div>
									</div>
								<?php endif; ?>
							</section>
				    </div>
				  </div>

					<?php $i++; ?>
				<?php endwhile; ?>
		  </div>
		  <a class="carousel-control-prev" href="#marqueeCarousel" role="button" data-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#marqueeCarousel" role="button" data-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</section>

	<?php endif; ?>

	<?php if( have_rows('home_product_categories', $page_id) ): ?>
		<section class="product-categories">
			<h2 class="sr-only">Products</h2>
			<div class="container-fluid">
				<?php $category_count = count(get_field('home_product_categories')); ?>
				<?php $i_prod_cat = 0; ?>
				<?php while( have_rows('home_product_categories', $page_id) ): the_row();
					$home_product_category = get_sub_field('home_product_category');
					$home_product_category_id = $home_product_category->ID;
					$home_product_category_image = get_field('product_category_image', $home_product_category_id);
					$home_product_category_title = get_field('product_category_title', $home_product_category_id);
					$home_product_category_link = get_field('product_category_link', $home_product_category_id);
					$i_prod_cat++;
					?>
					<?php if($i_prod_cat === 1): ?>
						<div class="row">
					<?php endif; ?>
					<div class="product-category-wrapper">
						<?php if(isset($home_product_category_image)): ?>
							<div class="row">
								<div class="col text-center product-category-image">
									<?php if(isset($home_product_category_link)): ?><a href="<?php print $home_product_category_link; ?>"><?php endif; ?><img <?php if(isset($home_product_category_title)): ?>alt="<?php print $home_product_category_title; ?>"<?php endif; ?> src="<?php print $home_product_category_image; ?>" class="img-fluid"><?php if(isset($home_product_category_link)): ?></a><?php endif; ?>
								</div>
							</div>
							<div class="row">
								<div class="col product-category-image-divider">
									<hr>
								</div>
							</div>
						<?php endif; ?>
						<?php if(isset($home_product_category_title)): ?>
							<div class="row">
								<div class="col text-center product-category-title">
									<?php if(isset($home_product_category_link)): ?><a href="<?php print $home_product_category_link; ?>"><?php endif; ?><h3><?php print $home_product_category_title; ?></h3><?php if(isset($home_product_category_link)): ?></a><?php endif; ?>
								</div>
							</div>
						<?php endif; ?>
						<div class="row">
							<div class="col product-category-divider">
								<hr>
							</div>
						</div>
					</div>
					<?php if($i_prod_cat % 5 === 0): ?>
						<!-- </div>
						<div class="row"> -->
					<?php endif; ?>
					<?php if($i_prod_cat === $category_count): ?>
						</div>
					<?php endif; ?>
				<?php endwhile; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php if( get_field('home_cta', $page_id) ): ?>
		<?php $home_cta = get_field('home_cta', $page_id); ?>
		<section class="call-to-action-wrapper" >
			<?php if($home_cta['home_cta_title']): ?><h2 class="sr-only"><?php echo $home_cta['home_cta_title']; ?></h2><?php endif; ?>
			<?php if($home_cta['home_cta_bg_img']): ?><div class="parallax-window" data-parallax="scroll" data-speed="0.6" data-image-src="<?php echo $home_cta['home_cta_bg_img']; ?>"></div><?php endif; ?>
			<div class="container">
				<?php if($home_cta['home_cta_title']): ?>
					<div class="row">
						<div class="col text-center cta-title">
							<?php echo $home_cta['home_cta_title']; ?>
						</div>
					</div>
					<div class="row">
						<div class="col text-center cta-divider">
							<hr>
						</div>
					</div>
				<?php endif; ?>
				<?php if($home_cta['home_cta_subtitle']): ?>
					<div class="row">
						<div class="col text-center cta-subtitle">
							<?php if($home_cta['home_cta_image']): ?><img alt="Ericson" src="<?php echo $home_cta['home_cta_image']; ?>" class="img-fluid"> <?php endif; ?><?php echo $home_cta['home_cta_subtitle']; ?>
						</div>
					</div>
				<?php endif; ?>
				<?php if($home_cta['home_cta_btn_txt'] && $home_cta['home_cta_btn_lnk']): ?>
					<div class="row">
						<div class="col-md-6 offset-md-3 text-center cta-button">
							<a href="<?php echo $home_cta['home_cta_btn_lnk']; ?>" class="btn btn-block btn-primary inverted"><?php echo $home_cta['home_cta_btn_txt']; ?></a>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php if( sizeof($industries) > 0 ): ?>
		<section class="industries-wrapper">
			<h2 class="sr-only">Our Industries</h2>
			<div class="container-fluid">
				<div class="row">
					<?php foreach( $industries as $industry): ?>
						<div class="col-sm-6 col-lg-4 col-xl-3 industry-block">
							<?php if(isset($industry['permalink'])): ?><a href="<?php print $industry['permalink']; ?>"><?php endif; ?>
								<div class="industry-background" <?php if(isset($industry['image'])): ?>style="background-image: url('<?php print $industry['image']; ?>');"<?php endif; ?>>
								</div>
								<div class="d-flex align-items-center justify-content-center industry-title">
									<div class="text-center">
										<div class="title-wrapper">
											<h3><?php print $industry['label']; ?></h3>
										</div>
									</div>
								</div>
								<div class="d-flex align-items-start industry-overlay">
									<div>
										<div class="row">
											<div class="col industry-overlay-title">
												<?php print $industry['label']; ?> <i class="fas fa-caret-right"></i>
											</div>
										</div>
										<div class="row">
											<div class="col">
												<?php print $industry['quote']; ?>
											</div>
										</div>
									</div>
								</div>
							<?php if(isset($industry['image'])): ?></a><?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if(sizeof($featured_offers) > 0): ?>
		<section class="hub-offers-wrapper">
			<h2 class="sr-only">Case Studies & White Papers</h2>
			<div class="container">
				<div class="row">
					<?php $i_hub = 0; ?>
					<?php foreach ($featured_offers_items as $offer_key => $offer):
						$i_hub++;
					?>

						<?php if((int)$i_hub === (int)$total_hub_offers && $hub_offers_even === 0 && $offer['status'] == 'publish'): ?>
							<div class="col-md-6 offset-md-3 hub-offer">
								<div class="row">
									<?php if(isset($offer['image'])): ?>
										<div class="col hub-offer-img">
											<img <?php if(isset($offer['title'])): ?>alt="<?php print $offer['title']; ?>"<?php endif; ?> src="<?php print $offer['image']; ?>">
										</div>
									<?php endif; ?>
									<div class="col">
										<?php if(isset($offer['title'])): ?>
											<div class="row">
												<div class="col hub-offer-title">
													<h3><?php print $offer['title']; ?></h3>
												</div>
											</div>
										<?php endif; ?>
										<?php if(isset($offer['text'])): ?>
											<div class="row">
												<div class="col hub-offer-text">
													<?php print $offer['text']; ?>
												</div>
											</div>
										<?php endif; ?>
										<?php if(isset($offer['btn_txt']) && isset($offer['btn_lnk'])): ?>
											<div class="row">
												<div class="col hub-offer-button">
													<a href="<?php print $offer['btn_lnk']; ?>" role="button" class="btn btn-default"><?php print $offer['btn_txt']; ?></a>
												</div>
											</div>
										<?php endif; ?>
									</div>
								</div>
							</div>
						<?php else: ?>
							<?php if($offer['status'] == 'publish'): ?>
								<div class="col-md-6 hub-offer <?php if($i_hub  % 2 !== 0): ?>left-featured-offer<?php endif; ?>">
									<div class="row">
										<?php if(isset($offer['image'])): ?>
											<div class="col hub-offer-img">
												<img <?php if(isset($offer['title'])): ?>alt="<?php print $offer['title']; ?>"<?php endif; ?> src="<?php print $offer['image']; ?>">
											</div>
										<?php endif; ?>
										<div class="col">
											<?php if(isset($offer['title'])): ?>
												<div class="row">
													<div class="col hub-offer-title">
														<h3><?php print $offer['title']; ?></h3>
													</div>
												</div>
											<?php endif; ?>
											<?php if(isset($offer['text'])): ?>
												<div class="row">
													<div class="col hub-offer-text">
														<?php print $offer['text']; ?>
													</div>
												</div>
											<?php endif; ?>
											<?php if(isset($offer['btn_txt']) && isset($offer['btn_lnk'])): ?>
												<div class="row">
													<div class="col hub-offer-button">
														<a href="<?php print $offer['btn_lnk']; ?>" role="button" class="btn btn-default"><?php print $offer['btn_txt']; ?></a>
													</div>
												</div>
											<?php endif; ?>
										</div>
									</div>
								</div>
							<?php endif; ?>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if( get_field('home_blog_section', $page_id)): ?>
		<?php $home_blog = get_field('home_blog_section', $page_id); ?>
		<section class="blog-block">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12 col-lg-6 d-flex align-items-end blog-block-info-container" <?php if($home_blog['home_bg_img']): ?>style="background-image: url('<?php print $home_blog['home_bg_img']; ?>');"<?php endif; ?>>

						<div class="col blog-block-info">
							<div class="row">
								<div class="col blog-block-info-text">
									<?php if($home_blog['home_blog_title']): ?>
										<div class="row">
											<div class="col">
												<h2><?php print $home_blog['home_blog_title']; ?></h2>
											</div>
										</div>
									<?php endif; ?>
									<?php if($home_blog['home_blog_features']): ?>
										<div class="row">
											<div class="col">
												<?php print $home_blog['home_blog_features']; ?>
											</div>
										</div>
									<?php endif; ?>
								</div>
							</div>
							<div class="row">
								<div class="col hubspot-blog-subscribe-form pr-0 pl-0">
									<!--[if lte IE 8]>
									<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
									<![endif]-->
									<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
									<script>
									  hbspt.forms.create({
										portalId: "2003074",
										formId: "9ef756ad-1e56-4f38-b503-ab69288c3fca"
									});
									</script>
								</div>
							</div>
						</div>

					</div>
					<div class="col-12 col-lg-6 blog-list-block">
						<div class="row">
							<div class="col">
								<span class="blog-list-subtitle"><?php print $home_blog['home_blog_list_subtitle']; ?></span> <?php if(isset($home_blog['home_blog_button_link']) && isset($home_blog['home_blog_button_text'])): ?><?php if(isset($home_blog['home_blog_button_link'])): ?><a href="<?php print $home_blog['home_blog_button_link']; ?>" class="btn btn-tertiary"><?php endif; ?><?php print $home_blog['home_blog_button_text']; ?><?php if(isset($home_blog['home_blog_button_link'])): ?></a><?php endif; ?><?php endif; ?>
							</div>
						</div>

						<?php $i_blog = 0; ?>
						<?php foreach ($blog_feed_array as $blog_post): ?>
							<?php $i_blog++; ?>
							<?php if($i_blog < 4): ?>
								<div class="row">
									<div class="col blog-list-item">

										<?php if(isset($blog_post['title'])): ?>
											<div class="row">
												<div class="col blog-list-title">
													<h3><?php print $blog_post['title']; ?></h3>
												</div>
											</div>
										<?php endif; ?>
										<?php if(isset($blog_post['description'])): ?>
											<div class="row">
												<div class="col blog-list-teaser">
													<?php print $blog_post['description']; ?>
												</div>
											</div>
										<?php endif; ?>
										<?php if(isset($blog_post['link'])): ?>
											<div class="row">
												<div class="col blog-list-cta">
													<a href="<?php print $blog_post['link']; ?>">Read More</a>
												</div>
											</div>
										<?php endif; ?>

									</div>
								</div>
						<?php endif; ?>
						<?php endforeach; ?>

					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>

</main>

<?php get_footer(); ?>
