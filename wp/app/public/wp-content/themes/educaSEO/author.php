<?php get_header(); ?>

<div class="max-w-full md:max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <!-- Main Section -->
    <section>
        <!-- Section Header -->
        <header class="header mb-4">
            <h1 class="entry-title author text-2xl font-bold" itemprop="name">
                <?php the_author_link(); ?>
            </h1>
        </header>

        <!-- Author Description -->
        <?php if (get_the_author_meta()) : ?>
            <div class="author-meta mb-4" itemprop="description">
                <?php echo esc_html(get_the_author_meta('user_description')); ?>
            </div>
        <?php endif; ?>

        <!-- Author Posts Loop -->
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('entry'); ?>
            <?php endwhile; ?>
        <?php else : ?>
            <p class="text-gray-700">Nenhum post encontrado.</p>
        <?php endif; ?>
    </section>
</div>

<?php get_footer(); ?>
