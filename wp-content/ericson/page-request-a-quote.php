<?php
global $post;
$page_id = $post->ID;
$page_title = get_the_title($page_id);

if(get_field('form_page_hsform')){
	$hubspot_shortcode = get_field('form_page_hsform');
	preg_match_all('/id=([a-zA-Z0-9-_]+)/', $hubspot_shortcode, $hub_form_id_array);
	preg_match_all('/portal=(\d+)/', $hubspot_shortcode, $hub_portal_id_array);
	$hub_form_id = $hub_form_id_array[1][0];
	$hub_portal_id = $hub_portal_id_array[1][0];
}
else {
	$hubspot_shortcode = NULL;
}

if(get_field('form_page_sidebar')){
	$sidebar = get_field('form_page_sidebar');
}
else {
	$sidebar = NULL;
}

?>

<?php get_header(); ?>

<div class="contact-page">

	<main>

		<div class="container">
			<div class="row">
				<div class="col page-title mt-5">
					<h1><?php print $page_title; ?></h1>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<!--[if lte IE 8]>
						<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
					<![endif]-->
					<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
					<script>
					  hbspt.forms.create({
						portalId: "<?php echo $hub_portal_id; ?>",
						formId: "<?php echo $hub_form_id; ?>"
					});
					</script>
				</div>
				<div class="col-md-6">
					<?php if(strlen($sidebar['form_page_sidebar_title']) > 0): ?>
						<div class="row">
							<div class="col">
								<h2><?php echo $sidebar['form_page_sidebar_title']; ?></h2>
							</div>
						</div>
					<?php endif; ?>
					<?php if(strlen($sidebar['form_page_sidebar_subtitle']) > 0): ?>
						<div class="row">
							<div class="col mb-4">
								<?php echo $sidebar['form_page_sidebar_subtitle']; ?>
							</div>
						</div>
					<?php endif; ?>
					<?php if(sizeof($sidebar['form_page_sidebar_infoblock']) > 0): ?>
						<?php foreach ($sidebar['form_page_sidebar_infoblock'] as $infoblock_key => $infoblock): ?>
							<div class="row">
								<div class="col form-sidebar-infoblock">
									<div class="row">
										<div class="col <?php if($infoblock['form_page_sidebar_colnum'] === 2): ?>col-md-6<?php endif; ?>">
											<?php if(sizeof($infoblock['form_page_sidebar_block_col1']['form_page_sidebar_block_col1_contentrow']) > 0): ?>
												<?php foreach ($infoblock['form_page_sidebar_block_col1']['form_page_sidebar_block_col1_contentrow'] as $col1_row_key => $content_row): ?>
													<?php if(strlen($content_row['form_page_sidebar_block_col1_title']) > 0): ?>
														<div class="row">
															<div class="col">
																<h4><?php echo $content_row['form_page_sidebar_block_col1_title']; ?></h4>
															</div>
														</div>
													<?php endif; ?>
													<?php if(strlen($content_row['form_page_sidebar_block_col1_text']) > 0): ?>
														<div class="row">
															<div class="col">
																<?php echo $content_row['form_page_sidebar_block_col1_text']; ?>
															</div>
														</div>
													<?php endif; ?>
													<?php if(sizeof($content_row['form_page_sidebar_block_col1_bullet']) > 0): ?>
														<div class="row">
															<div class="col">
																<ul>
																	<?php foreach ($content_row['form_page_sidebar_block_col1_bullet'] as $col1_bullet_key => $bullet): ?>
																		<li><?php if(strlen($bullet['form_page_sidebar_block_col1_bullet_label'])): ?><?php echo $bullet['form_page_sidebar_block_col1_bullet_label']; ?> <?php endif; ?><?php if(isset($bullet['form_page_sidebar_block_col1_bullet_link']['url'])): ?><a href="<?php echo $bullet['form_page_sidebar_block_col1_bullet_link']['url']; ?>" <?php if(isset($bullet['form_page_sidebar_block_col1_bullet_link']['target'])): ?>target="<?php echo $bullet['form_page_sidebar_block_col1_bullet_link']['target']; ?>"<?php endif; ?>><?php endif; ?><?php if(strlen($bullet['form_page_sidebar_block_col1_bullet_text'])): ?><?php echo $bullet['form_page_sidebar_block_col1_bullet_text']; ?><?php endif; ?><?php if(isset($bullet['form_page_sidebar_block_col1_bullet_link']['url'])): ?></a><?php endif; ?></li>
																	<?php endforeach; ?>
																</ul>
															</div>
														</div>
													<?php endif; ?>
												<?php endforeach; ?>
											<?php endif; ?>
										</div>
										<?php if((int)$infoblock['form_page_sidebar_colnum'] === 2): ?>
											<div class="col col-md-6">
												<?php if(sizeof($infoblock['form_page_sidebar_block_col2']['form_page_sidebar_block_col2_contentrow']) > 0): ?>
													<?php foreach ($infoblock['form_page_sidebar_block_col2']['form_page_sidebar_block_col2_contentrow'] as $col2_row_key => $content_row_2): ?>
														<?php if(strlen($content_row_2['form_page_sidebar_block_col2_title']) > 0): ?>
															<div class="row">
																<div class="col">
																	<h4><?php echo $content_row_2['form_page_sidebar_block_col2_title']; ?></h4>
																</div>
															</div>
														<?php endif; ?>
														<?php if(strlen($content_row_2['form_page_sidebar_block_col2_text']) > 0): ?>
															<div class="row">
																<div class="col">
																	<?php echo $content_row_2['form_page_sidebar_block_col2_text']; ?>
																</div>
															</div>
														<?php endif; ?>
														<?php if(sizeof($content_row_2['form_page_sidebar_block_col2_bullet_copy']) > 0): ?>
															<div class="row">
																<div class="col">
																	<ul>
																		<?php foreach ($content_row_2['form_page_sidebar_block_col2_bullet_copy'] as $col2_bullet_key => $bullet_2): ?>
																			<li><?php if(strlen($bullet_2['form_page_sidebar_block_col2_bullet_label'])): ?><?php echo $bullet_2['form_page_sidebar_block_col2_bullet_label']; ?> <?php endif; ?><?php if(isset($bullet_2['form_page_sidebar_block_col2_bullet_link']['url'])): ?><a href="<?php echo $bullet_2['form_page_sidebar_block_col2_bullet_link']['url']; ?>" <?php if(isset($bullet_2['form_page_sidebar_block_col2_bullet_link']['target'])): ?>target="<?php echo $bullet_2['form_page_sidebar_block_col2_bullet_link']['target']; ?>"<?php endif; ?>><?php endif; ?><?php if(strlen($bullet_2['form_page_sidebar_block_col2_bullet_text'])): ?><?php echo $bullet_2['form_page_sidebar_block_col2_bullet_text']; ?><?php endif; ?><?php if(isset($bullet_2['form_page_sidebar_block_col2_bullet_link']['url'])): ?></a><?php endif; ?></li>
																		<?php endforeach; ?>
																	</ul>
																</div>
															</div>
														<?php endif; ?>
													<?php endforeach; ?>
												<?php endif; ?>
											</div>
										<?php endif; ?>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>

	</main>

</div>

<?php get_footer(); ?>
