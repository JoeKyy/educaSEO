<?php
/*
Template Name: Recuperar Senha
*/

get_header();

// Verifica se o formulário foi enviado e processa a recuperação de senha
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['password_reset_nonce']) && wp_verify_nonce($_POST['password_reset_nonce'], 'password_reset')) {
    $user_email = sanitize_email($_POST['email']);

    if (!email_exists($user_email)) {
        $error_message = 'E-mail não encontrado. Verifique o endereço e tente novamente.';
    } else {
        // Envia o e-mail de recuperação de senha
        $reset = retrieve_password($user_email);
        if (is_wp_error($reset)) {
            $error_message = 'Ocorreu um erro ao enviar o e-mail. Tente novamente mais tarde.';
        } else {
            $success_message = 'Um e-mail de recuperação foi enviado para o seu endereço.';
        }
    }
}
?>

<section class="max-w-7xl mx-auto">
    <div class="mx-7 my-6 px-8 py-20 bg-gray-100 rounded-lg">
        <div class="max-w-3xl mx-auto">
            <div class="text-center">
                <h1 class="text-2xl font-semibold">Recuperar senha</h1>
            </div>
            <div class="mt-8 space-y-8">
                <?php if (!empty($error_message)) : ?>
                    <div class="bg-red-100 text-red-700 px-4 py-3 rounded"><?php echo esc_html($error_message); ?></div>
                <?php elseif (!empty($success_message)) : ?>
                    <div class="bg-green-100 text-green-700 px-4 py-3 rounded"><?php echo esc_html($success_message); ?></div>
                <?php endif; ?>

                <form method="POST" action="">
                    <?php wp_nonce_field('password_reset', 'password_reset_nonce'); ?>
                    <div class="rounded-md shadow-sm space-y-10">
                        <div>
                            <label for="email" class="block text-lg font-semibold text-black-900">Insira seu E-mail cadastrado para recuperação da Senha</label>
                            <input id="email" name="email" type="email" autocomplete="email" required class="appearance-none rounded-md relative block w-full px-3 py-4 border bg-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm">
                        </div>
                    </div>

                    <div class="text-center mt-8">
                        <button type="submit" class="group relative w-full flex justify-center mb-6 py-4 px-4 border border-transparent text-lg font-medium rounded-md text-white-100 bg-pink-300 hover:bg-pink-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">
                            Prosseguir
                        </button>
                        <a href="<?php echo esc_url(home_url('/login')); ?>" class="text-pink-600 hover:text-pink-500">
                            ou Volte para o Login
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
