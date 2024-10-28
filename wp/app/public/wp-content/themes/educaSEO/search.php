<?php get_header(); ?>

<div class="max-w-full md:max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <!-- Main Section -->
    <section>
        <!-- Section Header -->
        <header class="header mb-4">
            <h1 class="entry-title text-2xl font-bold" itemprop="name"><?php printf(esc_html__('Resultados para: %s'), get_search_query()); ?></h1>
        </header>

        <!-- Search Posts Loop -->
        <?php if (have_posts()) : ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('entry-summary'); ?>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <article id="post-0" class="post no-results not-found mb-6">
                <div class="entry-content post-content space-y-4" itemprop="mainContentOfPage">
                    <p><?php esc_html_e('Desculpe, infelizmente não encontramos o que queria. Por favor, tente denovo.'); ?></p>
                    <?php get_search_form(); ?>
                </div>
            </article>
        <?php endif; ?>
    </section>
</div>

<?php get_footer(); ?>
