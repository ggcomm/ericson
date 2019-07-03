<?php
global $post;
$page_id = $post->ID;
$page_title = get_the_title($page_id);

$timeline_items = new WP_Query(array(
    'post_type' => 'history_timelines',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'order' => 'ASC'
));

?>

<?php get_header(); ?>

<div class="history-page">

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

		<div class="container">

			<?php if($page_title): ?>
				<div class="row">
					<div class="col page-title">
						<h1><?php print $page_title; ?></h1>
					</div>
				</div>
			<?php endif; ?>

			<?php if($timeline_items->have_posts()): ?>
				<div class="row">
					<div class="col history-timeline">
						<div class="row">

							<?php $count = $timeline_items->post_count; ?>
							<?php $i = 0; ?>
							<?php while( $timeline_items->have_posts()):
								$i++;
								$timeline_items->the_post();
								$item_title = get_the_title();
								$item_img = get_field('timeline_image');
								$item_txt = get_field('timeline_description');
								?>
								<div class="col-12 col-md-6 history-item <?php if($i % 2 === 0): ?>right<?php else: ?>left<?php endif; ?>">
									<div class="row">
										<div class="col history-item-info">
											<div class="dot"></div>
												<?php if(isset($item_title)): ?>
													<div class="row">
														<div class="col history-item-title">
															<h3><?php print $item_title; ?></h3>
														</div>
													</div>
												<?php endif; ?>
												<?php if(isset($item_img)): ?>
													<div class="row">
														<div class="col histroy-item-img">
															<img alt="<?php echo $item_title; ?>" src="<?php print $item_img; ?>" class="img-fluid">
														</div>
													</div>
												<?php endif; ?>
												<?php if(isset($item_txt)): ?>
													<div class="row">
														<div class="col histroy-item-text">
															<?php print $item_txt; ?>
														</div>
													</div>
												<?php endif; ?>
										</div>
									</div>
								</div>
							<?php endwhile; ?>

						</div>
					</div>
				</div>
			<?php endif; ?>
			
		</div>

	</main>

</div>

<?php get_footer(); ?>
