<?php if ( is_active_sidebar( 'primary-widget-area' ) ) : ?>
<aside id="sidebar" class="col-span-1 lg:col-span-3" role="complementary">
    <div id="primary" class="widget-area space-y-4 [&>div.e-con-inner]:space-y-4">
        <?php dynamic_sidebar( 'primary-widget-area' ); ?>
    </div>
</aside>
<?php endif; ?>