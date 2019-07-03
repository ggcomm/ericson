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

$case_studies = new WP_Query(array(
    'post_type' => 'case_studies',
    'post_status' => 'publish',
    'posts_per_page' => -1
));

$white_papers = new WP_Query(array(
    'post_type' => 'white_papers',
    'post_status' => 'publish',
    'posts_per_page' => -1
));

?>

<?php get_header(); ?>

<div class="resources-page">

	<main>

		<!-- <div class="breadcrumb-wrapper">
			<div class="container">
				<div class="row">
					<div class="col breadcrumbs">
						<?php //breadcrumbs(); ?>
					</div>
				</div>
			</div>
		</div> -->

		<div class="container">
			<div class="row">
				<div class="col page-title mt-5 mb-2">
					<h1><?php print $page_title; ?></h1>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col page-title">
					<h2>Case Studies</h2>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<hr/>
				</div>
			</div>
			<?php if($case_studies->have_posts()): ?>
				<?php $count_cs = $case_studies->post_count; ?>
				<?php $i_cs = 0; ?>
				<?php while( $case_studies->have_posts()):
					$i_cs++;
					$case_studies->the_post();
					$cs_title = get_the_title();
					$cs_url = get_permalink();
					$cs_industry = get_field('case_study_industry');
					$cs_teaser = get_field('case_study_teaser_text');
					$filterBy = $cs_industry;
					$case_study_industry = array_filter($industry_info, function ($var) use ($filterBy) {return ($var['taxonomy_id'] == $filterBy);});
					$key = key($case_study_industry);
					$industry_image = $case_study_industry[$key]['image'];
					$industry_title = $case_study_industry[$key]['taxonomy_title'];
					?>
					<?php if($i_cs < 3): ?>
						<?php if($i_cs === 1): ?>
							<div class="row">
						<?php endif; ?>
							<div class="col-md-6 case-study-block <?php if($i_cs % 2 == 0): ?>right-block<?php else: ?>left-block<?php endif; ?>">
								<?php if(isset($industry_image) && isset($industry_title)): ?>
									<div class="row">
										<div class="col case-study-block-header">
											<?php if(isset($industry_image)): ?>
												<div class="row">
													<div class="col">
														<div class="case-study-image" style="background-image: url('<?php print $industry_image; ?>');">
															<?php if(isset($cs_url)): ?><a href="<?php print $cs_url; ?>"><span class="sr-only"><?php print $cs_title; ?></span></a><?php endif; ?>
														</div>
													</div>
												</div>
											<?php endif; ?>
											<?php if(isset($industry_title)): ?>
												<div class="row">
													<div class="col case-study-industry-title">
														Industry: <?php print $industry_title; ?>
													</div>
												</div>
											<?php endif; ?>
										</div>
									</div>
								<?php endif; ?>
								<?php if(isset($cs_title)): ?>
									<div class="row">
										<div class="col">
											<h3><?php print $cs_title; ?></h3>
										</div>
									</div>
								<?php endif; ?>
								<?php if(isset($cs_teaser)): ?>
									<div class="row">
										<div class="col case-study-teaser-text">
											<?php print $cs_teaser; ?>
										</div>
									</div>
								<?php endif; ?>
								<?php if(isset($cs_url)): ?>
									<div class="row">
										<div class="col">
											<a href="<?php print $cs_url; ?>" class="btn btn-secondary">Read More</a>
										</div>
									</div>
								<?php endif; ?>
							</div>
						<?php if ($i_cs == $count_cs): ?>
							</div>
						<?php elseif($i_cs % 2 == 0): ?>
							</div>
							<div class="row">
						<?php endif; ?>
					<?php endif; ?>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>

		<div class="container">
			<div class="row">
				<div class="col page-title">
					<h2>White Papers</h2>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<hr/>
				</div>
			</div>
		</div>

		<?php if($white_papers->have_posts()): ?>
			<div class="white-papers-wrapper">
				<div class="container">
					<div class="row">
						<?php $i_wp = 0; ?>
						<?php while( $white_papers->have_posts()):
							$i_wp++;
							$white_papers->the_post();
							$white_paper_img = get_field('wtppr_offer_img');
							$white_paper_title = get_field('wtppr_offer_title');
							$white_paper_text = get_field('wtppr_offer_txt');
							$white_paper_btn_txt = get_field('wtppr_offer_btn_txt');
							$white_paper_btn_link = get_field('wtppr_offer_btn_lnk');
							?>
								<?php if($i_wp < 4): ?>
									<div class="col-md-4 hub-offer">
										<div class="row">
											<?php if(isset($white_paper_img)): ?>
												<div class="col hub-offer-img">
													<img <?php if(isset($white_paper_title)): ?>alt="<?php print $white_paper_title; ?>"<?php endif; ?> src="<?php print $white_paper_img; ?>">
												</div>
											<?php endif; ?>
										</div>
										<div class="row">
											<div class="col hub-offer-details">
												<?php if(isset($white_paper_title)): ?>
													<div class="row">
														<div class="col hub-offer-title">
															<h3><?php print $white_paper_title; ?></h3>
														</div>
													</div>
												<?php endif; ?>
												<?php if(isset($white_paper_text)): ?>
													<div class="row">
														<div class="col hub-offer-text">
															<?php print $white_paper_text; ?>
														</div>
													</div>
												<?php endif; ?>
												<?php if(isset($white_paper_btn_txt) && isset($white_paper_btn_link)): ?>
													<div class="row">
														<div class="col hub-offer-button">
															<a href="<?php print $white_paper_btn_link; ?>" role="button" class="btn btn-default"><?php print $white_paper_btn_txt; ?></a>
														</div>
													</div>
												<?php endif; ?>
											</div>
										</div>
									</div>
								<?php endif; ?>
						<?php endwhile; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<!-- <div class="container">
			<div class="row">
				<div class="col page-title">
					<h2>NRTL Guide</h2>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<hr/>
				</div>
			</div>
		</div> -->

		<?php //if( have_rows('nrtl_item', 146) ): ?>
			<!-- <div class="nrtl-grid">
				<div class="container">
					<div class="row">
						<?php //$item_count = count(get_field('nrtl_item', 146)); ?>
						<?php //$i_item = 0; ?>
						<?php //while( have_rows('nrtl_item', 146) ): the_row();
							//$i_item++;
							//$nrtl_logo = get_sub_field('nrtl_logo');
							//$nrtl_title = get_sub_field('nrtl_title');
							//$nrtl_link = get_sub_field('nrtl_link');
							?>
							<?php //if($i_item < 4): ?>
								<div class="col-md-4 nrtl-grid-item">
									<?php //if(isset($nrtl_link)): ?><a href="<?php //print $nrtl_link; ?>"><?php //endif; ?>
										<?php //if(isset($nrtl_logo)): ?>
											<div class="row">
												<div class="col text-center">
													<img <?php //if(isset($nrtl_title)): ?>alt="<?php //print $nrtl_title; ?>"<?php //endif; ?> src="<?php //print $nrtl_logo; ?>" class="img-fluid">
												</div>
											</div>
										<?php //endif; ?>
										<?php //if(isset($nrtl_title)): ?>
											<div class="row">
												<div class="col text-center nrtl-grid-title">
													<h3><?php //print $nrtl_title; ?></h3>
												</div>
											</div>
										<?php //endif; ?>
									<?php //if(isset($nrtl_link)): ?></a><?php //endif; ?>
								</div>
							<?php //endif; ?>
						<?php //endwhile; ?>
					</div>
				</div>
			</div> -->
		<?php //endif; ?>

	</main>

</div>

<?php get_footer(); ?>
