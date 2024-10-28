
<article id="post-<?php the_ID(); ?>" <?php post_class('mb-6'); ?>>
<header class="header mb-4">
    <?php if (is_singular()) {
        echo '<h1 class="text-2xl font-bold">';
    } else {
        echo '<h2 class="text-2xl font-bold">';
    } ?>
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
    <?php if (is_singular()) {
        echo '</h1>';
    } else {
        echo '</h2>';
    } ?>
    <?php if (!is_search()) {
        get_template_part('entry', 'meta');
    } ?>
</header>
<?php get_template_part('entry', is_front_page() || is_home() || (is_front_page() && is_home()) || is_archive() || is_search() ? 'summary' : 'content'); ?>