<?php get_header(); ?>

<div class="max-w-full md:max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 grid grid-cols-1 lg:grid-cols-12 gap-16">
    <!-- Main Section -->
    <section class="col-span-1 lg:col-span-9">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'entry' ); ?>
        <?php endwhile; endif; ?>
    </section>

    <!-- Sidebar -->
    <aside class="col-span-1 lg:col-span-3">
        <div class="space-y-4">
            <?php get_sidebar(); ?>
        </div>
    </aside>
</div>


<?php get_footer(); ?>