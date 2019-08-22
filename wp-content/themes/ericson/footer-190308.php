<?php  
$todays_footer_year = date('Y');
$cert_img = get_theme_mod( 'ericson_footer_certification_img' );
$company_name = get_theme_mod( 'ericson_footer_company_name' );
$company_address = get_theme_mod( 'ericson_footer_company_address' );
$company_phone_prefix = get_theme_mod( 'ericson_footer_company_phone_prefix' );
$company_phone = get_theme_mod( 'ericson_footer_company_phone' );
$company_logo = get_theme_mod( 'ericson_footer_company_logo' );
$linkedin_url = get_theme_mod( 'ericson_footer_linkedin_address' );
$twitter_url = get_theme_mod( 'ericson_footer_twitter_address' );
$facebook_url = get_theme_mod( 'ericson_footer_facebook_address' );
$youtube_url = get_theme_mod( 'ericson_footer_youtube_address' );
$instagram_url = get_theme_mod( 'ericson_footer_instagram_address' );
?>

<footer class="site-footer">
	<div class="footer_info_bg">
		<div class="container-fluid">

			<div class="row">
				<div class="col-sm-12 offset-sm-0 col-md-10 offset-md-1 col-lg-12 offset-lg-0 col-xl-10 offset-xl-1">

					<div class="row">
						<div class="col-md-12 col-lg-6">
							<div class="row">
								<div class="col-12 col-sm-6 footer-column">

									<div class="row">
										<div class="col">
											<?php create_bootstrap_menu('footerone'); ?>
										</div>
									</div>
									
								</div>
								<div class="col-12 col-sm-6 footer-column">

									<div class="row">
										<div class="col">
											<?php create_bootstrap_menu('footertwo'); ?>
										</div>
									</div>
									
								</div>
							</div>
						</div>
						<div class="col-mg-12 col-lg-6">
							<div class="row">
								<div class="col-12 col-sm-6 footer-column">

									<div class="row">
										<div class="col">
											<?php create_bootstrap_menu('footerthree'); ?>
										</div>
									</div>

								</div>
								<div class="col-12 col-sm-6 footer-column">

									<div class="row">
										<div class="col">
											<div class="row">
												<div class="col-4 cert-image">
													<a href="<?php echo get_site_url(); ?>/wp-content/uploads/2019/02/1647567_QMS_ENG_RR.pdf" target="_blank"><img alt="Iso Certified Company" src="<?php print $cert_img; ?>" class="img-fluid"></a>
												</div>
												<div class="col-8 d-flex align-items-center footer-company-name">
													<?php print $company_name; ?>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col footer-company-address">
											<?php print $company_address; ?>
										</div>
									</div>
									<div class="row">
										<div class="col footer-company-phone">
											<?php print $company_phone_prefix; ?> <span class="company-phone"><?php print $company_phone; ?></span>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<img alt="Ericson - 100 Years Strong" src="<?php print $company_logo; ?>" class="img-fluid">
										</div>
									</div>
									<div class="row">
										<div class="col footer-social-links">
											<a href="<?php print $linkedin_url; ?>" rel="noreferrer" target="_blank" class="text-center"><span class="sr-only">LinkedIn</span><i class="fab fa-linkedin"></i></a> <a href="<?php print $twitter_url; ?>" rel="noreferrer" target="_blank" class="text-center"><span class="sr-only">Twitter</span><i class="fab fa-twitter"></i></a> <a href="<?php print $facebook_url; ?>" rel="noreferrer" target="_blank" class="text-center"><span class="sr-only">Facebook</span><i class="fab fa-facebook-f"></i></a> <a href="<?php print $youtube_url; ?>" rel="noreferrer" target="_blank" class="text-center"><span class="sr-only">YouTube</span><i class="fab fa-youtube"></i></a> <a href="<?php print $instagram_url; ?>" rel="noreferrer" target="_blank" class="text-center"><span class="sr-only">Instagram</span><i class="fab fa-instagram"></i></a>
										</div>
									</div>
									<div class="row">
										<div class="col privacy-terms">
											&copy;<?php echo $todays_footer_year; ?> &nbsp;&nbsp; <a href="<?php echo get_site_url(); ?>/privacy-policy/">Privacy</a>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>

				</div>
			</div>

		</div>
	</div>
</footer>

<?php wp_footer(); ?>

<!-- Begin WebTrax -->
<script type="text/javascript">
var wto = wto || [];
wto.push(['setWTID', 'ericson']);
wto.push(['webTraxs']);
(function() {
var wt = document.createElement('script');
wt.src = document.location.protocol + '//www.webtraxs.com/wt.php';
wt.type = 'text/javascript';
wt.async = true;
var s = document.getElementsByTagName('script')[0];
s.parentNode.insertBefore(wt, s);
})();
</script>
<noscript><img src="https://www.webtraxs.com/webtraxs.php?id=ericson&st=img" alt="" /></noscript>
<!-- End WebTrax -->


</body>
</html>