<?php
global $post;
$page_id = $post->ID;
$page_title = get_the_title($page_id);

$case_study_industry_id = get_field('case_study_industry');
$case_study_industry = get_term_by('id', $case_study_industry_id, 'industry');
$case_study_industry_title = $case_study_industry->name;

$case_study_main_content = get_field('case_study_main_content');
$case_study_sub_title = $case_study_main_content['case_study_sub_title'];
$case_study_body = $case_study_main_content['case_study_body'];

$case_study_eqp_sol = get_field('case_study_eqp_sol');
$case_study_eqp_sol_subtitle = $case_study_eqp_sol['case_study_eqp_sol_subtitle'];
$case_study_product_cat_repeat = $case_study_eqp_sol['case_study_product_cat_repeat'];


?>

<?php get_header(); ?>

<div class="case-studies-page">

	<main>

		<div class="breadcrumb-wrapper">
			<div class="container">
				<div class="row">
					<div class="col breadcrumbs">
						<a href="<?php echo home_url(); ?>/">Home</a> / <a href="<?php echo home_url(); ?>/resources/">Resources</a> / <a href="<?php echo home_url(); ?>/resources/case-studies/">Case Studies</a> / <?php echo $page_title; ?>
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col page-title">
					<h1>Case Studies</h1>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<a href="/resources/case-studies">All Case Studies</a>
				</div>
			</div>
			<?php if(isset($case_study_industry_title)): ?>
				<div class="row">
					<div class="col">
						<div class="case-study-industry">
							Industry: <?php print $case_study_industry_title; ?>
						</div>
					</div>
				</div>
			<?php endif; ?>
			<?php if(isset($case_study_sub_title)): ?>
				<div class="row">
					<div class="col case-study-subtitle">
						<h2><?php print $case_study_sub_title; ?></h2>
					</div>
				</div>
			<?php endif; ?>
			<?php if(isset($case_study_body)): ?>
				<div class="row">
					<div class="col case-study-body">
						<?php print $case_study_body; ?>
					</div>
				</div>
			<?php endif; ?>
			<?php if(isset($case_study_eqp_sol_subtitle)): ?>
				<div class="row">
					<div class="col recommended-products-divider">
						<hr/>
					</div>
				</div>
				<div class="row">
					<div class="col case-study-eqp-sol-subtitle">
						<h3><?php print $case_study_eqp_sol_subtitle; ?></h3>
					</div>
				</div>
			<?php endif; ?>
			<?php if( isset($case_study_product_cat_repeat) ): ?>
				<div class="row">
					<div class="col recommended-products">
						<div class="row">
							<?php foreach ($case_study_product_cat_repeat as $key => $product):
								$product_id = $product['case_study_prod_cat']->ID;
								$product_img = get_field('product_category_image', $product_id);
								$product_title = get_field('product_category_title', $product_id);
								$product_link = get_field('product_category_link', $product_id);
								?>
								<div class="col-12 col-md-4 product-category-block">
									<?php if(isset($product_img)): ?>
										<div class="row">
											<div class="col">
												<?php if(isset($product_link)): ?><a href="<?php print $product_link; ?>" class="text-center"><?php endif; ?><img src="<?php print $product_img; ?>" class="img-fluid"><?php if(isset($product_link)): ?></a><?php endif; ?>
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

	</main>

</div>

<?php get_footer(); ?>
