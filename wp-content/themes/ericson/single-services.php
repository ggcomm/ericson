<?php
global $post;
$page_id = $post->ID;
$page_title = get_the_title($page_id);

$service_marquee = get_field('service_marquee');
$service_main_img = $service_marquee['service_main_image_field'];
$service_quote_txt = $service_marquee['service_quote']['service_quote_text'];
$service_quote_bg_img = $service_marquee['service_quote']['service_quote_bg_img'];

$service_main_content = get_field('service_main_content');

$service_main_body = $service_main_content['service_main_body'];
$service_main_body_subtitle = $service_main_body['service_main_body_subtitle'];
$service_main_body_text = $service_main_body['service_main_body_text'];

$service_main_benefits = $service_main_content['service_main_benefits'];
$service_main_benefits_subtitle = $service_main_benefits['service_main_benefits_subtitle'];
$service_main_benefits_text = $service_main_benefits['service_main_benefits_text'];

$service_main_rec_prod = $service_main_content['service_main_rec_prod'];
$service_main_rec_prod_subtitle = $service_main_rec_prod['service_main_rec_prod_subtitle'];
$service_main_rec_prod_cat_repeat = $service_main_rec_prod['service_main_rec_prod_cat_repeat'];

$service_sidebar = get_field('service_sidebar');
$service_sidebar_sections = $service_sidebar['service_sidebar_section'];

?>

<?php get_header(); ?>

<div class="industry-page">

	<main>

		<div class="breadcrumb-wrapper">
			<div class="container">
				<div class="row">
					<div class="col breadcrumbs">
						<?php breadcrumbs(); ?>
					</div>
				</div>
			</div>
		</div>

		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-5 marquee main-img" <?php if(isset($service_main_img)): ?>style="background-image: url('<?php print $service_main_img; ?>');"<?php endif; ?>>
				</div>
				<div class="col-lg-7 marquee quote" <?php if(isset($service_quote_bg_img)): ?>style="background-image: url('<?php print $service_quote_bg_img; ?>');"<?php endif; ?>>
					<div class="d-flex align-items-center marquee quote-text">
						<?php print $service_quote_txt; ?>
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
					<?php if($service_main_body_subtitle): ?>
						<div class="row">
							<div class="col">
								<h3><?php print $service_main_body_subtitle; ?></h3>
							</div>
						</div>
					<?php endif; ?>
					<?php if($service_main_body_text): ?>
						<div class="row">
							<div class="col main-text">
								<?php print $service_main_body_text; ?>
							</div>
						</div>
					<?php endif; ?>
					<?php if($service_main_benefits_subtitle): ?>
						<div class="row">
							<div class="col">
								<h3><?php print $service_main_benefits_subtitle; ?></h3>
							</div>
						</div>
					<?php endif; ?>
					<?php if($service_main_benefits_text): ?>
						<div class="row">
							<div class="col benefits-text">
								<?php print $service_main_benefits_text; ?>
							</div>
						</div>
					<?php endif; ?>
					<?php if($service_main_rec_prod_subtitle): ?>
						<div class="row">
							<div class="col recommended-products-divider">
								<hr/>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<h3><?php print $service_main_rec_prod_subtitle; ?></h3>
							</div>
						</div>
					<?php endif; ?>
					<?php if( isset($service_main_rec_prod_cat_repeat) ): ?>
						<div class="row">
							<div class="col recommended-products">
								<div class="row">
									<?php foreach ($service_main_rec_prod_cat_repeat as $key => $product): 
										$product_id = $product['service_main_rec_prod_cat']->ID;
										$product_img = get_field('product_category_image', $product_id);
										$product_title = get_field('product_category_title', $product_id);
										$product_link = get_field('product_category_link', $product_id);
										?>
										<div class="col-12 col-md-6 product-category-block">
											<?php if(isset($product_img)): ?>
												<div class="row">
													<div class="col">
														<?php if(isset($product_link)): ?><a href="<?php print $product_link; ?>"><?php endif; ?><img src="<?php print $product_img; ?>" class="img-fluid"><?php if(isset($product_link)): ?></a><?php endif; ?>
													</div>
												</div>
												<div class="row">
													<div class="col product-category-image-divider">
														<hr>
													</div>
												</div>
											<?php endif; ?>
											<?php if(isset($product_title)): ?>
												<div class="row">
													<div class="col text-center product-category-title">
														<?php if(isset($product_link)): ?><a href="<?php print $product_link; ?>"><?php endif; ?><?php print $product_title; ?><?php if(isset($product_link)): ?></a><?php endif; ?>
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
					<?php if( isset($service_sidebar_sections) ): ?>
						<div class="row">
							<div class="col sidebar-section">
								<?php foreach ($service_sidebar_sections as $key => $section): 
									$section_id = $section['service_offer']->ID;
									$section_img = get_field('hub_offer_img', $section_id);
									$section_title = get_field('hub_offer_title', $section_id);
									$section_text = get_field('hub_offer_txt', $section_id);
									$section_button_text = get_field('hub_offer_btn_txt', $section_id);
									$section_button_link = get_field('hub_offer_btn_lnk', $section_id);
									?>
									<div class="row">
										<div class="col sidebar-offer-block">
											<?php if(isset($section_img)): ?>
												<div class="row">
													<div class="col sidebar-offer-img">
														<?php if(isset($section_button_link)): ?><a href="<?php print $section_button_link; ?>"><?php endif; ?><img src="<?php print $section_img; ?>" class="img-fluid"><?php if(isset($section_button_link)): ?></a><?php endif; ?>
													</div>
												</div>
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
