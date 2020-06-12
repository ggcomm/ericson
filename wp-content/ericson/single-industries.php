<?php
global $post;
$page_id = $post->ID;
$page_title = get_the_title($page_id);

$industries_query = new WP_Query(array(
    'post_type' => 'industries',
    'post_status' => 'publish',
    'posts_per_page' => -1
));
$industries = $industries_query->get_posts();
$industry_info = array();
foreach ($industries as $key => $industry) {
	$industry_id = $industry->ID;
	$taxonomy_term = get_the_terms( $industry_id, 'industry' );
	$industry_term = array_shift( $taxonomy_term );
	$industry_content['taxonomy_id'] = $industry_term->term_id;
	$industry_content['taxonomy_slug'] = $industry_term->slug;
	$industry_content['taxonomy_title'] = $industry_term->name;
	$industry_marquee = get_field('industry_marquee', $industry_id);
	$industry_content['image'] = $industry_marquee['industry_main_image_field'];
	array_push($industry_info,$industry_content);
}


$industry_marquee = get_field('industry_marquee');
$industry_main_img = $industry_marquee['industry_main_image_field'];
$industry_quote_txt = $industry_marquee['industry_quote']['industry_quote_text'];
$industry_quote_bg_img = $industry_marquee['industry_quote']['industry_quote_bg_img'];

$industry_main_content = get_field('industry_main_content');

$industry_main_body = $industry_main_content['industry_main_body'];
$industry_main_body_subtitle = $industry_main_body['industry_main_body_subtitle'];
$industry_main_body_text = $industry_main_body['industry_main_body_text'];

$industry_main_benefits = $industry_main_content['industry_main_benefits'];
$industry_main_benefits_subtitle = $industry_main_benefits['industry_main_benefits_subtitle'];
$industry_main_benefits_text = $industry_main_benefits['industry_main_benefits_text'];

$industry_main_rec_prod = $industry_main_content['industry_main_rec_prod'];
$industry_main_rec_prod_subtitle = $industry_main_rec_prod['industry_main_rec_prod_subtitle'];
$industry_main_rec_prod_cat_repeat = $industry_main_rec_prod['industry_main_rec_prod_cat_repeat'];

$recommmended_products = array();
foreach ($industry_main_rec_prod_cat_repeat as $rec_prod_key => $rec_prod) {
	$recommended_product = array();
	if($rec_prod['product_type'] === 'product_category'){
		$product_id = $rec_prod['industry_main_rec_prod_cat']->ID;
		$recommended_product['image'] = get_field('product_category_image', $product_id);
		$recommended_product['title'] = get_field('product_category_title', $product_id);
		$recommended_product['url'] = get_field('product_category_link', $product_id);
	}
	elseif($rec_prod['product_type'] === 'custom_product') {
		$recommended_product['image'] = $rec_prod['custom_product']['custom_product_image'];
		$recommended_product['title'] = $rec_prod['custom_product']['custom_product_title'];
		$recommended_product['url'] = $rec_prod['custom_product']['custom_product_link'];
	}
	else {
		$recommended_product = NULL;
	}
	if(sizeof($recommended_product) > 0){
		array_push($recommmended_products, $recommended_product);
	}
}

$industry_sidebar = get_field('industry_sidebar');
$industry_sidebar_sections = $industry_sidebar['industry_sidebar_section'];

?>

<?php get_header(); ?>

<div class="industry-page">

	<main>

		<div class="breadcrumb-wrapper">
			<div class="container">
				<div class="row">
					<div class="col breadcrumbs">
						<a href="<?php echo home_url(); ?>/">Home</a> / <a href="<?php echo home_url(); ?>/industries/">Industries</a> / <?php echo $page_title; ?>
					</div>
				</div>
			</div>
		</div>

		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-5 marquee main-img" <?php if(isset($industry_main_img)): ?>style="background-image: url('<?php print $industry_main_img; ?>');"<?php endif; ?>>
				</div>
				<div class="col-lg-7 marquee quote" <?php if(isset($industry_quote_bg_img)): ?>style="background-image: url('<?php print $industry_quote_bg_img; ?>');"<?php endif; ?>>
					<div class="d-flex align-items-center marquee quote-text">
						<?php print $industry_quote_txt; ?>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="row">
						<div class="col page-title">
							<h1><?php print $page_title; ?></h1>
						</div>
					</div>
					<?php if($industry_main_body_subtitle): ?>
						<div class="row">
							<div class="col">
								<h3><?php print $industry_main_body_subtitle; ?></h3>
							</div>
						</div>
					<?php endif; ?>
					<?php if($industry_main_body_text): ?>
						<div class="row">
							<div class="col main-text">
								<?php print $industry_main_body_text; ?>
							</div>
						</div>
					<?php endif; ?>
					<?php if($industry_main_benefits_subtitle): ?>
						<div class="row">
							<div class="col">
								<h3><?php print $industry_main_benefits_subtitle; ?></h3>
							</div>
						</div>
					<?php endif; ?>
					<?php if($industry_main_benefits_text): ?>
						<div class="row">
							<div class="col benefits-text">
								<?php print $industry_main_benefits_text; ?>
							</div>
						</div>
					<?php endif; ?>
					<?php if($industry_main_rec_prod_subtitle): ?>
						<div class="row">
							<div class="col recommended-products-divider">
								<hr/>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<h3><?php print $industry_main_rec_prod_subtitle; ?></h3>
							</div>
						</div>
					<?php endif; ?>
					<?php if(sizeof($recommmended_products) > 0): ?>
						<div class="row">
							<div class="col recommended-products">
								<div class="row">
									<?php foreach ($recommmended_products as $recprod_key => $product): ?>
										<div class="col-12 col-sm-6 col-md-4 product-category-block">
											<?php if(isset($product['image'])): ?>
												<div class="row">
													<div class="col">
														<?php if(isset($product['url'])): ?><a href="<?php print $product['url']; ?>"><?php endif; ?><img alt="<?php echo $product['title']; ?>" src="<?php print $product['image']; ?>" class="img-fluid"><?php if(isset($product['url'])): ?></a><?php endif; ?>
													</div>
												</div>
												<div class="row">
													<div class="col product-category-image-divider">
														<hr>
													</div>
												</div>
											<?php endif; ?>
											<?php if(isset($product['title'])): ?>
												<div class="row">
													<div class="col text-center product-category-title">
														<?php if(isset($product['url'])): ?><a href="<?php print $product['url']; ?>"><?php endif; ?><?php print $product['title']; ?><?php if(isset($product['url'])): ?></a><?php endif; ?>
													</div>
												</div>
											<?php endif; ?>
											<div class="row">
												<div class="col product-category-divider">
													<hr>
												</div>
											</div>
										</div>
									<?php endforeach ?>
								</div>
							</div>
						</div>
					<?php endif; ?>
				</div>
				<div class="col-lg-4 sidebar">
					<?php if( isset($industry_sidebar_sections) ): ?>
						<div class="row">
							<div class="col sidebar-section">
								<?php foreach ($industry_sidebar_sections as $key => $section): 
									$section_id = $section['industry_offer']->ID;
									$section_type = $section['industry_offer']->post_type;
									$section_status = $section['industry_offer']->post_status;
									if($section_type === 'hub_offers') {
										$section_img = get_field('hub_offer_img', $section_id);
										$section_title = get_field('hub_offer_title', $section_id);
										$section_text = get_field('hub_offer_txt', $section_id);
										$section_button_text = get_field('hub_offer_btn_txt', $section_id);
										$section_button_link = get_field('hub_offer_btn_lnk', $section_id);
									}
									elseif($section_type === 'case_studies') {
										$section_title = get_the_title($section_id);
										$section_text = get_field('case_study_teaser_text', $section_id);
										$section_button_text = 'View Case Study';
										$section_button_link = get_permalink($section_id);

										$cs_industry = get_field('case_study_industry');
										$filterBy = $cs_industry;
										$case_study_industry = array_filter($industry_info, function ($var) use ($filterBy) {return ($var['taxonomy_id'] == $filterBy);});
										$key = key($case_study_industry);
										$industry_image = $case_study_industry[$key]['image'];
									}
									?>
									<?php if($section_status === 'publish'): ?>
										<div class="row">
											<div class="col sidebar-offer-block">
												<?php if($section_type === 'hub_offers'): ?>
													<?php if(isset($section_img)): ?>
														<div class="row">
															<div class="col sidebar-offer-img">
																<?php if(isset($section_button_link)): ?><a href="<?php print $section_button_link; ?>"><?php endif; ?><img src="<?php print $section_img; ?>" class="img-fluid"><?php if(isset($section_button_link)): ?></a><?php endif; ?>
															</div>
														</div>
													<?php endif; ?>
												<?php elseif($section_type === 'case_studies'): ?>
													<?php if(isset($industry_image)): ?>
														<div class="row">
															<div class="col sidebar-cs-img">
																<?php if(isset($section_button_link)): ?><a href="<?php print $section_button_link; ?>"><?php endif; ?><img src="<?php print $industry_image; ?>" class="img-fluid"><?php if(isset($section_button_link)): ?></a><?php endif; ?>
															</div>
														</div>
													<?php endif; ?>
												<?php endif; ?>
												<?php if(isset($section_title)): ?>
													<div class="row">
														<div class="col sidebar-offer-title">
															<?php print $section_title; ?>
														</div>
													</div>
												<?php endif; ?>
												<?php if(isset($section_text)): ?>
													<div class="row">
														<div class="col sidebar-offer-text">
															<?php print $section_text; ?>
														</div>
													</div>
												<?php endif; ?>
												<?php if(isset($section_button_text) && isset($section_button_link)): ?>
													<div class="row">
														<div class="col sidebar-offer-button">
															<?php if($section_button_link): ?><a href="<?php print $section_button_link; ?>" class="btn btn-secondary"><?php endif; ?><?php print $section_button_text; ?><?php if($section_button_link): ?></a><?php endif; ?>
														</div>
													</div>
												<?php endif; ?>
											</div>
										</div>
									<?php endif; ?>
								<?php endforeach ?>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>

	</main>

</div>

<?php get_footer(); ?>
