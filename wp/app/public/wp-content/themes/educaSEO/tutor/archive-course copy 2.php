<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ITV
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>
			<section id="courses--list">
				<header>
					<div class="container">
						<div class="row my-4">
							<div class="col">
								<h1>Cursos</h1>
							</div>
						</div>
					</div>
				</header>
				<main class="pt-[105px] min-h-[calc(100vh-312px)]">
					<div class="container">
						<?php
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/*
								* Include the Post-Type-specific template for the content.
								* If you want to override this in a child theme, then include a file
								* called content-___.php (where ___ is the Post Type name) and that will be used instead.
								*/
								get_template_part( 'template-parts/content', 'cursos' );

							endwhile;

							the_posts_navigation();

							else :

							get_template_part( 'template-parts/content', 'none' );

							endif;
						?>
					</div><!-- .container -->
				</main>
			</section>
	</main>

<?php
get_footer();

