<?php

global $post;
$page_id = $post->ID;
$page_title = get_the_title($page_id);

$services = new WP_Query(array(
    'post_type' => 'services',
    'post_status' => 'publish',
    'posts_per_page' => -1
));

$services_marquee_img = get_field('services_marquee_image');
$services_main_content = get_field('services_main_content');
$service_blocks = array();
if( have_rows('service_block') ) {
  while ( have_rows('service_block') ) : the_row();
    $service['name'] = get_sub_field('service_name');
    $service['description'] = get_sub_field('service_description');
    $service['button_text'] = get_sub_field('service_button_text');
    $service['button_link'] = get_sub_field('service_button_link');
    $service_blocks[] = $service;
  endwhile;
}
else {
	$service_blocks = NULL;
}

?>

<?php get_header(); ?>

<div class="services-page">
	<main>
		
		<div class="marquee main-img" <?php if(isset($services_marquee_img)): ?>style="background-image: url('<?php echo $services_marquee_img; ?>');"<?php endif; ?>>
			<?php if($page_title): ?>

				<div class="container">
					<div class="row">
						<div class="col page-title mt-5">
							<h1 style="color: #FFFFFF; border-bottom: 10px solid #FFFFFF;"><?php echo $page_title; ?></h1>
						</div>
					</div>
				</div>

			<?php endif; ?>
		</div>

		<div class="container">
			
			<?php if(strlen($services_main_content) > 0): ?>
				<div class="row">
					<div class="col service-main-content pt-5">
						<?php print $services_main_content; ?>
					</div>
				</div>
			<?php endif; ?>

			<?php if(sizeof($service_blocks) > 0): ?>
				<div class="row">
					<div class="col service-repeater-block-container">
						<div class="row">
							<?php foreach ($service_blocks as $service_key => $service): ?>
								<div class="col-12 col-md-6 service-repeater-block">
									<?php if(isset($service['name'])): ?>
										<div class="row">
											<div class="col">
												<h2><?php echo $service['name']; ?></h2>
											</div>
										</div>
									<?php endif; ?>
									<?php if(isset($service['description'])): ?>
										<div class="row">
											<div class="col">
												<p><?php echo $service['description']; ?></p>
											</div>
										</div>
									<?php endif; ?>
									<?php if(isset($service['button_text']) && isset($service['button_link'])): ?>
										<div class="row">
											<div class="col">
												<a href="<?php echo $service['button_link']['url']; ?>" <?php if(isset($service['button_link']['target'])): ?>target="<?php echo $service['button_link']['target']; ?>"<?php endif; ?> <?php if(isset($service['button_link']['title'])): ?>title="<?php echo $service['button_link']['title']; ?>"<?php endif; ?> class="btn btn-lg btn-primary"><?php echo $service['button_text']; ?></a>
											</div>
										</div>
									<?php endif; ?>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			<?php endif; ?>
			
		</div>

		<!-- <?php //if($services->have_posts()): ?>
			<div class="services-wrapper">
				<div class="container">
					<div class="row">
						<?php //while( $services->have_posts()):
							//$services->the_post();
							//$service_title = get_the_title();
							//$service_url = get_permalink();
							//$service_grid_text = get_field('service_grid_text');
							//$service_marquee = get_field('service_marquee');
							?>
							<div class="col-md-6 col-lg-4">
								<div class="row">
									<div class="col">
										<div class="service-block">
											<?php //if(isset($service_url)): ?><a href="<?php //print $service_url; ?>"><?php //endif; ?>
												<div class="service-background" <?php //if(isset($service_marquee['service_main_image_field'])): ?>style="background-image: url('<?php //print $service_marquee['service_main_image_field']; ?>');"<?php //endif; ?>>
												</div>
												<div class="d-flex align-items-center justify-content-center service-title">
													<div class="text-center">
														<div class="title-wrapper">
															<h3><?php //print $service_title; ?></h3>
														</div>
													</div>
												</div>
											<?php //if(isset($service_url)): ?></a><?php //endif; ?>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col">
										<div class="d-flex align-items-start service-overlay">
											<div>
												<div class="row">
													<div class="col service-overlay-title">
														<?php //print $service_title; ?> <i class="fas fa-caret-right"></i>
													</div>
												</div>
												<div class="row">
													<div class="col">
														<?php //print $service_grid_text; ?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php //endwhile; ?>
					</div>
				</div>
			</div>
		<?php //endif; ?> -->

	</main>

</div>

<?php get_footer(); ?>
