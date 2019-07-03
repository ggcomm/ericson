<?php
global $post;
$page_id = $post->ID;
$page_title = get_the_title($page_id);

$news_event_categories = get_the_category($page_id);
$event_category = false;
$news_category = false;
foreach ($news_event_categories as $category_key => $category) {
	if($category->slug === 'events') {
		$event_category = true;
	}
	if($category->slug === 'news') {
		$news_category = true;
	}
}

$news_event_date = get_field('news_event_date');
$news_event_desc = get_field('news_event_description');

$news_event_image_object = get_field('news_event_image');
if(isset($news_event_image_object['sizes']['medium'])){
	$news_event_image['url'] = $news_event_image_object['sizes']['medium'];
}
else {
	$news_event_image['url'] = NULL;
}
if(strlen($news_event_image_object['alt']) > 0){
	$news_event_image['alt'] = $news_event_image_object['alt'];
}
else {
	$news_event_image['alt'] = NULL;
}

$news_event_link_object = get_field('news_event_image_link');
if(isset($news_event_link_object['title'])){
	$news_event_image_link['title'] = $news_event_link_object['title'];
}
else {
	$news_event_image_link['title'] = NULL;
}
if(isset($news_event_link_object['url'])){
	$news_event_image_link['url'] = $news_event_link_object['url'];
}
else {
	$news_event_image_link['url'] = NULL;
}
if(isset($news_event_link_object['target'])){
	$news_event_image_link['target'] = $news_event_link_object['target'];
}
else {
	$news_event_image_link['target'] = NULL;
}

?>

<?php get_header(); ?>

<div class="news-events-single-page">
	<main>
		<div class="container">
			<div class="row">
				<div class="col offer-page-container">

					<div class="row">
						<div class="col-12 col-md-3">
							<?php if(isset($news_event_date)): ?>
								<div class="row">
									<div class="col news-events-date text-center">
										<?php echo $news_event_date; ?>
									</div>
								</div>
							<?php endif; ?>
							<?php if($event_category): ?>
								<div class="row">
									<div class="col mt-3 text-center calendar-icon news-events-icon">
										<i class="far fa-calendar-alt"></i>
									</div>
								</div>
							<?php endif; ?>
							<?php if($news_category): ?>
								<div class="row">
									<div class="col mt-3 text-center news-icon news-events-icon">
										<i class="far fa-newspaper"></i>
									</div>
								</div>
							<?php endif; ?>
						</div>
						<div class="col-12 col-md-9 mb-5">
							<?php if(isset($page_title)): ?>
								<div class="row">
									<div class="col">
										<h1><?php echo $page_title; ?></h1>
									</div>
								</div>
							<?php endif; ?>
							<?php if(isset($news_event_desc)): ?>
								<div class="row">
									<div class="col news-event-description">
										<?php echo $news_event_desc; ?>
									</div>
								</div>
							<?php endif; ?>
							<?php if(isset($news_event_image['url'])): ?>
								<div class="row">
									<div class="col mt-5 mb-5">
										<?php if(isset($news_event_image_link['url'])): ?><a <?php if(isset($news_event_image_link['title'])): ?>title="<?php echo $news_event_image_link['title']; ?>"<?php endif; ?> href="<?php echo $news_event_image_link['url']; ?>" <?php if(isset($news_event_image_link['target'])): ?>target="<?php echo $news_event_image_link['target']; ?>"<?php endif; ?>><?php endif; ?><img <?php if(isset($news_event_image['alt'])): ?>alt="<?php echo $news_event_image['alt']; ?>"<?php endif; ?> src="<?php echo $news_event_image['url']; ?>" class="img-fluid"><?php if(isset($news_event_image_link['url'])): ?></a><?php endif; ?>
									</div>
								</div>
							<?php endif; ?>
							<div class="row">
								<div class="col">
									<a href="<?php echo get_site_url(); ?>/company/news-events/">Back to all News & Events</a>
								</div>
							</div>
						</div>

					</div>

				</div>
			</div>
		</div>
	</main>
</div>

<?php get_footer(); ?>
