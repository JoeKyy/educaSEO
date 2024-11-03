<?php
/**
 * Custom Tutor Registration Template
 *
 * Template Name: Custom Tutor Registration
 */

get_header();

if (!get_option('users_can_register', false)) :
    $args = array(
        'image_path'  => tutor()->url . 'assets/images/construction.png',
        'title'       => __('Oooh! Access Denied', 'tutor'),
        'description' => __('You do not have access to this area of the application. Please refer to your system administrator.', 'tutor'),
        'button'      => array(
            'text'  => __('Go to Home', 'tutor'),
            'url'   => get_home_url(),
            'class' => 'tutor-btn',
        ),
    );
    tutor_load_template('feature_disabled', $args);
else :
?>

<section class="max-w-7xl mx-auto">
    <div class="mx-7 my-6 px-8 py-20 bg-gray-100 rounded-lg">
        <div class="max-w-3xl mx-auto">
            <div class="text-center">
                <hr class="h-[113px] bg-[url('../img/bg-hr-login.png')] bg-contain bg-center bg-no-repeat border-none">
            </div>
            <form method="post" enctype="multipart/form-data" id="tutor-registration-form" class="mt-8 space-y-8">
                <?php wp_nonce_field(tutor()->nonce_action, tutor()->nonce); ?>
                <input type="hidden" name="tutor_action" value="tutor_register_student">

                <!-- Error Messages -->
                <?php
                $validation_errors = apply_filters('tutor_student_register_validation_errors', array());
                if (is_array($validation_errors) && count($validation_errors)) :
                ?>
                    <div class="bg-red-100 text-red-700 px-4 py-3 rounded">
                        <ul class="tutor-required-fields">
                            <?php foreach ($validation_errors as $error) : ?>
                                <li><?php echo esc_html($error); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <div class="rounded-md shadow-sm space-y-10">
                    <!-- Nome -->
                    <div>
                        <label for="first_name" class="block text-lg font-semibold text-black-900">Nome</label>
                        <input type="text" name="first_name" id="first_name" autocomplete="given-name" required class="appearance-none rounded-md relative block w-full px-3 py-4 border bg-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm">
                    </div>

                    <!-- Sobrenome -->
                    <div>
                        <label for="last_name" class="block text-lg font-semibold text-black-900">Sobrenome</label>
                        <input type="text" name="last_name" id="last_name" autocomplete="family-name" required class="appearance-none rounded-md relative block w-full px-3 py-4 border bg-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm">
                    </div>

                    <!-- Usuário -->
                    <div>
                        <label for="user_login" class="block text-lg font-semibold text-black-900">Usuário</label>
                        <input type="text" name="user_login" id="user_login" autocomplete="username" required class="appearance-none rounded-md relative block w-full px-3 py-4 border bg-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm">
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-lg font-semibold text-black-900">E-mail</label>
                        <input type="email" name="email" id="email" required autocomplete="email" class="appearance-none rounded-md relative block w-full px-3 py-4 border bg-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm">
                    </div>

                    <!-- Senha -->
                    <div>
                        <label for="password" class="block text-lg font-semibold text-black-900">Crie uma senha forte*</label>
                        <input type="password" name="password" id="password" required autocomplete="new-password" class="appearance-none rounded-md relative block w-full px-3 py-4 border bg-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm password-checker">
                    </div>

                    <!-- Confirmação de Senha -->
                    <div>
                        <label for="password_confirmation" class="block text-lg font-semibold text-black-900">Repita a senha*</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" required autocomplete="new-password" class="appearance-none rounded-md relative block w-full px-3 py-4 border bg-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm">
                    </div>
                </div>

                <!-- Termos e Condições -->
                <?php
                $toc_page_link = tutor_utils()->get_toc_page_link();
                if (null !== $toc_page_link) :
                ?>
                    <div class="mt-6 text-center text-sm text-gray-500">
                        Ao se registrar, você concorda com os <a href="<?php echo esc_url($toc_page_link); ?>" target="_blank" class="text-pink-500 underline">Termos e Condições</a> do site.
                    </div>
                <?php endif; ?>

                <!-- Botão de Registro -->
                <div class="mt-6">
                    <button type="submit" name="tutor_register_student_btn" value="register" class="group relative w-full flex justify-center py-4 px-4 border border-transparent text-lg font-medium rounded-md text-white-100 bg-pink-300 hover:bg-pink-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">
                        Prosseguir
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<?php endif; ?>

<?php get_footer(); ?>
