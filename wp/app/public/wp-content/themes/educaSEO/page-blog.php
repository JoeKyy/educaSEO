<?php
/* Template Name: Blog */
get_header(); ?>

<div class="max-w-full md:max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 grid grid-cols-1 lg:grid-cols-12 gap-16">
    <!-- Main Section -->
    <section class="col-span-1 lg:col-span-12">
        <h1 class="text-2xl font-semibold mb-4"><?php esc_html_e('Blog', 'textdomain'); ?></h1>

        <!-- Seção principal do blog -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 mb-16">
            <!-- Imagem principal -->
            <div class="w-full lg:col-span-2">
                <img class="w-full h-auto rounded-lg" src="https://placehold.co/700x450?text=Imagem+Principal" alt="<?php esc_attr_e('Imagem do Blog', 'textdomain'); ?>">
            </div>

            <!-- Lista de tópicos do blog (mais visualizados) -->
            <div class="flex flex-col justify-center">
                <div class="space-y-4">
                    <?php
                    // Consultar os posts mais visualizados para a lista de tópicos
                    $popular_posts = new WP_Query(array(
                        'posts_per_page' => 5,
                        'meta_key'       => 'post_views_count',
                        'orderby'        => 'meta_value_num',
                        'order'          => 'DESC',
                    ));

                    if ($popular_posts->have_posts()) :
                        $count = 1;
                        while ($popular_posts->have_posts()) : $popular_posts->the_post(); ?>
                            <a href="<?php the_permalink(); ?>" class="bg-gray-50 rounded-lg px-4 py-2 flex items-center">
                                <span class="text-pink-500 text-3xl font-bold mr-4"><?php echo $count; ?>.</span>
                                <span class="text-base text-gray-800 font-semibold"><?php the_title(); ?></span>
                            </a>
                            <?php $count++;
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
        </div>

        <!-- Últimos artigos -->
        <div class="mb-16">
            <h2 class="text-2xl font-semibold text-gray-900 mb-6"><?php esc_html_e('Últimos Artigos', 'textdomain'); ?></h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                // Loop personalizado para exibir os 5 posts mais recentes com paginação
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $latest_posts = new WP_Query(array(
                    'posts_per_page' => 5,
                    'paged'          => $paged,
                ));

                if ($latest_posts->have_posts()) :
                    while ($latest_posts->have_posts()) : $latest_posts->the_post(); ?>
                        <div class="bg-gray-50">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('full', ['class' => 'w-full object-cover mb-4 rounded-lg', 'alt' => get_the_title()]); ?>
                                </a>
                            <?php else : ?>
                                <img class="w-full object-cover mb-4 rounded-lg" src="https://placehold.co/700x450?text=No+Image" alt="<?php esc_attr_e('Sem Imagem', 'textdomain'); ?>">
                            <?php endif; ?>

                            <div class="px-6 py-4">
                                <p class="text-sm text-gray-500 mb-2"><?php echo get_the_date('j \d\e F \d\e Y'); ?></p>
                                <h3 class="text-xl font-semibold text-gray-900 mb-4 line-clamp-1">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <div class="text-base text-gray-700 mb-4 line-clamp-3">
                                    <?php the_excerpt(); ?>
                                </div>
                                <div class="flex items-center">
                                    <?php echo get_avatar(get_the_author_meta('ID'), 40, '', '', ['class' => 'w-10 h-10 mr-3 rounded-full']); ?>
                                    <div>
                                        <p class="text-sm font-semibold text-gray-800"><?php the_author(); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                else : ?>
                    <p><?php esc_html_e('Nenhum post encontrado.', 'textdomain'); ?></p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Paginação -->
        <div class="pagination text-center">
            <?php
            // Exibe a paginação para os últimos artigos
            echo paginate_links(array(
                'total' => $latest_posts->max_num_pages,
                'prev_text' => __('&laquo; Anterior', 'textdomain'),
                'next_text' => __('Próximo &raquo;', 'textdomain'),
            ));
            ?>
        </div>
    </section>
</div>

<?php get_footer(); ?>
