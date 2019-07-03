<?php

global $post;
$page_id = $post->ID;
$page_title = get_the_title($page_id);

$industries = new WP_Query(array(
  'post_type' => 'industries',
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'orderby' => 'title',
	'order' => 'ASC',
));

?>

<?php get_header(); ?>

<div class="industries-page">

	<main>

		<div class="container">
			<div class="row">
				<div class="col page-title mt-5">
					<h1><?php print $page_title; ?></h1>
				</div>
			</div>
		</div>

		<?php if($industries->have_posts()): ?>
			<div class="industries-wrapper">
				<div class="container">
					<div class="row">
						<?php while( $industries->have_posts()):
							$industries->the_post();
							$industry_title = get_the_title();
							$industry_url = get_permalink();
							$industry_grid_text = get_field('industry_grid_text');
							$industry_marquee = get_field('industry_marquee');
							?>
							<div class="col-md-6 col-lg-4">
								<div class="row">
									<div class="col">
										<div class="industry-block">
											<?php if(isset($industry_url)): ?><a href="<?php print $industry_url; ?>"><?php endif; ?>
												<div class="industry-background" <?php if(isset($industry_marquee['industry_main_image_field'])): ?>style="background-image: url('<?php print $industry_marquee['industry_main_image_field']; ?>');"<?php endif; ?>>
												</div>
												<div class="d-flex align-items-center justify-content-center industry-title">
													<div class="text-center">
														<div class="title-wrapper">
															<h3><?php print $industry_title; ?></h3>
														</div>
													</div>
												</div>
											<?php if(isset($industry_url)): ?></a><?php endif; ?>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col">
										<div class="d-flex align-items-start industry-overlay">
											<div>
												<div class="row">
													<div class="col industry-overlay-title">
														<?php print $industry_title; ?> <i class="fas fa-caret-right"></i>
													</div>
												</div>
												<div class="row">
													<div class="col">
														<?php print $industry_grid_text; ?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php endwhile; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>

	</main>

</div>

<?php get_footer(); ?>
