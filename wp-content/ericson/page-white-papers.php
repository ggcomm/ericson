<?php

global $post;
$page_id = $post->ID;
$page_title = get_the_title($page_id);

$white_papers = new WP_Query(array(
    'post_type' => 'white_papers',
    'post_status' => 'publish',
    'posts_per_page' => -1
));

?>

<?php get_header(); ?>

<div class="white-papers-page">

	<main>

		<div class="breadcrumb-wrapper">
			<div class="container">
				<div class="row">
					<div class="col breadcrumbs">
						<a href="<?php echo home_url(); ?>/">Home</a> / <a href="<?php echo home_url(); ?>/resources/">Resources</a> / <?php echo $page_title; ?>
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col page-title">
					<h1><?php print $page_title; ?></h1>
				</div>
			</div>
		</div>

		<?php if($white_papers->have_posts()): ?>
			<div class="white-papers-wrapper">
				<div class="container">
					<div class="row">
						<?php while( $white_papers->have_posts()):
							$white_papers->the_post();
							$white_paper_img = get_field('wtppr_offer_img');
							$white_paper_title = get_field('wtppr_offer_title');
							$white_paper_text = get_field('wtppr_offer_txt');
							$white_paper_btn_txt = get_field('wtppr_offer_btn_txt');
							$white_paper_btn_link = get_field('wtppr_offer_btn_lnk');
							?>

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

						<?php endwhile; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>

	</main>

</div>

<?php get_footer(); ?>
