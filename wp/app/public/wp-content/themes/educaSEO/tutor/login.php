<?php
/**
 * Custom Tutor Login Template
 *
 * Template Name: Custom Tutor Login
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!tutor_utils()->get_option('enable_tutor_native_login', null, true, true)) {
    // Redirect to wp native login page.
    header('Location: ' . wp_login_url(tutor_utils()->get_current_url()));
    exit;
}

get_header();
?>

<section class="max-w-7xl mx-auto">
    <div class="mx-7 my-6 px-8 py-20 bg-gray-100 rounded-lg">
        <div class="max-w-3xl mx-auto">
            <div class="text-center">
                <hr class="h-[113px] bg-[url('../img/bg-hr-login.png')] bg-contain bg-center bg-no-repeat border-none">
            </div>
            <form method="post" action="<?php echo esc_url($login_url); ?>" class="mt-8 space-y-8">
                <?php
                // Adiciona nonce para segurança
                wp_nonce_field('tutor_login_form_nonce', 'tutor_login_form_nonce_field');
                do_action('tutor_before_login_form');
                ?>

                <div class="rounded-md shadow-sm space-y-10">
                    <!-- E-mail -->
                    <div>
                        <label for="email" class="block text-lg font-semibold text-black-900">E-mail</label>
                        <input type="email" name="log" id="email" required autocomplete="email" class="appearance-none rounded-md relative block w-full px-3 py-4 border bg-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm">
                    </div>

                    <!-- Senha -->
                    <div>
                        <label for="password" class="block text-lg font-semibold text-black-900">Senha</label>
                        <input type="password" name="pwd" id="password" required autocomplete="current-password" class="appearance-none rounded-md relative block w-full px-3 py-4 border bg-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm">
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <!-- Link Esqueci minha senha -->
                    <a href="<?php echo home_url('/recuperar-senha'); ?>" class="text-sm font-medium text-black-900 hover:text-pink-500">Esqueci minha senha</a>
                    <!-- Link Cadastre-se -->
                    <a href="<?php echo home_url('/cadastro'); ?>" class="text-sm font-medium text-pink-600 hover:text-pink-500">Quero fazer parte da comunidade</a>
                </div>

                <!-- Botão de Login -->
                <div class="mt-6">
                    <button type="submit" class="group relative w-full flex justify-center py-4 px-4 border border-transparent text-lg font-medium rounded-md text-white-100 bg-pink-300 hover:bg-pink-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">
                        Prosseguir
                    </button>
                </div>

                <?php do_action('tutor_after_login_form'); ?>
            </form>
        </div>
    </div>
</section>

<?php
get_footer();
