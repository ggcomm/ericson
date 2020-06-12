<?php
global $post;
$page_id = $post->ID;
$page_title = get_the_title($page_id);
?>

<?php get_header(); ?>

<div class="sitemap-page">

	<main>

		<div class="container">
			<div class="row">
				<div class="col sitemap-main-content pt-5 mb-5">
					
					<h2 id="pages">Pages</h2>
					<ul>
					<?php
					// Add pages you'd like to exclude in the exclude here
					wp_list_pages(
					  array(
					    'exclude' => '',
					    'title_li' => '',
					  )
					);
					?>
					</ul>

					<h2 id="posts">News & Events</h2>
					<ul>
					<?php
					// Add categories you'd like to exclude in the exclude here
					$cats = get_categories('exclude=');
					foreach ($cats as $cat) {
					  echo "<li><h3>".$cat->cat_name."</h3>";
					  echo "<ul>";
					  query_posts('posts_per_page=-1&cat='.$cat->cat_ID);
					  while(have_posts()) {
					    the_post();
					    $category = get_the_category();
					    // Only display a post link once, even if it's in multiple categories
					    if ($category[0]->cat_ID == $cat->cat_ID) {
					      echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
					    }
					  }
					  echo "</ul>";
					  echo "</li>";
					}
					?>
					</ul>


					<?php 
					foreach( get_post_types( array('public' => true, '_builtin' => false) ) as $post_type ) {
						
						$cpt = get_post_type_object( $post_type );
						if($cpt->name !== 'services' && $cpt->name !== 'product_categories' && $cpt->name !== 'hub_offers' && $cpt->name !== 'history_timelines'){
							echo '<h2>'.$cpt->labels->name.'</h2>';
							echo '<ul>'; 
							 
							$args = array(
							    'post_type' => $post_type,
							    'post__not_in' => array(), /**Exclude custom posts by ID separated by comma inside the array.**/
							    'posts_per_page' => -1  //show all custom posts
							);
							$query_cpt = new WP_Query($args);
							 
							while( $query_cpt->have_posts() ) {
							    $query_cpt->the_post();

							    echo '<li><a title="'.get_the_title().'" href="'.get_permalink().'">'.get_the_title().'</a></li>';
							}
							echo '</ul>';
						}
					} 
					?> 

				</div>
			</div>
		</div>

	</main>

</div>

<?php get_footer(); ?>
