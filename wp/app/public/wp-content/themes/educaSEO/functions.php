<?php
function educaseo_widgets_init(): void
{
    register_sidebar(args: [
        "name" => esc_html__(text: "Sidebar Widget Area", domain: "educaseo"),
        "id" => "primary-widget-area",
        "before_widget" => '',
        "after_widget" => '',
        "before_title" => '',
        "after_title" => '',
    ]);
}

add_action(hook_name: "widgets_init", callback: "educaseo_widgets_init");

function educaseo_register_menus(): void {
    register_nav_menus(
        array(
            'main-menu' => esc_html__("Main Menu", "educaseo"),
            'aside_menu'    => __( 'Aside Menu', 'educaseo' ),
            'footer_formacoes'    => __( 'Footer Formações', 'educaseo' ),
            'footer_cursos_rapidos' => __( 'Footer Cursos Rápidos', 'educaseo' ),
            'footer_conteudos_gratuitos' => __( 'Footer Conteúdos Gratuitos', 'educaseo' ),
            'footer_institucional' => __( 'Footer Institucional', 'educaseo' ),
            'footer_eventos' => __( 'Footer Eventos', 'educaseo' ),
        )
    );
}
add_action( hook_name: 'init', callback: 'educaseo_register_menus' );

function educaseo_enqueue() {
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.7.1.slim.min.js', array(), null, true);
    wp_script_add_data('jquery', 'defer', true);

    wp_enqueue_script('slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', array('jquery'), null, true);
    wp_script_add_data('slick', 'defer', true);

    wp_enqueue_script('functions', get_template_directory_uri() . '/assets/js/functions.js', array('jquery', 'slick'), null, true);
    wp_script_add_data('functions', 'defer', true);
}
add_action('wp_enqueue_scripts', 'educaseo_enqueue');


function educaseo_remove_elementor_styles() {
    // Remove o estilo principal do Elementor
    wp_deregister_style('elementor-frontend');

    // Remove o estilo de ícones do Elementor, caso não precise
    wp_deregister_style('elementor-icons');

    // Remover outros estilos globais do Elementor
    wp_deregister_style('elementor-global');
}
add_action('elementor/frontend/after_register_styles', 'educaseo_remove_elementor_styles', 20);

function custom_search_form($form) {
    $form = '
    <form role="search" method="get" class="search-form" action="' . esc_url(home_url('/')) . '">
        <label for="s" class="sr-only">' . esc_html__('Buscar:', 'textdomain') . '</label>
        <input type="search" id="s" class="appearance-none rounded-md relative block w-full px-3 py-4 border bg-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm"
            placeholder="' . esc_attr__('Buscar...', 'textdomain') . '"
            value="' . get_search_query() . '" name="s" />
        <button type="submit" class="sr-only">' . esc_html__('Buscar', 'textdomain') . '</button>
    </form>';
    return $form;
}
add_filter('get_search_form', 'custom_search_form');


function render_elementor_template($atts) {
    // Definir os atributos do shortcode, incluindo o ID do template
    $atts = shortcode_atts([
        'id' => '', // ID do template do Elementor
    ], $atts);

    // Verificar se o Elementor está ativo e o ID do template foi fornecido
    if ( did_action('elementor/loaded') && !empty($atts['id']) ) {
        // Retornar o conteúdo do template do Elementor
        return Elementor\Plugin::instance()->frontend->get_builder_content_for_display($atts['id']);
    } else {
        return '<p>Erro: Elementor não está ativo ou o ID do template não foi especificado.</p>';
    }
}
add_shortcode('elementor_template', 'render_elementor_template');

// Função para incrementar a contagem de visualizações
function set_post_views($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);

    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '1');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

// Função para exibir a contagem de visualizações
function get_post_views($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '0 View';
    }
    return $count . ' Views';
}

// Incrementa visualizações sempre que um post é acessado
function track_post_views($post_id) {
    if (!is_single()) return;
    if (empty($post_id)) {
        global $post;
        $post_id = $post->ID;
    }
    set_post_views($post_id);
}
add_action('wp_head', 'track_post_views');

function add_slug_to_body_class($classes) {
    if (is_singular()) { // Verifica se é uma página ou post individual
        global $post;
        if ($post) {
            $classes[] = $post->post_name; // Adiciona apenas o slug
        }
    } elseif (is_home()) { // Página inicial do blog
        $home_slug = basename(get_permalink(get_option('page_for_posts')));
        $classes[] = $home_slug;
    } elseif (is_archive()) { // Página de arquivo
        $classes[] = 'archive';
    } elseif (is_front_page()) { // Página inicial do site
        $classes[] = 'home';
    }

    return $classes;
}

add_filter('body_class', 'add_slug_to_body_class');


class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {

    // Abre o item de menu com ou sem submenu
    function start_lvl( &$output, $depth = 0, $args = null ) {
        if ( $depth === 0 ) {
            $output .= '<div class="hidden absolute z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow-md"><ul class="py-1 bg-white-100 text-gray-700">';
        }
    }

    // Fecha o nível do submenu
    function end_lvl( &$output, $depth = 0, $args = null ) {
        if ( $depth === 0 ) {
            $output .= '</ul></div>';
        }
    }

    // Customiza a exibição dos itens de menu
    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );

        // Detecta se o item tem submenu
        $has_children = in_array('menu-item-has-children', $classes);

        if ( $has_children && $depth === 0 ) {
            $output .= '<li class="relative">';
            $output .= '<button id="dropdownButton" class="px-4 py-2 rounded focus:outline-none flex items-center font-medium" onclick="toggleDropdown()">';
            $output .= $item->title . '<i class="fas fa-chevron-down ml-2"></i>';
            $output .= '</button>';
        } else {
            $output .= '<li>';
            $output .= '<a href="' . esc_attr( $item->url ) . '" class="block px-4 py-2 text-base font-medium text-black-900 hover:text-gray-500">';
            $output .= $item->title;
            $output .= '</a>';
        }
    }

    // Fecha o item de menu
    function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= '</li>';
    }
}

class Custom_Nav_Walker extends Walker_Nav_Menu {
    // Função que gera cada item do menu
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = 'block font-semibold text-black hover:text-pink-300 px-4 py-2 rounded';

        // Adiciona classes ao link do item
        $attributes = !empty($item->url) ? ' href="' . esc_url($item->url) . '"' : '';
        $attributes .= ' class="' . esc_attr($classes) . '"';

        // Constrói o HTML do item de menu
        $output .= '<li class="menu-item-' . $item->ID . '">';
        $output .= '<a' . $attributes . '>';
        $output .= apply_filters('the_title', $item->title, $item->ID);
        $output .= '</a>';
        $output .= '</li>';
    }
}



