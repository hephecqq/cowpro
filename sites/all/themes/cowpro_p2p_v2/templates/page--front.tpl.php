<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *	 least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *	 or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *	 when linking to the front page. This includes the language domain or
 *	 prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *	 in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *	 in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *	 site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *	 the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *	 modules, intended to be displayed in front of the main title tag that
 *	 appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *	 modules, intended to be displayed after the main title tag that appears in
 *	 the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *	 prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *	 (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *	 menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *	 associated with the page, and the node ID is the second argument
 *	 in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *	 comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content_top']: Items for the header region.
 * - $page['content']: The main content of the current page.
 * - $page['content_bottom']: Items for the header region.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 */
?>


<?php if ( !theme_get_setting( 'cowpro_p2p_breadcrumb_show' ) ) :
	$breadcrumb = NULL;
endif; ?>

<?php if ( $main_menu ) : ?>
	<a href="#main-menu" class="element-invisible element-focusable"><?php print t( 'Skip to navigation' ); ?></a>
<?php endif; ?>
<a href="#content" class="element-invisible element-focusable"><?php print t( 'Skip to main content' ); ?></a>


<div id="page-wrapper" class="page-wrapper">
	<div id="page" class="page">

		<!-- 顶部菜单
		======================================================================================= -->

		<div class="main-bar-wrapper">
			<div class="<?php if ( theme_get_setting( 'cowpro_p2p_sticky_menu' ) ) { echo 'stickup '; } ?>header-section-2"> <!-- Sticky menu wrapper -->
				<div class="container-12">

					<div class="grid-3">
						<a href="<?php echo base_path()?>"><img class="logo" src="<?php echo base_path() . path_to_theme(); ?>/logo.png"/></a>
					</div>

					<div class="grid-9">
						<!-- Region Menu -->
						<?php if ( $page['menu'] ) :
							print render( $page['menu'] );
						endif; ?>
					</div>
				</div>
			</div>
		</div>

		<!-- Header
		======================================================================================= -->
		<header id="header" class="header page-header clearfix" role="banner">
			<!-- Region Header Top -->
			<?php if ( $page['header_top'] ) : ?>
				<div class="container-12">
					<div class="grid-12">
						<?php print render( $page['header_top'] ); ?>
					</div>
				</div>
			<?php endif; ?>

			<!-- Region Header -->
			<?php if ( $page['header'] ) :
				cowpro_p2p_v2_region_preffix ( 'header' );
					print render( $page['header'] );
				cowpro_p2p_v2_region_suffix ( 'header' );
			endif; ?>

			<!-- Region Header bottom -->
			<?php if ( $page['header_bottom'] ) :
				cowpro_p2p_v2_region_preffix ( 'header_bottom' );
					print render( $page['header_bottom'] );
				cowpro_p2p_v2_region_suffix ( 'header_bottom' );
			endif; ?>
		</header>

		<!-- Content
		======================================================================================= -->
		<div id="main-wrapper" class="main-wrapper" role="main">
			<!-- Region content top -->
			<?php if ( $page['content_top'] ) :
				cowpro_p2p_v2_region_preffix ( 'content_top' );
					print render( $page['content_top'] );
				cowpro_p2p_v2_region_suffix ( 'content_top' );
			endif; ?>

	        <div class="separate"></div>

			<div class="content_header">
				<div class="container-12">
					<div class="grid-12">
						<div class="top_manage">
							<ul class="imgs">
								<li> <img src="<?php echo base_path() . path_to_theme(); ?>/images/guide1.png">
								</li>
								<li> <img src="<?php echo base_path() . path_to_theme(); ?>/images/guide2.png">
								</li>
								<li> <img src="<?php echo base_path() . path_to_theme(); ?>/images/guide3.png">
								</li>
								<li> <img src="<?php echo base_path() . path_to_theme(); ?>/images/guide4.png">
								</li>
							</ul>
							<ul class="content_header_title">
								<li>资金安全</li>
								<li>高收益</li>
								<li>随时赎回</li>
								<li>第三方法律监管</li>
							</ul>
							<ul class="content_header_detail">
								<li>运用技术分散投资，帮助投资人进入本金保障计划</li>
								<li>最高收益可达9.6%，祝您轻松获收益</li>
								<li>两步赎回您的资金，最快当日到账</li>
								<li>第三方法律监管，交易更透明，时时查看项目进度</li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="container-12">
				<div class="grid-12">
					<div id="main" class="main clearfix">

						<!-- Page content -->
						<div id="content" class="content content-main">
							<?php if ( $page['highlighted'] || $breadcrumb || ( $title && !$is_front ) || $tabs['#primary'] || $action_links || $page['help'] || $messages ) : ?>
								<header id="content-header" class="content-header">
									<?php if ( $messages ) : ?>
										<!-- System messages -->
										<div id="messages" class="messages-wrapper clearfix">
											<?php print $messages; ?>
										</div>
									<?php endif; ?>

									<?php if ( $page['highlighted'] ) : ?>
										<!-- Highlighted -->
										<div id="highlighted" class="highlighted"><?php print render( $page['highlighted'] ); ?></div>
									<?php endif; ?>

									<?php if ( $breadcrumb ) : ?>
										<!-- Breadcrumbs -->
										<div id="breadcrumb" class="breadcrumb clearfix"><?php print $breadcrumb; ?></div>
									<?php endif; ?>

									<?php if ( $title && !$is_front ) :
										print render( $title_prefix ); ?>
											<!-- Page title -->
											<h2 id="page-title" class="title page-title" ><?php print $title; ?></h2>
										<?php print render( $title_suffix );
									endif; ?>

									<?php if ( $page['help'] ): ?>
										<!-- System help block -->
										<?php print render( $page['help'] );
									endif; ?>

									<?php if ( !empty( $tabs['#primary'] ) ) : ?>
										<!-- Tabs links -->
										<div class="tabs"><?php print render( $tabs ); ?></div>
									<?php endif; ?>

									<?php if ( $action_links ) : ?>
										<!-- Action links -->
										<ul class="action-links">
											<?php print render( $action_links ); ?>
										</ul>
									<?php endif; ?>
								</header>
							<?php endif; ?>

							<!-- Page content -->
							<?php print render( $page['content'] ); ?>
						</div>

					</div>
				</div>
			</div>

			<!-- Region Content bottom -->
			<?php if ( $page['content_bottom'] ) :
				cowpro_p2p_v2_region_preffix ( 'content_bottom' );
					print render( $page['content_bottom'] );
				cowpro_p2p_v2_region_suffix ( 'content_bottom' );
			endif; ?>

			<!-- Region Prefooter -->
			<?php if ( $page['prefooter'] ) :
				cowpro_p2p_v2_region_preffix ( 'prefooter' );
					print render( $page['prefooter'] );
				cowpro_p2p_v2_region_suffix ( 'prefooter' );
			endif; ?>

			<div class="content_footer">
				<div class="container-12">
					<div class="grid-12">
						<div class="footer_manage">
							<h1>只需“四步”拥抱高收益理财</h1>
							<ul class="imgs">
								<li> <img src="<?php echo base_path() . path_to_theme(); ?>/images/instruct1.png">
								</li>
								<li> <img src="<?php echo base_path() . path_to_theme(); ?>/images/instruct2.png">
								</li>
								<li> <img src="<?php echo base_path() . path_to_theme(); ?>/images/instruct3.png">
								</li>
								<li> <img src="<?php echo base_path() . path_to_theme(); ?>/images/instruct4.png">
								</li>
							</ul>
							<ul class="content_footer_detail">
								<li>注册投资账号</li>
								<li>账号充值</li>
								<li>投资意向项目</li>
								<li>到期自动结算</li>
							</ul>
						</div>
						<div class="button">
							<a href="<?php echo base_path(); ?>/user/register">立即注册</a>
						</div>
					</div>
				</div>
			</div>

		</div>

		<!-- Footer
		======================================================================================= -->
		<footer id="footer" class="footer page-footer" role="contentinfo">
			<!-- Region Footer top -->
			<?php if ( $page['footer_top'] ) :
				cowpro_p2p_v2_region_preffix ( 'footer_top' );
					print render( $page['footer_top'] );
				cowpro_p2p_v2_region_suffix ( 'footer_top' );
			endif; ?>

			<div id="footer-wrapper" class="footer-wrapper">
				<div class="container-12">
					<div class="grid-12">
						<!-- Region Footer -->
						<?php if ( $page['footer'] ) :
							print render( $page['footer'] );
						endif; ?>

						<?php if ( $is_front ) : ?>
							Powered by 奶牛专家
						<?php endif; ?>
					</div>
				</div>
			</div>

			<!-- Region Footer bottom -->
			<?php if ( $page['footer_bottom'] ) :
				cowpro_p2p_v2_region_preffix ( 'footer_bottom' );
					print render( $page['footer_bottom'] );
				cowpro_p2p_v2_region_suffix ( 'footer_bottom' );
			endif; ?>
		</footer>
	</div>
</div>