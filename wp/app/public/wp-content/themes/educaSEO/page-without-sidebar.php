<?php

/*
Template Name: Page without Sidebar
*/

get_header();

?>

<div class="max-w-full md:max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <!-- Main Section -->
    <section>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <article  id="post-<?php the_ID(); ?>" <?php post_class('mb-6'); ?>>
                <header class="mb-4">
                    <h1 class="entry-title text-2xl font-bold"><?php the_title(); ?></h1>
                </header>
                <div class="post-content space-y-4">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; endif; ?>
    </section>
</div>


<?php get_footer(); ?>