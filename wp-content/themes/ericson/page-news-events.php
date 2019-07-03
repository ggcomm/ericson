<?php
global $post;
$page_id = $post->ID;
$page_title = get_the_title($page_id);

$news_events_marquee_img = get_field('news_events_marquee_image');
$news_events_main_content = get_field('news_events_main_content');

$news_events_query = new WP_Query(array(
  'post_type' => 'post',
  'post_status' => 'publish',
  'posts_per_page' => -1
));

$event_posts = array(); 
$news_posts = array();

$news_events_objects = $news_events_query->posts;
foreach ($news_events_objects as $news_event_object_key => $news_event_object) {
	$news_event = array();
	$news_event['event'] = false;
	$news_event['news'] = false;
	$news_event_post_id = $news_event_object->ID;
	$news_event_post_categories = get_the_category($news_event_post_id);
	foreach ($news_event_post_categories as $news_event_category_key => $category) {
		if($category->slug === 'events'){
			$news_event['event'] = true;
		}
		if($category->slug === 'news'){
			$news_event['news'] = true;
		}
	}
	$news_event_post_fields = get_fields($news_event_post_id);
	$news_event['url'] = get_permalink($news_event_post_id);
	$news_event['title'] = $news_event_object->post_title;
	$news_event['date'] = $news_event_post_fields['news_event_date'];
	$news_event['summary'] = wp_trim_words($news_event_post_fields['news_event_description'], 20);
	if($news_event['event'] === true){
		array_push($event_posts, $news_event);
	}
	if($news_event['news'] === true){
		array_push($news_posts, $news_event);
	}
}

usort($event_posts, function($a, $b) {
	$a_date = new DateTime($a['date']);
	$b_date = new DateTime($b['date']);
  return $b_date <=> $a_date;
});

usort($news_posts, function($a, $b) {
	$a_date = new DateTime($a['date']);
	$b_date = new DateTime($b['date']);
  return $b_date <=> $a_date;
});

?>

<?php get_header(); ?>

<div class="news-events-page">

	<main>
		
		<div class="marquee main-img" <?php if(isset($news_events_marquee_img)): ?>style="background-image: url('<?php print $news_events_marquee_img; ?>');"<?php endif; ?>>
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
			
			<?php if(isset($news_events_main_content)): ?>
				<div class="row">
					<div class="col company-main-content pt-5">
						<?php print $news_events_main_content; ?>
					</div>
				</div>
			<?php endif; ?>

			<div class="row">
				<div class="col-12 col-md-6 mt-3">

					<div class="row">
						<div class="col">
							<h2>Events</h2>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<hr/>
						</div>
					</div>
					<div class="row">
						<div class="col events-list">

							<?php foreach ($event_posts as $event_post_key => $event): ?>
								<div class="row">
									<div class="col mt-3 mb-3">
										<?php if(isset($event['date'])): ?>
											<?php $event_date = new DateTime($event['date']); ?>
											<div class="row">
												<div class="col event-date">
													<i class="far fa-calendar-alt"></i> <?php echo $event_date->format('F j, Y'); ?>
												</div>
											</div>
										<?php endif; ?>
										<?php if(isset($event['title'])): ?>
											<div class="row">
												<div class="col event-title">
													<h3><?php if(isset($event['url'])): ?><a href="<?php echo $event['url']; ?>"><?php endif; ?><?php echo $event['title']; ?><?php if(isset($event['url'])): ?></a><?php endif; ?></h3>
												</div>
											</div>
										<?php endif; ?>
										<?php if(isset($event['summary'])): ?>
											<div class="row">
												<div class="col event-summary">
													<?php echo $event['summary']; ?>
												</div>
											</div>
										<?php endif; ?>
										<?php if(isset($event['url'])): ?>
											<div class="row">
												<div class="col event-summary">
													<a href="<?php echo $event['url']; ?>">Read More</a>
												</div>
											</div>
										<?php endif; ?>
									</div>
								</div>
							<?php endforeach; ?>

						</div>
					</div>

				</div>
				<div class="col-12 col-md-6 mt-3">

					<div class="row">
						<div class="col">
							<h2>News</h2>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<hr/>
						</div>
					</div>
					<div class="row">
						<div class="col events-list">

							<?php foreach ($news_posts as $news_post_key => $news): ?>
								<div class="row">
									<div class="col mt-3 mb-3">
										<?php if(isset($news['date'])): ?>
											<?php $news_date = new DateTime($news['date']); ?>
											<div class="row">
												<div class="col news-date">
													<i class="far fa-newspaper"></i> <?php echo $news_date->format('F j, Y'); ?>
												</div>
											</div>
										<?php endif; ?>
										<?php if(isset($news['title'])): ?>
											<div class="row">
												<div class="col news-title">
													<h3><?php if(isset($news['url'])): ?><a href="<?php echo $news['url']; ?>"><?php endif; ?><?php echo $news['title']; ?><?php if(isset($news['url'])): ?></a><?php endif; ?></h3>
												</div>
											</div>
										<?php endif; ?>
										<?php if(isset($news['summary'])): ?>
											<div class="row">
												<div class="col news-summary">
													<?php echo $news['summary']; ?>
												</div>
											</div>
										<?php endif; ?>
										<?php if(isset($news['url'])): ?>
											<div class="row">
												<div class="col news-summary">
													<a href="<?php echo $news['url']; ?>">Read More</a>
												</div>
											</div>
										<?php endif; ?>
									</div>
								</div>
							<?php endforeach; ?>

						</div>
					</div>

				</div>
			</div>
			
		</div>

	</main>

</div>

<?php get_footer(); ?>
