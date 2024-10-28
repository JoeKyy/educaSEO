<?php

/*
Template Name: Page with Sidebar on left without title
*/

get_header();

?>

<div class="max-w-full md:max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-12 gap-16 py-10">
    <!-- Sidebar -->
    <aside class="col-span-1 lg:col-span-3 bg-neutral-100 py-8 rounded-2xl">
        <?php
            wp_nav_menu(array(
                'theme_location' => 'aside_menu',
                'menu_class'     => 'mt-14 mx-4 space-y-4',
                'container'      => 'ul',
                'fallback_cb'    => false,
                'walker'         => new Custom_Nav_Walker()
            ));
        ?>

    </aside>

    <!-- Main Section -->
    <section class="col-span-1 lg:col-span-9">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <article  id="post-<?php the_ID(); ?>" <?php post_class('mb-6'); ?>>
                <div class="post-content space-y-4">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; endif; ?>
    </section>
</div>


<?php get_footer(); ?>