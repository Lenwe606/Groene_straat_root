<?php
/**
 * The default template for displaying content
 *
 * @package Mokka
 * @since Mokka 1.0
 */
?>
<div class="post">
    <div class="row">
        <!-- start hidden on mobile -->
        <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs">
            <div class="post-meta ">
                <ul class="list-unstyled text-right">
                	<?php fave_post_meta(); ?>
                </ul>
            </div>
        </div>
        <!-- end hidden on mobile -->
        <div class="col-lg-10 col-md-10 col-sm-10">
            <div class="post-content">
                <?php if(has_post_thumbnail( get_the_id() )):?>
                <div class="featured-image">
                    <a href="<?php esc_url( the_permalink() ); ?>">
                        <?php the_post_thumbnail('home-layout-1'); ?>
                    </a>
                </div>
                <?php endif; ?>
                <h2 class="post-title"><a href="<?php esc_url( the_permalink() ); ?>"><?php esc_attr( the_title() ); ?></a></h2>
                <!-- start visible on mobile -->
                <div class="post-meta visible-xs">
                    <ul class="list-inline">
                        <?php fave_post_meta(); ?>
                    </ul>
                </div>
                <!-- end visible on mobile -->
                <div class="entry">
                    <?php the_excerpt(); ?>
                    <!---->
                </div>
            </div>
        </div>
    </div>
</div>