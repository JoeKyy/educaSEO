<div class="entry-summary bg-gray-50">
    <?php if ( has_post_thumbnail() && !is_search() ) : ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <?php the_post_thumbnail('full', ['class' => 'w-full object-cover mb-4 rounded-lg']); ?>
        </a>
    <?php else : ?>
        <img class="w-full object-cover mb-4 rounded-lg" src="https://placehold.co/700x450?text=Imagem" alt="Imagem do Post">
    <?php endif; ?>

    <div class="px-6 py-4">
        <p class="text-sm text-gray-500 mb-2"><?php echo get_the_date('j \d\e F \d\e Y'); ?></p>

        <h3 class="text-xl font-semibold text-gray-900 mb-4 line-clamp-1">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
        </h3>

        <div itemprop="description" class="text-base text-gray-700 mb-4 line-clamp-3">
            <?php the_excerpt(); ?>
        </div>

        <?php if ( is_search() ) : ?>
            <div class="entry-links"><?php wp_link_pages(); ?></div>
        <?php endif; ?>

        <div class="flex items-center">
            <?php
                $author_avatar = get_avatar_url(get_the_author_meta('ID'), ['size' => 40]);
                if ($author_avatar) :
            ?>
                <img class="w-10 h-10 mr-3 rounded-full" src="<?php echo esc_url($author_avatar); ?>" alt="Autor">
            <?php endif; ?>

            <div>
                <p class="text-sm font-semibold text-gray-800"><?php the_author(); ?></p>
            </div>
        </div>
    </div>
</div>
