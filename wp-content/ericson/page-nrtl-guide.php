<?php

global $post;
$page_id = $post->ID;
$page_title = get_the_title($page_id);

?>

<?php get_header(); ?>

<div class="nrtl-page">

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

		<?php if( have_rows('nrtl_item', $page_id) ): ?>
			<div class="nrtl-grid">
				<div class="container">
					<div class="row">
						<?php $item_count = count(get_field('nrtl_item')); ?>
						<?php $i_item = 0; ?>
						<?php while( have_rows('nrtl_item', $page_id) ): the_row();
							$nrtl_logo = get_sub_field('nrtl_logo');
							$nrtl_title = get_sub_field('nrtl_title');
							$nrtl_link = get_sub_field('nrtl_link');
							$i_item++;
							?>
							<div class="col-md-4 nrtl-grid-item">
								<?php if(isset($nrtl_link)): ?><a href="<?php print $nrtl_link; ?>"><?php endif; ?>
									<?php if(isset($nrtl_logo)): ?>
										<div class="row">
											<div class="col text-center">
												<img <?php if(isset($nrtl_title)): ?>alt="<?php print $nrtl_title; ?>"<?php endif; ?> src="<?php print $nrtl_logo; ?>" class="img-fluid">
											</div>
										</div>
									<?php endif; ?>
									<?php if(isset($nrtl_title)): ?>
										<div class="row">
											<div class="col text-center nrtl-grid-title">
												<h3><?php print $nrtl_title; ?></h3>
											</div>
										</div>
									<?php endif; ?>
								<?php if(isset($nrtl_link)): ?></a><?php endif; ?>
							</div>
						<?php endwhile; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>

	</main>

</div>

<?php get_footer(); ?>
