<?php
/*
Template Name: Cursos
*/

get_header();

// Configurações da consulta para cursos do Tutor LMS
$args = array(
    'post_type'      => 'courses',
    'posts_per_page' => 6, // Defina o número de cursos por página
    'paged'          => get_query_var('paged') ? get_query_var('paged') : 1,
);

$query = new WP_Query($args);

?>

<div class="max-w-full md:max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-12 gap-16 py-10">
    <!-- Sidebar -->
    <aside class="col-span-1 lg:col-span-3 bg-neutral-100 py-8 rounded-2xl">
        <div class="mx-4 space-y-4">
            <h3 class="text-xl font-bold mb-4">Categorias de Cursos</h3>
            <div class="space-y-4">
				<div>
					<h4 class="font-semibold text-base mb-2">Categorias</h4>
					<ul class="space-y-2">
						<?php
							// Listagem das taxonomias (categorias) de cursos do Tutor LMS
							$course_categories = get_terms(array(
								'taxonomy'   => 'course-category',
								'hide_empty' => true,
							));

							if (!empty($course_categories) && !is_wp_error($course_categories)) :
								foreach ($course_categories as $category) : ?>
											<li>
												<a href="<?php echo esc_url(get_term_link($category)); ?>" class="text-pink-300 hover:text-pink-500"><?php echo esc_html($category->name); ?></a>
											</li>
											<?php endforeach;
							endif;
						?>
				</ul>
			</div>
            </div>
        </div>
    </aside>

    <!-- Main Section -->
    <section class="col-span-1 lg:col-span-9">
        <h1 class="text-2xl font-bold mb-6">Todos os Cursos</h1>

        <!-- Grid de cards de cursos -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
            <?php if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="bg-white space-y-6 overflow-hidden rounded-lg shadow">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('full', ['class' => 'w-full h-96 object-cover rounded-t-lg', 'alt' => get_the_title()]); ?>
                            </a>
                        <?php else : ?>
                            <img class="w-full h-96 object-cover rounded-t-lg" src="https://placehold.co/700x450?text=No+Image" alt="Curso">
                        <?php endif; ?>

                        <div class="px-4 pb-6 space-y-2">
                            <h2 class="text-xl font-medium">
                                <a href="<?php the_permalink(); ?>" class="hover:text-pink-300"><?php the_title(); ?></a>
                            </h2>
                            <div class="flex items-center justify-between">
                                <p class="text-base">Por: <?php the_author(); ?></p>
                                <p class="text-base"><?php echo get_post_meta(get_the_ID(), 'curso_duracao', true) ?: 'Duração não especificada'; ?></p>
                            </div>
                            <div class="flex items-center justify-between">
                                <a href="<?php the_permalink(); ?>" class="block text-center bg-pink-300 text-lg text-white-100 py-2 px-8 rounded-lg font-semibold hover:bg-pink-600">Ver Curso</a>
                                <div class="flex items-center text-pink-300 text-3xl">
                                    <?php
                                    // Obter o rating do curso com Tutor LMS
                                    $course_rating = tutor_utils()->get_course_rating(get_the_ID());
                                    if ($course_rating) {
                                        $rating_avg = round($course_rating->rating_avg); // Arredonda para o valor mais próximo

                                        // Exibir as estrelas preenchidas de acordo com o rating
                                        for ($i = 1; $i <= 5; $i++) {
                                            if ($i <= $rating_avg) {
                                                echo '<span class="text-pink-500">★</span>'; // Estrela preenchida
                                            } else {
                                                echo '<span class="text-gray-300">★</span>'; // Estrela vazia
                                            }
                                        }

                                        // // Exibe o valor numérico da avaliação
                                        // echo '<span class="ml-2 text-lg text-gray-600">' . number_format($course_rating->rating_avg, 1) . '</span>';
                                    } else {
                                        echo '<span class="text-gray-600">Sem avaliação</span>';
                                    }
                                    ?>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else : ?>
                <p><?php esc_html_e('Nenhum curso encontrado.', 'textdomain'); ?></p>
            <?php endif; ?>
        </div>

        <!-- Paginação -->
        <div class="pagination text-center">
            <?php
            echo paginate_links(array(
                'total'        => $query->max_num_pages,
                'current'      => max(1, get_query_var('paged')),
                'prev_text'    => __('&laquo; Anterior', 'textdomain'),
                'next_text'    => __('Próximo &raquo;', 'textdomain'),
            ));
            ?>
        </div>
    </section>
</div>

<?php get_footer(); ?>
