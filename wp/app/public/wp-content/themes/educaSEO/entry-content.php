<div class="entry-content post-content space-y-4" itemprop="mainEntityOfPage">
    <meta itemprop="description" content="<?php echo esc_html(wp_strip_all_tags(get_the_excerpt(), true)); ?>" />

    <?php if (has_post_thumbnail()): ?>
        <a href="<?php the_post_thumbnail_url('full'); ?>" title="<?php $attachment_id = get_post_thumbnail_id($post->ID); the_title_attribute(['post' => get_post($attachment_id)]);?>">
            <?php the_post_thumbnail('full', ['itemprop' => 'image']); ?>
        </a>
    <?php endif; ?>


    <?php the_content(); ?>

    <div class="entry-links"><?php wp_link_pages(); ?></div>
</div>
