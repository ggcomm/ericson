<?php
global $post;
$page_id = $post->ID;
$page_title = get_the_title($page_id);

$hub_offer_img = get_field('hub_offer_img');
$hub_offer_title = get_field('hub_offer_title');
$hub_offer_txt = get_field('hub_offer_txt');
$hub_offer_btn_txt = get_field('hub_offer_btn_txt');
$hub_offer_btn_lnk = get_field('hub_offer_btn_lnk');

?>

<?php get_header(); ?>

<div class="offer-page">
	<main>
		<div class="container">
			<div class="row">
				<div class="col offer-page-container">

					<div class="row">
						<div class="col-12 col-md-3">
							<?php if(isset($hub_offer_img)): ?>
								<div class="row">
									<div class="col">
										<img src="<?php echo $hub_offer_img; ?>" class="img-fluid">
									</div>
								</div>
							<?php endif; ?>
						</div>
						<div class="col-12 col-md-9">
							<?php if(isset($hub_offer_title)): ?>
								<div class="row">
									<div class="col">
										<h1><?php echo $hub_offer_title; ?></h1>
									</div>
								</div>
							<?php endif; ?>
							<?php if(isset($hub_offer_txt)): ?>
								<div class="row">
									<div class="col">
										<?php echo $hub_offer_txt; ?>
									</div>
								</div>
							<?php endif; ?>
							<?php if(isset($hub_offer_btn_txt) && isset($hub_offer_btn_lnk)): ?>
								<div class="row">
									<div class="col">
										<a href="<?php echo $hub_offer_btn_lnk; ?>" class="btn btn-lg btn-primary"><?php echo $hub_offer_btn_txt; ?></a>
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
