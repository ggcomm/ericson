<?php
global $post;
$page_id = $post->ID;
$page_title = get_the_title($page_id);

$timeline_image = get_field('timeline_image');
$timeline_description = get_field('timeline_description');

?>

<?php get_header(); ?>

<div class="history-page">
	<main>
		<div class="container">
			<div class="row">
				<div class="col history-page-container">

					<div class="row">
						<div class="col">
							<div class="row">
								<div class="col text-center mb-4">
									<h1><?php echo $page_title; ?></h1>
								</div>
							</div>
							<?php if(isset($timeline_image)): ?>
								<div class="row">
									<div class="col-4 offset-4 text-center mb-4">
										<img src="<?php echo $timeline_image; ?>" class="img-fluid">
									</div>
								</div>
							<?php endif; ?>
							<?php if(isset($timeline_description)): ?>
								<div class="row">
									<div class="col text-center">
										<?php echo $timeline_description; ?>
									</div>
								</div>
							<?php endif; ?>
						</div>

					</div>

				</div>
			</div>
		</div>
	</main>
</div>

<?php get_footer(); ?>
