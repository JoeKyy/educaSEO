<?php
function educaseo_widgets_init(): void
{
    register_sidebar(args: [
        "name" => esc_html__(text: "Sidebar Widget Area", domain: "educaseo"),
        "id" => "primary-widget-area",
        "before_widget" => '<li id="%1$s" class="widget-container %2$s">',
        "after_widget" => "</li>",
        "before_title" => '<h3 class="widget-title">',
        "after_title" => "</h3>",
    ]);
}

add_action(hook_name: "widgets_init", callback: "educaseo_widgets_init");

function educaseo_register_menus(): void {
    register_nav_menus(
        array(
            'main-menu' => esc_html__("Main Menu", "educaseo"),
            'footer_formacoes'    => __( 'Footer Formações', 'educaseo' ),
            'footer_cursos_rapidos' => __( 'Footer Cursos Rápidos', 'educaseo' ),
            'footer_conteudos_gratuitos' => __( 'Footer Conteúdos Gratuitos', 'educaseo' ),
            'footer_institucional' => __( 'Footer Institucional', 'educaseo' ),
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


