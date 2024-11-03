<?php
/*
Template Name: Página de Login
*/

get_header();

// Verifica se o usuário está logado e redireciona para a página inicial, se necessário
if (is_user_logged_in()) {
    wp_redirect(home_url());
    exit;
}

// Processamento do formulário de login
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login_nonce']) && wp_verify_nonce($_POST['login_nonce'], 'login')) {
    $creds = array(
        'user_login'    => $_POST['email'],
        'user_password' => $_POST['password'],
        'remember'      => true
    );

    $user = wp_signon($creds, false);

    if (is_wp_error($user)) {
        $login_error = $user->get_error_message();
    } else {
        wp_redirect(home_url());
        exit;
    }
}
?>

<section class="max-w-7xl mx-auto">
    <div class="mx-7 my-6 px-8 py-20 bg-gray-100 rounded-lg">
        <div class="max-w-3xl mx-auto">
            <div class="text-center">
                <hr class="h-[113px] bg-[url('../img/bg-hr-login.png')] bg-contain bg-center bg-no-repeat border-none">
            </div>
            <div class="mt-8 space-y-8">
                <?php if (!empty($login_error)) : ?>
                    <div class="bg-red-100 text-red-700 px-4 py-3 rounded"><?php echo $login_error; ?></div>
                <?php endif; ?>
                <form method="POST" action="">
                    <?php wp_nonce_field('login', 'login_nonce'); ?>
                    <div class="rounded-md shadow-sm space-y-10">
                        <div>
                            <label for="email" class="block text-lg font-semibold text-black-900">E-mail</label>
                            <input id="email" name="email" type="email" autocomplete="email" required class="appearance-none rounded-md relative block w-full px-3 py-4 border bg-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="password" class="block text-lg font-semibold text-black-900">Senha</label>
                            <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none rounded-md relative block w-full px-3 py-4 border bg-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm">
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <a href="<?php echo home_url('/recuperar-senha'); ?>" class="text-sm font-medium text-black-900 hover:text-pink-500">Esqueci minha senha</a>
                        <a href="<?php echo home_url('/cadastro'); ?>" class="text-sm font-medium text-pink-600 hover:text-pink-500">Quero fazer parte da comunidade</a>
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="group relative w-full flex justify-center py-4 px-4 border border-transparent text-lg font-medium rounded-md text-white-100 bg-pink-300 hover:bg-pink-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">
                            Prosseguir
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
