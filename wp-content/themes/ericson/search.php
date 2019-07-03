<?php 

if (have_posts()){
  $industry_count = 0;
  $services_count = 0;
  $prod_count = 0;
  $case_studies_count = 0;
  $white_papers_count = 0;
  $offers_count = 0;
  $history_count = 0;
  $page_count = 0;

  $industry_results = array();
  $services_results = array();
  $prod_results = array();
  $case_studies_results = array();
  $white_papers_results = array();
  $offers_results = array();
  $history_results = array();
  $page_results = array();

  $i = 0;
  while ( have_posts() ) { 
    the_post();
    $result_post_type = get_post_type();
    switch ($result_post_type) {
      case 'industries':
        $industry_result = array();
        $industry_result['post_type_name'] = 'Industries';
        $industry_result['fields'] = get_fields();
        $industry_result['title'] = get_the_title();
        $industry_result['id'] = get_the_ID();
        $industry_result['url'] = get_the_permalink();
        $industry_results[] = $industry_result;
        $industry_count++;
        break;
      case 'services':
        $services_result['post_type_name'] = 'Services';
        $services_result['fields'] = get_fields();
        $services_result['title'] = get_the_title();
        $services_result['id'] = get_the_ID();
        $services_result['url'] = get_the_permalink();
        $services_results[] = $services_result;
        $services_count++;
        break;
      case 'product_categories':
        $prod_result['post_type_name'] = 'Product Categories';
        $prod_result['fields'] = get_fields();
        $prod_result['title'] = get_the_title();
        $prod_result['id'] = get_the_ID();
        $prod_result['url'] = get_the_permalink();
        $prod_results[] = $prod_result;
        $prod_count++;
        break;
      case 'case_studies':
        $case_studies_result['post_type_name'] = 'Case Studies';
        $case_studies_result['fields'] = get_fields();
        $case_studies_result['title'] = get_the_title();
        $case_studies_result['id'] = get_the_ID();
        $case_studies_result['url'] = get_the_permalink();
        $case_studies_results[] = $case_studies_result;
        $case_studies_count++;
        break;
      case 'white_papers':
        $white_papers_result['post_type_name'] = 'White Papers';
        $white_papers_result['fields'] = get_fields();
        $white_papers_result['title'] = get_the_title();
        $white_papers_result['id'] = get_the_ID();
        $white_papers_result['url'] = get_the_permalink();
        $white_papers_results[] = $white_papers_result;
        $white_papers_count++;
        break;
      case 'hub_offers':
        $offers_result['post_type_name'] = 'Offers';
        $offers_result['fields'] = get_fields();
        $offers_result['title'] = get_the_title();
        $offers_result['id'] = get_the_ID();
        $offers_result['url'] = get_the_permalink();
        $offers_results[] = $offers_result;
        $offers_count++;
        break;
      case 'history_timelines':
        $history_result['post_type_name'] = 'History';
        $history_result['fields'] = get_fields();
        $history_result['title'] = get_the_title();
        $history_result['id'] = get_the_ID();
        $history_result['url'] = get_the_permalink();
        $history_results[] = $history_result;
        $history_count++;
        break;
      case 'page':
        $page_result['post_type_name'] = 'Page';
        $page_result['fields'] = get_fields();
        $page_result['title'] = get_the_title();
        $page_result['id'] = get_the_ID();
        $page_result['url'] = get_the_permalink();
        $page_results[] = $page_result;
        $page_count++;
        break;
      default:
        break;
    }
    $i++;
  }
}

//print_r($industry_results);

$s_query = get_search_query();

?>

<?php get_header(); ?>

<main>
  <div class="container">
    <div class="row">
      <div class="col search-container">

        <div class="row">
          <div class="col">
            <h2 class="search-page-title"><?php printf( esc_html__( 'Search Results for: %s', stackstar ), '<span>' . get_search_query() . '</span>' ); ?></h2>
          </div>
        </div>
        <div class="row">
          <div class="col">

            <!-- INDUSTRIES -->
            <?php if (sizeof($industry_results) > 0): ?>
              <div class="row">
                <div class="col results-container">

                  <div class="row">
                    <div class="col search-result-title">
                      <h2>Industries</h2>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <hr/>
                    </div>
                  </div>
                  <div class="row">
                    <?php foreach ($industry_results as $industry_object ): ?>
                      <?php //print_r($industry_object); ?>
                      <div class="col-6 col-md-3 industry-result">
                        <div class="row">
                          <div class="col">
                            <h4><a href="<?php echo $industry_object['url'];?>"><?php echo $industry_object['title']; ?></a></h4>
                          </div>
                        </div>
                        <?php if(isset($industry_object['fields']['industry_grid_text'])): ?>
                          <div class="row">
                            <div class="col">
                              <?php echo wp_trim_words($industry_object['fields']['industry_grid_text'], 25); ?>
                            </div>
                          </div>
                        <?php endif; ?>
                      </div>
                    <?php endforeach;?>
                  </div>

                </div>
              </div>
            <?php endif; ?>
            <!-- END INDUSTRIES -->

            <!-- CASE STUDIES -->
            <?php if (sizeof($case_studies_results) > 0): ?>
              <div class="row">
                <div class="col results-container">

                  <div class="row">
                    <div class="col search-result-title">
                      <h2>Case Studies</h2>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <hr/>
                    </div>
                  </div>
                  <div class="row">
                    <?php foreach ($case_studies_results as $case_study_object ): ?>
                      <?php //print_r($case_study_object); ?>
                      <div class="col-6 col-md-3 case-study-result">
                        <div class="row">
                          <div class="col">
                            <h4><a href="<?php echo $case_study_object['url'];?>"><?php echo $case_study_object['title']; ?></a></h4>
                          </div>
                        </div>
                        <?php if(isset($case_study_object['fields']['case_study_main_content']['case_study_body'])): ?>
                          <div class="row">
                            <div class="col">
                              <?php echo wp_trim_words($case_study_object['fields']['case_study_main_content']['case_study_body'], 25); ?>
                            </div>
                          </div>
                        <?php endif; ?>
                      </div>
                    <?php endforeach;?>
                  </div>

                </div>
              </div>
            <?php endif; ?>
            <!-- END CASE STUDIES -->

            <!-- WHITE PAPERS -->
            <?php if (sizeof($white_papers_results) > 0): ?>
              <div class="row">
                <div class="col results-container">

                  <div class="row">
                    <div class="col search-result-title">
                      <h2>White Papers</h2>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <hr/>
                    </div>
                  </div>
                  <div class="row">
                    <?php foreach ($white_papers_results as $white_paper_object ): ?>
                      <?php //print_r($white_paper_object); ?>
                      <div class="col-6 col-md-3 white-paper-result">
                        <div class="row">
                          <div class="col">
                            <h4><a href="<?php echo $white_paper_object['url'];?>"><?php echo $white_paper_object['title']; ?></a></h4>
                          </div>
                        </div>
                        <?php if(isset($white_paper_object['fields']['wtppr_offer_txt'])): ?>
                          <div class="row">
                            <div class="col">
                              <?php echo wp_trim_words($white_paper_object['fields']['wtppr_offer_txt'], 25); ?>
                            </div>
                          </div>
                        <?php endif; ?>
                      </div>
                    <?php endforeach;?>
                  </div>

                </div>
              </div>
            <?php endif; ?>
            <!-- END WHITE PAPERS -->

            <!-- OFFERS -->
            <?php if (sizeof($offers_results) > 0): ?>
              <div class="row">
                <div class="col results-container">

                  <div class="row">
                    <div class="col search-result-title">
                      <h2>Offers</h2>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <hr/>
                    </div>
                  </div>
                  <div class="row">
                    <?php foreach ($offers_results as $offer_object ): ?>
                      <?php //print_r($offer_object); ?>
                      <div class="col-6 col-md-3 offer-result">
                        <div class="row">
                          <div class="col">
                            <h4><a href="<?php echo $offer_object['url'];?>"><?php echo $offer_object['title']; ?></a></h4>
                          </div>
                        </div>
                        <?php if(isset($offer_object['fields']['hub_offer_txt'])): ?>
                          <div class="row">
                            <div class="col">
                              <?php echo wp_trim_words($offer_object['fields']['hub_offer_txt'], 25); ?>
                            </div>
                          </div>
                        <?php endif; ?>
                      </div>
                    <?php endforeach;?>
                  </div>

                </div>
              </div>
            <?php endif; ?>
            <!-- END OFFERS -->

            <!-- HISTORY -->
            <?php if (sizeof($history_results) > 0): ?>
              <div class="row">
                <div class="col results-container">

                  <div class="row">
                    <div class="col search-result-title">
                      <h2>History</h2>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <hr/>
                    </div>
                  </div>
                  <div class="row">
                    <?php foreach ($history_results as $history_object ): ?>
                      <?php //print_r($history_object); ?>
                      <div class="col-6 col-md-3 history-result">
                        <div class="row">
                          <div class="col">
                            <h4><a href="<?php echo $history_object['url'];?>"><?php echo $history_object['title']; ?></a></h4>
                          </div>
                        </div>
                        <?php if(isset($history_object['fields']['timeline_description'])): ?>
                          <div class="row">
                            <div class="col">
                              <?php echo wp_trim_words($history_object['fields']['timeline_description'], 25); ?>
                            </div>
                          </div>
                        <?php endif; ?>
                      </div>
                    <?php endforeach;?>
                  </div>

                </div>
              </div>
            <?php endif; ?>
            <!-- END HISTORY -->

            <!-- SERVICES -->
            <?php if (sizeof($services_results) > 0): ?>
              <div class="row">
                <div class="col results-container">

                  <div class="row">
                    <div class="col search-result-title">
                      <h2>Services</h2>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <hr/>
                    </div>
                  </div>
                  <div class="row">
                    <?php foreach ($services_results as $service_object ): ?>
                      <?php //print_r($service_object); ?>
                      <div class="col-6 col-md-3 service-result">
                        <div class="row">
                          <div class="col">
                            <h4><a href="<?php echo $service_object['url'];?>"><?php echo $service_object['title']; ?></a></h4>
                          </div>
                        </div>
                        <?php if(isset($service_object['fields']['service_grid_text'])): ?>
                          <div class="row">
                            <div class="col">
                              <?php echo wp_trim_words($service_object['fields']['service_grid_text'], 25); ?>
                            </div>
                          </div>
                        <?php endif; ?>
                      </div>
                    <?php endforeach;?>
                  </div>

                </div>
              </div>
            <?php endif; ?>
            <!-- END SERVICES -->

            <!-- PAGE -->
            <?php if (sizeof($page_results) > 0): ?>
              <div class="row">
                <div class="col results-container">

                  <div class="row">
                    <div class="col search-result-title">
                      <h2>Pages</h2>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <hr/>
                    </div>
                  </div>
                  <div class="row">
                    <?php foreach ($page_results as $page_object ): ?>
                      <?php //print_r($page_object); ?>
                      <div class="col-6 col-md-3 page-result">
                        <div class="row">
                          <div class="col">
                            <h4><a href="<?php echo $page_object['url'];?>"><?php echo $page_object['title']; ?></a></h4>
                          </div>
                        </div>
                        <?php if(isset($page_object['fields']['company_main_content'])): ?>
                          <div class="row">
                            <div class="col">
                              <?php echo wp_trim_words($page_object['fields']['company_main_content'], 25); ?>
                            </div>
                          </div>
                        <?php endif; ?>
                      </div>
                    <?php endforeach;?>
                  </div>

                </div>
              </div>
            <?php endif; ?>
            <!-- END PAGE -->

          </div>
        </div>
        
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>

