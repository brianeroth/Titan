<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package titan
 */

get_header(); ?>

	<section class="error-404 not-found">
		<header class="page-header">
			<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'titan' ); ?></h1>
		</header>

		<div class="page-content">
			<p><?php esc_html_e( '404 Error', 'titan' ); ?></p>
		</div>
	</section>

<?php
get_footer();
