<?php
global $post;
$page_id = $post->ID;
$page_title = get_the_title($page_id);

$wtppr_offer_img = get_field('wtppr_offer_img');
$wtppr_offer_title = get_field('wtppr_offer_title');
$wtppr_offer_txt = get_field('wtppr_offer_txt');
$wtppr_offer_btn_txt = get_field('wtppr_offer_btn_txt');
$wtppr_offer_btn_lnk = get_field('wtppr_offer_btn_lnk');

?>

<?php get_header(); ?>

<div class="white-paper-page">
	<main>
		<div class="container">
			<div class="row">
				<div class="col white-paper-page-container">

					<div class="row">
						<div class="col-12 col-md-3">
							<?php if(isset($wtppr_offer_img)): ?>
								<div class="row">
									<div class="col">
										<img src="<?php echo $wtppr_offer_img; ?>" class="img-fluid">
									</div>
								</div>
							<?php endif; ?>
						</div>
						<div class="col-12 col-md-9">
							<?php if(isset($wtppr_offer_title)): ?>
								<div class="row">
									<div class="col">
										<h1><?php echo $wtppr_offer_title; ?></h1>
									</div>
								</div>
							<?php endif; ?>
							<?php if(isset($wtppr_offer_txt)): ?>
								<div class="row">
									<div class="col">
										<?php echo $wtppr_offer_txt; ?>
									</div>
								</div>
							<?php endif; ?>
							<?php if(isset($wtppr_offer_btn_txt) && isset($wtppr_offer_btn_lnk)): ?>
								<div class="row">
									<div class="col">
										<a href="<?php echo $wtppr_offer_btn_lnk; ?>" class="btn btn-lg btn-primary"><?php echo $wtppr_offer_btn_txt; ?></a>
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
