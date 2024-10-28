<?php get_header(); ?>

<div class="max-w-full md:max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <!-- Main Section -->
    <section>
        <article id="post-0" class="post not-found">
            <header class="mb-4">
                <h1 class="entry-title text-2xl font-bold" itemprop="name"><?php esc_html_e( 'Não encontrado' ); ?></h1>
            </header>
            <div class="entry-content post-content space-y-4" itemprop="mainContentOfPage">
                <p><?php esc_html_e( 'Nada encontrado para a página solicitada. Tente uma busca, em vez disso' ); ?></p>
                <?php get_search_form(); ?>
            </div>
        </article>
    </section>
</div>


<?php get_footer(); ?>