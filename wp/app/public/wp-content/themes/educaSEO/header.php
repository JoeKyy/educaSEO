<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( show: 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
	
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>

    <!-- Facebook Card data -->
    <meta property="og:title" content="">
    <meta property="og:site_name" content="">
    <meta property="og:description" content="">
    <meta property="og:image" content="">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:image" content="">
    <meta name="twitter:site" content="">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:creator" content="">

    <!-- Favicon and icons -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon/favicon-16x16.png">
    <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/assets/img/favicon/apple-icon-144x144.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon/manifest.json">

    <!-- Fonts and Stylesheets -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet" type="text/css" />

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <header class="fixed z-20 w-full bg-white-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 xl:px-8">
            <div class="flex justify-between items-center py-6">
                <div class="flex xl:hidden">
                    <button id="menuButton" title="menu" type="button" class="text-black-900 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
                <div class="flex justify-start w-full xl:flex-1">
                    <a href="<?php echo esc_url(url: home_url(path: '/')); ?>" class="w-full inline-block">
                        <img loading="lazy" class="w-full max-w-48 h-auto mx-auto xl:mx-0" src="<?php echo get_template_directory_uri(); ?>/assets/img/img-logo.png" width="199" height="60" alt="<?php bloginfo('name'); ?>">
                    </a>
                </div>
                <div class="hidden xl:flex items-center justify-end">
                    <nav>
                        <ul class="flex gap-x-8 items-center">
                            <?php
                                wp_nav_menu( args: array(
                                    'theme_location' => 'main-menu',
                                    'container' => false,
                                    'items_wrap' => '%3$s',
                                    'walker' => new Custom_Walker_Nav_Menu(),
                                ) );
                            ?>
                            <li>
                                <a href="/educaSEO/student-registration/" class="whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white-100 bg-pink-300 hover:bg-pink-400">
                                    Login
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div id="mobileMenu" class="hidden xl:hidden bg-white shadow-md">
            <nav>
                <ul class="flex flex-col space-y-4 px-4 py-4">
                    <?php
                        wp_nav_menu( args: array(
                            'theme_location' => 'main-menu',
                            'container' => false,
                            'items_wrap' => '%3$s',
                            'walker' => new Custom_Walker_Nav_Menu(),
                        ) );
                    ?>
                    <li>
                        <a href="/educaSEO/student-registration/" class="whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white-100 bg-pink-300 hover:bg-pink-400">
                            Login
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="pt-[105px] min-h-[calc(100vh-362px)]">
