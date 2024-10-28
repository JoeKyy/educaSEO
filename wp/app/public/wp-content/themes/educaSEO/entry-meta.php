<div class="entry-meta flex items-center justify-between">
    <span class="text-3xl text-pink-300">
        <!-- ★★★★★ -->
    </span>
    <div class="flex items-center gap-5">
        <span class="author vcard"
            <?php if ( is_single() ) : ?>
                itemprop="author" itemscope itemtype="https://schema.org/Person"
            <?php endif; ?>
        >
            <span <?php if ( is_single() ) echo 'itemprop="name"'; ?>>
                <?php the_author_posts_link(); ?>
            </span>
        </span>
        <span class="meta-sep"> | </span>
        <time class="text-base entry-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" title="<?php echo esc_attr( get_the_date() ); ?>" <?php if ( is_single() ) { echo 'itemprop="datePublished" pubdate'; } ?>><?php the_time( get_option( 'date_format' ) ); ?></time>
        <?php if ( is_single() ) { echo '<meta itemprop="dateModified" content="' . esc_attr( get_the_modified_date() ) . '">'; } ?>
        <!-- <span class="py-1 px-3 bg-slate-700 rounded-lg text-white-100">Mago do SEO</span> -->
        <!-- <span class="py-1 px-3 bg-slate-700 rounded-lg text-white-100">Estratégia</span> -->
    </div>
</div>