<?php
global $post;
$page_id = $post->ID;
$page_title = get_the_title($page_id);

$company_marquee_img = get_field('company_marquee_image');
$company_main_content = get_field('company_main_content');


?>

<?php get_header(); ?>

<div class="company-page">

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

		
		<div class="marquee main-img" <?php if(isset($company_marquee_img)): ?>style="background-image: url('<?php print $company_marquee_img; ?>');"<?php endif; ?>>
			<?php if($page_title): ?>

				<div class="container">
					<div class="row">
						<div class="col page-title mt-5">
							<h1 style="color: #FFFFFF; border-bottom: 10px solid #FFFFFF;"><?php print $page_title; ?></h1>
						</div>
					</div>
				</div>

			<?php endif; ?>
		</div>

		<div class="container">
			
			<?php if(isset($company_main_content)): ?>
				<div class="row">
					<div class="col company-main-content pt-5">
						<?php print $company_main_content; ?>
					</div>
				</div>
			<?php endif; ?>
			
		</div>

	</main>

</div>

<?php get_footer(); ?>
