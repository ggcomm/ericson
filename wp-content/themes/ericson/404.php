<?php
$home_url = home_url();
?>

<?php get_header(); ?>

<main>
	<article class="page-content">
		<div class="container">
			<div class="row">
				<div class="col-md-12 pt-5 pb-5">
					<h1>404 - Page Not Found</h1>
					<p>We’re sorry but we can’t find the page you are looking for. We suggest visiting our <a href="<?php echo $home_url; ?>">Home Page</a> to help you get back going in the right direction.</p>
					<p>If you're looking for product information, <a href="https://products.ericson.com/">click here</a>.</p>
					<?php the_content(); ?>
				</div>
			</div>
		</div>
  </article>
</main>

<?php get_footer(); ?>