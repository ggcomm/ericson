<?php
global $post;
$page_id = $post->ID;
$page_title = get_the_title($page_id);

$news_articles = get_posts(array(
	'numberposts' => -1,
	'post_type' => 'news_articles',
	'orderby'          => 'date',
	'order'            => 'DESC'
));

function truncate($text, $length) {
   $length = abs((int)$length);
   if(strlen($text) > $length) {
      $text = preg_replace("/^(.{1,$length})(\s.*|$)/s", '\\1...', $text);
   }
   return($text);
}

?>

<?php get_header(); ?>

<main>

	<?php if (isset($page_title)): ?>
		<article class="billboard" <?php if (!get_field('news_billboard_background_image', $page_id)): ?>style="background-color: #fd5445;"<?php endif; ?>>
			<div class="billboard_content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<?php if (get_field('news_billboard_title', $page_id)): ?>
								<div class="row">
									<div class="col-sm-12 text-center">
										<h1><?php the_field('news_billboard_title', $page_id); ?></h1>
									</div>
								</div>
							<?php elseif (isset($page_title)): ?>
								<div class="row">
									<div class="col-sm-12 text-center">
										<h1><?php echo $page_title; ?></h1>
									</div>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<?php if (get_field('news_billboard_background_image', $page_id)): ?>
				<div class="billboard-bg" data-parallax="scroll" data-speed="0.7" data-image-src="<?php the_field('news_billboard_background_image', $page_id); ?>"></div>
			<?php endif; ?>
		</article>
	<?php endif; ?>

	<?php if (isset($news_articles)): ?>
		<article class="news_article_list">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 col-lg-6 col-lg-offset-3 news_article_list_container">
								<?php foreach ($news_articles as $news_article): ?>
									<?php $this_article_id = $news_article->ID; ?>
									<?php $article_title = get_the_title($this_article_id); ?>
									<?php $article_date_value = $news_article->post_date; ?>
									<?php $article_date = date("F j, Y", strtotime($article_date_value)) ?>
									<?php $article_link = get_permalink($this_article_id); ?>
									<?php $article_image = get_field('article_image', $this_article_id); ?>
									<?php $article_content = get_field('article_content', $this_article_id); ?>
									<div class="row">
										<div class="col-md-12 news_article">
											<div class="row">
												<div class="col-md-12 article_content">

													<?php if ($article_date): ?>
														<div class="row">
															<div class="col-md-12 news_article_date">
																<span><?php print $article_date; ?></span>
															</div>
														</div>
													<?php endif; ?>

													<?php if (isset($article_title)): ?>
														<div class="row">
															<div class="col-md-12 news_article_title">
																<h2><?php if (isset($article_link)): ?><a class="article_image_link" href="<?php print $article_link; ?>"><?php endif; ?><?php echo truncate($article_title, 50); ?><?php if (isset($article_link)): ?></a><?php endif; ?></h2>
															</div>
														</div>
													<?php endif; ?>

													<?php if (isset($article_content)): ?>
														<div class="row">
															<div class="col-md-12 news_article_teaser">
																<p><?php echo truncate($article_content, 200); ?> <?php if (isset($article_link)): ?><a href="<?php print $article_link; ?>" class="read_more_link">Read More</a><?php endif; ?></p>
															</div>
														</div>
													<?php endif; ?>

												</div>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
					</div>
				</div>
			</div>
		</article>
	<?php endif; ?>

</main>

<?php get_footer(); ?>
