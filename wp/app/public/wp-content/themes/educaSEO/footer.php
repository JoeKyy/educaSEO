</main>
<footer class="bg-gray-300 font-regular text-black-900 mt-10 py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 xl:grid-cols-4 md:grid-cols-2 gap-8">

        <!-- Footer Formações -->
        <div>
            <h6 class="font-semibold text-pink-300 text-base mb-2">Formações</h6>
            <?php
            wp_nav_menu( array(
                'theme_location' => 'footer_formacoes',
                'menu_class'     => 'hover:text-gray-700',
                'container'      => 'ul',
                'fallback_cb'    => false
            ) );
            ?>
        </div>

        <!-- Footer Cursos Rápidos -->
        <div>
            <h6 class="font-semibold text-pink-300 text-base mb-2">Cursos rápidos</h6>
            <?php
            wp_nav_menu( array(
                'theme_location' => 'footer_cursos_rapidos',
                'menu_class'     => 'hover:text-gray-700',
                'container'      => 'ul',
                'fallback_cb'    => false
            ) );
            ?>
        </div>

        <!-- Footer Conteúdos Gratuitos -->
        <div>
            <h6 class="font-semibold text-pink-300 text-base mb-2">Conteúdos gratuitos</h6>
            <?php
            wp_nav_menu( array(
                'theme_location' => 'footer_conteudos_gratuitos',
                'menu_class'     => 'hover:text-gray-700',
                'container'      => 'ul',
                'fallback_cb'    => false
            ) );
            ?>
        </div>

        <!-- Footer Institucional -->
        <div>
            <h6 class="font-semibold text-pink-300 text-base mb-2">Institucional</h6>
            <?php
            wp_nav_menu( array(
                'theme_location' => 'footer_institucional',
                'menu_class'     => 'hover:text-gray-700',
                'container'      => 'ul',
                'fallback_cb'    => false
            ) );
            ?>
            <h6 class="font-semibold text-pink-300 text-base my-2">Eventos</h6>
            <?php
            wp_nav_menu( array(
                'theme_location' => 'footer_eventos',
                'menu_class'     => 'hover:text-gray-700',
                'container'      => 'ul',
                'fallback_cb'    => false
            ) );
            ?>
        </div>

    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
